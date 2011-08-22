<?php

//  Hooks/Filters
add_action('admin_init', 'mantra_init_fn' );
add_action('admin_menu', 'mantra_add_page_fn');

add_action('init', 'mantra_init');
function mantra_init() {

	wp_enqueue_script("farbtastic");
	wp_register_script('jqueryui',get_template_directory_uri() . '/js/jqueryui/js/jquery-ui-1.8.16.custom.min.js', array('jquery') );
	wp_enqueue_script('jqueryui');
	load_theme_textdomain( 'mantra', TEMPLATEPATH . '/languages' );



$mantra_defaults = array(

"mop_side" => "Right",
"mop_sidewidth" => 800,
"mop_sidebar" => 250,
"mop_colpad" => "10",

"mop_fontsize" => "15px",
"mop_headfontsize" => "Default",
"mop_sidefontsize" => "Default",
"mop_fontfamily" => '"Segoe UI", Arial, sans-serif',
"mop_textalign" => "Default",
"mop_parindent" => "0px",
"mop_lineheight" => "Default",
"mop_wordspace" => "Default",
"mop_letterspace" => "Default",



"mop_backcolor" => "#444444",
"mop_headercolor" => "#333333",
"mop_prefootercolor" => "#222222",
"mop_footercolor" => "#171717",
"mop_titlecolor" => "#0D85CC",
"mop_descriptioncolor" => "#999999",
"mop_contentcolor" => "#333333",
"mop_linkscolor" => "#0D85CC",
"mop_hovercolor" => "#333333",
"mop_headtextcolor" => "#333333",
"mop_headtexthover" => "#000000",
"mop_sideheadbackcolor" => "#444444",
"mop_sideheadtextcolor" => "#2EA5FD",

"mop_footerheader" => "#0C85CD",
"mop_footertext" => "#666666",
"mop_footerhover" => "#888888",

"mop_caption" => "Light",
"mop_pin" => "Pin2",
"mop_sidebullet" => "arrow_white",
"mop_contentlist" => "Show",
"mop_title" => "Show",
"mop_pagetitle" => "Show",
"mop_categtitle" => "Show",
"mop_tables" => "Disable",
"mop_backtop" => "Enable",
"mop_comtext" => "Show",
"mop_copyright" => "",

"mop_postdate" => "Show",
"mop_posttime" => "Hide",
"mop_postauthor" => "Show",
"mop_postcateg" => "Show",
"mop_postbook" => "Show",

"mop_excerpthome" => "Full Post",
"mop_excerptarchive" => "Full Post",
"mop_excerptasides" => "Yes",
"mop_excerptwords" => "50",
"mop_excerptdots" => " &hellip;",
"mop_excerptcont" => " Continue reading",

"mop_facebook" => "",
"mop_tweeter" => "",
"mop_rss" => "");

$options = get_option('ma_options');

if(!$options)
update_option('ma_options',$mantra_defaults);
}



// The settings
function mantra_init_fn(){
	wp_register_style( 'mantra',get_template_directory_uri() . '/mantra-admin.css' );
	wp_register_style( 'mantra2',get_template_directory_uri() . '/js/farbtastic/farbtastic.css' );
	wp_register_style( 'jqueryui',get_template_directory_uri() . '/js/jqueryui/css/ui-lightness/jquery-ui-1.8.16.custom.css' );


	register_setting('ma_options', 'ma_options', 'ma_options_validate' );
	add_settings_section('layout_section', __('Layout Settings','mantra'), 'section_layout_fn', __FILE__);
	add_settings_section('text_section', __('Text Settings','mantra'), 'section_text_fn', __FILE__);
	add_settings_section('appereance_section',__('Color Settings','mantra') , 'section_appereance_fn', __FILE__);
	add_settings_section('graphics_section', __('Graphics Settings','mantra') , 'section_graphics_fn', __FILE__);
	add_settings_section('post_section', __('Post Information Settings','mantra') , 'section_post_fn', __FILE__);
	add_settings_section('excerpt_section', __('Post Excerpt Settings','mantra') , 'section_excerpt_fn', __FILE__);
	add_settings_section('socials_section', __('Social Sites Settings','mantra') , 'section_social_fn', __FILE__);

	add_settings_field('mop_side', __('Sidemenu Position','mantra') , 'setting_side_fn', __FILE__, 'layout_section');
	add_settings_field('mop_sidewidth', __('Content / Sidebar Width','mantra') , 'setting_sidewidth_fn', __FILE__, 'layout_section');
	add_settings_field('mop_sidebar', __('Total Site Width','mantra') , 'setting_sidebar_fn', __FILE__, 'layout_section');
	add_settings_field('mop_colpad', __('Padding between Columns','mantra') , 'setting_colpad_fn', __FILE__, 'layout_section');

	add_settings_field('mop_fontfamily', __('Select Font Type','mantra') , 'setting_fontfamily_fn', __FILE__, 'text_section');
	add_settings_field('mop_fontsize', __('Select General Font Size','mantra') , 'setting_fontsize_fn', __FILE__, 'text_section');
	add_settings_field('mop_headfontsize', __('Select Post Header Font Size','mantra') , 'setting_headfontsize_fn', __FILE__, 'text_section');
	add_settings_field('mop_sidefontsize', __('Select SideBar Font Size','mantra') , 'setting_sidefontsize_fn', __FILE__, 'text_section');
	add_settings_field('mop_textalign', __('Force Text Align','mantra') , 'setting_textalign_fn', __FILE__, 'text_section');
	add_settings_field('mop_parindent', __('Paragraph indent','mantra') , 'setting_parindent_fn', __FILE__, 'text_section');
	add_settings_field('mop_lineheight', __('Line Height','mantra') , 'setting_lineheight_fn', __FILE__, 'text_section');
	add_settings_field('mop_wordspace', __('Word spacing','mantra') , 'setting_wordspace_fn', __FILE__, 'text_section');
	add_settings_field('mop_letterspace', __('Letter spacing','mantra') , 'setting_letterspace_fn', __FILE__, 'text_section');


	add_settings_field('mop_backcolor', __('Background Color','mantra') , 'setting_backcolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_headercolor', __('Header Color','mantra') , 'setting_headercolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_prefootercolor', __('Pre-Footer Color','mantra') , 'setting_prefootercolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_footercolor', __('Footer Color','mantra') , 'setting_footercolor_fn', __FILE__, 'appereance_section');

	add_settings_field('mop_titlecolor', __('Title Color','mantra') , 'setting_titlecolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_descriptioncolor', __('Description Color','mantra') , 'setting_descriptioncolor_fn', __FILE__, 'appereance_section');

	add_settings_field('mop_contentcolor', __('Content Text Color','mantra') , 'setting_contentcolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_linkscolor', __('Links Color','mantra') , 'setting_linkscolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_hovercolor', __('Links Hover Color','mantra') , 'setting_hovercolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_headtextcolor',__( 'Entry Title Color','mantra') , 'setting_headtextcolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_headtexthover', __('Entry Title Hover Color','mantra') , 'setting_headtexthover_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_sideheadbackcolor', __('Sidebar Header Background Color','mantra') , 'setting_sideheadbackcolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_sideheadtextcolor', __('Sidebar Header Text Color','mantra') , 'setting_sideheadtextcolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_footerheader', __('Footer Widget Header Text Color','mantra') , 'setting_footerheader_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_footertext', __('Footer Widget Link Color','mantra') , 'setting_footertext_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_footerhover', __('Footer Widget Hover Color','mantra') , 'setting_footerhover_fn', __FILE__, 'appereance_section');

	add_settings_field('mop_caption', __('Caption Border','mantra') , 'setting_caption_fn', __FILE__, 'graphics_section');
	add_settings_field('mop_pin', __('Caption Pin','mantra') , 'setting_pin_fn', __FILE__, 'graphics_section');
	add_settings_field('mop_sidebullet', __('Sidebar Menu Bullets','mantra') , 'setting_sidebullet_fn', __FILE__, 'graphics_section');
	add_settings_field('mop_contentlist', __('Content List Bullets','mantra') , 'setting_contentlist_fn', __FILE__, 'graphics_section');
	add_settings_field('mop_title', __('Title and Description','mantra') , 'setting_title_fn', __FILE__, 'graphics_section');
	add_settings_field('mop_pagetitle', __('Page Titles','mantra') , 'setting_pagetitle_fn', __FILE__, 'graphics_section');
	add_settings_field('mop_categetitle', __('Category Page Titles','mantra') , 'setting_categtitle_fn', __FILE__, 'graphics_section');
	add_settings_field('mop_tables', __('Invisible Tables','mantra') , 'setting_tables_fn', __FILE__, 'graphics_section');
	add_settings_field('mop_backtop', __('Enable Back to Top button','mantra') , 'setting_backtop_fn', __FILE__, 'graphics_section');
	add_settings_field('mop_comtext', __('Text Under Comments','mantra') , 'setting_comtext_fn', __FILE__, 'graphics_section');
	add_settings_field('mop_copyright', __('Insert footer copyright','mantra') , 'setting_copyright_fn', __FILE__, 'graphics_section');

	add_settings_field('mop_postdate', __('Post Date','mantra') , 'setting_postdate_fn', __FILE__, 'post_section');
	add_settings_field('mop_posttime', __('Post Time','mantra') , 'setting_posttime_fn', __FILE__, 'post_section');
	add_settings_field('mop_postauthor', __('Post Author','mantra') , 'setting_postauthor_fn', __FILE__, 'post_section');
	add_settings_field('mop_postcateg', __('Post Category','mantra') , 'setting_postcateg_fn', __FILE__, 'post_section');
	add_settings_field('mop_postbook', __('Post Permalink','mantra') , 'setting_postbook_fn', __FILE__, 'post_section');

	add_settings_field('mop_excerpthome', __('Post Excerpts on Home Page','mantra') , 'setting_excerpthome_fn', __FILE__, 'excerpt_section');
	add_settings_field('mop_excerptarchive', __('Post Excerpts on Arhive and Category Pages','mantra') , 'setting_excerptarchive_fn', __FILE__, 'excerpt_section');
	add_settings_field('mop_excerptasides', __('Affect posts in Asides Category','mantra') , 'setting_excerptasides_fn', __FILE__, 'excerpt_section');
	add_settings_field('mop_excerptwords', __('Number of Words for Post Excerpts ','mantra') , 'setting_excerptwords_fn', __FILE__, 'excerpt_section');
	add_settings_field('mop_excerptdots', __('Excerpt suffix', 'setting_excerptdots_fn','mantra') , __FILE__, 'excerpt_section');
	add_settings_field('mop_excerptcont', __('Continue reading link text ','mantra') , 'setting_excerptcont_fn', __FILE__, 'excerpt_section');


	add_settings_field('mop_facebook', __('Facebook Link','mantra') , 'setting_facebook_fn', __FILE__, 'socials_section');
	add_settings_field('mop_tweeter', __('Tweeter Link','mantra') , 'setting_tweeter_fn', __FILE__, 'socials_section');
	add_settings_field('mop_rss', __('RSS Feed Link','mantra') , 'setting_rss_fn', __FILE__, 'socials_section');

}

