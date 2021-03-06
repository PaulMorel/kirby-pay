<?php

namespace Beebmx\KirbyPay\Tests;

use Beebmx\KirbyPay\Customer;
use Beebmx\KirbyPay\Elements\Buyer;
use Beebmx\KirbyPay\Elements\Extras;
use Beebmx\KirbyPay\Elements\Item;
use Beebmx\KirbyPay\Elements\Items;
use Beebmx\KirbyPay\Elements\Shipping;
use Beebmx\KirbyPay\Payment;
use Illuminate\Support\Collection;
use Kirby\Cms\App;
use Kirby\Toolkit\Dir;

class PaymentTest extends TestCase
{
    public $buyer;

    public $items;

    public $shipping;

    public function setUp(): void
    {
        new App([
            'roots' => [
                'index' => '/dev/null',
            ],
            'options' => [
                'beebmx.kirby-pay.storage' => __DIR__ . '/tmp',
            ]
        ]);

        $this->buyer = new Collection([
            'name' => 'John Doe',
            'email' => 'example@email.com',
            'phone' => '1122334455'
        ]);

        $this->items = new Collection([
            ['id' => 'product-01', 'name' => 'Product 01', 'amount' => 100, 'quantity' => 1],
            ['id' => 'product-02', 'name' => 'Product 02', 'amount' => 100, 'quantity' => 1],
        ]);

        $this->shipping = new Collection([
            'address' => 'Know address 123',
            'postal_code' => '12345',
            'city' => 'City',
            'state' => 'State',
            'country' => 'US'
        ]);
    }

    public function tearDown(): void
    {
        Dir::remove(__DIR__ . '/tmp/payment');
        Dir::remove(__DIR__ . '/tmp/customer');
    }

    /** @test */
    public function a_payment_can_creates_an_order()
    {
        $this->assertTrue(Payment::isEmpty());
        Payment::order($this->buyer, $this->items, null, 'token');

        $this->assertFalse(Payment::isEmpty());
        $this->assertEquals(1, Payment::count());
        $this->assertCount(1, Payment::get());
        $this->assertNotNull(Payment::first()->status);
        $this->assertEquals('paid', Payment::first()->status);
        $this->assertEquals('order', Payment::first()->type);
        $this->assertArrayHasKey('name', Payment::first()->customer);
        $this->assertArrayHasKey('email', Payment::first()->customer);
        $this->assertArrayHasKey('phone', Payment::first()->customer);
        $this->assertSameSize($this->items->toArray(), Payment::first()->items);
    }

    /** @test */
    public function a_payment_can_creates_an_order_with_elements()
    {
        $this->assertTrue(Payment::isEmpty());
        Payment::order(
            new Buyer(
                'John Doe',
                'example@email.com',
                '1122334455'
            ),
            new Items([
                new Item('Product 01', 100, 1, 'product-01'),
                new Item('Product 02', 100, 1, 'product-02'),
            ]),
            null,
            'token'
        );

        $this->assertFalse(Payment::isEmpty());
        $this->assertEquals(1, Payment::count());
        $this->assertCount(1, Payment::get());
        $this->assertNotNull(Payment::first()->status);
        $this->assertEquals('paid', Payment::first()->status);
        $this->assertEquals('order', Payment::first()->type);
        $this->assertArrayHasKey('name', Payment::first()->customer);
        $this->assertArrayHasKey('email', Payment::first()->customer);
        $this->assertArrayHasKey('phone', Payment::first()->customer);
        $this->assertSameSize($this->items->toArray(), Payment::first()->items);
    }

    /** @test */
    public function a_payment_with_an_order_also_creates_a_customer()
    {
        $this->assertTrue(Customer::isEmpty());
        Payment::order($this->buyer, $this->items, null, 'token');

        $this->assertFalse(Customer::isEmpty());
        $this->assertEquals(1, Customer::count());
        $this->assertCount(1, Customer::get());
    }

    /** @test */
    public function a_payment_creates_an_order_with_an_existing_customer()
    {
        $this->assertTrue(Customer::isEmpty());
        $this->assertTrue(Payment::isEmpty());
        $buyer = new Buyer(
            $this->buyer['name'],
            $this->buyer['email'],
            $this->buyer['phone'],
        );
        $customer = Customer::create($buyer, 'token');
        $this->assertTrue(Customer::isNotEmpty());
        $this->assertCount(1, Customer::get());

        Payment::orderWithCustomer($customer, $this->items);
        $this->assertCount(1, Customer::get());
        $this->assertTrue(Payment::isNotEmpty());
    }

