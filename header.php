<?php
   /**
    * The template for displaying the header of the theme.
    *
    * @author Aurelio De Rosa <aurelioderosa@gmail.com>
    * @version 1.0.3
    * @link http://wordpress.org/extend/themes/annarita
    * @package AurelioDeRosa
    * @subpackage Annarita
    * @since Annarita 1.0
    * @license http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License version 3
    */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
   <head>
      <meta charset="<?php bloginfo('charset'); ?>" />
      <title><?php wp_title(); ?></title>
      <?php
         $options = get_option('annarita_options');
         if (isset($options['favicon_checkbox']) && $options['favicon_checkbox'] == true)
            echo '<link rel="shortcut icon" href="' . $options['favicon_url'] . '" />';
      ?>
      <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
      <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Amethysta" type="font/woff">
      <!--[if lt IE 9]>
         <script src="<?php echo get_template_directory_uri(); ?>/js/html5shim.js" type="text/javascript"></script>
      <![endif]-->
      <?php
         if (is_singular())
            wp_enqueue_script('comment-reply');
         wp_head();
      ?>
   </head>
   <body <?php body_class(); ?>>
      <div id="body-wrapper">
         <?php
            if (function_exists('dynamic_sidebar') && is_active_sidebar('header-space'))
            {
               ?>
               <aside id="header-space" role="complementary">
                  <?php dynamic_sidebar('header-space'); ?>
               </aside>
               <?php
            }
         ?>
         <header class="main-header" role="banner">
            <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>" class="header-link">
               <hgroup class="alignleft">
                  <h1 id="site-title"><?php bloginfo('name'); ?></h1>
                  <h2 id="site-description"><?php bloginfo('description'); ?></h2>
               </hgroup>
            </a>
            <div id="meta" class="alignright">
               <?php wp_register('', ''); ?>
               <?php wp_loginout(get_home_url()); ?>

               <a href="<?php bloginfo('rss2_url'); ?>" title="<?php bloginfo('name'); ?> RSS Feed">
                  <img class="rss-icon" src="<?php echo get_template_directory_uri(); ?>/images/rss.png" alt="RSS Feed" />
               </a>
            </div>

            <?php get_search_form(); ?>
         </header>
         <nav class="main-menu clear-both">
            <?php
            if (function_exists('wp_nav_menu') && has_nav_menu('header-menu'))
            {
               wp_nav_menu(array(
                  'theme_location' => 'header-menu',
                  'container' => ''
               ));
            }
            else
            {
               ?>
               <ul id="menu-header" class="menu">
                  <?php
                     echo '<li class="page_item';
                     if (is_home())
                        echo ' current_page_item';
                     echo '">';
                  ?>
                     <a href="/" title="Homepage">Home</a>
                  </li>
                  <?php wp_list_pages('title_li='); ?>
               </ul>
               <?php
            }
            ?>
         </nav>