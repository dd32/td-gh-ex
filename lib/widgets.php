<?php
/**
 * Register sidebars and widgets
 */
function backyard_sidebar_list() {
  $all_sidebars=array(array('name'=>__('Primary Sidebar', 'backyard'), 'id'=>'sidebar-primary'));
  global $backyard; 
  if(isset($backyard['cust_sidebars'])) {
  if (is_array($backyard['cust_sidebars'])) {
    $i = 1;
  foreach($backyard['cust_sidebars'] as $sidebar){
    if(empty($sidebar)) {$sidebar = 'sidebar'.$i;}
    $all_sidebars[]=array('name'=>$sidebar, 'id'=>'sidebar'.$i);
    $i++;
  }
 }
}
  global $vir_sidebars;
  $vir_sidebars = $all_sidebars;
  return $all_sidebars;
}
add_action('init', 'backyard_sidebar_list');
function backyard_register_sidebars(){
  $the_sidebars = backyard_sidebar_list();
  if (function_exists('register_sidebar')){
    foreach($the_sidebars as $side){
      backyard_register_sidebar($side['name'], $side['id']);    
    }

  }
}
function backyard_register_sidebar($name, $id){
  register_sidebar(array('name'=>$name,
    'id' => $id,
    'before_widget' => '<section id="%1$s" class="%2$s"><div class="widget-inner">',
    'after_widget' => '</div></section>',
    'before_title' => '<h4 class="title3">',
    'after_title' => '</h4>',
  ));
}
add_action('widgets_init', 'backyard_register_sidebars');

function backyard_widgets_init() {
  //Topbar 
  
  register_sidebar(array(
    'name'          => __('Topbar Widget', 'backyard'),
    'id'            => 'topbarright',
    'before_widget' => '<div class="row">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="col-md-12"><h2 class="title"><span>',
    'after_title'   => '</span></h2></div>',
  ));

  // Sidebars
  register_sidebar(array(
    'name'=> __('Primary Sidebar', 'backyard'),
    'id'=> 'sidebar-primary',
    'before_widget'=> '<aside id="%1$s" class="widget voffset3 text-center">',
    'after_widget'=> '</aside>',
    'before_title'=> '<h4 class="title3">',
    'after_title'=> '</h4>',
  ));
  // Footer
  global $footer_widgets_layout; if(get_theme_mod('footer_widgets_layout')) { $footer_widgets_layout=get_theme_mod('footer_widgets_layout'); }
  if ($footer_widgets_layout == "fourc") {
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column One', 'backyard'),
        'id' => 'footer_1',
        'before_widget' => '<div class="ftr-widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="title3">',
        'after_title' => '</h4>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column Two', 'backyard'),
        'id' => 'footer_2',
        'before_widget' => '<div class="ftr-widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="title3">',
        'after_title' => '</h4>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column Three', 'backyard'),
        'id' => 'footer_3',
        'before_widget' => '<div class="ftr-widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="title3">',
        'after_title' => '</h4>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column Four', 'backyard'),
        'id' => 'footer_4',
        'before_widget' => '<div class="ftr-widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="title3">',
        'after_title' => '</h4>',
      )
    );
  } else if ($footer_widgets_layout == "threec") {
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column One', 'backyard'),
        'id' => 'footer_third_1',
        'before_widget' => '<div class="ftr-widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="title3">',
        'after_title' => '</h4>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column Two', 'backyard'),
        'id' => 'footer_third_2',
        'before_widget' => '<div class="ftr-widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="title3">',
        'after_title' => '</h4>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column Three', 'backyard'),
        'id' => 'footer_third_3',
        'before_widget' => '<div class="ftr-widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="title3">',
        'after_title' => '</h4>',
      )
    );
  } else if ($footer_widgets_layout == "twoc") {
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column One', 'backyard'),
        'id' => 'footer_two_1',
        'before_widget' => '<div class="ftr-widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="title3">',
        'after_title' => '</h4>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column Two', 'backyard'),
        'id' => 'footer_two_2',
        'before_widget' => '<div class="ftr-widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="title3">',
        'after_title' => '</h4>',
      )
    );
    
  }else {
      if ( function_exists('register_sidebar') )
        register_sidebar(array(
          'name' => __('Footer Column', 'backyard'),
          'id' => 'footer_onecol_1',
          'before_widget' => '<div class="ftr-widget"><aside id="%1$s" class="%2$s">',
          'after_widget' => '</aside></div>',
          'before_title' => '<h4 class="title3">',
          'after_title' => '</h4>',
        )
      );
      
    }

  // Widgets
  register_widget('Backyard_Social_Widget');
  register_widget('Backyard_Recent_Posts_Widget');
  register_widget('Backyard_Popular_Posts_Widget');
  register_widget('About_With_Image');
  
}
add_action('widgets_init', 'backyard_widgets_init');

