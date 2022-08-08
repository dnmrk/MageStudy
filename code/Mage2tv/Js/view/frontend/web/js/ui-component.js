define([
    'uiElement'
], function(UiElement) {
    'use strict';
    
    return UiElement.extend({
        defaults: {
            template: 'Mage2tv_Js/ui-component-template',
            label: "Scope random numbers",
            values: [22, 11, 5, 1024, 777]
        }
    });
});
