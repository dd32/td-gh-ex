<?php
/*
 * best startup Main Sidebar
 */
function best_startup_widgets_init() {
    register_sidebar(array(
        'name' => __('Main Sidebar', 'best-startup'),
        'id' => 'sidebar-1',
        'description' => __('Main sidebar that appears on the right.', 'best-startup'),
        'before_widget' => '<aside id="%1$s" class="menu-left widget widget_recent_entries %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h6>',
        'after_title' => '</h6>',
    ));
    register_sidebar(array(
        'name' => __('Footer 1', 'best-startup'),
        'id' => 'footer-1',
        'description' => __('Footer that appears on the down.', 'best-startup'),
        'before_widget' => '<aside id="%1$s" class="footer-widget widget widget_recent_entries %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer 2', 'best-startup'),
        'id' => 'footer-2',
        'description' => __('Footer that appears on the down.', 'best-startup'),
        'before_widget' => '<aside id="%1$s" class="footer-widget widget widget_recent_entries %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer 3', 'best-startup'),
        'id' => 'footer-3',
        'description' => __('Footer that appears on the down.', 'best-startup'),
        'before_widget' => '<aside id="%1$s" class="footer-widget widget widget_recent_entries %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer 4', 'best-startup'),
        'id' => 'footer-4',
        'description' => __('Footer that appears on the down.', 'best-startup'),
        'before_widget' => '<aside id="%1$s" class="footer-widget widget widget_recent_entries %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'best_startup_widgets_init');
/**
 * Set up post entry meta.    
 * Meta information for current post: categories, tags, permalink, author, and date.    
 * */
function best_startup_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
} 

function best_startup_entry_meta() {
	$BestStartupCategoriesList = get_the_category_list(', ','');
	$BestStartupTagList = get_the_tag_list('', ', ' );
	$BestStartupAuthor= ucfirst(get_the_author());
	$BestStartupAuthorUrl= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
	$BestStartupComments = wp_count_comments(get_the_ID()); 	
	$BestStartupDate = sprintf('<time datetime="%1$s">%2$s</time>', esc_attr(get_the_date('c')), esc_html(get_the_date('F d , Y')));
?>	
    <p><?php _e('By : ', 'best-startup'); ?><a href="<?php echo $BestStartupAuthorUrl; ?>" rel="tag"><?php echo $BestStartupAuthor; ?></a> - <?php echo $BestStartupDate; ?></p>
<?php 	
}

require_once get_template_directory() . '/functions/class-tgm-plugin-activation.php';
/*
* TGM plugin activation register hook 
*/
add_action( 'tgmpa_register', 'best_startup_action_tgm_plugin_active_register_required_plugins' );
function best_startup_action_tgm_plugin_active_register_required_plugins() {
    if(class_exists('TGM_Plugin_Activation')){
      $plugins = array(
        array(
           'name'      => __('Page Builder by SiteOrigin','best-startup'),
           'slug'      => 'siteorigin-panels',
           'required'  => false,
        ),
        array(
           'name'      => __('SiteOrigin Widgets Bundle','best-startup'),
           'slug'      => 'so-widgets-bundle',
           'required'  => false,
        ),
        array(
           'name'      => __('Contact Form 7','best-startup'),
           'slug'      => 'contact-form-7',
           'required'  => false,
        ),
      );
      $config = array(
        'default_path' => '',
        'menu'         => 'best-startup-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
        'strings'      => array(
           'page_title'                      => __( 'Install Required Plugins', 'best-startup' ),
           'menu_title'                      => __( 'Install Plugins', 'best-startup' ),
           'installing'                      => __( 'Installing Plugin: %s', 'best-startup' ), 
           'oops'                            => __( 'Something went wrong with the plugin API.', 'best-startup' ),
           'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','best-startup' ), 
           'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','best-startup' ), 
           'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','best-startup' ), 
           'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','best-startup' ), 
           'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','best-startup' ), 
           'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','best-startup' ), 
           'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','best-startup' ), 
           'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','best-startup' ), 
           'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins','best-startup' ),
           'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins','best-startup' ),
           'return'                          => __( 'Return to Required Plugins Installer', 'best-startup' ),
           'plugin_activated'                => __( 'Plugin activated successfully.', 'best-startup' ),
           'complete'                        => __( 'All plugins installed and activated successfully. %s', 'best-startup' ), 
           'nag_type'                        => 'updated'
        )
      );
      tgmpa( $plugins, $config );
    }
}

require get_template_directory() . '/functions/enqueue-files.php';
require get_template_directory() . '/functions/theme-customization.php';