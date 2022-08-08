define(['uiComponent', 'Mage2tv_Js/js/statemanage/counter-state'], function (Component, state) {
    'use strict';
    return Component.extend({
        inc: () => state.increment,
        // inc: function() {
        //     return state.increment;
        // },
        increment: function () {
            state.counter += state.increment;
        }
        // defaults: {
        //     counter: 0,
        //     inc: 0,
        //     tracks: {
        //         counter: true,
        //         inc: true
        //     },
        //     imports: {
        //         inc: 'mutator.display:increment'
        //     },
        //     increment: function () {
        //         state.counter += state.increment;
        //     }
        // }
    });
});