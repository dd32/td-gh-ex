<?php
/**
 * The theme engine generates the css needed to display the different color schemes.
 *
 * @package agncy
 */

/**
 * The main class for the theme engine
 */
class AgncyColorScheme {

	/**
	 * The theme name
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * The theme name slug
	 *
	 * @var string
	 */
	protected $slug;

	/**
	 * The primary color
	 *
	 * @var string
	 */
	protected $primary_color;

	/**
	 * The secondary color
	 *
	 * @var string
	 */
	protected $secondary_color;

	/**
	 * The tertiary color
	 *
	 * @var string
	 */
	protected $tertiary_color;

	/**
	 * The class constructor
	 *
	 * @param array $args An array of valid arguments.
	 */
	public function __construct( $args ) {

		// Parse the arguments against default values.
		$args = wp_parse_args(
			$args,
			array(
				'name'      => '',
				'slug'      => '',
				'primary'   => '#ffffff',
				'secondary' => '#000000',
				'tertiary'  => '#ff0000',
				'section'   => 'default',
			)
		);

		/**
		 * Sanatize inputs.
		 */

		$forbidden_slugs = array( 'custom' );
		if ( in_array( $args['slug'], $forbidden_slugs ) ) {
			wp_die( 'The color slug selected is forbidden' );
		}

		$this->primary_color   = sanitize_hex_color( $args['primary'] );
		$this->secondary_color = sanitize_hex_color( $args['secondary'] );
		$this->tertiary_color  = sanitize_hex_color( $args['tertiary'] );

		$this->name    = esc_html( $args['name'] );
		$this->slug    = esc_attr( $args['slug'] );
		$this->section = esc_attr( $args['section'] );

	}

	/**
	 * Get the primary color
	 *
	 * @return string The primary color
	 */
	public function get_primary_color() {
		return $this->primary_color;
	}

	/**
	 * Get the secondary color
	 *
	 * @return string The secondary color
	 */
	public function get_secondary_color() {
		return $this->secondary_color;
	}

	/**
	 * Get the tertiary color
	 *
	 * @return string The tertiary color
	 */
	public function get_tertiary_color() {
		return $this->tertiary_color;
	}

	/**
	 * Get the color scheme name
	 *
	 * @return string The color scheme name
	 */
	public function get_name() {
		return $this->name;
	}

	/**
	 * Get the color scheme slug
	 *
	 * @return string The color scheme slug
	 */
	public function get_slug() {
		return $this->slug;
	}

	/**
	 * Get the CSS of the color scheme
	 *
	 * @param string $prefix The desired css prefix.
	 * @return string The color scheme css.
	 */
	public function get_css( $prefix = null ) {
		$css = $this->generate_css_color_scheme( $prefix );
		return $css;
	}

	/**
	 * Generate the css needed to display the color scheme
	 *
	 * @param string $prefix The desired css prefix.
	 * @return string The generated CSS
	 */
	private function generate_css_color_scheme( $prefix = null ) {
		ob_start();

		$this->generate_wp_color_syntax( $prefix, 'primary', $this->get_primary_color() );
		$this->generate_wp_color_syntax( $prefix, 'secondary', $this->get_secondary_color() );
		$this->generate_wp_color_syntax( $prefix, 'tertiary', $this->get_tertiary_color() );

		$this->generate_color_syntax( $prefix, 'primary', $this->get_primary_color() );
		$this->generate_color_syntax( $prefix, 'secondary', $this->get_secondary_color() );
		$this->generate_color_syntax( $prefix, 'tertiary', $this->get_tertiary_color() );

		$this->generate_custom_syntax( $prefix );

		$css = ob_get_clean();
		return $this->minify( $css );
	}

	/**
	 * Geneate the WP classes for the theme
	 *
	 * @param  string $prefix The classes prefix.
	 * @param  string $name   The name of the color.
	 * @param  string $color  The hex of the color.
	 *
	 * @return void
	 */
	private function generate_wp_color_syntax( $prefix, $name, $color ) {
		$class_base = $prefix . '.has-' . $name;
		?>

		<?php echo esc_attr( $class_base ); ?>-color {
			color: <?php echo esc_attr( $color ); ?>;
		}

		<?php echo esc_attr( $class_base ); ?>-background-color {
			background-color: <?php echo esc_attr( $color ); ?>;
		}
		<?php
	}

