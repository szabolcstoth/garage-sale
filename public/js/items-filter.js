'use strict';

var itemFilter = document.getElementById('filter-input');

itemFilter.addEventListener('input', function () {
    var items = document.querySelectorAll(".card");

    items.forEach(item => {
        item.parentNode.style.display = "";
        msnry.layout();

        var tags = item.querySelector('.tags');
        if (!(tags.textContent.toLowerCase().includes(itemFilter.value.toLowerCase()))) {
            item.parentNode.style.display = "none";
            msnry.layout();
        };
    });
});