
// Plugins


// Get standart scrollbar width
function getScrollWidth() {
    var div = document.createElement('div');
    div.style.overflowY = 'scroll';
    div.style.width = '50px';
    div.style.height = '50px';
    div.style.visibility = 'hidden';
    document.body.appendChild(div);
    var scrollWidth = div.offsetWidth - div.clientWidth;
    document.body.removeChild(div);
    return scrollWidth;
}
// Lock the scrollbar
function disableBodyOverflow() {
    var scrollWidth = getScrollWidth();
    $('html').css({
        'overflow': 'hidden',
        'margin-right': scrollWidth
    });
}
// Unlock the scrollbar
function enableBodyOverflow() {
    $('html').css({
        'overflow': 'auto',
        'margin-right': '0'
    });
}


//
//= require tmp/modules.js

