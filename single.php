<?php
/**
 * The template for displaying all single posts.
 *
 * @package Aglee Lite
 */

get_header(); ?>
<?php
    global $post;
    $single_post_layout = get_post_meta($post->ID,'agleelite_page_layout');
    $default_post_layout ='';
    foreach($single_post_layout as $row){
       if($row == 'default_layout'){
            $default_post_layout = get_theme_mod('layout_default_post', 'no_sidebar_wide');
       }else{
            $default_post_layout = $row;
       }
    }    
    // Dynamically Generating Classes for #primary on the basis of page layout
    $content_class = '';
    switch($default_post_layout){
        case 'left_sidebar':
            $content_class = 'left-sidebar';
            break;
        case 'right_sidebar':
            $content_class = 'right-sidebar';
            break;
        case 'both_sidebar':
            $content_class = 'both-sidebar';
            break;
        case 'no_sidebar_wide':
            $content_class = 'no-sidebar-wide';
            break;
        case 'no_sidebar_narrow':
            $content_class = 'no-sidebar-narraow';
            break;
    }
?>	
<?php while ( have_posts() ) : the_post(); ?>
	<main id="main" class="site-main <?php echo $content_class; ?>" role="main">
        <div class="ap-container">
            <?php if($default_post_layout == 'both_sidebar') : ?>
                <div id="primary-wrap" class="clearfix">
            <?php endif; ?>
                <div id="primary" class="content-area">
            
            			<?php get_template_part( 'template-parts/content', 'single' ); ?>
            
            			<?php //the_post_navigation(); ?>
            
                        <?php if(($enable_comments_post = get_theme_mod('post_comment') ) == 1) : ?>
            			<?php
            				// If comments are open or we have at least one comment, load up the comment template
            				if ( comments_open() || get_comments_number() ) :
            					comments_template();
            				endif;
            			?>
                        <?php endif; ?>
            
                </div><!-- #primary -->
                <?php if($default_post_layout == 'left_sidebar' || $default_post_layout == 'both_sidebar') : ?>
                    <?php get_sidebar('left'); ?>
                <?php endif; ?>
            <?php if($default_post_layout == 'both_sidebar') : ?>
                </div> <!-- #primary-wrap -->
            <?php endif; ?>
            
            <?php if($default_post_layout == 'right_sidebar' || $default_post_layout == 'both_sidebar') : ?>
                <?php get_sidebar('right'); ?>
            <?php endif; ?>
        </div><!-- ap-container -->
	</main><!-- #main -->
<?php endwhile; // end of the loop. ?>    
<?php get_footer(); ?>

