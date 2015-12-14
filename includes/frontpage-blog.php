<div class="section notopmargin notopborder section-blog">
	<div class="container clearfix">
		<div class="heading-block center nomargin">
			<h3><?php echo esc_html( get_theme_mod( 'agama_blue_blog_heading', 'Latest from the Blog' ) ); ?></h3>
		</div>
	</div>
</div>

<div class="container container-blog clear-bottommargin clearfix">
	<div class="row">
	
		<?php if ( have_posts() ) : ?>
	
			<?php
			$posts_per_page = get_theme_mod( 'agama_blue_blog_posts_number', '4' );
			// Fix Paged on Static Homepage
			if( get_query_var('paged') ) { 
				$paged = get_query_var('paged'); 
			}
			elseif( get_query_var('page') ) { 
				$paged = get_query_var('page'); 
			}
			else { $paged = 1; }
			$args = array(
				'posts_per_page' => $posts_per_page,
				'paged' => $paged
			);
			query_posts( $args ); ?>
	
			<?php while ( have_posts() ) : the_post(); ?>
	
				<div class="col-md-3 col-sm-6 bottommargin">
					<div class="ipost clearfix">
					
						<?php if( has_post_thumbnail() ): ?>
						<div class="entry-image">
							<a href="<?php the_permalink(); ?>">
								<img class="image_fade" src="<?php echo agama_return_image_src('agama-blog-small'); ?>" alt="<?php the_title(); ?>">
							</a>
						</div>
						<?php else: ?>
						<div class="entry-image">
							<a href="<?php the_permalink(); ?>">
								<img class="image_fade" src="https://placeholdit.imgix.net/~text?txtsize=33&txt=400%C3%97300&w=400&h=300">
							</a>
						</div>
						<?php endif; ?>
						
						<div class="entry-title">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>
						<ul class="entry-meta clearfix">
							<li><i class="fa fa-calendar"></i> <?php echo get_the_time('d M, Y'); ?></li>
							<li><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comments"></i> <?php echo get_comments_number(); ?></a></li>
						</ul>
						<div class="entry-content">
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>
				
			<?php endwhile; ?>
			
			<?php wp_reset_query(); ?>
				
		<?php endif; ?>
	
	</div>
</div>