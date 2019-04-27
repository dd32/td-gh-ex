<?php
/**
 *  Template part for displaying posts 
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-wrapper">
	
        <div class="entry-header">
            <div class="entry-thumb">
                <?php the_post_thumbnail( "full", array( "class" => "img-fluid" ) ); ?>
            </div>
        </div>

        <div class="entry-contents">

            <div class="entry-meta-cat">
                <?php 
                    bnw_theme_meta_cat_list();
                ?>
            </div>

            <div class="entry-title">
                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
            </div>

            <div class="entry-meta entry-meta-group">

                <span class="entry-meta-date">
                    <?php bnw_theme_meta_date(); ?>
                </span>

                <span class="entry-meta-separator">|</span>

                <span class="entry-meta-author">
                    <?php bnw_theme_meta_author(); ?>
                </span>

                <span class="entry-meta-separator">|</span>

                <span class="entry-meta-comment-link">
                    <?php bnw_theme_comment_link() ?>
                </span>

                <?php if( current_user_can('editor') || current_user_can('administrator') ):  ?>

                    <span class="entry-meta-separator">|</span>

                    <span class="entry-edit-link">
                        <?php bnw_theme_edit_link(); ?>
                    </span>

                <?php endif; ?>

            </div>

            <?php if ( is_single() ): ?>

                <div class="entry-summary">
                    <?php the_content(); ?>
                </div>

                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . __( 'Pages:', "bnw-theme" ),
                        'after'  => '</div>',
                        'link_before' => '<span class="page-links-number">',
					    'link_after' => '</span>'
                    ) );
                ?>

            <?php else: ?>

                <div class="entry-detail">
                    <?php the_excerpt(); ?>
                </div>

            <?php endif; ?>

        </div>
        
        <div class="entry-footer">

            <div class="entry-meta-tag">
                <?php bnw_theme_meta_tag_list(); ?>
            </div>

            <?php if ( ! is_single() ): ?>
                <a class="entry-btn" href="<?php the_permalink(); ?>">
                    <?php echo __( "Read More" , "bnw-theme"); ?>
                </a>
            <?php endif; ?>
            
        </div>

        
    </div>
</article>