// Adding the mantra subpage
function mantra_add_page_fn() {
$page = add_theme_page('Mantra Settings', 'Mantra Settings', 'edit_theme_options', 'mantra-page', 'mantra_page_fn');
/*$page2 = add_theme_page('Layout', '&nbsp;&nbsp; - Layout', 'edit_theme_options', 'mantra-layout', 'mantra_page_fn');
$page3 = add_theme_page('Text', '&nbsp;&nbsp; - Text', 'edit_theme_options', 'mantra-text', 'mantra_page_fn');
$page4 = add_theme_page('Colors', '&nbsp;&nbsp; - Colors', 'edit_theme_options', 'mantra-colors', 'mantra_page_fn');
$page5 = add_theme_page('Graphics', '&nbsp;&nbsp; - Graphics', 'edit_theme_options', 'mantra-graphics', 'mantra_page_fn');
$page5 = add_theme_page('Post_Social', '&nbsp;&nbsp; - Post and Social', 'edit_theme_options', 'mantra-post', 'mantra_page_fn');*/
	add_action( 'admin_print_styles-'.$page, 'mantra_admin_styles' );

}
function mantra_admin_styles() {

	wp_enqueue_style( 'mantra' );
	wp_enqueue_style( 'mantra2' );
	wp_enqueue_style( 'jqueryui' );
}



// ************************************************************************************************************

/*
// Callback functions

// General suboptions description

function  section_layout_fn() {

	echo "<p>".__("Settings for adjusting your blog's layout.", "mantra")."</p>";
}
function  section_text_fn() {
	echo "<p>".__("All text related customization options.", "mantra")."</p>";
}

function  section_graphics_fn() {
	echo "<p>".__("Settings for hiding or showing different graphics.", "mantra")."</p>";
}

function  section_post_fn() {
	echo "<p>".__("Settings for hiding or showing different post tags.", "mantra")."</p>";
}

function  section_excerpt_fn() {
	echo "<p>".__("Settings for post excerpts", "mantra")."</p>";
}

function  section_appereance_fn() {
	echo "<p>".__("Set text and background colors.", "mantra")."</p>";
}

function  section_social_fn() {
	echo "<p>".__("Insert the addreses for your social media. Leave blank if not the case.
	Please type the whole address (including <i>http://</i> ) Example : <u>http://www.facebook.com</u>.", "mantra")."</p>";
}

*/
////////////////////////////////
//// LAYOUT SETTINGS ///////////
////////////////////////////////

 //SELECT - Name: ma_options[side]
