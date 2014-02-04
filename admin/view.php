<?php
global $blueplanet_options_settings;
$blueplanet_options = $blueplanet_options_settings;
?>
<div class="wrap">
    <h2><?php _e('Blue Planet Theme Options', 'blue-planet'); ?></h2>
</div>
<div class="icon32" id="icon-options-general"><br></div>
<div class="bp-main-wrapper" style="margin:5px 5px 5px 0px;">
    <form name="form1" method="post" action="options.php">
        <?php settings_fields('blue-planet-options-group'); ?>
        <?php do_settings_sections('blue-planet-options-group'); ?>
        <?php settings_errors(); ?>

        <div id="bp-tab-container" class="tab-container">

        <ul class='etabs'>
           <li class='tab'><a href="#bptab-general" >
                   <?php _e("General", 'blue-planet'); ?>
               </a>
           </li>
           <li class='tab'><a href="#bptab-header" >
                   <?php _e("Header", 'blue-planet'); ?>
               </a>
           </li>
           <li class='tab'><a href="#bptab-footer" >
                   <?php _e("Footer", 'blue-planet'); ?>
               </a>
           </li>
           <li class='tab'><a href="#bptab-layout" >
                   <?php _e("Layout", 'blue-planet'); ?>
               </a>
           </li>

            <li class='tab'><a href="#bptab-blog" >
                   <?php _e("Blog", 'blue-planet'); ?>
               </a>
           </li>

           <li class='tab'><a href="#bptab-slider" >
                   <?php _e("Slider", 'blue-planet'); ?>
               </a>
           </li>

           <li class='tab'><a href="#bptab-color" >
                   <?php _e("Color", 'blue-planet'); ?>
               </a>
           </li>
           <li class='tab'><a href="#bptab-navigation" >
                   <?php _e("Navigation", 'blue-planet'); ?>
               </a>
           </li>
           <li class='tab'><a href="#bptab-social" >
                   <?php _e("Social", 'blue-planet'); ?>
               </a>
           </li>
           <li class='tab'><a href="#bptab-administration" >
                   <?php _e("Administration", 'blue-planet'); ?>
               </a>
           </li>
       </ul>

            <div class='panel-container'>
                <!-- General Starts -->

                <div id="bptab-general">
                    <h2>
                        <?php _e("General settings", 'blue-planet'); ?>
                    </h2>

                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="custom_favicon">
                                        <?php _e("Custom Favicon", 'blue-planet'); ?>
                                        <p class="description"><?php _e("Upload your favicon. Recommended size 16px X 16px", 'blue-planet'); ?></p>
                                    </label>
                                </th>
                                <td>
                                    <input class="upload-url" type="text" name="blueplanet_options[custom_favicon]"
                                           value="<?php echo esc_url($blueplanet_options['custom_favicon']); ?>" class="upload" />
                                    <input id="bp_upload_button" class="bp_upload_button button" type="button"
                                           value="<?php esc_attr_e('Upload', 'blue-planet'); ?>" />

                                    <?php
                                    if (!empty($blueplanet_options['custom_favicon'])) {
                                        echo '<img src="' . esc_url($blueplanet_options['custom_favicon']) . '" alt="favicon" />';
                                    }//end if
                                    ?>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="custom_css">
                                        <?php _e("Custom CSS", 'blue-planet'); ?>
                                        <p class="description"><?php _e("Enter your Custom CSS here.", 'blue-planet'); ?></p>
                                    </label>
                                </th>
                                <td>
                                    <textarea name="blueplanet_options[custom_css]" id="custom_css" cols="90" rows="8"><?php echo $blueplanet_options['custom_css'] ; ?></textarea>

                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="feedburner_url">
                                        <?php _e("Feedburner URL", 'blue-planet'); ?>
                                        <p class="description"><?php _e("Enter FeedbBurner URL.", 'blue-planet'); ?></p>
                                    </label>
                                </th>
                                <td>
                                    <input  type="text" name="blueplanet_options[feedburner_url]"
                                            value="<?php echo esc_url($blueplanet_options ['feedburner_url']); ?>"  />

                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="search_placeholder">
                                        <?php _e("Default text in Search box", 'blue-planet'); ?>
                                        <p class="description"><?php _e("Enter default text in Search box", 'blue-planet'); ?></p>
                                    </label>
                                </th>
                                <td>
                                    <input  type="text" name="blueplanet_options[search_placeholder]"
                                            value="<?php echo esc_attr($blueplanet_options ['search_placeholder']); ?>"  />

                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="flg_enable_goto_top">
                                        <?php _e("Enable Goto Top", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="checkbox" id="flg_enable_goto_top" name="blueplanet_options[flg_enable_goto_top]" value="1" <?php checked('1', $blueplanet_options['flg_enable_goto_top']); ?> /> <?php _e('Check to enable', 'blue-planet'); ?>


                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- General Ends -->
                <!-- Header Starts -->

                <div id="bptab-header">
                    <h2>
                        <?php _e("Header settings", 'blue-planet'); ?>
                    </h2>
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="banner_background_color">
                                        <?php _e("Banner background color", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[banner_background_color]"
                                             class="bp-color-field"  value="<?php echo esc_attr($blueplanet_options['banner_background_color']); ?>" data-default-color="#00ADB3"/>
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">
                                    <label for="flg_hide_social_icons">
                                        <?php _e("Hide Social icons", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="checkbox" id="flg_hide_social_icons" name="blueplanet_options[flg_hide_social_icons]" value="1" <?php checked('1', $blueplanet_options['flg_hide_social_icons']); ?> /> <?php _e('Check to hide', 'blue-planet'); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Header Ends -->
                <!-- Footer Starts -->

                <div id="bptab-footer">
                    <h2>
                        <?php _e("Footer settings", 'blue-planet'); ?>
                    </h2>
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="flg_enable_footer_widgets">
                                        <?php _e("Enable Footer Widgets", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="checkbox" id="flg_enable_footer_widgets" name="blueplanet_options[flg_enable_footer_widgets]" value="1" <?php checked('1', $blueplanet_options['flg_enable_footer_widgets']); ?> /> <?php _e('Check to enable', 'blue-planet'); ?>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="number_of_footer_widgets">
                                        <?php _e("Number of Footer widgets", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <select name="blueplanet_options[number_of_footer_widgets]" id="number_of_footer_widgets">
                                        <option value="1" <?php selected($blueplanet_options['number_of_footer_widgets'], '1') ?>>
                                            <?php _e('1', 'blue-planet'); ?></option>
                                        <option value="2" <?php selected($blueplanet_options['number_of_footer_widgets'], '2') ?>>
                                            <?php _e('2', 'blue-planet'); ?></option>
                                        <option value="3" <?php selected($blueplanet_options['number_of_footer_widgets'], '3') ?>>
                                            <?php _e('3', 'blue-planet'); ?></option>
                                        <option value="4" <?php selected($blueplanet_options['number_of_footer_widgets'], '4') ?>>
                                            <?php _e('4', 'blue-planet'); ?></option>
                                        <option value="6" <?php selected($blueplanet_options['number_of_footer_widgets'], '6') ?>>
                                            <?php _e('6', 'blue-planet'); ?></option>

                                    </select>

                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">
                                    <label for="copyright_text">
                                        <?php _e("Copyright text", 'blue-planet'); ?>
                                        <p class="description"><?php _e("Enter copyright text.", 'blue-planet'); ?></p>
                                    </label>
                                </th>
                                <td>
                                    <textarea name="blueplanet_options[copyright_text]" cols="90" rows="8"><?php echo esc_attr($blueplanet_options['copyright_text']); ?></textarea>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="flg_hide_powered_by">
                                        <?php _e("Hide Powered By", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="checkbox" id="flg_hide_powered_by" name="blueplanet_options[flg_hide_powered_by]" value="1" <?php checked('1', $blueplanet_options['flg_hide_powered_by']); ?> /> <?php _e('Check to hide', 'blue-planet'); ?>
                                </td>
                            </tr>
                             <tr valign="top">
                                <th scope="row">
                                    <label for="flg_hide_footer_social_icons">
                                        <?php _e("Hide Social icons in footer", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="checkbox" id="flg_hide_footer_social_icons" name="blueplanet_options[flg_hide_footer_social_icons]" value="1" <?php checked('1', $blueplanet_options['flg_hide_footer_social_icons']); ?> /> <?php _e('Check to hide', 'blue-planet'); ?>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- Footer Ends -->
                 <!-- Layout Starts -->

                <div id="bptab-layout">
                    <h2>
                        <?php _e("Layout settings", 'blue-planet'); ?>
                    </h2>
                    <table class="form-table">
                        <tbody>

                            <tr valign="top">
                                <th scope="row">
                                    <label for="default_layout">
                                        <?php _e("Default Layout", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <label title="right-sidebar" class="box">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/right-sidebar.png" alt="Content-Sidebar"><br />
                                        <input type="radio" name="blueplanet_options[default_layout]" id="right-sidebar"  value="right-sidebar" <?php checked($blueplanet_options['default_layout'], 'right-sidebar') ?>>
                                        <?php _e("Right Sidebar", 'blue-planet'); ?>
                                    </label>
                                    <label title="left-sidebar" class="box">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/left-sidebar.png" alt="Sidebar-Content"><br />
                                            <input type="radio" name="blueplanet_options[default_layout]" id="left-sidebar"  value="left-sidebar" <?php checked($blueplanet_options['default_layout'], 'left-sidebar') ?>><?php _e("Left Sidebar", 'blue-planet'); ?>
                                        </label>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="content_layout">
                                        <?php _e("Content Layout", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <label class="box">
                                        <input type="radio" name="blueplanet_options[content_layout]" id="content_layout"  value="full" <?php checked($blueplanet_options['content_layout'], 'full') ?>><span class="radio-text"><?php _e("Full Post", 'blue-planet'); ?></span>
                                    </label>
                                    <label class="box">
                                        <input type="radio" name="blueplanet_options[content_layout]" id="content_layout"  value="excerpt" <?php checked($blueplanet_options['content_layout'], 'excerpt') ?>><span class="radio-text"><?php _e("Excerpt", 'blue-planet'); ?></span>
                                    </label>
                                    <label class="box">
                                        <input type="radio" name="blueplanet_options[content_layout]" id="content_layout"  value="excerpt-thumb" <?php checked($blueplanet_options['content_layout'], 'excerpt-thumb') ?>><span class="radio-text"><?php _e("Excerpt with thumbnail", 'blue-planet'); ?></span>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Layout Ends -->

                 <!-- Blog Starts -->

                <div id="bptab-blog">
                    <h2>
                        <?php _e("Blog settings", 'blue-planet'); ?>
                    </h2>
                    <table class="form-table">
                        <tbody>

                            <tr valign="top">
                                <th scope="row">
                                    <label for="read_more_text">
                                        <?php _e("Read more text", 'blue-planet'); ?>
                                            <p class="description"><?php _e("Enter text to replace 'Read more'", 'blue-planet'); ?></p>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[read_more_text]"
                                            value="<?php echo esc_attr($blueplanet_options['read_more_text']); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="excerpt_length">
                                        <?php _e("Excerpt length", 'blue-planet'); ?>
                                            <p class="description"><?php _e("Enter excerpt length", 'blue-planet'); ?></p>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[excerpt_length]"
                                            value="<?php echo esc_attr($blueplanet_options['excerpt_length']); ?>" class="regular-text" />
                                </td>
                            </tr>
                             <tr valign="top">
                                <th scope="row">
                                    <label for="site_title_color">
                                        <?php _e("Post per page", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                <a href="<?php echo admin_url('options-reading.php');?>" target="_blank" class="button"><?php _e("Change Post per page", 'blue-planet'); ?></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- Blog Ends -->


                <!-- Slider Starts -->

                <div id="bptab-slider">
                    <h2>
                        <?php _e("Main Slider", 'blue-planet'); ?>
                    </h2>
                    <h3 class="title"><i><?php _e("Recommended image size for banner slider : 1140px X 250px", 'blue-planet'); ?></i></h3>
                    <table class="form-table">
                        <tbody>

                            <tr valign="top">
                                <th scope="row">
                                    <label for="slider_status">
                                        <?php _e("Show slider in", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <label>
                                        <input type="radio" name="blueplanet_options[slider_status]" id="slider_status"  value="home"
                                        <?php checked($blueplanet_options['slider_status'], 'home') ?>><?php _e("Home page Only", 'blue-planet'); ?>
                                    </label>
                                    <label>
                                        <input type="radio" name="blueplanet_options[slider_status]" id="slider_status"  value="all"
                                        <?php checked($blueplanet_options['slider_status'], 'all') ?>><?php _e("All pages", 'blue-planet'); ?>
                                    </label>
                                    <label>
                                        <input type="radio" name="blueplanet_options[slider_status]" id="slider_status"  value="none"
                                        <?php checked($blueplanet_options['slider_status'], 'none') ?>><?php _e("Disable", 'blue-planet'); ?>
                                    </label>

                                </td>
                            </tr>



                            <tr valign="top">
                                <th scope="row">
                                    <label for="transition_effect">
                                        <?php _e("Transition Effect", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                <select name="blueplanet_options[transition_effect]" id="transition_effect">
                                    <option value="boxRain" <?php selected($blueplanet_options['transition_effect'], 'boxRain') ?>><?php _e("boxRain", 'blue-planet'); ?></option>
                                    <option value="boxRainGrow" <?php selected($blueplanet_options['transition_effect'], 'boxRainGrow') ?>><?php _e("boxRainGrow", 'blue-planet'); ?></option>
                                    <option value="boxRainReverse" <?php selected($blueplanet_options['transition_effect'], 'boxRainReverse') ?>><?php _e("boxRainReverse", 'blue-planet'); ?></option>
                                    <option value="boxRainGrowReverse" <?php selected($blueplanet_options['transition_effect'], 'boxRainGrowReverse') ?>><?php _e("boxRainGrowReverse", 'blue-planet'); ?></option>
                                    <option value="boxRandom" <?php selected($blueplanet_options['transition_effect'], 'boxRandom') ?>><?php _e("boxRandom", 'blue-planet'); ?></option>
                                    <option value="fade" <?php selected($blueplanet_options['transition_effect'], 'fade') ?>><?php _e("fade", 'blue-planet'); ?></option>
                                    <option value="fold" <?php selected($blueplanet_options['transition_effect'], 'fold') ?>><?php _e("fold", 'blue-planet'); ?></option>
                                    <option value="random" <?php selected($blueplanet_options['transition_effect'], 'random') ?>><?php _e("random", 'blue-planet'); ?></option>
                                    <option value="sliceDown" <?php selected($blueplanet_options['transition_effect'], 'sliceDown') ?>><?php _e("sliceDown", 'blue-planet'); ?></option>
                                    <option value="sliceDownLeft" <?php selected($blueplanet_options['transition_effect'], 'sliceDownLeft') ?>><?php _e("sliceDownLeft", 'blue-planet'); ?></option>
                                    <option value="sliceUp" <?php selected($blueplanet_options['transition_effect'], 'sliceUp') ?>><?php _e("sliceUp", 'blue-planet'); ?></option>
                                    <option value="sliceUpLeft" <?php selected($blueplanet_options['transition_effect'], 'sliceUpLeft') ?>><?php _e("sliceUpLeft", 'blue-planet'); ?></option>
                                    <option value="sliceUpDown" <?php selected($blueplanet_options['transition_effect'], 'sliceUpDown') ?>><?php _e("sliceUpDown", 'blue-planet'); ?></option>
                                    <option value="sliceUpDownLeft" <?php selected($blueplanet_options['transition_effect'], 'sliceUpDownLeft') ?>><?php _e("sliceUpDownLeft", 'blue-planet'); ?></option>
                                    <option value="slideInRight" <?php selected($blueplanet_options['transition_effect'], 'slideInRight') ?>><?php _e("slideInRight", 'blue-planet'); ?></option>
                                    <option value="slideInLeft" <?php selected($blueplanet_options['transition_effect'], 'slideInLeft') ?>><?php _e("slideInLeft", 'blue-planet'); ?></option>
                                </select>
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">
                                    <label for="direction_nav">
                                        <?php _e("Direction Nav", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                <input type="radio" id="direction_nav" name="blueplanet_options[direction_nav]" value="1" <?php checked($blueplanet_options['direction_nav'], '1') ?>><?php _e("Show", 'blue-planet'); ?>
                                <input type="radio" id="direction_nav" name="blueplanet_options[direction_nav]" value="0"<?php checked($blueplanet_options['direction_nav'], '0') ?>><?php _e("Hide", 'blue-planet'); ?>
                                <span class="description"><?php _e("Next Previous buttons", 'blue-planet'); ?></span>

                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="slider_autoplay">
                                        <?php _e("Auto Play", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                <input type="radio" id="slider_autoplay" name="blueplanet_options[slider_autoplay]" value="1" <?php checked($blueplanet_options['slider_autoplay'], '1') ?>><?php _e("On", 'blue-planet'); ?>
                                <input type="radio" id="slider_autoplay" name="blueplanet_options[slider_autoplay]" value="0"<?php checked($blueplanet_options['slider_autoplay'], '0') ?>><?php _e("Off", 'blue-planet'); ?>

                                </td>
                            </tr>
                             <tr valign="top">
                                <th scope="row">
                                    <label for="transition_delay">
                                        <?php _e("Transition Delay", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[transition_delay]"
                                            value="<?php echo esc_attr($blueplanet_options['transition_delay']); ?>" />
                                    <span class="description"><?php _e("in seconds", 'blue-planet'); ?></span>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="transition_length">
                                        <?php _e("Transition Length", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[transition_length]"
                                            value="<?php echo esc_attr($blueplanet_options['transition_length']); ?>" />
                                    <span class="description"><?php _e("in seconds", 'blue-planet'); ?></span>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                   &nbsp;
                                </th>
                                <td>
                                   &nbsp;
                                </td>
                            </tr>

                            <?php for($i=0 ; $i < 5; $i++ ) : ?>
                                <tr valign="top">
                                    <th scope="row">
                                       <strong><?php _e("Slider Image", 'blue-planet'); ?> - <?php echo ($i+1);  ?></strong>
                                    </th>
                                    <td>
                                       &nbsp;
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th scope="row">
                                        <label>
                                            <?php _e("Slider Image", 'blue-planet'); ?>
                                        </label>
                                    </th>
                                    <td>
                                         <input class="upload-url regular-text" type="text" name="blueplanet_options[main_slider_image][]"
                                           value="<?php if( isset( $blueplanet_options['main_slider_image'][$i]) ) echo esc_url($blueplanet_options['main_slider_image'][$i]); ?>" class="upload" />
                                        <input id="bp_upload_button" class="bp_upload_button button" type="button"
                                               value="<?php esc_attr_e('Upload', 'blue-planet'); ?>" />
                                        <p>
                                            <?php if (!empty($blueplanet_options['main_slider_image'][$i])) { ?>
                                                <img src="<?php  echo esc_url($blueplanet_options['main_slider_image'][$i]) ; ?>" alt="" style="max-width:50%;">
                                           <?php }//end if?>
                                        </p>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th scope="row">
                                        <label>
                                            <?php _e("Slider Caption", 'blue-planet'); ?>
                                        </label>
                                    </th>
                                    <td>
                                        <textarea name="blueplanet_options[main_slider_caption][]" cols="90" rows="3"><?php
                                            if(isset($blueplanet_options['main_slider_caption'][$i]) && '' != $blueplanet_options['main_slider_caption'][$i] ){
                                                    echo esc_textarea($blueplanet_options['main_slider_caption'][$i]);
                                            }
                                            ?></textarea>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th scope="row">
                                        <label>
                                            <?php _e("Slider URL", 'blue-planet'); ?>
                                        </label>
                                    </th>
                                    <td>
                                        <input type="text" class="regular-text" id="" name="blueplanet_options[main_slider_url][]"
                                        value="<?php if( isset( $blueplanet_options['main_slider_url'][$i] )  ) echo esc_url($blueplanet_options['main_slider_url'][$i]);  ?>" />
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th scope="row">
                                        <label>
                                            <?php _e("Open in new tab", 'blue-planet'); ?>
                                        </label>
                                    </th>
                                    <td>
                                        <select name="blueplanet_options[main_slider_new_tab][]" id="">
                                            <option value="1"<?php if ( isset($blueplanet_options['main_slider_new_tab'][$i]) ) selected($blueplanet_options['main_slider_new_tab'][$i],'1'); ?>><?php _e("Yes", 'blue-planet'); ?></option>
                                            <option value="0"<?php if ( isset($blueplanet_options['main_slider_new_tab'][$i]) ) selected($blueplanet_options['main_slider_new_tab'][$i],'0'); ?>><?php _e("No", 'blue-planet'); ?></option>
                                        </select>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th scope="row">
                                       &nbsp;
                                    </th>
                                    <td>
                                       &nbsp;
                                    </td>
                                </tr>

                            <?php endfor; //end for loop ?>

                        </tbody>
                    </table>
                    <h2>
                        <?php _e("Secondary Slider", 'blue-planet'); ?>
                    </h2>
                    <table class="form-table">
                        <tbody>

                            <tr valign="top">
                                <th scope="row">
                                    <label for="slider_status_2">
                                        <?php _e("Show slider in", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <label>
                                        <input type="radio" name="blueplanet_options[slider_status_2]" id="slider_statusr"  value="home"
                                        <?php checked($blueplanet_options['slider_status_2'], 'home') ?>><?php _e("Home page Only", 'blue-planet'); ?>
                                    </label>
                                    <label>
                                        <input type="radio" name="blueplanet_options[slider_status_2]" id="slider_statusr"  value="none"
                                        <?php checked($blueplanet_options['slider_status_2'], 'none') ?>><?php _e("Disable", 'blue-planet'); ?>
                                    </label>

                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="number_of_slides_2">
                                        <?php _e("Number of slides", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[number_of_slides_2]" id="number_of_slides_2"
                                        value="<?php echo esc_attr($blueplanet_options['number_of_slides_2']); ?>" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label>
                                        <?php _e("Show slides from", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                <?php
                                $args= array(
                                    'orderby' => 'name',
                                    'hide_empty' => true,
                                    'name' => 'blueplanet_options[slider_category_2]',
                                    'selected' => $blueplanet_options['slider_category_2'],

                                    );
                                ?>
                                <?php wp_dropdown_categories( $args ); ?>
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">
                                    <label for="transition_effect_2">
                                        <?php _e("Transition Effect", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                <select name="blueplanet_options[transition_effect_2]" id="transition_effect_2">
                                    <option value="boxRain" <?php selected($blueplanet_options['transition_effect_2'], 'boxRain') ?>><?php _e("boxRain", 'blue-planet'); ?></option>
                                    <option value="boxRainGrow" <?php selected($blueplanet_options['transition_effect_2'], 'boxRainGrow') ?>><?php _e("boxRainGrow", 'blue-planet'); ?></option>
                                    <option value="boxRainReverse" <?php selected($blueplanet_options['transition_effect_2'], 'boxRainReverse') ?>><?php _e("boxRainReverse", 'blue-planet'); ?></option>
                                    <option value="boxRainGrowReverse" <?php selected($blueplanet_options['transition_effect_2'], 'boxRainGrowReverse') ?>><?php _e("boxRainGrowReverse", 'blue-planet'); ?></option>
                                    <option value="boxRandom" <?php selected($blueplanet_options['transition_effect_2'], 'boxRandom') ?>><?php _e("boxRandom", 'blue-planet'); ?></option>
                                    <option value="fade" <?php selected($blueplanet_options['transition_effect_2'], 'fade') ?>><?php _e("fade", 'blue-planet'); ?></option>
                                    <option value="fold" <?php selected($blueplanet_options['transition_effect_2'], 'fold') ?>><?php _e("fold", 'blue-planet'); ?></option>
                                    <option value="random" <?php selected($blueplanet_options['transition_effect_2'], 'random') ?>><?php _e("random", 'blue-planet'); ?></option>
                                    <option value="sliceDown" <?php selected($blueplanet_options['transition_effect_2'], 'sliceDown') ?>><?php _e("sliceDown", 'blue-planet'); ?></option>
                                    <option value="sliceDownLeft" <?php selected($blueplanet_options['transition_effect_2'], 'sliceDownLeft') ?>><?php _e("sliceDownLeft", 'blue-planet'); ?></option>
                                    <option value="sliceUp" <?php selected($blueplanet_options['transition_effect_2'], 'sliceUp') ?>><?php _e("sliceUp", 'blue-planet'); ?></option>
                                    <option value="sliceUpLeft" <?php selected($blueplanet_options['transition_effect_2'], 'sliceUpLeft') ?>><?php _e("sliceUpLeft", 'blue-planet'); ?></option>
                                    <option value="sliceUpDown" <?php selected($blueplanet_options['transition_effect_2'], 'sliceUpDown') ?>><?php _e("sliceUpDown", 'blue-planet'); ?></option>
                                    <option value="sliceUpDownLeft" <?php selected($blueplanet_options['transition_effect_2'], 'sliceUpDownLeft') ?>><?php _e("sliceUpDownLeft", 'blue-planet'); ?></option>
                                    <option value="slideInRight" <?php selected($blueplanet_options['transition_effect_2'], 'slideInRight') ?>><?php _e("slideInRight", 'blue-planet'); ?></option>
                                    <option value="slideInLeft" <?php selected($blueplanet_options['transition_effect_2'], 'slideInLeft') ?>><?php _e("slideInLeft", 'blue-planet'); ?></option>
                                </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="control_nav_2">
                                        <?php _e("Control Nav", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                <input type="radio" id="control_nav_2" name="blueplanet_options[control_nav_2]" value="1" <?php checked($blueplanet_options['control_nav_2'], '1') ?>><?php _e("Show", 'blue-planet'); ?>
                                <input type="radio" id="control_nav_2" name="blueplanet_options[control_nav_2]" value="0"<?php checked($blueplanet_options['control_nav_2'], '0') ?>><?php _e("Hide", 'blue-planet'); ?>
                                <span class="description"><?php _e("Control navigation of slider", 'blue-planet'); ?></span>

                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="direction_nav_2">
                                        <?php _e("Direction Nav", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                <input type="radio" id="direction_nav_2" name="blueplanet_options[direction_nav_2]" value="1" <?php checked($blueplanet_options['direction_nav_2'], '1') ?>><?php _e("Show", 'blue-planet'); ?>
                                <input type="radio" id="direction_nav_2" name="blueplanet_options[direction_nav_2]" value="0"<?php checked($blueplanet_options['direction_nav_2'], '0') ?>><?php _e("Hide", 'blue-planet'); ?>
                                <span class="description"><?php _e("Next Previous buttons", 'blue-planet'); ?></span>

                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="slider_autoplay_2">
                                        <?php _e("Auto Play", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                <input type="radio" id="slider_autoplay_2" name="blueplanet_options[slider_autoplay_2]" value="1" <?php checked($blueplanet_options['slider_autoplay_2'], '1') ?>><?php _e("On", 'blue-planet'); ?>
                                <input type="radio" id="slider_autoplay_2" name="blueplanet_options[slider_autoplay_2]" value="0"<?php checked($blueplanet_options['slider_autoplay_2'], '0') ?>><?php _e("Off", 'blue-planet'); ?>

                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="slider_caption_2">
                                        <?php _e("Caption", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                <input type="radio" id="slider_caption_2" name="blueplanet_options[slider_caption_2]" value="1" <?php checked($blueplanet_options['slider_caption_2'], '1') ?>><?php _e("On", 'blue-planet'); ?>
                                <input type="radio" id="slider_caption_2" name="blueplanet_options[slider_caption_2]" value="0"<?php checked($blueplanet_options['slider_caption_2'], '0') ?>><?php _e("Off", 'blue-planet'); ?>

                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="transition_delay_2">
                                        <?php _e("Transition Delay", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[transition_delay_2]"
                                            value="<?php echo esc_attr($blueplanet_options['transition_delay_2']); ?>" />
                                    <span class="description"><?php _e("in seconds", 'blue-planet'); ?></span>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="transition_length_2">
                                        <?php _e("Transition Length", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[transition_length_2]"
                                            value="<?php echo esc_attr($blueplanet_options['transition_length_2']); ?>" />
                                    <span class="description"><?php _e("in seconds", 'blue-planet'); ?></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Slider Ends -->
                <!-- Color Starts -->

                <div id="bptab-color">
                    <h2>
                        <?php _e("Color settings", 'blue-planet'); ?>
                    </h2>

                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="main_background_color">
                                        <?php _e("Main Background Color", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                <a href="<?php echo admin_url('themes.php?page=custom-background');?>" target="_blank" class="button"><?php _e("Change Background", 'blue-planet'); ?></a>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="site_title_color">
                                        <?php _e("Site Title Color", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                <a href="<?php echo admin_url('themes.php?page=custom-header');?>" target="_blank" class="button"><?php _e("Change Color", 'blue-planet'); ?></a>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
                <!-- Color Ends -->

                <!-- Navigation Starts -->

                <div id="bptab-navigation">
                    <h2>
                        <?php _e("Navigation settings", 'blue-planet'); ?>
                    </h2>

                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="create_menu">
                                        <?php _e("Create Menu", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                <a href="<?php echo admin_url('nav-menus.php?action=edit&menu=0');?>" target="_blank" class="button"><?php _e("New Menu", 'blue-planet'); ?></a>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="assign_menu">
                                        <?php _e("Assign Menu", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                <a href="<?php echo admin_url('nav-menus.php?action=locations');?>" target="_blank" class="button"><?php _e("Assign Menu", 'blue-planet'); ?></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Navigation Ends -->

                <!-- Administration Starts -->

                <div id="bptab-administration">
                    <h2>
                        <?php _e("Administration settings", 'blue-planet'); ?>
                    </h2>

                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="javascript_header">
                                        <?php _e("Javascript in Header", 'blue-planet'); ?>
                                        <p class="description"><?php _e("Enter your Javascript script code to put in HEADER", 'blue-planet'); ?></p>
                                    </label>
                                </th>
                                <td>
                                    <textarea name="blueplanet_options[javascript_header]" cols="90" rows="8"><?php echo esc_attr($blueplanet_options['javascript_header']); ?></textarea>

                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="javascript_footer">
                                        <?php _e("Javascript in Footer", 'blue-planet'); ?>
                                        <p class="description"><?php _e("Enter your Javascript script code to put in FOOTER", 'blue-planet'); ?></p>
                                    </label>
                                </th>
                                <td>
                                    <textarea name="blueplanet_options[javascript_footer]" id="javascript_footer" cols="90" rows="8"><?php echo esc_attr($blueplanet_options['javascript_footer']); ?></textarea>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- Administration Ends -->

                <!-- Social Starts -->

                <div id="bptab-social">
                    <h2>
                        <?php _e("Social settings", 'blue-planet'); ?>
                    </h2>
                    <h3 class="title"><i><?php _e("Please enter Full URL", 'blue-planet'); ?></i></h3>

                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="social_facebook">
                                        <?php _e("Facebook", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_facebook]"
                                            value="<?php echo $blueplanet_options['social_facebook']; ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="social_twitter">
                                        <?php _e("Twitter", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_twitter]"
                                            value="<?php echo esc_url($blueplanet_options['social_twitter']); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="social_googleplus">
                                        <?php _e("Google Plus", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_googleplus]"
                                            value="<?php echo esc_url($blueplanet_options['social_googleplus']); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="social_youtube">
                                        <?php _e("Youtube", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_youtube]"
                                            value="<?php echo esc_url($blueplanet_options['social_youtube']); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="social_pinterest">
                                        <?php _e("Pinterest", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_pinterest]"
                                            value="<?php echo esc_url($blueplanet_options['social_pinterest']); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="social_linkedin">
                                        <?php _e("Linkedin", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_linkedin]"
                                            value="<?php echo esc_url($blueplanet_options['social_linkedin']); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="social_vimeo">
                                        <?php _e("Vimeo", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_vimeo]"
                                            value="<?php echo esc_url($blueplanet_options['social_vimeo']); ?>" class="regular-text" />
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">
                                    <label for="social_flickr">
                                        <?php _e("Flickr", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_flickr]"
                                            value="<?php echo esc_url($blueplanet_options['social_flickr']); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="social_tumblr">
                                        <?php _e("Tumblr", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_tumblr]"
                                            value="<?php echo esc_url($blueplanet_options['social_tumblr']); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="social_dribbble">
                                        <?php _e("Dribbble", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_dribbble]"
                                            value="<?php echo esc_url($blueplanet_options['social_dribbble']); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="social_deviantart">
                                        <?php _e("deviantART", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_deviantart]"
                                            value="<?php echo esc_url($blueplanet_options['social_deviantart']); ?>" class="regular-text" />
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">
                                    <label for="social_rss">
                                        <?php _e("RSS", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_rss]"
                                            value="<?php echo esc_url($blueplanet_options['social_rss']); ?>" class="regular-text" />
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">
                                    <label for="social_instagram">
                                        <?php _e("Instagram", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_instagram]"
                                            value="<?php echo esc_url($blueplanet_options['social_instagram']); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="social_skype">
                                        <?php _e("Skype", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_skype]"
                                            value="<?php echo esc_url($blueplanet_options['social_skype']); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="social_digg">
                                        <?php _e("Digg", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_digg]"
                                            value="<?php echo esc_url($blueplanet_options['social_digg']); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="social_stumbleupon">
                                        <?php _e("Stumbleupon", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_stumbleupon]"
                                            value="<?php echo esc_url($blueplanet_options['social_stumbleupon']); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="social_forrst">
                                        <?php _e("Forrst", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_forrst]"
                                            value="<?php echo esc_url($blueplanet_options['social_forrst']); ?>" class="regular-text" />
                                </td>
                            </tr>
                             <tr valign="top">
                                <th scope="row">
                                    <label for="social_500px">
                                        <?php _e("500px", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_500px]"
                                            value="<?php echo esc_url($blueplanet_options['social_500px']); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="social_email">
                                        <?php _e("Email", 'blue-planet'); ?>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" name="blueplanet_options[social_email]"
                                            value="<?php echo esc_attr($blueplanet_options['social_email']); ?>" class="regular-text" />
                                </td>
                            </tr>



                        </tbody>
                    </table>
                </div>
                <!-- Social Ends -->


        <?php submit_button(__('Save Changes', 'blue-planet')); ?>
            </div>
        </div>
    </form>
</div>
