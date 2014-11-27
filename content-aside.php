<?php
/**
 * @package Aileron
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-meta entry-meta-header">
		<ul>
			<li><i class="fa fa-user"></i> <?php aileron_posted_by(); ?></li>
			<li><i class="fa fa-clock-o"></i> <?php aileron_posted_on(); ?></li>
			<li><i class="fa fa-folder-o"></i> <?php aileron_first_category(); ?></li>
			<li>
				<i class="fa fa-file-text-o"></i>
				<span class="entry-format">
					<a href="<?php echo esc_url( get_post_format_link( 'aside' ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s Posts', 'aileron' ), get_post_format_string( 'aside' ) ) ); ?>">
						<?php echo get_post_format_string( 'aside' ); ?>
					</a>
				</span>
			</li>
		</ul>
	</div><!-- .entry-meta -->

	<?php aileron_post_thumbnail(); ?>

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'aileron' ) ); ?>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'aileron' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
	<footer class="entry-meta entry-meta-footer">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'aileron' ) );
			if ( $categories_list && aileron_categorized_blog() ) :
		?>
		<span class="cat-links">
			<?php printf( __( 'Posted in %1$s', 'aileron' ), $categories_list ); ?>
		</span>
		<?php endif; // End if categories ?>

		<?php
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', __( ', ', 'aileron' ) );
			if ( $tags_list ) :
		?>
		<span class="tags-links">
			<?php printf( __( 'Tagged %1$s', 'aileron' ), $tags_list ); ?>
		</span>
		<?php endif; // End if $tags_list ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'aileron' ), __( '1 Comment', 'aileron' ), __( '% Comments', 'aileron' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'aileron' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
	<?php endif; ?>

</article><!-- #post-## -->