define([], function() {
    'use script';

    return function (checkoutData) {
        const orig = checkoutData.getSelectedPaymentMethod;
        checkoutData.getSelectedPaymentMethod = function () {
            const address = orig.bind(checkoutData)();
            console.log('getSelectedPaymentMethod', address);
            return address;
        }
        return checkoutData;
    };
});