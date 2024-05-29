<?php
/*
 * Plugin Name:       DMBPay Card Gateway
 * Plugin URI:        https://github.com/dmbpay/woocommerce-dmbpay-card-gateway-plugin
 * Description:       Accept card payments using DMBPay's Payment Gateway.
 * Version:           1.0.7
 * Requires at least: 6.1.1
 * Requires PHP:      7.2
 * Author:            DMBPay
 * Author URI:        https://docs.dmbpay.com/
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       dmbpay-card-gateway
 * Domain Path:       /languages
 */

use Automattic\WooCommerce\Utilities\FeaturesUtil;

define( 'DMBPAY_CARD__PLUGIN_DIR_PATH', plugins_url( '', __FILE__ ) );

add_action( 'plugins_loaded', 'dmbpay_card_woocommerce_plugin', 0 );

function dmbpay_card_woocommerce_plugin() {
	if ( ! class_exists( 'WC_Payment_Gateway' ) ) {
		return;
	}

	include plugin_dir_path( __FILE__ ) . 'includes/php/class-woocommerce-dmbpay-card-gateway.php';
}

add_filter( 'woocommerce_payment_gateways', 'dmbpay_card_add_woocommerce_gateway' );

function dmbpay_card_add_woocommerce_gateway( $gateways ) {
	$gateways[] = 'WooCommerce_Dmbpay_Card_Gateway';

	return $gateways;
}

/**
 * Custom function to declare compatibility with cart_checkout_blocks feature
 */
function dmbpay_card_declare_cart_checkout_blocks_compatibility() {
	if ( class_exists( FeaturesUtil::class ) ) {
		FeaturesUtil::declare_compatibility( 'cart_checkout_blocks', __FILE__, true );
	}
}

add_action( 'before_woocommerce_init', 'dmbpay_card_declare_cart_checkout_blocks_compatibility' );
add_action( 'woocommerce_blocks_loaded', 'dmbpay_card_register_order_approval_payment_method_type' );

/**
 * Custom function to register a payment method type
 */
function dmbpay_card_register_order_approval_payment_method_type() {
	if ( ! class_exists( 'Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType' ) ) {
		return;
	}

	require_once plugin_dir_path( __FILE__ ) . 'includes/php/class-dmbpay-card-gateway-blocks.php';

	add_action(
		'woocommerce_blocks_payment_method_type_registration',
		function ( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
			$payment_method_registry->register( new DMBPay_Card_Gateway_Blocks() );
		}
	);
}
