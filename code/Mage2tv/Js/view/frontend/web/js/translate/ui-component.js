define([
    'uiComponent',
    'jquery',
    'mage/translate'
], function(Component, $, $t) {
    'use strict';
    
    return Component.extend({
        getTitle: function () {
            const remaining = 60 - new Date().getSeconds();
            // return $.mage.__('Place order within %1 seconds').replace('%1', remaining);
            // return jQuery.mage.__('Place order within %1 seconds').replace('%1', remaining);
            return $t('Place order within %1 seconds').replace('%1', remaining);
        }
    });
});
