<?php
/**
 * The template for displaying meta box in page/post
 *
 * This adds Layout Options, Header Freatured Image Options, Single Page/Post Image Layout
 * This is only for the design purpose and not used to save any content
 *
 * @package Catch Themes
 * @subpackage Gridalicious
 * @since Gridalicious 0.1 
 */
 
 if ( ! defined( 'GRIDALICIOUS_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


/**
 * Class to Add, Render and save metabox options
 *
 * @since Gridalicious 1.1
 */
class GridaliciousMetaBox {
	private $meta_box;

	private $fields;

	/**
	* Constructor
	*
	* @since Gridalicious 1.1
	*
	* @access public
	*
	*/
	public function __construct( $meta_box_id, $meta_box_title, $post_type ) {
		
		$this->meta_box = array (
							'id' 		=> $meta_box_id,
							'title' 	=> $meta_box_title,
							'post_type' => $post_type,
							);

		$this->fields = array(
								'gridalicious-layout-option',
								'gridalicious-header-image',
								'gridalicious-featured-image'
							);


		// Add metaboxes
		add_action( 'add_meta_boxes', array( $this, 'add' ) );
		
		add_action( 'save_post', array( $this, 'save' ) );	
   	}

	/**
	* Add Meta Box for multiple post types.
	*
	* @since Gridalicious 1.
	*
	* @access public
	*/
	public function add( $post_type ) {
		add_meta_box( $this->meta_box['id'], $this->meta_box['title'], array( $this, 'show' ), $post_type, 'side', 'high' );
	}

	/**
	* Renders metabox
	*
	* @since Gridalicious 1.1
	*
	* @access public
	*/
	public function show() {
		global $post;

		$layout_options			= gridalicious_metabox_layouts();
		$featured_image_options	= gridalicious_metabox_featured_image_options();  
		$header_image_options 	= gridalicious_metabox_header_featured_image_options();
		
	    
	    // Use nonce for verification  
	    wp_nonce_field( basename( __FILE__ ), 'gridalicious_custom_meta_box_nonce' );

	    // Begin the field table and loop  ?>  
	     <p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="gridalicious-layout-option"><?php esc_html_e( 'Layout Options', 'gridalicious' ); ?></label></p>
		<select class="widefat" name="gridalicious-layout-option" id="gridalicious-layout-option">
			 <?php
				$meta_value = get_post_meta( $post->ID, 'gridalicious-layout-option', true );
				
				if ( empty( $meta_value ) ){
					$meta_value = 'default';
				}
				
				foreach ( $layout_options as $field =>$label ) {  
				?>
					<option value="<?php echo esc_attr( $label['value'] ); ?>" <?php selected( $meta_value, $label['value'] ); ?>><?php echo esc_html( $label['label'] ); ?></option>
				<?php
				} // end foreach
			?>
		</select>

		<p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="gridalicious-header-image"><?php esc_html_e( 'Header Featured Image Options', 'gridalicious' ); ?></label></p>
		<select class="widefat" name="gridalicious-header-image" id="gridalicious-header-image">
			 <?php
				$meta_value = get_post_meta( $post->ID, 'gridalicious-header-image', true );
				
				if ( empty( $meta_value ) ){
					$meta_value = 'default';
				}
				
				foreach ( $header_image_options as $field =>$label ) {  
				?>
					<option value="<?php echo esc_attr( $label['value'] ); ?>" <?php selected( $meta_value, $label['value'] ); ?>><?php echo esc_html( $label['label'] ); ?></option>
				<?php
				} // end foreach
			?>
		</select>

		<p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="gridalicious-featured-image"><?php esc_html_e( 'Single Page/Post Image Layout', 'gridalicious' ); ?></label></p>
		<select class="widefat" name="gridalicious-featured-image" id="gridalicious-featured-image">
			 <?php
				$meta_value = get_post_meta( $post->ID, 'gridalicious-featured-image', true );
				
				if ( empty( $meta_value ) ){
					$meta_value = 'default';
				}
				
				foreach ( $featured_image_options as $field =>$label ) {  
				?>
					<option value="<?php echo esc_attr( $label['value'] ); ?>" <?php selected( $meta_value, $label['value'] ); ?>><?php echo esc_html( $label['label'] ); ?></option>
				<?php
				} // end foreach
			?>
		</select>
	<?php 
	}

	/**
	 * Save custom metabox data
	 * 
	 * @action save_post
	 *
	 * @since Gridalicious 1.1
	 *
	 * @access public
	 */
	public function save( $post_id ) { 
		global $post_type;
    
		$post_type_object = get_post_type_object( $post_type );

	    if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )                      // Check Autosave
	    || ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] )        // Check Revision
	    || ( ! in_array( $post_type, $this->meta_box['post_type'] ) )                  // Check if current post type is supported.
	    || ( ! check_admin_referer( basename( __FILE__ ), 'gridalicious_custom_meta_box_nonce') )    // Check nonce - Security
	    || ( ! current_user_can( $post_type_object->cap->edit_post, $post_id ) ) )  // Check permission
	    {
	      return $post_id;
	    }

	    foreach ( $this->fields as $field ) {      
			$old = get_post_meta( $post_id, $field, true); 
			
			$new = $_POST[ $field ];

			delete_post_meta( $post_id, $field );			
			
			if ( '' == $new || array() == $new ) {
				return;
			}
			else {
				if ( ! update_post_meta ($post_id, $field, sanitize_key ( $new ) ) ) { 
					add_post_meta($post_id, $field, sanitize_key ( $new ), true );
				}
			}
		} // end foreach		 
	}
}

$gridalicious_metabox = new GridaliciousMetaBox( 
									'gridalicious-options', 					//metabox id
									__( 'Gridalicious Options', 'gridalicious' ), //metabox title
									array( 'page', 'post' )				//metabox post types
									);
