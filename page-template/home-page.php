<?php
/*
* Template Name: Home
*/
get_header(); ?><div class="mini-content besty-homepage">
    <article class="slider-details">
    <a href="javascript:void(0)" class="sprite slider-details-control"></a>
    <div class="slider-content">
    	<div class="slider-content-1 scrollbar">
        <?php $besty_options = get_option( 'besty_theme_options' );
		echo (!empty($besty_options['welcome-title']) ? '<h2>'.esc_attr($besty_options['welcome-title']).'</h2>' : '');
		echo (!empty($besty_options['welcome-img']) ? '<img src="'.esc_url($besty_options['welcome-img']).'" class="img-responsive" alt="'.$besty_options['welcome-title'].'" />' : '');
		echo (!empty($besty_options['welcome_details']) ? apply_filters('the_content', $besty_options['welcome_details']) : ''); ?>
        </div>
	</div>
    </article>
    </div>
<?php get_footer(); ?>