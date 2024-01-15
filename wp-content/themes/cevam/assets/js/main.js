document.addEventListener('readystatechange', function () {
    if (document.readyState == 'interactive') {
        document.body.classList.remove('loading');
    }
});

$(function () {
    checkLive();

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

    $('#horizontal-menu > .menu-item').hover(function () {
        $('#main-header').css('--sub-menu-height', ($(this).children('.sub-menu').outerHeight(true) || 0) + 'px');
    }, function () {
        if ($('#horizontal-menu > .menu-item:hover').length === 0) {
            $('#main-header').css('--sub-menu-height', '0px');
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
    $('body').css('--header-height', $('#main-header').outerHeight(true) + 'px');

    if ($(window).scrollTop() > 0) {
        $('body').addClass('sticky');
    } else {
        $('body').removeClass('sticky');
    }
}

function checkLive() {
    $.get('?is_live', function (response) {
        if (response === 'YES') {
            $('body').addClass('is-live');
        } else {
            $('body').removeClass('is-live');
        }

        setTimeout(() => {
            checkLive();
        }, 60000);
    });
}