function  setting_side_fn() {
$options = get_option('ma_options');
	if (!isset($options['mop_side'])) { $options['mop_side'] ="Right";	}

$items = array("Left", "Right", "Disable");
$itemsare = array( __("Left","mantra"), __("Right","mantra"), __("Disable","mantra"));
echo "<select id='mop_side' name='ma_options[mop_side]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_side']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
echo "</select>";

echo "<div><small>".__("Select the side on which to display the sidebar. You can also choose to disable it altogether and have only one column for a presentation-like design.
			Disabling the sidemenu also disables the Content/Sidemenu Width option.","mantra")."</small></div>";

}



 //SLIDER - Name: ma_options[sidewidth]
function setting_sidewidth_fn()
   {
   $options = get_option('ma_options');
	if (!isset($options['mop_sidewidth'])) { $options['mop_sidewidth'] =800;}
	if (!isset($options['mop_sidebar'])) { $options['mop_sidebar'] =250;}
   ?>

   



	<style>
	#demo-frame > div.demo { padding: 10px !important; };

	</style>
	<script>

	jQuery(function() {

		jQuery( "#slider-range" ).slider({
			range: true,
			step:10,
			min: 0,
			max: 1440,
			values: [ <?php echo $options['mop_sidewidth'] ?>, <?php echo ($options['mop_sidewidth']+$options['mop_sidebar']); ?> ],
			slide: function( event, ui ) {
		
											}

		
										});

			jQuery( "#mop_sidewidth" ).val( <?php echo $options['mop_sidewidth'];?> );
			jQuery( "#mop_sidebar" ).val( <?php echo $options['mop_sidebar'];?> );
	var	percentage =parseInt(	jQuery( "#slider-range .ui-slider-range" ).css('width'));
	var leftwidth =	parseInt(jQuery( "#slider-range .ui-slider-range" ).css('left'));
			jQuery( "#barb" ).css('left',150+leftwidth+percentage/2+"px");
			jQuery( "#contentb" ).css('left',210+leftwidth/2+"px");
							});


		jQuery( "#slider-range" ).bind( "slide", function(event, ui) {
			range=ui.values[ 1 ] - ui.values[ 0 ];


 			if (ui.values[ 0 ]<500) {ui.values[ 0 ]=500; return false;};
			if(	range<220 || range>500 ){ ui.values[ 1 ] =  <?php echo $options['mop_sidebar']+$options['mop_sidewidth'];?>; return false;  };			
																	
			jQuery( "#mop_sidewidth" ).val( ui.values[ 0 ] );
			jQuery( "#mop_sidebar" ).val( ui.values[ 1 ] - ui.values[ 0 ] );
			jQuery( "#totalwidth" ).html( ui.values[ 1 ]);
			jQuery( "#contentsize" ).html( ui.values[ 0 ]);jQuery( "#barsize" ).html( ui.values[ 1 ]-ui.values[ 0 ]);

	var	percentage =parseInt(	jQuery( "#slider-range .ui-slider-range" ).css('width'));
	var leftwidth =	parseInt(jQuery( "#slider-range .ui-slider-range" ).css('left'));
			jQuery( "#barb" ).css('left',180+leftwidth+percentage/2+"px");
			jQuery( "#contentb" ).css('left',220+leftwidth/2+"px");
	

																		});
									
	</script>



<div class="hereitis">


	<b id="contentb" style="display:block;float:left;position:absolute;margin-top:-20px;">Content = <span id="contentsize"><?php echo $options['mop_sidewidth'];?></span>px</b>
	<b id="barb" style="margin-left:40px;color:#F6A828;display:block;float:left;position:absolute;margin-top:-20px;" >Sidebar = <span id="barsize"><?php echo $options['mop_sidebar'];?></span>px</b>
<p>

	<?php echo  "<input type='hidden'  name='ma_options[mop_sidewidth]' id='mop_sidewidth'   />";?>

</p>

<div id="slider-range"></div>

</div><!-- End demo -->



   <?php
   echo "<div><small>".__("Select the width of your <b>content</b> and <b>sidebar</b>. <br />
 		While the content cannot be less than 550px wide, the sidebar is at least 220px and no more than 500px.","mantra")."</small></div>";

   }


 //SLIDER - Name: ma_options[sidebar]
function setting_sidebar_fn()
   {
   $options = get_option('ma_options');
	if (!isset($options['mop_sidebar'])) { $options['mop_sidebar'] =250;}

   ?>

<?php echo  "<input type='hidden'  name='ma_options[mop_sidebar]' id='mop_sidebar'   />";?>
<b><span id="totalwidth"><?php echo $options['mop_sidebar']+$options['mop_sidewidth'];?></span> px</b>

   <?php
   echo "<div><small>".__("This will be the <b>total width</b> of your site. This is not an editable field; it is calculated automatically after the content/sidebar slider. The absolute maximum is 1440.","mantra")."</small></div>";

   }




 //SELECT - Name: ma_options[colpad]
function  setting_colpad_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_colpad'])) { $options['mop_colpad'] ="10px";	}

	$items =array ("0", "10px" , "15px" , "20px" , "25px", "30px");
	echo "<select id='mop_colpad' name='ma_options[mop_colpad]'>";
foreach($items as $item) {
	$selected = ($options['mop_colpad']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";

echo "<div><small>".__("Select the padding between the content and the sidebar.","mantra")."</small></div>";

}

////////////////////////////////
//// TEXT SETTINGS /////////////
////////////////////////////////

//SELECT - Name: ma_options[fontsize]
function  setting_fontsize_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_fontsize'])) { $options['mop_fontsize'] ="15px";	}
	$items =array ("12px", "13px" , "14px" , "15px" , "16px", "17px", "18px");
	echo "<select id='mop_fontsize' name='ma_options[mop_fontsize]'>";
foreach($items as $item) {

	$selected = ($options['mop_fontsize']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";

	echo "<div><small>".__("Select the font size you'll use in your blog. Pages, posts and comments will be affected. Buttons, Headers and Side menus will remain the same.","mantra")."</small></div>";

}


//SELECT - Name: ma_options[fontfamily]
function  setting_fontfamily_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_fontfamily'])) { $options['mop_fontfamily'] ="\"Segoe UI\", Arial, sans-serif";	}
	$itemsans = array("\"Segoe UI\", Arial, sans-serif",
					 "Verdana, Geneva, sans-serif " ,
					 "Calibri, Arian, sans-serif",
				     "\"Myriad Pro\",Myriad,Arial, sans-serif",
					 "\"Trebuchet MS\", Arial, Helvetica, sans-serif" ,
					 "Tahoma, Geneva, sans-serif" ,
					 "Arial, Helvetica, sans-serif" ,
					 "\"Arial Black\", Gadget, sans-serif",
					 "\"Lucida Sans Unicode\", \"Lucida Grande\", sans-serif ");

	$itemserif = array("Georgia, \"Times New Roman\", Times, serif" ,
					  "\"Times New Roman\", Times, serif",
					  "\"Palatino Linotype\", \"Book Antiqua\", Palatino, serif",
					  "Garamond, \"Times New Roman\", Times, serif");

	$itemsmono = array( "\"Courier New\", Courier, monospace" ,
					 "\"Lucida Console\", Monaco, monospace",
					 "Monaco, monospace");

	$itemscursive = array( "\"Lucida Casual\", \"Comic Sans MS\" , cursive ",
				     "\"Brush Script MT\",Phyllis,\"Lucida Handwriting\",cursive",
					 "Phyllis,\"Lucida Handwriting\",cursive",
					 "\"Lucida Handwriting\",cursive",
					  "\"Comic Sans MS\", cursive");

	echo "<select id='mop_fontfamily' name='ma_options[mop_fontfamily]'>";
	echo "<optgroup label='Sans-Serif'>";
foreach($itemsans as $item) {

	$selected = ( $options['mop_fontfamily']==$item) ? 'selected="selected"' : '';
	echo "<option style='font-family:$item;' value='$item' $selected>$item</option>";
}
	echo "</optgroup>";

	echo "<optgroup label='Serif'>";
foreach($itemserif as $item) {

	$selected = ( $options['mop_fontfamily']==$item) ? 'selected="selected"' : '';
	echo "<option style='font-family:$item;' value='$item' $selected>$item</option>";
}
	echo "</optgroup>";


	echo "<optgroup label='MonoSpace'>";
foreach($itemsmono as $item) {

	$selected = ( $options['mop_fontfamily']==$item) ? 'selected="selected"' : '';
	echo "<option style='font-family:$item;' value='$item' $selected>$item</option>";
}
	echo "</optgroup>";

	echo "<optgroup label='Cursive'>";
foreach($itemscursive as $item) {

	$selected = ( $options['mop_fontfamily']==$item) ? 'selected="selected"' : '';
	echo "<option style='font-family:$item;' value='$item' $selected>$item</option>";
}
	echo "</optgroup>";

	echo "</select>";

	echo "<div><small>".__("Select the font family you'll use in your blog. All text will be affected (including header text, menu buttons, side menu text etc.).","mantra")."</small></div>";

}

//SELECT - Name: ma_options[headfontsize]
function  setting_headfontsize_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_headfontsize'])) { $options['mop_headfontsize'] ="Default";	}
	$items = array ("Default" , "14px" , "16px" , "18px" , "20px", "22px" , "24px" , "26px" , "28px" , "30px" , "32px" , "34px" , "36px", "38px" , "40px");
	$itemsare = array( __("Default","mantra") , "16px" , "18px" , "20px", "22px" , "24px" , "26px" , "28px" , "30px" , "32px" , "34px" , "36px", "38px" , "40px");
	echo "<select id='mop_headfontsize' name='ma_options[mop_headfontsize]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_headfontsize']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";

	echo "<div><small>".__("Post Header Font size. Leave 'Default' for normal settings (size value will be as set in the CSS).","mantra")."</small></div>";

}

//SELECT - Name: ma_options[sidefontsize]
function  setting_sidefontsize_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_sidefontsize'])) { $options['mop_sidefontsize'] ="Default";	}
	$items = array ("Default" , "8px" , "9px" , "10px" , "11px", "12px" , "13px" , "14px" , "15px" , "16px" , "17px" , "18px");
	$itemsare = array( __("Default","mantra") , "8px" , "9px" , "10px" , "11px", "12px" , "13px" , "14px" , "15px" , "16px" , "17px" , "18px");
	echo "<select id='mop_sidefontsize' name='ma_options[mop_sidefontsize]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_sidefontsize']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";

	echo "<div><small>".__("Sidebar Font size. Leave 'Default' for normal settings (size value will be as set in the CSS).","mantra")."</small></div>";

}

//SELECT - Name: ma_options[textalign]
function  setting_textalign_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_textalign'])) { $options['mop_textalign'] ="Default";	}
	$items = array ("Default" , "Left" , "Right" , "Justify" , "Center");
	$itemsare = array( __("Default","mantra"), __("Left","mantra"), __("Right","mantra"), __("Justify","mantra"), __("Center","mantra"));
	echo "<select id='mop_textalign' name='ma_options[mop_textalign]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_textalign']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";

	echo "<div><small>".__("This overwrites the text alignment in posts and pages. Leave 'Default' for normal settings (alignment will remain as declared in posts, comments etc.).","mantra")."</small></div>";

}

