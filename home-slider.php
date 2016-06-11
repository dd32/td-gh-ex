<?php $awada_theme_options = awada_theme_options();
if($awada_theme_options['home_slider_enabled']==1){ ?>
<div id="slider" class="sl-slider-wrapper demo-2">
	<div class="sl-slider" >
		<?php if(isset($awada_theme_options['home_slider_posts']) && $awada_theme_options['home_slider_posts'] != "") {
			$j = 0;
			foreach ($awada_theme_options['home_slider_posts'] as $post_id) {
			$slider = get_post($post_id);
				if ($j % 2 == 0){	$orientation = 'horizontal';	}
				else{	$orientation = 'vertical';	}
			?>
				<div class="sl-slide" data-orientation="<?php echo $orientation; ?>" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
					<div class="sl-slide-inner">
						<?php echo get_the_post_thumbnail($slider->ID, 'awada_home_slider_bg_image', array('class' => 'img-responsive bg-img')); ?>
						<h2><?php echo esc_attr($slider->post_title); ?></h2>
						<blockquote><p><?php echo esc_attr(wp_trim_words($slider->post_content, 8, '...')); ?></p></blockquote>
					</div>
				</div>
		<?php $j++; //endif;
		} } else {
			$slider_title = array('Corporate Theme', 'Responsive Theme', 'Business Theme');
			for($j=1 ; $j<=3 ; $j++){
			if ($j % 2 == 0){	$orientation = 'horizontal';	}
				else{	$orientation = 'vertical';	} ?>
					<div class="sl-slide" data-orientation="<?php echo $orientation; ?>" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
						<div class="sl-slide-inner">
							<img class="img-responsive bg-img" src="<?php echo get_template_directory_uri(); ?>/images/slider/slider<?php echo $j; ?>.jpg">
							<h2><?php  echo $slider_title[$j-1]; ?></h2>
							<blockquote><p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut fringilla nibh.', 'awada'); ?></p></blockquote>
						</div>
					</div>
		<?php } $j=3;
		} ?>
	</div><!-- /sl-slider -->
	<?php if($j>1){ ?>
	<nav id="nav-arrows" class="nav-arrows">
		<span class="nav-arrow-prev">Previous</span>
		<span class="nav-arrow-next">Next</span>
	</nav>
				
	<nav id="nav-dots" class="nav-dots">
		<?php for($i=1; $i<=$j; $i++) { ?>
			<span <?php echo $i==1 ? 'class="nav-dot-current"' : ""; ?>></span>
		<?php } ?>
	</nav>
	<?php } ?>

</div><!-- /slider-wrapper -->
<?php } ?>

<script type="text/javascript">	
jQuery(function() {

	var Page = (function() {

		var $navArrows = jQuery( '#nav-arrows' ),
			$nav = jQuery( '#nav-dots > span' ),
			slitslider = jQuery( '#slider' ).slitslider( {
				onBeforeChange : function( slide, pos ) {

					$nav.removeClass( 'nav-dot-current' );
					$nav.eq( pos ).addClass( 'nav-dot-current' );

				}
			} ),

			init = function() {

				initEvents();
				
			},
			initEvents = function() {

				// add navigation events
				$navArrows.children( ':last' ).on( 'click', function() {

					slitslider.next();
					return false;

				} );

				$navArrows.children( ':first' ).on( 'click', function() {
					
					slitslider.previous();
					return false;

				} );

				$nav.each( function( i ) {
				
					jQuery( this ).on( 'click', function( event ) {
						
						var $dot = jQuery( this );
						
						if( !slitslider.isActive() ) {

							$nav.removeClass( 'nav-dot-current' );
							$dot.addClass( 'nav-dot-current' );
						
						}
						
						slitslider.jump( i + 1 );
						return false;
					
					} );
					
				} );

			};

			return { init : init };

	})();

	Page.init();

	/**
	 * Notes: 
	 * 
	 * example how to add items:
	 */

	/*
	
	var $items  = $('<div class="sl-slide sl-slide-color-2" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1"><div class="sl-slide-inner bg-1"><div class="sl-deco" data-icon="t"></div><h2>some text</h2><blockquote><p>bla bla</p><cite>Margi Clarke</cite></blockquote></div></div>');
	
	// call the plugin's add method
	ss.add($items);

	*/

});
</script>