<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package appsetter
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header list-articles">
	<div class="row">
<div class="list-image col-md-5">
	<a href="<?php the_permalink(); ?>" >
	
	<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail('appsetter-frontpage-list');
		} 
		else { 
			if ( '' == get_theme_mod( 'appsetter_default_large' ) ) { 
				$appsetter_default_large = ' '.get_template_directory_uri().'/images/default-image-large.jpg'; 
			} 
			else { 
				$appsetter_default_large = esc_url(get_theme_mod('appsetter_default_large')); 
			}
		?>
			<img src="<?php echo $appsetter_default_large; ?>" alt="<?php the_title(); ?>" />
			
	<?php } ?>
	
	
	</a>
			
</div>
<div class="list-description col-md-7">
	<div class="list-meta">
		<?php appsetter_entry_listmeta(); ?>
				</div><!-- .entry-footer -->
		<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
			<div class="entry-meta">
			<?php appsetter_posted_on(); ?>
		</div><!-- .entry-meta -->
		<div class="the-excerpt">
			<?php the_excerpt(); ?>
		</div>
	

</div>	
</div>
		
		
	</header><!-- .entry-header -->

	

</article><!-- #post-## -->