/**
 * Social widget
 */
class Backyard_Social_Widget extends WP_Widget {
    
    
    private static $instance = 0;
    public function __construct() {
    $widget_ops = array('classname' => 'widget_backyard_social', 'description' => __('Simple way to add Social Icons', 'backyard'));
    parent::__construct('widget_backyard_social', __('Backyard: Social Links', 'backyard'), $widget_ops);
  } 
  
  function widget($args, $instance) {
    
    if (!isset($args['widget_id'])) {
      $args['widget_id'] = null;
    }

    if (isset($cache[$args['widget_id']])) {
      echo $cache[$args['widget_id']];
      return;
    }

    ob_start();
    extract($args);

    $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
    if (!isset($instance['facebook'])) { $instance['facebook'] = ''; }
    if (!isset($instance['twitter'])) { $instance['twitter'] = ''; }
    if (!isset($instance['instagram'])) { $instance['instagram'] = ''; }
    if (!isset($instance['googleplus'])) { $instance['googleplus'] = ''; }
    if (!isset($instance['flickr'])) { $instance['flickr'] = ''; }
    if (!isset($instance['vimeo'])) { $instance['vimeo'] = ''; }
    if (!isset($instance['youtube'])) { $instance['youtube'] = ''; }
    if (!isset($instance['pinterest'])) { $instance['pinterest'] = ''; }
    if (!isset($instance['dribbble'])) { $instance['dribbble'] = ''; }
    if (!isset($instance['linkedin'])) { $instance['linkedin'] = ''; }
    if (!isset($instance['tumblr'])) { $instance['tumblr'] = ''; }
    if (!isset($instance['vk'])) { $instance['vk'] = ''; }
    if (!isset($instance['rss'])) { $instance['rss'] = ''; }

    echo $before_widget;
    if ($title) {
      echo $before_title;
      echo $title;
      echo $after_title;
    }
  ?>
    <div class="widget-social"> 
      
<?php if(!empty($instance['facebook'])):?><a href="<?php echo esc_url($instance['facebook']); ?>" class="fb" title="Facebook" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Facebook"><i class="fa fa-facebook"></i></a><?php endif;?>
<?php if(!empty($instance['twitter'])):?><a href="<?php echo esc_url($instance['twitter']); ?>" class="tw" title="Twitter" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Twitter"><i class="fa fa-twitter"></i></a><?php endif;?>
<?php if(!empty($instance['instagram'])):?><a href="<?php echo esc_url($instance['instagram']); ?>" class="instagram" title="Instagram" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Instagram"><i class="fa fa-instagram"></i></a><?php endif;?>
<?php if(!empty($instance['googleplus'])):?><a href="<?php echo esc_url($instance['googleplus']); ?>" class="google" title="GooglePlus" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="GooglePlus"><i class="fa fa-google-plus"></i></a><?php endif;?>
<?php if(!empty($instance['flickr'])):?><a href="<?php echo esc_url($instance['flickr']); ?>" class="flickr_link" title="Flickr" data-toggle="tooltip" target="_blank" data-placement="top" data-original-title="Flickr"><i class="fa fa-flickr"></i></a><?php endif;?>
<?php if(!empty($instance['vimeo'])):?><a href="<?php echo esc_url($instance['vimeo']); ?>" class="vimeo_link" title="Vimeo" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Vimeo"><i class="fa fa-play"></i></a><?php endif;?>
<?php if(!empty($instance['youtube'])):?><a href="<?php echo esc_url($instance['youtube']); ?>" class="youtube_link" title="YouTube" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="YouTube"><i class="fa fa-youtube"></i></a><?php endif;?>
<?php if(!empty($instance['pinterest'])):?><a href="<?php echo esc_url($instance['pinterest']); ?>" class="pinterest_link" title="Pinterest" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a><?php endif;?>
<?php if(!empty($instance['dribbble'])):?><a href="<?php echo esc_url($instance['dribbble']); ?>" class="dribbble_link" title="Dribbble" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Dribbble"><i class="fa fa-dribbble"></i></a><?php endif;?>
<?php if(!empty($instance['linkedin'])):?><a href="<?php echo esc_url($instance['linkedin']); ?>" class="linkdin" title="LinkedIn" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a><?php endif;?>
<?php if(!empty($instance['tumblr'])):?><a href="<?php echo esc_url($instance['tumblr']); ?>" class="tumblr_link" title="Tumblr" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Tumblr"><i class="fa fa-tumblr"></i></a><?php endif;?>
<?php if(!empty($instance['vk'])):?><a href="<?php echo esc_url($instance['vk']); ?>" class="vk_link" title="VK" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="VK"><i class="fa fa-vk"></i></a><?php endif;?>
<?php if(!empty($instance['rss'])):?><a href="<?php echo esc_url($instance['rss']); ?>" class="rss_link" title="RSS" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="RSS"><i class="fa fa-rss"></i></a><?php endif;?>
    </div>
  <?php
    echo $after_widget;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('widget_backyard_social', $cache, 'widget');
  }

