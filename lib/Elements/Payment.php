<?php

namespace Beebmx\KirbyPay\Elements;

use Beebmx\KirbyPay\Contracts\Elementable;
use Illuminate\Support\Str;

abstract class Payment implements Elementable
{
    /**
     * Payment ID
     *
     * @var string|int
     */
    public $id;

    /**
     * Payment currency
     *
     * @var string
     */
    public $currency;

    /**
     * Payment amount
     *
     * @var float
     */
    public $amount;

    /**
     * Payment status
     *
     * @var string
     */
    public $status;

    /**
     * Payment customer
     *
     * @var Buyer
     */
    public $customer;

    /**
     * Payment items
     *
     * @var Items
     */
    public $items;

    /**
     * Payment shipping
     *
     * @var Shipping|null
     */
    public $shipping;

    /**
     * Payment extra values
     *
     * @var array|null
     */
    public $extra;

    /**
     * Create an instance of Payment
     *
     * @param $id
     * @param string $status
     * @param Buyer $customer
     * @param Items $items
     * @param Shipping|null $shipping
     * @param array|null $extra
     */
    public function __construct($id, string $status, Buyer $customer, Items $items, Shipping $shipping = null, array $extra = null)
    {
        $this->id = $id;
        $this->status = $status;
        $this->customer = $customer;
        $this->items = $items;
        $this->shipping = $shipping;
        $this->extra = $extra;

        $this->currency = Str::upper(pay('currency', 'usd'));
        $this->amount = $items->amount();
    }

    /**
     * Get the attributes of Payment as array
     *
     * @return array
     */
    public function toArray(): array
    {
        return [];
    }
}
