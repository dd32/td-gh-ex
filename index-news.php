<?php
$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), default_data() );
if( $current_options['enable_news'] == 'yes' ):
?>
<!-- Blog Section -->
<section id="section" class="home-post">
	<div class="container">
		
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					
					<?php if( $current_options['news_title'] != '' ): ?>
					<h1 class="section-heading">
						<?php echo esc_attr($current_options['news_title']); ?>
					</h1>
					<?php endif; ?>
					
					<?php if( $current_options['news_contents'] != '' ): ?>
					<p>
						<?php echo esc_attr($current_options['news_contents']); ?>
					</p>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
		<!-- /Section Title -->	
		
		<!-- Blog Post -->	
		<div class="row">
			
			<?php 
			
			$i = 1;
			
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			
			$args = array( 'post_type' => 'post', 'ignore_sticky_posts' => 1 , 'posts_per_page' => 2 , 'paged' => $paged );
			
			$post_type_data = new WP_Query( $args );
			
			if( $post_type_data->have_posts() ):
			
				while( $post_type_data ->have_posts() ): $post_type_data ->the_post();
			?>
			<div class="col-md-6">
				<article class="post">
				
					<figure class="post-thumbnail">
						<span class="entry-date">
							<div class="date"><?php echo get_the_date('j'); ?> 
								<div class="month-year">
									<?php echo get_the_date('M'); ?>
								</div>
							</div>
						</span>
						
						<?php 
							if( has_post_thumbnail() ): 
								the_post_thumbnail(); 
							endif;
						?>
					</figure>
					
					<div class="entry-header">
						<h4 class="entry-title">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h4>
					</div>
					
					<div class="entry-content">
						<?php the_content( __('Read More','spasalon') ); ?>
					</div>
					
				</article>	
			</div>
			
			<?php 
			if($i==2)
			{ 
			    echo '<div class="clearfix"></div>';
				$i=0;
			}
			 
			$i++;
			  
			endwhile;

			endif;
			?>
			
		<!-- /Blog Post -->	
		</div>
		
		<!-- Pagination -->	
		<div class="row">
			<div class="span12">				
				<div class="paginations">
				<?php				
				// Previous/next page navigation.
				the_posts_pagination( array(
				'prev_text'          => __('Previous','spasalon'),
				'next_text'          => __('Next','spasalon')
				) );
				
				?>
				</div>
			</div>
		</div> 
		<!-- /Pagination -->	
		
	</div>
</section>
<!-- End of Blog Section -->

<div class="clearfix"></div>
<?php endif; ?>