  function update($new_instance, $old_instance) {
    $instance = $old_instance;
     $instance['title'] = strip_tags($new_instance['title']);
    $instance['facebook'] = strip_tags($new_instance['facebook']);
    $instance['twitter'] = strip_tags($new_instance['twitter']);
    $instance['instagram'] = strip_tags($new_instance['instagram']);
    $instance['googleplus'] = strip_tags($new_instance['googleplus']);
    $instance['flickr'] = strip_tags($new_instance['flickr']);
    $instance['vimeo'] = strip_tags($new_instance['vimeo']);
    $instance['youtube'] = strip_tags($new_instance['youtube']);
    $instance['pinterest'] = strip_tags($new_instance['pinterest']);
    $instance['dribbble'] = strip_tags($new_instance['dribbble']);
    $instance['linkedin'] = strip_tags($new_instance['linkedin']);
    $instance['tumblr'] = strip_tags($new_instance['tumblr']);
    $instance['vk'] = strip_tags($new_instance['vk']);
    $instance['rss'] = strip_tags($new_instance['rss']);
    return $instance;
  }


  function form($instance) {
    $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
    $facebook = isset($instance['facebook']) ? esc_attr($instance['facebook']) : '';
    $twitter = isset($instance['twitter']) ? esc_attr($instance['twitter']) : '';
    $instagram = isset($instance['instagram']) ? esc_attr($instance['instagram']) : '';
    $googleplus = isset($instance['googleplus']) ? esc_attr($instance['googleplus']) : '';
    $flickr = isset($instance['flickr']) ? esc_attr($instance['flickr']) : '';
    $vimeo = isset($instance['vimeo']) ? esc_attr($instance['vimeo']) : '';
    $youtube = isset($instance['youtube']) ? esc_attr($instance['youtube']) : '';
    $pinterest = isset($instance['pinterest']) ? esc_attr($instance['pinterest']) : '';
    $dribbble = isset($instance['dribbble']) ? esc_attr($instance['dribbble']) : '';
    $linkedin = isset($instance['linkedin']) ? esc_attr($instance['linkedin']) : '';
    $tumblr = isset($instance['tumblr']) ? esc_attr($instance['tumblr']) : '';
    $vk = isset($instance['vk']) ? esc_attr($instance['vk']) : '';
    $rss = isset($instance['rss']) ? esc_attr($instance['rss']) : '';
  ?>
  <p>
      <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'backyard'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php _e('Facebook:', 'backyard'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php _e('Twitter:', 'backyard'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php _e('Instagram:', 'backyard'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" type="text" value="<?php echo esc_attr($instagram); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('googleplus')); ?>"><?php _e('GooglePlus:', 'backyard'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('googleplus')); ?>" name="<?php echo esc_attr($this->get_field_name('googleplus')); ?>" type="text" value="<?php echo esc_attr($googleplus); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('flickr')); ?>"><?php _e('Flickr:', 'backyard'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('flickr')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr')); ?>" type="text" value="<?php echo esc_attr($flickr); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('vimeo')); ?>"><?php _e('Vimeo:', 'backyard'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('vimeo')); ?>" name="<?php echo esc_attr($this->get_field_name('vimeo')); ?>" type="text" value="<?php echo esc_attr($vimeo); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php _e('Youtube:', 'backyard'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php _e('Pinterest:', 'backyard'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('dribbble')); ?>"><?php _e('Dribbble:', 'backyard'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('dribbble')); ?>" name="<?php echo esc_attr($this->get_field_name('dribbble')); ?>" type="text" value="<?php echo esc_attr($dribbble); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php _e('Linkedin:', 'backyard'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('tumblr')); ?>"><?php _e('Tumblr:', 'backyard'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" type="text" value="<?php echo esc_attr($tumblr); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('vk')); ?>"><?php _e('VK:', 'backyard'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('vk')); ?>" name="<?php echo esc_attr($this->get_field_name('vk')); ?>" type="text" value="<?php echo esc_attr($vk); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('rss')); ?>"><?php _e('RSS:', 'backyard'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('rss')); ?>" name="<?php echo esc_attr($this->get_field_name('rss')); ?>" type="text" value="<?php echo esc_attr($rss); ?>" />
    </p>
  <?php
  }
}
/**
 * Backyard Recent_Posts widget class
 *  Just a rewite of wp recent post
 * 
 */
class Backyard_Popular_Posts_Widget extends WP_Widget {
    
    private static $instance = 0;
    public function __construct() {
    $widget_ops=array('classname'=>'backyard_popular_posts', 'description' => __('This shows the most popular posts on your site with a thumbnail', 'backyard'));
    parent::__construct('backyard_popular_posts', __('Backyard: Popular Posts', 'backyard'), $widget_ops);
  } 

  function widget($args, $instance) {
     if ( ! isset( $args['widget_id'] ) )
      $args['widget_id'] = $this->id;

    if ( isset( $cache[ $args['widget_id'] ] ) ) {
      echo $cache[ $args['widget_id'] ];
      return;
    }

    ob_start();
    extract($args);

    $title = apply_filters('widget_title', empty($instance['title']) ? __('Popular Posts', 'backyard') : $instance['title'], $instance, $this->id_base);
    if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
      $number = 10;

    $popular_posts = new WP_Query(apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'category_name' => $instance['thecate'], 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true,'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC') ) );
    if ($popular_posts->have_posts()) :
?>
    <?php echo $before_widget; ?>
    <?php if ( $title ) echo $before_title . $title . $after_title; ?>
    
    <?php  while ($popular_posts->have_posts()) : $popular_posts->the_post(); ?>
    <div class="popular-post">
        <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>" class="recentpost_featimg">
          <?php global $post; if(has_post_thumbnail( $post->ID ) ) { 
            echo '<span>'; the_post_thumbnail( 'popular-thumb' ); echo '</span>';
          } else { 
            $image_url = backyard_post_widget_default_placeholder();
            $image = aq_resize($image_url, 257, 151, true);
            if(empty($image)) { $image = $image_url; }
            echo '<span><img width="256" height="151" src="'.esc_attr($image).'" class="img-responsive" alt=""></span>'; } ?></a>
        <h6><a href="<?php the_permalink()  ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?> </a></h6>
        <p class="text font-italic textcolor"><?php echo get_the_date(get_option( 'date_format' )); ?></p>
    </div>
    <?php endwhile; ?>
    
    <?php echo $after_widget; ?>
<?php
    // Reset the global $the_post as this query will have stomped on it
    wp_reset_postdata();

    endif;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('backyard_popular_posts', $cache, 'widget');
  }

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['number'] = (int) $new_instance['number'];
    $instance['thecate'] = $new_instance['thecate'];
    
    return $instance;
  }

