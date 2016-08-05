<?php

$page_array = array();
for ( $i = 1; $i <= 3; $i++ ) {
    $mod = get_theme_mod( 'featured_article_' . $i );
    if ( 'page-none-selected' != $mod ) {
        $page_array[] = $mod;
    }
}


$featured_pages = new WP_Query(
	array (
		'posts_per_page'	=> 3,
		'post_type'			=> array( 'page' ),
		'post__in'			=> $page_array,
		'orderby'			=> 'post__in'
	)
);

?>

<div class="arouse-featured-content">
	<div class="container">
		<div class="row">
			<?php 
				$j = 1;

				if ( $featured_pages->have_posts() ) :
				
					while( $featured_pages->have_posts() ) : $featured_pages->the_post(); ?>
				
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<a href="<?php the_permalink(); ?>" rel="bookmark">
						<div class="arouse-fpage-block">
							
							<?php the_post_thumbnail('featured');  ?>

							<?php if ( get_theme_mod( 'display_page_titles', true ) ) : ?>
								<div class="overlay"></div>
								<div class="arouse-fpage-title">
									<h3><?php the_title(); ?></h3>
								</div>
							<?php endif; ?>

						</div><!-- .arouse-fpage-block -->
						</a>
					</div><!--.bootstrap cols -->
					
					<?php	
						if( $j == 3 ) {
							echo '</div><div class="row">';
						}
					?>

				<?php 
					$j++;
					endwhile; 
					wp_reset_postdata();

				endif;
			?>
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .arouse-featured-content -->