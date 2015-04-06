<?php
/**
 * AccessPress Mag Theme Options
 *
 * @package Accesspress Mag
 */
 
add_action('add_meta_boxes', 'accesspress_mag_add_sidebar_layout_box'); 
 
function accesspress_mag_add_sidebar_layout_box()
{
                 
    add_meta_box(
                 'accesspress_mag_product_review', // $id
                 'Product review', // $title
                 'accesspress_mag_product_review_callback', // $callback
                 'post', // $page
                 'normal', // $context
                 'high'); // $priority
    
    add_meta_box(
                 'accesspress_mag_post_settings', // $id
                 'Post settings', // $title
                 'accesspress_mag_post_settings_callback', // $callback
                 'post', // $page
                 'normal', // $context
                 'high'); // $priority

    add_meta_box(
                 'accesspress_mag_page_settings', // $id
                 'Sidebar Layout', // $title
                 'accesspress_mag_page_settings_callback', // $callback
                 'page', // $page
                 'normal', // $context
                 'high'); // $priority
 
}

$accesspress_mag_sidebar_layout = array(
        'global-sidebar' => array(
                        'value'     => 'global-sidebar',
                        'label'     => __( 'Theme option sidebar', 'accesspress-mag' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/theme-option-sidebar.png'
                    ), 
        'left-sidebar' => array(
                        'value'     => 'left-sidebar',
                        'label'     => __( 'Left sidebar', 'accesspress-mag' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/left-sidebar.png'
                    ), 
        'right-sidebar' => array(
                        'value' => 'right-sidebar',
                        'label' => __( 'Right sidebar<br/>(default)', 'accesspress-mag' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/right-sidebar.png'
                    ),
       
        'no-sidebar' => array(
                        'value'     => 'no-sidebar',
                        'label'     => __( 'No sidebar', 'accesspress-mag' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/no-sidebar.png'
                    )   

    );

$accesspress_mag_page_sidebar_layout = array(
        'left-sidebar' => array(
                        'value'     => 'left-sidebar',
                        'label'     => __( 'Left sidebar', 'accesspress-mag' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/left-sidebar.png'
                    ), 
        'right-sidebar' => array(
                        'value' => 'right-sidebar',
                        'label' => __( 'Right sidebar<br/>(default)', 'accesspress-mag' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/right-sidebar.png'
                    ),
       
        'no-sidebar' => array(
                        'value'     => 'no-sidebar',
                        'label'     => __( 'No sidebar', 'accesspress-mag' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/no-sidebar.png'
                    )   

    );

$accesspress_mag_post_template_layout = array(
        'global-template' => array(
                        'value'     => 'global-template',
                        'label'     => __( 'Theme option Template', 'accesspress-mag' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/post_template/post-templates-icons-theme.png',
                        'available'=> 'free'
                    ),
        'default-template' => array(
                        'value'     => 'default-template',
                        'label'     => __( 'Default Template', 'accesspress-mag' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/post_template/post-templates-icons-0.png',
                        'available'=> 'free'
                    ), 
        'style1-template' => array(
                        'value' => 'style1-template',
                        'label' => __( 'Style 1', 'accesspress-mag' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/post_template/post-templates-icons-1.png',
                        'available'=> 'free'
                    ),
        'style2-template' => array(
                        'value' => 'style2-template',
                        'label' => __( 'Style 2', 'accesspress-mag' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/post_template/post-templates-icons-2.png',
                        'available'=> 'pro'
                    ),
        'style3-template' => array(
                        'value' => 'style3-template',
                        'label' => __( 'Style 3', 'accesspress-mag' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/post_template/post-templates-icons-3.png',
                        'available'=> 'pro'
                    ),
        'style4-template' => array(
                        'value' => 'style4-template',
                        'label' => __( 'Style 4', 'accesspress-mag' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/post_template/post-templates-icons-4.png',
                        'available'=> 'pro'
                    ),
        'style5-template' => array(
                        'value' => 'style5-template',
                        'label' => __( 'Style 5', 'accesspress-mag' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/post_template/post-templates-icons-5.png',
                        'available'=> 'pro'
                    )  

    );
/*---------Function for Product Review meta box----------------------------*/

function accesspress_mag_product_review_callback()
{
    global $post ;
    wp_nonce_field( basename( __FILE__ ), 'accesspress_mag_product_review_nonce' );
?>
<div class="my_meta_control td-not-portfolio td-not-home">
<?php
        $apmag_review_option = get_post_meta($post->ID, 'product_review_option', true); 
        $product_rating = get_post_meta($post->ID, 'product_rating', true);
        $review_count = get_post_meta($post->ID, 'review_count', true);
        $apmag_rate_description = get_post_meta($post->ID, 'product_rate_description', true);
    ?>

    <p class="apmag_help_section apmag-help-select">
        <span class="apmag_custom_label"><?php _e( 'Is product review? :','accesspress-mag' );?></span>        

        <div class="apmag-select-review-option">
            <select id="reviewSelector" name="product_review_option" class="apmag-panel-dropdown">
                <option value="norate" <?php selected( $apmag_review_option, 'norate' ); ?>><?php _e( 'No', 'accesspress-mag' ); ?></option>
                <option value="rate_stars" <?php selected( $apmag_review_option, 'rate_stars' ); ?>><?php _e( 'Stars', 'accesspress-mag' ); ?></option>
            </select>
        </div>
    </p>
    
    <div class="rating_type rate_Stars">
        <div><strong><?php _e( 'Add star ratings for this product:', 'accesspress-mag' );?></strong></div>
        <div class="product_reivew_section apmag-not-home">
            <?php 
            $count = 0;
            if(!empty($product_rating)){
            foreach ($product_rating as $key => $value) {
                $count++;
            ?>

            <div class="review_section_group">               
                <span class="apmag_custom_label"><?php _e( 'Feature Name:', 'accesspress-mag' );?></span>
                <input style="width: 200px;" type="text" name="product_ratings[<?php echo $count; ?>][feature_name]" value="<?php echo $value['feature_name']; ?>"/>
                <select name="product_ratings[<?php echo $count; ?>][feature_star]">
                    <option value=""><?php _e( 'Select rating', 'accesspress-mag' );?></option>
                    <option value="5"<?php selected( $value['feature_star'], 5 ); ?>><?php _e( '5 stars', 'accesspress-mag' );?></option>
                    <option value="4.5"<?php selected( $value['feature_star'], 4.5 ); ?>><?php _e( '4.5 stars', 'accesspress-mag' );?></option>
                    <option value="4"<?php selected( $value['feature_star'], 4 ); ?>><?php _e( '4 stars', 'accesspress-mag' );?></option>
                    <option value="3.5"<?php selected( $value['feature_star'], 3.5 ); ?>><?php _e( '3.5 stars', 'accesspress-mag' );?></option>
                    <option value="3"<?php selected( $value['feature_star'], 3 ); ?>><?php _e( '3 stars', 'accesspress-mag' );?></option>
                    <option value="2.5"<?php selected( $value['feature_star'], 2.5 ); ?>><?php _e( '2.5 stars', 'accesspress-mag' );?></option>
                    <option value="2"<?php selected( $value['feature_star'], 2 ); ?>><?php _e( '2 stars', 'accesspress-mag' );?></option>
                    <option value="1.5"<?php selected( $value['feature_star'], 1.5 ); ?>><?php _e( '1.5 stars', 'accesspress-mag' );?></option>
                    <option value="1"<?php selected( $value['feature_star'], 1 ); ?>><?php _e( '1 star', 'accesspress-mag' );?></option>
                    <option value="0.5"<?php selected( $value['feature_star'], 0.5 ); ?>><?php _e( '0.5 star', 'accesspress-mag' );?></option>
                </select>
                <a href="javascript:void(0)" class="delete-review-stars button">Delete</a>
            </div> 

            <?php
            } 
            }
            ?>           
        </div>
        <input id="post_review_count" type="hidden" name="review_count" value="<?php echo $count; ?>">
        <a href="javascript:void(0)" class="docopy-revirew-stars button"><?php _e( 'Add rating category', 'accesspress-mag' );?></a>
    </div>
    <div class="review_desc">
        <div><strong><?php _e( 'Review description:', 'accesspress-mag' );?></strong></div>
        <p class="apmag_help_section">
            <textarea style="width: 500px; height: 100px;" type="text" name="product_rate_description"><?php if(!empty($apmag_rate_description)){echo $apmag_rate_description;} ?></textarea>
        </p>
    </div>

</div>
<?php     
}

/*-------------------Function for Post settings meta box----------------------------*/

function accesspress_mag_post_settings_callback()
{
    global $post, $accesspress_mag_post_template_layout, $accesspress_mag_sidebar_layout ;
    wp_nonce_field( basename( __FILE__ ), 'accesspress_mag_post_settings_nonce' );
?>

<div class="my_post_settings">
        <table class="form-table">
            <tr>
            <td colspan="4"><em class="f13"><?php _e( 'Post template:', 'accesspress-mag' )?></em></td>
            </tr>
            
            <tr>
            <td>
            <?php  
               foreach ($accesspress_mag_post_template_layout as $field) {  
                            $accesspress_mag_post_template_metalayout = get_post_meta( $post->ID, 'accesspress_mag_post_template_layout', true );?>
                                            
                            <div class="radio-post-template-wrapper" available="<?php echo $field['available'];?>" style="float:left; margin-right:30px;">
                            <label class="description">
                            <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
                            <input type="radio" name="accesspress_mag_post_template_layout" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $accesspress_mag_post_template_metalayout ); if(empty($accesspress_mag_post_template_metalayout) && $field['value']=='global-template'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo $field['label']; ?>
                            </label>
                            </div>
                            <?php } // end foreach 
                            ?>
                            <span class="pro-tmp-msg" style="display: none;"><?php _e( 'Template available in pro version', 'accesspress-mag' );?></span>
                            <div class="clear"></div>
            </td>
            </tr>
            
        </table>
        
        <table class="form-table">
            <tr>
            <td colspan="4"><em class="f13"><?php _e('Choose Sidebar Template','accesspress-mag'); ?></em></td>
            </tr>
            
            <tr>
            <td>
            <?php  
               foreach ($accesspress_mag_sidebar_layout as $field) {  
                            $accesspress_mag_sidebar_metalayout = get_post_meta( $post->ID, 'accesspress_mag_sidebar_layout', true ); ?>
            
                            <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
                            <label class="description">
                            <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
                            <input type="radio" name="accesspress_mag_sidebar_layout" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $accesspress_mag_sidebar_metalayout ); if(empty($accesspress_mag_sidebar_metalayout) && $field['value']=='global-sidebar'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo $field['label']; ?>
                            </label>
                            </div>
                            <?php } // end foreach 
                            ?>
                            <div class="clear"></div>
            </td>
            </tr>
            <tr>
                <td><em class="f13">You can set up the sidebar content <a href="<?php echo admin_url('/themes.php?page=options-framework'); ?>">here</a></em></td>
            </tr>
        </table>
</div>
<div class="source-section">
    <?php 
        $apmag_post_source_name = get_post_meta($post->ID, 'post_source_name', true);
        $apmag_post_source_url = get_post_meta($post->ID, 'post_source_url', true); 
        $apmag_post_via_name = get_post_meta($post->ID, 'post_via_name', true); 
        $apmag_post_via_url = get_post_meta($post->ID, 'post_via_url', true);  
    ?>
    <p class="single-source-field">
        <span class="field-label">Source Name: </span>
        <input type="text" name="post_source_name" value="<?php if(!empty($apmag_post_source_name)){echo $apmag_post_source_name;}?>" />
        <span class="field-info">- name of the source</span>
    </p>
    <p class="single-source-field">
        <span class="field-label">Source Url: </span>
        <input type="text" name="post_source_url" value="<?php if(!empty($apmag_post_source_url)){echo $apmag_post_source_url;}?>" />
        <span class="field-info">- url of the source</span>
    </p>
    <p class="single-source-field">
        <span class="field-label">Via Name: </span>
        <input type="text" name="post_via_name" value="<?php if(!empty($apmag_post_via_name)){echo $apmag_post_via_name;}?>" />
    </p>
    <p class="single-source-field">
        <span class="field-label">Via Url: </span>
        <input type="text" name="post_via_url" value="<?php if(!empty($apmag_post_via_url)){echo $apmag_post_via_url;}?>" />
    </p>
    
</div>

<?php
}

/*---------Function for Page sidebar meta box----------------------------*/

function accesspress_mag_page_settings_callback()
{
    global $post, $accesspress_mag_page_sidebar_layout ;
    wp_nonce_field( basename( __FILE__ ), 'accesspress_mag_page_settings_nonce' );
?>
        <table class="form-table">
            <tr>
            <td colspan="4"><em class="f13"><?php _e('Choose Sidebar Template','accesspress-mag'); ?></em></td>
            </tr>
            
            <tr>
            <td>
            <?php  
               foreach ($accesspress_mag_page_sidebar_layout as $field) {  
                            $accesspress_mag_page_sidebar_metalayout = get_post_meta( $post->ID, 'accesspress_mag_page_sidebar_layout', true ); ?>
            
                            <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
                            <label class="description">
                            <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
                            <input type="radio" name="accesspress_mag_page_sidebar_layout" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $accesspress_mag_page_sidebar_metalayout ); if(empty($accesspress_mag_page_sidebar_metalayout) && $field['value']=='right-sidebar'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo $field['label']; ?>
                            </label>
                            </div>
                            <?php } // end foreach 
                            ?>
                            <div class="clear"></div>
            </td>
            </tr>
            <tr>
                <td><em class="f13">You can set up the sidebar content <a href="<?php echo admin_url('/themes.php?page=options-framework'); ?>">here</a></em></td>
            </tr>
        </table>

<?php
}

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */

/*--------------------Save function for product review-------------------------*/

function accesspress_mag_save_product_review( $post_id ) { 
    global  $post;
    
    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'accesspress_mag_product_review_nonce' ] ) || !wp_verify_nonce( $_POST[ 'accesspress_mag_product_review_nonce' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;
        
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    } 
    
    //Execute this saving function
    $apmag_allowed_textarea = array(
                                'a' => array(
                                    'href' => array(),
                                    'title' => array()
                                ),
                                'br' => array(),
                                'em' => array(),
                                'strong' => array(),
                            );
    $post_review_option = get_post_meta($post->ID, 'product_review_option', true); 
    $post_feature_rate_name = get_post_meta($post->ID, 'product_rating_feature_name', true);
    $product_rating = get_post_meta($post->ID, 'product_rating', true);
    $post_star_rate_value = get_post_meta($post->ID, 'product_rate_value', true);
    $post_rate_description = get_post_meta($post->ID, 'product_rate_description', true);
    $review_count = get_post_meta($post->ID, 'review_count', true);
    
    $stz_product_rating = $_POST['product_ratings'];
    //var_dump($stz_product_rating); die();
    $stz_review_option = sanitize_text_field($_POST['product_review_option']);
    $stz_feature_rate_name = sanitize_text_field($_POST['product_rating_feature_name']);
    $stz_star_rate_value = floatval($_POST['product_rate_value']);
    $stz_rate_description = wp_kses($_POST['product_rate_description'],$apmag_allowed_textarea);
    $stz_review_count = sanitize_text_field($_POST['review_count']);
    
        //if ( $product_rating && '' == $product_rating ){
        //    add_post_meta( $post_id, 'product_rating', $stz_product_rating );
        //}elseif ($product_rating && $stz_product_rating != $product_rating) {  
            update_post_meta($post_id, 'product_rating', $stz_product_rating);  
        //} elseif ('' == $stz_product_rating && $product_rating) {  
        //delete_post_meta($post_id,'product_rating');  
        //}

        if ( $stz_review_count && '' == $stz_review_count ){
            add_post_meta( $post_id, 'review_count', $stz_review_count );
        }elseif ($stz_review_count && $stz_review_count != $review_count) {  
            update_post_meta($post_id, 'review_count', $stz_review_count);  
        } elseif ('' == $stz_review_count && $review_count) {  
            delete_post_meta($post_id,'review_count');  
        }

        //update data for Review Option 
        if ( $stz_review_option && '' == $stz_review_option ){
            add_post_meta( $post_id, 'product_review_option', $stz_review_option );
        }elseif ($stz_review_option && $stz_review_option != $post_review_option) {  
            update_post_meta($post_id, 'product_review_option', $stz_review_option);  
        } elseif ('' == $stz_review_option && $post_review_option) {  
            delete_post_meta($post_id,'product_review_option', $post_review_option);  
        }
        
        //update data for Feature name
        if ( $stz_feature_rate_name && '' == $stz_feature_rate_name ){
            add_post_meta( $post_id, 'product_rating_feature_name', $stz_feature_rate_name );
        }elseif ($stz_feature_rate_name && $stz_feature_rate_name != $post_feature_rate_name) {  
            update_post_meta($post_id, 'product_rating_feature_name', $stz_feature_rate_name);  
        } elseif ('' == $stz_feature_rate_name && $post_feature_rate_name) {  
            delete_post_meta($post_id,'product_rating_feature_name', $post_feature_rate_name);  
        }
        
        //update data for Rating stars
        if ( $stz_star_rate_value && '' == $stz_star_rate_value ){
            add_post_meta( $post_id, 'product_rate_value', $stz_star_rate_value );
        }elseif ($stz_star_rate_value && $stz_star_rate_value != $post_star_rate_value) {  
            update_post_meta($post_id, 'product_rate_value', $stz_star_rate_value);  
        } elseif ('' == $stz_star_rate_value && $post_star_rate_value) {  
            delete_post_meta($post_id,'product_rate_value', $post_star_rate_value);  
        }
        
        //update data for Reveiw descriptions
        if ( $stz_rate_description && '' == $stz_rate_description ){
            add_post_meta( $post_id, 'product_rate_description', $stz_rate_description );
        }elseif ($stz_rate_description && $stz_rate_description != $post_rate_description) {  
            update_post_meta($post_id, 'product_rate_description', $stz_rate_description);  
        } elseif ('' == $stz_rate_description && $post_rate_description) {  
            delete_post_meta($post_id,'product_rate_description', $post_rate_description);  
        }
    }
add_action('save_post', 'accesspress_mag_save_product_review');

/*-------------------Save function for Post Setting-------------------------*/

function accesspress_mag_save_post_settings( $post_id ) { 
    global $accesspress_mag_post_template_layout, $accesspress_mag_sidebar_layout, $post; 

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'accesspress_mag_post_settings_nonce' ] ) || !wp_verify_nonce( $_POST[ 'accesspress_mag_post_settings_nonce' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;
        
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }
    
    foreach ($accesspress_mag_post_template_layout as $field) {  
        //Execute this saving function
        $old = get_post_meta( $post_id, 'accesspress_mag_post_template_layout', true); 
        $new = sanitize_text_field($_POST['accesspress_mag_post_template_layout']);
        if ($new && $new != $old) {  
            update_post_meta($post_id, 'accesspress_mag_post_template_layout', $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id,'accesspress_mag_post_template_layout', $old);  
        }
     } // end foreach  
     
   foreach ($accesspress_mag_sidebar_layout as $field) {  
        //Execute this saving function
        $old = get_post_meta( $post_id, 'accesspress_mag_sidebar_layout', true); 
        $new = sanitize_text_field($_POST['accesspress_mag_sidebar_layout']);
        if ($new && $new != $old) {  
            update_post_meta($post_id, 'accesspress_mag_sidebar_layout', $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id,'accesspress_mag_sidebar_layout', $old);  
        }
     } // end foreach   
     
       $post_source_name = get_post_meta($post->ID, 'post_source_name', true);
       $post_source_url = get_post_meta($post->ID, 'post_source_url', true); 
       $post_via_name = get_post_meta($post->ID, 'post_via_name', true); 
       $post_via_url = get_post_meta($post->ID, 'post_via_url', true); 
       $stz_source_name = sanitize_text_field($_POST['post_source_name']);  
       $stz_source_url = esc_url($_POST['post_source_url']);
       $stz_via_name = sanitize_text_field($_POST['post_via_name']);
       $stz_via_url = esc_url($_POST['post_via_url']); 
   
   //update data for source name
        if ( $stz_source_name && '' == $stz_source_name ){
            add_post_meta( $post_id, 'post_source_name', $stz_source_name );
        }elseif ($stz_source_name && $stz_source_name != $post_source_name) {  
            update_post_meta($post_id, 'post_source_name', $stz_source_name);  
        } elseif ('' == $stz_source_name && $post_source_name) {  
            delete_post_meta($post_id,'post_source_name', $post_source_name);  
        }
   //update data for source url
        if ( $stz_source_url && '' == $stz_source_url ){
            add_post_meta( $post_id, 'post_source_url', $stz_source_url );
        }elseif ($stz_source_url && $stz_source_url != $post_source_url) {  
            update_post_meta($post_id, 'post_source_url', $stz_source_url);  
        } elseif ('' == $stz_source_url && $post_source_url) {  
            delete_post_meta($post_id,'post_source_url', $post_source_url);  
        }
    //update data for via name
        if ( $stz_via_name && '' == $stz_via_name ){
            add_post_meta( $post_id, 'post_via_name', $stz_via_name );
        }elseif ($stz_via_name && $stz_via_name != $post_via_name) {  
            update_post_meta($post_id, 'post_via_name', $stz_via_name);  
        } elseif ('' == $stz_via_name && $post_via_name) {  
            delete_post_meta($post_id,'post_via_name', $post_via_name);  
        }
   //update data for via url
        if ( $stz_via_url && '' == $stz_via_url ){
            add_post_meta( $post_id, 'post_via_url', $stz_via_url );
        }elseif ($stz_via_url && $stz_via_url != $post_via_url) {  
            update_post_meta($post_id, 'post_via_url', $stz_via_url);  
        } elseif ('' == $stz_via_url && $post_via_url) {  
            delete_post_meta($post_id,'post_via_url', $post_via_url);  
        }
}
add_action('save_post', 'accesspress_mag_save_post_settings');

/*-------------------Save function for Page Setting-------------------------*/

function accesspress_mag_save_page_settings( $post_id ) { 
    global $accesspress_mag_sidebar_layout, $post; 

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'accesspress_mag_page_settings_nonce' ] ) || !wp_verify_nonce( $_POST[ 'accesspress_mag_page_settings_nonce' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;
        
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }
    
    foreach ($accesspress_mag_sidebar_layout as $field) {  
        //Execute this saving function
        $old = get_post_meta( $post_id, 'accesspress_mag_page_sidebar_layout', true); 
        $new = sanitize_text_field($_POST['accesspress_mag_page_sidebar_layout']);
        if ($new && $new != $old) {  
            update_post_meta($post_id, 'accesspress_mag_page_sidebar_layout', $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id,'accesspress_mag_page_sidebar_layout', $old);  
        } 
     } // end foreach 
    
}
add_action('save_post', 'accesspress_mag_save_page_settings');
?>