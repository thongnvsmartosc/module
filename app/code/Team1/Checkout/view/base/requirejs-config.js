var config = {
    'config': {
        'mixins': {
           'Magento_Checkout/js/view/shipping': {
               'Team1_Checkout/js/view/shipping-payment-mixin': true
           },
           'Magento_Checkout/js/view/payment': {
               'Team1_Checkout/js/view/shipping-payment-mixin': true
           }
       }
    }
}