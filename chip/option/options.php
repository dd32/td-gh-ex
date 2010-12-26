<?php
/*
|--------------------------
| Theme Variables
|--------------------------
*/

$theme_full_name = "Chip Life";
$theme_short_name = "chip_life";
$theme_action = FALSE;

/*
|--------------------------
| Theme Options
|--------------------------
*/

$theme_options = array(
	
	/*
	|--------------------------
	| Theme Title Options
	| 10-50
	|--------------------------
	*/
	
	"c1"	=>	array(
				"name"			=>	$theme_full_name." Title",
				"id"			=>	$theme_short_name."_title",
				"type"			=>	"header"
				),

	"c2"	=>	array(
				"name"			=>	"Use Image Logo in Header",
				"id"			=>	$theme_short_name."_logo",
				"type"			=>	"select",
				"std"			=>	"no",
				"options"		=>	array("no", "yes"),
				"help"			=>	"Select yes to add the image logo in the site header. Enter your logo URl below."
				),
	
	"c3"	=>	array(
				"name"			=>	"Enter Logo URl - Dimension (215x120)",
				"id"			=>	$theme_short_name."_logo_url",
				"std"			=>	"na",
				"type"			=>	"textarea",
				"help"			=>	"Replace the above code with your own logo URl."
				),
	
	/*
	|--------------------------
	| Theme Post Options
	| 51-100
	|--------------------------
	*/
	
	"c51"	=>	array(
				"name"			=>	$theme_full_name." Post",
				"id"			=>	$theme_short_name."_post",
				"type"			=>	"header"
				),

	"c52"	=>	array(
				"name"			=>	"Use Related Posts at the bottom of Post",
				"id"			=>	$theme_short_name."_related_post",
				"type"			=>	"select",
				"std"			=>	"no",
				"options"		=>	array("no", "yes"),
				"help"			=>	"Select yes to add the related post at the bottom of post"
				),
				
	"c53"		=>	array(
				"name"			=>	"How many Related Post",
				"id"			=>	$theme_short_name."_related_post_number",
				"type"			=>	"select",
				"std"			=>	"5",
				"options"		=>	array("5", "1", "2", "3", "4", "6", "7", "8", "9", "10"),
				"help"			=>	"How many related posts would you like to display?"
				),	
	
	/*
	|--------------------------
	| Theme Advertisement Options
	| 101-200
	|--------------------------
	*/
	
	"c101"	=>	array(
				"name"			=>	$theme_full_name." Advertisement",
				"id"			=>	$theme_short_name."_advertisement",
				"type"			=>	"header"
				),

	"c102"	=>	array(
				"name"			=>	"Display 728x90 Sponsor in Header",
				"id"			=>	$theme_short_name."_sponsor_001",
				"type"			=>	"select",
				"std"			=>	"no",
				"options"		=>	array("no", "yes"),
				"help"			=>	"Select yes to add the 728x90 sponsor in the site header. Enter your own ad code below."
				),
	
	"c103"	=>	array(
				"name"			=>	"Header 728x90 Sponsor Code",
				"id"			=>	$theme_short_name."_sponsor_001_code",
				"std"			=>	"na",
				"type"			=>	"textarea",
				"help"			=>	"Replace the above code with your own advertising code."
				),
				
	/*
	|--------------------------
	| Theme Subscription/Community Options
	| 201-300
	|--------------------------
	*/
	
	"c201"	=>	array(
				"name"			=>	$theme_full_name." Subscription",
				"id"			=>	$theme_short_name."_subscription",
				"type"			=>	"header"
				),
	
	"c202"	=>	array(
				"name"			=>	"Use RSS",
				"id"			=>	$theme_short_name."_rss",
				"type"			=>	"select",
				"std"			=>	"no",
				"options"		=>	array("no", "yes"),
				"help"			=> "RSS (most commonly expanded as 'Really Simple Syndication') is a family of web feed formats used to publish frequently updated work<br />Select 'yes' to use RSS address, and enter your RSS Feed URI below."
				),
	
	"c203"	=>	array(
				"name"			=>	"Enter RSS URl",
				"id"			=>	$theme_short_name."_rss_url",
				"std"			=>	"na",
				"type"			=>	"textarea",
				"help"			=>	"Enter RSS full URl.<br /> For example, Google/FeedBurner feed URL: http://feeds.feedburner.com/tutorialchip"
				),
	
	"c204"	=>	array(
				"name"			=>	"Use Feedburner Subscription",
				"id"			=>	$theme_short_name."_feedburner",
				"type"			=>	"select",
				"std"			=>	"no",
				"options"		=>	array("no", "yes"),
				"help"			=> "Use Feedburner Subscription<br />Select 'yes' to use Feedburner ID for email subscription."
				),
	
	"c205"	=>	array(
				"name"			=>	"Enter Feedburner ID",
				"id"			=>	$theme_short_name."_feedburner_id",
				"std"			=>	"na",
				"type"			=>	"textarea",
				"help"			=>	"Enter Feedburner ID.<br /> For example, http://feeds.feedburner.com/<strong>tutorialchip</strong>"
				),
	
	"c206"	=>	array(
				"name"			=>	"Display Feedburner Subscription Form at the end of Post",
				"id"			=>	$theme_short_name."_feedburner_display_bottom",
				"type"			=>	"select",
				"std"			=>	"no",
				"options"		=>	array("no", "yes"),
				"help"			=> "Use Feedburner Subscription Form<br />Select 'yes' to use Feedburner subscription form at the end of post in 'Single Template'."
				),
	
	"c207"	=>	array(
				"name"			=>	"Use Twitter",
				"id"			=>	$theme_short_name."_twitter",
				"type"			=>	"select",
				"std"			=>	"no",
				"options"		=>	array("no", "yes"),
				"help"			=> "Use Twitter URL<br />Select 'yes' to use Twitter address, and enter your Twitter URI below."
				),
	
	"c208"	=>	array(
				"name"			=>	"Enter Twitter URl",
				"id"			=>	$theme_short_name."_twitter_url",
				"std"			=>	"na",
				"type"			=>	"textarea",
				"help"			=>	"Enter Twitter URl.<br /> For example, http://twitter.com/lifeobject1"
				),
				
	"c209"	=>	array(
				"name"			=>	"Use Delicious",
				"id"			=>	$theme_short_name."_delicious",
				"type"			=>	"select",
				"std"			=>	"no",
				"options"		=>	array("no", "yes"),
				"help"			=> "Use Delicious URL<br />Select 'yes' to use Delicious address, and enter your Delicious URI below."
				),
	
	"c210"	=>	array(
				"name"			=>	"Enter Delicious URl",
				"id"			=>	$theme_short_name."_delicious_url",
				"std"			=>	"na",
				"type"			=>	"textarea",
				"help"			=>	"Enter Delicious URl.<br /> For example, http://www.delicious.com/life.object"
				),
	
	"c211"	=>	array(
				"name"			=>	"Use Facebook",
				"id"			=>	$theme_short_name."_facebook",
				"type"			=>	"select",
				"std"			=>	"no",
				"options"		=>	array("no", "yes"),
				"help"			=> "Use Facebook URL<br />Select 'yes' to use Facebook address, and enter your Facebook URI below."
				),
	
	"c212"	=>	array(
				"name"			=>	"Enter Facebook URl",
				"id"			=>	$theme_short_name."_facebook_url",
				"std"			=>	"na",
				"type"			=>	"textarea",
				"help"			=>	"Enter Facebook URl.<br /> For example, http://www.facebook.com/profile.php?id=100001747038774"
				),
	
	"c213"	=>	array(
				"name"			=>	"Use StumbleUpon",
				"id"			=>	$theme_short_name."_stumbleupon",
				"type"			=>	"select",
				"std"			=>	"no",
				"options"		=>	array("no", "yes"),
				"help"			=> "Use StumbleUpon URL<br />Select 'yes' to use StumbleUpon address, and enter your StumbleUpon URI below."
				),
	
	"c214"	=>	array(
				"name"			=>	"Enter StumbleUpon URl",
				"id"			=>	$theme_short_name."_stumbleupon_url",
				"std"			=>	"na",
				"type"			=>	"textarea",
				"help"			=>	"Enter StumbleUpon URl.<br /> For example, http://www.stumbleupon.com/stumbler/lifeobject"
				),
	
	"c215"	=>	array(
				"name"			=>	"Use Digg",
				"id"			=>	$theme_short_name."_digg",
				"type"			=>	"select",
				"std"			=>	"no",
				"options"		=>	array("no", "yes"),
				"help"			=> "Use Digg URL<br />Select 'yes' to use Digg address, and enter your Digg URI below."
				),
	
	"c216"	=>	array(
				"name"			=>	"Enter Digg URl",
				"id"			=>	$theme_short_name."_digg_url",
				"std"			=>	"na",
				"type"			=>	"textarea",
				"help"			=>	"Enter Digg URl.<br /> For example, http://digg.com/lifeobject"
				),
	
	/*
	|--------------------------
	| Theme Advance Options
	| 301-350
	|--------------------------
	*/
	
	"c301"	=>	array(
				"name"			=>	$theme_full_name." Advance",
				"id"			=>	$theme_short_name."_advance",
				"type"			=>	"header"
				),

	"c302"	=>	array(
				"name"			=>	"Use Analytics",
				"id"			=>	$theme_short_name."_analytics",
				"type"			=>	"select",
				"std"			=>	"no",
				"options"		=>	array("no", "yes"),
				"help"			=> "Using Analytics code <strong>(For example, Google Analytics)</strong> is very helpful to understand the traffic nature of your blog. Select 'yes' to use analytics code, and enter your analytics code below."
				),
	
	"c303"	=>	array(
				"name"			=>	"Enter Analytics Code",
				"id"			=>	$theme_short_name."_analytics_code",
				"std"			=>	"na",
				"type"			=>	"textarea",
				"help"			=>	"Enter analytics code. This code will be inserted in footer."
				),
	
	
);

