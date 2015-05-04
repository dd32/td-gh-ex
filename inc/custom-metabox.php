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
                 'accesspress_mag_post_settings', // $id
                 __( 'Post settings', 'accesspress-mag' ), // $title
                 'accesspress_mag_post_settings_callback', // $callback
                 'post', // $page
                 'normal', // $context
                 'high'); // $priority

    add_meta_box(
                 'accesspress_mag_page_settings', // $id
                 __( 'Sidebar Layout', 'accesspress-mag' ), // $title
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
            <td colspan="4"><em class="f13"><?php _e( 'Post Sidebar', 'accesspress-mag' ); ?></em></td>
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
                <td><em class="f13"><?php _e( 'You can set up the sidebar content ', 'accesspress-mag' );?> <a href="<?php echo admin_url('/themes.php?page=options-framework'); ?>"><?php _e( 'here', 'accesspress-mag' )?></a></em></td>
            </tr>
        </table>
</div>
<div class="source-section">
    <h3><?php _e( 'Article source section', 'accesspress-mag' );?></h3>
    <?php 
        $apmag_post_source_name = get_post_meta($post->ID, 'post_source_name', true);
        $apmag_post_source_url = get_post_meta($post->ID, 'post_source_url', true); 
        $apmag_post_via_name = get_post_meta($post->ID, 'post_via_name', true); 
        $apmag_post_via_url = get_post_meta($post->ID, 'post_via_url', true);  
    ?>
    <p class="single-source-field">
        <span class="field-label"><?php _e( 'Source Name :', 'accesspress-mag' );?></span>
        <input type="text" name="post_source_name" value="<?php if(!empty($apmag_post_source_name)){echo $apmag_post_source_name;}?>" />
        <span class="field-info"><?php _e( ' Name of the source', 'accesspress-mag' );?></span>
    </p>
    <p class="single-source-field">
        <span class="field-label"><?php _e( 'Source URL :', 'accesspress-mag' );?></span>
        <input type="text" name="post_source_url" value="<?php if(!empty($apmag_post_source_url)){echo $apmag_post_source_url;}?>" />
        <span class="field-info"><?php _e( ' URL of the source', 'accesspress-mag' );?></span>
    </p>
    <p class="single-source-field">
        <span class="field-label"><?php _e( 'Via Name :', 'accesspress-mag' );?></span>
        <input type="text" name="post_via_name" value="<?php if(!empty($apmag_post_via_name)){echo $apmag_post_via_name;}?>" />
    </p>
    <p class="single-source-field">
        <span class="field-label"><?php _e( 'Via Url :', 'accesspress-mag' );?></span>
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
            <td colspan="4"><em class="f13"><?php _e('Page Sidebar','accesspress-mag'); ?></em></td>
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