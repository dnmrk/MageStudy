define([
    'uiComponent',
    'Dean_Override/js/ko-binding/pixelbg'
], function(Component) {
    'use strict';
    return Component.extend({
        defaults: {
            pixelSize: 10,
            tracks: {
                pixelSize: true
            }
        }
    });
});