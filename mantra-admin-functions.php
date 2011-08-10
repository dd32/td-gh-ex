<?php

//  Hooks/Filters
add_action('admin_init', 'mantra_init_fn' );
add_action('admin_menu', 'mantra_add_page_fn');

add_action('init', 'mantra_init');
function mantra_init() {

	wp_enqueue_script("prototype");
	wp_enqueue_script("slider",get_bloginfo('url')."/wp-includes/js/scriptaculous/slider.js",array('scriptaculous'));
	wp_enqueue_script("color", get_template_directory_uri().'/js/yahoo.color.js');
	wp_enqueue_script("cpicker", get_template_directory_uri().'/js/colorPicker.js');




$mantra_defaults = array(

"mop_side" => "Right",
"mop_sidewidth" => "800",
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

"mop_backcolor" => "444444",
"mop_headercolor" => "333333",
"mop_prefootercolor" => "222222",
"mop_footercolor" => "171717",
"mop_contentcolor" => "333333",
"mop_linkscolor" => "0D85CC",
"mop_hovercolor" => "333333",
"mop_headtextcolor" => "333333",
"mop_headtexthover" => "000000",
"mop_sideheadbackcolor" => "444444",
"mop_sideheadtextcolor" => "2EA5FD",

"mop_footerheader" => "0C85CD",
"mop_footertext" => "666666",
"mop_footerhover" => "888888",

"mop_caption" => "Light",
"mop_pin" => "Pin2",
"mop_sidebullet" => "arrow_white",
"mop_title" => "Show",
"mop_pagetitle" => "Show",
"mop_categtitle" => "Show",
"mop_tables" => "Disable",
"mop_copyright" => "",

"mop_postdate" => "Show",
"mop_posttime" => "Hide",
"mop_postauthor" => "Show",
"mop_postcateg" => "Show",
"mop_postbook" => "Show",

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
	wp_register_style( 'mantra2',get_template_directory_uri() . '/js/colorPicker.css' );



	register_setting('ma_options', 'ma_options', 'ma_options_validate' );
	add_settings_section('layout_section', 'Layout Settings', 'section_layout_fn', __FILE__);
	add_settings_section('text_section', 'Text Settings', 'section_text_fn', __FILE__);
	add_settings_section('appereance_section', 'Color Settings', 'section_appereance_fn', __FILE__);
	add_settings_section('graphics_section', 'Graphics Settings', 'section_graphics_fn', __FILE__);
	add_settings_section('post_section', 'Post Information Settings', 'section_post_fn', __FILE__);
	add_settings_section('socials_section', 'Social Sites Settings', 'section_social_fn', __FILE__);

	add_settings_field('mop_side', 'Sidemenu Position', 'setting_side_fn', __FILE__, 'layout_section');
	add_settings_field('mop_sidewidth', 'Content / Sidemenu Width', 'setting_sidewidth_fn', __FILE__, 'layout_section');
	add_settings_field('mop_colpad', 'Padding between Columns', 'setting_colpad_fn', __FILE__, 'layout_section');

	add_settings_field('mop_fontfamily', 'Select Font Type', 'setting_fontfamily_fn', __FILE__, 'text_section');
	add_settings_field('mop_fontsize', 'Select General Font Size', 'setting_fontsize_fn', __FILE__, 'text_section');
	add_settings_field('mop_headfontsize', 'Select Post Header Font Size', 'setting_headfontsize_fn', __FILE__, 'text_section');
	add_settings_field('mop_sidefontsize', 'Select SideBar Font Size', 'setting_sidefontsize_fn', __FILE__, 'text_section');
	add_settings_field('mop_textalign', 'Force Text Align', 'setting_textalign_fn', __FILE__, 'text_section');
	add_settings_field('mop_parindent', 'Paragraph indent', 'setting_parindent_fn', __FILE__, 'text_section');
	add_settings_field('mop_lineheight', 'Line Height', 'setting_lineheight_fn', __FILE__, 'text_section');
	add_settings_field('mop_wordspace', 'Word spacing', 'setting_wordspace_fn', __FILE__, 'text_section');
	add_settings_field('mop_letterspace', 'Letter spacing', 'setting_letterspace_fn', __FILE__, 'text_section');


	add_settings_field('mop_backcolor', 'Background Color', 'setting_backcolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_headercolor', 'Header Color', 'setting_headercolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_prefootercolor', 'Pre-Footer Color', 'setting_prefootercolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_footercolor', 'Footer Color', 'setting_footercolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_contentcolor', 'Content Text Color', 'setting_contentcolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_linkscolor', 'Links Color', 'setting_linkscolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_hovercolor', 'Links Hover Color', 'setting_hovercolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_headtextcolor', 'Entry Title Color', 'setting_headtextcolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_headtexthover', 'Entry Title Hover Color', 'setting_headtexthover_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_sideheadbackcolor', 'Sidebar Header Background Color', 'setting_sideheadbackcolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_sideheadtextcolor', 'Sidebar Header Text Color', 'setting_sideheadtextcolor_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_footerheader', 'Footer Widget Header Text Color', 'setting_footerheader_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_footertext', 'Footer Widget Link Color', 'setting_footertext_fn', __FILE__, 'appereance_section');
	add_settings_field('mop_footerhover', 'Footer Widget Hover Color', 'setting_footerhover_fn', __FILE__, 'appereance_section');

	add_settings_field('mop_caption', 'Caption Border', 'setting_caption_fn', __FILE__, 'graphics_section');
	add_settings_field('mop_pin', 'Caption Pin', 'setting_pin_fn', __FILE__, 'graphics_section');
	add_settings_field('mop_sidebullet', 'Sidebar Menu Bullets', 'setting_sidebullet_fn', __FILE__, 'graphics_section');
	add_settings_field('mop_title', 'Title and Description', 'setting_title_fn', __FILE__, 'graphics_section');
	add_settings_field('mop_pagetitle', 'Page Titles', 'setting_pagetitle_fn', __FILE__, 'graphics_section');
	add_settings_field('mop_categetitle', 'Category Page Titles', 'setting_categtitle_fn', __FILE__, 'graphics_section');
	add_settings_field('mop_tables', 'Invisible Tables', 'setting_tables_fn', __FILE__, 'graphics_section');
	add_settings_field('mop_copyright', 'Insert footer copyright', 'setting_copyright_fn', __FILE__, 'graphics_section');

	add_settings_field('mop_postdate', 'Post Date', 'setting_postdate_fn', __FILE__, 'post_section');
	add_settings_field('mop_posttime', 'Post Time', 'setting_posttime_fn', __FILE__, 'post_section');
	add_settings_field('mop_postauthor', 'Post Author', 'setting_postauthor_fn', __FILE__, 'post_section');
	add_settings_field('mop_postcateg', 'Post Category', 'setting_postcateg_fn', __FILE__, 'post_section');
	add_settings_field('mop_postbook', 'Post Permalink', 'setting_postbook_fn', __FILE__, 'post_section');

	add_settings_field('mop_facebook', 'Facebook Link', 'setting_facebook_fn', __FILE__, 'socials_section');
	add_settings_field('mop_tweeter', 'Tweeter Link', 'setting_tweeter_fn', __FILE__, 'socials_section');
	add_settings_field('mop_rss', 'RSS Feed Link', 'setting_rss_fn', __FILE__, 'socials_section');

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

}



// ************************************************************************************************************

// Callback functions

// General suboptions description

function  section_layout_fn() {

	echo "<p>Settings for adjusting your blog's layout .</p>";
}
function  section_text_fn() {
	echo '<p>All text related customization options.</p>';
}

function  section_graphics_fn() {
	echo '<p>Settings for hiding or showing different graphics.</p>';
}

function  section_post_fn() {
	echo '<p>Settings for hiding or showing different post tags.</p>';
}

function  section_appereance_fn() {
	echo '<p>Set text and background colors.</p>';
}

function  section_social_fn() {
	echo "<p>Insert the addreses for your social media. Leave blank if not the case.
	Please type the whole address (including <i>http://</i> ) Example : <u>http://www.facebook.com</u>.</p>";
}

////////////////////////////////
//// LAYOUT SETTINGS ///////////
////////////////////////////////

 //SELECT - Name: ma_options[side]
function  setting_side_fn() {
$options = get_option('ma_options');
	if (!isset($options['mop_side'])) { $options['mop_side'] ="Right";	}

$items = array("Left", "Right", "Disable");
echo "<select id='mop_side' name='ma_options[mop_side]'>";
foreach($items as $item) {
	$selected = ($options['mop_side']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
echo "</select>";

echo "<div><small>Select the side on which to display the sidebar. You can also choose to disable it altogether and have only one column for a presentation-like design.
			Disabling the sidemenu also disables the Content/Sidemenu Width option.</small></div>";

}



 //SLIDER - Name: ma_options[sidewidth]
function setting_sidewidth_fn()
   {
   $options = get_option('ma_options');
	if (!isset($options['mop_sidewidth'])) { $options['mop_sidewidth'] =800;}

   ?>
   <div id="zoom_slider" class="slider">
   <div class="handle"></div>
   <div style="display:block;float:none;width:550px;">
   <p id="cont_value" style="width:<?php  echo ($options['mop_sidewidth']/2 - 2);  ?>px;" class="numbers"><?php  echo $options['mop_sidewidth'];  ?>px</p>
   <p id="side_value" style="width:<?php echo ((1096 - $options['mop_sidewidth'])/2); ?>px;" class="numbers"><?php echo (1050-$options['mop_sidewidth']);  ?>px</p>
   </div>
   </div>
   <?php echo  "<input   name='ma_options[mop_sidewidth]' id='mop_sidewidth' type='hidden' value='".$options['mop_sidewidth']."' />";?>

   <!-- JS libraries for the slider-->
	<script> if (document.getElementById('mop_side').value=='Disable') document.getElementById('slider_div').className="hideSlider"; </script>
<!-- slider script-->
<script type="text/javascript">
  (function() {
    var zoom_slider = $('zoom_slider'),
        cont = $('cont_value');
		side = $('side_value');
		sw = $('mop_sidewidth');

    new Control.Slider(zoom_slider.down('.handle'), zoom_slider, {
    range: $R(0, 1100),
    sliderValue: cont.innerHTML,
   	values :[550,560,570,580,590,600,610,620,630,640,650,660,670,680,690,700,710,720,730,740,750,760,770,780,790,800,810,820,830],

    onSlide: function(value) {
		cont.innerHTML = value + " px";cont.style.width = (value/2 -2)+"px";
		side.innerHTML= (1050 - value) + " px" ;side.style.width = (1096-value)/2+"px";
		sw.value = value;cont.style.width = (value/2 -2);
      },
      onChange: function(value) {
		cont.innerHTML = value + " px";cont.style.width = (value/2 -2)+"px";
		side.innerHTML= (1050 - value) + " px" ;side.style.width = (1096-value)/2+"px";
		sw.value = value;cont.style.width = (value/2 -2);
      }
    });
  })();

</script>


   <?php
   echo "<div><small>Select the width of your content and sidebar (Values range from 550px to 830px for the content, and from 220px to 500px for the sidebar).</small></div>";

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

echo "<div><small>Select the padding between the content and the sidebar.</small></div>";

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

	echo "<div><small>Select the font size you'll use in your blog. Pages, posts and comments will be affected. Buttons, Headers and Side menus will remain the same.</small></div>";

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

	echo "<div><small>Select the font family you'll use in your blog. All text will be affected (including header text, menu buttons, side menu text etc.).</small></div>";

}

//SELECT - Name: ma_options[headfontsize]
function  setting_headfontsize_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_headfontsize'])) { $options['mop_headfontsize'] ="Default";	}
	$items = array ("Default" , "14px" , "16px" , "18px" , "20px", "22px" , "24px" , "26px" , "28px" , "30px" , "32px" , "34px" , "36px", "38px" , "40px");
	echo "<select id='mop_headfontsize' name='ma_options[mop_headfontsize]'>";
foreach($items as $item) {
	$selected = ($options['mop_headfontsize']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";

	echo "<div><small>Post Header Font size. Leave 'Default' for normal settings (size value will be as set in the CSS).</small></div>";

}

//SELECT - Name: ma_options[sidefontsize]
function  setting_sidefontsize_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_sidefontsize'])) { $options['mop_sidefontsize'] ="Default";	}
	$items = array ("Default" , "8px" , "9px" , "10px" , "11px", "12px" , "13px" , "14px" , "15px" , "16px" , "17px" , "18px");
	echo "<select id='mop_sidefontsize' name='ma_options[mop_sidefontsize]'>";
foreach($items as $item) {
	$selected = ($options['mop_sidefontsize']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";

	echo "<div><small>Sidebar Font size. Leave 'Default' for normal settings (size value will be as set in the CSS).</small></div>";

}

//SELECT - Name: ma_options[textalign]
function  setting_textalign_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_textalign'])) { $options['mop_textalign'] ="Default";	}
	$items = array ("Default" , "Left" , "Right" , "Justify" , "Center");
	echo "<select id='mop_textalign' name='ma_options[mop_textalign]'>";
foreach($items as $item) {
	$selected = ($options['mop_textalign']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";

	echo "<div><small>This overwrites the text alignment in posts and pages. Leave 'Default' for normal settings (alignment will remain as declared in posts, comments etc.).</small></div>";

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

	echo "<div><small>Choose the indent for your paragraphs.</small></div>";

}

//SELECT - Name: ma_options[lineheight]
function  setting_lineheight_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_lineheight'])) { $options['mop_lineheight'] ="Default";	}
	$items = array ("Default" ,"0.8em" , "0.9em", "1.0em" , "1.1em" , "1.2em" , "1.3em", "1.4em" , "1.5em" , "1.6em" , "1.7em" , "1.8em" , "1.9em" , "2.0em");
	echo "<select id='mop_lineheight' name='ma_options[mop_lineheight]'>";
foreach($items as $item) {
	$selected = ($options['mop_lineheight']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";

	echo "<div><small>Text line height. The height between 2 rows of text. Leave 'Default' for normal settings (size value will be as set in the CSS).</small></div>";

}

//SELECT - Name: ma_options[wordspace]
function  setting_wordspace_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_wordspace'])) { $options['mop_wordspace'] ="Default";	}
	$items = array ("Default" ,"-3px" , "-2px", "-1px" , "0px" , "1px" , "2px", "3px" , "4px" , "5px" , "10px");
	echo "<select id='mop_wordspace' name='ma_options[mop_wordspace]'>";
foreach($items as $item) {
	$selected = ($options['mop_wordspace']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";

	echo "<div><small>The space between <i>words</i>. Leave 'Default' for normal settings (size value will be as set in the CSS).</small></div>";

}

//SELECT - Name: ma_options[letterspace]
function  setting_letterspace_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_letterspace'])) { $options['mop_letterspace'] ="Default";	}
	$items = array ("Default" ,"-0.05em" , "-0.04em", "-0.03em" , "-0.02em" , "-0.01em" , "0.01em", "0.02em" , "0.03em" , "0.04em" , "0.05em");
	echo "<select id='mop_letterspace' name='ma_options[mop_letterspace]'>";
foreach($items as $item) {
	$selected = ($options['mop_letterspace']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";

	echo "<div><small>The space between <i>letters</i>. Leave 'Default' for normal settings (size value will be as set in the CSS).</small></div>";

}
////////////////////////////////
//// APPEREANCE SETTINGS ///////
////////////////////////////////

//TEXT - Name: ma_options[backcolor]
function  setting_backcolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_backcolor'])) { $options['mop_backcolor'] ="444444";	}

	echo '<input type="text" id="mop_backcolor" name="ma_options[mop_backcolor]" value="'.$options['mop_backcolor'].'">';


	echo "<div><small>Background color (Default value is 444444).</small></div>";

}

//TEXT - Name: ma_options[headercolor]
function  setting_headercolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_headercolor'])) { $options['mop_headercolor'] ="333333";	}

	echo '<input type="text" id="mop_headercolor" name="ma_options[mop_headercolor]" value="'.$options['mop_headercolor'].'">';


	echo "<div><small>Header background color (Default value is 333333).</small></div>";

}

//TEXT - Name: ma_options[prefootercolor]
function  setting_prefootercolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_prefootercolor'])) { $options['mop_prefootercolor'] ="171717";	}

	echo '<input type="text" id="mop_prefootercolor" name="ma_options[mop_prefootercolor]" value="'.$options['mop_prefootercolor'].'">';


	echo "<div><small>Footer widget-area background color. (Default value is 171717).</small></div>";

}

//TEXT - Name: ma_options[footercolor]
function  setting_footercolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_footercolor'])) { $options['mop_footercolor'] ="222222";	}

	echo '<input type="text" id="mop_footercolor" name="ma_options[mop_footercolor]" value="'.$options['mop_footercolor'].'">';


	echo "<div><small>Footer background color (Default value is 222222).</small></div>";

}

//TEXT - Name: ma_options[contentcolor]
function  setting_contentcolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_contentcolor'])) { $options['mop_contentcolor'] ="333333";	}

	echo '<input type="text" id="mop_contentcolor" name="ma_options[mop_contentcolor]" value="'.$options['mop_contentcolor'].'">';


	echo "<div><small>Content Text Color (Default value is 333333).</small></div>";

}

//TEXT - Name: ma_options[linkscolor]
function  setting_linkscolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_linkscolor'])) { $options['mop_linkscolor'] ="0D85CC";	}

	echo '<input type="text" id="mop_linkscolor" name="ma_options[mop_linkscolor]" value="'.$options['mop_linkscolor'].'">';


	echo "<div><small>Links color (Default value is 0D85CC).</small></div>";

}

//TEXT - Name: ma_options[hovercolor]
function  setting_hovercolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_hovercolor'])) { $options['mop_hovercolor'] ="333333";	}

	echo '<input type="text" id="mop_hovercolor" name="ma_options[mop_hovercolor]" value="'.$options['mop_hovercolor'].'">';


	echo "<div><small>Links color on mouse over (Default value is 333333).</small></div>";

}

//TEXT - Name: ma_options[headtextcolor]
function  setting_headtextcolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_headtextcolor'])) { $options['mop_headtextcolor'] ="333333";	}

	echo '<input type="text" id="mop_headtextcolor" name="ma_options[mop_headtextcolor]" value="'.$options['mop_headtextcolor'].'">';


	echo "<div><small>Post Header Text Color (Default value is 333333).</small></div>";

}

//TEXT - Name: ma_options[headtexthover]
function  setting_headtexthover_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_headtexthover'])) { $options['mop_headtexthover'] ="000000";	}

	echo '<input type="text" id="mop_headtexthover" name="ma_options[mop_headtexthover]" value="'.$options['mop_headtexthover'].'">';


	echo "<div><small>Post Header Text Color on Mouse over (Default value is 000000).</small></div>";

}

//TEXT - Name: ma_options[sideheadbackcolor]
function  setting_sideheadbackcolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_sideheadbackcolor'])) { $options['mop_sideheadbackcolor'] ="444444";	}

	echo '<input type="text" id="mop_sideheadbackcolor" name="ma_options[mop_sideheadbackcolor]" value="'.$options['mop_sideheadbackcolor'].'">';


	echo "<div><small>Sidebar Header Background color (Default value is 444444).</small></div>";

}

