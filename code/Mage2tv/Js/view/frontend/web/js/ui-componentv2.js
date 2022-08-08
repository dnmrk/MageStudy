define([
    'uiComponent'
], function(Component) {
    'use strict';
    
    return Component.extend({
        defaults: {
            label: 'A view model with regular KnockoutJS observable',
            additional_charge: 2,
            items: [
                { name: 'Surprise Box', qty: 4, price: 1.5 },
                { name: 'Chunk of goo', qty: 1, price: 7.5 },
            ],
            tracks: {
                additional_charge: true,
                items: true
            }
        },
        rowTotal: item => item.qty * item.price,
        total: function () {
            const sum = this.items.map(this.rowTotal)
                .reduce((acc, curr) => acc + curr);
            return sum + this.additional_charge;
        }
    });
});
