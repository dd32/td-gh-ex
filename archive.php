<?php 

// Exit if accessed directly

if (!defined('ABSPATH'))

    exit;

/**

 * The template for displaying Category Archive pages. 

 * @package RedPro

 */

get_header(); ?>



<div class="page-title">

  <div class="container">

    <div class="row">

      <div class="col-md-6  col-sm-6 ">

        <?php

	  	$archives = get_the_category();

		$archives_name = $archives[0]->name;

		$archives_id = $archives[0]->cat_ID;

	  ?>

        <?php if ( have_posts() ) : 

	 		printf( __( '<h1>Archives : %s', 'RedPro' ), '<small>' . get_the_date('M-Y') . '</small></h1>' );

		endif; ?>

      </div>

      <div class="col-md-6  col-sm-6 ">

        <ol class="breadcrumb  pull-right">

          <li><a href="<?php echo site_url();?>">Home</a></li>

          <li class="active"><a href="<?php echo get_category_link( $archives_id );?>"><?php echo $archives_name;?></a></li>

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

        <?php if (have_posts() ) : ?>

        <?php while (have_posts()) : the_post(); ?>

        <article class="post">

          <h2 class="post-title"><a href="#"></a> </h2>

          <figure class="feature-thumbnail-large">

            <?php 

			$id = get_the_ID();

			$feat_image = wp_get_attachment_url(get_post_thumbnail_id($id)); 

			if($feat_image!="")

			{

			?>

            <a href="<?php echo $feat_image ?>"> <img src="<?php echo $feat_image ?>" class="img-responsive" alt="<?php echo get_the_title();?>" /> </a>

            <?php

			}

			?>

          </figure>

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

              <div class="post-comment"> COMMENT: <a href="#"><?php echo get_comments_number(); ?></a> </div>

            </div>

            <?php the_tags(); ?>

            <!--end / post-meta--> 

            

          </div>

          <div class="post-content">

            <?php the_excerpt(); ?>

         

          </div>

          <!--end / post-content--> 

        </article>

        <?php endwhile; ?>

        <?php endif; ?>

        

        <!--end / article--> 

      </div>

      <!--end / main-->

      <div class="col-md-3 col-md-offset-1 sidebar">

      	<?php get_sidebar(); ?>

      </div>

    </div>

  </div>

  

  <!-- /container --> 

</div>

<?php get_footer(); ?>

