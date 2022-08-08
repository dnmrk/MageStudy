define([
    'jquery',
    'uiComponent',
    'ko'
], function ($, Component, ko) {
    'use strict';
    return Component.extend({
        defaults: {
            title: ko.observable()
        },
    });
});
