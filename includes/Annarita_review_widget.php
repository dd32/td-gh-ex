<?php
/**
 * The class used to create the widget to display the annarita reviews.
 * These posts belong to a a custom post type created to give a better
 * formatting for reviews. Moreover the theme uses microformats to give
 * more information to the search engines.
 *
 * @author Aurelio De Rosa <aurelioderosa@gmail.com>
 * @version 1.0.4
 * @link http://wordpress.org/extend/themes/annarita
 * @package AurelioDeRosa
 * @subpackage Annarita
 * @since Annarita 1.0
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License version 3
 */
class Annarita_review_widget extends WP_Widget
{

   public function __construct()
   {
      parent::__construct(
              'annarita_review_widget',
              'Annarita reviews',
              array('description' => __('This widget lets you to show your own reviews with the related image if provided', 'annarita'))
      );
   }

   public function form($instance)
   {
      $title = isset($instance['title']) ? $instance['title'] : __('Reviews', 'annarita');
      $number = isset($instance['number']) ? $instance['number'] : 5;
      ?>
      <p>
         <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'annarita' ); ?>:</label>
         <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
      </p>

      <p>
         <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of reviews to show', 'annarita'); ?>:</label>
         <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
      </p>
      <?php
   }

   public function update($new_instance, $old_instance)
   {
      $instance = array();
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['number'] = (int)$new_instance['number'];

      return $instance;
   }

   public function widget($args, $instance)
   {
      extract($args);
      $title = apply_filters('widget_title', $instance['title']);
      $number = (int)$instance['number'];


      $query = new WP_Query(array(
          'posts_per_page' => $number,
          'no_found_rows' => true,
          'post_status' => 'publish',
          'ignore_sticky_posts' => true,
          'post_type' => 'annarita_review'
      ));

      if ($query->have_posts())
      {
         echo $before_widget;
         if (!empty($title))
            echo $before_title . $title . $after_title;
         echo '<ul>';
            while ($query->have_posts())
            {
               $query->the_post();
               ?>
               <li>
                  <?php
                  if (has_post_thumbnail())
                  {
                     ?>
                     <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail('thumbnail', array('class' => 'aligncenter annarita-review-widget-thumbnail')); ?>
                     </a>
                     <?php
                  }
                  ?>
                  <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(array('before' => __('Permalink to: ', 'annarita'))); ?>">
                     <?php the_title(); ?>
                  </a>
               </li>
               <?php
            }
         echo '</ul>';
         echo $after_widget;

         wp_reset_postdata();
      }
   }

}

register_widget('Annarita_review_widget');
?>
