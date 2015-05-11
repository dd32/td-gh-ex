<?php
/**
 * @package AccesspressLite
 */
?>
<?php
global $accesspresslite_options;
$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
$cat_event = $accesspresslite_settings['event_cat'];
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
            
		<?php 
		if(has_category( $cat_event) && !empty($cat_event)){ 
		$accesspresslite_event_day = get_post_meta( $post->ID, 'accesspresslite_event_day', true );
		$accesspresslite_event_month = get_post_meta( $post->ID, 'accesspresslite_event_month', true );
		$accesspresslite_event_year = get_post_meta( $post->ID, 'accesspresslite_event_year', true );
		?>
		<div class="event-date-archive"><?php echo get_cat_name( $cat_event )?> on <?php echo esc_html($accesspresslite_event_day)." ".esc_html($accesspresslite_event_month)." , ".esc_html($accesspresslite_event_year) ?></div>
		<?php 
			}else{?>
			<div class="entry-meta">
				<?php accesspresslite_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php }?>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'accesspresslite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'accesspresslite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
