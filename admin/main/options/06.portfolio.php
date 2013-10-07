<?php
/**
 * Portfolio functions.
 *
 * @package ThinkUpThemes
 */

/* ----------------------------------------------------------------------------------
	PORTFOLIO LAYOUT
---------------------------------------------------------------------------------- */

function thinkup_input_portfoliolayout() {
global $thinkup_portfolio_layout;

	if ( empty( $thinkup_portfolio_layout ) ) {
		echo 'column-2';
	} else if ( $thinkup_portfolio_layout == 'option1' or $thinkup_portfolio_layout == 'option5' or $thinkup_portfolio_layout == 'option6' ) {
		echo 'column-1';
	} else if ( $thinkup_portfolio_layout == 'option2' or $thinkup_portfolio_layout == 'option7' or $thinkup_portfolio_layout == 'option8' ) {
		echo 'column-2';
	} else if ( $thinkup_portfolio_layout == 'option3' ) {
		echo 'column-3';
	} else if ( $thinkup_portfolio_layout == 'option4' ) {
		echo 'column-4';
	}
}

function thinkup_input_portfoliosize() {
global $thinkup_portfolio_layout;

	if ( empty( $thinkup_portfolio_layout ) ) {
		the_post_thumbnail( 'column2-3/5' );
	} else if ( $thinkup_portfolio_layout == 'option1' or $thinkup_portfolio_layout == 'option5' or $thinkup_portfolio_layout == 'option6' ) {
		the_post_thumbnail( 'column1-2/5' );
	} else if ( $thinkup_portfolio_layout == 'option2' or $thinkup_portfolio_layout == 'option7' or $thinkup_portfolio_layout == 'option8' ) {
		the_post_thumbnail( 'column2-3/5' );
	} else if ( $thinkup_portfolio_layout == 'option3' ) {
		the_post_thumbnail( 'column3-2/3' );
	} else if ( $thinkup_portfolio_layout == 'option4' ) {
		the_post_thumbnail( 'column4-2/3' );
	}
}


/* ----------------------------------------------------------------------------------
	PORTFOLIO STYLE 
---------------------------------------------------------------------------------- */

function thinkup_input_portfoliocss() {

	if ( is_post_type_archive( 'portfolio' ) ) {
		wp_enqueue_style ( 'portfolio' );
	}
}
add_action( 'wp_enqueue_scripts', 'thinkup_input_portfoliocss', '11' );

function thinkup_input_portfoliojava() {

	if ( is_post_type_archive( 'portfolio' ) ) {
		wp_enqueue_script( 'portfolio' );
	}
}
add_action( 'wp_enqueue_scripts', 'thinkup_input_portfoliojava' );


/* ----------------------------------------------------------------------------------
	PORTFOLIO HOVER CONTENT 
---------------------------------------------------------------------------------- */

function thinkup_input_portfoliohover() {
global $thinkup_portfolio_style;
global $thinkup_portfolio_hovertitle;
global $thinkup_portfolio_hoverexcerpt;
global $thinkup_portfolio_hoverproject;
global $thinkup_portfolio_hoverimage;

	if ( empty( $thinkup_portfolio_style ) or $thinkup_portfolio_style == 'option1' ) {
		echo	'<article class="da-animate"><div class="image-overlay"></div><div class="entry-content">';
			if ( $thinkup_portfolio_hovertitle == '1' ) { 
				echo	'<h3 class="hover-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>'; 
			}
			if ( $thinkup_portfolio_hoverexcerpt == '1' ) { 
				echo '<div class="hover-excerpt">' . get_the_excerpt() . '</div>'; 
			}

			if ( $thinkup_portfolio_hoverproject == '1' or $thinkup_portfolio_hoverimage == '1') { 
			
			echo '<div class="hover-links">'; 
				if ( $thinkup_portfolio_hoverproject == '1' ) { 
					echo	'<a href="' . get_permalink() . '"><img class="hover-link" src="' . get_template_directory_uri() . '/images/transparent.png" /></a>'; 
				}
				if ( $thinkup_portfolio_hoverimage == '1' ) {
					if ( has_post_thumbnail( $post->ID ) ) {
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						echo	'<a href="' . $image[0] . '"><img class="hover-zoom" src="' . get_template_directory_uri() . '/images/transparent.png" alt="' . get_the_title() . '" /></a>'; 
					}
				}
			echo '</div>'; 
			}

		echo	'</div></article>';
	}
}


/* ----------------------------------------------------------------------------------
	PORTFOLIO CONTENT 
---------------------------------------------------------------------------------- */

function thinkup_input_portfolionohover() {
global $thinkup_portfolio_style;
global $thinkup_portfolio_nohovertitle;
global $thinkup_portfolio_nohoverexcerpt;
global $thinkup_portfolio_nohoverdemo;
global $thinkup_portfolio_nohoverproject;
global $infos;

	if ( $thinkup_portfolio_style == 'option2' ) {
		if ( $thinkup_portfolio_nohovertitle == '1' ) { 
			echo	'<h3 class="outer-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>'; 
		}
		if ( $thinkup_portfolio_nohoverexcerpt == '1' ) { 
			echo '<p class="outer-excerpt"><a href="' . get_permalink() . '">' . get_the_excerpt() . '</a></p>'; 
		}
		if ( $thinkup_portfolio_nohoverdemo == '1' or $thinkup_portfolio_nohoverproject == '1' ) {
			echo	'<p class="outer-link">';
				if ( $thinkup_portfolio_nohoverdemo == '1' ) {
					echo	'<a href="' . $infos[0] . '" target="_blank">Live Preview</a>'; 
				}
				if ( $thinkup_portfolio_nohoverproject == '1' ) {
					echo	'<a href="' . get_permalink() . '">More Details</a>'; 
				}
			echo	'</p>';
		}
	}
}


