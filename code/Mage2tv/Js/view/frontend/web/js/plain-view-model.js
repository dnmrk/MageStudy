define(['ko', 'jquery'], function (ko, $) {
    'use strict';
    return function (config) {
        const title = ko.observable('This is a very fine title for a simple but good view model');
        title.subscribe(function (newValue) {
            console.log('Changed to:', newValue);
        });
        title.subscribe(function (newValue) {
            console.log('Will be Changed from:', newValue);
        }, this, 'beforeChange');

        const viewModel = {
            label: ko.observable('Currency Info'),
            title: title
        };

        let currencyInfo = ko.observable();
        $.getJSON(config.base_url + 'rest/V1/directory/currency', currencyInfo);

        viewModel.output = ko.computed(function () {
            if (currencyInfo()) {
                return this.label() + ':\n' + JSON.stringify(currencyInfo(), null, 2);
            }
            return '...loading';
        }.bind(viewModel));

        viewModel.exchange_rates = ko.observableArray([{
            currency_to: 'USD',
            rate: 1.0
        }]);

        // require('uiRegistry').get('startSimple').exchange_rates.push({ currency_to: 'USD', rate: 43.0})
        // require('uiRegistry').get('startSimple').exchange_rates.pop()
        // require('uiRegistry').get('startSimple').exchange_rates.splice(1, 1, {currency_to: 'EUR', rate: 43.5})

        viewModel.exchange_rates_plain = ko.observableArray([
            'abc',
            'def',
            'ghi',
        ]);

        // KO-ES5 plugin
        // require('uiRegistry').get('startSimple').v2.additional_charge
        // require('uiRegistry').get('startSimple').v2.additional_charge = 5
        viewModel.v2 = ko.track({
            label: 'A view model with regular KnockoutJS observable',
            additional_charge: 2,
            items: [
                { name: 'Surprise Box', qty: 4, price: 1.5 },
                { name: 'Chunk of goo', qty: 1, price: 7.5 },
            ],
            rowTotal: item => item.qty * item.price,
            total: function () {
                const sum = this.items.map(this.rowTotal)
                    .reduce((acc, curr) => acc + curr);
                return sum + this.additional_charge;
            }
        });

        // KO-ES5 plugin subscribe
        ko.getObservable(viewModel.v2, 'additional_charge').subscribe(function (newValue) {
            console.log('additional_charge change to:', newValue);
        });

        return viewModel;
    }
});