//SELECT - Name: ma_options[parindent]
function  setting_parindent_fn() {
	$options = get_option('ma_options');

	if (!isset($options['mop_parindent'])) { $options['mop_parindent'] ="10px";	}
	$items = array ("0px" , "5px" , "10px" , "15px" , "20px");
	echo "<select id='mop_parindent' name='ma_options[mop_parindent]'>";
foreach($items as $item) {
	$selected = ($options['mop_parindent']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";

	echo "<div><small>".__("Choose the indent for your paragraphs.","mantra")."</small></div>";

}

//SELECT - Name: ma_options[lineheight]
function  setting_lineheight_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_lineheight'])) { $options['mop_lineheight'] ="Default";	}
	$items = array ("Default" ,"0.8em" , "0.9em", "1.0em" , "1.1em" , "1.2em" , "1.3em", "1.4em" , "1.5em" , "1.6em" , "1.7em" , "1.8em" , "1.9em" , "2.0em");
	$itemsare = array( __("Default","mantra"),"0.8em" , "0.9em", "1.0em" , "1.1em" , "1.2em" , "1.3em", "1.4em" , "1.5em" , "1.6em" , "1.7em" , "1.8em" , "1.9em" , "2.0em");
	echo "<select id='mop_lineheight' name='ma_options[mop_lineheight]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_lineheight']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";

	echo "<div><small>".__("Text line height. The height between 2 rows of text. Leave 'Default' for normal settings (size value will be as set in the CSS).","mantra")."</small></div>";

}

//SELECT - Name: ma_options[wordspace]
function  setting_wordspace_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_wordspace'])) { $options['mop_wordspace'] ="Default";	}
	$items = array ("Default" ,"-3px" , "-2px", "-1px" , "0px" , "1px" , "2px", "3px" , "4px" , "5px" , "10px");
	$itemsare = array( __("Default","mantra"),"-3px" , "-2px", "-1px" , "0px" , "1px" , "2px", "3px" , "4px" , "5px" , "10px");
	echo "<select id='mop_wordspace' name='ma_options[mop_wordspace]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_wordspace']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";

	echo "<div><small>".__("The space between <i>words</i>. Leave 'Default' for normal settings (size value will be as set in the CSS).","mantra")."</small></div>";

}

//SELECT - Name: ma_options[letterspace]
function  setting_letterspace_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_letterspace'])) { $options['mop_letterspace'] ="Default";	}
	$items = array ("Default" ,"-0.05em" , "-0.04em", "-0.03em" , "-0.02em" , "-0.01em" , "0.01em", "0.02em" , "0.03em" , "0.04em" , "0.05em");
	$itemsare = array( __("Default","mantra"),"-0.05em" , "-0.04em", "-0.03em" , "-0.02em" , "-0.01em" , "0.01em", "0.02em" , "0.03em" , "0.04em" , "0.05em");
	echo "<select id='mop_letterspace' name='ma_options[mop_letterspace]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_letterspace']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";

	echo "<div><small>".__("The space between <i>letters</i>. Leave 'Default' for normal settings (size value will be as set in the CSS).","mantra")."</small></div>";

}
////////////////////////////////
//// APPEREANCE SETTINGS ///////
////////////////////////////////

//TEXT - Name: ma_options[backcolor]
function  setting_backcolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_backcolor'])) { $options['mop_backcolor'] ="444444";	}

	echo '<form><input type="text" id="mop_backcolor" name="ma_options[mop_backcolor]" value="'.$options['mop_backcolor'].'"></form>';
    echo '<div id="mop_backcolor2"></div>';

	echo "<div><small>".__("Background color (Default value is 444444).","mantra")."</small></div>";

}

//TEXT - Name: ma_options[headercolor]
function  setting_headercolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_headercolor'])) { $options['mop_headercolor'] ="333333";	}

	echo '<input type="text" id="mop_headercolor" name="ma_options[mop_headercolor]" value="'.$options['mop_headercolor'].'">';
	 echo '<div id="mop_headercolor2"></div>';

	echo "<div><small>".__("Header background color (Default value is 333333). You can delete all insde text for no background color.","mantra")."</small></div>";

}

//TEXT - Name: ma_options[prefootercolor]
function  setting_prefootercolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_prefootercolor'])) { $options['mop_prefootercolor'] ="171717";	}

	echo '<input type="text" id="mop_prefootercolor" name="ma_options[mop_prefootercolor]" value="'.$options['mop_prefootercolor'].'">';
	echo '<div id="mop_prefootercolor2"></div>';

	echo "<div><small>".__("Footer widget-area background color. (Default value is 171717).","mantra")."</small></div>";

}

//TEXT - Name: ma_options[footercolor]
function  setting_footercolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_footercolor'])) { $options['mop_footercolor'] ="222222";	}

	echo '<input type="text" id="mop_footercolor" name="ma_options[mop_footercolor]" value="'.$options['mop_footercolor'].'">';
	echo '<div id="mop_footercolor2"></div>';

	echo "<div><small>".__("Footer background color (Default value is 222222).","mantra")."</small></div>";

}

