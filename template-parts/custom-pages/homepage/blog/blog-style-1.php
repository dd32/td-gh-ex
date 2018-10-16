<?php
$prefix      = atlast_business_get_prefix();
$latest_post = absint( get_theme_mod( $prefix . '_blog_section_latest_posts_number', 4 ) );
$args        = array( 'post_type' => 'post', 'posts_per_page' => $latest_post, 'ignore_sticky_posts' => true );
$blogQ       = new WP_Query( $args );
if ( $blogQ->have_posts() ):
	while ( $blogQ->have_posts() ): $blogQ->the_post();
		?>
        <div class="column col-3 col-md-6 col-sm-6 col-xs-12">
            <div class="single-blog-item">
				<?php if ( has_post_thumbnail() ): ?>
                    <a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'atlast-business-front-blog', array(
							'class' => 'img-responsive single-blog-img',
							'alt'   => get_the_title()
						) ); ?>
                    </a>
				<?php endif; ?>
                <div class="blog-item-contents">
                    <div class="date">
                        <span class="fas fa-calendar-alt"></span>
						<?php echo get_the_time( get_option( 'date_format' ) ); ?>
                    </div>
                    <h4><?php the_title(); ?></h4>
                    <a href="<?php the_permalink(); ?>">
						<?php echo __( 'Read More', 'atlast-business' ); ?><span class="fas fa-plus"></span>
                    </a>
                </div>

            </div>
        </div>
	<?php
	endwhile;
endif;
wp_reset_postdata();
?>