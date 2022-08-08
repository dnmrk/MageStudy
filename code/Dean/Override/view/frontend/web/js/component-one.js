define([
    'jquery',
    'uiComponent',
    'mage/translate'
], function ($, Component, $t) {
    'use strict';
    return Component.extend({
        defaults: {
            title: $t('Component One'),
            value: $t('Value text(Component One)')
        },
        // links : {
        //     value : 'componentTwo:value'
        // },
        // tracks: {
        //     value: true
        // }
        initObservable: function () {
            this._super().observe(['value']);
            return this;
        }
    });
});