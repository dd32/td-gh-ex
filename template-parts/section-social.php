<?php
/**
 * The template for displaying the social links banner in the front page.
 *
 * @package Bassist
 * @since Bassist 1.0
 */
?>

<section id="social-section" class="social-section">
    <div class="inner">
         <?php if (has_nav_menu('social')): ?>
            <nav id="social-section-navigation" class="site-navigation social-navigation" role="navigation" aria-label='<?php _e( 'Social Menu ', 'bassist' ); ?>' >
                <?php wp_nav_menu( array(
                                'theme_location' => 'social',
                                'container' => 'ul',
                                'menu_id' => 'social-section-menu',
                                'link_before'    => '<span class="screen-reader-text">',
                                'link_after'     => '</span>', )); ?>
            </nav> <!--/social--> 
        <?php endif ?>

    
    </div>

</section><!--/video-format-section-->