//TEXT - Name: ma_options[titlecolor]
function  setting_titlecolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_titlecolor'])) { $options['mop_titlecolor'] ="0D85CC";	}

	echo '<input type="text" id="mop_titlecolor" name="ma_options[mop_titlecolor]" value="'.$options['mop_titlecolor'].'">';
	echo '<div id="mop_titlecolor2"></div>';

	echo "<div><small>".__("Your blog's title color (Default value is 0D85CC).","mantra")."</small></div>";

}

//TEXT - Name: ma_options[descriptioncolor]
function  setting_descriptioncolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_descriptioncolor'])) { $options['mop_descriptioncolor'] ="999999";	}

	echo '<input type="text" id="mop_descriptioncolor" name="ma_options[mop_descriptioncolor]" value="'.$options['mop_descriptioncolor'].'">';
	echo '<div id="mop_descriptioncolor2"></div>';

	echo "<div><small>".__("Your blog's description color(Default value is 222222).","mantra")."</small></div>";

}

//TEXT - Name: ma_options[contentcolor]
function  setting_contentcolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_contentcolor'])) { $options['mop_contentcolor'] ="333333";	}

	echo '<input type="text" id="mop_contentcolor" name="ma_options[mop_contentcolor]" value="'.$options['mop_contentcolor'].'">';
	echo '<div id="mop_contentcolor2"></div>';

	echo "<div><small>".__("Content Text Color (Default value is 333333).","mantra")."</small></div>";

}

//TEXT - Name: ma_options[linkscolor]
function  setting_linkscolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_linkscolor'])) { $options['mop_linkscolor'] ="0D85CC";	}

	echo '<input type="text" id="mop_linkscolor" name="ma_options[mop_linkscolor]" value="'.$options['mop_linkscolor'].'">';
	echo '<div id="mop_linkscolor2"></div>';

	echo "<div><small>".__("Links color (Default value is 0D85CC).","mantra")."</small></div>";

}

//TEXT - Name: ma_options[hovercolor]
function  setting_hovercolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_hovercolor'])) { $options['mop_hovercolor'] ="333333";	}

	echo '<input type="text" id="mop_hovercolor" name="ma_options[mop_hovercolor]" value="'.$options['mop_hovercolor'].'">';
	echo '<div id="mop_hovercolor2"></div>';

	echo "<div><small>".__("Links color on mouse over (Default value is 333333).","mantra")."</small></div>";

}

//TEXT - Name: ma_options[headtextcolor]
function  setting_headtextcolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_headtextcolor'])) { $options['mop_headtextcolor'] ="333333";	}

	echo '<input type="text" id="mop_headtextcolor" name="ma_options[mop_headtextcolor]" value="'.$options['mop_headtextcolor'].'">';
	echo '<div id="mop_headtextcolor2"></div>';

	echo "<div><small>".__("Post Header Text Color (Default value is 333333).","mantra")."</small></div>";

}

//TEXT - Name: ma_options[headtexthover]
function  setting_headtexthover_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_headtexthover'])) { $options['mop_headtexthover'] ="000000";	}

	echo '<input type="text" id="mop_headtexthover" name="ma_options[mop_headtexthover]" value="'.$options['mop_headtexthover'].'">';
	echo '<div id="mop_headtexthover2"></div>';

	echo "<div><small>".__("Post Header Text Color on Mouse over (Default value is 000000).","mantra")."</small></div>";

}

//TEXT - Name: ma_options[sideheadbackcolor]
function  setting_sideheadbackcolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_sideheadbackcolor'])) { $options['mop_sideheadbackcolor'] ="444444";	}

	echo '<input type="text" id="mop_sideheadbackcolor" name="ma_options[mop_sideheadbackcolor]" value="'.$options['mop_sideheadbackcolor'].'">';
	echo '<div id="mop_sideheadbackcolor2"></div>';

	echo "<div><small>".__("Sidebar Header Background color (Default value is 444444).","mantra")."</small></div>";

}

//TEXT - Name: ma_options[sideheadtextcolor]
function  setting_sideheadtextcolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_sideheadtextcolor'])) { $options['mop_sideheadtextcolor'] ="2EA5FD";	}

	echo '<input type="text" id="mop_sideheadtextcolor" name="ma_options[mop_sideheadtextcolor]" value="'.$options['mop_sideheadtextcolor'].'">';
	echo '<div id="mop_sideheadtextcolor2"></div>';

	echo "<div><small>".__("Sidebar Header Text Color(Default value is 2EA5FD).","mantra")."</small></div>";

}

//TEXT - Name: ma_options[footerheader]
function  setting_footerheader_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_footerheader'])) { $options['mop_footerheader'] ="0D85CC";	}

	echo '<input type="text" id="mop_footerheader" name="ma_options[mop_footerheader]" value="'.$options['mop_footerheader'].'">';
	echo '<div id="mop_footerheader2"></div>';

	echo "<div><small>".__("Footer Widget Text Color (Default value is 0D85CC).","mantra")."</small></div>";

}

//TEXT - Name: ma_options[footertext]
function  setting_footertext_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_footertext'])) { $options['mop_footertext'] ="666666";	}

	echo '<input type="text" id="mop_footertext" name="ma_options[mop_footertext]" value="'.$options['mop_footertext'].'">';
	echo '<div id="mop_footertext2"></div>';

	echo "<div><small>".__("Footer Widget Link Color (Default value is 666666).","mantra")."</small></div>";

}

//TEXT - Name: ma_options[footerhover]
function  setting_footerhover_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_footerhover'])) { $options['mop_footerhover'] ="888888";	}

	echo '<input type="text" id="mop_footerhover" name="ma_options[mop_footerhover]" value="'.$options['mop_footerhover'].'">';
	echo '<div id="mop_footerhover2"></div>';

	echo "<div><small>".__("Footer Widget Link Color on Mouse Over (Default value is 888888).","mantra")."</small></div>";

}



////////////////////////////////
//// GRAPHICS SETTINGS /////////
////////////////////////////////


//SELECT - Name: ma_options[caption]
function  setting_caption_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_caption'])) { $options['mop_caption'] ="Light";	}
	$items = array ("White" , "Light" , "Light Gray" , "Gray" , "Dark Gray" , "Black");
	$itemsare = array( __("White","mantra"), __("Light","mantra"), __("Light Gray","mantra"), __("Gray","mantra"), __("Dark Gray","mantra"), __("Black","mantra"));
	echo "<select id='mop_caption' name='ma_options[mop_caption]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_caption']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";

	echo "<div><small>".__("This setting changes the look of your captions. Images that are not inserted through captions will not be affected.","mantra")."</small></div>";

}


// RADIO-BUTTON - Name: ma_options[pin]
function setting_pin_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_pin'])) { $options['mop_pin'] ="Pin2";	}
	$items = array("mantra_dot", "Pin1", "Pin2", "Pin3" , "Pin4", "Pin5");


	foreach($items as $item) {
		$none='';
		if ($item == 'mantra_dot') { $none='None'; }
		$checked = ($options['mop_pin']==$item) ? ' checked="checked" ' : '';
		echo "<label><input ".$checked." value='$item' name='ma_options[mop_pin]' type='radio' />$none<img style='display:inline-block;height:auto;padding-top:0px;margin-left:5px;margin-right:20px;' src='".get_template_directory_uri()."/images/pins/".$item.".png'/></label>";




	}
		echo "<div><small>".__("The image on top of your captions. ","mantra")."</small></div>";
}


