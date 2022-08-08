define([
    'jquery',
    'Magento_Review/js/process-reviews'
], function ($, process) {
    'use script';

    function processReviews(url, fromPages) {
        $.ajax({
            url: url,
            cache: true,
            dataType: 'html',
            showLoader: false,
            loaderContext: $('.product.data.items')
        }).done(function (data) {
            $('#product-review-container').html(data).trigger('contentUpdated');
            $('[data-role="product-review"] .pages a').each(function (index, element) {
                $(element).click(function (event) { //eslint-disable-line max-nested-callbacks
                    processReviews($(element).attr('href'), true);
                    event.preventDefault();
                });
            });
        }).complete(function () {
            if (fromPages == true) { //eslint-disable-line eqeqeq
                $('html, body').animate({
                    scrollTop: $('#reviews').offset().top - 50
                }, 300);
            }
        });
    }

    return function (config, element) {
        $(config.reviewsTabSelector).click(function(event) {
            processReviews(config.productReviewUrl);
            event.preventDefault();
        });
    }
});
