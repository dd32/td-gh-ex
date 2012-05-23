<?php
/**
 * The functions of the theme. Sets up the theme and provides some helper functions.
 * Some helper functions are used in the theme as custom template tags.
 * Others are attached to action and filter hooks in WordPress to change core functionality.
 *
 * @author Aurelio De Rosa <aurelioderosa@gmail.com>
 * @version 1.0
 * @link http://wordpress.org/extend/themes/annarita
 * @package AurelioDeRosa
 * @subpackage Annarita
 * @since Annarita 1.0
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License version 3
 */
function annarita_setup()
{
   global $content_width;
   if ( ! isset( $content_width ) )
      $content_width = 630;
   load_theme_textdomain('annarita', get_template_directory() . '/languages');
}

function annarita_setup_scripts()
{
   wp_enqueue_script('jquery');
   wp_enqueue_script('superfish-hover', get_template_directory_uri() . '/js/hoverIntent.js');
   wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js');
   wp_enqueue_script('jquery-cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array('jquery'));
   wp_enqueue_script('annarita-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'));
   wp_localize_script(
           'annarita-functions',
           'objectL10n',
           array(
               'sticky' => __('Sticky post', 'annarita')
           )
   );
}

function annarita_setup_styles()
{
   if (is_admin())
      wp_enqueue_style('annarita-admin', get_template_directory_uri() . '/css/admin.css');
   else
   {
      wp_enqueue_style('annarita-print', get_template_directory_uri() . '/css/print.css', array(), false, 'print');
      wp_enqueue_style('superfish', get_template_directory_uri() . '/css/superfish.css');
      wp_enqueue_style('annarita-rating', get_template_directory_uri() . '/css/rating.css');
   }
}

function annarita_get_posts($query)
{
   if (is_home() && $query->is_main_query() || is_feed())
      $query->set('post_type', array('post', 'annarita_review'));

   return $query;
}

function annarita_register_sidebars()
{
   $paramsWrapper = array(
       array(
           'name' => __('Sidebar left', 'annarita'),
           'id' => 'sidebar-left',
           'before_widget' => '<div id="%1$s" class="widget %2$s">',
           'after_widget' => '</div>'
       ),
       array(
           'name' => __('Sidebar right', 'annarita'),
           'id' => 'sidebar-right',
           'before_widget' => '<div id="%1$s" class="widget %2$s">',
           'after_widget' => '</div>'
       ),
       array(
           'name' => __('Header space', 'annarita'),
           'id' => 'header-space',
           'before_widget' => '',
           'after_widget' => ''
       ),
       array(
           'name' => __('Footer space', 'annarita'),
           'id' => 'footer-space',
           'before_widget' => '',
           'after_widget' => ''
       )
   );
   if (function_exists('register_sidebars'))
   {
      foreach ($paramsWrapper as $params)
         register_sidebar($params);
   }
}

function annarita_register_post_type()
{
   if (function_exists('register_post_type'))
   {
      register_post_type(
            'annarita_review',
            array(
                  'label' => 'reviews',
                  'labels' => array(
                      'name' => __('Reviews', 'annarita'),
                      'singular_name' => __('Review', 'annarita')
                  ),
                  'description' => __('Use this post type to create reviews', 'annarita'),
                  'public' => true,
                  'menu_position' => 25,
                  'rewrite' => array('slug' => __('reviews', 'annarita')),
                  'taxonomies' => array('category', 'post_tag'),
                  'menu_icon' => ''
            )
      );

      add_post_type_support(
              'annarita_review',
              array(
                  'title',
                  'editor',
                  'author',
                  'thumbnail',
                  'excerpt',
                  'trackbacks',
                  'custom-fields',
                  'comments',
                  'revisions',
                  'page-attributes',
                  'post-formats'
              )
      );
   }
}

function annarita_register_menus()
{
   if (function_exists('register_nav_menus'))
   {
      $params = array(
          'header-menu' => __('Header Menu', 'annarita'),
          'footer-menu' => __('Footer Menu', 'annarita')
      );
      register_nav_menus($params);
   }
}

function annarita_excerpt_more($more)
{
   global $post;
   return '<br /><a href="' . get_permalink($post->ID) . '" title="' .
          esc_attr(strip_tags($post->post_title)) . '" >' . __('Read more', 'annarita') . '...</a>';
}

function annarita_title_filter($old_title, $sep = '&raquo;', $sep_location = 'right')
{
   $title = '';

   if (is_home())
      $title = bloginfo('name');
   else if (is_category())
      $title = __('Category', 'annarita') . ' ';
   else if (is_tag())
      $title = __('Tag', 'annarita') . ' ';
   else if (is_author())
      $title = __('Author', 'annarita') . ' ';
   else if (is_year() || is_month() || is_day())
      $title = __('Archive', 'annarita') . ' ';

   if ($title == '' && strpos($old_title, " $sep ") == 0)
      $old_title = preg_replace ("/ $sep /", '', $old_title, 1);
   $title .= $old_title;

   if (get_query_var('paged'))
      $num = " $sep page " . get_query_var('paged');
   else if (get_query_var('page'))
      $num = " $sep page " . get_query_var('page');
   else
      $num = '';

   return $title . $num;
}

