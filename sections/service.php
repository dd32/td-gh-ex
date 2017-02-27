<?php
/**
 * Service Section
 * 
 * @package App_Landing_Page
 */

$app_landing_page_service_section_title = get_theme_mod( 'app_landing_page_service_section_title' );
$app_landing_page_service_section_content = get_theme_mod( 'app_landing_page_service_section_content' );

$app_landing_page_service_one_post = get_theme_mod( 'app_landing_page_service_post_one' );
$app_landing_page_service_two_post = get_theme_mod( 'app_landing_page_service_post_two' );
$app_landing_page_service_three_post= get_theme_mod( 'app_landing_page_service_post_three' );
$app_landing_page_service_four_post= get_theme_mod( 'app_landing_page_service_post_four' );
$app_landing_page_service_five_post = get_theme_mod( 'app_landing_page_service_post_five' );
$app_landing_page_service_six_post = get_theme_mod( 'app_landing_page_service_post_six' );
$app_landing_page_service_seven_post = get_theme_mod( 'app_landing_page_service_post_seven' );
$app_landing_page_service_eight_post = get_theme_mod( 'app_landing_page_service_post_eight' );

$app_landing_page_service_section_button = get_theme_mod( 'app_landing_page_service_section_button', __( 'Download Button', 'app-landing-page' ) );
$app_landing_page_service_section_button_link = get_theme_mod( 'app_landing_page_service_section_button_link' , '#' );

if( $app_landing_page_service_one_post || $app_landing_page_service_two_post || $app_landing_page_service_three_post || $app_landing_page_service_four_post || $app_landing_page_service_five_post || $app_landing_page_service_six_post || $app_landing_page_service_seven_post || $app_landing_page_service_eight_post ) { 

	$app_landing_page_service_posts = array( $app_landing_page_service_one_post, $app_landing_page_service_two_post, $app_landing_page_service_three_post, $app_landing_page_service_four_post, $app_landing_page_service_five_post, $app_landing_page_service_six_post, $app_landing_page_service_seven_post, $app_landing_page_service_eight_post );
	$app_landing_page_service_posts = array_diff( array_unique( $app_landing_page_service_posts  ), array('') );
		
	$services_qry = new WP_Query( array( 
            'post_type'             => 'post',
            'posts_per_page'        => -1,
            'post__in'              => $app_landing_page_service_posts,
            'orderby'               => 'post__in',
            'ignore_sticky_posts'   => true
        ) );
?>
        <section class="section-5" id="service">
        	<div class="container">
        		<header class="header wow fadeInUp">
        			<?php 
            			if( $app_landing_page_service_section_title ){ echo ' <h2 class="main-title">' . esc_html( $app_landing_page_service_section_title ) . '</h2>'; }
        				if($app_landing_page_service_section_content){ echo wpautop(  wp_kses_post( $app_landing_page_service_section_content ) ); }            
        			?>
        		</header>
                <?php
                    echo '<div class="row">';
        				if( $services_qry->have_posts() ){
        				    while( $services_qry->have_posts() ){
        				        $services_qry->the_post();
        
                        		echo '<div class="col wow fadeInUp">';
                         			if( has_post_thumbnail() ){
                						echo '<div class="icon-holder">';
                							the_post_thumbnail( 'app-landing-page-features-image-small' );
                						echo '</div>' ; 
                					} 
            						echo '<div class="text-holder">';
            							the_title( '<h2 class="main-title">', '</h2>' );
            							the_content();
            						echo '</div>';
            					echo '</div>';
        					}
        				wp_reset_postdata();
        				}
    				echo '</div>';
        			
                    if( $app_landing_page_service_section_button_link ){ 
        				echo ' <div class="btn-holder"> <a href="'. esc_url( $app_landing_page_service_section_button_link ) .'" class="btn-download"> '. esc_html( $app_landing_page_service_section_button ) .'</a></div>'; 
        			}
                ?>
        	</div>
        </section>
<?php }