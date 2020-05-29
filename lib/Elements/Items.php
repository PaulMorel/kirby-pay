<?php

namespace Beebmx\KirbyPay\Elements;

use Beebmx\KirbyPay\Contracts\Elementable;
use Beebmx\KirbyPay\Exception\ItemException;
use Illuminate\Support\Collection;

class Items implements Elementable
{
    public $items;

    public function __construct(array $items = [])
    {
        foreach($items as $item) {
            if (!$item instanceof Item) {
                throw new ItemException('Must provide an instance of Item Element');
            }
        }

        $this->items = new Collection($items);
    }

    public function put(Item $item)
    {
        $this->items->push($item);
    }

    public function count(): int
    {
        return $this->items->count();
    }

    public function amount(): float
    {
        return $this->items->sum(function($item) {
            return $item->amount * $item->quantity;
        });
    }

    public function totalQuantity(): int
    {
        return $this->items->sum(function($item) {
            return $item->quantity;
        });
    }

    public function all()
    {
        return $this->items;
    }

    public function toArray(): array
    {
        return $this->items->map(function($item) {
            return $item->toArray();
        })->toArray();
    }
}
