(function($) {
    'use strict';
    //init svg polifill
    svg4everybody();

    //textarea autosize
    autosize($('textarea'));

    imagesLoad();

    objectFitImages($('img.mds-object-fit'));
})(jQuery);

function imagesLoad() {
    //Images fade in after load
    var attrVal = (!('srcset' in document.createElement('img'))) ? 'src' : 'data-srcset';
    [].forEach.call(document.querySelectorAll('img.mds-lazy:not(.mds-img-loaded)'), function(img) {
        var elementSrc =  img.getAttribute(attrVal);
        if (!elementSrc) {return;}
        var imgLoadCallback = function imgLoadCallback() {
            img.removeAttribute('data-srcset');
            img.classList.add('mds-img-loaded');
            img.parentNode.classList.remove('mds-img-wrapper');
            img.parentNode.parentNode.classList.remove('mds-img-wrapper');
            img.removeEventListener('load', imgLoadCallback);
        };
        img.addEventListener('load', imgLoadCallback);
        img.setAttribute(attrVal.replace('data-',''), elementSrc);
    });
}

function getScrollBarWidth() {
    var outer = document.createElement('div');
    outer.style.visibility = 'hidden';
    outer.style.width = '100px';
    document.body.appendChild(outer);
    var widthNoScroll = outer.offsetWidth;
    outer.style.overflow = 'scroll';
    var inner = document.createElement('div');
    inner.style.width = '100%';
    outer.appendChild(inner);
    var widthWithScroll = inner.offsetWidth;
    outer.parentNode.removeChild(outer);
    return widthNoScroll - widthWithScroll;
}

