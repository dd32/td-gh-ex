<?php
/**
 * Artwork Customize Textarea class.
 *
 * @since 1.1.0
 *
 * @see WP_Customize_Header_Image_Control
 */
if (class_exists('WP_Customize_Control')) {

    class Theme_Customize_Textarea_Control extends WP_Customize_Control {

        public $type = 'textarea';

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>
            <?php
        }

    }

    class Theme_Support extends WP_Customize_Control {
      public function render_content() {
      ?>
      <label>
      <span class = "customize-control-title"><?php echo esc_html($this->label);
      ?></span>
      </label>
      <?php
      echo __("This feature is only available in <a href='http://www.getmotopress.com/themes/Tom James' target='_blank'>Pro Version</a> ",  'artwork-lite');
      }
      }
}