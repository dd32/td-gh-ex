<?php 

### INCLUDE REQUIRED FILES ###
require_once('theme-footer.php');

$blog_abs_path = pathinfo($_SERVER["SCRIPT_FILENAME"], PATHINFO_DIRNAME);

if(is_admin())
{
	$blog_abs_path = str_replace('/wp-admin', '', $blog_abs_path);
}

require_once( $blog_abs_path . '/wp-admin/includes/template.php');
require_once( $blog_abs_path . '/wp-admin/includes/plugin.php');	

### WIDGETS AREAS
register_sidebar(array(
    'name' => 'sidebar',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ));
	
### MENUS SUPPORT ###
if ( function_exists( 'wp_nav_menu' ) ){
	if (function_exists('add_theme_support')) {
		add_theme_support('nav-menus');
		add_action( 'init', 'autoshow_register_menus' );
		function autoshow_register_menus() {
			register_nav_menus( array( 'primary-menu' => 'Primary Menu' ) );
		}
	}
}

// CallBack functions for menus in case of earlier than 3.0 Wordpress version or if no menu is set yet
function autoshow_default_primarymenu(){ ?>
	<div id="main-menu" class="clear">
    <?php $about_id = get_theme_mod('about_page', 0); 
		$menu = wp_list_pages('title_li=&exclude=$about_id&echo=0');
		if ($menu) { ?>
  		<ul>
        <li class="home-img">
          <a href="<?php echo home_url(); ?>/"> <img alt="" title="<?php bloginfo('name'); ?>" src="<?php echo get_template_directory_uri(); ?>/images/home.png"/></a>
  			</li>
  			<?php echo $menu; ?>
  		</ul>
      <?php } ?>
	</div>
<?php }

### IMAGES SIZE ###
add_image_size('home-thumb','590','330',true);
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 100, 100, true );

### EXCERPT FUNCTIONS ###
function autoshow_excerpt_length($length) {
	return 25;
}
add_filter('excerpt_length', 'autoshow_excerpt_length');

function autoshow_trim_excerpt($text) {
  return rtrim($text,'[...]');
}
add_filter('get_the_excerpt', 'autoshow_trim_excerpt');

### CONTENT LENGTH ###
if ( ! isset( $content_width ) ) $content_width = 720;

### DEREGISTER STYLES ###
add_action( 'wp_print_styles', 'autoshow_deregister_styles', 100 );

function autoshow_deregister_styles() {
	wp_deregister_style( 'wp-pagenavi' );
}

### CONTENT LENGTH ###
function autoshow_add_home_image_to_main_menu($items, $args)
{
	if( $args->theme_location == 'primary-menu' )
		$items = '<li><a href="' . home_url() . '"> <img alt="" title="' . get_bloginfo('name') . '" src="'. get_template_directory_uri() . '/images/home.png"/></a></li>' . $items;
    return $items;
}

