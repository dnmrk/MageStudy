define([], function () {
    'use strict';
    return function (Minicart) {
        return Minicart.extend({
            update: function (updatedCart) {
                console.log('Update minicart');
                console.log(updatedCart);
                return this._super(updatedCart);
            }
        });
    };
});
