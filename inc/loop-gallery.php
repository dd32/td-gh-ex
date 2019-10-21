<?php
/**
 * Template part for displaying gallery
 *
 */

?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
					<?php if(is_singular()){ ?>
						<?php
						if ( is_sticky() ) {
						the_title( sprintf( '<h2 class="entry-title">%1$s <a href="%2$s" title="%3$s" rel="bookmark">', hjyl_get_svg( array( 'icon' => 'thumb-tack') ), esc_url( get_permalink()), esc_html(get_the_title()) ), '</a></h2>' );
						}else{
						the_title( sprintf( '<h2 class="entry-title">%1$s <a href="%2$s" title="%3$s" rel="bookmark">', hjyl_get_svg( array( 'icon' => 'pic') ), esc_url( get_permalink()), esc_html(get_the_title()) ), '</a></h2>' );
						}
						?>
						<div class="date">
							<span class="month"><?php echo date( 'M' ,get_the_time( 'U' ));?> <?php the_time( 'Y' ); ?></span>
							<span class="day"><?php the_time( 'd' ); ?></span>
						</div>
						<?php }else{ ?>
						<div class="date">
							<span class="day"><a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute( array( 'before' => '', 'after' => '' ) ); ?>" rel="bookmark"><?php echo hjyl_get_svg( array( 'icon' => 'pic') ); ?></a></span>
						</div>
						<?php } ?>
					</header>
					
					<section class="hjylEntry">
		<?php
		if ( ! is_single() ) {

			// If not a single post, highlight the gallery.
			if ( get_post_gallery() ) {
				echo '<div id="bb10-gallery">';
					echo get_post_gallery();
				echo '</div>';
			};

		};

		if ( is_single() || ! get_post_gallery() ) {
			the_content();
			wp_link_pages( array( 'before' => '<nav class="page-link">'.hjyl_get_svg( array( 'icon' => 'folder-open') ).'<span>' . __( 'Pages:', 'bb10' ) . '</span>', 'after' => '</nav>' ) );

		};
		?>
					</section>
					<div class="clear"></div>
					<footer>
						<?php if(is_single()) { ?>
						<span class="cat-status" title="<?php _e('Posted in', 'bb10'); ?>">
							<?php echo hjyl_get_svg( array( 'icon' => 'bars' ) ); the_category(', '); ?>
						</span>
						<?php the_tags('<span class="tags">'.hjyl_get_svg( array( 'icon' => 'tags' ) ).'', ', ', '</span>'); edit_post_link( __( 'Edit', 'bb10' ), '<span class="edit-link">'.hjyl_get_svg( array( 'icon' => 'edit' ) ).'', '</span>' ); ?>
						<?php } ?>
					</footer>
				</article><!-- #post-<?php the_ID(); ?> -->