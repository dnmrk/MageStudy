define([
    'jquery',
    'underscore',
    'mage/template',
    "text!Dean_Override/example-content.html",//template,
    'mage/translate',
    'mageUtils',
    'domReady!',//code will be executed only when DOM is ready
], function ($, _, template, exampleContentTmpl, $t, utils) {
    // debugger;
    let customContent = function (config, element) {
        var max = _.max([1, 2, 998, 3]);
        console.log(max);
        $(element).text(max);

        var templateValues = {
            data: {
                id: config.collapsible.replace('#', ''),
                items: [
                    { name: "Alexander", interests: $.mage.__('Creating large empires %1').replace('%1', 'TEST') },
                    { name: "Edward", interests: "ha.ckers.org <\nBGSOUND SRC=\"javascript:alert('XSS');\">" },
                    { name: "..." },
                    { name: "Yolando", interests: $t("Working out") },
                    { name: "Zachary", interests: "picking flowers for Angela" }
                ],
            }
        };

        //using underscore template
        var tpl = _.template(exampleContentTmpl);
        var html = tpl(templateValues);
        var collapsible = $(config.content);

        collapsible.html(html);

        //using mage/template
        $(template(exampleContentTmpl, templateValues)).appendTo(collapsible);

        $(config.collapsible).trigger('contentUpdated');
    }
    return customContent;
});