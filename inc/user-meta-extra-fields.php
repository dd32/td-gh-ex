<?php
    add_action( 'show_user_profile', 'axiohost_extra_user_profile_fields' );
    add_action( 'edit_user_profile', 'axiohost_extra_user_profile_fields' );
    
    function axiohost_extra_user_profile_fields( $user ) { ?>
        <h3><?php _e('Extra profile information', 'axiohost'); ?></h3>
    
        <table class="form-table">
            <tr>
                <th><label for="job-status"><?php _e('Designation', 'axiohost'); ?></label></th>
                <td>
                    <input type="text" name="job-status" id="job-status" value="<?php echo esc_attr( get_the_author_meta( 'job-status', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description"><?php _e('Please enter your designation.', 'axiohost'); ?></span>
                </td>
            </tr>
        </table>
    <?php }
    add_action( 'personal_options_update', 'axiohost_save_extra_user_profile_fields' );
    add_action( 'edit_user_profile_update', 'axiohost_save_extra_user_profile_fields' );
    
    function axiohost_save_extra_user_profile_fields( $user_id ) {
        if ( !current_user_can( 'edit_user', $user_id ) ) { 
            return false; 
        }
        update_user_meta($user_id, 'job-status', $_POST['job-status'] );
        
    }
?>