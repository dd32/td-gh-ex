<?php
/**
 * Register sidebars and widgets
 */
function abaya_widgets_init() {
  // Sidebars
  register_sidebar(array(
    'name'          => __('Primary Sidebar', 'abaya'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<div class="widget clearfix"><aside id="%1$s" class="widget voffset3">',
    'after_widget'  => '</aside></div>',
    'before_title'  => ' <h6 class="widget_title">',
    'after_title'   => '</h6>',
  ));
  
  // Product Page Sidebars
  register_sidebar(array(
    'name'          => __('Product Page Sidebar', 'abaya'),
    'id'            => 'product_page_sidebar',
    'before_widget' => '<div class="widget"><aside id="%1$s" class="widget voffset3">',
    'after_widget'  => '</aside></div>',
    'before_title'  => ' <h6 class="widget_title">',
    'after_title'   => '</h6>',
  ));
  
  // Front Page Widget Top
  register_sidebar(array(
    'name'          => __('Front Page Widget Top', 'abaya'),
    'id'            => 'front_page_widget_top',
    'before_widget' => '<div class="featured row"><aside id="%1$s" class="widget voffset3">',
    'after_widget'  => '</aside></div>',
    'before_title'  => '<div class="col-lg-12"><h6 class="page_title">',
    'after_title'   => '</h6></div>',
  ));
  
  // Front Page Widget Middle
  register_sidebar(array(
    'name'          => __('Front Page Widget Middle', 'abaya'),
    'id'            => 'front_page_widget_middle',
    'before_widget' => '<div class="featured row"><aside id="%1$s" class="widget">',
    'after_widget'  => '</aside></div>',
    'before_title'  => '<div class="col-lg-12"><h6 class="page_title">',
    'after_title'   => '</h6></div>',
  ));
  
  // Footer
  
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column One', 'abaya'),
        'id' => 'footer_1',
        'before_widget' => '<div class="ftr_widget widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h6 class="widget_title">',
        'after_title' => '</h6>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column Two', 'abaya'),
        'id' => 'footer_2',
        'before_widget' => '<div class="ftr_widget widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h6 class="widget_title">',
        'after_title' => '</h6>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column Three', 'abaya'),
        'id' => 'footer_3',
        'before_widget' => '<div class="ftr_widget widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h6 class="widget_title">',
        'after_title' => '</h6>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column Four', 'abaya'),
        'id' => 'footer_4',
        'before_widget' => '<div class="ftr_widget widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h6 class="widget_title">',
        'after_title' => '</h6>',
      )
    );
  }
  // Widgets
register_widget('abaya_Social_Widget');
register_widget('abaya_Recent_Posts_Widget');
register_widget('About_With_Image');
register_widget('Abaya_Front_Page_Product_Widget');
add_action('widgets_init', 'abaya_widgets_init');

/**
 * Social widget
 */
class abaya_Social_Widget extends WP_Widget {
    function __construct() {
		$widget_ops = array(
			'classname'   => 'widget_abaya_social',
			'description' => esc_html__( 'Simple way to add Social Icons', 'abaya')
		);
		$control_ops = array(
			'width'  => 200,
			'height' => 250
		);
		parent::__construct( false, $name = esc_html__('Abaya: Social Links', 'abaya' ), $widget_ops, $control_ops);
	}

