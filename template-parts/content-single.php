<?php
/**
 * The template part for displaying single post
 *
 * @package advance-education
 * @subpackage advance-education
 * @since advance-education 1.0
 */
?>  
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?> 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="page-box-single">
        <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h1>
        <div class="box-img">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="new-text">
            <?php if( get_theme_mod( 'advance_education_date_hide',true) != '' || get_theme_mod( 'advance_education_comment_hide',true) != '' || get_theme_mod( 'advance_education_author_hide',true) != '') { ?>
                <div class="metabox">
                    <?php if( get_theme_mod( 'advance_education_date_hide',true) != '') { ?>
                      <span class="entry-date"><i class="fa fa-calendar"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
                    <?php } ?>

                    <?php if( get_theme_mod( 'advance_education_comment_hide',true) != '') { ?>
                      <span class="entry-comments"><i class="fas fa-comments"></i><?php comments_number( __('0 Comments','advance-education'), __('0 Comments','advance-education'), __('% Comments','advance-education') ); ?></span>
                    <?php } ?>

                    <?php if( get_theme_mod( 'advance_education_author_hide',true) != '') { ?>
                      <span class="entry-author"><i class="fa fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
                    <?php } ?>
                </div>
            <?php }?>
            <div class="entry-content"><p><?php the_content();?></p></div>
            <?php if( get_theme_mod( 'advance_education_tags_hide',true) != '') { ?>
            <div class="tags"><p><?php
                if( $tags = get_the_tags() ) {
                    echo '<i class="fas fa-tags"></i>';
                    echo '<span class="meta-sep"></span>';
                    foreach( $tags as $content_tag ) {
                      $sep = ( $content_tag === end( $tags ) ) ? '' : ' ';
                      echo '<a href="' . esc_url(get_term_link( $content_tag, $content_tag->taxonomy )) . '">' . esc_html($content_tag->name) . '</a>' . esc_html($sep);
                    }
                } ?></p></div>
            <?php } ?>
            </div>
        <div class="clearfix"></div>
    </div>
</article>