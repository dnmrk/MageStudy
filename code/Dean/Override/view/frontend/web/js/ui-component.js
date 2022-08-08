define(['uiElement'], function(UiElement) {
    'use strict';
    return UiElement.extend({
        defaults: {
            template: 'Dean_Override/ui-component-template',
            label: 'Some random numbers:',
            values: [22, 1, 5, 1024, 777]
        },
        label: 'My first UiComponent'
    });
});

//require('uiRegistry').get('exampleUiComponent')
//require('uiRegistry').get('exampleUiComponent.child1')
//require('uiRegistry').get('exampleUiComponent.child1.child2')

//require('uiRegistry').get('index = child2')
//require('uiRegistry').get('ns = exampleUiComponent')
//require('uiRegistry').get('ns = exampleUiComponent, index = child1')

/*require('uiRegistry').get('ns = exampleUiComponent, index = child1', function (c) {
    console.log(c)
})*/

/*require('uiRegistry').get(function (c) {
    console.log(c)
})*/