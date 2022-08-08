var config = {
    paths: {
        'deanCustomContent' : 'Dean_Override/js/custom-content',
    },
    // map: {
    //     "*": {
    //         'deanTitle': 'Dean_Override/js/title'
    //     }
    // },
    config: {
        mixins: {
    //         'Magento_Checkout/js/checkout-data': {
    //             'Dean_Override/js/checkout-data-mixin': true
    //         },
    //         'Magento_Catalog/js/catalog-add-to-cart': {
    //             'Dean_Override/js/add-to-cart-mixin': true
    //         }
            'mage/collapsible': {
                'Dean_Override/js/collapsible-mixin': true
            }
        }
    },
    shim: {
        'deanCustomContent': {
            deps: [ 'jquery']
        }
    }
};
