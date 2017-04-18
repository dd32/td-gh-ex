<?php 
/**
 * 
 * @package Avvocato 
 */
?>
<?php if( get_theme_mod('avvocato_slider_content1') or get_theme_mod('avvocato_slider_content2')) { ?>
<div class="section section-carousel">		
	<div class="owl-carousel main-carousel">
		<?php 
		if( get_theme_mod('avvocato_slider_content1')) { 
		$queryslider = new WP_query('page_id='.get_theme_mod('avvocato_slider_content1' ,true)); 
		while( $queryslider->have_posts() ) : $queryslider->the_post();
		?> 
		<div class="item" <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?> style="background-image: url('<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()))); ?>')"  <?php  endif; ?>>
			<div class="overlay">
				<div class="container">
					<div class="gutter">
						<div class="carousel-text column-9-12 center text-center animate-top-down">
							<h4><?php the_title(); ?></h4>
							<p><?php the_excerpt(); ?></p>
						</div>
					</div>
				</div>
			</div> 
		</div>			
		<?php endwhile; wp_reset_postdata(); ?>
		<?php } ?>	
		<?php 
		if( get_theme_mod('avvocato_slider_content2')) { 
		$queryslider = new WP_query('page_id='.get_theme_mod('avvocato_slider_content2' ,true)); 
		while( $queryslider->have_posts() ) : $queryslider->the_post();
		?> 
		<div class="item" <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?> style="background-image: url('<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()))); ?>')"  <?php  endif; ?>>
			<div class="overlay">
				<div class="container">
					<div class="gutter">
						<div class="carousel-text column-9-12 center text-center animate-top-down">
							<h4><?php the_title(); ?></h4>
							<p><?php the_excerpt(); ?></p>
						</div>
					</div>
				</div>
			</div> 
		</div>			
		<?php endwhile; wp_reset_postdata(); ?>
		<?php } ?>						
	</div>
</div>
<?php }  ?>
<div class="section section-boxes">
	<div class="container">
		<div class="column-container boxes-container">
			<?php 
			if( get_theme_mod('avvocato_whyus_content_1')) { 
			$queryslider = new WP_query('page_id='.get_theme_mod('avvocato_whyus_content_1' ,true)); 
			while( $queryslider->have_posts() ) : $queryslider->the_post();
			?> 
			<div class="column-3-12">
				<div class="gutter">
					<article class="article-box">
						<div class="article-icon">
							<a class="fa fa-<?php echo sanitize_html_class(get_theme_mod('avvocato_whyus_icon_1',__( 'graduation-cap', 'avvocato' ))); ?>" href="<?php the_permalink(); ?>"></a>
						</div>
						<div class="article-text">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php the_excerpt(); ?></p>
							<a class="button" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('avvocato_whyus_button_text_1',__( 'Read More', 'avvocato' ))); ?></a>
						</div>
					</article>
				</div>
			</div>			
			<?php endwhile; wp_reset_postdata(); ?>
			<?php } ?>			
			<?php 
			if( get_theme_mod('avvocato_whyus_content_2')) { 
			$queryslider = new WP_query('page_id='.get_theme_mod('avvocato_whyus_content_2' ,true)); 
			while( $queryslider->have_posts() ) : $queryslider->the_post();
			?> 
			<div class="column-3-12">
				<div class="gutter">
					<article class="article-box">
						<div class="article-icon">
							<a class="fa fa-<?php echo sanitize_html_class(get_theme_mod('avvocato_whyus_icon_2',__( 'graduation-cap', 'avvocato' ))); ?>" href="<?php the_permalink(); ?>"></a>
						</div>
						<div class="article-text">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php the_excerpt(); ?></p>
							<a class="button" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('avvocato_whyus_button_text_2',__( 'Read More', 'avvocato' ))); ?></a>
						</div>
					</article>
				</div>
			</div>			
			<?php endwhile; wp_reset_postdata(); ?>
			<?php } ?>		
			<?php 
			if( get_theme_mod('avvocato_whyus_content_3')) { 
			$queryslider = new WP_query('page_id='.get_theme_mod('avvocato_whyus_content_3' ,true)); 
			while( $queryslider->have_posts() ) : $queryslider->the_post();
			?> 
			<div class="column-3-12">
				<div class="gutter">
					<article class="article-box">
						<div class="article-icon">
							<a class="fa fa-<?php echo sanitize_html_class(get_theme_mod('avvocato_whyus_icon_3',__( 'graduation-cap', 'avvocato' ))); ?>" href="<?php the_permalink(); ?>"></a>
						</div>
						<div class="article-text">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php the_excerpt(); ?></p>
							<a class="button" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('avvocato_whyus_button_text_3',__( 'Read More', 'avvocato' ))); ?></a>
						</div>
					</article>
				</div>
			</div>			
			<?php endwhile; wp_reset_postdata(); ?>
			<?php } ?>		
			<?php 
			if( get_theme_mod('avvocato_whyus_content_4')) { 
			$queryslider = new WP_query('page_id='.get_theme_mod('avvocato_whyus_content_4' ,true)); 
			while( $queryslider->have_posts() ) : $queryslider->the_post();
			?> 
			<div class="column-3-12">
				<div class="gutter">
					<article class="article-box">
						<div class="article-icon">
							<a class="fa fa-<?php echo sanitize_html_class(get_theme_mod('avvocato_whyus_icon_4',__( 'graduation-cap', 'avvocato' ))); ?>" href="<?php the_permalink(); ?>"></a>
						</div>
						<div class="article-text">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php the_excerpt(); ?></p>
							<a class="button" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('avvocato_whyus_button_text_4',__( 'Read More', 'avvocato' ))); ?></a>
						</div>
					</article>
				</div>
			</div>			
			<?php endwhile; wp_reset_postdata(); ?>
			<?php } ?>					
		</div>
		<?php 
		if( get_theme_mod('avvocato_info_box_text')) { 
		$queryslider = new WP_query('page_id='.get_theme_mod('avvocato_info_box_text' ,true)); 
		while( $queryslider->have_posts() ) : $queryslider->the_post();
		?> 
		<div class="gutter">
			<div class="table-download">
				<div class="table-row">
					<div class="table-cell column-9-12">
						<p><?php the_excerpt(); ?></p>
					</div>
					<div class="table-cell column-3-12">
						<a class="button-large" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('avvocato_info_box_button_text',__( 'Contact Us', 'avvocato' ))); ?></a>
					</div>
				</div>
			</div>
		</div>		
		<?php endwhile; wp_reset_postdata(); ?>
		<?php } ?>			

	</div> <!--  END container  -->
</div> <!--  END section-boxes  -->
<?php while (have_posts()) : the_post(); ?>  
<div class="section-blog">
	<div class="container">
		<div class="column-container blog-container">			
			<div class="column-12-12">
				<div class="gutter">
					<div class="inner-page-container">
						<article class="single-post">	
							<div class="article-text">
								<?php the_content(); ?>
							</div>
						</article>
					</div>
				</div>
			</div>			
		</div>
	</div> <!--  ENd container  -->
</div> <!--  END section-blog  -->
<?php endwhile; ?>