/* ----------------------------------------------------------------------------------
	PROJECT INFORMATION
---------------------------------------------------------------------------------- */

/* Input meta data */
function thinkup_input_projectinfo() {
global $thinkup_project_client;
global $thinkup_project_task;
global $thinkup_project_skill;
global $thinkup_project_url;

global $post;
$_thinkup_meta_projectdescription  = get_post_meta( $post->ID, '_thinkup_meta_projectdescription', true );
$_thinkup_meta_projectclient       = get_post_meta( $post->ID, '_thinkup_meta_projectclient', true );
$_thinkup_meta_projecttask         = get_post_meta( $post->ID, '_thinkup_meta_projecttask', true );
$_thinkup_meta_projectskills       = get_post_meta( $post->ID, '_thinkup_meta_projectskills', true );
$_thinkup_meta_projecturl          = get_post_meta( $post->ID, '_thinkup_meta_projecturl', true );

	if ( !empty( $_thinkup_meta_projectdescription ) ) {
		echo '<h4 class="project-title">Project Description</h4>';
		echo do_shortcode(wpautop($_thinkup_meta_projectdescription));
	}

	if ( !empty( $_thinkup_meta_projecturl ) and $thinkup_project_url !== '1' ) {
		if ( strpos( $_thinkup_meta_projecturl, 'http://' ) == 'true' ) {
			$_thinkup_meta_projecturl = str_replace( 'http://', '', $_thinkup_meta_projecturl );
		}
		echo '<a class="project-button themebutton" href="http://' . $_thinkup_meta_projecturl . '">Visit Website</a>';
	}

	if ( ( !empty( $_thinkup_meta_projectclient ) and $thinkup_project_client !== '1' ) or
		 ( !empty( $_thinkup_meta_projecttask ) and $thinkup_project_task !== '1' ) or
		 ( !empty( $_thinkup_meta_projectskills ) and $thinkup_project_skill !== '1' ) ) {

		echo '<h4 class="project-title">More Details</h4>';

		echo '<div id="project-accordion" class="accordion">';

		if ( !empty( $_thinkup_meta_projectclient ) and $thinkup_project_client !== '1' ) {

			if ( !empty( $_thinkup_meta_projectclient ) and $thinkup_project_client !== '1' ) {
				$output_client .=  '<div class="accordion-group">';
				$output_client .=     '<div class="accordion-heading">';
				$output_client .=       '<a class="accordion-toggle" data-toggle="collapse" data-parent="#project-accordion" href="#client">';
				$output_client .=         'Client';
				$output_client .=       '</a>';
				$output_client .=     '</div>';
				$output_client .=     '<div id="client" class="accordion-body collapse in">';
				$output_client .=       '<div class="accordion-inner">';
				$output_client .=         $_thinkup_meta_projectclient;
				$output_client .=       '</div>';
				$output_client .=     '</div>';
				$output_client .=   '</div>';

				echo $output_client;
			}
		}

		if ( !empty( $_thinkup_meta_projecttask ) and $thinkup_project_task !== '1' ) {
			if ( !empty( $_thinkup_meta_projecttask ) and $thinkup_project_task !== '1' ) {
				$output_task .=  '<div class="accordion-group">';
				$output_task .=    '<div class="accordion-heading">';
				$output_task .=      '<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#project-accordion" href="#task">';
				$output_task .=        'Our Task';
				$output_task .=      '</a>';
				$output_task .=    '</div>';
				$output_task .=    '<div id="task" class="accordion-body collapse">';
				$output_task .=      '<div class="accordion-inner">';
				$output_task .=        'Project completed on ' . $_thinkup_meta_projecttask;
				$output_task .=      '</div>';
				$output_task .=    '</div>';
				$output_task .=  '</div>';

				echo $output_task;
			}
		}
			
		if ( !empty( $_thinkup_meta_projectskills ) and $thinkup_project_skill !== '1' ) {			
			if ( !empty( $_thinkup_meta_projectskills ) and $thinkup_project_skill !== '1' ) {
				$output_skill .=  '<div class="accordion-group">';
				$output_skill .=    '<div class="accordion-heading">';
				$output_skill .=      '<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#project-accordion" href="#skill">';
				$output_skill .=        'Skills';
				$output_skill .=      '</a>';
				$output_skill .=    '</div>';
				$output_skill .=    '<div id="skill" class="accordion-body collapse">';
				$output_skill .=      '<div class="accordion-inner">';
				$output_skill .=        $_thinkup_meta_projectskills;
				$output_skill .=      '</div>';
				$output_skill .=    '</div>';
				$output_skill .=  '</div>';

				echo $output_skill;
			}
		}

		echo '</div>';
	}
}


/* ----------------------------------------------------------------------------------
	PROJECT NAVIGATION
---------------------------------------------------------------------------------- */

function thinkup_input_portfolionavigation() {
global $thinkup_project_navigationswitch;

	if ( $thinkup_project_navigationswitch == '1' ) {
		paginate_links( 'nav-below' );
	}
}


?>