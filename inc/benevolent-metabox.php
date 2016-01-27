<?php
/**
 * Benevolent Meta Box
 * 
 * @package Benevolent
 */

 add_action('add_meta_boxes', 'benevolent_add_sidebar_layout_box');

function benevolent_add_sidebar_layout_box(){    
    add_meta_box(
                 'benevolent_sidebar_layout', // $id
                 __( 'Sidebar Layout', 'benevolent' ), // $title
                 'benevolent_sidebar_layout_callback', // $callback
                 'page', // $page
                 'normal', // $context
                 'high'); // $priority    
}

$benevolent_sidebar_layout = array(         
        'right-sidebar' => array(
                        'value' => 'right-sidebar',
                        'label' => __( 'Right sidebar<br/>(default)', 'benevolent' ),
                        'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png'
                    ),
        'no-sidebar' => array(
                        'value'     => 'no-sidebar',
                        'label'     => __( 'No sidebar', 'benevolent' ),
                        'thumbnail' => get_template_directory_uri() . '/images/no-sidebar.png'
                    )   

    );

function benevolent_sidebar_layout_callback(){
    global $post , $benevolent_sidebar_layout;
    wp_nonce_field( basename( __FILE__ ), 'benevolent_sidebar_layout_nonce' ); 
?>
<table class="form-table">
    <tr>
        <td colspan="4"><em class="f13"><?php esc_html_e( 'Choose Sidebar Template', 'benevolent' ); ?></em></td>
    </tr>

    <tr>
        <td>
        <?php  
            foreach ($benevolent_sidebar_layout as $benevolent_field) {  
                $benevolent_sidebar_metalayout = get_post_meta( $post->ID, 'benevolent_sidebar_layout', true ); ?>

            <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
                <label class="description">
                    <span><img src="<?php echo esc_url( $benevolent_field['thumbnail'] ); ?>" alt="" /></span><br/>
                    <input type="radio" name="benevolent_sidebar_layout" value="<?php echo $benevolent_field['value']; ?>" <?php checked( $benevolent_field['value'], $benevolent_sidebar_metalayout ); if(empty($benevolent_sidebar_metalayout) && $benevolent_field['value']=='right-sidebar'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo $benevolent_field['label']; ?>
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
function benevolent_save_sidebar_layout( $benevolent_post_id ) { 
    global $benevolent_sidebar_layout, $post; 

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'benevolent_sidebar_layout_nonce' ] ) || !wp_verify_nonce( $_POST[ 'benevolent_sidebar_layout_nonce' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;
        
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $benevolent_post_id ) )  
            return $benevolent_post_id;  
    } elseif (!current_user_can( 'edit_post', $benevolent_post_id ) ) {  
            return $benevolent_post_id;  
    }  
    

    foreach ($benevolent_sidebar_layout as $benevolent_field) {  
        //Execute this saving function
        $benevolent_old = get_post_meta( $benevolent_post_id, 'benevolent_sidebar_layout', true); 
        $benevolent_new = sanitize_text_field( $_POST['benevolent_sidebar_layout'] );
        if ( $benevolent_new && $benevolent_new != $benevolent_old ) {  
            update_post_meta( $benevolent_post_id, 'benevolent_sidebar_layout', $benevolent_new );  
        } elseif ( '' == $benevolent_new && $benevolent_old ) {  
            delete_post_meta( $benevolent_post_id,'benevolent_sidebar_layout', $benevolent_old );  
        }  
     } // end foreach   
     
}
add_action('save_post', 'benevolent_save_sidebar_layout'); 