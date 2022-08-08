define(['uiComponent'], function(Component) {
    return Component.extend({
        defaults: {
            tracks: {
                input: true
            },
            statefull: {
                input: true
            },
            input: 'some random string'
        }
    });
});
