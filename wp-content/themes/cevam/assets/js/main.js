document.addEventListener('readystatechange', function () {
    if (document.readyState == 'interactive') {
        document.body.classList.remove('loading');
    }
});

$(function () {
    $(window).bind('beforeunload', function () {
        setTimeout(function () {
            $('body').addClass('loading');
        }, 1000);
    });
});