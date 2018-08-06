<?php
/**
 * The template for displaying Front page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 *@package WordPress
 *@subpackage Beenews
 *@since Bee news 1.1
 */
?>

<?php
get_header(); ?>
<?php

$show_on_front = get_option('show_on_front');
if ( $show_on_front == 'posts' ):
   ?>
    <div class="container">
        <div class="row">
            <?php

            $layout = get_theme_mod( 'beenews_blog_layout', 'right-sidebar' ); ?>
            

            <div id="primary"
                 class="beenews-content beenews-archive-page <?php echo $breadcrumbs_enabled ? '' : 'beenews-margin-top' ?> <?php echo ( $layout === 'fullwidth' ) ? '' : 'col-lg-8 col-md-8'; ?> col-sm-12 col-xs-12">
                <main id="main" class="site-main" role="main">
                    <?php
                    if (have_posts()):
                            while (have_posts()):
                                the_post();
                                ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php
                                get_template_part('template-parts/content', get_post_format());
                                ?>
                            </div>
                            <?php
                            endwhile;
                        else:
                            get_template_part('template-parts/content', 'none');
                        endif;
                    ?>
                </main><!-- #main -->
                 <div class="row">
            <?php
            if ( function_exists('wp_bootstrap_pagination') )
              wp_bootstrap_pagination();
            ?>
          </div>
            </div><!-- #primary -->
            <?php if ( $layout === 'right-sidebar' ): ?>
                <?php get_sidebar( 'sidebar' ); ?>
            <?php endif; ?>
        </div>
    </div>

<?php
else:
    if ( is_active_sidebar( 'homepage-slider' ) ) { ?>
        <div class="container">
            <?php dynamic_sidebar( 'homepage-slider' ); ?>
        </div>
         <?php } ?>
        <div class="container">
            <?php if ( is_active_sidebar( 'content-area' ) ) { ?>
                <?php dynamic_sidebar( 'content-area' ); ?>   
            <?php } ?>
        </div>
       
        
     <?php endif; ?>

<?php get_footer(); ?>