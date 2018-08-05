<?php if(get_theme_mod('adviso_featposts_cat_enable') =='enable' && is_front_page()): ?>
		
		<div id="featured-categories" class="container">
				
			<?php if (get_theme_mod('adviso_featcat_title') !='') : ?>
			    <div class="section-title title-font">
			        <span><?php echo esc_html( get_theme_mod('adviso_featcat_title',__('Featured Categories','adviso')) ); ?></span>
			    </div>
		    <?php endif; ?>
		    
		    <div id="categories-container">
			    <?php
					$cats = [];
					for ($i = 1; $i <= 3; $i++) {
						$cats[$i]	=	get_theme_mod('adviso_featposts_category_' . $i);
					}
					
					foreach($cats as $cat) {
						
						$args	=	array(
							'posts_per_page' => 3,
							'cat'			 => $cat	
						);
						
						$query	= new WP_Query( $args );
						
						$count	=	0;
						while ( $query->have_posts() ) :
							$query->the_post();
							global $post;
							
							$thumb[$count]	=	get_post_thumbnail_id( $post->ID );
							
							$count++;
							
						endwhile; ?>
						
						
						<div class="category-wrapper category-<?php echo str_replace( ' ', '-', strtolower( esc_html( get_cat_name($cat) ) ) ); ?>">
							<div class="category-title">
								<a href="<?php echo esc_url( get_category_link( $cat ) ) ?>" title="<?php echo esc_attr( get_cat_name($cat) ); ?>"><span><?php echo esc_html( get_cat_name($cat) ); ?></span></a>
							</div>
							<div class="category-thumbs">
								<div class="category-thumb-1 grid-item">
									<?php if ( $thumb[0] != '' ) :
										echo wp_get_attachment_image( $thumb[0], 'large');
									else : ?>
										<img src="<?php echo get_template_directory_uri() . '/assets/images/placeholder.png'; ?>">
									<?php endif; ?>
								</div>
								<div class="category-thumb-2 grid-item">
									<?php if ( $thumb[1] != '' ) :
										echo wp_get_attachment_image( $thumb[1], 'large');
									else : ?>
										<img src="<?php echo get_template_directory_uri() . '/assets/images/placeholder.png'; ?>">
									<?php endif; ?>
								</div>
								<div class="category-thumb-3 grid-item">
									<?php if ( $thumb[2] != '' ) :
										echo wp_get_attachment_image( $thumb[2], 'large');
									else : ?>
										<img src="<?php echo get_template_directory_uri() . '/assets/images/placeholder.png'; ?>">
									<?php endif; ?>
								</div>
							</div>
						</div>
						
					<?php
					} ?>
			</div>
		    
		</div>

<?php endif; ?>