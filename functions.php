<?php

function ascreen_setup(){
	global $content_width;

	$lang = get_template_directory(). '/languages';
	load_theme_textdomain('ascreen', $lang);
	
	$template_directory = get_template_directory();
	require_once( $template_directory . '/includes/customize/customize.php' );
	

	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 185, 135 );
	$args = array();
	$header_args = array(
	    'default-image'          => '',
		'default-repeat' => 'no-repeat',
        'default-text-color'     => '2C2C2C',
		'url'                    => '',
        'width'                  => 1920,
        'height'                 => 89,
        'flex-height'            => true
     );
	add_theme_support( 'custom-background', $args );
	add_theme_support( 'custom-header', $header_args );
	add_theme_support( 'automatic-feed-links' );//

	add_theme_support( 'custom-logo', array(
			   'height'      => 50,
			   'width'       => 50,
			   'flex-width' => true,
			) );

	//register menus
	register_nav_menus(
					   array(
						'header-menu' => __( 'Header Menu', 'ascreen' ) ,
					   	'footer-menu' => __( 'Footer Menu', 'ascreen' )	
					   )
					   );					   
					   
	
	add_theme_support( "title-tag" );//
	add_editor_style("editor-style.css");
	if ( !isset( $content_width ) ) $content_width = 1170;	
}
add_action( 'after_setup_theme', 'ascreen_setup' );

	
function ascreen_custom_scripts()
{
	global $is_IE;
	$theme_info = wp_get_theme();
	

	wp_enqueue_style('ascreen-base',  get_template_directory_uri() .'/css/base.css', false, $theme_info->get( 'Version' ), false);			


	wp_enqueue_style('ascreen-main', get_stylesheet_uri(), false, $theme_info->get( 'Version' ) );	
	
			
	wp_enqueue_script('ascreen-main', get_template_directory_uri().'/js/main.js', array( 'jquery' ),$theme_info->get( 'Version' ), false );				
}

add_action( 'wp_enqueue_scripts', 'ascreen_custom_scripts' );


/*
add widgets to wp-admin
*/
function ascreen_widgets_init() {

	register_sidebar( array(
		'name' => __('Sidebar','ascreen'),
		'id' => 'sidebar',
		'before_widget' => '<div class="sidebar-section"><ul class="blog-category">
',
		'after_widget' => '</ul></div> <!-- end .sidebar-section -->',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

	
	register_sidebar( array(
		'name' => __('Footer Area #1','ascreen'),		
		'id' => 'sidebar-1',
		'before_widget' => '<dl id="%1$s" class="%2$s col-md-4">',
		'after_widget' => '</dl>',
		'before_title' => '<dt class="title">',
		'after_title' => '</dt>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area #2','ascreen'),			
		'id' => 'sidebar-2',
		'before_widget' => '<dl id="%1$s" class="%2$s col-md-4">',
		'after_widget' => '</dl>',
		'before_title' => '<dt class="title">',
		'after_title' => '</dt>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area #3','ascreen'),	
		'id' => 'sidebar-3',
		'before_widget' => '<dl id="%1$s" class=" %2$s col-md-4">',
		'after_widget' => '</dl>',
		'before_title' => '<dt class="title">',
		'after_title' => '</dt>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area #4','ascreen'),	
		'id' => 'sidebar-4',
		'before_widget' => '<dl id="%1$s" class=" %2$s col-md-4">',
		'after_widget' => '</dl>',
		'before_title' => '<dt class="title">',
		'after_title' => '</dt>',
	) );
}
add_action( 'widgets_init', 'ascreen_widgets_init' );

function ascreen_paging_nav(){
	global $wp_query;
	$pages = $wp_query->max_num_pages; 
	if ( $pages >= 2 ): 
		$big = 999999999; 
		$paginate = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'end_size' => 13, 
			'type' => 'array' 
			));
		echo '<div class="ct_page_nav"><ul class="pagination">';
		foreach ($paginate as $value)
		{
			echo '<li>'.$value.'</li>';
		}
		echo '</ul></div>';
	endif;
}


