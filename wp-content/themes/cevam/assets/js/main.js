document.addEventListener('readystatechange', function () {
    if (document.readyState == 'interactive') {
        document.body.classList.remove('loading');
    }
});

$(function () {
    $('#toggle-menu, #toggle-menu-title, #menu-dim').on('click', function () {
        $('body').toggleClass('open-menu');
        $('#vertical-menu-container').addClass('animate__animated animate__faster ' + ($('body').hasClass('open-menu') ? 'animate__fadeInRight' : 'animate__fadeOutRight'));
    });

    $('#vertical-menu-container').on('animationend', function () {
        $('#vertical-menu-container').removeClass('animate__animated animate__faster animate__fadeInRight animate__fadeOutRight');
    });

    $(document).keyup(function (e) {
        if ($('body').hasClass('open-menu') && e.key === 'Escape') {
            $('body').removeClass('open-menu');
            $('#vertical-menu-container').addClass('animate__animated animate__faster animate__fadeOutRight');
        }
    });

    window.onresize = updateHeaderPosition;
    window.addEventListener('scroll', updateHeaderPosition);
    updateHeaderPosition();

    $(window).bind('beforeunload', function () {
        setTimeout(function () {
            $('body').addClass('loading');
        }, 1000);
    });
});

function updateHeaderPosition() {
    if ($(window).scrollTop() > 0) {
        $('body').addClass('sticky');
        $('body').css('padding-top', $('#main-header').outerHeight(true) + 'px');
    } else {
        $('body').removeClass('sticky');
        $('body').css('padding-top', '');
    }
}
