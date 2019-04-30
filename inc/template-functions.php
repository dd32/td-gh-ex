<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Best_Charity
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function best_charity_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'best_charity_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function best_charity_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'best_charity_pingback_header' );


// Top Header Contact Info
if( ! function_exists('top_header_contact_info_items')):
	function top_header_contact_info_items(){
		$defaults =  array(
			array(
				'icon' => '',
				'title' => '',
			),
			array(
				'icon' => '',
				'title' => '',
			)
		);
		$contact_items = get_theme_mod( 'top_header_contact_info_items', $defaults );
		if( $contact_items  ){ 
			foreach( $contact_items as $contact ){ ?>
				<li>
					<a href="#"><span class="<?php echo esc_attr($contact['icon']);?>" aria-hidden="true"></span><?php echo esc_attr($contact['title']);?></a>
				</li>
				<?php
			}
		}
	}
endif;

//About Brand Title

if( !function_exists( 'best_charity_about_brand_items' )):
	function best_charity_about_brand_items(){
		$defaults =  array(
			array(
				'title' => '',
				'percentage' => '',
			),
			array(
				'title' => '',
				'percentage' => '',
			),
			array(
				'title' => '',
				'percentage' => '',
			)
		);
		$brand_items = get_theme_mod( 'best_charity_about_brand_items', $defaults );
		if( $brand_items  ){ 
			foreach( $brand_items as $brand ){ ?>
				<div class="candidatos">
					<div class="parcial">
						<div class="info">
							<div class="nome"><?php echo esc_html($brand['title']);?></div>
							<div class="percentagem-num"><?php echo esc_html($brand['percentage']);?></div>
						</div>
						<div class="progressBar">
							<div class="percentagem" style="width: <?php echo esc_html($brand['percentage']);?>;"></div>
						</div>
					</div>
				</div>
				<?php
			}
		}
	}
endif;	

// Numbering items
if( !function_exists( 'best_charity_numbering_items' )):
	function best_charity_numbering_items(){
		$defaults =  array(
			array(
				'number' => '',
				'title' => '',
			),
			array(
				'number' => '',
				'title' => '',
			),
			array(
				'number' => '',
				'title' => '',
			),
			array(
				'number' => '',
				'title' => '',
			)
		);

		$number_items = get_theme_mod( 'best_charity_numbering_items', $defaults );
		if( $number_items  ){ 
			foreach( $number_items as $number ){ ?>
				<div class="col-sm-6">
					<div class="num-holder">
						<span class="num"><?php echo absint( $number['number'] );?></span>
						<span class="text"><?php echo esc_html( $number['title'] );?></span>
					</div>
				</div>
				<?php
			}
		}
	}
endif;