function ascreen_better_comments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
?>	
 
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="comment_avatar">
                <?php echo get_avatar($comment, $size = '45'); ?>
            </div>

            <div class="comment_postinfo">
                <?php printf(__('<cite class="fn">%s</cite> <span class="says"> on </span>','ascreen'), get_comment_author_link()) ?>
                <span class="comment_date"><?php printf(__('%1$s at %2$s','ascreen'), get_comment_date(),  get_comment_time()) ?></span><?php edit_comment_link(__('(Edit)','ascreen'),'  ','') ?>
            </div> <!-- .comment_postinfo -->

            <div class="comment_area">				
                <div class="comment-content clearfix">
                	<?php if ($comment->comment_approved == '0') : ?>
                     	<em><?php _e('Your comment is awaiting moderation.','ascreen') ?></em>
                     	<br />
                    <?php endif; ?>
                    
                    <?php comment_text() ?>
                    
                    
                    <div class="reply-container">
                        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </div>
                      
                </div> <!-- end comment-content-->
            </div> <!-- end comment_area-->
        </article> <!-- .comment-body -->
        
<?php
}


function ascreen_get_author_info() 
{
	?>
    <div class="author">
        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> . 
        <time><?php the_date();?></time> . 
        <?php
        $categories = get_the_category();
        if(! empty( $categories ))
        {
				$i = 0;
            foreach($categories as $category){
				$i++;
				if($i == 6){ break;}
                $category->cat_ID;
                $category->cat_name;
				$cat_links=get_category_link($category->cat_ID );
				?>
				<a href="<?php echo esc_url($cat_links); ?>" title="<?php echo esc_html($category->cat_name); ?>">#<?php echo esc_html($category->cat_name);?>&nbsp;</a>
                <?php
            } 
        }
        ?>                        
    </div>
	<?php
}

function ascreen_get_the_category() 
{
	
	$categories_all = get_the_category();
	$str = '';
	$i = 0;
	
	foreach($categories_all as $categories ){
		$i++;
		if($i == 6){ break;}
		if ( ! empty( $categories ) ) {
			$cat_name = $categories->cat_name;
			$cat_ID = $categories->cat_ID;
		}
		
		$cat_links=get_category_link($cat_ID);
		
		$str .= "<a href=\"".esc_url($cat_links)."\" class=\"newsflash\">#".esc_html($cat_name)."</a>";
	}
	
	echo $str;
}

function ascreen_get_share_url() 
{	
	$mods = get_theme_mods();

	$twitter_url = !empty($mods['ascreen_option']['twitter_url']) ? $mods['ascreen_option']['twitter_url']:'#';
	$google_plus_url = !empty($mods['ascreen_option']['google_plus_url']) ? $mods['ascreen_option']['google_plus_url']:'#';	
	$facebook_url = !empty($mods['ascreen_option']['facebook_url']) ? $mods['ascreen_option']['facebook_url']:'#';	

	?>
	<div class="share">
		<?php if( $twitter_url != ''){?>
		<a target="_blank" href="<?php echo esc_url($twitter_url);?>" class="share-twitter cbutton cbutton--effect-jagoda"><i class="icon-twitter"></i></a>
		<?php }?>
		<?php if( $google_plus_url != ''){?>
		<a target="_blank" href="<?php echo esc_url($google_plus_url);?>" class="share-google-plus cbutton cbutton--effect-jagoda"><i class="icon-google-plus"></i></a>
		<?php }?>
		<?php if( $facebook_url != ''){?>                                
		<a target="_blank" href="<?php echo esc_url($facebook_url);?>" class="share-facebook cbutton cbutton--effect-jagoda"><i class="icon-facebook"></i></a>
		<?php }?>
	</div>
	<?php	
}


// Generating Live CSS
function ascreen_customize_css()
{
    ?>
		<style  id='ascreen_customize_css' type="text/css">
	<?php	
			$ascreen_custom_css = "";
			$header_image       = get_header_image();
			if (isset($header_image) && ! empty( $header_image ))
			{
				$ascreen_custom_css .= "header#header{background:url(".esc_url($header_image). ");}\n";
			}

			$ascreen_custom_css   = esc_html($ascreen_custom_css);
			
			$ascreen_custom_css   = str_replace('&gt;','>',$ascreen_custom_css);			

			echo $ascreen_custom_css;
				
			?></style>
    <?php
}

add_action( 'wp_head', 'ascreen_customize_css');
add_action( 'customize_controls_print_styles', 'ascreen_customize_css' );