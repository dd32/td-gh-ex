/**
 * @since 1.0.0
 * jquery all settings hear
 */
jQuery(document).ready(function ($) {
    
    /**
     * @since 1.0.0
     * Academic Hub Slider
     */
	jQuery('.academic-home-slider-sec').slick({
        arrows:true,
        autoplay:true,
        dots:false,
        fade:false,
        speed:1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows:false
                }
            }
        ],
        
    });



});