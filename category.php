<?php get_header(); ?>

  <section class="esection">

    <div class="father-col clearfix">

      <?php if (have_posts()) : 

        while (have_posts()) : 

          the_post();

          ?>

        <div class="col-33">

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="">

              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

              <ul>

                <li><?php the_time( get_option('date_format') ); ?></li>

                <li><?php the_category( ', ' ); ?></li>

              </ul>

            </div>

            <div class="">

              <?php 

              the_post_thumbnail('large');

              the_excerpt();

              ?>          

            </div>

          </article>  <!-- article -->

        </div><!--col-33-->

      <?php endwhile; else : ?>          

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

          <h1><?php esc_html_e('No content available', 'baena'); ?></h1>       

          <div class="">

            <p><?php esc_html_e('There is no content corresponding to this page, please do a search to find what you are looking for', 'baena'); ?></p>

            <?php get_search_form(); ?>

          </div>

        </article>

      <?php endif; ?>    

    </div><!--.father-col clearfix-->

    

    <div class="father-col clearfix">

      <div class="pager">

        <?php get_template_part( 'pagination' ); ?>    

      </div><!--.pager--> 

    </div><!--.father-col clearfix--> 

  </section><!--.esection-->    

<?php get_footer(); ?>