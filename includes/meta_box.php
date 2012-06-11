<?php
   /**
    * This file contains several functions to create the metabox which
    * contains additional custom field for the annarita reviews.
    * These posts belong to a a custom post type created to give a better
    * formatting for reviews. Moreover the theme uses microformats to give
    * more information to the search engines.
    *
    * @author Aurelio De Rosa <aurelioderosa@gmail.com>
    * @version 1.0.1
    * @link http://wordpress.org/extend/themes/annarita
    * @package AurelioDeRosa
    * @subpackage Annarita
    * @since Annarita 1.0
    * @license http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License version 3
    */
   $annarita_review_types = array();

   function init_types()
   {
      global $annarita_review_types;

      $annarita_review_types = array(
         'product' => __('product', 'annarita'),
         'business' => __('business', 'annarita'),
         'event' => __('event', 'annarita'),
         'person' => __('person', 'annarita'),
         'place' => __('place', 'annarita'),
         'website' => __('website', 'annarita'),
         'url' => __('url', 'annarita')
      );
      asort($annarita_review_types);
   }

   function annarita_add_custom_box()
   {
      init_types();
      add_meta_box('annarita_review_meta_box', __('Review info', 'annarita'), 'annarita_add_metabox', 'annarita_review', 'normal');
   }

   function annarita_add_metabox($object, $params = null)
   {
      wp_nonce_field(basename(__FILE__), 'annarita_review_box_nonce');
      ?>
      <label for="annarita_review_type">
         <?php _e('Select the type of your review', 'annarita'); ?>
      </label>
      <br />
      <select name="annarita_review_type" id="annarita_review_type">
         <?php
            global $annarita_review_types;
            init_types();

            $old_type = sanitize_text_field(get_post_meta($object->ID, 'annarita_review_type', true));
            foreach($annarita_review_types as $key => $type)
            {
               echo '<option value="' . $key . '" ';
               if ($old_type == $key)
                  echo 'selected="selected"';
               echo ">$type</option>";
            }
         ?>
      </select>
      <br />
      <label for="annarita_review_rate">
         <?php _e('Write you rate for the reviewed item. The value must be between 1 and 5. Decimal numbers are allowed (i.e. 4.5)', 'annarita'); ?>
      </label>
      <br />
      <input type="text" name="annarita_review_rate" id="annarita_review_rate" value="<?php echo esc_attr(get_post_meta($object->ID, 'annarita_review_rate', true)); ?>" />
      <?php
   }

   function annarita_save_review_data($post_id)
   {
      if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
         return;

      if (!isset($_POST['annarita_review_box_nonce']) || !wp_verify_nonce($_POST['annarita_review_box_nonce'], basename( __FILE__ )))
         return;

      if ($_POST['post_type'] == 'annarita_review')
      {
         if (!current_user_can('edit_page', $post_id))
            return;
      }
      else
      {
         if (!current_user_can('edit_post', $post_id))
            return;
      }

      global $annarita_review_types;
      init_types();

      $type = sanitize_text_field($_POST['annarita_review_type']);
      if (!in_array($type, array_keys($annarita_review_types)))
         return;

      $rate = sanitize_text_field($_POST['annarita_review_rate']);
      if ($rate < 1 || $rate > 5)
         return;

      $old_value = sanitize_text_field(get_post_meta($post_id, 'annarita_review_type', true));
      updateValue($post_id, 'annarita_review_type', $type, $old_value);

      $old_value = sanitize_text_field(get_post_meta($post_id, 'annarita_review_rate', true));
      updateValue($post_id, 'annarita_review_rate', $rate, $old_value);
   }

   function updateValue($post_id, $key, $new_value, $old_value)
   {
      if (!empty($new_value) && empty($old_value))
         add_post_meta($post_id, $key, $new_value, true);
      else if (!empty($new_value) && $new_value != $old_value )
         update_post_meta($post_id, $key, $new_value );
      else if (empty($new_value) && !empty($old_value))
         delete_post_meta($post_id, $key, $old_value );
   }

?>