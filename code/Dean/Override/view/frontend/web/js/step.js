define([
    'ko',
    'uiComponent',
    'underscore',
    'Magento_Checkout/js/model/step-navigator'
],
    function (ko, Component, _, stepNavigator) {
        return Component.extend({
            defaults: {
                template: 'Dean_Override/step'
            },
            isVisible: ko.observable(true),
            textField: ko.observable(""),
            initialize: function () {
                this._super();
                stepNavigator.registerStep('test_step', null, 'TestStep', this.isVisible, _.bind(this.navigate, this), 5);
                return this;
            },
            navigate: function () {
            },
            navigateToNextStep: function () {
                stepNavigator.next();
            }
        });
    }
);