	/**
	 * Geneate the color classes for the theme
	 *
	 * @param  string $prefix The classes prefix.
	 * @param  string $name   The name of the color.
	 * @param  string $color  The hex of the color.
	 *
	 * @return void
	 */
	private function generate_color_syntax( $prefix, $name, $color ) {
		$class_base = $prefix . '.color-' . $name;
		?>

		<?php echo esc_attr( $class_base ); ?> {
			color: <?php echo esc_attr( $color ); ?>;
		}

		<?php echo esc_attr( $class_base ); ?>--background {
			background-color: <?php echo esc_attr( $color ); ?>;
		}

		<?php echo esc_attr( $class_base ); ?>--border {
			border-color: <?php echo esc_attr( $color ); ?>;
		}

		<?php echo esc_attr( $class_base ); ?>--hover:hover {
			color: <?php echo esc_attr( $color ); ?>;
		}

		<?php echo esc_attr( $class_base ); ?>--background-hover:hover {
			background-color: <?php echo esc_attr( $color ); ?>;
		}

		<?php echo esc_attr( $class_base ); ?>--border-hover:hover {
			border-color: <?php echo esc_attr( $color ); ?>;
		}

		<?php echo esc_attr( $class_base ); ?>--before:before,
		<?php echo esc_attr( $class_base ); ?>--before :before {
			color: <?php echo esc_attr( $color ); ?>;
		}

		<?php echo esc_attr( $class_base ); ?>--before-hover:hover:before,
		<?php echo esc_attr( $class_base ); ?>--before-hover:hover :before {
			color: <?php echo esc_attr( $color ); ?>;
		}

		<?php echo esc_attr( $class_base ); ?>--background-before:before,
		<?php echo esc_attr( $class_base ); ?>--background-before :before {
			background-color: <?php echo esc_attr( $color ); ?>;
		}

		<?php echo esc_attr( $class_base ); ?>--after:after,
		<?php echo esc_attr( $class_base ); ?>--after > :after {
			color: <?php echo esc_attr( $color ); ?>;
		}

		<?php echo esc_attr( $class_base ); ?>--background-after:after,
		<?php echo esc_attr( $class_base ); ?>--background-after :after {
			background-color: <?php echo esc_attr( $color ); ?>;
		}

		<?php echo esc_attr( $class_base ); ?>--fa .fa {
			color: <?php echo esc_attr( $color ); ?>;
		}

		<?php echo esc_attr( $class_base ); ?>--fa-background .fa {
			background-color: <?php echo esc_attr( $color ); ?>;
		}

		<?php echo esc_attr( $class_base ); ?>--fa-hover:hover .fa {
			color: <?php echo esc_attr( $color ); ?>;
		}

		<?php echo esc_attr( $class_base ); ?>--a a {
			color: <?php echo esc_attr( $color ); ?>;
		}

		<?php echo esc_attr( $class_base ); ?>--a-hover a:hover {
			color: <?php echo esc_attr( $color ); ?>;
		}

		<?php
	}

	/**
	 * Geneate the color classes for the theme
	 *
	 * @param  string $prefix The classes prefix.
	 *
	 * @return void
	 */
	private function generate_custom_syntax( $prefix ) {
		?>
		<?php echo esc_attr( $prefix ); ?> a {
			color: <?php echo esc_attr( $this->get_tertiary_color() ); ?>;
		}

		<?php echo esc_attr( $prefix ); ?> a:hover {
			color: <?php echo esc_attr( $this->get_secondary_color() ); ?>;
		}

		<?php echo esc_attr( $prefix ); ?> .pagination .nav-links .prev,
		<?php echo esc_attr( $prefix ); ?> .pagination .nav-links .next {
				background-color: <?php echo esc_attr( $this->get_primary_color() ); ?>;
				border-color: <?php echo esc_attr( $this->get_primary_color() ); ?>;
		}

		<?php echo esc_attr( $prefix ); ?> .pagination .nav-links .prev:hover,
		<?php echo esc_attr( $prefix ); ?> .pagination .nav-links .next:hover {
				border-color: <?php echo esc_attr( $this->get_secondary_color() ); ?>;
				color: <?php echo esc_attr( $this->get_secondary_color() ); ?>;
		}

		<?php echo esc_attr( $prefix ); ?> .pagination .nav-links .page-numbers:not(.prev):not(.next) {
				color: <?php echo esc_attr( $this->get_primary_color() ); ?>;
		}

		<?php echo esc_attr( $prefix ); ?> .pagination .nav-links .page-numbers:not(.prev):not(.next):hover {
				color: <?php echo esc_attr( $this->get_secondary_color() ); ?>;
		}
		<?php
	}

	/**
	 * Minify css in a short and dirty way
	 *
	 * @param  string $css The css string.
	 *
	 * @return string      The minified css string
	 */
	private function minify( $css ) {
		// Normalize whitespace.
		$css = preg_replace( '/\s+/', ' ', $css );

		// Remove spaces before and after comment.
		$css = preg_replace( '/(\s+)(\/\*(.*?)\*\/)(\s+)/', '$2', $css );
		// Remove comment blocks, everything between /* and */, unless
		// preserved with /*! ... */ or /** ... */.
		$css = preg_replace( '~/\*(?![\!|\*])(.*?)\*/~', '', $css );
		// Remove ; before }.
		$css = preg_replace( '/;(?=\s*})/', '', $css );
		// Remove space after , : ; { } */ >.
		$css = preg_replace( '/(,|:|;|\{|}|\*\/|>) /', '$1', $css );
		// Remove space before , ; { } ( ) >.
		$css = preg_replace( '/ (,|;|\{|}|\(|\)|>)/', '$1', $css );
		// Strips leading 0 on decimal values (converts 0.5px into .5px).
		$css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );
		// Strips units if value is 0 (converts 0px to 0).
		$css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );
		// Converts all zeros value into short-hand.
		$css = preg_replace( '/0 0 0 0/', '0', $css );
		// Shortern 6-character hex color codes to 3-character where possible.
		$css = preg_replace( '/#([a-f0-9])\\1([a-f0-9])\\2([a-f0-9])\\3/i', '#\1\2\3', $css );

		return trim( $css );
	}
}
