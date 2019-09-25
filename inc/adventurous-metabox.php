<?php
/**
 * Adventurous Custom meta box
 *
 * @package Catch Themes
 * @subpackage Adventurous
 * @since Adventurous 1.0
 */

 // Add the Meta Box
function adventurous_add_custom_box() {
    add_meta_box(
        'adventurous-options',                      //Unique ID
        esc_html__( 'Adventurous Options', 'adventurous' ),         //Title
        'adventurous_meta_options',                 //Callback function
        'page', //show metabox in post
        'side'
    );

    add_meta_box(
        'adventurous-options',                      //Unique ID
        esc_html__( 'Adventurous Options', 'adventurous' ), //Title
        'adventurous_meta_options',                 //Callback function
        'post', //show metabox in post
        'side'                      
    );
}
add_action( 'add_meta_boxes', 'adventurous_add_custom_box' );

/**
 * @renders metabox to for sidebar layout
 */
function adventurous_meta_options() {
    global $post;

    $header_image_options = array(
        'default' => array(
            'id'    => 'adventurous-header-image',
            'value' => 'default',
            'label' => esc_html__( 'Default', 'adventurous' ),
        ),
        'enable' => array(
            'id'    => 'adventurous-header-image',
            'value' => 'enable',
            'label' => esc_html__( 'Enable', 'adventurous' ),
        ),
        'disable' => array(
            'id'    => 'adventurous-header-image',
            'value' => 'disable',
            'label' => esc_html__( 'Disable', 'adventurous' )
        )
    );

    $featuredimage_options = array(
        'default' => array(
            'id'    => 'adventurous-featured-image',
            'value' => 'default',
            'label' => esc_html__( 'Default Layout', 'adventurous' ),

        ),
        'featured' => array(
            'id'    => 'adventurous-featured-image',
            'value' => 'featured',
            'label' => esc_html__( 'Featured Image', 'adventurous' )
        ),
        'full' => array(
            'id'    => 'adventurous-featured-image',
            'value' => 'full',
            'label' => esc_html__( 'Full Image', 'adventurous' )
        ),
        'slider' => array(
            'id'    => 'adventurous-featured-image',
            'value' => 'slider',
            'label' => esc_html__( 'Slider Image', 'adventurous' )
        ),
        'disable' => array(
            'id'    => 'adventurous-featured-image',
            'value' => 'disable',
            'label' => esc_html__( 'Disable Image', 'adventurous' )
        )
    );

    $sidebar_layout = array(
        'default-sidebar' => array(
            'id'        => 'adventurous-sidebarlayout',
            'value'     => 'default',
            'label'     => esc_html__( 'Default Layout', 'adventurous' ),
            'thumbnail' => ' '
        ),
       'right-sidebar' => array(
            'id'        => 'adventurous-sidebarlayout',
            'value'     => 'right-sidebar',
            'label'     => esc_html__( 'Right sidebar', 'adventurous' ),
        ),
        'left-sidebar' => array(
            'id'        => 'adventurous-sidebarlayout',
            'value'     => 'left-sidebar',
            'label'     => esc_html__( 'Left sidebar', 'adventurous' ),
        ),
        'no-sidebar' => array(
            'id'        => 'adventurous-sidebarlayout',
            'value'     => 'no-sidebar',
            'label'     => esc_html__( 'No sidebar', 'adventurous' ),
        ),
        'no-sidebar-full-width' => array(
            'id'        => 'adventurous-sidebarlayout',
            'value'     => 'no-sidebar-full-width',
            'label'     => esc_html__( 'No sidebar, Full Width', 'adventurous' ),
        ),
        'no-sidebar-one-column' => array(
            'id'        => 'adventurous-sidebarlayout',
            'value'     => 'no-sidebar-one-column',
            'label'     => esc_html__( 'No Sidebar, One Column', 'adventurous' ),
        )
    );

    // Use nonce for verification
    wp_nonce_field( basename( __FILE__ ), 'custom_meta_box_nonce' );

    // Begin the field table and loop  ?>
    <p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="adventurous-sidebarlayout"><?php esc_html_e( 'Sidebar Layout', 'adventurous' ); ?></label></p>
    <select class="widefat" name="adventurous-sidebarlayout" id="adventurous-sidebarlayout">
         <?php
            $meta_value = get_post_meta( $post->ID, 'adventurous-sidebarlayout', true );
            
            if ( empty( $meta_value ) ){
                $meta_value = 'default';
            }
            
            foreach ( $sidebar_layout as $field =>$label ) {  
            ?>
                <option value="<?php echo esc_attr( $label['value'] ); ?>" <?php selected( $meta_value, $label['value'] ); ?>><?php echo esc_html( $label['label'] ); ?></option>
            <?php
            } // end foreach
        ?>
    </select>

    <p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="adventurous-header-image"><?php esc_html_e( 'Content Featured Image Options', 'adventurous' ); ?></label></p>
    <select class="widefat" name="adventurous-header-image" id="adventurous-header-image">
         <?php
            $meta_value = get_post_meta( $post->ID, 'adventurous-header-image', true );
            
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

    <p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="adventurous-featured-image"><?php esc_html_e( 'Header Featured Image Options', 'adventurous' ); ?></label></p>
    <select class="widefat" name="adventurous-featured-image" id="adventurous-featured-image">
         <?php
            $meta_value = get_post_meta( $post->ID, 'adventurous-featured-image', true );
            
            if ( empty( $meta_value ) ){
                $meta_value = 'default';
            }
            
            foreach ( $featuredimage_options as $field =>$label ) {  
            ?>
                <option value="<?php echo esc_attr( $label['value'] ); ?>" <?php selected( $meta_value, $label['value'] ); ?>><?php echo esc_html( $label['label'] ); ?></option>
            <?php
            } // end foreach
        ?>
    </select>
<?php
}


/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function adventurous_save_custom_meta( $post_id ) {
    global $post;

    // Verify the nonce before proceeding.
    if ( ! isset( $_POST[ 'custom_meta_box_nonce' ] ) || ! wp_verify_nonce( $_POST[ 'custom_meta_box_nonce' ], basename( __FILE__ ) ) ) {
        return;
    }

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ('page' == $_POST['post_type']) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
    } elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    $options_array = array(
        'adventurous-header-image',
        'adventurous-featured-image',
        'adventurous-sidebarlayout',
    );

    foreach ( $options_array as $option ) {
        //Execute this saving function
        $old = get_post_meta( $post_id, $option, true );
        $new = $_POST[ $option ];
        
        if ( $new && $new != $old ) {
            update_post_meta( $post_id, $option, sanitize_text_field( $new ) );
        } elseif ( '' == $new && $old ) {
            delete_post_meta( $post_id, $option, sanitize_text_field( $old ) );
        }
    }
}
add_action('save_post', 'adventurous_save_custom_meta');
