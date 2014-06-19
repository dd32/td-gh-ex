<?php 
/**
 * The template for displaying Archive pages
*/
get_header();?>

<section>
  <div class="customize-breadcrumb">
    <div class="container customize-container">
      <h1>
        <?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'customizable' ), get_the_date() );

						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'customizable' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'customizable' ) ) );

						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'customizable' ), get_the_date( _x( 'Y', 'yearly archives date format', 'customizable' ) ) );

						else :
							_e( 'Archives', 'customizable' );

						endif;
					?>
      </h1>
      <?php customizable_breadcrumbs();?>
    </div>
  </div>
</section>
<section class="main_section">
  <div class="container customize-container">
    <div class="left_section">
      <?php if(have_posts()):?>
      <?php while(have_posts()): the_post();?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="section_post border-none">
          <?php if(has_post_thumbnail()) {echo get_the_post_thumbnail(get_the_ID(), 'customizable-blog-width',array('class'=>''));}?>
          <h3>
            <?php the_title(); ?>
          </h3>
          <h4><?php echo customizable_entry_meta();?></h4>
          <div class="content"> <?php the_excerpt();?></div>
          <a class="read-more" href="<?php echo get_permalink();?>">READ MORE</a> </div>
      </article>
      <?php endwhile;?>
      <nav class="customizable-nav"> <span class="customizable-nav-previous pull-left">
        <?php previous_posts_link(); ?>
        </span> <span class="customizable-nav-next pull-right">
        <?php next_posts_link(); ?>
        </span> </nav>
      <!-- .nav-single -->
      <div class="pagination">
        <?php if (function_exists("customizable_paginate"))
		
   		 customizable_paginate(); ?>
      </div>
      <?php
		   else : 
		   ?>
      <p> no posts found </p>
      <?php  endif;?>
    </div>
    <div class="side_bar">
      <?php get_sidebar();?>
    </div>
  </div>
</section>
<?php get_footer();?>
