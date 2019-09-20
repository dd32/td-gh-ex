<?php
/**
 * The template part for displaying services
 *
 * @package bb wedding bliss
 * @subpackage bb_wedding_bliss
 * @since bb wedding bliss 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="page-box">
	  	<div class="new-text">
		    <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h4>   
		    <div class="entry-content"><p><?php the_excerpt();?></p></div>
		    <div class="content-bttn">
		      	<a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right" title="<?php esc_attr_e( 'Read More', 'bb-wedding-bliss' ); ?>"><?php esc_html_e('Read More','bb-wedding-bliss'); ?><span class="screen-reader-text"><?php esc_html_e( 'Read More','bb-wedding-bliss' );?></span></a>
		    </div>
	  	</div>
	  	<div class="clearfix"></div>
	</div>
</article>