<?php
/**
* @package beam
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
		<?php beam_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php 
		the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
		the_excerpt(); 
		?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	
	<div class="entry-content">
		<?php 
		the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
		
		the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'beam' ) ); 
		
		wp_link_pages( array(
		'before' => '<div class="page-links round-corners">' . __( 'Pages:', 'beam' ),
		'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search 
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'beam' ) );
		if ( $categories_list && beam_categorized_blog() ) :
		?>

		<span class="fa fa-permalink">
			<?php
				the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a><i class="fa fa-link"></i>' );
			?>
		</span>
		
		<span class="cat-links">
		<i class="fa fa-folder-open"></i> <?php printf( __( '%1$s', 'beam' ), $categories_list ); ?>
		</span>

		<?php endif; // End if categories 

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'beam' ) );
		if ( $tags_list ) :
		?>
		<span class="tags-links">
		<i class="fa fa-tags"></i> <?php printf( __( '%1$s', 'beam' ), $tags_list ); ?>
		</span>
		<?php 
		endif; // End if $tags_list
		endif; // End if 'post' == get_post_type() 
		?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><i class="fa fa-comment"></i> <?php comments_popup_link( __( 'Leave a comment', 'beam' ), __( '1 Comment', 'beam' ), __( '% Comments', 'beam' ) ); ?></span>
		<?php endif; ?>

		<?php
		if ( current_user_can('edit_posts') ) {
		?>
		<i class="fa fa-pencil"></i> <?php edit_post_link( __( 'Edit', 'beam' ), '<span class="edit-link">', '</span>' ); ?>
		<?php }
		?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->