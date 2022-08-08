define(['ko', 'jquery'], function(ko, $) {
    'use strict';
    return function(config) {
        let currencyInfo = ko.observable();
        $.getJSON(config.base_url + 'rest/V1/directory/currency', currencyInfo);

        const title = ko.observable('This is a very fine title');
        title.subscribe(function(newValue) {
            console.log('Changed to ' + newValue);
        });
        title.subscribe(function(newValue) {
            console.log('Will be change from ' + newValue);
        }, this, 'beforeChange');

        const viewModel = ko.track({
            title: title,
            config: config,
            label: 'Currency info',
            additional_charge: 2,
            items: [
                {name: 'Surprise Box', qty: 4, price: 1.5},
                {name: 'Chunk of Goo', qty: 1, price: 7.5}
            ],
            rowTotal: item => item.qty * item.price,
            total: function () {
                const sum = this.items.map(this.rowTotal)
                    .reduce((acc, curr) => acc + curr);
                return sum + this.additional_charge;
            },
            exchange_rates: [
                {
                    currency_to: 'USD',
                    rate: 1.0
                }
            ],
            values: [                
                123,
                12,
                555,
                778                
            ]
        });

        ko.getObservable(viewModel, 'additional_charge').subscribe(function (newValue) {
            console.log('addntal charge change to ' + newValue);
        });

        viewModel.output = ko.computed(function() {
            if (currencyInfo()) {
                return this.label + ':\n' + JSON.stringify(currencyInfo(), null, 2);
            }
            return '...loading';
        }.bind(viewModel));

        return viewModel;
    }
});
//require('uiRegistry').get('startSimple')

//require('uiRegistry').get('startSimple').exchange_rates.push({ currency_to: 'USD', rate: 43.0})
//require('uiRegistry').get('startSimple').exchange_rates.pop()

//require('uiRegistry').get('startSimple').exchange_rates.splice(1, 1, { currency_to: 'USD', rate: 43.0})

//require('uiRegistry').get('startSimple').additional_charge
