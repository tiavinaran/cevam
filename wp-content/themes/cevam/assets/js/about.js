$(function () {
    $('#goto-content').on('click', function () {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#about-contents").offset().top - $('#main-header').outerHeight(true)
        }, 800);
    });
});
