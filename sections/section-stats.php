<?php
/**
 * Stats Section
 * 
 * @package App_Landing_Page
 */

$app_landing_page_stats_title = get_theme_mod( 'app_landing_page_stats_title' );
$app_landing_page_stats_content = get_theme_mod( 'app_landing_page_stats_content' );
$app_landing_page_date = get_theme_mod( 'app_landing_page_date' );
$app_landing_page_stats_button = get_theme_mod( 'app_landing_page_stats_button' );
$app_landing_page_stats_button_link = get_theme_mod( 'app_landing_page_stats_button_link' );


?>
<div class="container">
	<header class="header wow fadeInUp">
		<?php 
            if($app_landing_page_stats_title){echo ' <h2 class="title">'.$app_landing_page_stats_title.'</h2>';}

            if($app_landing_page_stats_content){echo '<p>'.$app_landing_page_stats_content.'</p>';}            
        ?>
	</header>
	<ul class="count-down-lists wow fadeInUp">
 		<div class="date-counter" data-countdown="<?php echo esc_html( $app_landing_page_date ); ?> "></div>
	</ul>
	<?php
		if($app_landing_page_stats_button_link){echo ' <div class="btn-holder"> <a href="'. $app_landing_page_stats_button_link .'" class="btn-request"> '.$app_landing_page_stats_button.'</a></div>';}
     ?>		
</div>
