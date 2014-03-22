<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package URVR
 */
	if ( 'posts' == get_option( 'show_on_front' ) ) {
	    include( get_home_template() );
	    //Echo "Test";
	} else {
		get_header(); 
	
					if( isset($urvr['homepage_blocks']['enabled']['slider']) && isset($urvr['slides']) ) {
						$slides = $urvr['slides'];
						$output = '';
						if( count($slides) > 1) {

							$output .= '<div class="flex-container">';
							$output .= '<div class="container">';
							$output .= '<div class="row">';
							$output .= '<div class="flexslider">';
							$output .= '<div class="bg-bottom"></div>';					
							$output .= '<ul class="slides">';

							foreach($slides as $slide) {
								$output .= '<li>';
								$output .= '<div class="flex-image"><img src="' . $slide['url'] . '" alt="" ></div>';
								if ( $slide['description'] != '' ) {
									$output .= '<div class="flex-caption">' . $slide['description'] . '</div>';
								}
								$output .= '</li>';
							}

							$output .= '</ul>';
							$output .= '</div>';
							$output .= '</div>';
							$output .= '</div><!-- .flexslider -->';
							$output .= '</div><!-- .flex-container -->';
						}
						echo $output;
						
					}
					if( isset( $urvr['homepage_blocks']['enabled']['services'] ) ) {
						$output = '';
							$output = '<div class="services">';
							$output .= '<div class="container">';
							$output .= '<div class="row">';
								if( isset( $urvr['service-icon-1'] ) && isset( $urvr['service-description-1'] ) ) {
									$output .= '<div class="span4" id="service1">';
									$output .= '<h3><i class="' . $urvr['service-icon-1'] . '"></i></h3>';
									$output .= '<div class="service">' . $urvr['service-description-1'] . '</div>';
									$output .= '</div><!-- .span4 -->';
								}

								if( isset( $urvr['service-icon-2'] ) && isset( $urvr['service-description-2'] ) ) {
									$output .= '<div class="span4" id="service2">';
									$output .= '<h3><i class="' . $urvr['service-icon-2'] . '"></i></h3>';
									$output .= '<div class="service">' . $urvr['service-description-2'] . '</div>';
									$output .= '</div><!-- .span4 -->';
								}

								if( isset( $urvr['service-icon-3'] ) && isset( $urvr['service-description-3'] ) ) {
									$output .= '<div class="span4" id="service3">';
									$output .= '<h3><i class="' . $urvr['service-icon-3'] . '"></i></h3>';
									$output .= '<div class="service">' . $urvr['service-description-3'] . '</div>';
									$output .= '</div><!-- .span4 -->';
								}

							$output .= '</div><!-- .row -->';
							$output .= '</div><!-- .container -->';
							$output .= '</div><!-- .services -->';

						echo $output;
					}
		?>
		<div id="content" class="site-content container">
			<div class="row">
				
				<div id="primary" class="content-area span12">
					<main id="main" class="site-main" role="main">
		<?php
					if( isset( $urvr['homepage_blocks']['enabled'] )) {
						$enabled = $urvr['homepage_blocks']['enabled'];
						foreach ($enabled as $key => $value) {
							switch ($key) {
								case 'features':
									$features = isset( $urvr['features'] ) ? $urvr['features'] : '';
								?>
								<div class="row">
									<div class="feature-wrap">

									<div class="span6" id="whyus">
										<div class="feature2">
											<?php echo isset( $urvr['features'] ) ? $urvr['features'] : '' ?>
										</div>
									</div>

									<div class="span6" id="skills">
										<?php
											$output = '';
											if ( isset( $urvr['skill-heading'] ) ) {
												$output .= '<h2><i class="el-icon-tags"></i>' . $urvr['skill-heading'] . '</h2>';
											}

											for ($i=1;$i<6;$i++) {
												$skill = "skill-{$i}";
												$percentage = "percentage-{$i}";
												$icon = "skill-icon-{$i}";
												if( isset( $skill ) && isset( $urvr[$icon] ) && isset( $urvr[$percentage] ) && isset( $urvr[$skill] ) ) {
													$output .= '<div class="skill-container"><i class="' . $urvr[$icon] . '"></i>';
													$output .= '<div class="skill">';
													$output .= '<div class="skill-percentage percent' . $urvr[$percentage] .' start"><span class="circle"></span></div>';
													$output .= '<div class="skill-content">'  . $urvr[$skill] .' ' . $urvr[$percentage] . '%</div>';
													$output .= '</div>';
													$output .= '</div>';
												}
											}

											echo $output;
										?>
									</div> <!-- .span6 skills -->
									<br class="clear"/>
									</div>

								</div> <!-- .row -->
								
								<div class="divider div2"><span></span></div>

								<?php
									break;
								case 'recent_posts' :
								?>
									<div class="row">
										<div class="span12">
											<h2><i class="el-icon-tags"></i>From the Blog</h2>
											<?php urvr_recent_posts(); ?>
										</div><!-- .span12 -->
									</div><!-- .row -->
								<?php
								break;
								case 'default':
									while ( have_posts() ) : the_post();
										the_content();
									endwhile;
								break;
							}
						}
					}
				?>
			
			</main><!-- #main -->
		</div><!-- #primary -->
<?php 
		get_footer(); 
	}
?>