<?php
/**
 * The template used for displaying Portfolio
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama v1.0.1
 */
	// Get portfolio item category names
	$terms = wp_get_post_terms( get_the_id(), 'portfolio-categories', array( 'order' => 'ASC' ) );
	foreach( $terms as $term ) {
		$category[] = strtolower($term->name);
	}
	
	// Determine what portfolio template we are using and set proper images sizes
	if( agama_is_page_template( 'portfolio-one-column.php' ) )		$thumb_size = 'portfolio-one';
	if( agama_is_page_template( 'portfolio-two-columns.php' ) ) 	$thumb_size = 'portfolio-two';
	if( agama_is_page_template( 'portfolio-three-columns.php' ) ) 	$thumb_size = 'portfolio-three';
	if( agama_is_page_template( 'portfolio-four-columns.php' ) ) 	$thumb_size = 'portfolio-four';
?>

	<?php if( is_page_template( 'page-templates/portfolio-one-column.php' ) ): // Portfolio one column ?>
	<div class="portfolio-wrapper">
		<article id="post-<?php the_ID(); ?>" class="article-portfolio <?php echo implode( ' ', $category ); ?>">
			<?php if( agama_return_image_src($thumb_size) ): ?>
			<figure class="portfolio-item effect-bubba" data-src="<?php echo agama_return_image_src('portfolio-full'); ?>">
				<img src="<?php echo agama_return_image_src($thumb_size); ?>" class="img-responsive">
				<figcaption>
					<?php agama_thumb_title(); ?>
					<p>
						<a href="<?php the_permalink(); ?>"><i class="fa fa-fw fa-link"></i></a>
						<a style="cursor:pointer;"><i class="fa fa-fw fa-search-plus"></i></a>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink()); ?>" target="_blank"><i class="fa fa-fw fa-share"></i></a>
					</p>
				</figcaption>
			</figure>
			<?php endif; ?>
			
			<div class="portfolio-content">
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<?php agama_get_portfolio_categories( '<h4>' ); ?>
				<?php the_excerpt(); ?>
				
				<div class="portfolio-buttons">
					<a href="<?php the_permalink(); ?>" class="agama-button agama-button-small agama-button-default agama-button-round agama-button-flat">
						<span><?php _e( 'Learn More', 'agama' ); ?></span>
					</a>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="agama-separator sep-double"></div>
		</article>
	</div>
	<?php endif; // End portfolio one column ?>
	
	
	
	<?php if( 
			is_page_template( 'page-templates/portfolio-two-columns.php' ) || 
			is_page_template( 'page-templates/portfolio-three-columns.php' ) ||
			is_page_template( 'page-templates/portfolio-four-columns.php' ) ): ?>
	<div class="portfolio-wrapper">
		<article id="post-<?php the_ID(); ?>" class="article-portfolio <?php echo implode( ' ', $category ); ?>">
			<?php if( agama_return_image_src($thumb_size) ): ?>
			<figure class="portfolio-item effect-bubba" data-src="<?php echo agama_return_image_src('portfolio-full'); ?>">
				<img src="<?php echo agama_return_image_src($thumb_size); ?>" class="img-responsive">
				<figcaption>
					<?php agama_thumb_title(); ?>
					<p>
						<a href="<?php the_permalink(); ?>"><i class="fa fa-fw fa-link"></i></a>
						<a style="cursor:pointer;"><i class="fa fa-fw fa-search-plus"></i></a>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink()); ?>" target="_blank"><i class="fa fa-fw fa-share"></i></a>
					</p>
				</figcaption>
			</figure>
			<?php endif; ?>
		</article>
	</div>
	<?php endif; ?>
	