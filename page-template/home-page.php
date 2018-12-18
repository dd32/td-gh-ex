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
		echo  '<h2>'.esc_attr(get_theme_mod('about_us_title',isset($besty_options['welcome-title'])?$besty_options['welcome-title']:'Welcome to Besty WordPress Theme!')).'</h2>';
        $image_url = wp_get_attachment_url(get_theme_mod('about_us_image')); 
        if(get_theme_mod('about_us_image') != ''){
          $image_url = wp_get_attachment_url(get_theme_mod('about_us_image'));
        }else{
          $image_url=$besty_options['welcome-img'];
        }
        if($image_url != ""){ ?>
            <img src="<?php echo esc_url($image_url); ?>" class="img-responsive" alt="<?php echo esc_attr(get_theme_mod("about_us_title",isset($besty_options["welcome-title"])?$besty_options["welcome-title"]:"Welcome to Besty WordPress Theme!")) ?>" />
        <?php }
        if(get_theme_mod('about_us_description',isset($besty_options['welcome_details'])?$besty_options['welcome_details']:'') !=''){ ?>
        <p><?php echo esc_html(get_theme_mod('about_us_description',isset($besty_options['welcome_details'])?$besty_options['welcome_details']:'')); ?></p>
        <?php } ?>
        </div>
	</div>
    </article>
    </div>
<?php get_footer(); ?>