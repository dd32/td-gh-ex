<?php
/**
 * Template Name: Blog Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Aglee Lite
 */

get_header(); ?>

<?php
    global $post;
    $page_layout =  get_post_meta($post->ID,'agleelite_page_layout');
    $default_page_layout = '';
    foreach($page_layout as $row){
       if($row == 'default_layout'){
            $default_page_layout = get_theme_mod('layout_category_blog', 'no_sidebar_wide');
       }else{
            $default_page_layout = $row;
       }
    }
    $content_class = '';
    switch($default_page_layout){
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
        default:
            $content_class = 'no-sidebar-wide';
    }
    
$blog_display_type = get_theme_mod('blog_post_layout','blog_image_large');
 
 $blog_display_class = '';
 switch($blog_display_type){
    case 'blog_image_large' :
        $blog_display_class = 'blog-image-large';       
        break;
    case 'blog_image_medium' :
        $blog_display_class = 'blog-image-medium';       
        break;
    case 'blog_image_alternate_medium' :
        $blog_display_class = 'blog-image-alternate-medium';       
        break;
    case 'blog_full_content' :
        $blog_display_class = 'blog-full-content';       
        break;
    default:
        $blog_display_class = 'blog-full-content';
    
 }  
?>
<?php while ( have_posts() ) : the_post(); ?>
	<main id="main" class="site-main <?php echo $content_class.' '.$blog_display_class; ?>" role="main">
        <div class="ag-container">
        <?php if($default_page_layout == 'both_sidebar') : ?>
            <div id="primary-wrap" class="clearfix">
        <?php endif; ?> 
        
            <div id="primary" class="content-area">
				<?php get_template_part( 'template-parts/content', 'blog' ); ?>
            </div><!-- #primary -->
            
            <?php if($default_page_layout == 'left_sidebar' || $default_page_layout == 'both_sidebar') : ?>
                <?php get_sidebar('left'); ?>
            <?php endif; ?>
            
        <?php if($default_page_layout == 'both_sidebar') : ?>
            </div> <!-- #primary-wrap -->
        <?php endif; ?>
        
        <?php if($default_page_layout == 'right_sidebar' || $default_page_layout == 'both_sidebar') : ?>
            <?php get_sidebar('right'); ?>
        <?php endif; ?>
    </div>
	</main><!-- #main -->
<?php endwhile; // end of the loop. ?>  	
<?php get_footer(); ?>