//TEXT - Name: ma_options[sideheadtextcolor]
function  setting_sideheadtextcolor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_sideheadtextcolor'])) { $options['mop_sideheadtextcolor'] ="2EA5FD";	}

	echo '<input type="text" id="mop_sideheadtextcolor" name="ma_options[mop_sideheadtextcolor]" value="'.$options['mop_sideheadtextcolor'].'">';


	echo "<div><small>Sidebar Header Text Color(Default value is 2EA5FD).</small></div>";

}

//TEXT - Name: ma_options[footerheader]
function  setting_footerheader_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_footerheader'])) { $options['mop_footerheader'] ="0D85CC";	}

	echo '<input type="text" id="mop_footerheader" name="ma_options[mop_footerheader]" value="'.$options['mop_footerheader'].'">';


	echo "<div><small>Footer Widget Text Color (Default value is 0D85CC).</small></div>";

}

//TEXT - Name: ma_options[footertext]
function  setting_footertext_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_footertext'])) { $options['mop_footertext'] ="666666";	}

	echo '<input type="text" id="mop_footertext" name="ma_options[mop_footertext]" value="'.$options['mop_footertext'].'">';


	echo "<div><small>Footer Widget Link Color (Default value is 666666).</small></div>";

}

//TEXT - Name: ma_options[footerhover]
function  setting_footerhover_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_footerhover'])) { $options['mop_footerhover'] ="888888";	}

	echo '<input type="text" id="mop_footerhover" name="ma_options[mop_footerhover]" value="'.$options['mop_footerhover'].'">';


	echo "<div><small>Footer Widget Link Color on Mouse Over (Default value is 888888).</small></div>";

}



