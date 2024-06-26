=== DMBPay Card Gateway ===
Contributors: dmbpay
Tags: woocommerce, visa, mastercard, payment-gateway, payment-processing
Requires at least: 6.1
Tested up to: 6.4
Stable tag: 1.0.7
Requires PHP: 7.4
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

DMBPay's latest payment solution. Accept card payments online through your WooCommerce store safely and securely.

== Description ==

DMBPay are disrupting the payment processing industry, with a suite of class-leading solutions.

With decades of payments experience, the DMBPay team combine their expertise and points their focus exactly where it needs to be for the online world to benefit.

DMBPay's latest payment solution. Accept card payments online through your WooCommerce store safely and securely.

Note:
This plugin uses third party API requests and will communicate with DMBPay's secure API to process your payments via the URL https://api.dmbpay.com/v1/request-payment.

To view the [API documentation please visit](https://docs.dmbpay.com/).

To view our [Terms And Conditions please visit](https://pay.dmbpay.com/terms-and-conditions).

To view our [Privacy Policy please visit](https://pay.dmbpay.com/privacy-policy).


== Frequently Asked Questions ==

= Why are my orders not being marked as paid? =

Ensure that the callback endpoint is working by visiting `https://your-site.com/wc-api/card_callback` in your browser.
You should see `-1` shown with a 200 response code.

If not, this can be caused by permalinks automatically adding a slash to the end of the url.

Try resolving this by:

1. In the WordPress admin visit `Settings / Permalinks`.
2. Select `Day and name` under `Permalink structure` being sure to hit save.

== Screenshots ==

1. The DMBPay Card Gateway setting page.

== Changelog ==

= 2024-05-29 - version 1.0.7 =
* [Add] - Card gateway plugin released.

[See changelog for all versions](https://raw.githubusercontent.com/dmbpay/woocommerce-dmbpay-card-gateway-plugin/main/changelog.txt).

== Upgrade Notice ==
