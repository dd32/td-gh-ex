<?php
/**
 * Widget API: Blank_Widget class
 *
 * @package Aamla
 * @since 1.0.1
 */

namespace aamla;

/**
 * Class used to display Blank widget.
 *
 * @since 1.0.1
 *
 * @see WP_Widget
 */
class Display_Posts_Widget extends \WP_Widget {

	/**
	 * Holds all registered post type objects.
	 *
	 * @since  1.0.1
	 * @access protected
	 * @var    array
	 */
	protected $post_types = [];

	/**
	 * Holds sort orderby options.
	 *
	 * @since  1.0.1
	 * @access protected
	 * @var    array
	 */
	protected $orderby = [];

	/**
	 * Holds widget settings defaults, populated in constructor.
	 *
	 * @since  1.0.1
	 * @access protected
	 * @var array
	 */
	protected $defaults = [];

	/**
	 * Sets up a new Blank widget instance.
	 *
	 * @since 1.0.1
	 */
	public function __construct() {
		// Set widget instance settings default values.
		$this->defaults = [
			'title'     => '',
			'post_type' => '',
			'taxonomy'  => '',
			'terms'     => [],
			'pages'     => [],
			'number'    => 5,
			'orderby'   => 'date',
			'order'     => 'DESC',
			'styles'    => 'list_l',
		];

		// Get the registered post types.
		$this->post_types = get_post_types( [ 'public' => true ], 'objects' );

		// Set the options for orderby.
		$this->orderby = [
			'date'          => esc_html__( 'Publish Date', 'aamla' ),
			'modified'      => esc_html__( 'Modified Date', 'aamla' ),
			'title'         => esc_html__( 'Title', 'aamla' ),
			'author'        => esc_html__( 'Author', 'aamla' ),
			'comment_count' => esc_html__( 'Comment Count', 'aamla' ),
			'rand'          => esc_html__( 'Random', 'aamla' ),
		];

		// Setup our AJAX callback.
		add_action( 'wp_ajax_aamla_display_posts', array( $this, 'ajax_callback' ) );

		// Set the widget options.
		$widget_ops = [
			'classname'                   => 'display_posts',
			'description'                 => esc_html__( 'Create a display posts widget.', 'aamla' ),
			'customize_selective_refresh' => true,
		];
		parent::__construct( 'aamla_display_posts', esc_html__( 'Display Posts', 'aamla' ), $widget_ops );
	}

	/**
	 * Outputs the content for the current widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current widget instance.
	 */
	public function widget( $args, $instance ) {

		$args['widget_id'] = isset( $args['widget_id'] ) ? $args['widget_id'] : $this->id;

		// Merge with defaults.
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$entry_class = apply_filters( 'aamla_dp_classes', $instance['styles'], $instance, $this );

		echo $args['before_widget']; // WPCS xss ok. Contains HTML.

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title']; // WPCS xss ok. Contains HTML.
		}

		// Prepare the query.
		$query_args = [];
		if ( ! $instance['post_type'] ) {
			return;
		} elseif ( 'page' === $instance['post_type'] ) {
			$query_args = [
				'post_type'           => 'page',
				'post__in'            => $instance['pages'],
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
				'no_found_rows'       => true,
			];
		} else {
			$query_args = [
				'post_type'           => $instance['post_type'],
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
				'no_found_rows'       => true,
				'posts_per_page'      => $instance['number'],
				'orderby'             => $instance['orderby'],
				'order'               => $instance['order'],
			];

			if ( $instance['taxonomy'] ) {
				$query_args['tax_query'] = [
					[
						'taxonomy' => $instance['taxonomy'],
						'field'    => 'slug',
						'terms'    => $instance['terms'],
					],
				];
			}
		}

		$query_args = apply_filters( 'aamla_display_posts_args', $query_args, $instance, $this );
		$post_query = new \WP_Query( $query_args );

		if ( $post_query->have_posts() ) :
			?>
			<div class="dp-wrapper <?php echo esc_attr( $entry_class ); ?>">

			<?php
			while ( $post_query->have_posts() ) :
				$post_query->the_post();
				?>
				<div class="dp-entry">
					<?php do_action( 'aamla_dp_entry', $args, $instance, $this ); ?>
				</div><!-- .dp-entry -->
			<?php
			endwhile;
			?>

