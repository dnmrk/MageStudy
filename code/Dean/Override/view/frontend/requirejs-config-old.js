var config = {
    paths: {
        'deanTitle': 'Dean_Override/js/title',
        'deanCustomContent' : 'Dean_Override/js/custom-content',
    },
    // map: {
    //     "*": {
    //         'deanTitle': 'Dean_Override/js/title'
    //     }
    // },
    config: {
        mixins: {
            'Magento_Checkout/js/checkout-data': {
                'Dean_Override/js/checkout-data-mixin': true
            },
            'Magento_Catalog/js/catalog-add-to-cart': {
                'Dean_Override/js/add-to-cart-mixin': true
            }
        }
    },
    deps: ['Dean_Override/js/log-when-loaded'],
    shim: {
        'Magento_Catalog/js/view/compare-products': {
            deps: ['Dean_Override/js/before-compare-products-example']
        },
        'deanCustomContent': {
            deps: ['jquery']
        }
    }
};
