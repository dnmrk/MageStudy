define(['uiComponent'], function(Component) {
    'use strict';
    return Component.extend({
        defaults: {
            label: 'Component A',
            amount: 11,
            exports: {
                amount: '${ $.provider }:${ $.propertyValue }',
                // amount: '${ $.provider }:onReceivedExport',
            },
            amountLink: 1,
            links: {
                amountLink: '${ $.provider }:valueLink'
            },
            tracks: {
                amountLink: true
            }
        }
    });    
});
