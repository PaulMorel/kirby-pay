(window.webpackJsonp=window.webpackJsonp||[]).push([[15],{363:function(t,e,a){"use strict";a.r(e);var s=a(43),n=Object(s.a)({},(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("ContentSlotsDistributor",{attrs:{"slot-key":t.$parent.slotKey}},[a("h1",{attrs:{id:"hooks"}},[a("a",{staticClass:"header-anchor",attrs:{href:"#hooks"}},[t._v("#")]),t._v(" Hooks")]),t._v(" "),a("p"),a("div",{staticClass:"table-of-contents"},[a("ul",[a("li",[a("a",{attrs:{href:"#configuration"}},[t._v("Configuration")])]),a("li",[a("a",{attrs:{href:"#hooks-available"}},[t._v("Hooks available")])]),a("li",[a("a",{attrs:{href:"#example"}},[t._v("Example")])])])]),a("p"),t._v(" "),a("h2",{attrs:{id:"configuration"}},[a("a",{staticClass:"header-anchor",attrs:{href:"#configuration"}},[t._v("#")]),t._v(" Configuration")]),t._v(" "),a("p",[t._v("In most cases, you need to notify the user if the payment was sucessfuly done, and for that reason, there're hooks.\nEvery time you implement a hook, you will receive a payment resource.")]),t._v(" "),a("h2",{attrs:{id:"hooks-available"}},[a("a",{staticClass:"header-anchor",attrs:{href:"#hooks-available"}},[t._v("#")]),t._v(" Hooks available")]),t._v(" "),a("p",[t._v("If you need to listen any "),a("a",{attrs:{href:"webhooks"}},[t._v("webhook")]),t._v(", you may need to do something with it.\nA "),a("code",[t._v("hook")]),t._v(" it's named like any event of the service but with the prefix of the package "),a("code",[t._v("beebmx.kirby-pay.")]),t._v(".\nYou can check the list of the events provided by each service in their own API reference.")]),t._v(" "),a("ul",[a("li",[a("a",{attrs:{href:"https://stripe.com/docs/api/events/types",target:"_blank",rel:"noopener noreferrer"}},[t._v("Stripe"),a("OutboundLink")],1)]),t._v(" "),a("li",[a("a",{attrs:{href:"https://developers.conekta.com/api#events",target:"_blank",rel:"noopener noreferrer"}},[t._v("Conekta"),a("OutboundLink")],1)])]),t._v(" "),a("h2",{attrs:{id:"example"}},[a("a",{staticClass:"header-anchor",attrs:{href:"#example"}},[t._v("#")]),t._v(" Example")]),t._v(" "),a("p",[t._v("Here is an example of use with "),a("code",[t._v("stripe")]),t._v(" and a webhook for the "),a("code",[t._v("payment_intent.succeeded")]),t._v(" event:")]),t._v(" "),a("div",{staticClass:"language-php extra-class"},[a("pre",{pre:!0,attrs:{class:"language-php"}},[a("code",[a("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("return")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("[")]),t._v("\n    "),a("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'hooks'")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),a("span",{pre:!0,attrs:{class:"token operator"}},[t._v(">")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("[")]),t._v("\n        "),a("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'beebmx.kirby-pay.payment_intent.succeeded'")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),a("span",{pre:!0,attrs:{class:"token operator"}},[t._v(">")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("function")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),a("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$payment")]),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("{")]),t._v("\n            "),a("span",{pre:!0,attrs:{class:"token comment"}},[t._v("//Send your email")]),t._v("\n        "),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("}")]),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v("\n    "),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("]")]),t._v("\n"),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("]")]),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n")])])])])}),[],!1,null,null,null);e.default=n.exports}}]);