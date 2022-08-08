define([
    'jquery',
    'uiComponent',
    'ko',
    'Dean_Override/js/model/rgb-model'
], function ($, Component, ko, rgbModel) {
    'use strict';
    var self;
    return Component.extend({
        myTimer: ko.observable(0),
        // randomColour: ko.observable("rgb(0, 0, 0)"),
        // red: ko.observable(0),
        // blue: ko.observable(0),
        // green: ko.observable(0),
        randomColour: ko.computed(function() {
            //we are using the aliased rgbModel here giving us access to the RGB values
            return 'rgb(' + rgbModel.red() + ', ' + rgbModel.blue() + ', ' + rgbModel.green() + ')';
        }, this),
        initialize: function () {
            self = this;
            this._super();
            //call the incrementTime function to run on intialize
            this.incrementTime();
            this.subscribeToTime();
            // this.randomColour = ko.computed(function() {
            //     //return the random colour value
            //     return 'rgb(' + this.red() + ', ' + this.blue() + ', ' + this.green() + ')';
            // }, this);
        },
        //increment myTimer every second
        incrementTime: function () {
            var t = 0;
            setInterval(function () {
                t++;
                self.myTimer(t);
            }, 1000);
        },
        subscribeToTime: function() {
            this.myTimer.subscribe(function(newValue) {
                // console.log(newValue);
                // self.updateTimerTextColour();
                rgbModel.updateColour();
            });
        },
        // randomNumber: function() {
        //     return Math.floor((Math.random() * 255) + 1);
        // },
        // updateTimerTextColour: function() {
        //     // //define RGB values
        //     // var red = self.randomNumber(),
        //     //     blue = self.randomNumber(),
        //     //     green = self.randomNumber();
                
        //     // self.randomColour('rgb(' + red + ', ' + blue + ', ' + green + ')');

        //     //define RGB values
        //     /*notice we now no longer have to set and return the RBG style code here
        //      we simply update the red/blue/green observables and the computed observable
        //      returns the style element to the template */
        //      this.red(self.randomNumber());
        //      this.blue(self.randomNumber());
        //      this.green(self.randomNumber());
        // }
    });
});
