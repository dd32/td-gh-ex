<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<article <?php post_class( 'post' ); ?>>
	<?php do_action( ATTIRE_THEME_PREFIX . 'before_content' ); ?>
    <div class="card">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( '', array('class' => 'card-img-top') ); ?></a>
        <!-- /.post-thumb -->
        <div class="card-body">
            <?php do_action( ATTIRE_THEME_PREFIX . 'before_post_title' ); ?>
            <h3 class="cart-title post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php do_action( ATTIRE_THEME_PREFIX . 'after_post_title' ); ?>
            <div class="post-content card-text">

                <?php
                $full_or_excerpt = AttireThemeEngine::NextGetOption( 'attire_archive_page_post_view', 'excerpt' );
                if ( $full_or_excerpt === 'excerpt' ) {
                    the_excerpt();
                } else {
                    the_content();
                }
                ?>
            </div>
            <!-- /.post-content -->
        </div>
        <div class="card-footer text-muted post-meta post-meta-bottom">

            <ul class="meta-list">
                <li>
                    <span><?php echo __( 'On', 'attire' ); ?></span>
                    <span class="black bold"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
                </li>
                <li>
                    <span><?php echo __( 'By', 'attire' ); ?></span>
                    <span class="bold">
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></span>
                </li>
                <li>
                    <span><?php echo __( 'In', 'attire' ); ?></span>
                    <span class="bold">
				<?php the_category( ', ' ); ?></span>
                </li>
                <li>
                    <span><a href="<?php comments_link(); ?>"><?php comments_number( __( 'No comments', 'attire' ), __( 'One comment', 'attire' ), __( '% comments', 'attire' ) ); ?></a></span>
                </li>

            </ul>
        </div>
        <!-- /.post-meta -->
    </div>

	<?php do_action( ATTIRE_THEME_PREFIX . 'after_content' ); ?>
</article>