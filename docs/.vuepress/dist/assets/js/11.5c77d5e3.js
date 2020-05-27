(window.webpackJsonp=window.webpackJsonp||[]).push([[11],{356:function(t,e,s){"use strict";s.r(e);var r=s(43),_=Object(r.a)({},(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("ContentSlotsDistributor",{attrs:{"slot-key":t.$parent.slotKey}},[s("h1",{attrs:{id:"options"}},[s("a",{staticClass:"header-anchor",attrs:{href:"#options"}},[t._v("#")]),t._v(" Options")]),t._v(" "),s("p",[t._v("This package comes with many things to configure. All the options comes with the prefix "),s("code",[t._v("beebmx.kirby-pay.")]),t._v(".")]),t._v(" "),s("table",[s("thead",[s("tr",[s("th",[t._v("Option")]),t._v(" "),s("th",[t._v("Default")]),t._v(" "),s("th",[t._v("Value")]),t._v(" "),s("th",[t._v("Description")])])]),t._v(" "),s("tbody",[s("tr",[s("td",[t._v("env")]),t._v(" "),s("td",[t._v("production")]),t._v(" "),s("td",[t._v("(string)")]),t._v(" "),s("td",[t._v("Store if the enviroment is "),s("code",[t._v("local")]),t._v(", "),s("code",[t._v("test")]),t._v(" or "),s("code",[t._v("production")])])]),t._v(" "),s("tr",[s("td",[t._v("service")]),t._v(" "),s("td",[t._v("sandbox")]),t._v(" "),s("td",[t._v("(string)")]),t._v(" "),s("td",[s("code",[t._v("sandbox")]),t._v(", "),s("code",[t._v("stripe")]),t._v(" or "),s("code",[t._v("conekta")]),t._v("service")])]),t._v(" "),s("tr",[s("td",[t._v("service_key")]),t._v(" "),s("td",[t._v("null")]),t._v(" "),s("td",[t._v("(string)")]),t._v(" "),s("td",[t._v("Set the public key of the service")])]),t._v(" "),s("tr",[s("td",[t._v("service_secret")]),t._v(" "),s("td",[t._v("null")]),t._v(" "),s("td",[t._v("(string)")]),t._v(" "),s("td",[t._v("Set the secret key of the service")])]),t._v(" "),s("tr",[s("td",[t._v("locale")]),t._v(" "),s("td",[t._v("en_US")]),t._v(" "),s("td",[t._v("(string)")]),t._v(" "),s("td",[t._v("Set the locale for the services")])]),t._v(" "),s("tr",[s("td",[t._v("locale_code")]),t._v(" "),s("td",[t._v("en")]),t._v(" "),s("td",[t._v("(string)")]),t._v(" "),s("td",[t._v("Set the code for Kirby localization")])]),t._v(" "),s("tr",[s("td",[t._v("currency")]),t._v(" "),s("td",[t._v("usd")]),t._v(" "),s("td",[t._v("(string)")]),t._v(" "),s("td",[t._v("Set the currency with "),s("a",{attrs:{href:"https://en.wikipedia.org/wiki/ISO_4217",target:"_blank",rel:"noopener noreferrer"}},[t._v("ISO 4217"),s("OutboundLink")],1)])]),t._v(" "),s("tr",[s("td",[t._v("money_precision")]),t._v(" "),s("td",[t._v("2")]),t._v(" "),s("td",[t._v("(int)")]),t._v(" "),s("td",[t._v("Set the precision for the money")])]),t._v(" "),s("tr",[s("td",[t._v("date_format")]),t._v(" "),s("td",[t._v("Y-m-d H"),s("span",[t._v(":")]),t._v("m"),s("span",[t._v(":")]),t._v("s")]),t._v(" "),s("td",[t._v("(string)")]),t._v(" "),s("td",[t._v("Set the date format for the panel display")])]),t._v(" "),s("tr",[s("td",[t._v("default_item_name")]),t._v(" "),s("td",[t._v("Item to sell")]),t._v(" "),s("td",[t._v("(string)")]),t._v(" "),s("td",[t._v("Set the default item name for the services")])]),t._v(" "),s("tr",[s("td",[t._v("shipping")]),t._v(" "),s("td",[t._v("false")]),t._v(" "),s("td",[t._v("(bool)")]),t._v(" "),s("td",[t._v("Hide or show shopping options in the form")])]),t._v(" "),s("tr",[s("td",[t._v("default_country")]),t._v(" "),s("td",[t._v("null")]),t._v(" "),s("td",[t._v("(string)")]),t._v(" "),s("td",[t._v("If shipping is enable set the default country selected")])]),t._v(" "),s("tr",[s("td",[t._v("payment_types")]),t._v(" "),s("td",[t._v("['card']")]),t._v(" "),s("td",[t._v("(array)")]),t._v(" "),s("td",[t._v("Set the allowed method payments")])]),t._v(" "),s("tr",[s("td",[t._v("payment_process")]),t._v(" "),s("td",[t._v("charge")]),t._v(" "),s("td",[t._v("(string)")]),t._v(" "),s("td",[t._v("Set the process of the payment "),s("code",[t._v("charge")]),t._v(" or "),s("code",[t._v("order")])])]),t._v(" "),s("tr",[s("td",[t._v("payment_expiration_days")]),t._v(" "),s("td",[t._v("30")]),t._v(" "),s("td",[t._v("(int)")]),t._v(" "),s("td",[t._v("Set the expiration days for "),s("code",[t._v("oxxo_charge")]),t._v(" in "),s("code",[t._v("conekta")]),t._v(" service")])]),t._v(" "),s("tr",[s("td",[t._v("pagination")]),t._v(" "),s("td",[t._v("10")]),t._v(" "),s("td",[t._v("(int)")]),t._v(" "),s("td",[t._v("Set the pagination for the panel")])]),t._v(" "),s("tr",[s("td",[t._v("redirect")]),t._v(" "),s("td",[t._v("thanks")]),t._v(" "),s("td",[t._v("(string)")]),t._v(" "),s("td",[t._v("Set the URL to redirect if the payment was successful")])]),t._v(" "),s("tr",[s("td",[t._v("redirect_customer_create")]),t._v(" "),s("td",[t._v("customer")]),t._v(" "),s("td",[t._v("(string)")]),t._v(" "),s("td",[t._v("Set the URL to redirect if the customer was created")])]),t._v(" "),s("tr",[s("td",[t._v("redirect_customer_update")]),t._v(" "),s("td",[t._v("profile")]),t._v(" "),s("td",[t._v("(string)")]),t._v(" "),s("td",[t._v("Set the URL to redirect if the customer was updated")])]),t._v(" "),s("tr",[s("td",[t._v("redirect_source_update")]),t._v(" "),s("td",[t._v("profile")]),t._v(" "),s("td",[t._v("(string)")]),t._v(" "),s("td",[t._v("Set the URL to redirect if the source payment was updated")])]),t._v(" "),s("tr",[s("td",[t._v("storage")]),t._v(" "),s("td",[t._v("/pay")]),t._v(" "),s("td",[t._v("(string)")]),t._v(" "),s("td",[t._v("Set where payment files will be stored")])]),t._v(" "),s("tr",[s("td",[t._v("logs")]),t._v(" "),s("td",[t._v("false")]),t._v(" "),s("td",[t._v("(bool)")]),t._v(" "),s("td",[t._v("Enable or disable webhooks logs")])]),t._v(" "),s("tr",[s("td",[t._v("styles")]),t._v(" "),s("td"),t._v(" "),s("td",[t._v("(array)")]),t._v(" "),s("td",[t._v("Update default "),s("a",{attrs:{href:"/guide/styles"}},[t._v("styles")])])])])]),t._v(" "),s("h2",{attrs:{id:"example"}},[s("a",{staticClass:"header-anchor",attrs:{href:"#example"}},[t._v("#")]),t._v(" Example")]),t._v(" "),s("p",[t._v("In your "),s("code",[t._v("config.php")]),t._v(" file add:")]),t._v(" "),s("div",{staticClass:"language-php extra-class"},[s("pre",{pre:!0,attrs:{class:"language-php"}},[s("code",[s("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$base")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token function"}},[t._v("dirname")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),s("span",{pre:!0,attrs:{class:"token function"}},[t._v("dirname")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),s("span",{pre:!0,attrs:{class:"token constant"}},[t._v("__DIR__")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n"),s("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$storage")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$base")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(".")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'/storage/pay'")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n\n"),s("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("return")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("[")]),t._v("\n    "),s("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'beebmx.kirby-pay.service'")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v(">")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'stripe'")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v("\n    "),s("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'beebmx.kirby-pay.service_key'")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v(">")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'pk_test_stripe_key'")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v("\n    "),s("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'beebmx.kirby-pay.service_secret'")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v(">")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'sk_test_stripe_secret'")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v("\n\n    "),s("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'beebmx.kirby-pay.default_country'")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v(">")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'US'")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v("\n    "),s("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'beebmx.kirby-pay.storage'")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v(">")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$storage")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v("\n    "),s("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'beebmx.kirby-pay.env'")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v(">")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'test'")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v("\n    "),s("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'beebmx.kirby-pay.logs'")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v(">")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token boolean constant"}},[t._v("true")]),t._v("\n"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("]")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n")])])])])}),[],!1,null,null,null);e.default=_.exports}}]);