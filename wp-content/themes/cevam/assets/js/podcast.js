$(function () {
    $('.episode-list__search input').on('input keyup', function () {
        if ($(this).val() === '') {
            $(this).blur();
            $('.episode-list__clear-search').trigger('click');

            setTimeout(() => {
                $(this).focus();
            }, 200);
        }
    });

    $('.episode-list__search input').on('focusout', function () {
        if ($(this).val() === '') {
            $('.episode-list__clear-search').trigger('click');
        }
    })
});