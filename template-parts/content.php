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
		<?php 
      		if(has_post_thumbnail()) { ?>
			<div class="box-image col-lg-6 col-md-6">
				<?php the_post_thumbnail();  ?>
			</div>
	    <?php } ?>
	  	<div class="new-text">
		    <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>   
		    <?php if(get_theme_mod('bb_wedding_bliss_blog_post_description_option') == 'Full Content'){ ?>
		        <?php the_content(); ?>
		      <?php }
		      if(get_theme_mod('bb_wedding_bliss_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
		        <?php if(get_the_excerpt()) { ?>
	          		<div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( bb_wedding_bliss_string_limit_words( $excerpt, esc_attr(get_theme_mod('bb_wedding_bliss_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('bb_wedding_bliss_post_suffix_option','...') ); ?></p></div>
		        <?php }?>
		    <?php }?>
		    <?php if( get_theme_mod('bb_wedding_bliss_button_text','Read More') != ''){ ?>
		        <div class="content-bttn">
	          		<a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right" title="<?php esc_attr_e( 'Read More', 'bb-wedding-bliss' ); ?>"><?php echo esc_html(get_theme_mod('bb_wedding_bliss_button_text','Read More'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('bb_wedding_bliss_button_text','Read More'));?></span></a>
		        </div>
		    <?php } ?>
	  	</div>
	  	<div class="clearfix"></div>
	</div>
</article>