### COMMENT LIST FUNCTION ###
function autoshow_list_comments( $comment, $args, $depth )
{
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
			?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<div id="comment-<?php comment_ID(); ?>" class="comment-inner">
					<div class="comment-author vcard">
						<?php printf( '%s <span class="says">says on</span>',
							sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php
							/* translators: 1: date, 2: time */
							printf( '%1$s at %2$s', get_comment_date(),  get_comment_time() ); ?></a>
						<span class="says">:</span>
						<?php echo get_avatar( $comment, 40); ?>
					</div><!-- .comment-author .vcard -->
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php echo 'Your comment is awaiting moderation.<br/>'; ?></em>
					<?php endif; ?>
					<div class="clear"></div>
					<div class="comment-body">
						<?php  comment_text(); ?>
						<div class="clear"></div>
					</div>
					<div class="reply-button" onclick='document.getElementById("author").focus(); return false;'>
						<?php  comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth']) ) ); ?>						
					</div><!-- .reply -->
					<div class="clear"></div>
				</div><!-- #comment-##  -->
				<div class="clear"></div>
			<?php
			break;
		case 'pingback'  :
		case 'trackback' :
		?>
			<li class="post pingback">
				<p><?php echo 'Pingback:'; ?> <?php comment_author_link(); ?></p>
			<?php
			break;
	endswitch;
}

### CUSTOM COMMENT FORM ###
function autoshow_comment_form($post, $user_ID, $user_identity) {
	if ('open' == $post->comment_status) : ?>
	<div id="respond">
		<h3 id="reply-title">
			<?php comment_form_title( 'Leave a Reply', 'Leave a Reply to <cite class="fn"> %s </cite>' ); ?>
		</h3>
		<div><small><?php cancel_comment_reply_link(); ?></small></div>
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
			<div class="comment-form">
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post"
					id="commentform">			
				
					<?php if ( $user_ID ) : ?>
						<p class="logged-in-as">Logged in as 
							<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a>
						</p>
					<?php else : ?>
						<p class="comment-notes">Your email address will not be published. Required fields are marked <span class="required">*</span></p>
						<div class="comment-by">
							<p class="comment-form-author">
								<label for="author">Name</label><span class="required">*</span>
								<input type="text" size="30" value="" name="author" id="author" tabindex="1"/>
							</p>
							<p class="comment-form-email">
								<label for="email">Email</label><span class="required">* </span>
								<input type="text" size="30" value="" name="email" id="email" tabindex="2"/>
							</p>
							<p class="comment-form-url">
								<label for="url">Website  </label><input type="text" size="30" value="" name="url" id="url" tabindex="3"/>
							</p>
						</div>
					<?php endif; ?>
					<p class="comment-form-comment" style="<?php if ( $user_ID ) echo 'float:left;'; else echo 'float: left;'; ?>">
						<label for="comment">Comment</label>
						<textarea rows="8" cols="45" name="comment" id="comment" tabindex="4"></textarea>
					</p>
					<p class="form-allowed-tags" style="<?php if ( $user_ID ) echo 'width: 440px;'; else echo ''; ?>">
						<small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small>
					</p>
					<p class="form-submit" style="<?php if ( $user_ID ) echo 'width: 460px;'; else echo ''; ?>">
						<input type="submit" value="Post Comment" id="submit" name="submit" tabindex="5"/>
						<?php comment_id_fields(); ?>
					</p>
					<?php //do_action('comment_form', $post->ID); ?>
					<?php echo '<input type="hidden" id="wp_unfiltered_html_comment" name="_wp_unfiltered_html_comment" value="' . wp_create_nonce( 'unfiltered-html-comment_' . $post->ID ) . '" />'; ?>
				</form>
			</div>
		<?php endif; // If registration required and not logged in ?>
	</div>
<?php endif; // if you delete this the sky will fall on your head 
}

### 'HOME PAGE' MENU IN DASHBOARD ###
add_action("admin_menu", 'autoshow_add_home_menu');

function autoshow_add_home_menu()
{
	if (current_user_can('edit_theme_options') )
	{
		add_theme_page('Home page', 'Home page', 'edit_theme_options', 'autoshow_home_page_settings', 'autoshow_home_page_settings' );
	}
}

function autoshow_home_page_settings()
{?>
<div class="wrap">
	<h2>Auto Show Options</h2>
	
	<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
	<legend style="margin-left:5px; padding:0 5px;color:#2481C6; text-transform:uppercase;"><strong>Home Page Settings</strong></legend>
	<table class="form-table">
		<tr valign="top">
			<th scope="row" style="vertical-align: bottom;"><label>Select the About page</label></th>
			<td>
				<?php
				if(array_key_exists('page_id', $_REQUEST))
			 		if($_REQUEST['page_id'] > 0)
			 		{
			 			set_theme_mod('about_page', $_REQUEST['page_id']);
			 		}
		 		$page = get_page(get_theme_mod('about_page', ''));
		 		if (!empty($page))
		 			echo "About page is: \"" . $page->post_title . "\".";
		 		else
		 			echo "No about page selected.";
				?>
				
				<form name="about-page-form" action="" method="post">
        	<?php wp_dropdown_pages( '' ); ?> 
        	<input type="submit" name="about-page-btn" value="Change" />
        </form>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row" style="vertical-align: middle;"><label>Home images</label></th>
			<td>
			<p>To see your own images on the Home page, please go to <em>Media</em> and upload images greather than 590 x 330 pixels. If you uploaded more, they will be displayed random to each page's refresh.</p>
			<p><strong>Note:</strong> To view these images, please do not attach them to any post.</p>
			</td>
		</tr>
	</table>
</fieldset>
</div>
<?php
}

### CUSTOM FRONT PAGE MENU IN DASHBOARD ###
//add_settings_field( 'custom_frontpage', '', 'autoshow_frontpage_function', 'reading', 'default' );
//register_setting( 'reading', 'custom_frontpage');

function autoshow_frontpage_function() 
{?>
	<p id="custom-frontpage-block" style="display: none;"><label>
	<input name="show_on_front" type="radio" value="custom_frontpage" class="tog" <?php checked( 'custom_frontpage', get_option( 'show_on_front' ) ); ?> />
	<span class="alignleft"><?php echo 'Custom Front Page'; ?></span>
	<img src="<?php echo get_template_directory_uri() . '/screenshot.png' ; ?>" class="alignleft" style="margin-left: 10px; border: 1px solid;" alt="" />
	</label></p>
	<script type="text/javascript">
		jQuery(document).ready(function($)
		{
			var front_content = $('#front-static-pages').html();
			var new_content = $('#custom-frontpage-block').html();
			var end_fieldset = '<' + '/fieldset' + '>';
			new_content = '<' + 'p id="custom-frontpage-top"' + '>' + new_content + '<' + '/p' + '>';
			front_content = front_content.replace(end_fieldset, '');
			front_content += new_content;
			front_content += end_fieldset;
			$('#front-static-pages').html(front_content);
			$('#custom-frontpage-block').html('');
			
			var section = $('#front-static-pages'),
			staticPage = section.find('input:radio[value="page"]'),
			selects = section.find('select'),
			check_disabled = function(){
				selects.attr('disabled', staticPage.is(':checked') ? '' : 'disabled');
			};
				check_disabled();
 			section.find('input:radio').change(check_disabled);
		});
	</script>
<?php	
}

### DISPLAY LSIT OF MANY CATEGORIES AS A DROPDOWN ###
function autoshow_the_category()
{
	$categories = get_the_category( get_the_ID() );
	/*if(count( $categories) > 3 )
	{
		echo '<p class="category">&nbsp;|&nbsp;Category: &nbsp;';
		
		$dropdown_cats = '<select id="cat-from' . get_the_ID() . '" class="dropdown-categories" onchange="document.location.href=this.options[this.selectedIndex].value;">';
		$dropdown_cats .= '<option selected="selected" value="">Click to enlarge.</option>';
		foreach ($categories as $cat)
    	{
        	$dropdown_cats .= '<option value="';
        	$dropdown_cats .= get_category_link($cat->cat_ID);
        	$dropdown_cats .= '">' . $cat->cat_name . '</option>\n';
		}
    	$dropdown_cats .= '</select>';
		echo $dropdown_cats;
		echo '</p>';
	}
	else
	{*/
	echo '<p class="category single-row">Category: &nbsp;';
		the_category( ', ' );
		echo '</p>';
	/*}*/
}

### DISPLAY LSIT OF MANY TAGS AS A DROPDOWN ###
function autoshow_the_tags()
{
	$tags = get_the_tags();
	if( ! empty( $tags ) )
	{
		/*$dropdown_tags = "<select class=\"dropdown-tags\" onchange=\"document.location.href=this.options[this.selectedIndex].value;\">";
		$dropdown_tags .= '<option selected="selected" value="">Click to enlarge.</option>';
		foreach ( $tags as $tag ) {
      $dropdown_tags .= "<option value=\"";
      $dropdown_tags .= get_tag_link( $tag->term_id );
      $dropdown_tags .= "\">" . $tag->name . "</option>\n";
		}
    $dropdown_tags .= "</select>";
		if( count( $tags ) > 2 )
		{
	  	echo '<p class="tag">&nbsp;|&nbsp; Tags: &nbsp;';
	   	echo $dropdown_tags;
	   	echo '</p>';
	  }
	  else
	  {*/
	  echo '<p class="tag single-row">&nbsp;|&nbsp; Tags: &nbsp;';
	  the_tags( '' ,', ' );
	  echo '</p>';
		/*}*/
	}
}

### Copied from Twenty Ten Theme and modified ###
if ( ! function_exists( 'posted_in' ) ) :
function posted_in() {	
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	} else {
		$posted_in = 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	}
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

### CHECK IF IS HOME PAGE DISPLAYED ###
function autoshow_check_if_home()
{
	return !( is_category() || is_month() || is_day() || is_author() || is_tag() || is_tax() || is_archive() || is_search() || is_404() || is_single() || is_attachment() || is_page() );
}

### CUSTOM 'HEADER' MENU STYLE IN DASHBOARD ###
function autoshow_admin_header_style() 
{ ?>
  
<style type="text/css">

#headimg {
	border: 1px solid #000;
	background-repeat: no-repeat;
	max-height: 70px;
}

</style>
<?php
}

