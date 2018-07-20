<?php
/**
 * The template for displaying Author Archive pages.
 *
 * Used to display archive-type pages for posts by an author.
 *
 */
get_header(); ?>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6  col-sm-6 ">
        <p class="redpro-post-title"><?php esc_html_e('Author ','redpro'); echo ":". esc_html__('All posts by ','redpro'), get_the_author(); ?></p>
      </div>
      <div class="col-md-6  col-sm-6 ">
        <ol class="breadcrumb  pull-right">
          <li><a href="<?php echo esc_url(site_url());?>"><?php esc_html_e('Home','redpro'); ?></a></li>
          <li class="active"><a href="<?php echo esc_url(site_url()).'/author/'.get_the_author();?>"><?php echo esc_html(get_the_author()); ?></a></li>
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
        <?php if (have_posts() ) :
          while (have_posts()) : the_post(); ?>
        <article class="post">
          <h2 class="post-title"><a href="#"></a> </h2>
          <div class="post-meta">
            <div class="post-date"> <span class="day"><?php echo esc_html(get_the_time('d')); ?></span> <span class="month"><?php echo esc_html(get_the_time('M')); ?></span> </div>
            <!--end / post-date-->
            
            <div class="post-meta-author">
              <div class="post-author-name">
                <h5><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h5>
               </div>
              <?php redpro_entry_meta(); ?>
              <div class="clear-fix"></div>			      
            </div>
            <!--end / post-meta--> 
            
          </div>
          <figure class="feature-thumbnail-large">
            <?php if(has_post_thumbnail()) { ?>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large');?></a>
            <?php } ?>
          </figure>
          <div class="post-content">
            <?php the_excerpt(); ?>
          </div>
          <!--end / post-content--> 
        </article>
        <?php endwhile; endif; ?>
        
        <!--end / article--> 
     
        <!--Pagination Start-->
        <?php the_posts_pagination( array(
            'screen-reader-text'=>'',
            'Previous' => __( 'Back', 'redpro' ),
            'Next' => __( 'Onward', 'redpro' ),
          ) ); ?>
        <!--Pagination End-->
      </div>
      <!--end / main-->
      <div class="col-md-4 sidebar">
      	<?php get_sidebar(); ?>
      </div>
    </div>
  </div>
  <!-- /container --> 
</div>
<?php get_footer(); ?>