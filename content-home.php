<?php 
/**
 * 
 * @package Aedificator 
 */
?>	
<?php while (have_posts()) : the_post(); ?>  
<div class="section section-we-are">
	<div class="container">
		<div class="column-container blog-columns-container">	
			<div class="column-12-12 left">
				<div class="gutter">
					<article class="single-post">								
						<div class="article-text">
							<?php the_content(); ?>	 															
						</div>			
					</article>
				</div>
			</div>			
		</div>
	</div> <!--  END container  -->
</div> <!--  END section-blog  -->
<?php endwhile; ?>	
<section class="section section-latest-news">
	<div class="container">
		<div class="gutter">
			<h4><?php echo esc_html(get_theme_mod('pwt_blog_page_title',__( 'Recent Articles', 'aedificator' ))); ?></h4>
		</div>
		<div class="column-container latest-news-container">
			<?php 
			$i=0;
			$aedificator_get_list_posts = aedificator_get_list_posts(3);
			while ( $aedificator_get_list_posts->have_posts() ) {
			$aedificator_get_list_posts->the_post(); $i++;
			if($i<=3) {
			?>	
			<div class="column-4-12">
				<div class="gutter">
					<article class="article-latest-news">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="article-image">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('aedificator-photo-360-240'); ?></a>
							<a class="fa fa-link" href="<?php the_permalink(); ?>"></a>
						</div>
						<?php endif; ?>
						<div class="article-text">
							<p class="meta"><?php _e( 'Posted', 'aedificator' ); ?> <?php the_time(get_option( 'date_format')); ?></p>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?>
							<a class="read-more" href="<?php the_permalink(); ?>"><?php _e( 'read more', 'aedificator' ); ?></a>
						</div>
					</article>
				</div>
			</div>					
			<?php }} ?>			
		</div>
	</div> <!--  END container  -->
</section> <!--  END section-latest-news  -->