			</div>
			<?php

			// Reset the global $the_post as this query will have stomped on it.
			wp_reset_postdata();
		endif;

		echo $args['after_widget']; // WPCS xss ok. Contains HTML.
	}

	/**
	 * Outputs the settings form for the widget.
	 *
	 * @since 1.0.1
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		// Merge with defaults.
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		?>
		<p>
			<?php $this->label( 'title', esc_html__( 'Title:', 'aamla' ) ); ?>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<?php
			$post_type = wp_list_pluck( $this->post_types, 'label', 'name' );
			$post_type = array_merge( [ '' => esc_html__( 'None', 'aamla' ) ], $post_type );
			$this->label( 'post_type', esc_html__( 'Select Post Type', 'aamla' ) );
			$this->select( 'post_type', $post_type, $instance['post_type'] );
			?>
		</p>

		<div class="page-panel" <?php echo 'page' !== $instance['post_type'] ? ' style="display:none;"' : ''; ?>>
			<?php
			if ( 'page' === $instance['post_type'] ) :
				$this->pages_checklist( $instance['pages'] );
			endif;
			?>
		</div><!-- .page-panel -->

		<div class="post-panel" <?php echo ( ! $instance['post_type'] || 'page' === $instance['post_type'] ) ? ' style="display:none;"' : ''; ?>>

			<div class="taxonomies">
				<?php
				if ( $instance['post_type'] && 'page' !== $instance['post_type'] ) {
					$this->taxonomies_select( $instance['post_type'], $instance['taxonomy'] );
				}
				?>
			</div><!-- .taxonomies -->

			<div class="terms-panel" <?php echo '' === $instance['taxonomy'] ? ' style="display:none;"' : ''; ?>>
				<?php
				if ( '' !== $instance['taxonomy'] ) :
					$this->terms_checklist( $instance['taxonomy'], $instance['terms'] );
				endif;
				?>
			</div><!-- .terms-panel -->

			<p class="number-of-posts">
				<?php $this->label( 'number', esc_html__( 'Number of Posts:', 'aamla' ) ); ?>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo absint( $instance['number'] ); ?>" size="3" />
			</p>

			<p class="posts-orderby">
				<?php
				$this->label( 'orderby', esc_html__( 'Order By', 'aamla' ) );
				$this->select( 'orderby', $this->orderby, $instance['orderby'] );
				?>
			</p>

			<p class="order">
				<?php
				$this->label( 'order', esc_html__( 'Sort Order', 'aamla' ) );
				$order = [
					'DESC' => esc_html__( 'Descending', 'aamla' ),
					'ASC'  => esc_html__( 'Ascending', 'aamla' ),
				];
				$this->select( 'order', $order, $instance['order'] );
				?>
			</p>
		</div><!-- .post-panel -->

		<div class="posts-styles" <?php echo $instance['post_type'] ? '' : ' style="display:none;"'; ?>>
			<?php
			$this->label( 'styles', esc_html__( 'Display Style', 'aamla' ) );
			$styles = apply_filters( 'aamla_dp_styles', '', $instance );
			$this->select( 'styles', $styles, $instance['styles'] );
			?>
		</div><!-- .posts-styles -->
		<?php
	}

	/**
	 * Handles updating the settings for the current widget instance.
	 *
	 * @since 1.0.1
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance          = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );

		$valid_post_types      = wp_list_pluck( $this->post_types, 'name' );
		$instance['post_type'] = in_array( $new_instance['post_type'], $valid_post_types, true ) ? $new_instance['post_type'] : '';

		if ( 'page' === $instance['post_type'] ) {
			// Get list of all pages.
			$pages       = get_pages( [ 'exclude' => get_option( 'page_for_posts' ) ] );
			$valid_pages = wp_list_pluck( $pages, 'ID' );

			$instance['pages']    = array_intersect( $new_instance['pages'], $valid_pages );
			$instance['taxonomy'] = '';
		} else {
			$instance['pages'] = [];
		}

		if ( $instance['post_type'] && 'page' !== $instance['post_type'] && $new_instance['taxonomy'] ) {
			// Get list of all taxonomies for a post type.
			$taxonomies = get_object_taxonomies( $instance['post_type'], 'objects' );
			$taxonomies = wp_list_pluck( $taxonomies, 'label', 'name' );

			$instance['taxonomy'] = array_key_exists( $new_instance['taxonomy'], $taxonomies ) ? $new_instance['taxonomy'] : '';
		} else {
			$instance['taxonomy'] = '';
		}

		if ( $instance['taxonomy'] && $new_instance['terms'] ) {
			// Get list of all terms.
			$terms       = get_terms( [ 'taxonomy' => $instance['taxonomy'] ] );
			$terms       = wp_list_pluck( $terms, 'name', 'slug' );
			$valid_terms = array_keys( $terms );

			$instance['terms'] = array_intersect( $new_instance['terms'], $valid_terms );
		} else {
			$instance['terms'] = [];
		}

		$instance['number']  = absint( $new_instance['number'] );
		$instance['orderby'] = ( array_key_exists( $new_instance['orderby'], $this->orderby ) ) ? $new_instance['orderby'] : 'date';

		$instance['order'] = ( 'DESC' === $new_instance['order'] ) ? 'DESC' : 'ASC';

		$valid_styles       = apply_filters( 'aamla_dp_styles', '', $new_instance );
		$instance['styles'] = array_key_exists( $new_instance['styles'], $valid_styles ) ? $new_instance['styles'] : '';

		return $instance;
	}

	/**
	 * Prints a checkbox list of all pages.
	 *
	 * @param array $selected_pages Checked pages.
	 * @return void
	 */
	public function pages_checklist( $selected_pages ) {

		// Get list of all pages.
		$pages = get_pages( [ 'exclude' => get_option( 'page_for_posts' ) ] );
		$pages = wp_list_pluck( $pages, 'post_title', 'ID' );

		$this->label( 'pages', esc_html__( 'Select Pages', 'aamla' ) );
		$this->mu_checkbox( 'pages', $pages, $selected_pages );
	}

	/**
	 * Prints a checkbox list of all terms for a taxonomy.
	 *
	 * @param str   $taxonomy       Selected taxonomy in widget form.
	 * @param array $selected_terms Selected Terms.
	 * @return void
	 */
	public function terms_checklist( $taxonomy, $selected_terms ) {

		// Get list of all terms for a taxonomy.
		$terms = get_terms( [ 'taxonomy' => $taxonomy ] );
		$terms = wp_list_pluck( $terms, 'name', 'slug' );

		// Terms Checkbox markup.
		$this->label( 'terms', esc_html__( 'Select Terms', 'aamla' ) );
		$this->mu_checkbox( 'terms', $terms, $selected_terms );
	}

	/**
	 * Prints select list of all taxonomies for a post type.
	 *
	 * @param str $post_type Selected post type in widget form.
	 * @param str $taxonomy  Selected taxonomy in widget form.
	 * @return void
	 */
	public function taxonomies_select( $post_type, $taxonomy ) {

		// Get list of all taxonomies for a post type.
		$taxonomies = get_object_taxonomies( $post_type, 'objects' );
		$taxonomies = wp_list_pluck( $taxonomies, 'label', 'name' );
		$taxonomies = array_merge( [ '' => esc_html__( 'Ignore Taxonomy', 'aamla' ) ], $taxonomies );

		// Taxonomy Select markup.
		$this->label( 'taxonomy', esc_html__( 'Select Taxonomy', 'aamla' ) );
		$this->select( 'taxonomy', $taxonomies, $taxonomy );
	}

	/**
	 * Setup Ajax callback for this widget.
	 *
	 * @return void
	 */
	public function ajax_callback() {

		// Nounce verification of Ajax request.
		check_ajax_referer( 'display_posts' );

		if ( isset( $_POST['query_context'] ) ) {
			$queried_context = sanitize_text_field( $_POST['query_context'] );
		} else {
			$queried_context = '';
		}

		if ( isset( $_POST['query_val'] ) ) {
			$queried_item = sanitize_text_field( $_POST['query_val'] );
		} else {
			$queried_item = '';
		}

		if ( isset( $_POST['widget_id'] ) ) {
			$widget_id = sanitize_text_field( $_POST['widget_id'] );
		} else {
			$widget_id = '';
		}

		if ( '' === $queried_item || '' === $queried_context ) {
			echo false;
			wp_die();
		}

		$widget_id = explode( '_aamla_display_posts-', $widget_id );
		$id        = $widget_id[1];

		$instances = $this->get_settings();
		$instance  = array_key_exists( $id, $instances ) ? $instances[ $id ] : [];

		if ( 'posttype' === $queried_context ) {
			if ( 'page' === $queried_item ) {
				$pages = isset( $instance['pages'] ) ? $instance['pages'] : [];
				$this->pages_checklist( $pages );
			} elseif ( $queried_item ) {
				$taxonomy = isset( $instance['taxonomy'] ) ? $instance['taxonomy'] : [];
				$this->taxonomies_select( $queried_item, $instance['taxonomy'] );
			}
		} elseif ( 'taxonomy' === $queried_context ) {
			if ( $queried_item ) {
				$terms = isset( $instance['terms'] ) ? $instance['terms'] : [];
				$this->terms_checklist( $queried_item, $instance['terms'] );
			}
		}

		wp_die();
	}

	/**
	 * Markup for 'label' for widget input options.
	 *
	 * @param str  $for  Label for which ID.
	 * @param str  $text Label text.
	 * @param bool $echo Display or Return.
	 * @return void|string
	 */
	public function label( $for, $text, $echo = true ) {
		$label = sprintf( '<label for="%s">%s:</label>', esc_attr( $this->get_field_id( $for ) ), esc_html( $text ) );
		if ( $echo ) {
			echo $label; // WPCS xss ok. Contains HTML. Other values escaped.
		} else {
			return $label;
		}
	}

	/**
	 * Markup for Select dropdown lists for widget options.
	 *
	 * @param str   $for      Select for which ID.
	 * @param array $options  Select options as 'value => label' pair.
	 * @param str   $selected selected option.
	 * @param bool  $echo     Display or return.
	 * @return void|string
	 */
	public function select( $for, $options, $selected, $echo = true ) {
		$select = '';
		foreach ( $options as $value => $label ) {
			$select .= sprintf( '<option value="%s" %s>%s</option>', esc_attr( $value ), selected( $value, $selected, false ), esc_html( $label ) );
		}

		$select = sprintf( '<select id="%1$s" name="%2$s" class="aamla-%3$s">%4$s</select>',
			esc_attr( $this->get_field_id( $for ) ),
			esc_attr( $this->get_field_name( $for ) ),
			esc_attr( str_replace( '_', '-', $for ) ),
			$select
		);

		if ( $echo ) {
			echo $select; // WPCS xss ok. Contains HTML. Other values escaped.
		} else {
			return $select;
		}
	}

	/**
	 * Markup for multiple checkbox for widget options.
	 *
	 * @param str   $for      Select for which ID.
	 * @param array $options  Select options as 'value => label' pair.
	 * @param str   $selected selected option.
	 * @param bool  $echo     Display or return.
	 * @return void|string
	 */
	public function mu_checkbox( $for, $options, $selected, $echo = true ) {

		$mu_checkbox = '<div class="' . esc_attr( $for ) . '-checklist"><ul id="' . esc_attr( $this->get_field_id( $for ) ) . '">';

		$selected    = array_map( 'strval', $selected );
		$rev_options = $options;

		// Moving selected items on top of the array.
		foreach ( $options as $id => $label ) {
			if ( in_array( strval( $id ), $selected, true ) ) {
				$rev_options = [ $id => $label ] + $rev_options;
			}
		}

		foreach ( $rev_options as $id => $label ) {
			$mu_checkbox .= "\n<li>" . '<label class="selectit"><input value="' . esc_attr( $id ) . '" type="checkbox" name="' . esc_attr( $this->get_field_name( $for ) ) . '[]"' . checked( in_array( strval( $id ), $selected, true ), true, false ) . ' /> ' . esc_html( $label ) . "</label></li>\n";
		}
		$mu_checkbox .= "</ul></div>\n";

		if ( $echo ) {
			echo $mu_checkbox; // WPCS xss ok. Contains HTML. Other values escaped.
		} else {
			return $mu_checkbox;
		}
	}
}
