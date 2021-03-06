<?php

namespace Beebmx\KirbyPay\Routes;

use Beebmx\KirbyPay\Concerns\ManagesRoutes;
use Beebmx\KirbyPay\Concerns\ValidateRoutes;
use Beebmx\KirbyPay\Contracts\Routable;
use Beebmx\KirbyPay\Customer;
use Beebmx\KirbyPay\Elements\Buyer;
use Beebmx\KirbyPay\Payment;
use Beebmx\KirbyPay\Webhook;
use Exception;
use Illuminate\Support\Collection;
use Kirby\Http\Request;

class Routes implements Routable
{
    use ManagesRoutes, ValidateRoutes;

    /**
     * Get all the routes available
     *
     * @return array
     */
    public static function all(): array
    {
        return [
            static::createPayment(),
            static::createOrder(),
            static::createCustomer(),
            static::updateCustomer(),
            static::updateSource(),
            static::handleWebhooks(),
        ];
    }

    /**
     *  Create a payment route
     *
     * @return array
     */
    public static function createPayment()
    {
        return [
            'pattern' => static::getBaseApiPath() . 'payment/create',
            'name' => 'payment.create',
            'method' => 'POST',
            'action' => function () {
                return Routes::handleCreatePayment(new Request);
            },
        ];
    }

    /**
     * Create an order route
     *
     * @return array
     */
    public static function createOrder()
    {
        return [
            'pattern' => static::getBaseApiPath() . 'order/create',
            'name' => 'order.create',
            'method' => 'POST',
            'action' => function () {
                return Routes::handleCreateOrder(new Request);
            },
        ];
    }

    /**
     * Create a customer route
     *
     * @return array
     */
    public static function createCustomer()
    {
        return [
            'pattern' => static::getBaseApiPath() . 'customer/create',
            'name' => 'customer.create',
            'method' => 'POST',
            'action' => function () {
                return Routes::handleCreateCustomer(new Request);
            },
        ];
    }

    /**
     * Update a customer route
     *
     * @return array
     */
    public static function updateCustomer()
    {
        return [
            'pattern' => static::getBaseApiPath() . 'customer/update',
            'name' => 'customer.update',
            'method' => 'POST',
            'action' => function () {
                return Routes::handleUpdateCustomer(new Request);
            },
        ];
    }

    /**
     * Update a customer source route
     *
     * @return array
     */
    public static function updateSource()
    {
        return [
            'pattern' => static::getBaseApiPath() . 'source/update',
            'name' => 'source.update',
            'method' => 'POST',
            'action' => function () {
                return Routes::handleUpdateSource(new Request);
            },
        ];
    }

    /**
     * Handle webhooks routes
     *
     * @return array
     */
    public static function handleWebhooks()
    {
        return [
            'pattern' => static::getBaseApiPath() . 'webhook',
            'name' => 'webhook.handle',
            'method' => 'POST',
            'action' => function () {
                $request = new Request;
                return (new Webhook($request))->handle();
            }
        ];
    }

    /**
     * Handle a payment creation
     *
     * @param Request $request
     * @return array|bool
     */
    public static function handleCreatePayment(Request $request)
    {
        if (($requiredError = static::hasPaymentFields($request)) !== true) {
            return $requiredError;
        }

        $process = pay('payment_process', 'charge');
        $inputs = static::getInputs($request, ['token', 'type', 'customer', 'items', 'extra_amounts', 'shipping']);

        $customer = static::only($inputs->get('customer'), ['name', 'email', 'phone']);
        $items = new Collection($inputs->get('items'));
        $extraAmounts = new Collection($inputs->get('extra_amounts'));
        $token = $inputs->get('token');
        $type = $inputs->get('type');

        $customerError = static::validateCustomer($customer);
        $itemsError = static::validateItems($items);
        $extraAmountsError = static::validateExtraAmounts($extraAmounts);
        $shippingError = [];

        if (kpHasShipping()) {
            $shipping = static::only($inputs->get('shipping'), ['address', 'state', 'city', 'postal_code', 'country']);
            $shippingError = static::validateShipping($shipping);
        }

        if ($customerError || $itemsError || $shippingError || $extraAmountsError) {
            return static::hasErrors($customerError, $itemsError, $shippingError, $extraAmountsError);
        } else {
            try {
                $payment = Payment::$process(
                    $customer,
                    $items,
                    $extraAmounts,
                    $token,
                    $type,
                    $shipping ?? null,
                );
                return [
                    'redirect' => url(pay('redirect', 'thanks'), ['params' => ['id' => $payment->uuid]]),
                    'success' => true,
                    'error' => false,
                ];
            } catch (Exception $e) {
                return [
                    'success' => false,
                    'error' => true,
                    'errors' => $e->getMessage(),
                ];
            }
        }
    }

