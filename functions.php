<?php 

// code for default data 
add_action( 'after_setup_theme', 'spa_the_theme_setup' );
//if (!function_exists('spa_the_theme_setup')):

function spa_the_theme_setup() /*function declear*/
{
	 $template_uri=get_template_directory_uri();
	load_theme_textdomain( 'sis_spa', get_template_directory() . '/languages' );

	$spa_theme_options=array(
								 //home page setting option
							
								   'line_one' =>__('Our','sis_spa'),
								   'line_two'=>__('Refreshed','sis_spa'),
								 'description'=>__('Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla.
             Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed 
             lectus nulla rutrum sit amet mauris','sis_spa'),
								  'call_us'=>'963 6063 526',
							  	 'home_feature'=> $template_uri.'/images/default/home_banner.jpg',
							   
								 'first_thumb_image'=>$template_uri.'/images/default/home_thumb.jpg',
								 'second_thumb_image'=>$template_uri.'/images/default/home_thumb.jpg',
								 'third_thumb_image'=>$template_uri.'/images/default/home_thumb.jpg',
								 
								 'service1_title'=>__('Spa Treatment','sis_spa'),
								 'service1_image'=>$template_uri.'/images/default/home_service_thumb.jpg',
								 'service1_content'=>__('Pellentesque habitant morbi tristique senectus 
                                                      et netus et malesuada fames ac turpis egestas 
                                                    In in massa urna, vitae vestibulum orci. yoursb
                                                     Maecenas quis est sed mauris...','sis_spa'),
													 
								 'service2_title'=>__('Detox Treatment','sis_spa'),
								 'service2_image'=>$template_uri.'/images/default/home_service_thumb.jpg',
								 'service2_content'=>__('Pellentesque habitant morbi tristique senectus 
                                                      et netus et malesuada fames ac turpis egestas 
                                                    In in massa urna, vitae vestibulum orci. yoursb
                                                     Maecenas quis est sed mauris...','sis_spa'),
								 'service3_title'=>__('Facial Treatment','sis_spa'),
								 'service3_image'=>$template_uri.'/images/default/home_service_thumb.jpg',
								 'service3_content'=>__('Pellentesque habitant morbi tristique senectus 
                                                      et netus et malesuada fames ac turpis egestas 
                                                    In in massa urna, vitae vestibulum orci. yoursb
                                                     Maecenas quis est sed mauris...','sis_spa'),
								  'service4_title'=>__('Other Treatment','sis_spa'),
								 'service4_image'=>$template_uri.'/images/default/home_service_thumb.jpg',
								 'service4_content'=>__('Pellentesque habitant morbi tristique senectus 
                                                      et netus et malesuada fames ac turpis egestas 
                                                    In in massa urna, vitae vestibulum orci. yoursb
                                                     Maecenas quis est sed mauris...','sis_spa'),					 
								 
								   
								  'product1_title'=>__('Product 1','sis_spa'),
								  'product1_image'=>$template_uri.'/images/default/home_product_thumb.jpg',
								  
								  'product2_title'=>__('Product 2','sis_spa'),
								  'product2_image'=>$template_uri.'/images/default/home_product_thumb.jpg',
								  
								  'product3_title'=>__('Product 3','sis_spa'),
								  'product3_image'=>$template_uri.'/images/default/home_product_thumb.jpg',
								  
								  'product4_title'=>__('Product 4','sis_spa'),
								  'product4_image'=>$template_uri.'/images/default/home_product_thumb.jpg',
								  
								  'product5_title'=>__('Product 5','sis_spa'),
								  'product5_image'=>$template_uri.'/images/default/home_product_thumb.jpg',
								   
								//settings for main slider 
							/* 	'slider_type'=>'Flex', */
								'slider_entries_main'=> 10,
								'slide_effect_main'=>'slide',
								'animation_speed_main'=>'1000',
								'auto_slide_interval_main'=>'2000',
									
								'footer_tagline' => __('Copyright 2013. All Rights Reserved by ','sis_spa'),
								'upload_image'=>'',
								'height'=>'60',
								'width'=>'250',
								'upload_image_favicon'=>'',
					            
								'tagline_title'=>__('Treatment we are offering','sis_spa'),
							'tagline_contents'=>__('In commodo pulvinar metus, id tristique massa ultrices at. Nulla auctor turpis ut mi pulvinar eu accumsan risus sagittis. Mauris nunc ligula, ullamcorper vitae accumsan eu, 
congue in nulla. Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.','sis_spa'),
							'product_title'=>__('Spasalon Our product rang','sis_spa'),
							'product_contents'=>__('A SpaSalon Produc Heading Title In commodo pulvinar metus, id tristique massa ultrices at. Nulla auctor turpis ut mi pulvinar eu accumsan risus sagittis. Mauris nunc ligula, ullamcorper vitae accumsan eu, congue in nulla. Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit. ','sis_spa'), 
							'spa_home_Title'=>array(	'home_title_px' => '42',
															'home_font_family' => 'MarketingScript',
															'home_font_style' => 'Normal',
															
														  ),
							'spa_product_Title'=>array(	'product_title_px' => '42',
													     'product_font_family' => 'MarketingScript',
														 'product_font_style' => 'Normal',
														
														  ),						  
							'spa_menu_typography'=>array(	'navigation_px' => '13',
																	'color_navigation' =>'#72797b',
																	'font_family_navigation' =>'Raleway-Medium',
																	'font_style_navigation' => 'Normal'
																),
							'spa_post_title_typography'=>array(	'post_title_px' => '24',
																		'color_post_title' => '#353C3F',
																		'font_family_post_title' => 'roboto',
																		'font_style_post_title' => 'Normal'
																	 ),
								'spa_post_entry_typography'=>array(	'post_entry_px' => '12',
																		'color_post_entry' => '#989495',
																		'font_family_post_entry' => 'roboto',
																		'font_style_post_entry' => 'Normal'
																	 ),
								'spa_post_meta_typography'=>array(	'post_meta_px' => '12',
																		'color_post_meta' => '#9a9a9a',
																		'font_family_post_meta' => 'roboto',
																		'font_style_post_meta' => 'Normal'
																	 ),
		                        'spa_sidebar_widget_titles'=>array(	'sidebar_widget_titles_px' => '18',
																		'color_sidebar_widget_titles' => '#4A4849',
																		'font_family_sidebar_widget_titles' => 'roboto',
																		'font_style_sidebar_widget_titles' => 'Normal'
																	 ),	
	);
add_option('spa_theme_options',$spa_theme_options); 
   
// code for option pannel


   require_once('option_pannel/option_pannel.php' );
   function spa_admin_enqueue_script() {

/*enque jquery of option panal*/


wp_enqueue_script('tab',get_bloginfo('template_directory').'/option_pannel/js/spa-tab.js');



wp_enqueue_script('prime',get_bloginfo('template_directory').'/option_pannel/js/prime-plugin-base.js');
wp_enqueue_script('my-upload',get_bloginfo('template_directory').'/option_pannel/js/media-upload-script.js',array('media-upload','thickbox','jquery'));
wp_enqueue_script('prime1',get_bloginfo('template_directory').'/js/farbtastic.js');


wp_enqueue_script('spa-optionpanal-jquery',get_template_directory_uri('template_directory').'/option_pannel/js/spa-optionpanal-jquery.js',array('farbtastic','jquery-ui-tabs','jquery-ui-sortable'));

wp_enqueue_style('font', get_template_directory_uri('template_directory').'/css/font/font.css');		
wp_enqueue_style('classic',get_bloginfo('template_directory').'/option_pannel/css/style-classic.css');
wp_enqueue_style('option',get_bloginfo('template_directory').'/option_pannel/css/style-option.css');		
wp_enqueue_style('thickbox');	
wp_enqueue_style('farbtasticss',get_bloginfo('template_directory').'/option_pannel/css/farbtasticss.css');
wp_enqueue_style('spa_flexslider', get_template_directory_uri('template_directory').'/css/flexslider.css'); 

}

add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
//add_theme_support( 'custom-background' );
add_editor_style();

}

//endif;//closing of the spa_the_theme_setup()

if ( ! isset( $content_width ) ) $content_width = 900;


require_once ( get_template_directory() . '/functions/Excerpt/excerpt_length.php' );// code for limit the length of excerpt
require_once ( get_template_directory() . '/functions/Pagination/pagination.php' );
require_once ( get_template_directory() . '/functions/resize_image/resize_image.php' );
require_once ( get_template_directory() . '/functions/Menu_Walker/default_menu_walker.php' );//default menu 
require_once ( get_template_directory() . '/functions/Menu_Walker/spasalon_nav_walker.php' );//custom menu

 //code for the custom menus....
 add_action( 'init', 'register_my_menus' );
   function register_my_menus() {
  register_nav_menus(
    array( 'header-menu' => __('Header Menu','sis_spa'),
	       'footer-menu' => __('Footer Menu','sis_spa')
	     )
  );
}



function spa_widgets_init() {


/*sidebar*/
register_sidebar( array(
		'name' => __( ' Sidebar', 'sis_spa' ),
		'id' => 'sidebar-primary',
		'description' => __( 'The primary widget area', 'sis_spa' ),
		'before_widget' => ' <div>',
		'after_widget' => '</div>',
		'before_title' => ' <div id="widget-title" class="span12"><h4 class="spa-widget-title">',
		'after_title' => '</h4></div>',
	) );
	
	}	                     
add_action( 'widgets_init', 'spa_widgets_init' );
//enqueue scripts------------------------------------------------------------------------------------------------------
add_action('wp_enqueue_scripts','spa_enqueue_script'); 
function spa_enqueue_script() {
         require_once('option_pannel/custom_style.php');
	

   wp_enqueue_style('spa_custom-responsive', get_template_directory_uri('template_directory').'/css/custom-responsive.css');
   wp_enqueue_style('spa_bootstrap', get_template_directory_uri('template_directory').'/css/bootstrap.css');
   wp_enqueue_style('spa_bootstrap-responsive', get_template_directory_uri('template_directory').'/css/bootstrap-responsive.css');
 
  wp_enqueue_style('spa_docs', get_template_directory_uri('template_directory').'/css/docs.css');

   wp_enqueue_style('spa_flexslider', get_template_directory_uri('template_directory').'/css/flexslider.css'); 
	wp_enqueue_style('spa_flexsliderdemo', get_template_directory_uri('template_directory').'/css/flexslider-demo.css');  
      wp_enqueue_style('spa_font', get_template_directory_uri('template_directory').'/css/font/font.css'); 
	 

     // wp_enqueue_script('jquery');
	 if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 	// them e check plugin 	
      wp_enqueue_script('spa_menu', get_template_directory_uri('template_directory').'/js/menu/menu.js');
	  wp_enqueue_script('spa-boot-menu-active', get_template_directory_uri('template_directory').'/js/menu/boot-business.js');
	   wp_enqueue_script('spa-boot-menus', get_template_directory_uri('template_directory').'/js/menu/bootstrap.min.js'); 
	    wp_enqueue_script('flexmain', get_template_directory_uri('template_directory').'/js/flex/jquery.flexslider.js');
        wp_enqueue_script('flexslider-setting', get_template_directory_uri('template_directory').'/js/flex/flexslider-setting.js'); 
  
}
  




//code for the meta data...
     

add_action('admin_init','my_meta_init');

function my_meta_init()
{
     foreach (array('post','page') as $type) 
	{
		add_meta_box('my_all_meta', 'Description', 'my_meta_banner', $type, 'normal', 'high');
	}
	
 
 
	add_action('save_post','my_meta_save');
}
// code for banner description
function my_meta_banner()
{
	global $post ;
 
	
	$meta = get_post_meta($post->ID,'_my_meta',TRUE);?>
       <p>	
  <label><?php _e('Banner Description','sis_spa');?></label>
	</p>
	<p>
		<textarea style="width:100%; height:100px;padding: 10px;" placeholder="Enter product banner description" name="_my_meta[banner_description]" rows="3" cols="10" ><?php if(!empty($meta['banner_description'])) echo $meta['banner_description']; ?></textarea>
  </p>	
      <p>	
  <label><?php _e('Banner Heading One','sis_spa');?></label>
	</p>
	<p>
		<input  name="_my_meta[heading_one]" placeholder="Enter text for product banner heading one" type="text" value="<?php if(!empty($meta['heading_one'])) echo $meta['heading_one']; ?>"> </input>
  </p>	
      <p>	
  <label><?php _e('Banner Heading Two','sis_spa');?></label>
	</p> 
	<p>
		<input  name="_my_meta[heading_two]" placeholder="Enter text for product banner heading two" type="text" value="<?php if(!empty($meta['heading_two'])) echo $meta['heading_two']; ?>"> </input>
  </p>	
  
 
  
<?php 	
}





function my_meta_save($post_id) 
{
	
		if (!current_user_can('edit_post', $post_id)) return $post_id;
	

     $current_data = get_post_meta($post_id, '_my_meta', TRUE);	
        if(isset($_POST['_my_meta']))
	$new_data = $_POST['_my_meta'];

	my_meta_clean($new_data);
	
	if ($current_data) 
	{
		if (is_null($new_data)) delete_post_meta($post_id,'_my_meta');
		else update_post_meta($post_id,'_my_meta',$new_data);
	}
	elseif (!is_null($new_data))
	{
		add_post_meta($post_id,'_my_meta',$new_data,TRUE);
	}

	return $post_id;
}

function my_meta_clean(&$arr)
{
	if (is_array($arr))
	{
		foreach ($arr as $i => $v)
		{
			if (is_array($arr[$i])) 
			{
				my_meta_clean($arr[$i]);

				if (!count($arr[$i])) 
				{
					unset($arr[$i]);
				}
			}
			else 
			{
				if (trim($arr[$i]) == '') 
				{
					unset($arr[$i]);
				}
			}
		}

		if (!count($arr)) 
		{
			$arr = NULL;
		}
	}
} 




  
  // code for comment
if ( ! function_exists( 'spa_comment' ) ) :

function spa_comment( $comment, $args, $depth ) {
	

	
	$GLOBALS['comment'] = $comment;

//get theme data
global $data;

//translations
$leave_reply = $data['translation_reply_to_coment'] ? $data['translation_reply_to_coment'] : __('Reply','wpex');
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	  
		<div id="comment-<?php comment_ID(); ?>" class="comment-body <?php if ($comment->comment_approved == '0') echo 'pending-comment'; ?> clearfix">
                <div class="comment-details">
                    <div class="comment-avatar">
                        <?php echo get_avatar($comment, $size = '65'); ?>
                    </div><!-- /comment-avatar -->
                    <div class="comment-author vcard">
					<div class="mycomment-author"><?php printf(('%s'), get_comment_author_link()) ?>
						<span class="comment-date">
						<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php echo get_comment_date(); ?> at <?php echo get_comment_time();?></a>
						</span>
                    
					<div class="reply">
    	                    <?php comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply ,'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    	                </div>
					
					</div><!-- /comment-meta -->
                    <div class="comment-content">
									<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'sis_spa' ); ?></em>
					<br />
				<?php endif; ?>
    	                <div class="comment-text">
    	                    <?php comment_text(); ?>
    	                </div><!-- /comment-text -->
    	              
                    </div><!-- /comment-content -->
				</div><!-- /comment-details -->
		</div><!-- /comment -->
<?php
}
endif;



?>