  function form( $instance ) {
    $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
    $number = isset($instance['number']) ? absint($instance['number']) : 5;
     if (isset($instance['thecate'])) { $thecate = esc_attr($instance['thecate']); } else {$thecate = '';}
          $categories= get_categories();
     $cate_options = array();
          $cate_options[] = '<option value="">All</option>';
 
    foreach ($categories as $cate) {
      if ($thecate==$cate->slug) { $selected=' selected="selected"';} else { $selected=""; }
      $cate_options[] = '<option value="' . $cate->slug .'"' . $selected . '>' . $cate->name . '</option>';
    }

?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'backyard'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

    <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'backyard'); ?></label>
    <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
        <p>
    <label for="<?php echo $this->get_field_id('thecate'); ?>"><?php _e('Limit to Catagory (Optional):', 'backyard'); ?></label>
    <select id="<?php echo $this->get_field_id('thecate'); ?>" name="<?php echo $this->get_field_name('thecate'); ?>"><?php echo implode('', $cate_options); ?></select>
  </p>
<?php
  }
}
class Backyard_Recent_Posts_Widget extends WP_Widget {

  private static $instance = 0;
    public function __construct() {
    $widget_ops=array('classname' => 'backyard_recent_posts', 'description' => __('This shows the most recent posts on your site with a thumbnail', 'backyard'));
    parent::__construct('backyard_recent_posts', __('Backyard: Recent Posts', 'backyard'), $widget_ops);
  } 
  
 
  function widget($args, $instance) {

    if ( ! isset( $args['widget_id'] ) )
      $args['widget_id'] = $this->id;

    if ( isset( $cache[ $args['widget_id'] ] ) ) {
      echo $cache[ $args['widget_id'] ];
      return;
    }

    ob_start();
    extract($args);

    $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', 'backyard') : $instance['title'], $instance, $this->id_base);
    if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
      $number = 10;

    $recent_posts = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'category_name' => $instance['thecate'], 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
    if ($recent_posts->have_posts()) :
?>
    <?php echo $before_widget; ?>
    <?php if ( $title ) echo $before_title . $title . $after_title; ?>
    
    <?php  while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
    <div class="recent">
        <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>" class="recentpost_featimg">
          <?php global $post; if(has_post_thumbnail( $post->ID ) ) { 
            echo '<span>'; the_post_thumbnail( 'widget-thumb' ); echo '</span>';
          } else { 
            $image_url = backyard_post_widget_default_placeholder();
            $image = aq_resize($image_url, 54, 47, true);
            if(empty($image)) { $image = $image_url; }
            echo '<span><img width="54" height="47" src="'.esc_attr($image).'" class="img-responsive" alt=""></span>'; } ?></a>
        <p  class="recent-post-title"><a href="<?php the_permalink() ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></p>
        <p class="textcolor"><?php echo get_the_date(get_option( 'date_format' )); ?></p>
    </div>
    <?php endwhile; ?>
    
    <?php echo $after_widget; ?>
<?php
    // Reset the global $the_post as this query will have stomped on it
    wp_reset_postdata();

    endif;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('backyard_recent_posts', $cache, 'widget');
  }

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['number'] = (int) $new_instance['number'];
    $instance['thecate'] = $new_instance['thecate'];
    return $instance;
  }

  function form( $instance ) {
    $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
    $number = isset($instance['number']) ? absint($instance['number']) : 5;
     if (isset($instance['thecate'])) { $thecate = esc_attr($instance['thecate']); } else {$thecate = '';}
          $categories= get_categories();
     $cate_options = array();
          $cate_options[] = '<option value="">All</option>';
 
    foreach ($categories as $cate) {
      if ($thecate==$cate->slug) { $selected=' selected="selected"';} else { $selected=""; }
      $cate_options[] = '<option value="' . $cate->slug .'"' . $selected . '>' . $cate->name . '</option>';
    }

?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'backyard'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

    <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'backyard'); ?></label>
    <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
        <p>
    <label for="<?php echo $this->get_field_id('thecate'); ?>"><?php _e('Limit to Catagory (Optional):', 'backyard'); ?></label>
    <select id="<?php echo $this->get_field_id('thecate'); ?>" name="<?php echo $this->get_field_name('thecate'); ?>"><?php echo implode('', $cate_options); ?></select>
  </p>
