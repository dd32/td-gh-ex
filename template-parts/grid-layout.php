<?php
/**
 * The template part for displaying services
 *
 * @package bb wedding bliss
 * @subpackage bb_wedding_bliss
 * @since bb wedding bliss 1.0
 */
?>
<div class="col-lg-4 col-md-4">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="page-box grid">
      <div class="box-image">
        <?php the_post_thumbnail();  ?>
      </div>
      <div class="new-text">
        <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php esc_html(the_title()); ?><span class="screen-reader-text"><?php esc_html(the_title()); ?></span></a></h2>   
        <?php if(get_theme_mod('bb_wedding_bliss_blog_post_description_option') == 'Full Content'){ ?>
          <?php the_content(); ?>
        <?php }
        if(get_theme_mod('bb_wedding_bliss_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
          <?php if(get_the_excerpt()) { ?>
            <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( bb_wedding_bliss_string_limit_words( $excerpt, esc_attr(get_theme_mod('bb_wedding_bliss_excerpt_number','20')))); ?><?php echo esc_html( get_theme_mod('bb_wedding_bliss_post_suffix_option','...') ); ?></p></div>
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
</div>
