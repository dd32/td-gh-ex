<?php 
add_action('wp_head', 'airballoon_css_layout');
function airballoon_css_layout() {
	
	// Get Theme Options from Database
	$theme_options = airballoon_theme_options();
		
	// Switch Sidebar to left
	if ( isset($theme_options['layout']) and $theme_options['layout'] == 'left-sidebar' ) :
	
		echo '<style type="text/css">
			@media only screen and (min-width: 60em) {
				#content {
					float: right;
					padding-right: 0;
					padding-left: 2.2em;
				}
				#sidebar {
					float: left;
				}
			}
		</style>';
	
	endif;
	
	
	// Change Layout to fullwidth
	if ( isset($theme_options['layout']) and $theme_options['layout'] == 'fullwidth' ) :
	
		echo '<style type="text/css">
				#wrapper {
					max-width: 1060px;
				}
				#content {
					float: none;
					padding: 0;
					width: 100%;
				}
		</style>';
	
	endif;
	
}