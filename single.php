<?php get_header(); ?>

<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6  col-sm-6 ">
        <h1>Blog : <small>
          <?php RedPro_title() ?>
          </small></h1>
      </div>
      <div class="col-md-6  col-sm-6 ">
        <ol class="breadcrumb  pull-right">
          <?php RedPro_breadcrumbs(); ?>
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
              <div class="post-date"> <span class="day"><?php echo get_the_time('d'); ?></span> <span class="month"><?php echo get_the_time('M'); ?></span> </div>
              <!--end / post-date-->
              <div class="post-meta-author">
                <div class="post-author-name">
                  <h5><a href="<?php the_permalink(); ?>" title="View post <?php the_title(); ?>">
                    <?php the_title(); ?>
                    </a></h5>
                </div>
                <div class="post-category">
                  <?php $category = get_the_category();  ?>
                  POST IN:
                  <?php
				$count_category=0;
				foreach($category as $each_category):
					if($count_category!=0):
						echo ", ";
					endif;
				?>
                  <a href="<?php echo get_category_link($each_category->term_id ); ?>"><?php echo $each_category->cat_name; ?></a>
                  <?php
				$count_category++;
				endforeach;
				?>
                </div>
                <div class="post-author"> BY:
                  <?php the_author_posts_link(); ?>
                </div>
                <div class="post-comment"> COMMENT: <a href="#">
                  <?php  $comments_count=wp_count_comments($post->ID); echo $comments_count->approved; ?>
                  </a> </div>
              </div>
              <?php the_tags(); ?>
              <!--end / post-meta--> 
              
            </div>
            <figure class="feature-thumbnail-large">
              <?php /*
			$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			if($feat_image!="") { ?>
            
          	<a href="<?php echo $feat_image;?>">
            	<img src="<?php echo $feat_image;?>" class="img-responsive" alt="<?php echo get_the_title();?>" />
            </a>
          <?php } */
		   the_post_thumbnail();
		  ?>
            </figure>
            <div class="post-content">
              <?php the_content(); 
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'RedPro' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
            </div>
            <!--end / post-content-->
          </div>
        </article>
        <?php comments_template( '', true ); ?>
      </div>
      <!--end / main-->
      <?php endwhile; // end of the loop. ?>
      <div class="col-md-3 col-md-offset-1 sidebar">
      	<?php get_sidebar(); ?>
      </div>
    </div>
  </div>
  
  <!-- /container --> 
</div>
<?php get_footer(); ?>
