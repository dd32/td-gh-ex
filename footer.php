<?php
/**
 * The template for displaying the footer
 *
 * @package Astral
 * @since 0.1
 */
?>
<footer class="footer py-md-5 pt-md-3 pb-sm-5">
	<?php
	/* 
	* Functions hooked into astral_footer_widget_area action
	*
	* @hooked astral_footer_widget
	*/
	do_action( 'astral_footer_widget_area' );
	?>
</footer>
<div class="cpy-right text-center mwa-theme">
	<?php
	/* 
	* Functions hooked into astral_copyright_area action
	*
	* @hooked astral_copyright
	*/
	do_action( 'astral_copyright_area' );
	?>
</div>
<!-- scroll top icon -->
<a href="#" id="scroll" class="move-top text-center scrollup" style="">
    <div class="circle"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
</a>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('#mwa_banner_slider', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        loop: true,
        effect: "fade",
    });


    var swiper = new Swiper('#mwa_blog_slider', {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            // when window width is <= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            // when window width is <= 480px
            480: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            // when window width is <= 640px
            640: {
                slidesPerView: 2,
                spaceBetween: 30
            }
        }
    });
</script>
<?php wp_footer(); ?>
</body>
</html>