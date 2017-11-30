<?php
if (!defined('ABSPATH')) {
    exit;
}

class MetaBoxes
{
    private $metadata;
    private $meta_boxes;

    function __construct()
    {
        global $post;
        if (!empty($post)) {
            $this->metadata = maybe_unserialize(get_post_meta($post->ID, 'attire_post_meta', true));
        }
        $this->Actions();
    }

    function Actions()
    {
        add_action('admin_init', array($this, 'LoadMetaBoxes'), 0);
        add_action('save_post', array($this, 'SavePostMeta'), 10, 2);
    }

    function LoadMetaBoxes()
    {
        $this->meta_boxes = array(
            'attire-page-width' => array(
                'title' => 'Page Width',
                'callback' => array($this, 'PageWidth'),
                'position' => 'side',
                'priority' => 'core',
                'post_type' => 'page'
            ),
            'attire-page-settings' => array(
                'title' => 'Page Settings',
                'callback' => array($this, 'PageSettings'),
                'position' => 'normal',
                'priority' => 'core',
                'post_type' => 'page'
            )
        );
        $this->meta_boxes = apply_filters("attire_metabox", $this->meta_boxes);

        foreach ($this->meta_boxes as $ID => $meta_box) {
            extract($meta_box);
            add_meta_box($ID, $title, $callback, $post_type, $position, $priority);
        }
    }

    /**
     * @usage Page Width
     *
     * @param $post
     */
    function PageWidth($post)
    {

        if (!is_array($this->metadata)) {
            $this->metadata = maybe_unserialize(get_post_meta($post->ID, 'attire_post_meta', true));
        }

        $container_fluid = "";
        $container = "";
        $val = get_post_meta($post->ID, 'attire_post_meta', true);
        if (isset($val['layout_page'])) {
            $val = $val['layout_page'];

            $default = $val === "default" ? "selected" : "";
            $container_fluid = $val === "container-fluid" ? "selected" : "";
            $container = $val === "container" ? "selected" : "";

        } elseif ($container_fluid === "" && $container === "") {
            $default = "selected";
        }

        wp_nonce_field('page_layout_nonce', 'page_layout_nonce');
        echo '<select class="form-control" id="page_width" name="attire_post_meta[layout_page]">';
        echo '<option  value="default"  ' . esc_attr($default) . '> Theme Default</option>';
        echo '<option  value="container-fluid"  ' . esc_attr($container_fluid) . '> Full-Width</option>';
        echo '<option  value="container"  ' . esc_attr($container) . '> Container</option>';
        echo '</select>';

    }


