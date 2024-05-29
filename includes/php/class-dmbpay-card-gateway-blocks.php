<?php

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

final class DMBPay_Card_Gateway_Blocks extends AbstractPaymentMethodType {

	private $gateway;

	protected $name = 'woocommerce_dmbpay_card_gateway';

	public function initialize() {
		$this->settings = get_option( 'woocommerce_woocommerce_dmbpay_card_gateway_settings', [] );
		$this->gateway  = new WooCommerce_DMBPay_Card_Gateway();
	}

	public function is_active() {
		return $this->gateway->is_available();
	}

	public function get_payment_method_script_handles() {
		wp_register_script(
			'woocommerce_dmbpay_card_gateway-blocks-integration',
			DMBPAY_CARD__PLUGIN_DIR_PATH . '/includes/js/dmbpay-card-checkout.js',
			[
				'wc-blocks-registry',
				'wc-settings',
				'wp-element',
				'wp-html-entities',
				'wp-i18n',
			],
			1.0,
			true
		);

		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'woocommerce_dmbpay_card_gateway-blocks-integration' );
		}

		return [ 'woocommerce_dmbpay_card_gateway-blocks-integration' ];
	}

	public function get_payment_method_data() {
		return [
			'title'       => $this->gateway->title,
			'description' => $this->gateway->description,
		];
	}
}
