define(['jquery'], function($) {
    'use strict';
    return function (collapsible) {
        $.widget('mage.collapsible', $.mage.collapsible, {
            activate: function () {
                console.log('before activate method');
                this._super();
                console.log('after activate method');
            }
        });
        return $.mage.collapsible;
    }
});
