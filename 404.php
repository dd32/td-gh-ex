<?php
/**
 * 404.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.2.2
 */
 ?>
<?php if(is_404()) { get_header('post'); } else { get_header(); }?> 
   <?php 
	 $page404_cat = esc_attr( get_theme_mod('avik_category_page_404'));
	 $page404_count =1;
	 $new_query = new WP_Query( array( 'cat' => $page404_cat  , 'showposts' => $page404_count ));
	 while ( $new_query->have_posts() ) : $new_query->the_post();?>
	   
  <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
 <div class="image-404">
 <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo esc_url($avik_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/img/page-404.jpg'; endif; ?>"/>
				 </div>
 <main class="container mt-5 main-content">
	 <div class="row">
		 <div class="col-sm-8 ml-sm-auto mr-sm-auto">
				 <article class="mb-5">
				         <h1 class="text-center display-4 bold-number-404"><?php the_title(); ?></h1>
						 <h2 class="display-6 mb-4 text-center bold-text-404"> <?php the_content(); ?></h2>
						 <div class="button-404 text-center">
						   <button type="button" class="btn btn-avik page-404">
							   <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Go Back To Home', 'avik' ); ?></a>
						   </button>
                         </div>      
				 </article>
		 </div>
	 </div>
 </main>
 
 <?php endwhile;
   wp_reset_query();
   wp_reset_postdata(); 
   get_footer(); ?>


