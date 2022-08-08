define(function() {
    'use script';
    return function (config, element) {
        console.log(config, element);
        element.innerText = 'Version 3';
    }
});
