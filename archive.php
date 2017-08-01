<?php get_header(); ?>

    <div id="content" class="row">

	    <div id="main" class="col-xs-12 col-sm-12 col-md-8 col-lg-8" role="main">

		  <?php if (have_posts()) : ?>

			<header id="archive-header">

				<h1 class="page-title">
					<?php if ( is_category() ) : ?>
						<?php echo single_cat_title( '', false ); ?>

					<?php elseif ( is_author() ) : ?>
						<?php esc_html_e( 'Author Archive for ', 'appeal' ); 
                              printf( esc_attr( get_the_author_meta( 
                                      'display_name', get_query_var( 'author' ) ) ) 
                                    ); ?>

					<?php elseif ( is_tag() ) : ?>
						<?php echo esc_html_e( 'Tag Archive for ', 'appeal' );  
                                      printf( single_tag_title( '', false ) ); ?>

					<?php elseif ( is_day() ) : ?>
						<?php echo esc_html_e( 'Daily Archives: ', 'appeal' );
                              printf( get_the_date() ); ?>

					<?php elseif ( is_month() ) : ?>
						<?php echo esc_html_e( 'Monthly Archives: ', 'appeal' );
                              printf( esc_attr( get_the_date( 'F Y' ) ) ); ?>

					<?php elseif ( is_year() ) : ?>
						<?php echo esc_html_e( 'Yearly Archives: ', 'appeal' );
                              printf( esc_attr( get_the_date( 'Y' ) ) ); ?>

    					<?php else : ?>
    						<?php esc_html_e( 'Blog Archives', 'appeal' ); ?>

    				<?php endif; ?>
				</h1><!-- .page-title -->
				<?php
				if ( is_category() ) :
					if ( $category_description = category_description() ) ?> 
						<div class="archive-meta"><?php echo wp_kses( $category_description, '<p>', '</p>' ); ?></div>
				<?php endif; ?>
                <?php 
				if ( is_tag() ) :
					if ( $tag_description = tag_description() ) ?>
						<div class="archive-meta"><?php echo wp_kses( $tag_description, '<p>', '</p>' ); ?></div>
				<?php 
				endif;
				?>
			</header><!-- #archive-header -->
            <?php
            while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="entry-title"><a href="<?php the_permalink() ?>"
                                           rel="bookmark"><?php the_title(); ?></a></h1>
                <div class="entry-content">

                    <?php the_excerpt(); ?>
                         <a href="<?php echo esc_url( get_permalink() ); ?>" 
                            title="<?php the_title_attribute(); ?>"> 
                      <?php esc_attr_e( 'View Article...', 'appeal' ); ?></a>
                </div><!-- ends entry-content -->   
                    <footer class="meta-footer archive-footer">

                    <?php $time_format = get_the_date( get_option('date_format') ); ?>
                     
                    <time class="alignright" 
                      datetime="<?php echo esc_attr( $time_format ); ?>"
                      itemprop="datePublished" pubdate 
                      class="thedate"><?php echo esc_html( $time_format ); ?></time> 
                      
                    </footer>
            </article><!-- #post -->

        <?php endwhile; // end of the loop ?>

		<?php else : ?>

		       <?php get_template_part( 'nothing' ); ?>

		<?php endif; ?>

                    <?php get_template_part( 'nav', 'content' ); ?>

	    </div>
	    
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

            <?php get_sidebar( 'right' ); ?>

        </div>


    </div><!-- ends #content .row -->

<?php get_footer(); ?>
