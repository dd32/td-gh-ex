<?php
/**
 * Register the settings for the theme. This is required for using the
 * WordPress Settings API.
*/
function graphene_settings_init(){
    // register options set and store it in graphene_settings db entry
    register_setting('graphene_options', 'graphene_settings', 'graphene_settings_validator');
	
	// Load the farbtastic colour picker
	if ( strstr( $_SERVER["REQUEST_URI"], 'page=graphene_options&tab=display' ) ) {
		wp_enqueue_style( 'farbtastic' );
		wp_enqueue_script( 'farbtastic' );
	}
}
add_action('admin_init', 'graphene_settings_init');

/* Include the settings validator */
include('validator.php');


/**
 * This function generates the theme's general options page in WordPress administration.
 *
 * @package WordPress
 * @subpackage Graphene
 * @since Graphene 1.0
*/
function graphene_options(){
	
	global $graphene_settings, $graphene_defaults;
	
	/* Checks if the form has just been submitted */
	if (!isset($_REQUEST['settings-updated'])) {$_REQUEST['settings-updated'] = false;} 
        
	/* Apply options preset if submitted */ 
	if (isset($_POST['graphene_preset'])) {
		include('options-presets.php');
	}
	
	/* Import the graphene theme options */
	if (isset($_POST['graphene_import'])) { 
		graphene_import_form();
		return;
	}
	
	if (isset($_POST['graphene_import_confirmed'])) {            
		graphene_import_file();
		return;                           
	}
        
        /* Uninstall the theme if confirmed */
	if (isset($_POST['graphene_uninstall_confirmed'])) { 
		include('uninstall.php');
	}       
	
	/* Display a confirmation page to uninstall the theme */
	if (isset($_POST['graphene_uninstall'])) { 
	?>

		<div class="wrap">
        <div class="icon32" id="icon-themes"><br /></div>
        <h2><?php _e('Uninstall Graphene', 'graphene'); ?></h2>
        <p><?php _e("Please confirm that you would like to uninstall the Graphene theme. All of the theme's options in the database will be deleted.", 'graphene'); ?></p>
        <p><?php _e('This action is not reversible.', 'graphene'); ?></p>
        <form action="" method="post">
        	<?php wp_nonce_field('graphene-uninstall', 'graphene-uninstall'); ?>
        	<input type="hidden" name="graphene_uninstall_confirmed" value="true" />
            <input type="submit" class="button graphene_uninstall" value="<?php _e('Uninstall Theme', 'graphene'); ?>" />
        </form>
        </div>
        
		<?php
		return;
	}
	
	/* Get the updated settings before outputting the options page */
	$graphene_settings = graphene_get_settings();
	
	/* This where we start outputting the options page */ ?>
	<div class="wrap meta-box-sortables">
		<div class="icon32" id="icon-themes"><br /></div>
        <h2><?php _e('Graphene Theme Options', 'graphene'); ?></h2>
        
        <p><?php _e('These are the global settings for the theme. You may override some of the settings in individual posts and pages.', 'graphene'); ?></p>
        
		<?php settings_errors(); ?>
        
        <?php /* Print the options tabs */ ?>
        <?php 
            if ($_GET['page'] == 'graphene_options') :
                $tabs = array(
                    'general' => __('General', 'graphene'),
                    'display' => __('Display', 'graphene'),
                    );
                $current_tab = (isset($_GET['tab'])) ? $_GET['tab'] : 'general';
                graphene_options_tabs($current_tab, $tabs); 
            endif;
        ?>
        
        <div class="left-wrap">
        
        <?php /* Begin the main form */ ?>
        <form method="post" action="options.php" class="mainform clearfix">
		
            <?php /* Output wordpress hidden form fields, e.g. nonce etc. */ ?>
            <?php settings_fields('graphene_options'); ?>
        
        
            <?php 
            
                /* Display the current tab */
                switch ($current_tab) {
                    case 'display': /* Display the Display settings */ 
                        graphene_options_display();
                        break;

                    default: /* Display the General settings */ 
                        graphene_options_general();
                        break;
                }            
            ?>
            
        
            <?php /* The form submit button */ ?>
            <p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Options', 'graphene'); ?>" /></p>
        
        <?php /* Close the main form */ ?>
        </form>
        
        </div><!-- #left-wrap -->
        
        <div class="side-wrap">
        
        <?php /* PayPal's donation button */ ?>
        <div class="postbox donation">
            <div>
        		<h3 class="hndle"><?php _e('Support the developer', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <p><?php _e('Developing this awesome theme took a lot of effort and time, months and months of continuous voluntary unpaid work. If you like this theme or if you are using it for commercial websites, please consider a donation to the developer to help support future updates and development.', 'graphene'); ?></p>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="text-align:center;">
                    <input type="hidden" name="cmd" value="_s-xclick" />
                    <input type="hidden" name="hosted_button_id" value="SJRVDSEJF6VPU" />
                    <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" />
                    <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
                </form>
            </div>
        </div>
        
        
        <?php /* Survey notification */ ?>
        <div class="postbox donation">
            <div>
        		<h3 class="hndle"><?php _e('Graphene Usage Survey', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <p><?php _e('Help us to get to know you better. Take the Graphene theme usage survey now! Every opinion counts towards making the theme better. The survey is very short, and is completely anonymous.', 'graphene'); ?></p>
                <p><a href="http://www.surveymonkey.com/s/WKJ7SQD" class="button"><?php _e('Take the survey', 'graphene'); ?> &raquo;</a></p>
            </div>
        </div>
        
        
        <?php /* Natively supported plugins */ ?>
        <div class="postbox">
        	<div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
                <h3 class="hndle"><?php _e('Add-ons and plugins', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
            	<h4><?php _e('Add-ons', 'graphene'); ?></h4>
            	<p><?php _e('Add-ons are not shipped with the theme, but can be installed separately to extend the theme\'s capability.', 'graphene'); ?></p>
                <ul class="add-ons">
                	<li>
                    	<span class="title">Graphene Mobile: </span>
                        <?php if (function_exists('mgraphene_options_init')) : ?><span class="activated"><?php _e('Installed', 'graphene'); ?></span>
                        <?php else : ?><span class="not-active"><?php _e('Not installed', 'graphene'); ?>. <a href="http://www.khairul-syahir.com/wordpress-dev/graphene-mobile"><?php _e('Learn more', 'graphene'); ?> &raquo;</a></span><?php endif; ?><br />
                        <span class="description"><?php _e('Mobile extension developed specifically for optimised display of your site on mobile devices, such as iPhone and Android devices.', 'graphene'); ?></span>
                </ul>
                
                <h4><?php _e('Plugins', 'graphene'); ?></h4>
                <p><?php _e('The plugins listed here are natively supported by the theme. All you need to do is install the plugins and activate them.', 'graphene'); ?></p>
                <ul class="add-ons native-plugins">
                	<?php 
						$plugins = array(
										array( 'name' => 'WP-PageNavi', 'function' => 'wp_pagenavi'),
										array( 'name' => 'WP-CommentNavi', 'function' => 'wp_commentnavi'),
										array( 'name' => 'WP-Email', 'function' => 'wp_email'),
										array( 'name' => 'Breadcrumb NavXT', 'function' => 'bcn_display'),
									);
						foreach ($plugins as $plugin) :
					?>
                	<li>
                    	<span class="title"><?php echo $plugin['name']; ?>: </span>
                        <?php if (function_exists($plugin['function'])) : ?><span class="activated"><?php _e('Activated', 'graphene'); ?></span>
                        <?php else : ?><span class="not-active"><?php _e('Not installed', 'graphene'); ?></span><?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
            
        
        <?php /* Options Presets. This uses separate form than the main form */ ?>
        <div class="postbox preset">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
                <h3 class="hndle"><?php _e('Options Presets', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <p><?php _e("The default settings for the theme is preconfigured for use in blogs. If you're using this theme primarily for a normal website, or if you want to reset the settings to their default values, you can apply one of the available options presets below.", 'graphene'); ?></p>
                <p><?php _e("Note that you can still configure the individual settings after you apply any preset.", 'graphene'); ?></p>
                <form action="" method="post">
                    <?php wp_nonce_field('graphene-preset', 'graphene-preset'); ?>
                	<table class="form-table">
                        <tr>
                            <th scope="row" style="width: 140px;"><?php _e('Select Options Preset', 'graphene'); ?></th>
                            <td class="options-cat-list">
                                <input type="radio" name="graphene_options_preset" value="website" id="graphene_options_preset-website" />
                                <label for="graphene_options_preset-website"><?php _e('Normal website', 'graphene'); ?></label>
                                <br />                                
                                <input type="radio" name="graphene_options_preset" value="reset" id="graphene_options_preset-reset" />
                                <label for="graphene_options_preset-reset"><?php _e('Reset to default settings', 'graphene'); ?></label>
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="graphene_preset" value="true" />
                    <input type="submit" class="button graphene_preset" value="<?php _e('Apply Options Preset', 'graphene'); ?>" />
                </form>
            </div>
        </div>
        
        
        <?php /* Theme import/export */ ?>    
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Import/export theme options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <?php if (graphene_can_import()) : ?>
                <p><strong><?php _e('Import', 'graphene'); ?></strong></p>    
                <form action="" method="post">
                    <input type="hidden" name="graphene_import" value="true" />
                    <input type="submit" class="button" value="<?php _e('Import Theme options', 'graphene'); ?>" />
                </form> <br />
                <p><strong><?php _e('Export', 'graphene'); ?></strong></p>                
                <form action="" method="post">
                	<?php wp_nonce_field('graphene-export', 'graphene-export'); ?>
                    <input type="hidden" name="graphene_export" value="true" />
                    <input type="submit" class="button" value="<?php _e('Export Theme options', 'graphene'); ?>" />
                </form>              
                <?php else : ?>
                    <p><?php printf(__('Import and export is only available for to users with PHP version 5.2.1 and higher. You are using PHP version %s.', 'graphene'), PHP_VERSION);  ?></p>
                <?php endif; ?>                
            </div>
        </div>
            
        
        <?php /* Theme's uninstall */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Uninstall theme', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <p><?php _e("<strong>Be careful!</strong> Uninstalling the theme will remove all of the theme's options from the database. Do this only if you decide not to use the theme anymore.",'graphene'); ?></p>
                <p><?php _e('If you just want to try another theme, there is no need to uninstall this theme. Simply activate the other theme in the Appearance > Themes admin page.','graphene'); ?></p>
                <p><?php _e("Note that uninstalling this theme <strong>does not remove</strong> the theme's files. To delete the files after you have uninstalled this theme, go to Appearances > Themes and delete the theme from there.",'graphene'); ?></p>
                <form action="" method="post">
                    <?php wp_nonce_field('graphene-options', 'graphene-options'); ?>
                
                    <input type="hidden" name="graphene_uninstall" value="true" />
                    <input type="submit" class="button graphene_uninstall" value="<?php _e('Uninstall Theme', 'graphene'); ?>" />
                </form>
            </div>
        </div>
            
            
         </div><!-- #side-wrap -->   
            
    </div><!-- #wrap -->
<?php    
} // Closes the graphene_options() function definition 

function graphene_options_general() { 
    
    global $graphene_settings;
    ?>
        <input type="hidden" name="graphene_general" value="true" />
        
        <?php /* Slider Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Slider Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php _e('Category to show in slider', 'graphene'); ?></label><br />
                            <small><?php _e('All posts within the category selected here will be displayed on the slider. Usage example: create a new category "Featured" and assign all posts to be displayed on the slider to that category, and then select that category here.', 'graphene'); ?></small>
                        </th>
                        <td>
                            <select name="graphene_settings[slider_cat]">
                                <option value=""><?php _e('Show latest posts', 'graphene'); ?></option>
                                <option value="posts_pages" <?php if ($graphene_settings['slider_cat'] == 'posts_pages') {echo 'selected="selected"';}?>><?php _e('Show specific posts/pages', 'graphene'); ?></option>
                                <option value="random" <?php if ($graphene_settings['slider_cat'] == 'random') {echo 'selected="selected"';}?>><?php _e('Show random posts', 'graphene'); ?></option>
                                <option value="" disabled="disabled">--------------------</option>
                                <?php /* Get the list of categories */ 
                                    $categories = get_categories();
                                    foreach ($categories as $category) :
                                ?>
                                <option value="<?php echo $category->cat_ID; ?>" <?php if ($graphene_settings['slider_cat'] == $category->cat_ID) {echo 'selected="selected"';}?>><?php echo $category->cat_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Posts and/or pages to display', 'graphene'); ?></label>
                        </th>
                        <td>
                            <input type="text" name="graphene_settings[slider_specific_posts]" value="<?php echo $graphene_settings['slider_specific_posts']; ?>" size="10" class="code" /><br />
                            <span class="description">
							<?php _e('Enter ID of posts and/or pages to be displayed, separated by comma. Example: <code>1,13,45,33</code>', 'graphene'); ?><br />
							<?php _e('Applicable only if <strong>Show specific posts/pages</strong> is selected above.', 'graphene'); ?>
                            </span>                        
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Number of posts to display', 'graphene'); ?></label>
                        </th>
                        <td>
                            <input type="text" name="graphene_settings[slider_postcount]" value="<?php echo $graphene_settings['slider_postcount']; ?>" size="3" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Slider image', 'graphene'); ?></label>
                        </th>
                        <td>
                            <select name="graphene_settings[slider_img]">
                                <option value="disabled" <?php if ($graphene_settings['slider_img'] == 'disabled') {echo 'selected="selected"';} ?>><?php _e("Don't show image", 'graphene'); ?></option>
                                <option value="featured_image" <?php if ($graphene_settings['slider_img'] == 'featured_image') {echo 'selected="selected"';} ?>><?php _e("Featured Image", 'graphene'); ?></option>
                                <option value="post_image" <?php if ($graphene_settings['slider_img'] == 'post_image') {echo 'selected="selected"';} ?>><?php _e("First image in post", 'graphene'); ?></option>
                                <option value="custom_url" <?php if ($graphene_settings['slider_img'] == 'custom_url') {echo 'selected="selected"';} ?>><?php _e("Custom URL", 'graphene'); ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Custom slider image URL', 'graphene'); ?></label>
                        </th>
                        <td>
                            <input type="text" name="graphene_settings[slider_imgurl]" value="<?php echo $graphene_settings['slider_imgurl']; ?>" size="60" class="widefat code" /><br />
                            <span class="description"><?php _e('Make sure you select Custom URL in the slider image option above to use this custom url.', 'graphene'); ?></span>                        
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Slider display style', 'graphene'); ?></label><br />
                        </th>
                        <td>
                            <select name="graphene_settings[slider_display_style]">
                                <option value="thumbnail-excerpt" <?php if ($graphene_settings['slider_display_style'] == 'thumbnail-excerpt') {echo 'selected="selected"';}?>><?php _e('Thumbnail and excerpt', 'graphene'); ?></option>
                                <option value="bgimage-excerpt" <?php if ($graphene_settings['slider_display_style'] == 'bgimage-excerpt') {echo 'selected="selected"';}?>><?php _e('Background image and excerpt', 'graphene'); ?></option>
                                <option value="full-post" <?php if ($graphene_settings['slider_display_style'] == 'full-post') {echo 'selected="selected"';}?>><?php _e('Full post content', 'graphene'); ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Slider height', 'graphene'); ?></label>
                        </th>
                        <td>
                            <input type="text" name="graphene_settings[slider_height]" value="<?php echo $graphene_settings['slider_height']; ?>" size="3" /> px                        
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Slider speed', 'graphene'); ?></label>
                        </th>
                        <td>
                            <input type="text" name="graphene_settings[slider_speed]" value="<?php echo $graphene_settings['slider_speed']; ?>" size="4" /> <?php _e('milliseconds', 'graphene'); ?><br />
                            <span class="description"><?php _e('This is the duration that each slider item will be shown', 'graphene'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Slider transition speed', 'graphene'); ?></label>
                        </th>
                        <td>
                            <input type="text" name="graphene_settings[slider_trans_speed]" value="<?php echo $graphene_settings['slider_trans_speed']; ?>" size="4" /> <?php _e('milliseconds', 'graphene'); ?><br />
                            <span class="description"><?php _e('This is the speed of the slider transition. Lower values = higher speed.', 'graphene'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Move slider to bottom of page', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="graphene_settings[slider_position]" <?php if ($graphene_settings['slider_position'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Disable slider', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="graphene_settings[slider_disable]" <?php if ($graphene_settings['slider_disable'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                </table>
            </div>
        </div>
        
        
        <?php /* Front Page Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Front Page Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">       	
                    <tr>
                        <th scope="row">
                            <label><?php _e('Front page posts categories', 'graphene'); ?></label>
                            <p>
                            	<small><?php _e('Only posts that belong to the categories selected here will be displayed on the front page. Does not affect Static Front Page.', 'graphene'); ?></small>
                            </p>
                        </th>
                        <td>
                            <select name="graphene_settings[frontpage_posts_cats][]" multiple="multiple" class="select-multiple">
                                <option value="disabled" <?php if ( in_array( 'disabled', $graphene_settings['frontpage_posts_cats'])) {echo 'selected="selected"';} ?>><?php _e( '--Disabled--', 'graphene' ); ?></option>
                                <?php /* Get the list of categories */ 
                                    $categories = get_categories();
                                    foreach ($categories as $category) :
                                ?>
                                <option value="<?php echo $category->cat_ID; ?>" <?php if ( in_array( $category->cat_ID, $graphene_settings['frontpage_posts_cats']) ) {echo 'selected="selected"';}?>><?php echo $category->cat_name; ?></option>
                                <?php endforeach; ?>
                            </select><br />
                            <span class="description"><?php _e('You may select multiple categories by holding down the CTRL key.', 'graphene'); ?></span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        
        
        <?php /* Homepage panes options */ ?>
        <div class="postbox">
            <div class="head-wrap">
            	<div title="Click to toggle" class="handlediv"><br /></div>
            	<h3 class="hndle"><?php _e('Homepage Panes', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
            	<p><?php _e('<strong>Note:</strong> homepage panes are only displayed when using a <a href="http://codex.wordpress.org/Creating_a_Static_Front_Page">static front page</a>.', 'graphene'); ?></p>
                <table class="form-table site-summary">
                	<tr>
                    	<th scope="row">
                        	<?php _e('Type of content to show', 'graphene'); ?>
                        </th>
                        <td>
                            <input type="radio" name="graphene_settings[show_post_type]" value="latest-posts" id="show_post_type-latest-posts" <?php if ($graphene_settings['show_post_type'] == 'latest-posts') {echo 'checked="checked"';} ?>/>
                            <label for="show_post_type-latest-posts"><?php _e('Latest posts', 'graphene'); ?></label>
                            
                            <input type="radio" name="graphene_settings[show_post_type]" value="cat-latest-posts" id="show_post_type-cat-latest-posts" <?php if ($graphene_settings['show_post_type'] == 'cat-latest-posts') {echo 'checked="checked"';} ?>/>
                            <label for="show_post_type-cat-latest-posts"><?php _e('Latest posts by category', 'graphene'); ?></label>
                           
                            <input type="radio" name="graphene_settings[show_post_type]" value="posts" id="show_post_type-pages" <?php if ($graphene_settings['show_post_type'] == 'posts') {echo 'checked="checked"';} ?>/>
                            <label for="show_post_type-pages"><?php _e('Posts and/or pages', 'graphene'); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Number of latest posts to display', 'graphene'); ?></label>
                        </th>
                        <td>
                            <input type="text" name="graphene_settings[homepage_panes_count]" value="<?php echo $graphene_settings['homepage_panes_count']; ?>" size="1" /><br />
                            <span class="description"><?php _e('Applicable only if <strong>Latest posts</strong> or <strong>Latest posts by category</strong> is selected above.', 'graphene'); ?></span>                        
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Category to show latest posts from', 'graphene'); ?></label>
                        </th>
                        <td>
                            <select name="graphene_settings[homepage_panes_cat]">
                                <?php /* Get the list of categories */ 
                                    foreach ($categories as $category) :
                                ?>
                                <option value="<?php echo $category->cat_ID; ?>" <?php if ($graphene_settings['homepage_panes_cat'] == $category->cat_ID) {echo 'selected="selected"';}?>><?php echo $category->cat_name; ?></option>
                                <?php endforeach; ?>
                            </select><br />
                            <span class="description"><?php _e('Applicable only if <strong>Latest posts by category</strong> is selected above.', 'graphene'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Posts and/or pages to display', 'graphene'); ?></label>
                        </th>
                        <td>
                            <input type="text" name="graphene_settings[homepage_panes_posts]" value="<?php echo $graphene_settings['homepage_panes_posts']; ?>" size="10" class="code" /><br />
                            <span class="description">
							<?php _e('Enter ID of posts and/or pages to be displayed, separated by comma. Example: <code>1,13,45,33</code>', 'graphene'); ?><br />
							<?php _e('Applicable only if <strong>Posts and/or pages</strong> is selected above.', 'graphene'); ?>
                            </span>                        
                        </td>
                    </tr>
                	<tr>
                        <th scope="row">
                        	<label for="disable_homepage_panes"><?php _e('Disable homepage panes', 'graphene'); ?></label>
                        </th>
                        <td>
                        	<input type="checkbox" value="true" name="graphene_settings[disable_homepage_panes]" id="disable_homepage_panes" <?php if ($graphene_settings['disable_homepage_panes']) {echo 'checked="checked"';} ?> />
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        
        
        <?php /* Comments Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Comments Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">       	
                    <tr>
                        <th scope="row">
                            <label><?php _e('Commenting', 'graphene'); ?></label>                            
                        </th>
                        <td>
                            <select name="graphene_settings[comments_setting]">
                                <option value="wordpress" <?php if ($graphene_settings['comments_setting'] == 'wordpress') {echo 'selected="selected"';} ?>><?php _e('Use WordPress settings', 'graphene'); ?></option>
                                <option value="disabled_pages" <?php if ($graphene_settings['comments_setting'] == 'disabled_pages') {echo 'selected="selected"';} ?>><?php _e('Disabled for pages', 'graphene'); ?></option>
                                <option value="disabled_completely" <?php if ($graphene_settings['comments_setting'] == 'disabled_completely') {echo 'selected="selected"';} ?>><?php _e('Disabled completely', 'graphene'); ?></option>                               
                            </select><br />
                            <span class="description"><?php _e('Note: this setting overrides the global WordPress Discussion Setting called "Allow people to post comments on new articles" and also the "Allow comments" option for individual posts/pages.', 'graphene'); ?></span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        
        
        <?php /* Child Page Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Child Page Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">       	
                    <tr>
                        <th scope="row">
                            <label><?php _e('Hide parent box if content is empty', 'graphene'); ?></label>                            
                        </th>
                        <td><input type="checkbox" name="graphene_settings[hide_parent_content_if_empty]" <?php if ($graphene_settings['hide_parent_content_if_empty'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Child page listings', 'graphene'); ?></label>                            
                        </th>
                        <td>
                            <select name="graphene_settings[child_page_listing]">
                                <option value="show_always" <?php if ($graphene_settings['child_page_listing'] == 'show_always') {echo 'selected="selected"';} ?>><?php _e('Show listing', 'graphene'); ?></option>
                                <option value="hide" <?php if ($graphene_settings['child_page_listing'] == 'hide') {echo 'selected="selected"';} ?>><?php _e('Hide listing', 'graphene'); ?></option>
                                <option value="show_if_parent_empty" <?php if ($graphene_settings['child_page_listing'] == 'show_if_parent_empty') {echo 'selected="selected"';} ?>><?php _e('Only show listing if parent content is empty', 'graphene'); ?></option>
                            </select>
                        </td>                            
                    </tr>
                </table>
            </div>
        </div>
        
        
        <?php /* Widget Area Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Widget Area Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
            	<h4><?php _e('Header widget area', 'graphene'); ?></h4>
                <p><?php _e('<strong>Important:</strong> This widget area is unstyled, as it is often used for advertisement banners, etc. If you enable it, make sure you style it to your needs using the Custom CSS option.', 'graphene'); ?></p>
                <table class="form-table site-summary">
                    <tr>
                        <th scope="row">
                        	<label for="enable_header_widget"><?php _e('Enable header widget area', 'graphene'); ?></label>
                        </th>
                        <td>
                        	<input type="checkbox" value="true" name="graphene_settings[enable_header_widget]" id="enable_header_widget" <?php if ($graphene_settings['enable_header_widget']) {echo 'checked="checked"';} ?> />
                        </td>
                    </tr>
                </table>
                
                
                <h4><?php _e('Alternate Widgets', 'graphene'); ?></h4>
                <p><?php _e('You can enable the theme to show different widget areas in the front page than the rest of the website. If you enable this option, additional widget areas that will only be displayed on the front page will be added to the Widget settings page.', 'graphene'); ?></p>
                <table class="form-table">       	
                    <tr>
                        <th scope="row" style="width:350px;"><label><?php _e('Enable alternate front page sidebar widget area', 'graphene'); ?></label></th>
                        <td><input type="checkbox" name="graphene_settings[alt_home_sidebar]" <?php if ($graphene_settings['alt_home_sidebar'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e('Enable alternate front page footer widget area', 'graphene'); ?></label><br />
                        <small><?php _e('You can also specify different column counts for the front page footer widget and the rest-of-site footer widget if you enable this option.', 'graphene'); ?></small>
                        </th>
                        <td><input type="checkbox" name="graphene_settings[alt_home_footerwidget]" <?php if ($graphene_settings['alt_home_footerwidget'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                </table>
            </div>
        </div>
        
        
        <?php /* Top Bar Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Top Bar Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table social-media-table">
                	<tbody>
                	<tr>
                        <th scope="row"><label><?php _e('Hide feed icon', 'graphene'); ?></label></th>
                        <td><input type="checkbox" name="graphene_settings[hide_feed_icon]"  <?php if ($graphene_settings['hide_feed_icon'] == true) echo 'checked="checked"' ?> value="true" /></td>                                    
                    </tr> 	
                    <tr>
                        <th scope="row"><label><?php _e('Use custom feed URL', 'graphene'); ?></label></th>
                        <td>
                            <input type="text" name="graphene_settings[custom_feed_url]" value="<?php echo $graphene_settings['custom_feed_url']; ?>" size="60" class="widefat code" /><br />
                            <span class="description"><?php _e('This custom feed URL will replace the default WordPress RSS feed URL.', 'graphene'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e('Twitter URL', 'graphene'); ?></label></th>
                        <td>
                            <input type="text" name="graphene_settings[twitter_url]" value="<?php echo $graphene_settings['twitter_url']; ?>" size="60" class="widefat code" /><br />
                            <span class="description"><?php _e('Enter the URL to your Twitter page.', 'graphene'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e('Facebook URL', 'graphene'); ?></label></th>
                        <td>
                            <input type="text" name="graphene_settings[facebook_url]" value="<?php echo $graphene_settings['facebook_url']; ?>" size="60" class="widefat code" /><br />
                            <span class="description"><?php _e('Enter the URL to your Facebook profile page.', 'graphene'); ?></span>
                        </td>
                    </tr>
                    
                    <?php /* Loop through the registered social media */
					$social_media = $graphene_settings['social_media'];
					// disect_it($social_media);
					if (!empty($social_media)) : 
						foreach ($social_media as $slug => $social_medium) : ?>
                            <tr class="<?php echo $slug.'-opt '; echo $slug.'-url'; ?> social-media-custom social-media-custom-name">
                            	<?php /* translators: %s will be replaced by the social media service name. Example: LinkedIn URL */ ?>
                                <th scope="row"><label><?php printf(__('%s URL', 'graphene'), $social_medium['name']); ?></label></th>
                                <td><input type="text" name="graphene_settings[social_media][<?php echo $slug; ?>][url]" value="<?php echo $social_medium['url']; ?>" size="60" class="widefat code" /></td>
                            </tr>
                            <tr class="<?php echo $slug.'-opt '; echo $slug.'-icon'; ?> social-media-custom">
                            	<?php /* translators: %s will be replaced by the social media service name. Example: LinkedIn icon URL */ ?>
                                <th scope="row"><label><?php printf(__('%s icon URL', 'graphene'), $social_medium['name']); ?></label></th>
                                <td><input type="text" name="graphene_settings[social_media][<?php echo $slug; ?>][icon]" value="<?php echo $social_medium['icon']; ?>" size="60" class="widefat code" />
                                    <input type="hidden" name="graphene_settings[social_media][<?php echo $slug; ?>][name]" value="<?php echo $social_medium['name']; ?>" />
                                    <span class="delete"><a href="#" id="<?php echo $slug.'-del'; ?>" class="social-media-del"><?php _e('Delete', 'graphene'); ?></a></span>
                                </td>
                            </tr>
					<?php endforeach; endif; ?>
                    
                    </tbody>
                </table>
                <table class="form-table">
                	<tr>
                    	<td><a href="#" id="social-media-new"><?php _e('Add new social media icon', 'graphene'); ?></a></td>
                    </tr>
                </table>
            </div>
        </div>
        
        
        <?php /* Social Sharing Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Social Sharing Buttons', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">       	
                    <tr>
                        <th scope="row"><label><?php _e('Show social sharing button', 'graphene'); ?></label></th>
                        <td><input type="checkbox" name="graphene_settings[show_addthis]" <?php if ($graphene_settings['show_addthis'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e('Show in Pages as well?', 'graphene'); ?></label></th>
                        <td><input type="checkbox" name="graphene_settings[show_addthis_page]" <?php if ($graphene_settings['show_addthis_page'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e('Social sharing buttons location', 'graphene'); ?></label></th>
                        <td>
                        	<select name="graphene_settings[addthis_location]">
                        		<option value="post-bottom" <?php if ($graphene_settings['addthis_location'] == 'post-bottom') {echo 'selected="selected"';} ?>><?php _e('Bottom of posts', 'graphene'); ?></option>
                                <option value="post-top" <?php if ($graphene_settings['addthis_location'] == 'post-top') {echo 'selected="selected"';} ?>><?php _e('Top of posts', 'graphene'); ?></option>
                                <option value="top-bottom" <?php if ($graphene_settings['addthis_location'] == 'top-bottom') {echo 'selected="selected"';} ?>><?php _e('Both top and bottom', 'graphene'); ?></option>
                        	</select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e("Your social sharing button code", 'graphene'); ?></label><br />
                            <small><?php _e('You can use codes from any popular social sharing sites, like Facebook, Digg, AddThis, etc.', 'graphene'); ?></small>
                        </th>
                        <td><textarea name="graphene_settings[addthis_code]" cols="60" rows="7" class="widefat code"><?php echo htmlentities(stripslashes($graphene_settings['addthis_code'])); ?></textarea><br />
                        	<span class="description"><?php _e("You may use these tags to get the post's URL and title:", 'graphene'); ?> <code>[#post-url]</code>, <code>[#post-title]</code></span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        
        
        
        <?php /* AdSense Options */ ?>
		<div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Adsense Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php _e('Show Adsense advertising', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="graphene_settings[show_adsense]" <?php if ($graphene_settings['show_adsense'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Show ads on front page as well', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="graphene_settings[adsense_show_frontpage]" <?php if ($graphene_settings['adsense_show_frontpage'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e("Your Adsense code", 'graphene'); ?></label>
                        </th>
                        <td><textarea name="graphene_settings[adsense_code]" cols="60" rows="10" class="widefat code"><?php echo htmlentities(stripslashes($graphene_settings['adsense_code'])); ?></textarea></td>
                    </tr>
                </table>
            </div>
        </div>
        
        
        <?php /* Google Analytics Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Google Analytics Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <p><?php _e('<strong>Note:</strong> the theme now places the Google Analytics script in the <code>&lt;head&gt;</code> element to better support the new asynchronous Google Analytics script. Please make sure you update your script to use the new asynchronous script from Google Analytics.', 'graphene'); ?></p>
                <table class="form-table">       	
                    <tr>
                        <th scope="row"><label><?php _e('Enable Google Analytics tracking', 'graphene'); ?></label></th>
                        <td><input type="checkbox" name="graphene_settings[show_ga]" <?php if ($graphene_settings['show_ga'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e("Google Analytics tracking code", 'graphene'); ?></label><br />
                        <small><?php _e('Make sure you include the full tracking code (including the <code>&lt;script&gt;</code> and <code>&lt;/script&gt;</code> tags) and not just the <code>UA-#######-#</code> code.','graphene'); ?></small>
                        </th>
                        <td><textarea name="graphene_settings[ga_code]" cols="60" rows="7" class="widefat code"><?php echo htmlentities(stripslashes($graphene_settings['ga_code'])); ?></textarea></td>
                    </tr>
                </table>
            </div>
        </div>
        
        
        <?php /* Footer Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Footer Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">       	
                    <tr>
                        <th scope="row"><label><?php _e('Show Creative Commons logo', 'graphene'); ?></label><br />
                        <span class="cc-logo">&nbsp;</span>
                        <td><input type="checkbox" name="graphene_settings[show_cc]" <?php if ($graphene_settings['show_cc'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e("Copyright text (html allowed)", 'graphene'); ?></label>
                        <br /><small><?php _e('If this field is empty, the following default copyright text will be displayed:', 'graphene'); ?></small>
                        <p style="background-color:#fff;padding:5px;border:1px solid #ddd;"><small><?php _e('Except where otherwise noted, content on this site is licensed under a <a href="http://creativecommons.org/licenses/by-nc-nd/3.0/">Creative Commons Licence</a>.','graphene'); ?></small></p>
                        </th>
                        <td><textarea name="graphene_settings[copy_text]" cols="60" rows="7"><?php echo stripslashes($graphene_settings['copy_text']); ?></textarea></td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e('Do not show copyright info', 'graphene'); ?></label></th>
                        <td><input type="checkbox" name="graphene_settings[hide_copyright]" <?php if ($graphene_settings['hide_copyright'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e('Do not show the "Return to top" link', 'graphene'); ?></label></th>
                        <td><input type="checkbox" name="graphene_settings[hide_return_top]" <?php if ($graphene_settings['hide_return_top'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                </table>
            </div>
        </div> 
        
        <?php /* Print Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Print Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">       	
                    <tr>
                        <th scope="row"><label><?php _e('Enable print CSS for single posts and pages?', 'graphene'); ?></label></th>
                        <td><input type="checkbox" name="graphene_settings[print_css]" <?php if ($graphene_settings['print_css'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e("Show print button as well?", 'graphene'); ?></label></th>
                        <td><input type="checkbox" name="graphene_settings[print_button]" <?php if ($graphene_settings['print_button'] == true) echo 'checked="checked"' ?> value="true" /></td>                        
                    </tr>
                </table>
            </div>
        </div>  

<?php } // Closes the graphene_options_general() function definition

function graphene_options_display() { 
    
    global $graphene_settings;
    ?>
        
    <input type="hidden" name="graphene_display" value="true" />
        
        <?php /* Header Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Header Display Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php _e('Use light-coloured header bars', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="graphene_settings[light_header]" <?php if ($graphene_settings['light_header'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Link header image to front page', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="graphene_settings[link_header_img]" <?php if ($graphene_settings['link_header_img'] == true) echo 'checked="checked"' ?> value="true" /><br />
                            <span class="description"><?php _e('Check this if you disable the header texts and want the header image to be linked to the front page.', 'graphene'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Disable Featured Image replacing header image', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="graphene_settings[featured_img_header]" <?php if ($graphene_settings['featured_img_header'] == true) echo 'checked="checked"' ?> value="true" /><br />
                            <span class="description"><?php _e('Check this to prevent the posts Featured Image replacing the header image regardless of the featured image dimension.', 'graphene'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Use random header image', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="graphene_settings[use_random_header_img]" <?php if ($graphene_settings['use_random_header_img'] == true) echo 'checked="checked"' ?> value="true" /><br />
                            <span class="description">
								<?php _e('Check this to show a random header image (random image taken from the available default header images).', 'graphene'); ?><br />
                                <?php _e('<strong>Note:</strong> only works on pages where a specific header image is not defined.', 'graphene'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Hide the top bar', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="graphene_settings[hide_top_bar]" <?php if ($graphene_settings['hide_top_bar'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Search box location', 'graphene'); ?></label>
                        </th>
                        <td>
                            <select name="graphene_settings[search_box_location]">
                                <option value="top_bar" <?php if ($graphene_settings['search_box_location'] == 'top_bar') {echo 'selected="selected"';} ?>><?php _e("Top bar", 'graphene'); ?></option>
                                <option value="nav_bar" <?php if ($graphene_settings['search_box_location'] == 'nav_bar') {echo 'selected="selected"';} ?>><?php _e("Navigation bar", 'graphene'); ?></option>
                                <option value="disabled" <?php if ($graphene_settings['search_box_location'] == 'disabled') {echo 'selected="selected"';} ?>><?php _e("Disable search box", 'graphene'); ?></option>             
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        
        
        <?php /* Column Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Column Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">
                    <tr>
                        <th scope="col" style="width:150px;">
                            <label><?php _e('Column mode', 'graphene'); ?></label>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <div class="column-options">
                            	<p>                           
                                <label>
                                    <input type="radio" name="graphene_settings[column_mode]" value="one-column" <?php if ($graphene_settings['column_mode'] == 'one-column') {echo 'checked="checked" ';} ?>/>
                                    <img src="<?php echo get_template_directory_uri(); ?>/admin/images/template-onecolumn.png" alt="One column" title="One column" />                                
                                </label>
                                </p>
                                
                                <p>
                                <label>
                                    <input type="radio" name="graphene_settings[column_mode]" value="two-col-left" <?php if ($graphene_settings['column_mode'] == 'two-col-left') {echo 'checked="checked" ';} ?>/>
                                    <img src="<?php echo get_template_directory_uri(); ?>/admin/images/template-twocolumnsleft.png" alt="Two columns (with sidebar right)" title="Two columns (with sidebar right)" />
                                </label>
                                <label>
                                    <input type="radio" name="graphene_settings[column_mode]" value="two-col-right" <?php if ($graphene_settings['column_mode'] == 'two-col-right') {echo 'checked="checked" ';} ?>/>
                                    <img src="<?php echo get_template_directory_uri(); ?>/admin/images/template-twocolumnsright.png" alt="Two columns (with sidebar left)" title="Two columns (with sidebar left)"/>
                                </label>
                                </p>
                                
                                <p>
                                <label>
                                    <input type="radio" name="graphene_settings[column_mode]" value="three-col-left" <?php if ($graphene_settings['column_mode'] == 'three-col-left') {echo 'checked="checked" ';} ?>/>
                                    <img src="<?php echo get_template_directory_uri(); ?>/admin/images/template-threecolumnsleft.png" alt="Three columns (with two sidebars right)" title="Three columns (with two sidebars right)" />
                                </label>
                                <label>
                                    <input type="radio" name="graphene_settings[column_mode]" value="three-col-right" <?php if ($graphene_settings['column_mode'] == 'three-col-right') {echo 'checked="checked" ';} ?>/>
                                    <img src="<?php echo get_template_directory_uri(); ?>/admin/images/template-threecolumnsright.png" alt="Three columns (with two sidebars left)" title="Three columns (with two sidebars left)" />
                                </label>
                                <label>
                                    <input type="radio" name="graphene_settings[column_mode]" value="three-col-center" <?php if ($graphene_settings['column_mode'] == 'three-col-center') {echo 'checked="checked" ';} ?>/>
                                    <img src="<?php echo get_template_directory_uri(); ?>/admin/images/template-threecolumnscenter.png" alt="Three columns (with sidebars left and right)" title="Three columns (with sidebars left and right)" />
                                </label>      
                                </p>                            
                            </div>                                                                                                              
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        
        
        <?php /* Posts Display Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Posts Display Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php _e('Hide post author', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="graphene_settings[hide_post_author]" <?php if ($graphene_settings['hide_post_author'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Post date display', 'graphene'); ?></label>
                        </th>
                        <td>
                            <select name="graphene_settings[post_date_display]">
                                <option value="hidden" <?php if ($graphene_settings['post_date_display'] == 'hidden') {echo 'selected="selected"';} ?>><?php _e('Hidden', 'graphene'); ?></option>
                                <option value="icon_no_year" <?php if ($graphene_settings['post_date_display'] == 'icon_no_year') {echo 'selected="selected"';} ?>><?php _e('As an icon (without the year)', 'graphene'); ?></option>
                                <option value="icon_plus_year" <?php if ($graphene_settings['post_date_display'] == 'icon_plus_year') {echo 'selected="selected"';} ?>><?php _e('As an icon (including the year)', 'graphene'); ?></option>
                                <option value="text" <?php if ($graphene_settings['post_date_display'] == 'text') {echo 'selected="selected"';} ?>><?php _e('As inline text', 'graphene'); ?></option>
                            </select><br />
                            <span class="description"><?php _e('Note: displaying date as inline text allows more space for the content area, especially useful for a three-column layout configuration.', 'graphene'); ?></span>
                        </td>
                    </tr>                    
                    <tr>
                        <th scope="row">
                            <label><?php _e('Hide post categories', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="graphene_settings[hide_post_cat]" <?php if ($graphene_settings['hide_post_cat'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Hide post tags', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="graphene_settings[hide_post_tags]" <?php if ($graphene_settings['hide_post_tags'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Hide post comment count', 'graphene'); ?></label><br />
                            <small><?php _e('Only affects posts listing (such as the front page) and not single post view.', 'graphene'); ?></small>                        
                        </th>
                        <td><input type="checkbox" name="graphene_settings[hide_post_commentcount]" <?php if ($graphene_settings['hide_post_commentcount'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e("Show post author's gravatar", 'graphene'); ?></label></th>
                        <td><input type="checkbox" name="graphene_settings[show_post_avatar]" <?php if ($graphene_settings['show_post_avatar'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e("Show post author's info", 'graphene'); ?></label></th>
                        <td><input type="checkbox" name="graphene_settings[show_post_author]" <?php if ($graphene_settings['show_post_author'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                </table>
            </div>
        </div>
        
        
        <?php /* Excerpts Display Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Excerpts Display Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
            	<table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php _e('Show excerpts in front page', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="graphene_settings[posts_show_excerpt]" <?php if ($graphene_settings['posts_show_excerpt'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Show full content in archive pages', 'graphene'); ?></label>
                        </th>
                        <td>
                        	<input type="checkbox" name="graphene_settings[archive_full_content]" <?php if ($graphene_settings['archive_full_content'] == true) echo 'checked="checked"' ?> value="true" /><br />
                            <span class="description"><?php _e('Note: Archive pages include the archive for category, tags, time, and search results pages. Enabling this option will cause the full content of posts and pages listed in those archives to displayed instead of the excerpt, and truncated by the Read More tag if used.', 'graphene'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e("Show More link for manual excerpts", 'graphene'); ?></label></th>
                        <td><input type="checkbox" name="graphene_settings[show_excerpt_more]" <?php if ($graphene_settings['show_excerpt_more'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e("Retain these HTML tags in excerpts", 'graphene'); ?></label></th>
                        <td>
                        	<input type="text" class="widefat code" name="graphene_settings[excerpt_html_tags]" value="<?php echo $graphene_settings['excerpt_html_tags']; ?>" /><br />
                        	<span class="description"><?php _e("Enter the HTML tags you'd like to retain in excerpts. For example, enter <code>&lt;p&gt;&lt;ul&gt;&lt;li&gt;</code> to retain <code>&lt;p&gt;</code>, <code>&lt;ul&gt;</code>, and <code>&lt;li&gt;</code> HTML tags.", 'graphene'); ?></span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
      
        
        
        <?php /* Comments Display Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Comments Display Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php _e('Hide allowed tags in comment form', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="graphene_settings[hide_allowedtags]" <?php if ($graphene_settings['hide_allowedtags'] == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                </table>
            </div>
        </div>
        
        
        <?php /* Background Colours Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Colours Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
            	<p><?php _e("Changing colours for your website involves a lot more than just trial and error. Simply mixing and matching colours without regard to their compatibility may do more damage than good to your site's aesthetics.", 'graphene'); ?>
				<?php printf(__("It's generally a good idea to stick to colours from colour pallettes that are aesthetically pleasing. Try the %s website for a kickstart on some colour palettes you can use.", 'graphene'), '<a href="http://www.colourlovers.com/palettes/">COLOURlovers</a>'); ?></p>
                <p><?php _e("When you've got the perfect combination, you can even share it with fellow Graphene theme users through the <a href=\"http://forum.khairul-syahir.com/\">Support Forum</a>.", 'graphene'); ?></p>
            	<p><?php _e('<strong>Note:</strong> The previews work best on modern Gecko- and Webkit-based browsers, such as Mozilla Firefox and Google Chrome.', 'graphene'); ?></p>
            	<h4><?php _e('Content area', 'graphene'); ?></h4>
                <table class="form-table">
                	<?php 
						$colour_opts = array(
							'bg_content_wrapper' => array('title' => __('Main content wrapper background', 'graphene')),
							'bg_content' => array('title' => __('Post and pages content background', 'graphene')),
							'bg_meta_border' => array('title' => __('Post meta and footer border', 'graphene')),
							'bg_post_top_border' => array('title' => __('Post and pages top border', 'graphene')),
							'bg_post_bottom_border' => array('title' => __('Post and pages bottom border', 'graphene')),
						);
						
						$counter = 1;
						foreach ($colour_opts as $key => $colour_opt) :
					?>
                    <tr>
                        <th scope="row"><label><?php echo $colour_opt['title']; ?></label></th>
                        <td>
                        	<input type="text" class="code color-<?php echo $counter; ?>" name="graphene_settings[<?php echo $key; ?>]" value="<?php echo $graphene_settings[$key]; ?>" />
                        	<a href="#" class="clear-color"><?php _e('Clear', 'graphene'); ?></a>
                            <div class="colorpicker" id="colorpicker-<?php echo $counter; ?>"></div>
                        </td>
                    </tr>
                    <?php $counter++; endforeach; ?>
                </table>
                
                <h4><?php _e('Widgets', 'graphene'); ?></h4>
                <table class="form-table">
                	<tr>
                    	<th scope="row"><label><?php _e('Widget preview', 'graphene'); ?></label></th>
                        <td><div class="sidebar graphene"><div class="sidebar-wrap"><h3><?php _e('Widget title', 'graphene'); ?></h3><ul><li><?php _e('List item', 'graphene'); ?> 1</li><li><?php _e('List item', 'graphene'); ?> 2</li><li><a href="#"><?php _e('List item', 'graphene'); ?> 3</a></li></ul></div></div></td>
                    </tr>
                	<?php 
						$colour_opts = array(
							'bg_widget_item' => array('title' => __('Widget item background', 'graphene')),
							'bg_widget_list' => array('title' => __('Widget item list border', 'graphene')),
							'bg_widget_header_border' => array('title' => __('Widget header border', 'graphene')),
							'bg_widget_title' => array('title' => __('Widget title colour', 'graphene')),
							'bg_widget_title_textshadow' => array('title' => __('Widget title text shadow colour', 'graphene')),
							'bg_widget_header_bottom' => array('title' => __('Widget header gradient bottom colour', 'graphene')),
							'bg_widget_header_top' => array('title' => __('Widget header gradient top colour', 'graphene')),
						);

						foreach ($colour_opts as $key => $colour_opt) :
					?>
                    <tr>
                        <th scope="row"><label><?php echo $colour_opt['title']; ?></label></th>
                        <td>
                        	<input type="text" class="code color-<?php echo $counter.' '.str_replace('_', '-', $key); ?>" name="graphene_settings[<?php echo $key; ?>]" value="<?php echo $graphene_settings[$key]; ?>" />
                        	<a href="#" class="clear-color"><?php _e('Clear', 'graphene'); ?></a>
                            <div class="colorpicker" id="colorpicker-<?php echo $counter; ?>"></div>
                        </td>
                    </tr>
                    <?php $counter++; endforeach; ?>
                    
                </table>
                
                <h4><?php _e('Slider', 'graphene'); ?></h4>
                <table class="form-table">
                	<tr>
                    	<th scope="row"><label><?php _e('Slider background preview', 'graphene'); ?></label></th>
                        <td><div id="grad-box"></div></td>
                    </tr>
                	<?php 
						$colour_opts = array(
							'bg_slider_top' => array('title' => __('Slider top left colour', 'graphene')),
							'bg_slider_bottom' => array('title' => __('Slider bottom right colour', 'graphene')),
						);

						foreach ($colour_opts as $key => $colour_opt) :
					?>
                    <tr>
                        <th scope="row"><label><?php echo $colour_opt['title']; ?></label></th>
                        <td>
                        	<input type="text" class="code color-<?php echo $counter.' '.str_replace('_', '-', $key); ?>" name="graphene_settings[<?php echo $key; ?>]" value="<?php echo $graphene_settings[$key]; ?>" />
                        	<a href="#" class="clear-color"><?php _e('Clear', 'graphene'); ?></a>
                            <div class="colorpicker" id="colorpicker-<?php echo $counter; ?>"></div>
                        </td>
                    </tr>
                    <?php $counter++; endforeach; ?>
                    
                </table>
                
                <h4><?php _e('Block buttons', 'graphene'); ?></h4>
                <table class="form-table">
                	<tr>
                    	<th scope="row"><label><?php _e('Block button preview', 'graphene'); ?></label></th>
                        <td><a class="block-button" href="#"><?php _e('Button label', 'graphene'); ?></a></td>
                    </tr>
                	<?php 
						$colour_opts = array(
							'bg_button' => array('title' => __('Button background colour', 'graphene')),
							'bg_button_label' => array('title' => __('Button label colour', 'graphene')),
							'bg_button_label_textshadow' => array('title' => __('Button label text shadow', 'graphene')),
						);

						foreach ($colour_opts as $key => $colour_opt) :
					?>
                    <tr>
                        <th scope="row"><label><?php echo $colour_opt['title']; ?></label></th>
                        <td>
                        	<input type="text" class="code color-<?php echo $counter.' '.str_replace('_', '-', $key); ?>" name="graphene_settings[<?php echo $key; ?>]" value="<?php echo $graphene_settings[$key]; ?>" />
                        	<a href="#" class="clear-color"><?php _e('Clear', 'graphene'); ?></a>
                            <div class="colorpicker" id="colorpicker-<?php echo $counter; ?>"></div>
                        </td>
                    </tr>
                    <?php $counter++; endforeach; ?>
                    
                </table>
            </div>
        </div>
        
            
        <?php /* Text Style Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Text Style Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <p><?php _e('Note that these are CSS properties, so any valid CSS values for each particular property can be used.', 'graphene'); ?></p>
                <p><?php _e('Some example CSS properties values:', 'graphene'); ?></p>
                <table class="graphene-code-example">
                    <tr>
                        <th scope="row"><?php _e('Text font:', 'graphene'); ?></th>
                        <td><code>arial</code>, <code>tahoma</code>, <code>georgia</code>, <code>'Trebuchet MS'</code></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e('Text size and line height:', 'graphene'); ?></th>
                        <td><code>12px</code>, <code>12pt</code>, <code>12em</code></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e('Text weight:', 'graphene'); ?></th>
                        <td><code>normal</code>, <code>bold</code>, <code>100</code>, <code>700</code></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e('Text style:', 'graphene'); ?></th>
                        <td><code>normal</code>, <code>italic</code>, <code>oblique</code></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e('Text colour:', 'graphene'); ?></th>
                        <td><code>blue</code>, <code>navy</code>, <code>red</code>, <code>#ff0000</code></td>
                    </tr>        
                </table>
                
                <h4><?php _e('Header Text', 'graphene'); ?></h4>
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php _e('Title text font', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="graphene_settings[header_title_font_type]" value="<?php echo $graphene_settings['header_title_font_type']; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Title text size', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="graphene_settings[header_title_font_size]" value="<?php echo $graphene_settings['header_title_font_size']; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Title text weight', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="graphene_settings[header_title_font_weight]" value="<?php echo $graphene_settings['header_title_font_weight']; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Title text line height', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="graphene_settings[header_title_font_lineheight]" value="<?php echo $graphene_settings['header_title_font_lineheight']; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Title text style', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="graphene_settings[header_title_font_style]" value="<?php echo $graphene_settings['header_title_font_style']; ?>" /></td>
                    </tr>
                </table>
                
                <table class="form-table" style="margin-top:30px;">               
                    <tr>
                        <th scope="row">
                            <label><?php _e('Description text font', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="graphene_settings[header_desc_font_type]" value="<?php echo $graphene_settings['header_desc_font_type']; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Description text size', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="graphene_settings[header_desc_font_size]" value="<?php echo $graphene_settings['header_desc_font_size']; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Description text weight', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="graphene_settings[header_desc_font_weight]" value="<?php echo $graphene_settings['header_desc_font_weight']; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Description text line height', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="graphene_settings[header_desc_font_lineheight]" value="<?php echo $graphene_settings['header_desc_font_lineheight']; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Description text style', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="graphene_settings[header_desc_font_style]" value="<?php echo $graphene_settings['header_desc_font_style']; ?>" /></td>
                    </tr>
                </table>
                
                <h4><?php _e('Content Text', 'graphene'); ?></h4>
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php _e('Text font', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="graphene_settings[content_font_type]" value="<?php echo $graphene_settings['content_font_type']; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Text size', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="graphene_settings[content_font_size]" value="<?php echo $graphene_settings['content_font_size']; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Text line height', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="graphene_settings[content_font_lineheight]" value="<?php echo $graphene_settings['content_font_lineheight']; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Text colour', 'graphene'); ?></label>
                        </th>
                        <td>
                        	<input type="text" class="code color-<?php echo $counter; ?>" name="graphene_settings[content_font_colour]" value="<?php echo $graphene_settings['content_font_colour']; ?>" />
                            <a href="#" class="clear-color"><?php _e('Clear', 'graphene'); ?></a>
                            <div class="colorpicker" id="colorpicker-<?php echo $counter; $counter++; ?>"></div>
                        </td>
                    </tr>
                </table>
                    
                <h4><?php _e('Link Text', 'graphene'); ?></h4>
                <table class="form-table">
                	<?php 
						$colour_opts = array(
							'link_colour_normal' => array('title' => __('Link colour (normal state)', 'graphene')),
							'link_colour_visited' => array('title' => __('Link colour (visited state)', 'graphene')),
							'link_colour_hover' => array('title' => __('Link colour (hover state)', 'graphene')),
						);

						foreach ($colour_opts as $key => $colour_opt) :
					?>
                    <tr>
                        <th scope="row"><label><?php echo $colour_opt['title']; ?></label></th>
                        <td>
                        	<input type="text" class="code color-<?php echo $counter.' '.str_replace('_', '-', $key); ?>" name="graphene_settings[<?php echo $key; ?>]" value="<?php echo $graphene_settings[$key]; ?>" />
                        	<a href="#" class="clear-color"><?php _e('Clear', 'graphene'); ?></a>
                            <div class="colorpicker" id="colorpicker-<?php echo $counter; ?>"></div>
                        </td>
                    </tr>
                    <?php $counter++; endforeach; ?>

                    <tr>
                        <th scope="row">
                            <label><?php _e('Text decoration (normal state)', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="graphene_settings[link_decoration_normal]" value="<?php echo $graphene_settings['link_decoration_normal']; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Text decoration (hover state)', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="graphene_settings[link_decoration_hover]" value="<?php echo $graphene_settings['link_decoration_hover']; ?>" /></td>
                    </tr>
                </table>
            </div>
        </div>
		
        
        <?php /* Footer Widget Display Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Footer Widget Display Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">        
                <table class="form-table">
                    <tr>
                        <th scope="row" style="width:260px;">
                            <label><?php _e('Number of columns to display', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="graphene_settings[footerwidget_column]" value="<?php echo $graphene_settings['footerwidget_column']; ?>" maxlength="2" size="3" /></td>
                    </tr>
                    <?php if ($graphene_settings['alt_home_footerwidget']) : ?>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Number of columns to display for front page footer widget', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="graphene_settings[alt_footerwidget_column]" value="<?php echo $graphene_settings['alt_footerwidget_column']; ?>" maxlength="2" size="3" /></td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
            
        
        <?php /* Navigation Menu Display Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Navigation Menu Display Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php _e('Dropdown menu item width', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="graphene_settings[navmenu_child_width]" value="<?php echo $graphene_settings['navmenu_child_width']; ?>" maxlength="3" size="3" /> px</td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Description for default menu "Home" item', 'graphene'); ?></label>
                        </th>
                        <td>
                        	<input type="text" size="60" name="graphene_settings[navmenu_home_desc]" value="<?php echo $graphene_settings['navmenu_home_desc']; ?>" /><br />
                            <span class="description"><?php _e('Only required if you need a description in the navigation menu and you are not using a custom menu.', 'graphene'); ?></span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        
            
        <?php /* Miscellaneous Display Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Miscellaneous Display Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <h4><?php _e('Site title options', 'graphene'); ?></h4>
                <p><?php _e('Use these tags to customise your own site title structure: <code>#site-name</code>, <code>#site-desc</code>, <code>#post-title</code>', 'graphene'); ?></p>
                <table class="form-table">
                	<tr>
                        <th scope="row" style="width:250px;">
                        	<label><?php _e("Custom front page site title", 'graphene'); ?></label>
                        </th>
                        <td>
                        	<input type="text" name="graphene_settings[custom_site_title_frontpage]" id="custom_site_title_frontpage" class="widefat code" value="<?php echo stripslashes($graphene_settings['custom_site_title_frontpage']); ?>" />
                            <span class="description"><?php _e('Defaults to <code>#site-name &raquo; #site-desc</code>. The <code>#post-title</code> tag cannot be used here.', 'graphene'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" style="width:250px;">
                        	<label><?php _e("Custom content pages site title", 'graphene'); ?></label>
                        </th>
                        <td>
                        	<input type="text" name="graphene_settings[custom_site_title_content]" id="custom_site_title_content" class="widefat code" value="<?php echo stripslashes($graphene_settings['custom_site_title_content']); ?>" />
                            <span class="description"><?php _e('Defaults to <code>#post-title &raquo; #site-name</code>.', 'graphene'); ?></span>
                        </td>
                    </tr>
                </table>
                
                <h4><?php _e('Favicon options', 'graphene'); ?></h4>
                <table class="form-table">
                    <tr>
                        <th scope="row" style="width:250px;">
                        	<label for="favicon_url"><?php _e('Favicon URL', 'graphene'); ?></label>
                        </th>
                        <td>
                        	<input type="text" class="widefat code" value="<?php echo $graphene_settings['favicon_url']; ?>" name="graphene_settings[favicon_url]" id="favicon_url" />
                            <span class="description"><?php _e('Simply enter the full URL to your favicon file here to enable favicon. Make sure you include the <code>http://</code> in front of the URL as well.', 'graphene'); ?></span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
                    
                    
        <?php /* Custom CSS */ ?>
        <div class="postbox">
            <div class="head-wrap">
            	<div title="Click to toggle" class="handlediv"><br /></div>
            	<h3 class="hndle"><?php _e('Custom CSS', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">
                    <tr>
                        <th scope="row"><label><?php _e('Custom CSS styles', 'graphene'); ?></label></th>
                        <td>
                        	<span class="description"><?php _e("You can enter your own CSS codes below to modify any other aspects of the theme's appearance that is not included in the options.", 'graphene'); ?></span>
                        	<textarea name="graphene_settings[custom_css]" cols="60" rows="20" class="widefat code"><?php echo stripslashes($graphene_settings['custom_css']); ?></textarea>
                        </td>
                    </tr>
                </table>
            </div>
        </div>                  
        
<?php } // Closes the graphene_options_display() function definition 

function graphene_import_form(){            
    
    $bytes = apply_filters( 'import_upload_size_limit', wp_max_upload_size() );
    $size = wp_convert_bytes_to_hr( $bytes );
    $upload_dir = wp_upload_dir();
    if ( ! empty( $upload_dir['error'] ) ) :
        ?><div class="error"><p><?php _e('Before you can upload your import file, you will need to fix the following error:', 'graphene'); ?></p>
            <p><strong><?php echo $upload_dir['error']; ?></strong></p></div><?php
    else :
    ?>
    <div class="wrap">
        <div id="icon-tools" class="icon32"><br></div>
        <h2><?php echo __( 'Import Graphene Theme Options', 'graphene' );?></h2>    
        <form enctype="multipart/form-data" id="import-upload-form" method="post" action="">
        	<p><?php _e('<strong>Note:</strong> This is an experimental feature. Please report any problem at the <a href="http://forum.khairul-syahir.com/forum/bug-report">Support Forum</a>.', 'graphene'); ?></p>
            <p>
                <label for="upload"><?php _e( 'Choose a file from your computer:', 'graphene'); ?></label> (<?php printf( __('Maximum size: %s' ), $size ); ?>)
                <input type="file" id="upload" name="import" size="25" />
                <input type="hidden" name="action" value="save" />
                <input type="hidden" name="max_file_size" value="<?php echo $bytes; ?>" />
                <?php wp_nonce_field('graphene-import', 'graphene-import'); ?>
                <input type="hidden" name="graphene_import_confirmed" value="true" />
            </p>
            <input type="submit" class="button" value="<?php _e('Upload file and import', 'graphene'); ?>" />            
        </form>
    </div> <!-- end wrap -->
    <?php
    endif;
} // Closes the graphene_import_form() function definition 

include('options-import.php');
?>