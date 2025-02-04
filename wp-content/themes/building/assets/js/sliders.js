jQuery(document).ready(function ($) {
    $("#slider-topo").slick({
        autoplay: true,
        arrows: false,
        dots: true,
        speed: 500,
        fade: true,
        cssEase: "linear",
    });
    $("#banner-blog").slick({
        autoplay: false,
        arrows: true,
        dots: true,
        speed: 500,
        fade: true,
        cssEase: "linear",
    });
    $(".slider-diferenciais").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: false,
        autoplay: false,
        arrows: true,
        dots: false,
        speed: 500,
        cssEase: "linear",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });
    $(".slider-areas-comuns").slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        autoplay: false,
        arrows: true,
        dots: false,
        speed: 500,
        cssEase: "linear",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
        ],
    });
    $(".slider-status").slick({
        autoplay: false,
        arrows: true,
        dots: false,
        speed: 500,
        fade: true,
        cssEase: "linear",
    });
});
