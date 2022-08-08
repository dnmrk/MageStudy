define([
    'jquery',
    'uiComponent',
    'Magento_Ui/js/modal/alert',
    'mage/translate'
], function ($, Component, alert, $t) {
    'use strict';
    
    return Component.extend({
        defaults: {
            title: $t('Component Two'),
            value: '${ $.title }',       
            value2: $t('TEST'),
            imports : {
                value2 : 'componentOne:value'
            },
            // exports : {
            //     value : 'componentOne:title'
            // },
            // links : {
            //     value : 'componentOne:value'
            // },
            listens : {
                'value' : 'valueChanged'
            },
            tracks: {
                value: true,
                value2: true
            },
           
            // initObservable: function () {
            //     this._super().observe(['value']);
            //     return this;
            // }
            valueChanged: function (val) {
                console.log(self.value2);
                alert({content: $t('value changed to <strong>%1</strong>').replace('%1', val)});
            }
        }
    });
});