    /**
     * @usage Page settings
     *
     * @param $post
     */
    function PageSettings($post)
    {
        if (!is_array($this->metadata)) {
            $this->metadata = maybe_unserialize(get_post_meta($post->ID, 'attire_post_meta', true));
        }
        $pagebg = isset($this->metadata['pagebg']) ? $this->metadata['pagebg'] : '';
        $left_sidebar = isset($this->metadata['left_sidebar']) ? $this->metadata['left_sidebar'] : '';
        $left_sidebar_width = isset($this->metadata['left_sidebar_width']) ? $this->metadata['left_sidebar_width'] : '';
        $right_sidebar = isset($this->metadata['right_sidebar']) ? $this->metadata['right_sidebar'] : '';
        $right_sidebar_width = isset($this->metadata['right_sidebar_width']) ? $this->metadata['right_sidebar_width'] : '';

        $color = isset($this->metadata['cph_bg_color']) ? $this->metadata['cph_bg_color'] : '';
        $text_color = isset($this->metadata['cph_text_color']) ? $this->metadata['cph_text_color'] : '';
        $image = isset($this->metadata['cph_image']) ? $this->metadata['cph_image'] : '';
        $desc = isset($this->metadata['cph_description']) ? $this->metadata['cph_description'] : '';
        $active = isset($this->metadata['cph_active']) && (int)$this->metadata['cph_active'] === 1 ? 'checked' : '';

        ?>

        <script>
            jQuery(function ($) {
                $('.ttip').tooltip();

                $('#layout-icons label').on('click', function () {
                    $('#layout-icons label').removeClass('active');
                    $(this).addClass('active');
                });

            });
        </script>
        <?php wp_nonce_field('page_settings_nonce', 'page_settings_nonce') ?>
        <div class="attire attire-theme-options page_settings">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-2" style="padding: 0">
                        <ul class="nav nav-tabs nav-stacked">
                            <li class=""><a href="#1a" data-toggle="tab" class="active">Page Background</a></li>
                            <li><a href="#2a" data-toggle="tab">Sidebar Layout</a></li>
                            <li><a href="#3a" data-toggle="tab">Sidebar Settings</a></li>
                            <li><a href="#4a" data-toggle="tab">Page Header</a></li>
                            <li><a href="#5a" data-toggle="tab">Page CSS</a></li>
                        </ul>
                    </div>
                    <div class="col-md-10" style="padding: 0; border: 1px solid rgba(0, 0, 0, 0.1);">
                        <div class="tab-content clearfix">
                            <div class="tab-pane active" id="1a">
                                <div class="panel-body">
                                    <?php echo AttireOptionFields::CustomBackground(array(
                                        'id' => 'cpb',
                                        'name' => 'attire_post_meta[pagebg]',
                                        'selected' => esc_attr($pagebg)
                                    )); ?>
                                </div>
                            </div>
                            <div class="tab-pane" id="2a">
                                <div class="panel-body" id="layout-icons">
                                    <label class="<?php echo isset($this->metadata['sidebar_layout']) && $this->metadata['sidebar_layout'] == "no-sidebar" ? 'active' : ''; ?>">
                                        <input type="radio" class="hide" name="attire_post_meta[sidebar_layout]"
                                               value="no-sidebar" <?php echo isset($this->metadata['sidebar_layout']) && $this->metadata['sidebar_layout'] == "no-sidebar" ? 'checked="checked"' : ''; ?>>

                                        <div class="no-sidebar"></div>
                                    </label>
                                    <label class="<?php echo isset($this->metadata['sidebar_layout']) && $this->metadata['sidebar_layout'] == "left-sidebar-1" ? 'active' : ''; ?>">
                                        <input type="radio" class="hide" name="attire_post_meta[sidebar_layout]"
                                               value="left-sidebar-1" <?php echo isset($this->metadata['sidebar_layout']) && $this->metadata['sidebar_layout'] == "left-sidebar-1" ? 'checked="checked"' : ''; ?>>

                                        <div class="left-sidebar"></div>
                                    </label>
                                    <label class="<?php echo isset($this->metadata['sidebar_layout']) && $this->metadata['sidebar_layout'] == "right-sidebar-1" ? 'active' : ''; ?>">
                                        <input type="radio" class="hide" name="attire_post_meta[sidebar_layout]"
                                               value="right-sidebar-1" <?php echo isset($this->metadata['sidebar_layout']) && $this->metadata['sidebar_layout'] == "right-sidebar-1" ? 'checked="checked"' : ''; ?>>

                                        <div class="right-sidebar"></div>
                                    </label>
                                    <label class="<?php echo isset($this->metadata['sidebar_layout']) && $this->metadata['sidebar_layout'] == "sidebar-2" ? 'active' : ''; ?>">
                                        <input type="radio" class="hide" name="attire_post_meta[sidebar_layout]"
                                               value="sidebar-2" <?php echo isset($this->metadata['sidebar_layout']) && $this->metadata['sidebar_layout'] == "sidebar-2" ? 'checked="checked"' : ''; ?>>

                                        <div class="sidebar-2"></div>
                                    </label>
                                    <label class="<?php echo isset($this->metadata['sidebar_layout']) && $this->metadata['sidebar_layout'] == "left-sidebar-2" ? 'active' : ''; ?>">
                                        <input type="radio" class="hide" name="attire_post_meta[sidebar_layout]"
                                               value="left-sidebar-2" <?php echo isset($this->metadata['sidebar_layout']) && $this->metadata['sidebar_layout'] == "left-sidebar-2" ? 'checked="checked"' : ''; ?>>

                                        <div class="left-sidebar-2"></div>
                                    </label>
                                    <label class="<?php echo isset($this->metadata['sidebar_layout']) && $this->metadata['sidebar_layout'] == "right-sidebar-2" ? 'active' : ''; ?>">
                                        <input type="radio" class="hide" name="attire_post_meta[sidebar_layout]"
                                               value="right-sidebar-2" <?php echo isset($this->metadata['sidebar_layout']) && $this->metadata['sidebar_layout'] == "right-sidebar-2" ? 'checked="checked"' : ''; ?>>

                                        <div class="right-sidebar-2"></div>
                                    </label>

                                </div>
                            </div>
                            <div class="tab-pane" id="3a">
                                <div id="seidebar_settings" class="panel-body">

                                    <div class="row">
                                        <div class="col-lg-6">

                                            <b>Left Sidebar</b><br/>

                                            <?php echo AttireOptionFields::SidebarDropdown(array(
                                                'id' => 'cpl',
                                                'name' => 'attire_post_meta[left_sidebar]',
                                                'selected' => esc_attr($left_sidebar)
                                            )); ?>
                                            <select name="attire_post_meta[left_sidebar_width]">
                                                <option value="">Width:</option>
                                                <option value="2" <?php selected(2, $left_sidebar_width) ?>>16.66%
                                                </option>
                                                <option value="3" <?php selected(3, $left_sidebar_width) ?>>25%</option>
                                                <option value="4" <?php selected(4, $left_sidebar_width) ?>>33.33%
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <b>Right Sidebar</b><br/>

                                            <?php echo AttireOptionFields::SidebarDropdown(array(
                                                'id' => 'cpl',
                                                'name' => 'attire_post_meta[right_sidebar]',
                                                'selected' => esc_attr($right_sidebar)
                                            )); ?>
                                            <select name="attire_post_meta[right_sidebar_width]">
                                                <option value="">Width:</option>
                                                <option value="2" <?php selected(2, $right_sidebar_width) ?>>16.66%
                                                </option>
                                                <option value="3" <?php selected(3, $right_sidebar_width) ?>>25%
                                                </option>
                                                <option value="4" <?php selected(4, $right_sidebar_width) ?>>33.33%
                                                </option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="4a">
                                <div class="panel-body cph" style="padding: 0">
                                    <div class='col-md-5' style="padding: 0">
                                        <div class='col-md-6'>
                                            <label for="cph_bg_color">Background Color</label>
                                            <input class="" type="text" name="attire_post_meta[cph_bg_color]"
                                                   id="cph_bg_color" placeholder="Color"
                                                   value="<?php echo esc_attr($color); ?>"/>
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="cph_bg_color">Text Color</label>
                                            <input class="" type="text" name="attire_post_meta[cph_text_color]"
                                                   id="cph_text_color" placeholder="Color"
                                                   value="<?php echo esc_attr($text_color); ?>"/>
                                        </div>
                                        <div class='col-md-12'>
                                            <label for="cph_image">Background Image</label>
                                            <div class='input-group'>
                            <span class='input-group-btn'>
                                <button rel='#cph_image' class='btn btn-default btn-media-upload' type='button'>
                                    <i class='fa fa-picture-o'></i>
                                </button>
                            </span>
                                                <input class='form-control' type='text'
                                                       name='attire_post_meta[cph_image]'
                                                       onchange="preview_cph()" id='cph_image'
                                                       value='<?php echo esc_attr($image); ?>'/>
                                            </div>
                                        </div>

                                        <div class='col-md-12'>
                                            <label for="cph_description">Page Sub-heading</label>
                                            <textarea rows="3" class="form-control" type="text" onchange="preview_cph()"
                                                      id="cph_description"
                                                      name="attire_post_meta[cph_description]"><?php echo esc_attr($desc); ?></textarea>
                                        </div>

                                        <div class="checkbox col-md-12">
                                            <label><input type="checkbox" id="cph_active"
                                                          value="1" <?php echo esc_attr($active); ?>
                                                          name="attire_post_meta[cph_active]"/>Show page header</label>
                                        </div>

                                    </div>

                                    <div class='col-md-7' style="padding-top: 15px">
                                        <button class="btn btn-sm btn-default col-md-12" id="clear_cph" type="button">
                                            Clear
                                        </button>
                                        <div class='preview-cph'>
                                            <div>
                                                <h1 id="preview_cph_title"></h1><br>
                                                <p id="preview_cph_description"></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="5a">
                                <div class="panel-body">
                        <textarea id="page_css"
                                  name="attire_post_meta[page_css]"><?php echo isset($this->metadata['page_css']) ? wp_filter_nohtml_kses($this->metadata['page_css']) : ''; ?></textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    /**
     * @usage Save Post Meta
     *
     * @param $postid
     * @param $post
     *
     * @return void
     */
    function SavePostMeta($postid, $post)
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $postid;
        }

