<?php
/**
 * @package star
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('star-border');  ?>>
	<header class="entry-header">
		<span class="entry-meta">
			<?php 
				star_posted_on(); 
			?>
			</span>
			<span class="entry-meta">
			<?php
			$categories_list = get_the_category_list( __( ', ', 'star' ) );
				if ( $categories_list && star_categorized_blog() ) {
					echo $categories_list;
				}
			?>
			</span><!-- .entry-meta -->

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
		if ( has_post_thumbnail()){
			the_post_thumbnail();
		}
		
		the_content(); 

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'star' ),
			'after'  => '</div>',
		) );
		?>
		
	</div><!-- .entry-content -->
	<?php star_entry_footer(); ?>
</article><!-- #post-## -->
