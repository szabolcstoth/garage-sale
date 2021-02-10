'use strict';

var lightbox = GLightbox();

var itemsContainer = document.querySelector('#items-container');
var msnry = new Masonry(itemsContainer, {
    itemSelector: '.col',
    percentPosition: false
});