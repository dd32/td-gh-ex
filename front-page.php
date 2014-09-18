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
 * @package BOXY
 */
	get_header(); 

	if( isset($boxy) ) {
		if( isset($boxy['slides']) && count($boxy['slides'] > 1) ) {
			$slides = $boxy['slides'];
			$output = '';
			if( count($slides) > 1) {

				$output .= '<div class="flex-container">';
				$output .= '<div class="flexslider">';
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
				$output .= '</div><!-- .flexslider -->';
				$output .= '</div><!-- .flex-container -->';

			} else {
				$output = '';
				$output .= '<div class="flex-container">';
				$output .= '<div class="flexslider">';
				$output .= '<ul class="slides">';
					$output .= '<li>';
						$output .= '<div class="flex-image"><img src="' . $boxy_home['slide1'] . '" alt="" ></div>';
						$output .= '<div class="flex-caption">' . $boxy_home['caption1'] . '</div>';
					$output .= '</li>';
					$output .= '<li>';
						$output .= '<div class="flex-image"><img src="' . $boxy_home['slide2'] . '" alt="" ></div>';
						$output .= '<div class="flex-caption">' . $boxy_home['caption2'] . '</div>';
					$output .= '</li>';

				$output .= '</ul>';
				$output .= '</div><!-- .flexslider -->';
				$output .= '</div><!-- .flex-container -->';

			}

			echo $output;
			
		}

			$output = '';
			$output = '<div class="services">';
			$output .= '<div class="container">';
			$output .= '<div class="row">';
				if( isset( $boxy['service-icon-1'] ) &&isset( $boxy['service-title-1'] ) && isset( $boxy['service-description-1'] ) ) {
					$output .= '<div class="span4" id="service1">';
					$output .= '<div class="service-title"><p><i class="' . $boxy['service-icon-1'] . '"></i></p>';
					$output .= '<h3>' . $boxy['service-title-1'] . '</h3></div>';
					$output .= '<div class="service">' . $boxy['service-description-1'] . '</div>';
					$output .= '</div><!-- .span4 -->';
				}

				if( isset( $boxy['service-icon-2'] ) && isset( $boxy['service-title-2'] ) && isset( $boxy['service-description-2'] ) ) {
					$output .= '<div class="span4" id="service2">';
					$output .= '<div class="service-title"><p><i class="' . $boxy['service-icon-2'] . '"></i></p>';
					$output .= '<h3>' . $boxy['service-title-2'] . '</h3></div>';
					$output .= '<div class="service">' . $boxy['service-description-2'] . '</div>';
					$output .= '</div><!-- .span4 -->';
				}

				if( isset( $boxy['service-icon-3'] ) && isset( $boxy['service-title-3'] ) && isset( $boxy['service-description-3'] ) ) {
					$output .= '<div class="span4" id="service3">';
					$output .= '<div class="service-title"><p><i class="' . $boxy['service-icon-3'] . '"></i></p>';
					$output .= '<h3>' . $boxy['service-title-3'] . '</h3></div>';
					$output .= '<div class="service">' . $boxy['service-description-3'] . '</div>';
					$output .= '</div><!-- .span4 -->';
				}

			$output .= '</div><!-- .row -->';
			$output .= '</div><!-- .container -->';
			$output .= '</div><!-- .services -->';

			echo $output;

?>
		<div id="content" class="site-content container">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<?php if( isset( $boxy['recent-work-title'] ) && isset($boxy['recent-work-sub-title']) && isset($boxy['work-images']) ) : ?>
						<div class="row">
							<div class="span12">
								<div class="recent-work">
									<h2><?php echo $boxy['recent-work-title']; ?></h2>
									<p><?php echo $boxy['recent-work-sub-title']; ?></p>
								</div>
							</div>
						</div>
						<div class="row gap">
							<div class="span12">
								<ul class="recent-work recent-gallery">
									<?php echo $boxy['work-images']; ?>
								</ul>
							</div>
						</div>
					<?php endif; ?>

					<?php if( isset( $boxy['why-us-left'] ) && isset( $boxy['why-us-right'] )) : ?>
					<div class="row gap">
						<div class="full-width">
							<div class="span6">
								<div class="whyus-left">
									<?php echo $boxy['why-us-left']; ?>
								</div>
							</div>
							<div class="span6">
								<div class="whyus-right">
									<?php echo $boxy['why-us-right']; ?>
								</div>
							</div>
						</div>
					</div>
					<?php endif; ?>

					<?php if( isset( $boxy['features'] ) && isset($boxy['skill-1']) ) : ?>
						<div class="row gap">
							<div class="span6" id="features">
								<?php echo $boxy['features']; ?>
							</div>

							<div class="span6" id="skills">
								<?php
									$output = '';
									for ($i=1;$i<6;$i++) {
										$skill = "skill-{$i}";
										$percentage = "percentage-{$i}";
										$icon = "skill-icon-{$i}";
										if( isset( $skill ) && isset( $boxy[$percentage] ) ) {
											$output .= '<div class="skill-container">';
											$output .= '<div class="skill">';
											$output .= '<div class="skill-percentage percent' . $boxy[$percentage] .' start"><span class="circle"></span></div>';
											$output .= '<div class="skill-content">'  . $boxy[$skill] .'<span> ' . $boxy[$percentage] . '%</span></div>';
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
								
					<?php endif; ?>

					<?php if( isset( $boxy['clients'] )) : ?>
						<div class="row gap">
							<div class="span12">
								<div class="flex-container clients">
									<ul class="slides">
									<?php foreach( $boxy['clients'] as $client) : ?>
										<li><img src="<?php echo $client['url']; ?>"></li>
									<?php endforeach; ?>
									</ul>
								</div>
							</div><!-- .span12 -->
						</div><!-- .row -->
					<?php endif;  

						while ( have_posts() ) : the_post();
							the_content();
						endwhile;

	} else {
		if( isset( $boxy_home ) ) {
			$output = '';
				$output .= '<div class="flex-container">';
				$output .= '<div class="flexslider">';
				$output .= '<ul class="slides">';
					$output .= '<li>';
						$output .= '<div class="flex-image"><img src="' . $boxy_home['slide1'] . '" alt="" ></div>';
						$output .= '<div class="flex-caption">' . $boxy_home['caption1'] . '</div>';
					$output .= '</li>';
					$output .= '<li>';
						$output .= '<div class="flex-image"><img src="' . $boxy_home['slide2'] . '" alt="" ></div>';
						$output .= '<div class="flex-caption">' . $boxy_home['caption2'] . '</div>';
					$output .= '</li>';

				$output .= '</ul>';
				$output .= '</div><!-- .flexslider -->';
				$output .= '</div><!-- .flex-container -->';

			$output .= '<div class="services">';
			$output .= '<div class="container">';
			$output .= '<div class="row">';
				if( isset( $boxy_home['service-icon-1'] ) && isset( $boxy_home['service-description-1'] ) ) {
					$output .= '<div class="span4" id="service1">';
					$output .= '<div class="service-title"><p><i class="' . $boxy_home['service-icon-1'] . '"></i></p>';
					$output .= '<h3>' . $boxy_home['service-title-1'] . '</h3></div>';
					$output .= '<div class="service">' . $boxy_home['service-description-1'] . '</div>';
					$output .= '</div><!-- .span4 -->';
				}

				if( isset( $boxy_home['service-icon-2'] ) && isset( $boxy_home['service-description-2'] ) ) {
					$output .= '<div class="span4" id="service2">';
					$output .= '<div class="service-title"><p><i class="' . $boxy_home['service-icon-2'] . '"></i></p>';
					$output .= '<h3>' . $boxy_home['service-title-2'] . '</h3></div>';
					$output .= '<div class="service">' . $boxy_home['service-description-2'] . '</div>';
					$output .= '</div><!-- .span4 -->';
				}

				if( isset( $boxy_home['service-icon-3'] ) && isset( $boxy_home['service-description-3'] ) ) {
					$output .= '<div class="span4" id="service3">';
					$output .= '<div class="service-title"><p><i class="' . $boxy_home['service-icon-3'] . '"></i></p>';
					$output .= '<h3>' . $boxy_home['service-title-3'] . '</h3></div>';
					$output .= '<div class="service">' . $boxy_home['service-description-3'] . '</div>';
					$output .= '</div><!-- .span4 -->';
				}

			$output .= '</div><!-- .row -->';
			$output .= '</div><!-- .container -->';
			$output .= '</div><!-- .services -->';

			echo $output;
		?>
		<div id="content" class="site-content container">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<div class="row">
						<div class="span12 recent-work">
							<h2><?php echo $boxy_home['recent-work-title']; ?></h2>
							<p><?php echo $boxy_home['recent-work-sub-title']; ?></p>
						</div>
					</div>
					<div class="row gap">
						<div class="span12">
							<ul class="recent-work recent-gallery">
								<li><a href="#"><img src="<?php echo $boxy_home['recent-work-1']; ?>"></a></li>
								<li><a href="#"><img src="<?php echo $boxy_home['recent-work-2']; ?>"></a></li>
								<li><a href="#"><img src="<?php echo $boxy_home['recent-work-3']; ?>"></a></li>
								<li><a href="#"><img src="<?php echo $boxy_home['recent-work-4']; ?>"></a></li>
							</ul>
						</div>
					</div>
					<div class="row gap">
						<div class="full-width">
							<div class="span6">
								<div class="whyus-left">
									<?php echo $boxy_home['why-us-1']; ?>
								</div>
							</div>
							<div class="span6">
								<div class="whyus-right">
									<?php echo $boxy_home['why-us-2']; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="row gap">
						<div class="span6" id="features">
							<?php echo $boxy_home['tab']; ?>
						</div>

						<div class="span6" id="skills">
							<?php
									$output = '';
									for ($i=1;$i<5;$i++) {
									$skill = "skill-{$i}";
									$percentage = "percentage-{$i}";
									$icon = "skill-icon-{$i}";
									if( isset( $boxy_home[$percentage] ) && isset( $boxy_home[$skill] ) ) {
										$output .= '<div class="skill-container">';
										$output .= '<div class="skill">';
										$output .= '<div class="skill-percentage percent' . $boxy_home[$percentage] .' start"><span class="circle"></span></div>';
										$output .= '<div class="skill-content">'  . $boxy_home[$skill] .'<span> ' . $boxy_home[$percentage] . '%</span></div>';
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
					<hr/>
					<div class="row">
						<div class="span12">
							<div class="flex-container clients">
								<ul class="slides">
								<?php foreach( $boxy_home['clients'] as $client) : ?>
									<li><img src="<?php echo $client; ?>"></li>
								<?php endforeach; ?>
								</ul>
							</div>
						</div>
					</div>
					<?php
						while ( have_posts() ) : the_post();
							the_content();
						endwhile;
					}
				}
				?>
			
				</main><!-- #main -->
			</div><!-- #primary -->
<?php 
	get_footer(); 
?>