// RADIO-BUTTON - Name: ma_options[sidebullet]
function setting_sidebullet_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_sidebullet'])) { $options['mop_sidebullet'] ="arrow_white";	}
	$items = array("mantra_dot", "arrow_black", "arrow_white", "bullet_dark" , "bullet_gray", "bullet_light", "square_dark", "square_white", "triangle_dark" , "triangle_gray", "triangle_white", "folder_black", "folder_light");


	foreach($items as $item) {
		$none='';
		if ($item == 'mantra_dot') { $none='None'; }
		$checked = ($options['mop_sidebullet']==$item) ? ' checked="checked" ' : '';
		echo "<label><input ".$checked." value='$item' name='ma_options[mop_sidebullet]' type='radio' />$none<img style='display:inline-block;height:auto;padding-top:0px;margin-left:5px;margin-right:20px;' src='".get_template_directory_uri()."/images/bullets/".$item.".png'/></label>";




	}
	echo "<div><small>".__("The sidebar list bullets. ","mantra")."</small></div>";
}




//CHECKBOX - Name: ma_options[contentlist]
function setting_contentlist_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_contentlist'])) { $options['mop_contentlist'] ="Show";	}
	$items = array ("Show" , "Hide");
	$itemsare = array( __("Show","mantra"), __("Hide","mantra"));
	echo "<select id='mop_contentlist' name='ma_options[mop_contentlist]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_contentlist']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";
	echo "<div><small>".__("Hide or show  bullets next to lists that are in your content area (posts, pages etc.).","mantra")."</small></div>";

}



//CHECKBOX - Name: ma_options[title]
function setting_title_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_title'])) { $options['mop_title'] ="Show";	}
	$items = array ("Show" , "Hide");
	$itemsare = array( __("Show","mantra"), __("Hide","mantra"));
	echo "<select id='mop_title' name='ma_options[mop_title]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_title']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";
	echo "<div><small>".__("Hide or show your blog's Title and Description in the header (recommended if you have a custom header image with text).","mantra")."</small></div>";

}
//CHECKBOX - Name: ma_options[pagetitle]
function setting_pagetitle_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_pagetitle'])) { $options['mop_pagetitle'] ="Show";	}
	$items = array ("Show" , "Hide");
	$itemsare = array( __("Show","mantra"), __("Hide","mantra"));
	echo "<select id='mop_pagetitle' name='ma_options[mop_pagetitle]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_pagetitle']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";
	echo "<div><small>".__("Hide or show Page titles on any <i>created</i> pages. ","mantra")."</small></div>";
}

//CHECKBOX - Name: ma_options[categtitle]
function setting_categtitle_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_categtitle'])) { $options['mop_categtitle'] ="Show";	}
	$items = array ("Show" , "Hide");
	$itemsare = array( __("Show","mantra"), __("Hide","mantra"));
	echo "<select id='mop_categtitle' name='ma_options[mop_categtitle]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_categtitle']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";
	echo "<div><small>".__("Hide or show Page titles on <i>Category</i> Pages. ","mantra")."</small></div>";
}

//CHECKBOX - Name: ma_options[tables]
function setting_tables_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_tables'])) { $options['mop_tables'] ="Enable";	}
	$items = array ("Enable" , "Disable");
	$itemsare = array( __("Enable","mantra"), __("Disable","mantra"));
	echo "<select id='mop_tables' name='ma_options[mop_tables]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_tables']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";
	echo "<div><small>".__("Hide table borders and background color.","mantra")."</small></div>";
}

//CHECKBOX - Name: ma_options[comtext]
function setting_comtext_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_comtext'])) { $options['mop_comtext'] ="Show";	}
	$items = array ("Show" , "Hide");
	$itemsare = array( __("Show","mantra"), __("Hide","mantra"));
	echo "<select id='mop_comtext' name='ma_options[mop_comtext]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_comtext']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";
	echo "<div><small>".__("Hide the explanatory text under the comments form. (starts with  <i>You may use these HTML tags and attributes:...</i>).","mantra")."</small></div>";
}


//CHECKBOX - Name: ma_options[backtop]
function setting_backtop_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_backtop'])) { $options['mop_backtop'] ="Enable";	}
	$items = array ("Enable" , "Disable");
	$itemsare = array( __("Enable","mantra"), __("Disable","mantra"));
	echo "<select id='mop_backtop' name='ma_options[mop_backtop]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_backtop']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";
	echo "<div><small>".__("Enable the Back to Top button. The button appears after scrolling the page down.","mantra")."</small></div>";
}



// TEXTBOX - Name: ma_options[copyright]
function setting_copyright_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_copyright'])) { $options['mop_copyright'] ="";	}
	echo "<input id='mop_copyright' name='ma_options[mop_copyright]' size='40' type='text' value='{$options['mop_copyright']}' />";
	echo "<div><small>".__("Insert custom text that will appear on the left side of the footer. Leave blank if that's not necessary.<br /> You can use HTML tags and any special characters like &copy .","mantra")."</small></div>";
}



////////////////////////////////
//// POST SETTINGS /////////////
////////////////////////////////



//CHECKBOX - Name: ma_options[postdate]
function setting_postdate_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_postdate'])) { $options['mop_postdate'] ="Show";	}
	$items = array ("Show" , "Hide");
	$itemsare = array( __("Show","mantra"), __("Hide","mantra"));
	echo "<select id='mop_postdate' name='ma_options[mop_postdate]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_postdate']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";
	echo "<div><small>".__("Hide or show the post date.","mantra")."</small></div>";
}

//CHECKBOX - Name: ma_options[posttime]
function setting_posttime_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_posttime'])) { $options['mop_posttime'] ="Hide";	}
	$items = array ("Show" , "Hide");
	$itemsare = array( __("Show","mantra"), __("Hide","mantra"));
	echo "<select id='mop_posttime' name='ma_options[mop_posttime]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_posttime']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";
	echo "<div><small>".__("Show the post time with the date. Time will not be visible if the Post Date is hidden.","mantra")."</small></div>";
}

//CHECKBOX - Name: ma_options[postauthor]
function setting_postauthor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_postauthor'])) { $options['mop_postauthor'] ="Show";	}
	$items = array ("Show" , "Hide");
	$itemsare = array( __("Show","mantra"), __("Hide","mantra"));
	echo "<select id='mop_postauthor' name='ma_options[mop_postauthor]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_postauthor']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";
	echo "<div><small>".__("Hide or show the post author.","mantra")."</small></div>";
}

//CHECKBOX - Name: ma_options[postcateg]
function setting_postcateg_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_postcateg'])) { $options['mop_postcateg'] ="Show";	}
	$items = array ("Show" , "Hide");
	$itemsare = array( __("Show","mantra"), __("Hide","mantra"));
	echo "<select id='mop_postcateg' name='ma_options[mop_postcateg]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_postcateg']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";
	echo "<div><small>".__("Hide the post category (and tags if available).","mantra")."</small></div>";
}

//CHECKBOX - Name: ma_options[postbook]
function setting_postbook_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_postbook'])) { $options['mop_postbook'] ="Show";	}
	$items = array ("Show" , "Hide");
	$itemsare = array( __("Show","mantra"), __("Hide","mantra"));
	echo "<select id='mop_postbook' name='ma_options[mop_postbook]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_postbook']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";
	echo "<div><small>".__("Hide the 'Bookmark permalink'.","mantra")."</small></div>";
}


////////////////////////////////
//// EXCERPT SETTINGS /////////////
////////////////////////////////



//CHECKBOX - Name: ma_options[excerpthome]
function setting_excerpthome_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_excerpthome'])) { $options['mop_excerpthome'] ="Full Post";	}
	$items = array ("Excerpt" , "Full Post");
	$itemsare = array( __("Excerpt","mantra"), __("Full Post","mantra"));
	echo "<select id='mop_excerpthome' name='ma_options[mop_excerpthome]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_excerpthome']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";
	echo "<div><small>".__("Excerpts on the main page.","mantra")."</small></div>";
}

