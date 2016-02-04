<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('suevafree_side_sidebar_function')) {

	function suevafree_side_sidebar_function($name) { ?>
    
        <div class="col-md-4">
                    
            <div class="row">
                
                <div id="sidebar" class="col-md-12">
                            
                    <div class="sidebar-box">
    
                        <?php if ( is_active_sidebar($name)) { 
                        
                            dynamic_sidebar($name);
                        
                        } else { 
                            
                            the_widget( 'WP_Widget_Calendar',
                            array("title"=> __('Calendar','suevafree')),
                            array('before_widget' => '<div class="widget-box">',
                                  'after_widget'  => '</div>',
                                  'before_title'  => '<h4 class="title">',
                                  'after_title'   => '</h4>'
                            )
                            
                            );
            
                            the_widget( 'WP_Widget_Archives','',
                            array('before_widget' => '<div class="widget-box">',
                                  'after_widget'  => '</div>',
                                  'before_title'  => '<h4 class="title">',
                                  'after_title'   => '</h4>'
                            )
            
                            );
            
                            the_widget( 'WP_Widget_Categories','',
                            array('before_widget' => '<div class="widget-box">',
                                  'after_widget'  => '</div>',
                                  'before_title'  => '<h4 class="title">',
                                  'after_title'   => '</h4>'
                            )
            
                            );
            
                        
                         } ?>
    
                    </div>
                            
                </div>
                
            </div>
                        
        </div>
        
<?php

	}

	add_action( 'suevafree_side_sidebar', 'suevafree_side_sidebar_function', 10, 2 );

}

?>