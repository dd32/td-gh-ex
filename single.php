<?php get_header(); ?>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6  col-sm-6 ">
        <p class="redpro-post-title"><?php esc_html_e('Blog ','redpro'); echo " : "; ?>
          <span class="redpro-post-subtitle">
          <?php redpro_title() ?>
          </span></p>
      </div>
      <div class="col-md-6  col-sm-6 ">
        <ol class="breadcrumb  pull-right">
          <?php redpro_breadcrumbs(); ?>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--end / page-title-->
<div class="main-container">
  <div class="container"> 
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-8 main">
        <article class="post">
          <h2 class="post-title"><a href="#"></a> </h2>
          <?php while ( have_posts() ) : the_post(); ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post-meta">
            <nav class="redpro-nav">
                <span class="redpro-nav-previous"><?php previous_post_link(); ?></span>
                <span class="redpro-nav-next"><?php next_post_link(); ?></span>
			</nav><!-- .nav-single -->
              <div class="post-date"> <span class="day"><?php echo esc_html(get_the_time('d')); ?></span> <span class="month"><?php echo esc_html(get_the_time('M')); ?></span> </div>
              <!--end / post-date-->
              <div class="post-meta-author">
                <div class="post-author-name">
                  <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                </div>
              <?php redpro_entry_meta(); ?>
              <div class="clear-fix"></div>			       
            </div>
              <!--end / post-meta-->
            </div>
            <figure class="feature-thumbnail-large">
              <?php the_post_thumbnail(); ?>
            </figure>
            <div class="post-content">
              <?php the_content(); 
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'redpro' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) ); ?>
            </div>
            <!--end / post-content-->
          </div>
        </article>
        <?php comments_template( ''); ?>
      </div>
      <!--end / main-->
      <?php endwhile; // end of the loop. ?>
      <div class="col-md-4 sidebar">
      	<?php get_sidebar(); ?>
      </div>
    </div>
  </div>
  <!-- /container --> 
</div>
<?php get_footer(); ?>
