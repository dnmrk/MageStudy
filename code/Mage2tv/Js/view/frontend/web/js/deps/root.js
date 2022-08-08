define(['uiComponent'], function(uiComponent) {
    return uiComponent.extend({
        defaults: {
            imports: {
                value: "root.sharedState:value"
            },
            value: 0
        }
    });
});
