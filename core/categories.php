<?php
if ( ! function_exists( 'bhumi_create_categories' ) ) {
    function bhumi_create_categories(){
        $portfolio_cat = array(
            'cat_name' => 'Portfolio',
            'category_description' => 'This category is used to display Portfolio.',
            'category_nicename' => 'portfolio-slug',
            );
        wp_insert_category($portfolio_cat);

        $slider_cat = array(
            'cat_name' => 'Slider',
            'category_description' => 'This category is used to display Slider.',
            'category_nicename' => 'slider-slug',
            );
        wp_insert_category($slider_cat);

        $service_cat = array(
            'cat_name' => 'Service',
            'category_description' => 'This category is used to display Services.',
            'category_nicename' => 'service-slug',
            );
        wp_insert_category($service_cat);

    }
    add_action('admin_init','bhumi_create_categories');
}

if ( ! function_exists( 'bhumi_add_meta_box' ) ) {
    function bhumi_add_meta_box() {
            add_meta_box(
                'bhumi_service_text',
                __( 'Service Icon', 'bhumi' ),
                'bhumi_service_textbox',
                'post',
                'side'
            );
             add_meta_box(
                    'bhumi_slider_text',
                    __('Slider Button Info', 'bhumi'),
                    'bhumi_slider_callback',
                    'post'
                );

    }
    add_action( 'add_meta_boxes', 'bhumi_add_meta_box' );
}

if ( ! function_exists( 'bhumi_service_textbox' ) ) {
    function bhumi_service_textbox( $post ) {

        wp_nonce_field( 'bhumi_save_meta_box_data', 'bhumi_meta_box_nonce' );

        $value = get_post_meta( $post->ID, 'service_class', true );
        $href = esc_url('http://fontawesome.bootstrapcheatsheets.com');

        $format = '<a href="%s" target="_blank">' . __("FontAwesome Icons","bhumi") . '</a>';
        echo sprintf($format, $href);
        echo '<br />';
        echo '<br />';
        echo '<label for="bhumi_service_class_field">';
        echo '</label> ';
        echo '<input type="text" id="bhumi_service_class_field" name="bhumi_service_class_field" value="' . esc_attr( $value ) . '" size="25" />';
    }
}

if ( ! function_exists( 'bhumi_save_meta_box_data' ) ) {
    function bhumi_save_meta_box_data( $post_id ) {


        if ( ! isset( $_POST['bhumi_meta_box_nonce'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['bhumi_meta_box_nonce'], 'bhumi_save_meta_box_data' ) ) {
            return;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return;
            }

        } else {

            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return;
            }
        }

        if ( ! isset( $_POST['bhumi_service_class_field'] ) ) {
            return;
        }

        $my_data = sanitize_text_field( $_POST['bhumi_service_class_field'] );

        update_post_meta( $post_id, 'service_class', $my_data );
    }
    add_action( 'save_post', 'bhumi_save_meta_box_data' );
}

if ( ! function_exists( 'bhumi_slider_callback' ) ) {
    function bhumi_slider_callback( $post ) {

        wp_nonce_field( 'bhumi_slider_save_meta_box_data', 'slider_meta_box_nonce' );

        $slider_text = get_post_meta( $post->ID, 'slider_text', true );
        $slider_link = get_post_meta( $post->ID, 'slider_link', true );

        echo '<label for="slider_text">';
        _e( 'Button 1 Text', 'bhumi' );
        echo '</label> ';
        echo '<br />';
        echo '<input type="text" id="slider_text" name="slider_text" value="' . esc_attr( $slider_text ) . '" size="25" />';
        echo '<br />';

         echo '<label for="slider_link">';
        _e( 'Button 1 Link', 'bhumi' );
        echo '</label> ';
        echo '<br />';
        echo '<input type="text" id="slider_link" name="slider_link" value="' . esc_url( $slider_link ) . '" size="25" />';

    }
}

if ( ! function_exists( 'bhumi_slider_save_meta_box_data' ) ) {
    function bhumi_slider_save_meta_box_data( $post_id ) {
        if ( ! isset( $_POST['slider_meta_box_nonce'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['slider_meta_box_nonce'], 'bhumi_slider_save_meta_box_data' ) ) {
            return;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return;
            }

        } else {

            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return;
            }
        }

        if ( ! isset( $_POST['slider_text'] ) ) {
            return;
        }
          if ( ! isset( $_POST['slider_link'] ) ) {
            return;
        }


        // Sanitize user input.
        $slider_text = sanitize_text_field( $_POST['slider_text'] );
        $slider_link = sanitize_text_field( $_POST['slider_link'] );


        // Update the meta field in the database.
        update_post_meta( $post_id, 'slider_text', $slider_text );
        update_post_meta( $post_id, 'slider_link', $slider_link );
    }
    add_action( 'save_post', 'bhumi_slider_save_meta_box_data' );
}