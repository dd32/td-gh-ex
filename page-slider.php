<?php
/**
 * Template Name: Slider Template
 * Description: The template for displaying the frontpage slider.
 *
 * @package Aperture
 */

get_header(); ?>

<?php $sliderbadge = get_theme_mod( 'aperture_slider_badge');
	$sliderimage = get_theme_mod( 'aperture_slider_image');
	$slidertext = get_theme_mod( 'aperture_slider_text');
	if ( false != $sliderimage ) $sliderimage = array_filter( $sliderimage );
	if ( false != $slidertext ) $slidertext = array_filter( $slidertext ); ;?>	

<?php $numberofslides = count($sliderimage); ?>

<?php if ( 1 < $numberofslides ) : ?>

<div id="slides">
	<ul class="slides-container">
		<?php if ( ! empty( $sliderimage['first'] ) ) : ?><li><img id="first-slider-image" class="slider-image" src='<?php echo esc_url( $sliderimage['first'] ); ?>' alt='First Slide'>
		<?php if ( ! empty( $sliderbadge ) ) : ?><div class="badge-container"><img id="slider-badge" class="preserve" src='<?php echo esc_url( $sliderbadge ); ?>' alt='Badge'></div><?php endif; ?><?php endif; ?>
		<?php if ( empty( $slidertext['first'] ) ) : ?></li><?php endif; ?>
		<?php if ( ! empty( $slidertext['first'] ) ) : ?><div id="first-slider-text" class="container"><p><?php echo esc_html( $slidertext['first'] ); ?></p></div></li><?php endif; ?>

		<?php if ( ! empty( $sliderimage['second'] ) ) : ?><li><img id="second-slider-image" class="slider-image" src='<?php echo esc_url( $sliderimage['second'] ); ?>' alt='Second Slide'><?php endif; ?>
		<?php if ( empty( $slidertext['second'] ) ) : ?></li><?php endif; ?>
		<?php if ( ! empty( $slidertext['second'] ) ) : ?><div id="second-slider-text" class="container"><p><?php echo esc_html( $slidertext['second'] ); ?></p></div></li><?php endif; ?>

		<?php if ( ! empty( $sliderimage['third'] ) ) : ?><li><img id="third-slider-image" class="slider-image" src='<?php echo esc_url( $sliderimage['third'] ); ?>' alt='Third Slide'><?php endif; ?>
		<?php if ( empty( $slidertext['third'] ) ) : ?></li><?php endif; ?>
		<?php if ( ! empty( $slidertext['third'] ) ) : ?><div id="third-slider-text" class="container"><p><?php echo esc_html( $slidertext['third'] ); ?></p></div></li><?php endif; ?>

		<?php if ( ! empty( $sliderimage['fourth'] ) ) : ?><li><img id="fourth-slider-image" class="slider-image" src='<?php echo esc_url( $sliderimage['fourth'] ); ?>' alt='Fourth Slide'><?php endif; ?>
		<?php if ( empty( $slidertext['fourth'] ) ) : ?></li><?php endif; ?>
		<?php if ( ! empty( $slidertext['fourth'] ) ) : ?><div id="fourth-slider-text" class="container"><p><?php echo esc_html( $slidertext['fourth'] ); ?></p></div></li><?php endif; ?>

		<?php if ( ! empty( $sliderimage['fifth'] ) ) : ?><li><img id="fifth-slider-image" class="slider-image" src='<?php echo esc_url( $sliderimage['fifth'] ); ?>' alt='Fifth Slide'><?php endif; ?>
		<?php if ( empty( $slidertext['fifth'] ) ) : ?></li><?php endif; ?>
		<?php if ( ! empty( $slidertext['fifth'] ) ) : ?><div id="fifth-slider-text" class="container"><p><?php echo esc_html( $slidertext['fifth'] ); ?></p></div></li><?php endif; ?>

		<?php if ( ! empty( $sliderimage['sixth'] ) ) : ?><li><img id="sixth-slider-image" class="slider-image" src='<?php echo esc_url( $sliderimage['sixth'] ); ?>' alt='Sixth Slide'><?php endif; ?>
		<?php if ( empty( $slidertext['sixth'] ) ) : ?></li><?php endif; ?>
		<?php if ( ! empty( $slidertext['sixth'] ) ) : ?><div id="sixth-slider-text" class="container"><p><?php echo esc_html( $slidertext['sixth'] ); ?></p></div></li><?php endif; ?>

		<?php if ( ! empty( $sliderimage['seventh'] ) ) : ?><li><img id="seventh-slider-image" class="slider-image" src='<?php echo esc_url( $sliderimage['seventh'] ); ?>' alt='Seventh Slide'><?php endif; ?>
		<?php if ( empty( $slidertext['seventh'] ) ) : ?></li><?php endif; ?>
		<?php if ( ! empty( $slidertext['seventh'] ) ) : ?><div id="seventh-slider-text" class="container"><p><?php echo esc_html( $slidertext['seventh'] ); ?></p></div></li><?php endif; ?>

		<?php if ( ! empty( $sliderimage['eighth'] ) ) : ?><li><img id="eighth-slider-image" class="slider-image" src='<?php echo esc_url( $sliderimage['eighth'] ); ?>' alt='Eighth Slide'><?php endif; ?>
		<?php if ( empty( $slidertext['eighth'] ) ) : ?></li><?php endif; ?>
		<?php if ( ! empty( $slidertext['eighth'] ) ) : ?><div id="eighth-slider-text" class="container"><p><?php echo esc_html( $slidertext['eighth'] ); ?></p></div></li><?php endif; ?>

		<?php if ( ! empty( $sliderimage['nineth'] ) ) : ?><li><img id="nineth-slider-image" class="slider-image" src='<?php echo esc_url( $sliderimage['nineth'] ); ?>' alt='Nineth Slide'><?php endif; ?>
		<?php if ( empty( $slidertext['nineth'] ) ) : ?></li><?php endif; ?>
		<?php if ( ! empty( $slidertext['nineth'] ) ) : ?><div id="nineth-slider-text" class="container"><p><?php echo esc_html( $slidertext['nineth'] ); ?></p></div></li><?php endif; ?>

		<?php if ( ! empty( $sliderimage['tenth'] ) ) : ?><li><img id="tenth-slider-image" class="slider-image" src='<?php echo esc_url( $sliderimage['tenth'] ); ?>' alt='Tenth Slide'><?php endif; ?>
		<?php if ( empty( $slidertext['tenth'] ) ) : ?></li><?php endif; ?>
		<?php if ( ! empty( $slidertext['tenth'] ) ) : ?><div id="tenth-slider-text" class="container"><p><?php echo esc_html( $slidertext['tenth'] ); ?></p></div></li><?php endif; ?>
	</ul>

	<nav class="slides-navigation">
		<div id="left-arrow">
			<a href="#" class="prev genericon genericon-previous"></a>
		</div>
		 <div id="right-arrow">
			<a href="#" class="next genericon genericon-next"></a>
		</div>
	</nav>

