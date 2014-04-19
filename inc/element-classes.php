<?php
/**
 * Display the classes for the sidebar.
 *
 * @since 0.1
 * @param string|array $class One or more classes to add to the class list.
 */
function right_sidebar_class( $class = '' ) {
	// Separates classes with a single space, collates classes for post DIV
	echo 'class="' . join( ' ', get_right_sidebar_class( $class ) ) . '"';
}

/**
 * Retrieve the classes for the sidebar.
 *
 * @since 0.1
 * @param string|array $class One or more classes to add to the class list.
 * @return array Array of classes.
 */
function get_right_sidebar_class( $class = '' ) {

	$classes = array();

	if ( !empty($class) ) {
		if ( !is_array( $class ) )
			$class = preg_split('#\s+#', $class);
		$classes = array_merge($classes, $class);
	}

	$classes = array_map('esc_attr', $classes);

	return apply_filters('right_sidebar_class', $classes, $class);
}

/**
 * Display the classes for the sidebar.
 *
 * @since 0.1
 * @param string|array $class One or more classes to add to the class list.
 */
function left_sidebar_class( $class = '' ) {
	// Separates classes with a single space, collates classes for post DIV
	echo 'class="' . join( ' ', get_left_sidebar_class( $class ) ) . '"';
}

/**
 * Retrieve the classes for the sidebar.
 *
 * @since 0.1
 * @param string|array $class One or more classes to add to the class list.
 * @return array Array of classes.
 */
function get_left_sidebar_class( $class = '' ) {

	$classes = array();

	if ( !empty($class) ) {
		if ( !is_array( $class ) )
			$class = preg_split('#\s+#', $class);
		$classes = array_merge($classes, $class);
	}

	$classes = array_map('esc_attr', $classes);

	return apply_filters('left_sidebar_class', $classes, $class);
}

/**
 * Display the classes for the content.
 *
 * @since 0.1
 * @param string|array $class One or more classes to add to the class list.
 */
function content_class( $class = '' ) {
	// Separates classes with a single space, collates classes for post DIV
	echo 'class="' . join( ' ', get_content_class( $class ) ) . '"';
}

/**
 * Retrieve the classes for the content.
 *
 * @since 0.1
 * @param string|array $class One or more classes to add to the class list.
 * @return array Array of classes.
 */
function get_content_class( $class = '' ) {

	$classes = array();

	if ( !empty($class) ) {
		if ( !is_array( $class ) )
			$class = preg_split('#\s+#', $class);
		$classes = array_merge($classes, $class);
	}

	$classes = array_map('esc_attr', $classes);

	return apply_filters('content_class', $classes, $class);
}

/**
 * Display the classes for the header.
 *
 * @since 0.1
 * @param string|array $class One or more classes to add to the class list.
 */
function header_class( $class = '' ) {
	// Separates classes with a single space, collates classes for post DIV
	echo 'class="' . join( ' ', get_header_class( $class ) ) . '"';
}

/**
 * Retrieve the classes for the content.
 *
 * @since 0.1
 * @param string|array $class One or more classes to add to the class list.
 * @return array Array of classes.
 */
function get_header_class( $class = '' ) {

	$classes = array();

	if ( !empty($class) ) {
		if ( !is_array( $class ) )
			$class = preg_split('#\s+#', $class);
		$classes = array_merge($classes, $class);
	}

	$classes = array_map('esc_attr', $classes);

	return apply_filters('header_class', $classes, $class);
}

/**
 * Display the classes for inside the header.
 *
 * @since 0.1
 * @param string|array $class One or more classes to add to the class list.
 */
function inside_header_class( $class = '' ) {
	// Separates classes with a single space, collates classes for post DIV
	echo 'class="' . join( ' ', get_inside_header_class( $class ) ) . '"';
}

/**
 * Retrieve the classes for inside the header.
 *
 * @since 0.1
 * @param string|array $class One or more classes to add to the class list.
 * @return array Array of classes.
 */
function get_inside_header_class( $class = '' ) {

	$classes = array();

	if ( !empty($class) ) {
		if ( !is_array( $class ) )
			$class = preg_split('#\s+#', $class);
		$classes = array_merge($classes, $class);
	}

	$classes = array_map('esc_attr', $classes);

	return apply_filters('inside_header_class', $classes, $class);
}

/**
 * Display the classes for the container.
 *
 * @since 0.1
 * @param string|array $class One or more classes to add to the class list.
 */
function container_class( $class = '' ) {
	// Separates classes with a single space, collates classes for post DIV
	echo 'class="' . join( ' ', get_container_class( $class ) ) . '"';
}

/**
 * Retrieve the classes for the content.
 *
 * @since 0.1
 * @param string|array $class One or more classes to add to the class list.
 * @return array Array of classes.
 */
function get_container_class( $class = '' ) {

	$classes = array();

	if ( !empty($class) ) {
		if ( !is_array( $class ) )
			$class = preg_split('#\s+#', $class);
		$classes = array_merge($classes, $class);
	}

	$classes = array_map('esc_attr', $classes);

	return apply_filters('container_class', $classes, $class);
}

/**
 * Display the classes for the navigation.
 *
 * @since 0.1
 * @param string|array $class One or more classes to add to the class list.
 */
function navigation_class( $class = '' ) {
	// Separates classes with a single space, collates classes for post DIV
	echo 'class="' . join( ' ', get_navigation_class( $class ) ) . '"';
}

/**
 * Retrieve the classes for the navigation.
 *
 * @since 0.1
 * @param string|array $class One or more classes to add to the class list.
 * @return array Array of classes.
 */
function get_navigation_class( $class = '' ) {

	$classes = array();

	if ( !empty($class) ) {
		if ( !is_array( $class ) )
			$class = preg_split('#\s+#', $class);
		$classes = array_merge($classes, $class);
	}

	$classes = array_map('esc_attr', $classes);

	return apply_filters('navigation_class', $classes, $class);
}

/**
 * Display the classes for the navigation.
 *
 * @since 0.1
 * @param string|array $class One or more classes to add to the class list.
 */
function menu_class( $class = '' ) {
	// Separates classes with a single space, collates classes for post DIV
	echo 'class="' . join( ' ', get_menu_class( $class ) ) . '"';
}

/**
 * Retrieve the classes for the navigation.
 *
 * @since 0.1
 * @param string|array $class One or more classes to add to the class list.
 * @return array Array of classes.
 */
function get_menu_class( $class = '' ) {

	$classes = array();

	if ( !empty($class) ) {
		if ( !is_array( $class ) )
			$class = preg_split('#\s+#', $class);
		$classes = array_merge($classes, $class);
	}

	$classes = array_map('esc_attr', $classes);

	return apply_filters('menu_class', $classes, $class);
}

/**
 * Display the classes for the footer.
 *
 * @since 0.1
 * @param string|array $class One or more classes to add to the class list.
 */
function footer_class( $class = '' ) {
	// Separates classes with a single space, collates classes for post DIV
	echo 'class="' . join( ' ', get_footer_class( $class ) ) . '"';
}

/**
 * Retrieve the classes for the footer.
 *
 * @since 0.1
 * @param string|array $class One or more classes to add to the class list.
 * @return array Array of classes.
 */
function get_footer_class( $class = '' ) {

	$classes = array();

	if ( !empty($class) ) {
		if ( !is_array( $class ) )
			$class = preg_split('#\s+#', $class);
		$classes = array_merge($classes, $class);
	}

	$classes = array_map('esc_attr', $classes);

	return apply_filters('footer_class', $classes, $class);
}