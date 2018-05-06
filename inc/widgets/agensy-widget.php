<?php

/**
 * @package Construction
 */
function agensy_widgets_show_widget_field($instance = '', $widget_field = '', $athm_field_value = '') {
    // Store Posts in array
    $agensy_postlist[0] = array(
        'value' => 0,
        'label' => '--choose--'
    );
    $arg = array('posts_per_page' => -1);
    $agensy_posts = get_posts($arg);
    foreach ($agensy_posts as $agensy_post) :
        $agensy_postlist[$agensy_post->ID] = array(
            'value' => $agensy_post->ID,
            'label' => $agensy_post->post_title
        );
    endforeach;

    extract($widget_field);

    switch ($agensy_widgets_field_type) {

        // Standard text field
        case 'text' : ?>
            <p>
                <label for="<?php echo $instance->get_field_id($agensy_widgets_name); ?>"><?php echo esc_html($agensy_widgets_title); ?>:</label>
                <input class="widefat" id="<?php echo $instance->get_field_id($agensy_widgets_name); ?>" name="<?php echo $instance->get_field_name($agensy_widgets_name); ?>" type="text" value="<?php echo $athm_field_value; ?>" />

                <?php if (isset($agensy_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($agensy_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Standard url field
        case 'url' :
            ?>
            <p>
                <label for="<?php echo $instance->get_field_id($agensy_widgets_name); ?>"><?php echo esc_html($agensy_widgets_title); ?>:</label>
                <input class="widefat" id="<?php echo $instance->get_field_id($agensy_widgets_name); ?>" name="<?php echo $instance->get_field_name($agensy_widgets_name); ?>" type="text" value="<?php echo $athm_field_value; ?>" />

                <?php if (isset($agensy_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($agensy_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Textarea field
        case 'textarea' :
            ?>
            <p>
                <label for="<?php echo $instance->get_field_id($agensy_widgets_name); ?>"><?php echo esc_html($agensy_widgets_title); ?>:</label>
                <textarea class="widefat" id="<?php echo $instance->get_field_id($agensy_widgets_name); ?>" name="<?php echo $instance->get_field_name($agensy_widgets_name); ?>"><?php echo $athm_field_value; ?></textarea>
            </p>
            <?php
            break;

        // Checkbox field
        case 'checkbox' :
            ?>
            <p>
                <input id="<?php echo $instance->get_field_id($agensy_widgets_name); ?>" name="<?php echo $instance->get_field_name($agensy_widgets_name); ?>" type="checkbox" value="1" <?php checked('1', $athm_field_value); ?>/>
                <label for="<?php echo $instance->get_field_id($agensy_widgets_name); ?>"><?php echo esc_html($agensy_widgets_title); ?></label>

                <?php if (isset($agensy_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($agensy_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Radio fields
        case 'radio' :
            ?>
            <p>
                <?php
                echo esc_html($agensy_widgets_title);
                echo '<br />';
                foreach ($agensy_widgets_field_options as $athm_option_name => $athm_option_title) {
                    ?>
                    <input id="<?php echo $instance->get_field_id($athm_option_name); ?>" name="<?php echo $instance->get_field_name($agensy_widgets_name); ?>" type="radio" value="<?php echo $athm_option_name; ?>" <?php checked($athm_option_name, $athm_field_value); ?> />
                    <label for="<?php echo $instance->get_field_id($athm_option_name); ?>"><?php echo esc_html($athm_option_title); ?></label>
                    <br />
                <?php } ?>

                <?php if (isset($agensy_widgets_description)) { ?>
                    <small><?php echo wp_kses_post($agensy_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Select field
        case 'select' :
            ?>
            <p>
                <label for="<?php echo $instance->get_field_id($agensy_widgets_name); ?>"><?php echo esc_html($agensy_widgets_title); ?>:</label>
                <select name="<?php echo $instance->get_field_name($agensy_widgets_name); ?>" id="<?php echo $instance->get_field_id($agensy_widgets_name); ?>" class="widefat">
                    <?php foreach ($agensy_widgets_field_options as $athm_option_name => $athm_option_title) { ?>
                        <option value="<?php echo $athm_option_name; ?>" id="<?php echo $instance->get_field_id($athm_option_name); ?>" <?php selected($athm_option_name, $athm_field_value); ?>><?php echo esc_html($athm_option_title); ?></option>
                    <?php } ?>
                </select>

                <?php if (isset($agensy_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($agensy_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        case 'number' :
            ?>
            <p>
                <label for="<?php echo $instance->get_field_id($agensy_widgets_name); ?>"><?php echo esc_html($agensy_widgets_title); ?>:</label><br />
                <input name="<?php echo $instance->get_field_name($agensy_widgets_name); ?>" type="number" step="1" min="1" id="<?php echo $instance->get_field_id($agensy_widgets_name); ?>" value="<?php echo $athm_field_value; ?>" class="small-text" />

                <?php if (isset($agensy_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($agensy_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Select field
        case 'selectpost' :
            ?>
            <p>
                <label for="<?php echo $instance->get_field_id($agensy_widgets_name); ?>"><?php echo esc_html($agensy_widgets_title); ?>:</label>
                <select name="<?php echo $instance->get_field_name($agensy_widgets_name); ?>" id="<?php echo $instance->get_field_id($agensy_widgets_name); ?>" class="widefat">
                    <?php foreach ($agensy_postlist as $agensy_single_post) { ?>
                        <option value="<?php echo $agensy_single_post['value']; ?>" id="<?php echo $instance->get_field_id($agensy_single_post['label']); ?>" <?php selected($agensy_single_post['value'], $athm_field_value); ?>><?php echo $agensy_single_post['label']; ?></option>
                    <?php } ?>
                </select>

                <?php if (isset($agensy_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($agensy_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        case 'upload' :

            $output = '';
            $id = $instance->get_field_id($agensy_widgets_name);
            $class = '';
            $int = '';
            $value = $athm_field_value;
            $name = $instance->get_field_name($agensy_widgets_name);


            if ($value) {
                $class = ' has-file';
            }
            $output .= '<div class="sub-option widget-upload">';
            $output .= '<label for="' . $instance->get_field_id($agensy_widgets_name) . '">' . $agensy_widgets_title . '</label><br/>';
            $output .= '<input id="' . $id . '" class="upload' . $class . '" type="text" name="' . $name . '" value="' . $value . '" placeholder="' . esc_html__('No file chosen', 'agensy') . '" />' . "\n";
            if (function_exists('wp_enqueue_media')) {
                
                    $output .= '<input id="upload-' . $id . '" class="upload-button button" type="button" value="' . __('Upload', 'agensy') . '" />' . "\n";

            } else {
                $output .= '<p><i>' . esc_html__('Upgrade your version of WordPress for full media support.', 'agensy') . '</i></p>';
            }

            $output .= '<div class="screenshot team-thumb" id="' . $id . '-image">' . "\n";

            if ($value != '') {
                $remove = '<a class="remove-image remove-screenshot">Remove</a>';
                $attachment_id = attachment_url_to_postid($value);

                $image_array = wp_get_attachment_image_src($attachment_id, 'medium');
                $image = preg_match('/(^.*\.jpg|jpeg|png|gif|ico*)/i', $value);
                if ($image) {
                    $output .= '<img src="' . $image_array[0] . '" alt="" />' . $remove;
                } else {
                    $parts = explode("/", $value);
                    for ($i = 0; $i < sizeof($parts); ++$i) {
                        $title = $parts[$i];
                    }

                    // No output preview if it's not an image.
                    $output .= '';

                    // Standard generic output if it's not an image.
                    $title = esc_html__('View File', 'agensy');
                    $output .= '<div class="no-image"><span class="file_link"><a href="' . $value . '" target="_blank" rel="external">' . $title . '</a></span></div>';
                }
            }
            $output .= '</div></div>' . "\n";
            echo $output;
            break;
    }
}

function agensy_widgets_updated_field_value($widget_field, $new_field_value) {

    extract($widget_field);

    // Allow only integers in number fields
    if ($agensy_widgets_field_type == 'number') {
        return absint($new_field_value);

        // Allow some tags in textareas
    } elseif ($agensy_widgets_field_type == 'textarea') {
        // Check if field array specifed allowed tags
        if (!isset($agensy_widgets_allowed_tags)) {
            // If not, fallback to default tags
            $agensy_widgets_allowed_tags = '<p><strong><em><a>';
        }
        return strip_tags($new_field_value, $agensy_widgets_allowed_tags);

        // No allowed tags for all other fields
    } elseif ($agensy_widgets_field_type == 'url') {
        return esc_url_raw($new_field_value);
    } else {
        return strip_tags($new_field_value);
    }
}