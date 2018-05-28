<?php
/**
 * 404.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.0.0
 */
 ?>

 <?php if(is_404()) { get_header('post'); } else { get_header(); }?> 
 <div class="image-404">
				 <img src="<?php echo get_theme_mod( 'image_404', get_stylesheet_directory_uri(). '/img/page-404.jpg' ); ?>" alt="<?php echo get_theme_mod( 'alt_image_404','Avik Page not found'); ?>" />
				 </div>
 <main class="container mt-5 main-content">
	 <div class="row">
		 <div class="col-sm-8 ml-sm-auto mr-sm-auto">
				 <article class="mb-5">
				         <h1 class="text-center display-4 bold-number-404"><?php echo get_theme_mod( 'title_page_404','404'); ?></h1>
						 <h2 class="display-6 mb-4 text-center bold-text-404"><?php echo get_theme_mod( 'subtitle_page_404','Sorry page not found.'); ?></h2>
						 <div class="button-404 text-center">
						   <button type="button" class="btn btn-avik page-404">
							   <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_theme_mod( 'title_button_404','Go Back To Home'); ?></a>
						   </button>
                         </div>      
				 </article>
		 </div>
	 </div>
 </main>
 <?php get_footer(); ?>


