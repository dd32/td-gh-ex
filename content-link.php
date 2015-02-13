<?php
/**
 * Link template file
 *
 * @package atout
 * @author Frenchtastic.eu
 * @link http://codex.wordpress.org/Template_Hierarchy
 */
?>

<?php $link = get_post_meta( $post->ID, '_atout_link_url', true ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-link text-center">
		<a href="<?php echo the_permalink(); ?>"><i class="fa fa-link fa-3x"></i></a>
		<?php the_title( sprintf( '<h2 class="entry-title post-link-title"><a href="%s">', esc_url( atout_get_link_url() ) ), '</a></h2>' ); ?>
	</div>
</article>