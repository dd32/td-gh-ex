<?php 
/**
 * Category Page template file
**/
get_header(); ?>
<div class="medics-single-blog section-main header-blog">
  <div class=" container-medics container">
    <h1><?php esc_html_e('Category', 'medics'); echo " : <span>" .single_cat_title( '', false ).'</span>'; ?></h1>
    <div class="header-breadcrumb">
      <ol>
        <?php if (function_exists('medics_custom_breadcrumbs')) medics_custom_breadcrumbs(); ?>
      </ol>
    </div>
  </div>
</div>
<div class="container container-medics">
  <div class="col-md-12 no-padding">
 <?php $custom_class = (get_theme_mod('post_sidebar_layout', 'right') == 'left') ? "9" : ((get_theme_mod('post_sidebar_layout', 'right') == 'right') ? "9" : "12");  
  if ( get_theme_mod( 'post_sidebar_layout','right'  ) == "left" ) { ?>
        <div class="left-side-cls">
       <?php get_sidebar(); ?>
     </div>
  <?php } ?>
    <div class="col-md-<?php echo esc_attr($custom_class); ?> clearfix no-padding">
      <?php $medics_args = array(
            'orderby'      => 'post_date', 
            'order'        => 'DESC',
            'post_type'    => 'post',
            'paged' => $paged,
            'post_status'    => 'publish' 
            );
  $medics_query = new WP_Query($medics_args); ?>
      <?php if ($medics_query->have_posts() ) : while ($medics_query->have_posts()) : $medics_query->the_post(); ?>
      <div class="single-blog">
        <div class="blog-date-col-1">
          <h2><?php echo get_the_date("M j, Y "); ?> </h2>
          <div class="blog-comment"> <i class="fa fa-comments"></i><?php comments_number( '0', '1', '%' ); ?> </div>
        </div>
        <div class="blog-contan-col-2">
              <?php 
              if ( get_theme_mod( 'hide_post_image' ) == "" ) { 
               if ( has_post_thumbnail() ) { ?>
                <a href="<?php echo esc_url( get_permalink() ); ?>">
                  <?php the_post_thumbnail('',array( 'class' => 'img-responsive medics-featured-image' )); ?>
                </a>
                <?php } } ?>
              <h1><a href=<?php echo esc_url( get_permalink() ); ?>>
                <?php the_title(); ?>
                </a></h1>
              <div class="dr-name-icon">
              <?php if ( get_theme_mod( 'hide_post_meta_tag' ) == "" ) { 
                medics_entry_meta();
                 } ?>
                 </div>
              <div class="medics-contant">
            <?php the_excerpt(); ?>
          </div>
        </div>
      </div>
      <?php endwhile; endif; // end of the loop. ?>
      <div class="col-md-12 medics-default-pagination">
      <?php
             the_posts_pagination( array(
            'type'  => 'div',
            'screen_reader_text' => ' ',
            'prev_text'          => esc_html__( '<< Previous', 'medics' ),
            'next_text'          => esc_html__('Next >>','medics'),
            ) ); ?>
      </div>
    </div>
    <?php 
    if ( get_theme_mod( 'post_sidebar_layout','right'  ) == "right" ) {
         get_sidebar();
    } ?>  </div>
</div>
<?php  get_footer();