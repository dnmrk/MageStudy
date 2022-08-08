define(['uiComponent'], function(Component) {
    'use strict';
    return Component.extend({
        defaults: {
            label: 'Component B',
            value: 5.5,
            amount: 0,
            imports: {
                value: 'component-a:amount',
                //value: 'title', //from local
                onAmountUpdate: 'component-a:amount'
            },
            onAmountUpdate: function (newAmount) {
                console.log('Updated to:', newAmount);
            },
            onReceivedExport: function (value) {
                console.log('recieved value:', value);
            },
            tracks: {
                amount: true,
                valueLink: true
            },
            valueLink: 2
        }
    });    
});