<?php
  }
}
function kad_is_edit_page(){
  if (!is_admin()) return false;

    if ( in_array( $GLOBALS['pagenow'], array( 'post.php', 'post-new.php', 'widgets.php', 'post.php', 'post-new.php' ) ) ) {
      return true;
    }
}
function backyard_admin_script() {
  if(is_admin()){ if(kad_is_edit_page()){
    function backyard_widget_uploadScript(){
      wp_enqueue_media();
      wp_enqueue_script('backyardimhup_script', get_template_directory_uri() . '/assets/js/widget_upload.js');
    }
    add_action('admin_enqueue_scripts', 'backyard_widget_uploadScript');
    }}
}
add_action('init', 'backyard_admin_script');

class About_With_Image extends WP_Widget{

    private static $instance = 0;
    public function __construct() {
    $widget_ops=array('classname' => 'backyard_about_with_image', 'description' => __('This allows for an image and a simple about text.', 'backyard'));
    parent::__construct('backyard_about_with_image', __('Backyard: About With Image', 'backyard'), $widget_ops);
  } 
  
    public function widget($args, $instance){ 
        extract( $args );
        
          if(!empty($instance['more_about_me_link'])) {$more_about_me_link = $instance['more_about_me_link'];} else {$more_about_me_link = '#';}
          
       
    ?>
     <?php echo $before_widget; ?>
    
     <?php if(!empty($instance['title'])) { ?><h4 class="title3"><?php echo $instance['title']; ?></h4><?php } ?>  
  <span><img src="<?php echo esc_url($instance['image_uri']); ?>" class="img-responsive"/></span>
      
        <?php if(!empty($instance['text'])) { ?> <p class="textcolor2"><?php echo $instance['text']; ?></p><?php }?>
        
        <div class="voffsetbtn1"> <a href="<?php echo $more_about_me_link; ?>" class="btn">MORE ABOUT ME</a> </div>
    

    <?php echo $after_widget; ?>
    <?php }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['text'] = $new_instance['text'];
        $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
        $instance['more_about_me_link'] = $new_instance['more_about_me_link'];
        return $instance;
    }
   
  public function form($instance){ 
    $image_uri = isset($instance['image_uri']) ? esc_attr($instance['image_uri']) : '';
    $more_about_me_link = isset($instance['more_about_me_link']) ? esc_attr($instance['more_about_me_link']) : '';
    
    ?>
  <div class="kad_img_upload_widget">
     
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'backyard'); ?></label><br />
      <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" class="widefat" value="<?php if(!empty($instance['title'])) echo $instance['title']; ?>"/>
    </p>
      
    <p>
        <img class="kad_custom_media_image" src="<?php if(!empty($instance['image_uri'])){echo $instance['image_uri'];} ?>" style="margin:0;padding:0;max-width:100px;display:block" />
    </p>
    
    
    <p>
        <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image URL', 'backyard'); ?></label><br />
        <input type="text" class="widefat kad_custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $image_uri; ?>">
        <input type="button" value="<?php _e('Upload', 'backyard'); ?>" class="button kad_custom_media_upload" id="kad_custom_image_uploader" />
    </p>
   
    <p>
        <label for="<?php echo $this->get_field_id('more_about_me_link'); ?>"><?php _e('More About Me Link (optional)', 'backyard'); ?></label><br />
        <input type="text" class="widefat more_about_me_link" name="<?php echo $this->get_field_name('more_about_me_link'); ?>" id="<?php echo $this->get_field_id('more_about_me_link'); ?>" value="<?php echo $more_about_me_link; ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text/Caption (optional)', 'backyard'); ?></label><br />
      <textarea name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>" class="widefat" ><?php if(!empty($instance['text'])) echo $instance['text']; ?></textarea>
    </p>
  </div>
    <?php
  }

}

?>
