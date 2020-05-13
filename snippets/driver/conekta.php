<div class="kirby-pay">
    <form class="<?= kpStyle('form', 'kp-form') ?>" x-data="kirbyPay()" x-init="mount" @submit.prevent="setConekta">
        <input type="hidden" x-model="type">

        <?php snippet('kirby-pay.form.customer') ?>
        <?php snippet('kirby-pay.form.shipping') ?>
        <?php snippet('kirby-pay.form.payment-methods') ?>

        <?php if(in_array('card', kpPaymentMethods())): ?>
        <fieldset x-show="type === 'card'" class="<?= kpStyle('fieldset', 'kp-fieldset') ?> <?= kpStyle('background', 'kp-bg-transparent') ?>">
            <legend class="<?= kpStyle('legend', 'kp-legend') ?>"><?= kpT('payment-information') ?>:</legend>
            <div class="<?= kpStyle('field', 'kp-field') ?>">
                <label for="kp-card-name" class="<?= kpStyle('label', 'kp-label') ?>"><?= kpT('card-name') ?></label>
                <input id="kp-card-name" name="kp-card-name" type="text" class="<?= kpStyle('input', 'kp-input') ?> <?= kpStyle('background', 'kp-bg-transparent') ?>" aria-label="Card name" required placeholder="<?= kpT('card-name') ?>" size="20" x-model="data.card_name" data-conekta="card[name]">
            </div>
            <div class="<?= kpStyle('field', 'kp-field') ?>">
                <label for="kp-card-number" class="<?= kpStyle('label', 'kp-label') ?>"><?= kpT('card-number') ?></label>
                <input id="kp-card-number" name="kp-card-number" type="text" class="<?= kpStyle('input', 'kp-input') ?> <?= kpStyle('background', 'kp-bg-transparent') ?>" aria-label="Card number" required max="16" placeholder="<?= kpT('card-number') ?>" size="20" x-model="data.card_number" data-conekta="card[number]">
            </div>
            <div class="<?= kpStyle('field', 'kp-field') ?>">
                <div class="kp-flex kp-items-center kp-w-1/2">
                    <input type="text" class="kp-input-month <?= kpStyle('input', 'kp-input') ?> <?= kpStyle('background', 'kp-bg-transparent') ?>" aria-label="Card expiration month" maxlength="2" size="2" required placeholder="<?= kpT('card-month') ?>" x-model="data.card_month" data-conekta="card[exp_month]">
                    <span>/</span>
                    <input type="text" class="kp-input-year <?= kpStyle('input', 'kp-input') ?> <?= kpStyle('background', 'kp-bg-transparent') ?>" aria-label="Card expiration year" maxlength="3" size="4" required placeholder="<?= kpT('card-year') ?>" x-model="data.card_year" data-conekta="card[exp_year]">
                </div>
                <div class="kp-w-1/2 kp">
                    <input class="<?= kpStyle('input', 'kp-input') ?> <?= kpStyle('background', 'kp-bg-transparent') ?>" aria-label="Card CVC" maxlength="4" size="4" required placeholder="<?= kpT('card-cvc') ?>" x-model="data.card_cvc" data-conekta="card[cvc]">
                </div>
            </div>
        </fieldset>
        <?php endif ?>

        <?php snippet('kirby-pay.form.errors') ?>
        <?php snippet('kirby-pay.form.button') ?>
    </form>
</div>
<script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
<script type="text/javascript" >
  Conekta.setPublicKey('<?= pay('service_key') ?>');

  function kirbyPay() {
    return {
      <?php snippet('kirby-pay.js.data') ?>
      mount: function(){
<?php if((bool) pay('shipping')): ?>
        axios.get('https://restcountries.eu/rest/v2/all')
          .then(function (response) {
            this.countries = response.data.map(function(country) {
              return {
                value: country.alpha2Code,
                label: country.translations['<?= substr(kirby()->language()->code(), 0, 2) ?>'] || country.name,
              };
            })
          }.bind(this))
<?php endif ?>
        var token = document.head.querySelector('meta[name="csrf-token"]');
        if (token) {
          window.axios.defaults.headers.common['x-csrf'] = token.content;
        } else {
          console.error('CSRF token not found');
        }
      },
      setConekta: function() {
        this.process = true;
        this.showErrors = [];
        if (this.type === 'card') {
          this.requestToken()
        } else {
          this.send()
        }
      },
      requestToken: function() {
        Conekta.Token.create(this.$el, this.send.bind(this), this.conektaErrorResponseHandler.bind(this));
      },
      send: function(token) {
        var response = function(response) {
          !response.data.errors
            ? this.handleSuccess(response.data)
            : this.handleErrors(response.data)
        }.bind(this)

        axios({
          url: '<?= kpUrl("payment.create") ?>',
          method: '<?= kpMethod("payment.create") ?>',
          data: {
            name: this.data.name,
            email: this.data.email,
            phone: this.data.phone,
<?php if((bool) pay('shipping')): ?>
            address: this.data.address,
            state: this.data.state,
            city: this.data.city,
            postal_code: this.data.postal_code,
            country: this.data.country,
<?php endif ?>
            items: <?= json_encode($items) ?>,
            token: token ? token.id : null,
            type: this.type,
          }
        }).then(response)
      },
      conektaErrorResponseHandler: function(response) {
        this.process = false;
        this.showErrors = [
          response.message_to_purchaser
        ]
      },
      handleSuccess: function(data) {
        if (!data.errors) {
          window.location = data.redirect;
        } else {
          this.process = false;
          this.setErrors(data.errors)
        }
      },
      handleErrors: function(data) {
        this.process = false;
        this.errors = data.errors
        this.setErrors(data.errors)
      },
      error: function(key) {
        return this.errors.hasOwnProperty(key)
      },
      setErrors: function(errors) {
        if (typeof errors === 'string') {
          this.showErrors = [errors]
        } else {
          this.showErrors = Object.keys(this.errors).map(function(key) {
            return this.errors[key]
          }.bind(this))
        }
      },
    }
  }
</script>