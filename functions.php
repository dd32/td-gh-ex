<?php

function ascreen_setup(){
	global $content_width;
	$lang = get_template_directory(). '/languages';
	load_theme_textdomain('ascreen', $lang);
	
	$template_directory = get_template_directory();
	require_once( $template_directory . '/includes/customize/customize.php' );
	
	add_theme_support('post-thumbnails');
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
	$theme_info = wp_get_theme();
		
	wp_enqueue_style('ascreen-main', get_stylesheet_uri(), array(), $theme_info->get( 'Version' ) );			
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
		'before_widget' => '<dl id="%1$s" class="%2$s">',
		'after_widget' => '</dl>',
		'before_title' => '<dt class="title">',
		'after_title' => '</dt>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area #2','ascreen'),			
		'id' => 'sidebar-2',
		'before_widget' => '<dl id="%1$s" class="%2$s">',
		'after_widget' => '</dl>',
		'before_title' => '<dt class="title">',
		'after_title' => '</dt>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area #3','ascreen'),	
		'id' => 'sidebar-3',
		'before_widget' => '<dl id="%1$s" class=" %2$s">',
		'after_widget' => '</dl>',
		'before_title' => '<dt class="title">',
		'after_title' => '</dt>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area #4','ascreen'),	
		'id' => 'sidebar-4',
		'before_widget' => '<dl id="%1$s" class=" %2$s">',
		'after_widget' => '</dl>',
		'before_title' => '<dt class="title">',
		'after_title' => '</dt>',
	) );
}
add_action( 'widgets_init', 'ascreen_widgets_init' );


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
            foreach($categories as $category) {
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
	$categories = get_the_category();
	 
	if ( ! empty( $categories ) ) {
		$cat_name = $categories[0]->cat_name;
		$cat_ID = $categories[0]->cat_ID;
	}
	
	$cat_links=get_category_link($cat_ID);
	
	echo "<a href=\"".esc_url($cat_links)."\" class=\"newsflash\">#".esc_html($cat_name)."</a>";
	
	
}


/**
 * Gets option value from the single theme option, stored as an array in the database
 * if all options stored in one row.
 * Stores the serialized array with theme options into the global variable on the first function run on the page.
 *
 * If options are stored as separate rows in database, it simply uses get_option() function.
 *
 * @param string $option_name Theme option name.
 * @param string $default Default value that should be set if the theme option isn't set.
 */
if ( ! function_exists( 'ascreen_get_option' ) ){
	function ascreen_get_option( $ct_row,$option_name,$default )
	{			
		$arr =  get_option($ct_row);		
		if(is_array($arr))
		{
			@$option_value     = $arr[$option_name];
			if($option_value !='')
			{
				return $option_value;
			}
			else
			{
				if(array_key_exists($option_name,$arr) ){
					return  false;
				}	
				else
				{		
					return  $default;	
				}
			}
		}
		else
		{		
			return  $default;	
		}
	}
}



function ascreen_get_share_url() 
{
	?>
	<div class="share">
		<?php if( ascreen_get_option( 'ascreen_option','twitter_url','#') != ''){?>
		<a target="_blank" href="<?php echo esc_url(ascreen_get_option( 'ascreen_option','twitter_url','#'));?>" class="share-twitter cbutton cbutton--effect-jagoda"><i class="icon-twitter"></i></a>
		<?php }?>
		<?php if( ascreen_get_option( 'ascreen_option','google_plus_url','#') != ''){?>
		<a target="_blank" href="<?php echo esc_url(ascreen_get_option( 'ascreen_option','google_plus_url','#'));?>" class="share-google-plus cbutton cbutton--effect-jagoda"><i class="icon-google-plus"></i></a>
		<?php }?>
		<?php if( ascreen_get_option( 'ascreen_option','facebook_url','#') != ''){?>                                
		<a target="_blank" href="<?php echo esc_url(ascreen_get_option( 'ascreen_option','facebook_url','#'));?>" class="share-facebook cbutton cbutton--effect-jagoda"><i class="icon-facebook"></i></a>
		<?php }?>
	</div>
	<?php	
}