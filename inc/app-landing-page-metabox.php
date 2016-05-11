<?php
/**
 * Restaurant and Cafe Meta Box
 * 
 * @package App_Landing_Page
 */

 add_action('add_meta_boxes', 'app_landing_page_add_sidebar_layout_box');

function app_landing_page_add_sidebar_layout_box(){    
    add_meta_box(
                 'app_landing_page_sidebar_layout', // $id
                 __( 'Sidebar Layout', 'app-landing-page' ), // $title
                 'app_landing_page_sidebar_layout_callback', // $callback
                 'page', // $page
                 'normal', // $context
                 'high'); // $priority    
}

$app_landing_page_sidebar_layout = array(         
        'right-sidebar' => array(
                        'value' => 'right-sidebar',
                        'label' => __( 'Right sidebar<br/>(default)', 'app-landing-page' ),
                        'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png'
                    ),
        'no-sidebar' => array(
                        'value'     => 'no-sidebar',
                        'label'     => __( 'No sidebar', 'app-landing-page' ),
                        'thumbnail' => get_template_directory_uri() . '/images/no-sidebar.png'
                    )   
    );

function app_landing_page_sidebar_layout_callback(){
    global $post , $app_landing_page_sidebar_layout;
    wp_nonce_field( basename( __FILE__ ), 'app_landing_page_sidebar_layout_nonce' ); 
?>
<table class="form-table">
    <tr>
        <td colspan="4"><em class="f13"><?php esc_html_e( 'Choose Sidebar Template', 'app-landing-page' ); ?></em></td>
    </tr>

    <tr>
        <td>
        <?php  
            foreach ($app_landing_page_sidebar_layout as $app_landing_page_field) {  
                $app_landing_page_sidebar_metalayout = get_post_meta( $post->ID, 'app_landing_page_sidebar_layout', true ); ?>

            <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
                <label class="description">
                    <span><img src="<?php echo esc_url( $app_landing_page_field['thumbnail'] ); ?>" alt="" /></span><br/>
                    <input type="radio" name="app_landing_page_sidebar_layout" value="<?php echo $app_landing_page_field['value']; ?>" <?php checked( $app_landing_page_field['value'], $app_landing_page_sidebar_metalayout ); if(empty($app_landing_page_sidebar_metalayout) && $app_landing_page_field['value']=='right-sidebar'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo $app_landing_page_field['label']; ?>
                </label>
            </div>
            <?php } // end foreach 
            ?>
            <div class="clear"></div>
        </td>
    </tr>
</table>
<?php        
}

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function app_landing_page_save_sidebar_layout( $app_landing_page_post_id ) { 
    global $app_landing_page_sidebar_layout, $post; 

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'app_landing_page_sidebar_layout_nonce' ] ) || !wp_verify_nonce( $_POST[ 'app_landing_page_sidebar_layout_nonce' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;
        
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $app_landing_page_post_id ) )  
            return $app_landing_page_post_id;  
    } elseif (!current_user_can( 'edit_post', $app_landing_page_post_id ) ) {  
            return $app_landing_page_post_id;  
    }  
    

    foreach ($app_landing_page_sidebar_layout as $app_landing_page_field) {  
        //Execute this saving function
        $app_landing_page_old = get_post_meta( $app_landing_page_post_id, 'app_landing_page_sidebar_layout', true); 
        $app_landing_page_new = sanitize_text_field( $_POST['app_landing_page_sidebar_layout'] );
        if ( $app_landing_page_new && $app_landing_page_new != $app_landing_page_old ) {  
            update_post_meta( $app_landing_page_post_id, 'app_landing_page_sidebar_layout', $app_landing_page_new );  
        } elseif ( '' == $app_landing_page_new && $app_landing_page_old ) {  
            delete_post_meta( $app_landing_page_post_id,'app_landing_page_sidebar_layout', $app_landing_page_old );  
        }  
     } // end foreach   
     
}
add_action('save_post', 'app_landing_page_save_sidebar_layout'); 