//CHECKBOX - Name: ma_options[excerptasides]
function setting_excerptasides_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_excerptasides'])) { $options['mop_excerptasides'] ="Yes";	}
	$items = array ("Yes" , "No");
	$itemsare = array( __("Yes","mantra"), __("No","mantra"));
	echo "<select id='mop_excerptasides' name='ma_options[mop_excerptasides]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_excerptasides']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";

}
	echo "</select>";
	echo "<div><small>".__("Also affect posts in the Asides Category (if you don't know what Asides are then leave it to Yes). More info on asides <a href='http://codex.wordpress.org/Adding_Asides'>here</a> ","mantra")."</small></div>";
}

//CHECKBOX - Name: ma_options[excerptarchive]
function setting_excerptarchive_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_excerptarchive'])) { $options['mop_excerptarchive'] ="Full Post";	}
	$items = array ("Excerpt" , "Full Post");
	$itemsare = array( __("Excerpt","mantra"), __("Full Post","mantra"));
	echo "<select id='mop_excerptarchive' name='ma_options[mop_excerptarchive]'>";
foreach($items as $id=>$item) {
	$selected = ($options['mop_excerptarchive']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$itemsare[$id]</option>";
}
	echo "</select>";
	echo "<div><small>".__("Excerpts on archive, categroy and search pages.","mantra")."</small></div>";
}

//CHECKBOX - Name: ma_options[excerptwords]
function setting_excerptwords_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_excerptwords'])) { $options['mop_excerptwords'] ="50";	}
	$items = array ("200" , "150", "120", "100", "75", "60", "50", "40", "30", "20", "10", "0");
	echo "<select id='mop_excerptwords' name='ma_options[mop_excerptwords]'>";
foreach($items as $item) {
	$selected = ($options['mop_excerptwords']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";
	echo "<div><small>".__("Number of words for an excerpt.","mantra")."</small></div>";
}

// TEXTBOX - Name: ma_options[excerptdots]
function setting_excerptdots_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_excerptdots'])) { $options['mop_excerptdots'] =" &hellip;";	}
	echo "<input id='mop_excerptdots' name='ma_options[mop_excerptdots]' size='40' type='text' value='{$options['mop_excerptdots']}' />";
	echo "<div><small>".__("Replaces the three dots ('[...])' that are appended automatically to excerpts.","mantra")."</small></div>";
}

// TEXTBOX - Name: ma_options[excerptcont]
function setting_excerptcont_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_excerptcont'])) { $options['mop_excerptcont'] =" Continue reading";	}
	echo "<input id='mop_excerptcont' name='ma_options[mop_excerptcont]' size='40' type='text' value='{$options['mop_excerptcont']}' />";
	echo "<div><small>".__("Edit the 'Continue Reading' link added to your post excerpts.","mantra")."</small></div>";
}





////////////////////////
/// SOCIAL SETTINGS ////
////////////////////////

// TEXTBOX - Name: ma_options[facebook]
function setting_facebook_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_facebook'])) { $options['mop_facebook'] ="";	}
	echo "<input id='mop_facebook' name='ma_options[mop_facebook]' size='40' type='text' value='{$options['mop_facebook']}' />";
	echo "<div><small>".__("Insert your Facebook address. ","mantra")."</small></div>";

}

// TEXTBOX - Name: ma_options[tweeter]
function setting_tweeter_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_tweeter'])) { $options['mop_tweeter'] ="";	}
	echo "<input id='mop_tweeter' name='ma_options[mop_tweeter]' size='40' type='text' value='{$options['mop_tweeter']}' />";
	echo "<div><small>".__("Insert your Twitter address.","mantra")."</small></div> ";
}

// TEXTBOX - Name: ma_options[rss]
function setting_rss_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_rss'])) { $options['mop_rss'] ="";	}
	echo "<input id='mop_rss' name='ma_options[mop_rss]' size='40' type='text' value='{$options['mop_rss']}' />";
	echo "<div><small>".__("Insert your RSS Feed Link. ","mantra")."</small></div>";
}


// FOR FURTHER
// Dmop-DOWN-BOX - Name: ma_options[dmopdown1]
function  setting_dmopdown_fn() {
	$options = get_option('ma_options');
	$items = array("Red", "Green", "Blue", "Orange", "White", "Violet", "Yellow");
	echo "<select id='dmop_down1' name='ma_options[dmopdown1]'>";
	foreach($items as $item) {
		$selected = ($options['dmopdown1']==$item) ? 'selected="selected"' : '';
		echo "<option value='$item' $selected>$item</option>";
	}
	echo "</select>";
}

// TEXTAREA - Name: ma_options[text_area]
function setting_textarea_fn() {
	$options = get_option('ma_options');
	echo "<textarea id='ma_textarea_string' name='ma_options[text_area]' rows='7' cols='50' type='textarea'>{$options['text_area']}</textarea>";
}

// TEXTBOX - Name: ma_options[text_string]
function setting_string_fn() {
	$options = get_option('ma_options');
	echo "<input id='ma_text_string' name='ma_options[text_string]' size='40' type='text' value='{$options['text_string']}' />";
}

// PASSWORD-TEXTBOX - Name: ma_options[pass_string]
function setting_pass_fn() {
	$options = get_option('ma_options');
	echo "<input id='ma_text_pass' name='ma_options[pass_string]' size='40' type='password' value='{$options['pass_string']}' />";
}

// CHECKBOX - Name: ma_options[chkbox1]
function setting_chk1_fn() {
	$options = get_option('ma_options'); $checked ="";
	if(isset($options['chkbox1'])&& $options['chkbox1']) { $checked = ' checked="checked" '; }
	echo "<input ".$checked." id='ma_chk1' name='ma_options[chkbox1]' type='checkbox' />";
}

// CHECKBOX - Name: ma_options[chkbox2]
function setting_chk2_fn() {
	$options = get_option('ma_options');$checked ="";
	if(isset($options['chkbox2'])&&$options['chkbox2']) { $checked = ' checked="checked" '; }
	echo "<input ".$checked." id='ma_chk2' name='ma_options[chkbox2]' type='checkbox' />";
}

// RADIO-BUTTON - Name: ma_options[option_set1]
function setting_radio_fn() {
	$options = get_option('ma_options');
	$items = array("Square", "Triangle", "Circle");
	foreach($items as $item) {
		$checked = ($options['option_set1']==$item) ? ' checked="checked" ' : '';
		echo "<label><input ".$checked." value='$item' name='ma_options[option_set1]' type='radio' /> $item</label><br />";
	}
}


