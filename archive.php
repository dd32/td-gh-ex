<?php get_header(); ?>

    <div id="content" class="row">

	    <div id="main" class="col-xs-12 col-sm-12 col-md-8 col-lg-8" role="main">

		  <?php if (have_posts()) : ?>

			<header id="archive-header">

				<h1 class="page-title">
					<?php if ( is_category() ) : ?>
						<?php echo single_cat_title( '', false ); ?>

					<?php elseif ( is_author() ) : ?>
						<?php printf( __( 'Author Archive for %s', 'appeal' ),
                                      get_the_author_meta( 'display_name',
                                      get_query_var( 'author' ) ) ); ?>

					<?php elseif ( is_tag() ) : ?>
						<?php printf( __( 'Tag Archive for %s', 'appeal' ),
                                      single_tag_title( '', false ) ); ?>

					<?php elseif ( is_day() ) : ?>
						<?php printf( __( 'Daily Archives: %s', 'appeal' ),
                                      get_the_date() ); ?>

					<?php elseif ( is_month() ) : ?>
						<?php printf( __( 'Monthly Archives: %s', 'appeal' ),
                                      get_the_date( _x( 'F Y',
                                      'monthly archives date format', 'appeal' ) ) ); ?>

					<?php elseif ( is_year() ) : ?>
						<?php printf( __( 'Yearly Archives: %s', 'appeal' ),
                                      get_the_date( _x( 'Y',
                                      'yearly archives date format', 'appeal' ) ) ); ?>

    					<?php else : ?>
    						<?php _e( 'Blog Archives', 'appeal' ); ?>

    				<?php endif; ?>
				</h1><!-- .page-title -->
				<?php
				if ( is_category() ) :
					if ( $category_description = category_description() )
						echo '<h2 class="archive-meta">' . $category_description
                        . '</h2>'; ?>
				<?php endif; ?>
                <?php
				if ( is_author() ) :
					$curauth = ( get_query_var('author_name') ) ? 
					get_user_by( 'slug', get_query_var( 'author_name' ) ) :   
					get_userdata( get_query_var(' author' ) );
					if ( isset( $curauth->description ) )
						echo '<h2 class="archive-meta">' . $curauth->description . '</h2>';
				endif;

				if ( is_tag() ) :
					if ( $tag_description = tag_description() )
						echo '<h2 class="archive-meta">' . $tag_description . '</h2>';
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
                         <a href="<?php echo get_permalink(); ?>" 
                            title="<?php the_title_attribute(); ?>"> 
                      <?php esc_attr_e( 'View Article...', 'appeal' ); ?></a>
                </div><!-- ends entry-content -->   
                    <footer class="meta-footer archive-footer">

                     
                      <time class="alignright" 
                            datetime="<?php echo get_the_date('F j, Y'); ?>"
                            itemprop="datePublished" pubdate 
                            class="thedate">
                        <?php echo the_date('', '<em>', '</em>', false ); ?></time> 
                          
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