function annarita_get_related_posts($post_id, $number_of_posts = 5)
{
   $posts = array();

   $tags = get_the_tags($post_id);
   if (is_array($tags) && count($tags) > 0)
   {
      $tag_ids = array();
      foreach($tags as $tag)
         array_push($tag_ids, $tag->term_id);
      unset($tags);
      $query = new wp_query(array(
         'tag__in' => $tag_ids,
         'post__not_in' => array($post_id),
         'showposts' => $number_of_posts,
         'orderby' => 'rand',
         'ignore_sticky_posts' => true
      ));

      $posts = $query->get_posts();
   }

   return $posts;
}

function annarita_comment_template($comment, $args, $depth)
{
   $GLOBALS['comment'] = $comment;
   ?>
   <article <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
      <footer>
         <small class="comment-author vcard">
            <?php echo get_avatar($comment->comment_author_email, 48, null, __('Author avatar', 'annarita')); ?>
            <span class="nickname"><?php comment_author_link(); ?></span> <?php _e('at', 'annarita'); ?>
            <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"
               title="<?php echo __('Comment written at', 'annarita') . ' ' . date_i18n(get_option('date_format'), get_comment_time('U')); ?> ">
               <time datetime="<?php comment_time('c'); ?>" pubdate="pubdate">
                  <?php echo date_i18n(get_option('date_format') . ' ' . get_option('time_format'), get_comment_time('U')); ?>
               </time>
            </a>
            <?php echo __('wrote', 'annarita') . ':'; ?>
         </small>
      </footer>
      <?php
         if ($comment->comment_approved == '0')
            printf('<p><em>%s</em></p>', __('Your comment is awaiting moderation.', 'annarita'));
         else
            comment_text();
      ?>
      <div class="meta">
         <?php
            edit_comment_link(__('Edit', 'annarita'), '',' | ');
            comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
         ?>
      </div>
   </article>
<?php
}

function annarita_get_post_class($classes)
{
   global $post;
   if ($post->post_type == 'annarita_review')
   {
      $classes = array_merge($classes, array('hreview'));
      $key = array_search('hentry', $classes);
      if ($key !== FALSE)
         unset($classes[$key]);
   }

   return $classes;
}

function annarita_get_real_meta($meta)
{
   if (!is_array($meta))
      return $meta;

   foreach($meta as $key => $value)
   {
      if ($key[0] == '_')
         unset($meta[$key]);
   }

   return $meta;
}

function annarita_ping_template($comment, $args, $depth)
{
   $GLOBALS['comment'] = $comment;
   ?>
   <li <?php comment_class(); ?>>
      <a href="" id="comment-<?php comment_ID() ?>">
         <?php comment_author_link(); ?>
      </a>
   </li>
<?php
}

function annarita_header_style()
{
   ?>
   <style type="text/css">
      header.main-header
      {
         background-image: url('<?php header_image(); ?>');
         width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
         height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
      }

      a.header-link
      {
         <?php
         if (get_header_textcolor() == 'blank')
            echo 'display: none;';
         else
            echo 'color: #' . get_header_textcolor() . ';';
         ?>
      }
   </style>
   <?php
}

function annarita_admin_header_style()
{
    ?><style type="text/css">
        #headimg
        {
           background-image: url('<?php header_image(); ?>');
           width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
           height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
           background: no-repeat;
        }
    </style><?php
}

function annarita_init_sidebar()
{
   ?>
   <script>
      toggleSidebar('left-sidebar');
      toggleHiderLabel('hide-left');
      toggleSidebar('right-sidebar');
      toggleHiderLabel('hide-right');
   </script>
   <?php
}

function annarita_show_hide_sidebar()
{
   ?>
   initCookie();
   jQuery('#hide-left').click(
      function()
      {
         toggleCookie('left-sidebar');
      }
   );
   jQuery('#hide-right').click(
      function()
      {
         toggleCookie('right-sidebar');
      }
   );
   <?php
}

require_once TEMPLATEPATH . '/includes/settings.php';
require_once TEMPLATEPATH . '/includes/meta_box.php';
require_once TEMPLATEPATH . '/includes/Annarita_review_widget.php';

define('HEADER_TEXTCOLOR', 'FFFFFF');
define('HEADER_IMAGE', '%s/images/header.jpg');
define('HEADER_IMAGE_WIDTH', 980);
define('HEADER_IMAGE_HEIGHT', 200);

add_action('after_setup_theme', 'annarita_setup');
add_action('wp_enqueue_scripts', 'annarita_setup_scripts');
add_action('wp_enqueue_scripts', 'annarita_setup_styles');
add_action('init', 'annarita_register_sidebars');
add_action('init', 'annarita_register_menus');
add_action('init', 'annarita_register_post_type');
add_action('admin_menu', 'annarita_options');
add_action('admin_head', 'annarita_setup_styles');
add_action('add_meta_boxes', 'annarita_add_custom_box');
add_action('save_post', 'annarita_save_review_data');
add_action('widgets_init', create_function('', 'register_widget("annarita_review_widget");'));

$options = get_option('annarita_options');
if (isset($options['sidebars_cookie']) && $options['sidebars_cookie'] == true)
   add_action('wp_footer', 'annarita_init_sidebar');

add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
//add_theme_support('custom-background');
//add_theme_support('custom-header', array(
//      'default-image' => get_template_directory_uri() . '/images/header.jpg',
//      'width' => 1000,
//      'height' => 200,
//      'default-text-color' => '#000000'
//));

add_filter('excerpt_more', 'annarita_excerpt_more');
add_filter('wp_title', 'annarita_title_filter');
add_filter('pre_get_posts', 'annarita_get_posts');
add_filter('post_class', 'annarita_get_post_class');

add_custom_background();
add_custom_image_header('annarita_header_style', 'annarita_admin_header_style');
?>