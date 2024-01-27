const churchSwiper = new Swiper('#church-caroussel', {
    lazy: true,
    loop: true,
    effect: 'fade',
    autoplay: {
        delay: 7000,
        disableOnInteraction: false
    },
    pagination: {
        el: '#church-caroussel .swiper-pagination',
        clickable: true
    },
});

const eventsSwiper = new Swiper('#event-caroussel', {
    slidesPerView: 'auto',
    spaceBetween: 30,
    freeMode: true,
    navigation: {
        nextEl: '#event-caroussel .swiper-button-next',
        prevEl: '#event-caroussel .swiper-button-prev',
    },
});
