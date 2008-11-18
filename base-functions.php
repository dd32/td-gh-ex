<?php
/*
 * 
 * 
 * version 2.1.0
 */


//Get theme name
$theme_data = get_theme_data(dirname(__FILE__).'/style.css');
define("WEBFISH_THEME_NAME",$theme_data['Name']); 


//load translations
load_theme_textdomain( 'webfish-theme', TEMPLATEPATH . '/languages' );



/**
 * a register sidebar simplyfier
 * @param array $sidebar as name=>description
 */
function base_register_sidebars(array $sidebars){
	if ( function_exists('register_sidebar') ) {
		foreach($sidebars as $name=>$description){
			register_sidebar(array(
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'before_title' => '<h5 class="widgettitle">',
			'after_title' => '</h5>',
			'after_widget' => '</li>',
			'name' =>$name,
	        'id' => $name,
	        'description' => $description   
			));
		}
	}
}

// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

/*
 * Load script and styles
 */
if(is_admin()){//if admin page
	//enqueue styles
	wp_enqueue_style(WEBFISH_THEME_NAME."_admin", get_template_directory_uri().'/css/admin.css');
}
else{//if not admin page
	wp_enqueue_script("webfish_default",get_template_directory_uri()."/js/default.js", array("jquery"), false, true);

	//enqueue styles
	wp_enqueue_style(WEBFISH_THEME_NAME."_reset", get_template_directory_uri().'/css/reset.css');
	wp_enqueue_style(WEBFISH_THEME_NAME."_default", get_template_directory_uri().'/css/default.css');
	wp_enqueue_style(WEBFISH_THEME_NAME."_wordpress", get_template_directory_uri().'/css/wordpress.css');
	wp_enqueue_style(WEBFISH_THEME_NAME."_theme_design", get_template_directory_uri().'/css/theme_design.css');
	wp_enqueue_style(WEBFISH_THEME_NAME."_theme_appearance", get_template_directory_uri().'/css/theme_appearance.css');
	wp_enqueue_style(WEBFISH_THEME_NAME."_print", get_template_directory_uri().'/css/print.css');
	wp_enqueue_style(WEBFISH_THEME_NAME."_fonts", get_template_directory_uri().'/css/fonts.css');


}

if(is_user_logged_in()){
	//enqueue styles
	wp_enqueue_style(WEBFISH_THEME_NAME."_user", get_template_directory_uri().'/css/user.css');
}

//add css to the TinyMCE editor
add_editor_style('css/theme_appearance.css');


/**
 * add action for wp_head
 */
function webfish_wp_head(){
	$settings=get_option(WEBFISH_THEME_NAME.'_theme_settings');
	if(WEBFISH_CUSTOM_HEADER){
		if(isset($settings["header-color"]) && $settings["header-color"]!="" && $settings["header-color"]!="none"){
		?>
	<style>
		#<?php echo WEBFISH_COSTOM_HEADER_ID; ?>{
			background-color:<?php echo $settings["header-color"];?>
		}
	</style>
		<?php 
		}
	}
}
add_action("wp_head","webfish_wp_head");


function getSearchForm($text="Search"){
	?>
	<div id="search">
		<form id="searchform" action="" method="GET">
			<input name="s" type="text" value="<?php echo $text;?>"/>
		</form>
	</div>
	<?php 
}

if(WEBFISH_USE_THUMBNAILS){
	//This theme uses post thumbnails. Don't forget to do something fun with these
	add_theme_support( 'post-thumbnails' );
}


/*
 * From here is just admin stuff. You dont need to declare those for every user
 */

