define([
    'Dean_Override/js/lib/pixel-image-canvas',
    'Dean_Override/js/lib/create-background'
], function(pixelImageOnCanvas, createBackgroundCanvas) {
    'use strict';

    return function (config, targetElement, maybeCanvas) {
        const src = config.src || '';
        const pixelSize = Math.max(config.pixelSize || 5, 1);
        const canvas = maybeCanvas || createBackgroundCanvas(targetElement);
        canvas.style.opacity = config.opacity || .5;

        const cols = Math.floor(canvas.scrollWidth / pixelSize);
        const rows = Math.floor(canvas.scrollHeight / pixelSize);

        pixelImageOnCanvas(canvas, src, cols, rows);
        
        return canvas;
    }
});