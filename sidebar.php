<?php

//The Sidebar containing the main widget area.


?>

<div id="sidebar" class="widget-area clearfix" role="complementary">


        <aside id="sidebar-search" class="widget">
        
			<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
            
		</aside>
        
        
        
       <?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?><!-- Wigitized Sidebar --><?php endif; // end sidebar widget area ?>
        
        

		<aside id="sidebar-archives" class="widget">
        

					<h4 class="widget-title-archives"><?php _e( 'Archives', 'azurebasic' ); ?></h4>

					<ul>

						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>

					</ul>

		 </aside>



		 <aside id="sidebar-meta" class="widget">

				    <h4 class="widget-title-meta"><?php _e( 'Meta', 'azurebasic' ); ?></h4>

					<ul>

						<li><?php wp_register(); ?></li>

						<li><?php wp_loginout(); ?></li>

						<li><?php wp_meta(); ?></li>

					</ul>

		   </aside>
			

		</div><!-- #sidebar .widget-area -->

