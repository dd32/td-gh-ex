<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ThemeGrill
 * @subpackage Accelerate
 * @since Accelerate 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'accelerate_before_post_content' ); ?>

	<header class="entry-header">
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a>
		</h1>
	</header>

	<?php 
		if ( 'post' == get_post_type() ) :
			accelerate_entry_meta();
		endif; 
	?>

	<div class="entry-content clearfix">
		<?php
			global $more;
			$more = 0;
			the_content( '<span>'.__( 'Read more', 'accelerate' ).'</span>' ); 
		?>
	</div>

	<?php do_action( 'accelerate_after_post_content' ); ?>
</article>