if(is_admin()){
	
	/*
	 * Add custom header funtionality. Why isn't this included in wordpress core?
	 */
	function webfish_admin_menu() {
		$page=array();
		
	  	//Add some submenus
	  	//parent, title, link, rights, url, function
	  	if(WEBFISH_CUSTOM_HEADER){
	  		$tmp_page=add_theme_page('Custom Header', 'Custom Header','edit_theme_options','custom-header', 'webfish_admin_custom_header');
	  		add_action("load-$tmp_page", 'webfish_admin_load_custom_header');
	  		
	  		$page[]=$tmp_page;
	  	}
	  	$page[]=add_theme_page('Webfish Options', 'Webfish Options','edit_theme_options','webfish-options', 'webfish_admin_options');	
	  		
	  	foreach($page as $p){
	  		add_action("load-$p", 'webfish_admin_load');
	  	}
	}
	add_action('admin_menu', 'webfish_admin_menu');
	
	
	/**
	 * regulair load function
	 */
	function webfish_admin_load(){
		wp_enqueue_style('webfishStyleAdmin', get_template_directory_uri().'/css/admin.css');
	}
	
	/**
	 * load on custom_header page 
	 */
	function webfish_admin_load_custom_header(){
		//the color pick script
		wp_enqueue_script('custom-header', get_template_directory_uri().'/js/custom-header.dev.js',array('farbtastic','jquery'));
		
		//style
		wp_enqueue_style('farbtastic');
	}
	
	function webfish_admin_defaults(){
		return array(
			'header-color'=>WEBFISH_CUSTOM_HEADER_DEFAULT,
			'show-logo'=>"1",
			'show_single_meta'=>"0",
			"show_authors"=>"0",
			"thumbnails_indexpage"=>"1",
			"thumbnails_single"=>"1",
			"thumbnails_page"=>"1",
			"show_comments_closed"=>"0",
			"show_allowed_tags"=>"0",
		);
	}
	
	function webfish_admin_custom_header(){
		
		echo "<div id='webfish_admin'><h1>Webfish custom header</h1>";
		
		$defaults=webfish_admin_defaults();
		
		//Load settings form database
		$settings=get_option(WEBFISH_THEME_NAME.'_theme_settings');
		
		$settings = wp_parse_args( $settings, $defaults );
		
		/*
		 * handle post
		 */
		if(isset($_POST["do"]) && $_POST["do"]=="update"){
			foreach ($settings as $name => $value)
				$settings[$name]=$_POST[$name]!=""?$_POST[$name]:$settings[$name];
			update_option(WEBFISH_THEME_NAME.'_theme_settings',$settings);
			echo "<div class='updated'>Saved!</div>";
		}
		
		
		/*
		 * Print html
		 */
		?>
		<form id="webfish_color_form" action="" method="POST">
		<input type="hidden" name="do" value="update" />
	
		
	<input type="text" name="header-color" id="header-color" value="<?php echo $settings['header-color']?>" />
	<a class="hide-if-no-js" href="#" id="pickcolor"><?php _e('Select a Color'); ?></a>
	<div id="colorPickerDiv" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>
	<input type="submit" value="Save" />
		
		</form>
		</div><!-- end webfish_admin -->
		<?php 
	}
	
	
	
	function webfish_admin_options(){
		
		echo "<div id='webfish_admin'><h1>Webfish Theme Options</h1>";
		
		$defaults=webfish_admin_defaults();
		
		//Load settings form database
		$settings=get_option(WEBFISH_THEME_NAME.'_theme_settings');
		
		$settings = wp_parse_args( $settings, $defaults );

		/*
		 * handle post
		 */
		if(isset($_POST["do"]) && $_POST["do"]=="update"){
			foreach ($settings as $name => $value)
				$settings[$name]=webfish_post($name)!=""?$_POST[$name]:$settings[$name];
			update_option(WEBFISH_THEME_NAME.'_theme_settings',$settings);
			echo "<div class='updated'>Saved!</div>";
		}
		
		
		/*
		 * Print html
		 */
		?>
		<h2>General options</h2>
		<form id="webfish_color_form" action="" method="POST">
		<input type="hidden" name="do" value="update" />
		<b>Show logo in footer</b><br />
		<input type="radio" <?php if($settings['show-logo']==="1") echo "checked='checked'" ?> name="show-logo" value="1" />Yes
		<input type="radio" <?php if($settings['show-logo']==="0") echo "checked='checked'" ?> name="show-logo" value="0" />No
		
		<br /><br />
		<b>Show single meta data</b><br />
		<input type="radio" <?php if($settings['show_single_meta']==="1") echo "checked='checked'" ?> name="show_single_meta" value="1" />Yes
		<input type="radio" <?php if($settings['show_single_meta']==="0") echo "checked='checked'" ?> name="show_single_meta" value="0" />No
		<br /><br />
	
		
		
		<b>Show authors</b><br />
		<input type="radio" <?php if($settings['show_authors']==="1") echo "checked='checked'" ?> name="show_authors" value="1" />Yes
		<input type="radio" <?php if($settings['show_authors']==="0") echo "checked='checked'" ?> name="show_authors" value="0" />No
		<br /><br />
		<input type="submit" value="Save" />
		
		
		<h2>Thumbnails</h2>
		<b>Show on index page</b><br />
		<input type="radio" <?php if($settings['thumbnails_indexpage']==="1") echo "checked='checked'" ?> name="thumbnails_indexpage" value="1" />Yes
		<input type="radio" <?php if($settings['thumbnails_indexpage']==="0") echo "checked='checked'" ?> name="thumbnails_indexpage" value="0" />No
		<br /><br />
		
		<b>Show on single</b><br />
		<input type="radio" <?php if($settings['thumbnails_single']==="1") echo "checked='checked'" ?> name="thumbnails_single" value="1" />Yes
		<input type="radio" <?php if($settings['thumbnails_single']==="0") echo "checked='checked'" ?> name="thumbnails_single" value="0" />No
		<br /><br />
		
		<b>Show on page</b><br />
		<input type="radio" <?php if($settings['thumbnails_page']==="1") echo "checked='checked'" ?> name="thumbnails_page" value="1" />Yes
		<input type="radio" <?php if($settings['thumbnails_page']==="0") echo "checked='checked'" ?> name="thumbnails_page" value="0" />No
		<br /><br />
		<input type="submit" value="Save" />
		
		<h2>Comments</h2>
		<b>Show allowed tags</b><br />
		<input type="radio" <?php if($settings['show_allowed_tags']==="1") echo "checked='checked'" ?> name="show_allowed_tags" value="1" />Yes
		<input type="radio" <?php if($settings['show_allowed_tags']==="0") echo "checked='checked'" ?> name="show_allowed_tags" value="0" />No
		<br /><br />
		
		<b>Show "Comments are closed"</b><br />
		<input type="radio" <?php if($settings['show_comments_closed']==="1") echo "checked='checked'" ?> name="show_comments_closed" value="1" />Yes
		<input type="radio" <?php if($settings['show_comments_closed']==="0") echo "checked='checked'" ?> name="show_comments_closed" value="0" />No
		<br /><br />
		<input type="submit" value="Save" />
		</form>
		</div><!-- end webfish_admin -->
		<?php 
	}
	
	
	
	/*
	 * If you just activated the theme, add some default options
	 */
	if (isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
		add_option(WEBFISH_THEME_NAME.'_theme_settings', webfish_admin_defaults(),'','yes');
	}
	
	
	/**************************************************************************
	 * From here there is some standard functions that we at Webfish use alot *
	 **************************************************************************/
	
	/**
	 * Use webfish_post() as value in a input-tag. This will return "" instead of the error you get with $_POST
	 * @param String $str
	 */
	if(!function_exists("webfish_post")){
		function webfish_post($str){
			if(isset($_POST[$str]))
				return $_POST[$str];
			return "";
		}
	}



}//End: is_admin();