// Sticky Header
// Get the header element
const header = document.querySelector('header');

// Function to add or remove the class based on scroll position
function toggleHeaderClass() {
    if (window.scrollY > 180) {
        header.classList.add('sticky-header');
    } else {
        header.classList.remove('sticky-header');
    }
}

// Listen for scroll events on the window
window.addEventListener('scroll', toggleHeaderClass);

// News Slider
function mainSlider() {
    var BasicSlider = $('.news-slider');
    BasicSlider.on('init', function (e, slick) {
        var $firstAnimatingElements = $('.slide-items:first-child').find('[data-animation]');
        doAnimations($firstAnimatingElements);
    });
    BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
        var $animatingElements = $('.slide-items[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
        doAnimations($animatingElements);
    });
    BasicSlider.slick({
        autoplay: true,
        autoplaySpeed: 3500,
        dots: false,
        fade: true,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="ti-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="ti-angle-right"></i></button>',
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false
            }
        }
        ]
    });

    function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function () {
            var $this = $(this);
            var $animationDelay = $this.data('delay');
            var $animationType = 'animated ' + $this.data('animation');
            $this.css({
                'animation-delay': $animationDelay,
                '-webkit-animation-delay': $animationDelay
            });
            $this.addClass($animationType).one(animationEndEvents, function () {
                $this.removeClass($animationType);
            });
        });
    }
}
mainSlider();

// News Slick

$('.news_slider').slick({
    dots: true,
    arrows: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});

// Slick Photo Gallery
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    dots: false,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    arrows: true,
    centerMode: false,
    focusOnSelect: true,
    responsive: [{
        breakpoint: 1024,
        settings: {
            slidesToShow: 4,
            slidesToScroll: 1,
        }
    }, {
        breakpoint: 640,
        settings: {
            slidesToShow: 3,            
        }
    }, {
        breakpoint: 420,
        settings: {
            slidesToShow: 3,
        }
    }]
});