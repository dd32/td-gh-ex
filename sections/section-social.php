<?php
/**
 * Social Section
 * 
 * @package App_Landing_Page
 */
$app_landing_page_social_title = get_theme_mod( 'app_landing_page_social_title' );
$app_landing_page_social_content = get_theme_mod( 'app_landing_page_social_content' );
?>
<section class="stay-tuned">
	<div class="container">
		<header class="header wow fadeInUp">
		<?php 
            if($app_landing_page_social_title){echo ' <h2 class="title">'.$app_landing_page_social_title.'</h2>';}

            if($app_landing_page_social_content){echo '<p>'.$app_landing_page_social_content.'</p>';}            
        ?>
		</header>
		<?php if ( is_active_sidebar( 'newsletter-sidebar' ) ) { ?>
			
			<?php dynamic_sidebar( 'newsletter-sidebar' ); ?>
			
	
		<?php  } ?>
	</div>
</section>