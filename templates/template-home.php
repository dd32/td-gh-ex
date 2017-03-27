<?php
/**
 * Template Name: Home Page
 * @package beetech
 */

get_header(); ?>

	<div id="home-primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
                /** Services Section **/
				get_template_part( 'template-parts/sections/section', 'services' );
                
                /** About Section **/
				get_template_part( 'template-parts/sections/section', 'about' );

				/** Testimonials Section **/
				get_template_part( 'template-parts/sections/section', 'testimonials' );

				/** Fact Section **/
				get_template_part( 'template-parts/sections/section', 'fact' );

				/** Portfolio Section **/
				get_template_part( 'template-parts/sections/section', 'portfolio' );
                
                /** Team Section **/
				get_template_part( 'template-parts/sections/section', 'team' );
                
				/** Blog Section **/
				get_template_part( 'template-parts/sections/section', 'blog' );

				/** Clients Section **/
				get_template_part( 'template-parts/sections/section', 'clients' );

				/** Contact Section **/
				get_template_part( 'template-parts/sections/section', 'contact' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();