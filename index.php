<?php
/**
 * The main template file
 **/

get_header();

//$page_for_posts = get_option( 'page_for_posts' );
//$pagetitle = 1;
//$header_visiblity_style = get_post_meta($page_for_posts, 'header_visiblity_style', true);

//$page_options_header_style_bg_image = get_post_meta($page_for_posts, 'pageOptionsHeaderStyleBgImage', true); ?>
<?php //if(!is_home() && !is_front_page() && $pagetitle == 1 ) : ?>
<div class="heading-wrap blog-heading-wrap" >
    <div class="heading-layer">
        <div class="heading-title">
            <h4><?php _e('Blog ','best-startup'); ?></h4>
        </div>
    </div>
</div> 
<?php //endif; ?>
<?php get_template_part('content');
get_footer(); ?>