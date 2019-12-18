<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package appdetail
 */
?>

    <div class="blog-detail-area" id="post-<?php the_ID(); ?>">
        <?php if(has_post_thumbnail()) : ?>
        <div class="featured-pic">
            <?php the_post_thumbnail(); ?>
        </div>
        <?php endif; ?>
        <div class="news-detail">
            <h4>
                <?php the_title(); ?>
            </h4>
            <ul class="meta">
                <li>
                    <span><?php appdetail_posted_on(); ?>
                    </span>
                </li>
                <li>
                    <i class="fa fa-folder-open"></i>
                    <?php
	                   $categories = get_the_category();
	                   if ( ! empty( $categories ) ) {
	                      echo '<span><a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'" title="Post Category">'.esc_html( $categories[0]->name ).'</a></span>';
	                  }                                 
	                ?>
                </li>
                <li>
                    <i class="fa fa-comment-o"></i>
                    <span>
                        <?php echo esc_html(get_comments_number()); ?> <a href="<?php comments_link(); ?>"><?php echo esc_html('') ?></a>
                    </span>
                </li>
            </ul>
            <?php the_content(); ?>
            <div class="co-blog-sidebar">
                <?php the_tags( '<h4>Tags :</h4><div class="tags-cloud">', '', '</div>' ); ?> 
            </div> 
        </div>
    </div> 
    <!-- ====== End  about ====== -->