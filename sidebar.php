<?php if (alhenalite_template('span') == "span8" ) :  ?>

	<section id="sidebar" class="pin-article span4">
		<div class="sidebar-box">

			<?php if ( is_active_sidebar(alhenalite_postmeta('wip_sidebar'))) { 
            
                dynamic_sidebar(alhenalite_postmeta('wip_sidebar'));
            
            } else { 
                
                the_widget( 'WP_Widget_Calendar',
				array("title"=> __('Calendar')),
				array('before_widget' => '<div class="widget-box">',
					  'after_widget'  => '</div>',
					  'before_title'  => '<header class="title"><div class="line"><h3>',
					  'after_title'   => '</h3></div></header>'
				)
				
				);

                the_widget( 'WP_Widget_Archives','',
				array('before_widget' => '<div class="widget-box">',
					  'after_widget'  => '</div>',
					  'before_title'  => '<header class="title"><div class="line"><h3>',
					  'after_title'   => '</h3></div></header>'
				)

				);

                the_widget( 'WP_Widget_Categories','',
				array('before_widget' => '<div class="widget-box">',
					  'after_widget'  => '</div>',
					  'before_title'  => '<header class="title"><div class="line"><h3>',
					  'after_title'   => '</h3></div></header>'
				)

				);

            
             } ?>

		</div>
	</section>
    
<?php endif; ?>