    /** @test */
    public function a_payment_can_creates_a_charge()
    {
        $this->assertTrue(Payment::isEmpty());
        Payment::charge($this->buyer, $this->items, null, 'token');

        $this->assertFalse(Payment::isEmpty());
        $this->assertEquals(1, Payment::count());
        $this->assertCount(1, Payment::get());
        $this->assertNotNull(Payment::first()->status);
        $this->assertEquals('paid', Payment::first()->status);
        $this->assertEquals('charge', Payment::first()->type);
        $this->assertArrayHasKey('name', Payment::first()->customer);
        $this->assertArrayHasKey('email', Payment::first()->customer);
        $this->assertArrayHasKey('phone', Payment::first()->customer);
        $this->assertSameSize($this->items->toArray(), Payment::first()->items);
    }

    /** @test */
    public function a_payment_can_creates_a_charge_with_elements()
    {
        $this->assertTrue(Payment::isEmpty());
        Payment::charge(
            new Buyer(
                'John Doe',
                'example@email.com',
                '1122334455'
            ),
            new Items([
                new Item('Product 01', 100, 1, 'product-01'),
                new Item('Product 02', 100, 1, 'product-02'),
            ]),
            null,
            'token'
        );

        $this->assertFalse(Payment::isEmpty());
        $this->assertEquals(1, Payment::count());
        $this->assertCount(1, Payment::get());
        $this->assertNotNull(Payment::first()->status);
        $this->assertEquals('paid', Payment::first()->status);
        $this->assertEquals('charge', Payment::first()->type);
        $this->assertArrayHasKey('name', Payment::first()->customer);
        $this->assertArrayHasKey('email', Payment::first()->customer);
        $this->assertArrayHasKey('phone', Payment::first()->customer);
        $this->assertSameSize($this->items->toArray(), Payment::first()->items);
    }

    /** @test */
    public function a_payment_with_a_charge_never_creates_a_customer()
    {
        $this->assertTrue(Customer::isEmpty());
        Payment::charge($this->buyer, $this->items, null,'token');

        $this->assertTrue(Customer::isEmpty());
        $this->assertEquals(0, Customer::count());
        $this->assertCount(0, Customer::get());
    }

    /** @test */
    public function a_payment_returns_an_array_with_the_driver_method_payments()
    {
        $this->assertIsArray(Payment::getPaymentMethods());
        $this->assertEquals('card', Payment::getPaymentMethods()[0]);
    }

    /** @test */
    public function a_payment_parse_amount_with_driver_method()
    {
        $this->assertEquals(200, Payment::parseAmount(200));
    }

    /** @test */
    public function an_order_payment_can_has_shipping()
    {
        Payment::order($this->buyer, $this->items, null, 'token', 'card', $this->shipping);

        $this->assertCount(1, Payment::get());
        $this->assertEquals($this->shipping->toArray(), Payment::first()->shipping);
    }

    /** @test */
    public function an_order_payment_can_has_shipping_with_elements()
    {
        Payment::order(
            new Buyer(
                'John Doe',
                'example@email.com',
                '1122334455'
            ),
            new Items([
                new Item('Product 01', 100, 1, 'product-01'),
                new Item('Product 02', 100, 1, 'product-02'),
            ]),
            null,
            'token',
            'card',
            new Shipping(
                'Know address 123',
                '12345',
                'City',
                'State',
                'US'
            )
        );

        $this->assertCount(1, Payment::get());
        $this->assertEquals($this->shipping->toArray(), Payment::first()->shipping);
    }

    /** @test */
    public function a_charge_payment_can_has_shipping()
    {
        Payment::charge($this->buyer, $this->items, null, 'token', 'card', $this->shipping);

        $this->assertCount(1, Payment::get());
        $this->assertEquals($this->shipping->toArray(), Payment::first()->shipping);
    }

    /** @test */
    public function a_charge_payment_can_has_shipping_with_elements()
    {
        Payment::charge(
            new Buyer(
                'John Doe',
                'example@email.com',
                '1122334455'
            ),
            new Items([
                new Item('Product 01', 100, 1, 'product-01'),
                new Item('Product 02', 100, 1, 'product-02'),
            ]),
            null,
            'token',
            'card',
            new Shipping(
                'Know address 123',
                '12345',
                'City',
                'State',
                'US'
            )
        );

        $this->assertCount(1, Payment::get());
        $this->assertEquals($this->shipping->toArray(), Payment::first()->shipping);
    }

    /** @test */
    public function an_order_payment_has_an_email_attribute()
    {
        Payment::order(
            new Buyer(
                'John Doe',
                'example@email.com',
                '1122334455'
            ),
            new Items([
                new Item('Product 01', 100, 1, 'product-01'),
                new Item('Product 02', 100, 1, 'product-02'),
            ]),
            null,
            'token',
            'card',
            new Shipping(
                'Know address 123',
                '12345',
                'City',
                'State',
                'US'
            )
        );

        $this->assertCount(1, Payment::get());
        $this->assertEquals('example@email.com', Payment::first()->email);
    }