  function widget($args, $instance) {
    $cache = wp_cache_get('widget_abaya_social', 'widget');

    if (!is_array($cache)) {
      $cache = array();
    }

    if (!isset($args['widget_id'])) {
      $args['widget_id'] = null;
    }

    if (isset($cache[$args['widget_id']])) {
      echo $cache[$args['widget_id']];
      return;
    }

    ob_start();
    extract($args, EXTR_SKIP);

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
    <div class="social">
      
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
    wp_cache_set('widget_abaya_social', $cache, 'widget');
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
      <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'abaya'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php _e('Facebook:', 'abaya'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php _e('Twitter:', 'abaya'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php _e('Instagram:', 'abaya'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" type="text" value="<?php echo esc_attr($instagram); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('googleplus')); ?>"><?php _e('GooglePlus:', 'abaya'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('googleplus')); ?>" name="<?php echo esc_attr($this->get_field_name('googleplus')); ?>" type="text" value="<?php echo esc_attr($googleplus); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('flickr')); ?>"><?php _e('Flickr:', 'abaya'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('flickr')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr')); ?>" type="text" value="<?php echo esc_attr($flickr); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('vimeo')); ?>"><?php _e('Vimeo:', 'abaya'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('vimeo')); ?>" name="<?php echo esc_attr($this->get_field_name('vimeo')); ?>" type="text" value="<?php echo esc_attr($vimeo); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php _e('Youtube:', 'abaya'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php _e('Pinterest:', 'abaya'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('dribbble')); ?>"><?php _e('Dribbble:', 'abaya'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('dribbble')); ?>" name="<?php echo esc_attr($this->get_field_name('dribbble')); ?>" type="text" value="<?php echo esc_attr($dribbble); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php _e('Linkedin:', 'abaya'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('tumblr')); ?>"><?php _e('Tumblr:', 'abaya'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" type="text" value="<?php echo esc_attr($tumblr); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('vk')); ?>"><?php _e('VK:', 'abaya'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('vk')); ?>" name="<?php echo esc_attr($this->get_field_name('vk')); ?>" type="text" value="<?php echo esc_attr($vk); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('rss')); ?>"><?php _e('RSS:', 'abaya'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('rss')); ?>" name="<?php echo esc_attr($this->get_field_name('rss')); ?>" type="text" value="<?php echo esc_attr($rss); ?>" />
    </p>
  <?php
  }
}
/**
 * abaya Recent_Posts widget class
 *  Just a rewite of wp recent post
 * 
 */

class abaya_Recent_Posts_Widget extends WP_Widget {

  function __construct() {
		$widget_ops = array(
			'classname'   => 'abaya_recent_posts',
			'description' => esc_html__( 'This shows the most recent posts on your site with a thumbnail', 'abaya')
		);
		$control_ops = array(
			'width'  => 200,
			'height' => 250
		);
		parent::__construct( false, $name = esc_html__('Abaya: Recent Posts With Images', 'abaya' ), $widget_ops, $control_ops);
	}

  function widget($args, $instance) {
    $cache = wp_cache_get('abaya_recent_posts', 'widget');

    if ( !is_array($cache) )
      $cache = array();

    if ( ! isset( $args['widget_id'] ) )
      $args['widget_id'] = $this->id;

    if ( isset( $cache[ $args['widget_id'] ] ) ) {
      echo $cache[ $args['widget_id'] ];
      return;
    }

    ob_start();
    extract($args);

    $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', 'abaya') : $instance['title'], $instance, $this->id_base);
    if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
      $number = 5;
     $recent_posts = new WP_Query( apply_filters('widget_posts_args',array('posts_per_page' => $number, 'category_name' => $instance['thecate'], 'no_found_rows' => true, 'post_status' => 'publish','ignore_sticky_posts' => true ) ) );
    if ($recent_posts->have_posts()) :
?>
    <?php echo $before_widget.'<ul>'; ?>
    <?php if ( $title ) echo $before_title . $title . $after_title; ?>
    
    <?php  while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
   
    <li class="clearfix postclass">
          <?php global $post; if(has_post_thumbnail( $post->ID ) ) { 
              
              $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
	      $thumbnailURL = $image_url[0]; 
	      $image = aq_resize($thumbnailURL, 75, 75, true);
	      if(empty($image)) { $image = $thumbnailURL; }
	     } else {
	     $thumbnailURL = abaya_recentpost_widget_default_placeholder();
	     $image = aq_resize($thumbnailURL, 75, 75, true);
	     if(empty($image)) { $image=$thumbnailURL; }
	     } ?>
            
           <a href="<?php the_permalink() ?>"><div class="thumb_img"><img width="54" height="47" src="<?php echo esc_attr($image); ?>" class="img-responsive" alt=""></div></a>
            <a href="<?php the_permalink() ?>" class="pots_title"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
            <span class="pots_date"><?php the_time('F j, Y'); ?></span></span>
    
    <?php endwhile; ?>
    
    <?php echo '</ul>'.$after_widget; ?>
<?php
    // Reset the global $the_post as this query will have stomped on it
    wp_reset_postdata();

    endif;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('abaya_recent_posts', $cache, 'widget');
  }

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['number'] = (int) $new_instance['number'];
    $instance['thecate'] = $new_instance['thecate'];
    
    $alloptions = wp_cache_get( 'alloptions', 'options' );
    if ( isset($alloptions['abaya_recent_entries']) )
      delete_option('abaya_recent_entries');

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
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'abaya'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

    <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'abaya'); ?></label>
    <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
        <p>
    <label for="<?php echo $this->get_field_id('thecate'); ?>"><?php _e('Limit to Catagory (Optional):', 'abaya'); ?></label>
    <select id="<?php echo $this->get_field_id('thecate'); ?>" name="<?php echo $this->get_field_name('thecate'); ?>"><?php echo implode('', $cate_options); ?></select>
  </p>
<?php
  }
}

class About_With_Image extends WP_Widget{

