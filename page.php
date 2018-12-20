<?php 
/**
 * Main Page template file
**/
get_header(); ?>
<div class="medics-single-blog section-main header-blog">
  <div class=" container-medics container">
    <h1> <span>
      <?php the_title(); ?>
      </span> </h1>
    <div class="header-breadcrumb">
      <ol>
        <?php if (function_exists('medics_custom_breadcrumbs')) medics_custom_breadcrumbs(); ?>
      </ol>
    </div>
  </div>
</div>
<div class="container container-medics">
  <div class="col-md-12 medics-post no-padding">
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="col-md-9 clearfix no-padding">
      <div class="single-blog">
        <div class="blog-contan-col-2 full-width">
          <?php if ( has_post_thumbnail() ) { ?>
          <a href="<?php echo esc_url( get_permalink() ); ?>">
            <?php the_post_thumbnail('',array( 'class' => 'img-responsive medics-featured-image' )); ?>
          </a>
          <?php } ?>
          <h1>
            <?php the_title(); ?>
          </h1>
          <div class="medics-contant">
            <?php the_content(); 
            
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'medics' ),
					'after' => '</div>',
				) ); ?>
          </div>
        </div>
      </div>
      <?php  comments_template( '', true ); ?>
    </div>
    <?php endwhile;
      get_sidebar(); ?>
  </div>
</div>
<?php get_footer();