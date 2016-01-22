<?php
/**
* The template used for displaying page content in front-page.php
*
* @package beam
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if (the_title() != '' ) {
?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
<?php }
?>

	
	<?php
	// If the post has a Post Thumbnail assigned to it.
	if ( has_post_thumbnail() ) {
	?>
	<div class="featured-image">
	<?php
	the_post_thumbnail('big-thumbnail');
	?>
	</div>
	<?php
	} 
	?>

	<div class="entry-content-page">
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
		'before' => '<div class="page-links round-corners">' . __( 'Pages:', 'beam' ),
		'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content-page -->
	
	<?php edit_post_link( __( 'Edit', 'beam' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
	
</article><!-- #post-## -->
