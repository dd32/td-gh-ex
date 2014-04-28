<?php get_header(); ?>
<div class="container">
	<h1 class="archive-title">
		<?php 
		if ( is_day() ) {
			printf( __( 'Daily Archives: %s', 'cherish' ), get_the_date(get_option('date_format')) ); 
		} elseif ( is_month() ) {
				printf( __( 'Monthly Archives: %s', 'cherish' ), get_the_date('F Y') ); 
		} elseif ( is_year() ) {
			 printf( __( 'Yearly Archives: %s', 'cherish' ), get_the_date('Y') ); 
		}elseif ( is_tag() )  { 
			printf( __( 'Tag Archives: %s', 'cherish' ), single_tag_title( '', false ) );
		}elseif ( is_category() ) { 
			printf( __( 'Category Archives: %s', 'cherish' ), single_cat_title( '', false ));
		}else{ 
			_e( 'Archive:', 'cherish' ); 
		}
		?>
		</h1>
		<?php
		while ( have_posts() ) : the_post(); ?> 
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<?php
					if (strpos($post->post_content,'[gallery') === false){
					   if ( has_post_thumbnail()) {
							the_post_thumbnail();
					   }
					}
					the_content(); 
					wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages: ', 'cherish' ), 'after' => '</div>' ) ); 
				cherish_meta();
				?>	
			</div>
<?php
		endwhile;
next_posts_link('<div class="newer-posts">'. __('Next page &rarr;', 'cherish') . '</div>'); 
previous_posts_link('<div class="older-posts">' . __('&larr; Previous page','cherish') . '</div>'); 
?>
</div>
<?php
get_footer();
?> 