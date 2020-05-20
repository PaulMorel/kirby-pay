<?php

namespace Beebmx\KirbyPay\Elements;

use Beebmx\KirbyPay\Contracts\Elementable;

class Item implements Elementable
{
    public $name;

    public $amount;

    public $quantity;

    public $id;

    public function __construct(string $name, float $amount, int $quantity, $id = null)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->quantity = $quantity;
        $this->id = $id;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'amount' => $this->amount,
            'quantity' => $this->quantity,
        ];
    }
}