////////////////////////////////
//// GRAPHICS SETTINGS /////////
////////////////////////////////


//SELECT - Name: ma_options[caption]
function  setting_caption_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_caption'])) { $options['mop_caption'] ="Light";	}
	$items = array ("White" , "Light" , "Light Gray" , "Gray" , "Dark Gray" , "Black");
	echo "<select id='mop_caption' name='ma_options[mop_caption]'>";
foreach($items as $item) {
	$selected = ($options['mop_caption']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";

	echo "<div><small>This setting changes the look of your captions. Images that are not inserted through captions will not be affected.</small></div>";

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
		echo "<div><small>The image on top of your captions. </small></div>";
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
	echo "<div><small>The sidebar list bullets. </small></div>";
}

//CHECKBOX - Name: ma_options[title]
function setting_title_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_title'])) { $options['mop_title'] ="Show";	}
	$items = array ("Show" , "Hide");
	echo "<select id='mop_title' name='ma_options[mop_title]'>";
foreach($items as $item) {
	$selected = ($options['mop_title']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";
	echo "<div><small>Hide or show your blog's Title and Description in the header (recommended if you have a custom header image with text).</small></div>";

}
//CHECKBOX - Name: ma_options[pagetitle]
function setting_pagetitle_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_pagetitle'])) { $options['mop_pagetitle'] ="Show";	}
	$items = array ("Show" , "Hide");
	echo "<select id='mop_pagetitle' name='ma_options[mop_pagetitle]'>";
foreach($items as $item) {
	$selected = ($options['mop_pagetitle']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";
	echo "<div><small>Hide or show Page titles on any <i>created</i> pages. </small></div>";
}

//CHECKBOX - Name: ma_options[categtitle]
function setting_categtitle_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_categtitle'])) { $options['mop_categtitle'] ="Show";	}
	$items = array ("Show" , "Hide");
	echo "<select id='mop_categtitle' name='ma_options[mop_categtitle]'>";
foreach($items as $item) {
	$selected = ($options['mop_categtitle']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";
	echo "<div><small>Hide or show Page titles on <i>Category</i> Pages. </small></div>";
}

//CHECKBOX - Name: ma_options[tables]
function setting_tables_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_tables'])) { $options['mop_tables'] ="Enable";	}
	$items = array ("Enable" , "Disable");
	echo "<select id='mop_tables' name='ma_options[mop_tables]'>";
foreach($items as $item) {
	$selected = ($options['mop_tables']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";
	echo "<div><small>Hide table borders and background color.</small></div>";
}

// TEXTBOX - Name: ma_options[copyright]
function setting_copyright_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_copyright'])) { $options['mop_copyright'] ="";	}
	echo "<input id='mop_copyright' name='ma_options[mop_copyright]' size='40' type='text' value='{$options['mop_copyright']}' />";
	echo "<div><small>Insert custom text that will appear on the left side of the footer. Leave blank if that's not necessary.<br /> You can use HTML tags and any special characters like &copy .</small></div>";
}



////////////////////////////////
//// POST SETTINGS /////////////
////////////////////////////////



//CHECKBOX - Name: ma_options[postdate]
function setting_postdate_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_postdate'])) { $options['mop_postdate'] ="Show";	}
	$items = array ("Show" , "Hide");
	echo "<select id='mop_postdate' name='ma_options[mop_postdate]'>";
foreach($items as $item) {
	$selected = ($options['mop_postdate']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";
	echo "<div><small>Hide or show the post date.</small></div>";
}

//CHECKBOX - Name: ma_options[posttime]
function setting_posttime_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_posttime'])) { $options['mop_posttime'] ="Hide";	}
	$items = array ("Show" , "Hide");
	echo "<select id='mop_posttime' name='ma_options[mop_posttime]'>";
foreach($items as $item) {
	$selected = ($options['mop_posttime']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";
	echo "<div><small>Show the post time with the date. Time will not be visible if the Post Date is hidden.</small></div>";
}

//CHECKBOX - Name: ma_options[postauthor]
function setting_postauthor_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_postauthor'])) { $options['mop_postauthor'] ="Show";	}
	$items = array ("Show" , "Hide");
	echo "<select id='mop_postauthor' name='ma_options[mop_postauthor]'>";
foreach($items as $item) {
	$selected = ($options['mop_postauthor']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";
	echo "<div><small>Hide or show the post author.</small></div>";
}

//CHECKBOX - Name: ma_options[postcateg]
function setting_postcateg_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_postcateg'])) { $options['mop_postcateg'] ="Show";	}
	$items = array ("Show" , "Hide");
	echo "<select id='mop_postcateg' name='ma_options[mop_postcateg]'>";
foreach($items as $item) {
	$selected = ($options['mop_postcateg']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";
	echo "<div><small>Hide the post category (and tags if available).</small></div>";
}

//CHECKBOX - Name: ma_options[postbook]
function setting_postbook_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_postbook'])) { $options['mop_postbook'] ="Show";	}
	$items = array ("Show" , "Hide");
	echo "<select id='mop_postbook' name='ma_options[mop_postbook]'>";
foreach($items as $item) {
	$selected = ($options['mop_postbook']==$item) ? 'selected="selected"' : '';
	echo "<option value='$item' $selected>$item</option>";
}
	echo "</select>";
	echo "<div><small>Hide the 'Bookmark permalink'.</small></div>";
}


////////////////////////
/// SOCIAL SETTINGS ////
////////////////////////

// TEXTBOX - Name: ma_options[facebook]
function setting_facebook_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_facebook'])) { $options['mop_facebook'] ="";	}
	echo "<input id='mop_facebook' name='ma_options[mop_facebook]' size='40' type='text' value='{$options['mop_facebook']}' />";
	echo "<div><small>Insert your Facebook address. </small></div>";

}

// TEXTBOX - Name: ma_options[tweeter]
function setting_tweeter_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_tweeter'])) { $options['mop_tweeter'] ="";	}
	echo "<input id='mop_tweeter' name='ma_options[mop_tweeter]' size='40' type='text' value='{$options['mop_tweeter']}' />";
	echo "<div><small>Insert your Twitter address.</small></div> ";
}

// TEXTBOX - Name: ma_options[rss]
function setting_rss_fn() {
	$options = get_option('ma_options');
	if (!isset($options['mop_rss'])) { $options['mop_rss'] ="";	}
	echo "<input id='mop_rss' name='ma_options[mop_rss]' size='40' type='text' value='{$options['mop_rss']}' />";
	echo "<div><small>Insert your RSS Feed Link. </small></div>";
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
		<h2>Mantra Options</h2>
	<p style="display:inline;float:left;">	Customize your Mantra Theme to suit your needs. Visit the theme's <a href="http://www.riotreactions.com/mantra">home page</a> for more info and comments or</p>
	<div style="display:inline;float:left;margin-top:7px;">
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
	<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>
	</div>



		<form action="options.php" method="post">
		<?php settings_fields('ma_options'); ?>
		<?php do_settings_sections(__FILE__); ?>
		<p class="submit">
			<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
		</p>
		</form>

	</div>
	<script type="text/javascript">
new Control.ColorPicker("mop_backcolor", { IMAGE_BASE : "<?php echo get_template_directory_uri().'/js/img/'?>" });
new Control.ColorPicker("mop_headercolor", { IMAGE_BASE : "<?php echo get_template_directory_uri().'/js/img/'?>" });
new Control.ColorPicker("mop_prefootercolor", { IMAGE_BASE : "<?php echo get_template_directory_uri().'/js/img/'?>" });
new Control.ColorPicker("mop_footercolor", { IMAGE_BASE : "<?php echo get_template_directory_uri().'/js/img/'?>" });
new Control.ColorPicker("mop_contentcolor", { IMAGE_BASE : "<?php echo get_template_directory_uri().'/js/img/'?>" });
new Control.ColorPicker("mop_linkscolor", { IMAGE_BASE : "<?php echo get_template_directory_uri().'/js/img/'?>" });
new Control.ColorPicker("mop_hovercolor", { IMAGE_BASE : "<?php echo get_template_directory_uri().'/js/img/'?>" });
new Control.ColorPicker("mop_headtextcolor", { IMAGE_BASE : "<?php echo get_template_directory_uri().'/js/img/'?>" });
new Control.ColorPicker("mop_headtexthover", { IMAGE_BASE : "<?php echo get_template_directory_uri().'/js/img/'?>" });
new Control.ColorPicker("mop_sideheadbackcolor", { IMAGE_BASE : "<?php echo get_template_directory_uri().'/js/img/'?>" });
new Control.ColorPicker("mop_sideheadtextcolor", { IMAGE_BASE : "<?php echo get_template_directory_uri().'/js/img/'?>" });
new Control.ColorPicker("mop_footerheader", { IMAGE_BASE : "<?php echo get_template_directory_uri().'/js/img/'?>" });
new Control.ColorPicker("mop_footertext", { IMAGE_BASE : "<?php echo get_template_directory_uri().'/js/img/'?>" });
new Control.ColorPicker("mop_footerhover", { IMAGE_BASE : "<?php echo get_template_directory_uri().'/js/img/'?>" });

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

	$input['mop_facebook'] =  wp_kses_data($input['mop_facebook']);
	$input['mop_tweeter'] =  wp_kses_data($input['mop_tweeter']);
	$input['mop_rss'] =  wp_kses_data($input['mop_rss']);


	return $input; // return validated input

}

