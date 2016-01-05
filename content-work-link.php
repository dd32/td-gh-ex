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
global $themePageTemplate;
?>
<article class="page-wrapper">
    <div id="post-<?php the_ID(); ?>" <?php post_class('work-post'); ?>>
        <div class="container">
             <?php theme_post_thumbnail($post, $themePageTemplate); ?>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">  

                    <?php
                    theme_post_first_category($post);
                    ?>
                    <div class="entry-wrapper">
                        <header class="entry-header">
                            <div class="h4">
                                <?php the_content(); ?>      
                            </div>
                        </header>
                        <footer class="entry-footer">
                            <div class="entry-meta">
                                <?php
                                echo '<span>';
                                _e('Posted on', 'artwork-lite');
                                echo '</span> ';
                                theme_posted_on($post);
                                ?>
                            </div>
                        </footer>
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
</article>