    /**
     * Handle a payment order creation
     *
     * @param Request $request
     * @return array|bool
     */
    public static function handleCreateOrder(Request $request)
    {
        if (($requiredError = static::hasOrderFields($request)) !== true) {
            return $requiredError;
        }

        $inputs = static::getInputs($request, ['id', 'items', 'extra_amounts', 'shipping']);

        $items = new Collection($inputs->get('items'));
        $extraAmounts = new Collection($inputs->get('extra_amounts'));
        $uuid = $inputs->get('id');

        $itemsError = static::validateItems($items);
        $extraAmountsError = static::validateExtraAmounts($extraAmounts);
        $shippingError = [];

        if (kpHasShipping()) {
            $shipping = static::only($inputs->get('shipping'), ['address', 'state', 'city', 'postal_code', 'country']);
            $shippingError = static::validateShipping($shipping);
        }

        if ($itemsError || $shippingError || $extraAmountsError) {
            return static::hasErrors($itemsError, $shippingError, $extraAmountsError);
        } else {
            if ($resource = Customer::find($uuid)) {
                try {
                    $payment = Payment::orderWithCustomer(
                        $resource,
                        $items,
                        $extraAmounts,
                        'card',
                        $shipping ?? null,
                    );

                    return [
                        'redirect' => url(pay('redirect', 'thanks'), ['params' => ['id' => $payment->uuid]]),
                        'success' => true,
                        'error' => false,
                    ];
                } catch (Exception $e) {
                    return [
                        'success' => false,
                        'error' => true,
                        'errors' => $e->getMessage(),
                    ];
                }
            }
            return [
                'success' => false,
                'error' => true,
                'errors' => kpT('validation.customer.not-found'),
            ];
        }
    }

    /**
     * Handle a customer creation
     *
     * @param Request $request
     * @return array|bool
     */
    public static function handleCreateCustomer(Request $request)
    {
        if (($requiredError = static::hasCustomerFields($request)) !== true) {
            return $requiredError;
        }

        $inputs = static::getInputs($request, ['token', 'customer']);
        $customer = static::only($inputs->get('customer'), ['name', 'email', 'phone']);
        $token = $inputs->get('token');

        $customerError = static::validateCustomer($customer);

        if ($customerError) {
            return static::hasErrors($customerError);
        } else {
            try {
                $resource = Customer::create(
                    new Buyer(
                        $customer['name'],
                        $customer['email'],
                        $customer['phone'],
                    ),
                    $token,
                    'card',
                );
                return [
                    'redirect' => url(pay('redirect_customer_create', 'customer'), ['params' => ['id' => $resource->uuid]]),
                    'success' => true,
                    'error' => false,
                ];
            } catch (Exception $e) {
                return [
                    'success' => false,
                    'error' => true,
                    'errors' => $e->getMessage(),
                ];
            }
        }
    }

    /**
     * Handle to update a customer information
     *
     * @param Request $request
     * @return array|bool
     */
    public static function handleUpdateCustomer(Request $request)
    {
        if (($requiredError = static::hasCustomerUpdateFields($request)) !== true) {
            return $requiredError;
        }

        $inputs = static::getInputs($request, ['id', 'customer']);
        $customer = static::only($inputs->get('customer'), ['name', 'email', 'phone']);
        $uuid = $inputs->get('id');

        $customerError = static::validateCustomer($customer);

        if ($customerError) {
            return static::hasErrors($customerError);
        } else {
            try {
                if ($resource = Customer::find($uuid)) {
                    $resource->update(
                        new Buyer(
                            $customer['name'],
                            $customer['email'],
                            $customer['phone'],
                        )
                    );
                    return [
                        'redirect' => url(pay('redirect_customer_update', 'profile'), ['params' => ['action' => 'customer-update']]),
                        'success' => true,
                        'error' => false,
                    ];
                }
                return [
                    'success' => false,
                    'error' => true,
                    'errors' => kpT('validation.customer.not-found'),
                ];
            } catch (Exception $e) {
                return [
                    'success' => false,
                    'error' => true,
                    'errors' => $e->getMessage(),
                ];
            }
        }
    }

    /**
     * Handle to update a customer source
     *
     * @param Request $request
     * @return array|bool
     */
    public static function handleUpdateSource(Request $request)
    {
        if (($requiredError = static::hasSourceUpdateFields($request)) !== true) {
            return $requiredError;
        }

        $inputs = static::getInputs($request, ['id', 'token']);
        $uuid = $inputs->get('id');
        $token = $inputs->get('token');

        try {
            if ($resource = Customer::find($uuid)) {
                $resource->updateSource($token);
                return [
                    'redirect' => url(pay('redirect_source_update', 'profile'), ['params' => ['action' => 'source-update']]),
                    'success' => true,
                    'error' => false,
                ];
            }
            return [
                'success' => false,
                'error' => true,
                'errors' => kpT('validation.customer.not-found'),
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => true,
                'errors' => $e->getMessage(),
            ];
        }
    }
}
