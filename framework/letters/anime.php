<?php if( ! defined( 'ABSPATH' ) ) exit;

/*******************************
* Enqueue scripts and styles.
********************************/
 
function baw_anima_scripts() {
	if(get_theme_mod('header_letter', true)) {
		wp_enqueue_style( 'black-and-white-anima-css', get_template_directory_uri() . '/framework/letters/anime.css');
		wp_enqueue_script( 'black-and-white-anima-js', get_template_directory_uri() . '/framework/letters/anime.min.js', array( 'jquery' ), true);
	}
		
}

add_action( 'wp_enqueue_scripts', 'baw_anima_scripts' );



function baw_letter_anime () { ?>
<script>
anime.timeline({loop: false})
  .add({
    targets: '.ml15 .word',
    scale: [14,1],
    opacity: [0,1],
    easing: "easeOutCirc",
    duration: 800,
    delay: function(el, i) {
      return 800 * i;
    }
  });
</script>
<?php }

add_action('wp_footer','baw_letter_anime');