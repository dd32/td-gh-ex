<?php
    require_once dirname(__FILE__) . "/../template-tags.php";
    require_once dirname(__FILE__) . "/../news-layouts.php";

    class Bee_News_RightSidebar extends WP_Widget
    {

        // Set up the widget name and description.
        public function __construct()
        {
            $widget_options = array('classname' => 'news', 'description' => 'Custom Bee News Right Side Bar');
            parent::__construct('bee_news_layout_right_sidebar_widget', 'Bee News Layout Right Sidebar', $widget_options);
        }

        // Create the widget output.
        public function widget($args, $instance)
        {
            $title = apply_filters('widget_title', $instance['title']);
            $cat_id = apply_filters('widget_title', $instance['cat_id']);
            global $post;

        ?>

    <?php bee_news_newslider(array('cat_id' => $cat_id));?>

    <?php

            }

            // Create the admin area widget settings form.
            public function form($instance)
            {
                $title = !empty($instance['title']) ? $instance['title'] : '';
                $cat_id = !empty($instance['cat_id']) ? $instance['cat_id'] : '';
                $categories = get_terms('category', 'orderby=count&hide_empty=0');

            ?>

    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
      <input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" />
    </p>


    <p>
      <label for="<?php echo $this->get_field_id('cat_id'); ?>">News Category:</label>
      <select id="<?php echo $this->get_field_id('cat_id'); ?>" name="<?php echo $this->get_field_name('cat_id'); ?>">
        <?php foreach ($categories as $category): ?>
        <option<?php echo ($cat_id == $category->term_id) ? 'selected' : '' ?> value="<?php echo $category->term_id ?>"><?php echo $category->name ?></option>
        <?php endforeach;?>
      </select>

    </p>

  <?php
      }

          // Apply settings to the widget instance.
          public function update($new_instance, $old_instance)
          {
              $instance = $old_instance;
              $instance['title'] = strip_tags($new_instance['title']);
              $instance['cat_id'] = strip_tags($new_instance['cat_id']);
              return $instance;
          }

      }

      // Register the widget.
      function bee_news_right_sidebar_register__widget()
      {
          register_widget('Bee_News_RightSidebar');
      }
      add_action('widgets_init', 'bee_news_right_sidebar_register__widget');

  ?>