### INITIALIZE THE THEME ###
add_action( 'after_setup_theme', 'autoshow_setup' );

function autoshow_setup()
{
  wp_deregister_script('jquery');
  wp_register_script('jquery' , 'https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
  wp_enqueue_script('jquery');

	if ( is_singular() ) 
		wp_enqueue_script( 'comment-reply' );
		
	wp_register_script('core', 
			get_stylesheet_directory_uri().'/js/core.js', array('jquery'));
	wp_enqueue_script('core');
	
	add_theme_support('automatic-feed-links');
	
	add_editor_style();
	
	add_custom_background();
	
	define( 'HEADER_TEXTCOLOR', '' );
	define( 'HEADER_IMAGE', '' );

	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'autoshow_header_image_width', 70 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'autoshow_header_image_height', 70 ) );
	
	define( 'NO_HEADER_TEXT', true );
	
	add_custom_image_header( '', 'autoshow_admin_header_style' );
		
	define( 'FOOTER_IMAGE_DEFAULT', '%s/images/footer-img-notset.jpg' );
	define ( 'FDI', '1' ); // defines Footer Default Image Selected

	define( 'FOOTER_IMAGE_WIDTH', apply_filters( 'autoshow_footer_image_width', 215 ) );
	define( 'FOOTER_IMAGE_HEIGHT', apply_filters( 'autoshow_footer_image_height', 124 ) );
	
	define( 'CATEGORY_NOT_SET', '<span style="font-size: 11px;">No Category. <br/>Dashboard->Appearance->Footer.</span>' );
	
	add_custom_image_footer();    
	
	add_filter('wp_nav_menu_items', 'autoshow_add_home_image_to_main_menu', 10, 2);
}

?>