    /** @test */
    public function a_charge_payment_has_an_email_attribute()
    {
        Payment::charge(
            new Buyer(
                'John Doe',
                'example@email.com',
                '1122334455'
            ),
            new Items([
                new Item('Product 01', 100, 1, 'product-01'),
                new Item('Product 02', 100, 1, 'product-02'),
            ]),
            null,
            'token',
            'card',
            new Shipping(
                'Know address 123',
                '12345',
                'City',
                'State',
                'US'
            )
        );

        $this->assertCount(1, Payment::get());
        $this->assertEquals('example@email.com', Payment::first()->email);
    }

    /** @test */
    public function an_order_payment_has_a_correct_amount_without_extras()
    {
        Payment::order(
            new Buyer(
                'John Doe',
                'example@email.com',
                '1122334455'
            ),
            new Items([
                new Item('Product 01', 100, 1, 'product-01'),
                new Item('Product 02', 100, 1, 'product-02'),
            ]),
            null,
            'token',
            'card',
            new Shipping(
                'Know address 123',
                '12345',
                'City',
                'State',
                'US'
            )
        );

        $this->assertCount(1, Payment::get());
        $this->assertEquals('$200.00', Payment::first()->amount);
    }

    /** @test */
    public function an_charge_payment_has_a_correct_amount_without_extras()
    {
        Payment::charge(
            new Buyer(
                'John Doe',
                'example@email.com',
                '1122334455'
            ),
            new Items([
                new Item('Product 01', 100, 1, 'product-01'),
                new Item('Product 02', 100, 1, 'product-02'),
            ]),
            null,
            'token',
            'card',
            new Shipping(
                'Know address 123',
                '12345',
                'City',
                'State',
                'US'
            )
        );

        $this->assertCount(1, Payment::get());
        $this->assertEquals('$200.00', Payment::first()->amount);
    }

    /** @test */
    public function an_order_payment_has_a_correct_amount_with_extras()
    {
        Payment::order(
            new Buyer(
                'John Doe',
                'example@email.com',
                '1122334455'
            ),
            new Items([
                new Item('Product 01', 100, 1, 'product-01'),
                new Item('Product 02', 100, 1, 'product-02'),
            ]),
            new Extras([
                'shipping' => 100,
                'taxes' => 40.20,
            ]),
            'token',
            'card',
            new Shipping(
                'Know address 123',
                '12345',
                'City',
                'State',
                'US'
            )
        );

        $this->assertCount(1, Payment::get());
        $this->assertEquals('$340.20', Payment::first()->amount);
    }

    /** @test */
    public function an_charge_payment_has_a_correct_amount_with_extras()
    {
        Payment::charge(
            new Buyer(
                'John Doe',
                'example@email.com',
                '1122334455'
            ),
            new Items([
                new Item('Product 01', 100, 1, 'product-01'),
                new Item('Product 02', 100, 1, 'product-02'),
            ]),
            new Extras([
                'shipping' => 100,
                'taxes' => 40.20,
            ]),
            'token',
            'card',
            new Shipping(
                'Know address 123',
                '12345',
                'City',
                'State',
                'US'
            )
        );

        $this->assertCount(1, Payment::get());
        $this->assertEquals('$340.20', Payment::first()->amount);
    }

    /** @test */
    public function an_order_payment_has_an_extra_amounts_attribute()
    {
        Payment::order(
            new Buyer(
                'John Doe',
                'example@email.com',
                '1122334455'
            ),
            new Items([
                new Item('Product 01', 100, 1, 'product-01'),
                new Item('Product 02', 100, 1, 'product-02'),
            ]),
            null,
            'token',
            'card',
            new Shipping(
                'Know address 123',
                '12345',
                'City',
                'State',
                'US'
            )
        );

        $this->assertCount(1, Payment::get());
        $this->assertArrayHasKey('extra_amounts', Payment::first());
    }

    /** @test */
    public function a_charge_payment_has_an_extra_amounts_attribute()
    {
        Payment::charge(
            new Buyer(
                'John Doe',
                'example@email.com',
                '1122334455'
            ),
            new Items([
                new Item('Product 01', 100, 1, 'product-01'),
                new Item('Product 02', 100, 1, 'product-02'),
            ]),
            null,
            'token',
            'card',
            new Shipping(
                'Know address 123',
                '12345',
                'City',
                'State',
                'US'
            )
        );

        $this->assertCount(1, Payment::get());
        $this->assertArrayHasKey('extra_amounts', Payment::first());
    }
}