    function About_With_Image() {
        $widget_ops = array('classname' => 'abaya_about_with_image', 'description' => __('This allows for an image and a simple about text.', 'abaya'));
        $this->__construct('abaya_about_with_image', __('Abaya: About With Image', 'abaya'), $widget_ops);
        $this->alt_option_name = 'abaya_about_with_image';
    }

    public function widget($args, $instance){ 
        extract( $args );
        
          if(!empty($instance['more_about_me_link'])) {$more_about_me_link ='<a href="'.$instance['more_about_me_link'].'" class="btn">'.__('MORE ABOUT ME','abaya').'</a> ';}
          
       
    ?>
     <?php echo $before_widget; ?>
    
     <?php if(!empty($instance['title'])) { ?><h4 class="title3"><?php echo $instance['title']; ?></h4><?php } ?>  
     <div class="img-area"><img src="<?php echo esc_url($instance['image_uri']); ?>" class="img-responsive"/></div>
      
        <?php if(!empty($instance['text'])) { ?> <p class="textcolor2"><?php echo $instance['text']; ?></p><?php } echo $more_about_me_link; ?>
      

    <?php echo $after_widget; ?>
    <?php }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['text'] = $new_instance['text'];
        $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
        $instance['more_about_me_link'] = $new_instance['more_about_me_link'];
        
        $this->flush_widget_cache();
        return $instance;
    }
     function flush_widget_cache() {
    wp_cache_delete('abaya_about_with_image', 'widget');
  }

  public function form($instance){ 
    $image_uri = isset($instance['image_uri']) ? esc_attr($instance['image_uri']) : '';
    $more_about_me_link = isset($instance['more_about_me_link']) ? esc_attr($instance['more_about_me_link']) : '';
    
    ?>
  <div class="kad_img_upload_widget">
     
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'abaya'); ?></label><br />
      <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" class="widefat" value="<?php if(!empty($instance['title'])) echo $instance['title']; ?>"/>
    </p>
      
    <p>
        <img class="kad_custom_media_image" src="<?php if(!empty($instance['image_uri'])){echo $instance['image_uri'];} ?>" style="margin:0;padding:0;max-width:100px;display:block" />
    </p>
    
    
    <p>
        <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image URL', 'abaya'); ?></label><br />
        <input type="text" class="widefat kad_custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $image_uri; ?>">
        <input type="button" value="<?php _e('Upload', 'abaya'); ?>" class="button kad_custom_media_upload" id="kad_custom_image_uploader" />
    </p>
   
    <p>
        <label for="<?php echo $this->get_field_id('more_about_me_link'); ?>"><?php _e('More About Me Link (optional)', 'abaya'); ?></label><br />
        <input type="text" class="widefat more_about_me_link" name="<?php echo $this->get_field_name('more_about_me_link'); ?>" id="<?php echo $this->get_field_id('more_about_me_link'); ?>" value="<?php echo $more_about_me_link; ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text/Caption (optional)', 'abaya'); ?></label><br />
      <textarea name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>" class="widefat" ><?php if(!empty($instance['text'])) echo $instance['text']; ?></textarea>
    </p>
  </div>
    <?php
  }

}
function abaya_is_edit_page(){
  if (!is_admin()) return false;
    if ( in_array( $GLOBALS['pagenow'], array( 'post.php', 'post-new.php', 'widgets.php', 'post.php', 'post-new.php' ) ) ) {
      return true;
    }
}
function abaya_admin_script() {
  if(is_admin()){ if(abaya_is_edit_page()){
    function abaya_widget_uploadScript(){
      wp_enqueue_media();
      wp_enqueue_script('abayaimhup_script', get_template_directory_uri() . '/js/widget_upload.js');
    }
    add_action('admin_enqueue_scripts', 'abaya_widget_uploadScript');
    }}
}
add_action('init', 'abaya_admin_script');
/* Abaya Front Page Product Widget */

class Abaya_Front_Page_Product_Widget extends WP_Widget {

  function __construct() {
		$widget_ops = array(
			'classname'   => 'abaya_front_page_product_widget',
			'description' => esc_html__( 'This shows the most recent product on your site with a thumbnail', 'abaya')
		);
		$control_ops = array(
			'width'  => 200,
			'height' => 250
		);
		parent::__construct( false, $name = esc_html__('Abaya: Front Page Product With Images', 'abaya' ), $widget_ops, $control_ops);
	}

