<?php if(($items ?? null)): ?>
<?php
    snippet('kirby-pay.payment.' . pay('service'), [
        'items' => $items,
        'customer' => $customer ?? [],
        'shipping' => $shipping ?? [],
        'card' => $card ?? [],
        'extra_amounts' => $extra_amounts ?? [],
    ])
?>
<?php else: ?>
<div class="kirby-pay">
    <div class="kp-font-lg kp-text-center kp-mb-4">Error in Kirby Pay</div>
    <ul class="kp-bg-white rounded kp-px-5 kp-py-4 kp-text-gray-dark">
        <?php if (!isset($items) || !count($items)): ?><li class="kp-my-1"><span class="kp-bg-gray-light kp-px-1 kp-mr-2 kp-inline-block rounded">$items </span> is required</li><?php endif ?>
    </ul>
</div>
<?php endif ?>
