<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class MetaBoxes {
	private $metadata;
	private $meta_boxes;

	function __construct() {
		global $post;
		if ( ! empty( $post ) ) {
			$this->metadata = maybe_unserialize( get_post_meta( $post->ID, 'attire_post_meta', true ) );
		}
		$this->Actions();
	}

	function Actions() {
		add_action( 'admin_init', array( $this, 'LoadMetaBoxes' ), 0 );
		add_action( 'save_post', array( $this, 'SavePostMeta' ), 10, 2 );
	}

	function LoadMetaBoxes() {
		$this->meta_boxes = array(
			'attire-page-width' => array(
				'title'     => __( 'Page Width', 'attire' ),
				'callback'  => array( $this, 'PageWidth' ),
				'position'  => 'side',
				'priority'  => 'core',
				'post_type' => 'page'
			),
		);
		$this->meta_boxes = apply_filters( "attire_metabox", $this->meta_boxes );

		foreach ( $this->meta_boxes as $ID => $meta_box ) {
			extract( $meta_box );
			add_meta_box( $ID, $title, $callback, $post_type, $position, $priority );
		}
	}

	/**
	 * @usage Page Width
	 *
	 * @param $post
	 */
	function PageWidth( $post ) {

		if ( ! is_array( $this->metadata ) ) {
			$this->metadata = maybe_unserialize( get_post_meta( $post->ID, 'attire_post_meta', true ) );
		}

		$container_fluid = "";
		$container       = "";
		$val             = get_post_meta( $post->ID, 'attire_post_meta', true );
		if ( isset( $val['layout_page'] ) ) {
			$val = $val['layout_page'];

			$default         = $val === "default" ? "selected" : "";
			$container_fluid = $val === "container-fluid" ? "selected" : "";
			$container       = $val === "container" ? "selected" : "";

		} elseif ( $container_fluid === "" && $container === "" ) {
			$default = "selected";
		}

		wp_nonce_field( 'page_layout_nonce', 'page_layout_nonce' );
		echo '<select class="form-control" id="page_width" name="attire_post_meta[layout_page]">';
		echo '<option  value="default"  ' . esc_attr( $default ) . '>' . __( 'Theme Default', 'attire' ) . '</option>';
		echo '<option  value="container-fluid"  ' . esc_attr( $container_fluid ) . '>' . __( 'Full-Width', 'attire' ) . '</option>';
		echo '<option  value="container"  ' . esc_attr( $container ) . '> ' . __( 'Container', 'attire' ) . '</option>';
		echo '</select>';

	}


	/**
	 * @usage Save Post Meta
	 *
	 * @param $postid
	 * @param $post
	 *
	 * @return void
	 */
	function SavePostMeta( $postid, $post ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $postid;
		}

		if ( ! current_user_can( 'edit_page', $postid ) ) {
			return $postid;
		}

		if ( isset( $_POST['attire_post_meta'] ) && is_array( $_POST['attire_post_meta'] ) ) {

			$pagemeta = $_POST['attire_post_meta'];

			if ( wp_verify_nonce( $_POST['page_settings_nonce'], 'page_settings_nonce' ) ) {

				$pagemeta['layout_page'] = sanitize_text_field( $pagemeta['layout_page'] );


			}

			update_post_meta( $postid, 'attire_post_meta', $pagemeta );
		}
	}


}

new MetaBoxes();
