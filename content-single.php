<?php
/**
 * @package AccesspressLite
 */
?>
<?php
$accesspresslite_options = accesspress_default_setting_value();
$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
$cat_event  	= isset( $accesspresslite_settings[ 'event_cat' ] ) ? $accesspresslite_settings[ 'event_cat' ] : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
        <?php $post_meta_enable    = isset( $accesspresslite_settings[ 'post_meta_enable' ] ) ? $accesspresslite_settings[ 'post_meta_enable' ] : ''; 
        if( $post_meta_enable == 1){?>
		<div class="entry-meta">
			<?php accesspresslite_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php } ?>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'accesspress-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'accesspress-lite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
