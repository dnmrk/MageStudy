define(['uiComponent', 'Mage2tv_Js/js/statemanage/counter-state'], function (Component, state) {
    'use strict';
    return Component.extend({
        // value: function() {
        //     return state.counter;
        // }
        value: () => state.counter
        // defaults: {
        //     value: 0,
        //     increment: 1,
        //     tracks: {
        //         value: true,
        //         increment: true
        //     },
        //     imports: {
        //         value: 'mutator:counter'
        //     }
        // }
    });
});
