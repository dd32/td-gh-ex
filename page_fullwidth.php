<?php /* Template Name: Full Width */ ?>
<?php get_header(); ?>

  <!--EXAMPLE OF LOOP WITH JQUERY, IN SINGLE YOU HAVE ANOTHER-->
  <section class="slider-container">
    <ul id="slider" class="slider-wrapper">
      <?php
        $args = array(
          // Arguments for the query
          'post_per_page'=> 3,
          'orderby'=> 'date',
          'order'=> 'ASC'
        );
        // The query
        $query = new WP_Query( $args );
        // The Loop
        if ( $query->have_posts() ) {
          while ( $query->have_posts() ) { 
            $query->the_post() ;
            ?>
            <li class="slide-current">
              <?php the_post_thumbnail('full'); ?> 
              <div class="caption">
                <div class="clearfix grid">
                  <div class="line"></div>
                  <h3 class="caption-title"><?php the_title(); ?></h3>
                  <!--<p><?php the_content(); ?></p>-->
                </div><!--clearfix grid-->
              </div><!--.caption-->
            </li>
        <?php
        }
      }
      // Reset the query
      wp_reset_postdata();
      ?>
    </ul><!--.slider-wrapper-->
    <div class="slide grid">
      <ul id="slider-controls" class="slider-controls"></ul>
    </div><!--slide grid-->
  </section><!--.slider-container-->
  <!--END EXAMPLE OF LOOP WITH JQUERY, IN SINGLE YOU HAVE ANOTHER-->

  <section class="esection-full">
      <?php if (have_posts()) : 
        while (have_posts()) : 
          the_post();
          ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1> <?php the_title(); ?> </h1>
          <div class="">
            <?php the_content(); ?>
            <!--<?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>-->                
          </div>

          <div class="">
            <h2><?php esc_html_e('Write to us', 'baena'); ?></h2>
          </div>          
        </article>
      <?php endwhile; endif; ?>
  </section><!--.esection-full-->
<?php get_footer(); ?>