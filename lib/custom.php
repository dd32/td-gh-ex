<?php
/**
 * Custom functions
 */

function backyard_img_placeholder() {
  return get_template_directory_uri() . '/assets/img/placement.png';
}
function backyard_post_widget_default_placeholder() {
   return apply_filters('kadence_post_default_widget_placeholder_image', get_template_directory_uri() . '/assets/images/post-img_0000_Layer-3.jpg');
}
function backyard_post_default_placeholder() {
   return apply_filters('kadence_post_default_placeholder_image', get_template_directory_uri() . '/assets/images/pexels-photo.jpeg');
}

function backyard_post_default_placeholder_override() {
  global $backyard;
  $custom_image = $backyard['post_summery_default_image']['url'];
  return $custom_image;
}

if (isset($backyard['post_summery_default_image']) && !empty($backyard['post_summery_default_image']['url'])) {
add_filter('kadence_post_default_placeholder_image', 'backyard_post_default_placeholder_override');
add_filter('kadence_post_default_widget_placeholder_image', 'backyard_post_default_placeholder_override');
}
//User Addon
add_action( 'show_user_profile', 'backyard_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'backyard_show_extra_profile_fields' );

function backyard_show_extra_profile_fields($user) { ?>

<h3>Extra profile information</h3>

<table class="form-table">
  <tr>
    <th><label for="twitter"><?php _e('Occupation', 'backyard');?></label></th>
    <td>
      <input type="text" name="occupation" id="occupation" value="<?php echo esc_attr( get_the_author_meta( 'occupation', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Occupation.', 'backyard');?></span>
    </td>
  </tr>
  <tr>
    <th><label for="twitter">Twitter</label></th>
    <td>
      <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Twitter username.', 'backyard'); ?></span>
    </td>
  </tr>
    <tr>
    <th><label for="facebook">Facebook</label></th>
    <td>
      <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Facebook url. (be sure to include http://)', 'backyard'); ?></span>
    </td>
  </tr>
    <tr>
    <th><label for="google">Google Plus</label></th>
    <td>
      <input type="text" name="google" id="google" value="<?php echo esc_attr( get_the_author_meta( 'google', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Google Plus url. (be sure to include http://)', 'backyard'); ?></span>
    </td>
  </tr>
   <tr>
    <th><label for="youtube">YouTube</label></th>
    <td>
      <input type="text" name="youtube" id="youtube" value="<?php echo esc_attr( get_the_author_meta( 'youtube', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your YourTube url. (be sure to include http://)', 'backyard'); ?></span>
    </td>
  </tr>
    <tr>
    <th><label for="flickr">Flickr</label></th>
    <td>
      <input type="text" name="flickr" id="flickr" value="<?php echo esc_attr( get_the_author_meta( 'flickr', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Flickr url. (be sure to include http://)', 'backyard'); ?></span>
    </td>
  </tr>
    <tr>
    <th><label for="linkedin">Linkedin</label></th>
    <td>
      <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Linkedin url. (be sure to include http://)', 'backyard'); ?></span>
    </td>
  </tr>
    <tr>
    <th><label for="dribbble">Dribbble</label></th>
    <td>
      <input type="text" name="dribbble" id="dribbble" value="<?php echo esc_attr( get_the_author_meta( 'dribbble', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Dribbble url. (be sure to include http://)', 'backyard'); ?></span>
    </td>
  </tr>
    <tr>
    <th><label for="pinterest">Pinterest</label></th>
    <td>
      <input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'pinterest', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Pinterest url. (be sure to include http://)', 'backyard'); ?></span>
    </td>
  </tr>
  <tr>
    <th><label for="instagram">Instagram</label></th>
    <td>
      <input type="text" name="instagram" id="instagram" value="<?php echo esc_attr( get_the_author_meta( 'instagram', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Instagram url. (be sure to include http://)', 'backyard'); ?></span>
    </td>
  </tr>
</table>
<?php }
add_action( 'personal_options_update', 'backyard_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'backyard_save_extra_profile_fields' );

function backyard_save_extra_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
  update_user_meta( $user_id, 'occupation', $_POST['occupation'] );
  update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
  update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
  update_user_meta( $user_id, 'google', $_POST['google'] );
  update_user_meta( $user_id, 'youtube', $_POST['youtube'] );
  update_user_meta( $user_id, 'flickr', $_POST['flickr'] );
  update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
  update_user_meta( $user_id, 'dribbble', $_POST['dribbble'] );
  update_user_meta( $user_id, 'pinterest', $_POST['pinterest'] );
  update_user_meta( $user_id, 'instagram', $_POST['instagram'] );
}

?>
