<?php
/**
 * The default template for displaying work content
 *
 * Used for  template-works.
 *
 * @package WordPress
 * @subpackage Artwork
 * @since Artwork 1.0
 */
global $mp_artwork_page_template;

?>
<article class="page-wrapper">
    <div id="post-<?php the_ID(); ?>" <?php post_class('work-post'); ?>>
        <div class="container">
            <?php mp_artwork_post_thumbnail($post, $mp_artwork_page_template); ?>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">  

                    <?php mp_artwork_post_first_category($post); ?>
                    <div class="entry-wrapper">
                        <header class="entry-header">
                            <div class="h4">
                                <?php the_content(); ?>  
                                <div class="clearfix"></div>
                            </div>
                        </header>
                        <footer class="entry-footer">                                
                            <?php mp_artwork_posted_on_meta($post); ?>
                        </footer>
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
</article>
