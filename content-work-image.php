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
            <?php
            $img = theme_get_post_image();
            if (!empty($img)):
                ?>
                <div class="entry-thumbnail">              
                    <a href = "<?php the_permalink(); ?>"><img src="<?php echo $img ?>" class="attachment-post-thumbnail wp-post-image" alt="<?php the_title(); ?>"></a>
                </div>
                <?php
            else:
                theme_post_thumbnail($post, $themePageTemplate);
            endif;
            ?>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8 <?php if (!empty($img)) { ?> col-lg-6 col-lg-offset-3 <?php } else { ?> col-lg-8 col-lg-offset-2 <?php } ?> col-sm-offset-2 col-md-offset-2 ">  
                    <?php
                    theme_post_first_category($post);
                    ?>
                    <div class="entry-wrapper">
                        <header class="entry-header">
                            <?php
                            $title = the_title('<h2 class="entry-title h4"><a href="' . get_permalink() . '" rel="bookmark">', '</a></h2>', false);
                            if ($title) {
                                echo $title;
                            } else {
                                ?>
                                <div class="entry-meta">
                                    <?php
                                    echo '<span>';
                                    _e('Posted on', 'artwork-lite');
                                    echo '</span> ';
                                    theme_posted_on($post);
                                    ?>
                                </div>
                                <?php
                            }
                            ?> 
                        </header>
                        <?php
                        if ($title) {
                            ?>
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
                        <?php } ?>
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
</article>
