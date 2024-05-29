const dmb_card_settings = window.wc.wcSettings.getSetting( 'woocommerce_dmbpay_card_gateway_data', {} );
const dmb_card_label = window.wp.htmlEntities.decodeEntities( dmb_card_settings.title ) || window.wp.i18n.__( 'Pay by DMBPay (Card)', 'woocommerce_dmbpay_card_gateway' );
const Content = () => {
    return window.wp.htmlEntities.decodeEntities( dmb_card_settings.description || '' );
};

const dmb_card_block_gateway = {
    name: 'woocommerce_dmbpay_card_gateway',
    label: dmb_card_label,
    content: Object( window.wp.element.createElement )( Content, null ),
    edit: Object( window.wp.element.createElement )( Content, null ),
    canMakePayment: () => true,
    ariaLabel: dmb_card_label,
    supports: {
        features: dmb_card_settings.supports,
    },
};

window.wc.wcBlocksRegistry.registerPaymentMethod( dmb_card_block_gateway );
