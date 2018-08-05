 <?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 *@package WordPress
 *@subpackage bee-news
 *@since bee-news 1.0
 */
?>


<!-- Speakers -->
        
            <div class="g-overflow--hidden">
                <div class="g-full-width--xs g-margin-b-30--xs g-margin-b-0--lg">
                    <!-- Speaker -->
                    <div class="center-block g-box-shadow__dark-lightest-v1 g-width-100-percent--xs">
                        <?php if ( has_post_thumbnail() ):?>
                        <img class="img-responsive g-width-100-percent--xs" src="<?php echo  get_the_post_thumbnail_url( null, 'list-thumb' ); ?>">
                    <?php else: ?>
                        <img class="img-responsive g-width-100-percent--xs" src="<?php echo get_template_directory_uri(); ?>/img/default.jpg">
                    <?php endif; ?>
                        <div class="g-position--overlay g-padding-x-30--xs g-padding-y-30--xs g-margin-t-o-60--xs">
                            <div class="g-bg-color--primary g-padding-x-15--xs g-padding-y-10--xs g-margin-b-20--xs">
                                <h4 class="g-font-size-22--xs g-font-size-26--sm g-color--white g-margin-b-0--xs">
                                    <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?></a></h4>
                                
                            </div>
                            <p class="g-font-weight--700"></p>
                            <p><?php
                              content_short(25); ?></p>
                                <?php 
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . __( 'Pages:', 'bee-news' ),
                                    'after'  => '</div>',
                                ) );
                                ?>
                        </div>
                    </div>
                    <!-- End Speaker -->
                </div>
                
            </div>
       
        <!-- End Speakers -->
    


    <?php edit_post_link( __( 'Edit', 'bee-news' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

<!-- #post-## -->