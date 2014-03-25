<?php
/**
 * @package URVR
 */
global $urvr;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title( '<i class="el-icon-tags"></i>', '' ); ?></a></h1>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php if( isset($urvr['featured-image'] ) && $urvr['featured-image'] ) : ?>
			<div class="thumb">
				<?php 
					if( has_post_thumbnail() && ! post_password_required() ) : 
						the_post_thumbnail(); 
					else :
						echo '<img src="http://placehold.it/240x195" />';
					endif;
				?>
			</div>
		<?php endif; ?>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', TEXTDOMAIN ) ); ?>
		<?php //the_content( '',false,'' ); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', TEXTDOMAIN ),
				'after'  => '</div>',
			) );
		?>
		<br class="clear" />
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<span class="posted-on"><?php abaris_post_date(); ?></span>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', TEXTDOMAIN ) );
				if ( $categories_list && abaris_categorized_blog() ) :
			?>
			<span class="cat-links">
				<i class="el-icon-list-alt"></i>
				<?php printf( __( ' %1$s', TEXTDOMAIN ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', TEXTDOMAIN ) );
				if ( $tags_list ) :
			?>		
			<span class="tags-links">
				<i class="el-icon-tags"></i>
				<?php printf( __( ' %1$s', TEXTDOMAIN ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>
		<?php edit_post_link( __( '<span class="edit-link"><i class="el-icon-file-edit"></i> Edit</span>', TEXTDOMAIN ), '', '' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->