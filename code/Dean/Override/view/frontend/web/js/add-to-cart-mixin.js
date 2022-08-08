define([
    'jquery'
], function($) {
    'use strict';
    return function (catalogAddToCart) {
        $.widget('mage.catalogAddToCart', catalogAddToCart, {
            submitForm: function (form) {
                console.log('add to cart successfully intercepted');
                console.log(form);
                return this._super(form);
            }
        });
        return $.mage.catalogAddToCart;
    };
});