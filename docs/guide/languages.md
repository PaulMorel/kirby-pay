# Languages

[[toc]]

## Localization

Out of the box are 2 languages (english and spanish), and the only thing you need to use it is to set this in your `config.php` with the proper [language](https://getkirby.com/docs/guide/languages/introduction).
This can sound a limitation for some other languages, but fortunately is not.

Here is the full list of localizations:

```php
<?php

return [
    //Form view
    'beebmx.kirby-pay.general' => 'General',
    'beebmx.kirby-pay.name' => 'Name',
    'beebmx.kirby-pay.email' => 'Email',
    'beebmx.kirby-pay.phone' => 'Phone',

    'beebmx.kirby-pay.payment-methods-title' => 'Select a payment method',
    'beebmx.kirby-pay.payment.card' => 'Cards',
    'beebmx.kirby-pay.payment-method.card' => 'Credit card',
    'beebmx.kirby-pay.payment.card.description' => 'Credit and debit cards',
    'beebmx.kirby-pay.payment-method.oxxo_cash' => 'Oxxo pay',
    'beebmx.kirby-pay.payment.oxxo_cash.description' => 'Pay later in Oxxo',

    //Form shipping
    'beebmx.kirby-pay.address-send' => 'Shipping Address',
    'beebmx.kirby-pay.address' => 'Address',
    'beebmx.kirby-pay.state' => 'State',
    'beebmx.kirby-pay.city' => 'City',
    'beebmx.kirby-pay.postal-code' => 'Postal code',
    'beebmx.kirby-pay.country' => 'Country',
    'beebmx.kirby-pay.country-select' => 'Please select a country',

    //Form card
    'beebmx.kirby-pay.payment-information' => 'Payment information',
    'beebmx.kirby-pay.card-name' => 'Card name',
    'beebmx.kirby-pay.card-number' => 'Card number',
    'beebmx.kirby-pay.card-month' => 'MM',
    'beebmx.kirby-pay.card-year' => 'YY',
    'beebmx.kirby-pay.card-cvc' => 'CVC',

    //Form buttons
    'beebmx.kirby-pay.pay' => 'Make payment',
    'beebmx.kirby-pay.pay-process' => 'Processing payment',
    'beebmx.kirby-pay.customer-create' => 'Customer registration',
    'beebmx.kirby-pay.customer-create-process' => 'Processing customer',
    'beebmx.kirby-pay.customer-update' => 'Update customer',
    'beebmx.kirby-pay.customer-update-process' => 'Processing customer',
    'beebmx.kirby-pay.source-update' => 'Update payment method',
    'beebmx.kirby-pay.source-update-process' => 'Processing payment method',

    //Form validations
    'beebmx.kirby-pay.validation.name' => 'Please enter a valid name',
    'beebmx.kirby-pay.validation.email' => 'Please enter a valid email address',
    'beebmx.kirby-pay.validation.phone' => 'Please enter a valid phone number',
    'beebmx.kirby-pay.validation.address' => 'Please enter a valid address',
    'beebmx.kirby-pay.validation.state' => 'Please enter a valid state',
    'beebmx.kirby-pay.validation.postal-code' => 'Please enter a valid postal code',
    'beebmx.kirby-pay.validation.country' => 'Please select a country',
    'beebmx.kirby-pay.validation.token' => 'The token not exists or is incorrect',
    'beebmx.kirby-pay.validation.type' => 'It\'s required a payment method "type"',
    'beebmx.kirby-pay.validation.customer' => 'It\'s required an object "customer"',
    'beebmx.kirby-pay.validation.items' => 'It\'s required an object "items"',
    'beebmx.kirby-pay.validation.shopping' => 'It\'s required an object "shopping"',
    'beebmx.kirby-pay.validation.items.name' => 'Please enter the name of the item',
    'beebmx.kirby-pay.validation.items.amount' => 'Please enter the amount of the item',
    'beebmx.kirby-pay.validation.items.quantity' => 'Please enter the quantity of the item',
    'beebmx.kirby-pay.error' => 'An error occurred',
    'beebmx.kirby-pay.validation.customer.not-found' => 'Customer not found',

    //Panel view
    'view.payments' => 'Payments',
    'view.payment' => 'Payment',
    'view.customers' => 'Customers',
    'view.customer' => 'Customer',
    'view.development' => 'Development',
    'beebmx.kirby-pay.view.payments' => 'Payments',
    'beebmx.kirby-pay.view.payment' => 'Payment',
    'beebmx.kirby-pay.view.customer' => 'Customer',
    'beebmx.kirby-pay.view.customers' => 'Customers',
    'beebmx.kirby-pay.view.items' => 'Items',
    'beebmx.kirby-pay.view.purchases' => 'Purchases',
    'beebmx.kirby-pay.view.purchase' => 'Purchase',
    'beebmx.kirby-pay.view.shipping' => 'Shipping',
    'beebmx.kirby-pay.view.summary' => 'Summary',
    'beebmx.kirby-pay.view.status' => 'Status',
    'beebmx.kirby-pay.view.next' => 'Next',
    'beebmx.kirby-pay.view.prev' => 'Previous',
    'beebmx.kirby-pay.view.payment_methods' => 'Payment Methods',
    'beebmx.kirby-pay.view.payment_method' => 'Payment Method',
    'beebmx.kirby-pay.view.charges' => 'Charges',
    'beebmx.kirby-pay.view.development' => 'Development',
    'beebmx.kirby-pay.view.webhook' => 'Webhook',
    'beebmx.kirby-pay.view.extra' => 'Extra',

    //Panel table
    'beebmx.kirby-pay.table.id' => 'ID',
    'beebmx.kirby-pay.table.payment_id' => 'Service ID',
    'beebmx.kirby-pay.table.name' => 'Name',
    'beebmx.kirby-pay.table.email' => 'Email',
    'beebmx.kirby-pay.table.phone' => 'Phone',
    'beebmx.kirby-pay.table.purchase' => 'Purchase',
    'beebmx.kirby-pay.table.items' => 'Items',
    'beebmx.kirby-pay.table.item' => 'Item',
    'beebmx.kirby-pay.table.amount' => 'Amount',
    'beebmx.kirby-pay.table.quantity' => 'Quantity',
    'beebmx.kirby-pay.table.address' => 'Address',
    'beebmx.kirby-pay.table.state' => 'State',
    'beebmx.kirby-pay.table.city' => 'City',
    'beebmx.kirby-pay.table.postal_code' => 'Código postal',
    'beebmx.kirby-pay.table.country' => 'Country',
    'beebmx.kirby-pay.table.created_at' => 'Date',
    'beebmx.kirby-pay.table.updated_at' => 'Date',
    'beebmx.kirby-pay.table.currency' => 'Currency',
    'beebmx.kirby-pay.table.status' => 'Status',
    'beebmx.kirby-pay.table.type' => 'Methodo de pago',
    'beebmx.kirby-pay.table.last4' => 'Last 4 digits',
    'beebmx.kirby-pay.table.brand' => 'Brand',
    'beebmx.kirby-pay.table.expires_at' => 'Expires at',
    'beebmx.kirby-pay.table.barcode_url' => 'Barcode',
    'beebmx.kirby-pay.table.reference' => 'Reference',
    'beebmx.kirby-pay.table.fee' => 'Fee',
    'beebmx.kirby-pay.table.payment_method' => 'Método de pago',
    'beebmx.kirby-pay.table.customer_id' => 'Client ID',
    'beebmx.kirby-pay.table.url' => 'URL',

    //Panel status
    'beebmx.kirby-pay.status.pending_payment' => 'Pending payment',
    'beebmx.kirby-pay.status.declined' => 'Declined',
    'beebmx.kirby-pay.status.expired' => 'Expired',
    'beebmx.kirby-pay.status.paid' => 'Paid',
    'beebmx.kirby-pay.status.refunded' => 'Refunded',
    'beebmx.kirby-pay.status.partially_refunded' => 'Partially refunded',
    'beebmx.kirby-pay.status.charged_back' => 'Charged back',
    'beebmx.kirby-pay.status.pre_authorized' => 'Pre authorized',
    'beebmx.kirby-pay.status.voided' => 'Voided',
    'beebmx.kirby-pay.status.created' => 'Created',
    'beebmx.kirby-pay.status.fulfilled' => 'Fulfilled',
    'beebmx.kirby-pay.status.succeeded' => 'Succeeded',

    //Oxxo
    'beebmx.kirby-pay.oxxo.pay' => 'OXXOPay',
    'beebmx.kirby-pay.oxxo.reminder' => 'Digital Stub. Printing is not necessary.',
    'beebmx.kirby-pay.oxxo.amount' => 'Amount due',
    'beebmx.kirby-pay.oxxo.hint' => 'OXXO will charge an additional fee at the time of payment.',
    'beebmx.kirby-pay.oxxo.reference' => 'Reference',
    'beebmx.kirby-pay.oxxo.instructions' => 'Instructions',
    'beebmx.kirby-pay.oxxo.step.1.1' => 'Go to the nearest OXXO store.',
    'beebmx.kirby-pay.oxxo.step.1.2' => 'Find it here',
    'beebmx.kirby-pay.oxxo.step.2.1' => 'Tell the cashier that you want to make an',
    'beebmx.kirby-pay.oxxo.step.2.2' => ' payment.',
    'beebmx.kirby-pay.oxxo.step.3' => 'Dictate the cashier the reference number on this stub.',
    'beebmx.kirby-pay.oxxo.step.4' => 'Make the payment with cash.',
    'beebmx.kirby-pay.oxxo.step.5.1' => 'To confirm your payment, the cashier will hand you a printed receipt.',
    'beebmx.kirby-pay.oxxo.step.5.2' => 'Check on it that it was performed correctly.',
    'beebmx.kirby-pay.oxxo.alert.1' => 'When completing these steps you will receive confirmation email from',
    'beebmx.kirby-pay.oxxo.alert.2' => '.',
];
```

::: tip
This not only applies to new localizations, if you want to change the default values, you can do it in the same way.
:::

## Example

To customize this with your [language](https://getkirby.com/docs/guide/languages/introduction#adding-languages) you can setup the localization:

```php
<?php

return [
    'code' => 'pt',
    'direction' => 'ltr',
    'locale' => 'pt_BR',
    'name' => 'Português',
    'url' => '/pt',
    'translations' => [
        'beebmx.kirby-pay.general' => 'Geral',
        'beebmx.kirby-pay.name' => 'Nome',
        'beebmx.kirby-pay.phone' => 'telefone',
        'beebmx.kirby-pay.payment-information' => 'Informação de pagamento'
    ]
];
``` 