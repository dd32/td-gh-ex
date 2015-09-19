<?php
/**
 * @package HowlThemes
 */

get_header(); 


 ?>


<div class="container main-outer">

				<?php
				if(get_option('dt_homedisplay') == 'magazine'){
					get_template_part( 'magazine', get_post_format() );
				}
				else {
					get_template_part( 'blog', get_post_format() );
				}
				?>



		


<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