</div>

<?php $slidertimer = get_theme_mod( 'aperture_slider_timer' ); ?>
<?php $sliderfx = get_theme_mod( 'aperture_slider_fx' ); ?>

<script>
jQuery(document).ready(function($){
	var $slides = $('#slides');

	Hammer($slides[0]).on("swipeleft", function(e) {
		$slides.data('superslides').animate('next');
	});

	Hammer($slides[0]).on("swiperight", function(e) {
		$slides.data('superslides').animate('prev');
	});

	$slides.superslides({
		play: <?php if ( ! empty($slidertimer) ) { echo json_encode( $slidertimer ); } else { echo "\"5000\"";} ?>,
		animation: <?php if ( ! empty($sliderfx) ) { echo json_encode( $sliderfx ); } else { echo "\"fade\"";} ?>
	});
});
</script>

<?php endif; ?>

<?php if ( 1 == $numberofslides ) : ?>

	<div id="single-slide">
		<?php if ( ! empty( $sliderbadge ) ) : ?><div class="badge-container"><img id="slider-badge" class="preserve" src='<?php echo esc_url( $sliderbadge ); ?>' alt='Badge'></div><?php endif; ?>
	</div>

<?php endif; ?>

<?php if ( 1 > $numberofslides ) : ?>

	<div id="empty-slider">
		<h1 id="empty-slider-h1"><?php printf( __( 'No Image %s', 'aperture' ), '<span class="orange">Provided</span>' ); ?></h1>
		<p id="empty-slider-text"><?php printf( __( 'Add your images to the customizer.', 'aperture' ) ); ?></p>
	</div>

<?php endif; ?>

<?php get_footer(); ?>
