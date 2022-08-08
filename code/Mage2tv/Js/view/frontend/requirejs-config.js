var config = {
    deps: ['Mage2tv_Js/js/script-global'], //global js
    shim: {
        'Magento_Catalog/js/view/compare-products': {
            deps: ['Mage2tv_Js/js/before-compare-products-example']
        }
    },
    paths: {
        'mage2tv': 'Mage2tv_Js/js/v2'
    },
    config: {
        mixins: {
            'Magento_Catalog/js/catalog-add-to-cart': {
                'Mage2tv_Js/js/add-to-cart-mixin': true
            },
            'Magento_Checkout/js/view/minicart': {
                'Mage2tv_Js/js/minicart-mixin': true
            }
        }
    }
};