// Display the admin options page
function mantra_page_fn() {

 if (!current_user_can('edit_theme_options'))  {
    wp_die( __('Sorry, but you do not have sufficient permissions to access this page.') );
  }?>



	<div class="wrap">
		<div class="icon32" id="icon-options-general"><br></div>
		<h2><?php _e("Mantra Settings","mantra"); ?></h2>
	<span style="display:inline;float:left;line-height:3.5em;font-size:12px;"><?php	_e("Customize the Mantra Theme to suit your needs. Visit the theme's <a href='http://www.riotreactions.com/mantra'>home page</a> for more info, feedback and comments or","mantra"); ?></span>
	<div style="display:inline;float:left;margin-top:7px;">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHTwYJKoZIhvcNAQcEoIIHQDCCBzwCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYAIXkvr4jM3ukRMXFkPzz473jVNAqkfDyeblhufcE5lOa331HhOdcp2Y6p7xP7lmVTPPLhPpbvtlKGoez5hQGf/tPzifAt+LCf7PVZWoUD/lXjjdQyeuvY1kl9i/UD1glbQwJ5WrhdfKDCTrmI4I144I07L4vD99jkOhl3VaIvdhTELMAkGBSsOAwIaBQAwgcwGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQIsItcpGsJV/OAgajYF4IH5kELAXgjdFaZ7asyOvmf0ZZ9pg77+xBm1HdIRW+9vtFDCEClcztbZU2Wehhan/3/46uaccYt/NsSxMCUpYCMw5GMFdNVIeLGx6swGwJczbYsvbFrlz7tTUmzO91Q9a5u6PoJUyVdm14af2sxL4fwGPRBVoDjUKMtl41MCvYj8kl44+2ay0xYQfO+DR3ab3XrLEJE/w6tRZTthgCMQrDvEar6i/agggOHMIIDgzCCAuygAwIBAgIBADANBgkqhkiG9w0BAQUFADCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wHhcNMDQwMjEzMTAxMzE1WhcNMzUwMjEzMTAxMzE1WjCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBAMFHTt38RMxLXJyO2SmS+Ndl72T7oKJ4u4uw+6awntALWh03PewmIJuzbALScsTS4sZoS1fKciBGoh11gIfHzylvkdNe/hJl66/RGqrj5rFb08sAABNTzDTiqqNpJeBsYs/c2aiGozptX2RlnBktH+SUNpAajW724Nv2Wvhif6sFAgMBAAGjge4wgeswHQYDVR0OBBYEFJaffLvGbxe9WT9S1wob7BDWZJRrMIG7BgNVHSMEgbMwgbCAFJaffLvGbxe9WT9S1wob7BDWZJRroYGUpIGRMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbYIBADAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBBQUAA4GBAIFfOlaagFrl71+jq6OKidbWFSE+Q4FqROvdgIONth+8kSK//Y/4ihuE4Ymvzn5ceE3S/iBSQQMjyvb+s2TWbQYDwcp129OPIbD9epdr4tJOUNiSojw7BHwYRiPh58S1xGlFgHFXwrEBb3dgNbMUa+u4qectsMAXpVHnD9wIyfmHMYIBmjCCAZYCAQEwgZQwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tAgEAMAkGBSsOAwIaBQCgXTAYBgkqhkiG9w0BCQMxCwYJKoZIhvcNAQcBMBwGCSqGSIb3DQEJBTEPFw0xMTA4MTUxOTEwNDdaMCMGCSqGSIb3DQEJBDEWBBRoAwqB5OfD9/nrnqBUSMVEnZOzITANBgkqhkiG9w0BAQEFAASBgHhFc1KPcsmuAmNnBvlBYgKs4xhqwHfSdqE3CDR1Wcw+vnAK1tVhVaZr302LOspeqVxWVd17lMXaLlRRpUReqNVmrxspufg8W0fC/XHoyW15zVLKR6TnCE/ugyOaF7mbhUCphelOkc7MOc/qrcJVbZ8MHXqO+WXQvwtNP6byDQod-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>


	</div>



		<form action="options.php" method="post">
<div id="accordion">
		<?php settings_fields('ma_options'); ?>

		<?php do_settings_sections(__FILE__); ?>
</div>


		<p class="submit">
			<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
		</p>
		</form>
<span> Mantra v. 1.5.0 - by <a href="http://www.cryoutcreations.eu">Cryout Creations</a></span>
	</div>



<script type="text/javascript">
  jQuery(document).ready(function() {

function startfarb(a,b) {
jQuery(b).css('display','none');
	
   jQuery(b).farbtastic(a);
	jQuery(a).click(function() {
  if(jQuery(b).css('display') == 'none')	jQuery(b).show(300);
});

	jQuery(document).mousedown( function() {
			jQuery(b).hide(700);
		});
}

startfarb("#mop_backcolor","#mop_backcolor2");
startfarb("#mop_headercolor","#mop_headercolor2");
startfarb("#mop_prefootercolor","#mop_prefootercolor2");
startfarb("#mop_footercolor","#mop_footercolor2");
startfarb("#mop_titlecolor","#mop_titlecolor2");
startfarb("#mop_descriptioncolor","#mop_descriptioncolor2");
startfarb("#mop_contentcolor","#mop_contentcolor2");
startfarb("#mop_linkscolor","#mop_linkscolor2");
startfarb("#mop_hovercolor","#mop_hovercolor2");
startfarb("#mop_headtextcolor","#mop_headtextcolor2");
startfarb("#mop_headtexthover","#mop_headtexthover2");
startfarb("#mop_sideheadbackcolor","#mop_sideheadbackcolor2");
startfarb("#mop_sideheadtextcolor","#mop_sideheadtextcolor2");
startfarb("#mop_footerheader","#mop_footerheader2");
startfarb("#mop_footertext","#mop_footertext2");
startfarb("#mop_footerhover","#mop_footerhover2");

  });

	jQuery('.form-table').wrap('<div>');
	jQuery(function() {
		jQuery( "#accordion" ).accordion({
				 header: 'h3',
			autoHeight: false,
			navigation: true });
	});

	</script>



<?php
}


// Validate user data
function ma_options_validate($input) {
	// Sanitize the texbox input
	$input['mop_copyright'] =  wp_kses_data($input['mop_copyright']);
	$input['mop_facebook'] =  wp_kses_data($input['mop_facebook']);
	$input['mop_tweeter'] =  wp_kses_data($input['mop_tweeter']);
	$input['mop_rss'] =  wp_kses_data($input['mop_rss']);

	$input['mop_backcolor'] =  wp_kses_data($input['mop_backcolor']);
	$input['mop_headercolor'] =  wp_kses_data($input['mop_headercolor']);
	$input['mop_prefootercolor'] =  wp_kses_data($input['mop_prefootercolor']);
	$input['mop_footercolor'] =  wp_kses_data($input['mop_footercolor']);
	$input['mop_titlercolor'] =  wp_kses_data($input['mop_titlercolor']);
	$input['mop_descriptioncolor'] =  wp_kses_data($input['mop_descriptioncolor']);
	$input['mop_contentcolor'] =  wp_kses_data($input['mop_contentcolor']);
	$input['mop_linkscolor'] =  wp_kses_data($input['mop_linkscolor']);
	$input['mop_hovercolor'] =  wp_kses_data($input['mop_hovercolor']);
	$input['mop_headtextcolor'] =  wp_kses_data($input['mop_headtextcolor']);
	$input['mop_headtexthover'] =  wp_kses_data($input['mop_headtexthover']);
	$input['mop_sideheadbackcolor'] =  wp_kses_data($input['mop_sideheadbackcolor']);
	$input['mop_sideheadtextcolor'] =  wp_kses_data($input['mop_sideheadtextcolor']);
	$input['mop_footerheader'] =  wp_kses_data($input['mop_footerheader']);
	$input['mop_footertext'] =  wp_kses_data($input['mop_footertext']);
	$input['mop_footerhover'] =  wp_kses_data($input['mop_footerhover']);

	$input['mop_excerptdots'] =  wp_kses_data($input['mop_excerptdots']);
	$input['mop_excerptcont'] =  wp_kses_data($input['mop_excerptcont']);

	$input['mop_facebook'] =  wp_kses_data($input['mop_facebook']);
	$input['mop_tweeter'] =  wp_kses_data($input['mop_tweeter']);
	$input['mop_rss'] =  wp_kses_data($input['mop_rss']);


	return $input; // return validated input

}

