<?php
/**
 * Vedio Section
 * 
 * @package App_Landing_Page
 */

$app_landing_page_vedio_section_title = get_theme_mod( 'app_landing_page_vedio_section_title');
$app_landing_page_vedio_section_content = get_theme_mod( 'app_landing_page_vedio_section_content');
$app_landing_page_vedio_video = get_theme_mod( 'app_landing_page_vedio_video');
$app_landing_page_vedio_section_button_link= get_theme_mod( 'app_landing_page_vedio_section_button_link');
$app_landing_page_vedio_section_button = get_theme_mod( 'app_landing_page_vedio_section_button');


?>
	<div class="container">
		<header class="header">
        <?php 
            if($app_landing_page_vedio_section_title){echo ' <h2 class="main-title">'.$app_landing_page_vedio_section_title.'</h2>';}

            if($app_landing_page_vedio_section_content){echo '<p>'.$app_landing_page_vedio_section_content.'</p>';}            
        ?>
		</header>
				<?php if( $app_landing_page_vedio_video){ 
        			echo '<div class="vedio-holder">';
            		$allowed = array(
                	'iframe' => array(
                    'src' => array(),
                    'width' => array(),
                    'height' =>array(),
                    )                
                	);                  
            		echo wp_kses( $app_landing_page_vedio_video, $allowed);
        			echo '</div>';
    			}
    			?>
                <?php
					if($app_landing_page_vedio_section_button_link){echo ' <div class="btn-holder"> <a href="'. $app_landing_page_vedio_section_button_link .'" class="btn-download"> '.$app_landing_page_vedio_section_button.'</a></div>';}
                ?>
	</div>


