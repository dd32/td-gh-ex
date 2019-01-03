<?php
/**
 * Displays Author bio on single post
 *
 * @package Academic Hub
 */
$academic_hub_author_id         = get_the_ID(); 
$academic_hub_author_avatar     = get_avatar( $academic_hub_author_id, 'thumbnail' );
$academic_hub_author_post_link  = get_the_author_posts_link();
$academic_hub_author_bio        = get_the_author_meta( 'description' );
$academic_hub_author_url        = get_the_author_meta( 'user_url' );
$academic_hub_author_post_count = count_user_posts( $academic_hub_author_id );

?>

<!-- aurthor -->

<div class="aurthor">
    <h3><?php echo esc_html__('Post Author :','academic-hub'); ?>  
        <span>
            <?php if ( $academic_hub_author_post_link ) : ?> 
                <a href=""><?php echo $academic_hub_author_post_link; // WPCS: XSS ok. ?></a>
            <?php endif; ?>
        </span>
    </h3>
    <?php if ( $academic_hub_author_avatar ) : ?>
			<?php echo $academic_hub_author_avatar; // WPCS: XSS ok. ?>
	<?php endif; ?>
    <?php if ( $academic_hub_author_bio ) : ?>
    <p><?php echo wp_kses_post( $academic_hub_author_bio ); ?></p>
    <?php endif; ?>

    <div class="tg-author-meta">
        <?php if ( $academic_hub_author_url ) : ?>
            <div class="tg-author__website">
                <span><?php esc_html_e( 'Website', 'academic-hub' ); ?></span>
                <a href="<?php echo esc_url( $academic_hub_author_url ); ?>" target="_blank"><?php echo esc_url( $academic_hub_author_url ); ?></a>
            </div><!-- .tg-author-website -->
        <?php endif; ?>

        <?php if ( $academic_hub_author_post_count ) : ?>
            <div class="tg-author__post-count">
                <span><?php esc_html_e( 'Posts created', 'academic-hub' ); ?></span>
                <strong><?php echo intval( $academic_hub_author_post_count ); ?></strong>
            </div><!-- .tg-author-post-count -->
        <?php endif; ?>
    </div><!-- .tg-author-meta -->
</div>