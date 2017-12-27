<?php get_header(); ?>
<!--Call Sub Header-->
<!--Call Sub Header-->
<div id="sub_banner_page" class=" callout  border-none">
<div class="single-page-thumb-outer">
  <div class="page-thumb">
  <?php if ( has_post_thumbnail( $post->ID ) ) : ?>
    <img data-interchange="[<?php echo the_post_thumbnail_url('bestblog-small'); ?>, small], [<?php echo the_post_thumbnail_url('bestblog-large'); ?>, medium], [<?php echo the_post_thumbnail_url('bestblog-xlarge'); ?>, large], [<?php echo the_post_thumbnail_url('bestblog-xlarge'); ?>, xlarge]"  />
  <?php endif;?>
  <div class="heade-content">
    <h1 class="text-center">
      <?php the_title(); ?>
    </h1>
  </div>
  </div>
</div>
</div>
<!--Content-->
<div id="content-page" class="padding-vertical-small-0 padding-vertical-large-1">
  <div class="grid-container padding-horizontal-0">
    <div class="grid-x grid-margin-x align-center">
      <div class="cell  small-24 large-17">
        <div class="page_content moon-curve z-depth-1">
          <?php if(have_posts()): ?>
            <?php while(have_posts()): ?>
              <?php the_post();?>
              <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                <div class="metadate">
                  <?php
                  edit_post_link(
                    sprintf(
                      /* translators: %s: Name of current post */
                      __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'best-blog' ),
                      get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                  );
                  ?>
                </div>

              <div class="page_content_wrap">
                <?php the_content();
                wp_link_pages( array(
                  'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'best-blog' ) . '</span>',
                  'after'       => '</div>',
                  'link_before' => '<span>',
                  'link_after'  => '</span>',
                  'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'best-blog' ) . ' </span>%',
                  'separator'   => '<span class="screen-reader-text">, </span>',
                ) );
                ?>

              </div>
            <?php endwhile ?>

          </div>
          <div class="comments_template">
            <?php if ( comments_open() || get_comments_number() ) {
              comments_template();
            }?>
          </div>
        <?php endif ;?>
        </div>
      </div>
      <!--PAGE END-->
      <?php get_template_part('sidebar'); ?>
    </div>
    </div>
  </div>
<?php get_footer(); ?>