/*
|--------------------------
| Theme Gateway Method
|--------------------------
*/

function chip_theme_page() {
	
	global $theme_full_name, $theme_short_name, $theme_options, $theme_action;

    if ( undefined_index_fix( $_GET['page'] ) == basename(__FILE__) ) {

    	if ( undefined_index_fix ( $_REQUEST['action'] ) == 'save' ) {

                foreach ( $theme_options as $value ) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { 
						update_option( $value['id'], $_REQUEST[$value['id']] );
					}else{
						delete_option( $value['id'] );
					}
				}
				
				$theme_action = "save";

        } else if( $_REQUEST['action'] == 'reset' ) {

            foreach ( $theme_options as $value ) {
                delete_option( $value['id'] );
			}
			
			$theme_action = "reset";
        }
    
	} // if ($_GET['page'] == basename(__FILE__))

	/*
	|--------------------------
	| Theme Page
	|--------------------------
	*/
	
	$file = add_menu_page( $theme_full_name." Options", $theme_full_name." Options", 'edit_themes', basename(__FILE__), 'chip_theme_setting');
	add_submenu_page( $theme_full_name." Options", $theme_full_name." Options 2", 'edit_themes', basename(__FILE__), 'chip_theme_setting');
	
	//$file = add_theme_page($themeName." Options", "Sense Emerald Settings", 'edit_themes', basename(__FILE__), 'getSenseOptionsPage');
	add_action("admin_head-".$file, 'chip_theme_head');
}

/*
|--------------------------
| Theme Settings
|--------------------------
*/

function chip_theme_setting() {
	
	global $theme_full_name, $theme_short_name, $theme_options, $theme_action;
	require_once(OPTION_FSROOT . 'setting.php');
}

/*
|--------------------------
| Sense Head - Style
|--------------------------
*/

function chip_theme_head() {

?>

<link rel="stylesheet" type="text/css" href="<?php echo OPTION_WSROOT; ?>style.css">

<?php
}
?>