  function widget($args, $instance) {
    $cache = wp_cache_get('abaya_front_page_product_widget', 'widget');

    if ( !is_array($cache) )
      $cache = array();

    if ( ! isset( $args['widget_id'] ) )
      $args['widget_id'] = $this->id;

    if ( isset( $cache[ $args['widget_id'] ] ) ) {
      echo $cache[ $args['widget_id'] ];
      return;
    }

    ob_start();
    extract($args);

    $title = apply_filters('widget_title', empty($instance['title']) ? __('Featured Product', 'abaya') : $instance['title'], $instance, $this->id_base);
    if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
      $number = 5;
     $recent_posts = new WP_Query( apply_filters('widget_posts_args',array('post_type'=>'product','posts_per_page' => $number, 'product_cat' => $instance['thecate'], 'no_found_rows' => true, 'post_status' => 'publish','ignore_sticky_posts' => true ) ) );
    if ($recent_posts->have_posts()) :
?>
    <?php echo $before_widget.'<ul class="products">'; ?>
    <?php if ( $title ) echo $before_title . $title . $after_title; ?>
    
    <?php  while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
   
    <li class="product col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <?php global $post,$product;
		   woocommerce_show_product_sale_flash( $post, $product );
		   if(has_post_thumbnail( $post->ID ) ) { 
              
              $image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); 
	      $thumbnailURL = $image_url[0]; 
	      $image = aq_resize($thumbnailURL, 270, 319, true);
	      if(empty($image)) { $image = $thumbnailURL; }
	     } else {
	     $thumbnailURL = wc_placeholder_img_src();
	     $image = aq_resize($thumbnailURL, 270, 319, true);
	     if(empty($image)) { $image=$thumbnailURL; }
	     } ?>
            
           <a href="<?php the_permalink() ?>"><div class="product-wrap"><img width="54" height="47" src="<?php echo esc_attr($image); ?>" alt="<?php if ( get_the_title() ) the_title(); else the_ID(); ?>"></div></a>
            <div class="product-name-price">
                  <a href="<?php the_permalink() ?>"><h6><?php the_title(); ?></h6></a>
                  <span class="price"><?php echo $product->get_price_html(); ?></span>
                  <?php woocommerce_template_loop_add_to_cart(); //ouptput the woocommerce loop add to cart button  ?>
                </div>
    
    <?php endwhile; ?>
    
    <?php echo '</ul>'.$after_widget; ?>
<?php
    // Reset the global $the_post as this query will have stomped on it
    wp_reset_postdata();

    endif;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('abaya_front_page_product_widget', $cache, 'widget');
  }

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['number'] = (int) $new_instance['number'];
    $instance['thecate'] = $new_instance['thecate'];
    
    $alloptions = wp_cache_get( 'alloptions', 'options' );
    if ( isset($alloptions['abaya_recent_entries']) )
      delete_option('abaya_recent_entries');

    return $instance;
  }

  function form( $instance ) {
    $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
    $number = isset($instance['number']) ? absint($instance['number']) : 5;
     if (isset($instance['thecate'])) { $thecate = esc_attr($instance['thecate']); } else {$thecate = '';}
	 
	 $args=array(
'type'                     => 'product',
'child_of'                 => 0,
'parent'                   => '',
'orderby'                  => 'name',
'order'                    => 'ASC',
'hide_empty'               => 1,
'hierarchical'             => 1,
'exclude'                  => '',
'number'                   => '',
'taxonomy'                 => 'product_cat',
'pad_counts'               => false 

); $categories=get_categories( $args );
	
     $cate_options = array();
          $cate_options[] = '<option value="">All</option>';
 
    foreach ($categories as $cate) {
      if ($thecate==$cate->slug) { $selected=' selected="selected"';} else { $selected=""; }
      $cate_options[] = '<option value="' . $cate->slug .'"' . $selected . '>' . $cate->name . '</option>';
    }

?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'abaya'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

    <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'abaya'); ?></label>
    <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
        <p>
    <label for="<?php echo $this->get_field_id('thecate'); ?>"><?php _e('Limit to Catagory (Optional):', 'abaya'); ?></label>
    <select id="<?php echo $this->get_field_id('thecate'); ?>" name="<?php echo $this->get_field_name('thecate'); ?>"><?php echo implode('', $cate_options); ?></select>
  </p>
<?php
  }
}

?>