        if (!current_user_can('edit_page', $postid)) {
            return $postid;
        }

        if (isset($_POST['attire_post_meta']) && is_array($_POST['attire_post_meta'])) {

            $pagemeta = $_POST['attire_post_meta'];

            if (wp_verify_nonce($_POST['page_settings_nonce'], 'page_settings_nonce')) {
                $pagemeta['pagelayout'] = sanitize_text_field($pagemeta['pagelayout']);

                $pagemeta['left_sidebar_width'] = intval($pagemeta['left_sidebar_width']);
                $pagemeta['right_sidebar_width'] = intval($pagemeta['right_sidebar_width']);
                $pagemeta['left_sidebar'] = sanitize_text_field($pagemeta['left_sidebar']);
                $pagemeta['left_sidebar'] = sanitize_text_field($pagemeta['left_sidebar']);

                $pagemeta['pagebg']['image'] = esc_url_raw($pagemeta['pagebg']['image']);

                $pagemeta['layout_page'] = sanitize_text_field($pagemeta['layout_page']);

                $pagemeta['cph_image'] = sanitize_text_field($pagemeta['cph_image']);
                $pagemeta['cph_bg_color'] = sanitize_text_field($pagemeta['cph_bg_color']);
                $pagemeta['cph_text_color'] = sanitize_text_field($pagemeta['cph_text_color']);
                $pagemeta['cph_description'] = sanitize_text_field($pagemeta['cph_description']);
                $pagemeta['cph_active'] = sanitize_text_field($pagemeta['cph_active']);

                $pagemeta['page_css'] = wp_filter_nohtml_kses($pagemeta['page_css']);

            }

            update_post_meta($postid, 'attire_post_meta', $pagemeta);
        }
    }


}

new MetaBoxes();
