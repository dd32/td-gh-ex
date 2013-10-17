<?php
		/*
	*Theme Name	: BusiProf
	
 * @file           404.php
 * @package        Busiprof
 * @author         Priyanshu Mittal
 * @copyright      2013 Appointment
 * @license        license.txt
 * @filesource     wp-content/themes/Busiprof/404.php
*/
 ?>

			<?php   get_template_part('banner', 'header') ; ?>
			

					<div class="container">
									<!--- Main ---> 
					<div class="row-fluid">
						<div class="span8 blog_left">

								<h2><?php _e( 'Unfortunately, the page you tried accessing could not be retrieved. ', 'busi_prof' ); ?>
								</h2>
									<div class="blog_section">
									<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'busi_prof' ); ?>
									</p>
									</div>
									<?php //get_search_form(); ?>
									<!-- .entry-content -->
						</div>
										<?php get_sidebar (); ?>

					</div><!-- #content -->
					</div><!-- #primary -->
					<?php get_footer(); ?>