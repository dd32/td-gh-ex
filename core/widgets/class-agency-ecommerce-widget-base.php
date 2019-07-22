<?php
if (!class_exists('Agency_Ecommerce_Widget_Base')) {

    abstract class Agency_Ecommerce_Widget_Base extends WP_Widget
    {
        public function __construct($id_base, $name, $widget_options = array(), $control_options = array())
        {

            parent::__construct(
                $id_base,
                $name,
                $widget_options,
                $control_options
            );
        }

        abstract function widget_fields();


        public function form($instance)
        {
            $widget_fields = $this->widget_fields();

            $field_default = array(
                'name' => '',
                'title' => '',
                'type' => 'text',

            );

            $extra_attributes = array();

            // Loop through fields
            foreach ($widget_fields as $field_key => $field) {

                if (!isset($field['name']) || !isset($field['type'])) {
                    continue;
                }
                if ($field_key != $field['name']) {
                    continue;
                }
                $field = wp_parse_args($field, $field_default);

                $value = isset($instance[$field_key]) ? $instance[$field_key] : ((isset($field['default']) && $field['type'] != 'checkbox') ? $field['default'] : '');

                $extra_attributes = isset($field['extra_attributes']) ? $field['extra_attributes'] : array();

                $extra_attribute_text = $this->get_extra_attribute_text($extra_attributes);

                switch ($field['type']) {
                    case "title":
                        ?>
                        <p>
                            <label
                                    for="<?php echo esc_attr($this->get_field_id($field_key)); ?>"><?php echo esc_html($field['title']); ?>
                            </label>

                            <?php $this->description($field) ?>
                        </p>
                        <?php
                        break;
                    case "text":
                    case "number":
                    case "email":
                        ?>
                        <p>
                            <label
                                    for="<?php echo esc_attr($this->get_field_id($field_key)); ?>"><?php echo esc_html($field['title']); ?>
                                :</label>
                            <input class="widefat"
                                   id="<?php echo esc_attr($this->get_field_id($field_key)); ?>"
                                   name="<?php echo esc_attr($this->get_field_name($field_key)); ?>"
                                   type="<?php echo esc_attr($field['type']); ?>"
                                   value="<?php echo esc_attr($value); ?>" <?php echo $extra_attribute_text; ?>/>

                            <?php $this->description($field) ?>
                        </p>
                        <?php
                        break;
                    case "color":
                        ?>
                        <p>
                            <label
                                    for="<?php echo esc_attr($this->get_field_id($field_key)); ?>"><?php echo esc_html($field['title']); ?>
                                :</label>
                            <input class="widefat color-picker"
                                   id="<?php echo esc_attr($this->get_field_id($field_key)); ?>"
                                   name="<?php echo esc_attr($this->get_field_name($field_key)); ?>"
                                   type="<?php echo esc_attr($field['type']); ?>"
                                   value="<?php echo esc_attr($value); ?>" <?php echo $extra_attribute_text; ?>
                                <?php echo isset($field['default']) ? 'data-default-color="' . esc_attr($field['default']) . '" ' : ''; ?>/>

                            <?php $this->description($field) ?>
                        </p>
                        <?php
                        break;
                    case "checkbox":
                        ?>
                        <p>
                            <label
                                    for="<?php echo esc_attr($this->get_field_id($field_key)); ?>"><?php echo esc_html($field['title']); ?>
                                :</label>
                            <input class="widefat"
                                   id="<?php echo esc_attr($this->get_field_id($field_key)); ?>"
                                   name="<?php echo esc_attr($this->get_field_name($field_key)); ?>"
                                   type="checkbox"
                                   value="1" <?php echo (boolean)$value ? 'checked="checked"' : '';
                            echo $extra_attribute_text; ?>/>

                            <?php $this->description($field) ?>
                        </p>
                        <?php
                        break;
                    case "textarea":
                        ?>
                        <p>
                            <label
                                    for="<?php echo esc_attr($this->get_field_id($field_key)); ?>"><?php echo esc_html($field['title']); ?>
                                :</label>
                            <textarea class="widefat"
                                      id="<?php echo esc_attr($this->get_field_id($field_key)); ?>"
                                      name="<?php echo esc_attr($this->get_field_name($field_key)); ?>"
                                <?php echo $extra_attribute_text; ?>

                            ><?php echo esc_html($value); ?></textarea>

                            <?php $this->description($field) ?>
                        </p>
                        <?php
                        break;
                    case "select":
                        ?>
                        <p>
                            <label
                                    for="<?php echo esc_attr($this->get_field_id($field_key)); ?>"><?php echo esc_html($field['title']); ?>
                                :</label>
                            <?php
                            $options = isset($field['options']) ? $field['options'] : array();
                            $is_multi_select = isset($field['is_multiple']) ? (boolean)$field['is_multiple'] : false;
                            if ($is_multi_select) {
                                $extra_attribute_text .= ' multiple="multiple"';
                            }
                            ?>
                            <select class="widefat"
                                    id="<?php echo esc_attr($this->get_field_id($field_key)); ?>"
                                    name="<?php echo esc_attr($this->get_field_name($field_key));
                                    echo $is_multi_select ? '[]' : ''; ?>"
                                <?php echo $extra_attribute_text; ?>>
                                <?php foreach ($options as $option_key => $option_value) {

                                    if (!$is_multi_select) {
                                        if (is_array($value)) {
                                            $value = $value[0];
                                        }
                                        $selected = $option_key == $value ? true : false;
                                    } else {
                                        if (!is_array($value)) {
                                            $value = array($value);
                                        }
                                        $selected = in_array($option_key, $value) ? true : false;
                                    }

                                    ?>
                                    <option <?php echo $selected ? 'selected="selected"' : ''; ?>
                                    value="<?php echo esc_attr($option_key); ?>"><?php echo esc_html($option_value) ?></option><?php
                                }
                                ?>
                            </select>

                            <?php $this->description($field) ?>
                        </p>
                        <?php
                        break;
                    case "dropdown_categories":

                        $args = isset($field['args']) ? $field['args'] : array();
                        $cat_default_args = array(
                            'orderby' => 'name',
                            'hide_empty' => 0,
                            'class' => 'widefat',
                            'taxonomy' => 'category',
                            'selected' => is_array($value) ? implode(",", $value) : $value,
                            'name' => $this->get_field_name($field_key),
                            'id' => $this->get_field_id($field_key),
                            'show_option_all' => esc_html__('All Categories', 'agency-ecommerce'),
                            'echo' => false,
                            'multiple' => false

                        );
                        $cat_args = wp_parse_args($args, $cat_default_args);
                        ?>
                        <p>
                            <label
                                    for="<?php echo esc_attr($this->get_field_id($field_key)); ?>"><?php echo esc_html($field['title']); ?>
                                :</label>
                            <?php
                            $taxonomy = isset($cat_args['taxonomy']) ? $cat_args['taxonomy'] : '';

                            if (taxonomy_exists($taxonomy)) {
                                $output = wp_dropdown_categories($cat_args);
                                echo $this->wp_dropdown_cats_multiple($output, $cat_args);
                            } else {
                                echo '<h4>' . sprintf(__('Taxonomy (%s) not found', 'agency-ecommerce'), $taxonomy) . '</h4>';
                            }
                            $this->description($field) ?>
                        </p>
                        <?php
                        break;
                    case "image":
                        ?>
                        <p><label
                                    for="<?php echo esc_attr($this->get_field_id($field_key)); ?>"><?php echo esc_html($field['title']); ?>
                                :</label>
                    <div class="media-uploader" id="<?php echo $this->get_field_id('background_image'); ?>">
                        <div class="custom_media_preview" style="position:relative;">

                            <button type="button" class="button remove"
                                    style="position:absolute;right:0; <?php echo empty($value) ? 'display:none;' : '' ?>">
                                x
                            </button>
                            <img style="<?php echo empty($value) ? 'display:none;' : '' ?>max-width:100%;"
                                 class="media_preview_image"
                                 src="<?php echo esc_url($value); ?>" alt=""/>

                            <input class="widefat custom_media_input" type="hidden"
                                   id="<?php echo esc_attr($this->get_field_id($field_key)); ?>"
                                   name="<?php echo esc_attr($this->get_field_name($field_key)); ?>"
                                <?php echo $extra_attribute_text; ?>
                                   type="text" value="<?php echo esc_html($value); ?>"/>
                            <button class="media_upload button"
                                    id="<?php echo $this->get_field_id('background_image'); ?>"
                                    data-choose="<?php esc_attr_e('Choose an image', 'agency-ecommerce'); ?>"
                                    data-update="<?php esc_attr_e('Use image', 'agency-ecommerce'); ?>"
                                    style="width:100%;margin-top:6px;margin-right:30px;"><?php esc_html_e('Select an Image', 'agency-ecommerce'); ?></button>
                        </div>

                        </div><?php $this->description($field) ?>
                        </p>
                        <?php
                        break;
                    case "icon-picker":
                        ?>

                        <div class="ae-icon-picker-wrapper">
                            <p>
                                <label
                                        for="<?php echo esc_attr($this->get_field_id($field_key)); ?>"><?php echo esc_html($field['title']); ?>
                                    :</label>
                                <input class="widefat"
                                       id="<?php echo esc_attr($this->get_field_id($field_key)); ?>"
                                       name="<?php echo esc_attr($this->get_field_name($field_key)); ?>"
                                       type="<?php echo esc_attr($field['type']); ?>" readonly="readonly"
                                       value="<?php echo esc_attr($value); ?>" <?php echo $extra_attribute_text; ?>/>
                                <i class="selected-icon fa <?php echo esc_attr($value) ?>"></i>
                                <i class="toggle-icon fa fa-chevron-down"></i>

                                <?php $this->description($field) ?>
                            <div class="ae-icon-list">
                                <?php
                                $font_awesome_icon_lists = agency_ecommerce_font_awesome_icon_list();
                                ?>
                                <ul>
                                    <?php
                                    foreach ($font_awesome_icon_lists as $icon_key => $icon_value) {

                                        $class = $value == $icon_key ? 'active' : '';

                                        echo '<li data-icon="' . esc_attr($icon_key) . '" class="icon ' . esc_attr($class) . '"><i class="fa ' . esc_attr($icon_key) . '"></i></li>';
                                    }
                                    ?>

                                </ul>
                            </div>
                            </p>
                        </div>

                        <?php
                        break;

                }

            }

        }

        public function description($field)
        {

            if (isset($field['description'])) {

                $allowed_tags = array(
                    'p' => array(),
                    'em' => array(),
                    'strong' => array(),
                    'a' => array(
                        'href' => array(),
                        'target' => array(),
                    ),
                );

                $updated_value = wp_kses($field['description'], $allowed_tags);

                ?>
                <br/>
                <small><?php echo $updated_value; ?></small>
            <?php }
        }

        public function get_extra_attribute_text($extra_attributes = array())
        {
            $extra_attribute_text = '';

            foreach ($extra_attributes as $attribute_key => $attribute_value) {

                $extra_attribute_text .= ' ' . esc_html($attribute_key) . '="' . esc_attr($attribute_value) . '"';
            }
            return $extra_attribute_text;

        }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;

            $widget_fields = $this->widget_fields();

            $field_default = array(
                'name' => '',
                'title' => '',
                'type' => 'text',

            );

            // Loop through fields
            foreach ($widget_fields as $field_key => $field) {

                if (!isset($field['name']) || !isset($field['type'])) {
                    continue;
                }
                if ($field_key != $field['name']) {
                    continue;
                }

                $field = wp_parse_args($field, $field_default);

                $new_field_value = isset($new_instance[$field_key]) ? $new_instance[$field_key] : '';

                $instance[$field['name']] = Agency_Ecommerce_Widget_Validation::instance()->sanitize($new_field_value, $field);

            }

            return $instance;
        }

        function wp_dropdown_cats_multiple($output, $r)
        {

            if (isset($r['multiple']) && $r['multiple']) {

                $output = preg_replace('/^<select/i', '<select multiple data-live-search="true" data-style="btn-info"', $output);

                $output = str_replace("name='{$r['name']}'", "name='{$r['name']}[]'", $output);

                $selected = is_array($r['selected']) ? $r['selected'] : explode(",", $r['selected']);

                foreach (array_map('trim', $selected) as $value)

                    $output = str_replace("value=\"{$value}\"", "value=\"{$value}\" selected", $output);

            }

            return $output;
        }

    }


}



