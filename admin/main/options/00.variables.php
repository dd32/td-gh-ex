<?php
/**
 * Theme setup functions.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	ADD CUSTOM VARIABLES
---------------------------------------------------------------------------------- */

/* Add global variables used in Redux framework */
function thinkup_reduxvariables() { 

	// Fetch options stored in $data.
	global $redux;

	//  1.1.     General settings.
	$GLOBALS['thinkup_general_logoswitch']                  = thinkup_var ( 'thinkup_general_logoswitch' );
	$GLOBALS['thinkup_general_logolink']                    = thinkup_var ( 'thinkup_general_logolink', 'url' );
	$GLOBALS['thinkup_general_logolinkretina']              = thinkup_var ( 'thinkup_general_logolinkretina', 'url' );
	$GLOBALS['thinkup_general_sitetitle']                   = thinkup_var ( 'thinkup_general_sitetitle' );
	$GLOBALS['thinkup_general_sitedescription']             = thinkup_var ( 'thinkup_general_sitedescription' );
	$GLOBALS['thinkup_general_faviconlink']                 = thinkup_var ( 'thinkup_general_faviconlink', 'url' );
	$GLOBALS['thinkup_general_layout']                      = thinkup_var ( 'thinkup_general_layout' );
	$GLOBALS['thinkup_general_sidebars']                    = thinkup_var ( 'thinkup_general_sidebars' );
	$GLOBALS['thinkup_general_responsiveswitch']            = thinkup_var ( 'thinkup_general_responsiveswitch' );
	$GLOBALS['thinkup_general_breadcrumbswitch']            = thinkup_var ( 'thinkup_general_breadcrumbswitch' );
	$GLOBALS['thinkup_general_breadcrumbdelimeter']         = thinkup_var ( 'thinkup_general_breadcrumbdelimeter' );
	$GLOBALS['thinkup_general_customcss']                   = thinkup_var ( 'thinkup_general_customcss' );
	$GLOBALS['thinkup_general_customjavafront']             = thinkup_var ( 'thinkup_general_customjavafront' );
	$GLOBALS['thinkup_general_democontent']                 = thinkup_var ( 'thinkup_general_democontent' );

	//  1.2.     Homepage.
	$GLOBALS['thinkup_homepage_layout']                     = thinkup_var ( 'thinkup_homepage_layout' );
	$GLOBALS['thinkup_homepage_sidebars']                   = thinkup_var ( 'thinkup_homepage_sidebars' );
	$GLOBALS['thinkup_homepage_sliderswitch']               = thinkup_var ( 'thinkup_homepage_sliderswitch' );
	$GLOBALS['thinkup_homepage_slidername']                 = thinkup_var ( 'thinkup_homepage_slidername' );
	$GLOBALS['thinkup_homepage_introswitch']                = thinkup_var ( 'thinkup_homepage_introswitch' );
	$GLOBALS['thinkup_homepage_introaction']                = thinkup_var ( 'thinkup_homepage_introaction' );
	$GLOBALS['thinkup_homepage_introactionteaser']          = thinkup_var ( 'thinkup_homepage_introactionteaser' );
	$GLOBALS['thinkup_homepage_introactionbutton']          = thinkup_var ( 'thinkup_homepage_introactionbutton' );
	$GLOBALS['thinkup_homepage_introactionlink']            = thinkup_var ( 'thinkup_homepage_introactionlink' );
	$GLOBALS['thinkup_homepage_introactionpage']            = thinkup_var ( 'thinkup_homepage_introactionpage' );
	$GLOBALS['thinkup_homepage_introactioncustom']          = thinkup_var ( 'thinkup_homepage_introactioncustom' );

	//  1.3.     Header
	$GLOBALS['thinkup_header_searchswitch']                 = thinkup_var ( 'thinkup_header_searchswitch' );
	$GLOBALS['thinkup_header_socialswitch']                 = thinkup_var ( 'thinkup_header_socialswitch' );
	$GLOBALS['thinkup_header_socialmessage']                = thinkup_var ( 'thinkup_header_socialmessage' );
	$GLOBALS['thinkup_header_facebookswitch']               = thinkup_var ( 'thinkup_header_facebookswitch' );
	$GLOBALS['thinkup_header_facebooklink']                 = thinkup_var ( 'thinkup_header_facebooklink' );
	$GLOBALS['thinkup_header_facebookiconswitch']           = thinkup_var ( 'thinkup_header_facebookiconswitch' );
	$GLOBALS['thinkup_header_facebookcustomicon']           = thinkup_var ( 'thinkup_header_facebookcustomicon', 'url' );
	$GLOBALS['thinkup_header_twitterswitch']                = thinkup_var ( 'thinkup_header_twitterswitch' );
	$GLOBALS['thinkup_header_twitterlink']                  = thinkup_var ( 'thinkup_header_twitterlink' );
	$GLOBALS['thinkup_header_twittericonswitch']            = thinkup_var ( 'thinkup_header_twittericonswitch' );
	$GLOBALS['thinkup_header_twittercustomicon']            = thinkup_var ( 'thinkup_header_twittercustomicon', 'url' );
	$GLOBALS['thinkup_header_googleswitch']                 = thinkup_var ( 'thinkup_header_googleswitch' );
	$GLOBALS['thinkup_header_googlelink']                   = thinkup_var ( 'thinkup_header_googlelink' );
	$GLOBALS['thinkup_header_googleiconswitch']             = thinkup_var ( 'thinkup_header_googleiconswitch' );
	$GLOBALS['thinkup_header_googlecustomicon']             = thinkup_var ( 'thinkup_header_googlecustomicon', 'url' );
	$GLOBALS['thinkup_header_linkedinswitch']               = thinkup_var ( 'thinkup_header_linkedinswitch' );
	$GLOBALS['thinkup_header_linkedinlink']                 = thinkup_var ( 'thinkup_header_linkedinlink' );
	$GLOBALS['thinkup_header_linkediniconswitch']           = thinkup_var ( 'thinkup_header_linkediniconswitch' );
	$GLOBALS['thinkup_header_linkedincustomicon']           = thinkup_var ( 'thinkup_header_linkedincustomicon', 'url' );
	$GLOBALS['thinkup_header_flickrswitch']                 = thinkup_var ( 'thinkup_header_flickrswitch' );
	$GLOBALS['thinkup_header_flickrlink']                   = thinkup_var ( 'thinkup_header_flickrlink' );
	$GLOBALS['thinkup_header_flickriconswitch']             = thinkup_var ( 'thinkup_header_flickriconswitch' );
	$GLOBALS['thinkup_header_flickrcustomicon']             = thinkup_var ( 'thinkup_header_flickrcustomicon', 'url' );
	$GLOBALS['thinkup_header_lastfmswitch']                 = thinkup_var ( 'thinkup_header_lastfmswitch' );
	$GLOBALS['thinkup_header_lastfmlink']                   = thinkup_var ( 'thinkup_header_lastfmlink' );
	$GLOBALS['thinkup_header_lastfmiconswitch']             = thinkup_var ( 'thinkup_header_lastfmiconswitch' );
	$GLOBALS['thinkup_header_lastfmcustomicon']             = thinkup_var ( 'thinkup_header_lastfmcustomicon', 'url' );
	$GLOBALS['thinkup_header_rssswitch']                    = thinkup_var ( 'thinkup_header_rssswitch' );
	$GLOBALS['thinkup_header_rsslink']                      = thinkup_var ( 'thinkup_header_rsslink' );
	$GLOBALS['thinkup_header_rssiconswitch']                = thinkup_var ( 'thinkup_header_rssiconswitch' );
	$GLOBALS['thinkup_header_rsscustomicon']                = thinkup_var ( 'thinkup_header_rsscustomicon', 'url' );

	//  1.4.     Footer.
	$GLOBALS['thinkup_footer_layout']                       = thinkup_var ( 'thinkup_footer_layout' );
	$GLOBALS['thinkup_footer_widgetswitch']                 = thinkup_var ( 'thinkup_footer_widgetswitch' );
	$GLOBALS['thinkup_footer_copyright']                    = thinkup_var ( 'thinkup_footer_copyright' );

	//  1.5.1.   Blog - Main page.
	$GLOBALS['thinkup_blog_layout']                         = thinkup_var ( 'thinkup_blog_layout' );
	$GLOBALS['thinkup_blog_sidebars']                       = thinkup_var ( 'thinkup_blog_sidebars' );
	$GLOBALS['thinkup_blog_postswitch']                     = thinkup_var ( 'thinkup_blog_postswitch' );

	//  1.5.2.   Blog - Single post.
	$GLOBALS['thinkup_post_layout']                         = thinkup_var ( 'thinkup_post_layout' );
	$GLOBALS['thinkup_post_sidebars']                       = thinkup_var ( 'thinkup_post_sidebars' );

	//  1.6.     Portfolio. - PREMIUM FEATURE

	//  1.7.     Contact Page. - PREMIUM FEATURE

	//  1.8.     Special pages. - PREMIUM FEATURE

	//  1.9.     Notification bar. - PREMIUM FEATURE

	//  1.10.     Search engine optimisation. - PREMIUM FEATURE

	//  1.11.     Typography.
	$GLOBALS['thinkup_font_bodyswitch']                     = thinkup_var ( 'thinkup_font_bodyswitch' );
	$GLOBALS['thinkup_font_bodystandard']                   = thinkup_var ( 'thinkup_font_bodystandard' );
	$GLOBALS['thinkup_font_bodygoogle']                     = thinkup_var ( 'thinkup_font_bodygoogle' );
	$GLOBALS['thinkup_font_bodyheadingswitch']              = thinkup_var ( 'thinkup_font_bodyheadingswitch' );
	$GLOBALS['thinkup_font_bodyheadingstandard']            = thinkup_var ( 'thinkup_font_bodyheadingstandard' );
	$GLOBALS['thinkup_font_bodyheadinggoogle']              = thinkup_var ( 'thinkup_font_bodyheadinggoogle' );
	$GLOBALS['thinkup_font_preheaderswitch']                = thinkup_var ( 'thinkup_font_preheaderswitch' );
	$GLOBALS['thinkup_font_preheaderstandard']              = thinkup_var ( 'thinkup_font_preheaderstandard' );
	$GLOBALS['thinkup_font_preheadergoogle']                = thinkup_var ( 'thinkup_font_preheadergoogle' );
	$GLOBALS['thinkup_font_mainheaderswitch']               = thinkup_var ( 'thinkup_font_mainheaderswitch' );
	$GLOBALS['thinkup_font_mainheaderstandard']             = thinkup_var ( 'thinkup_font_mainheaderstandard' );
	$GLOBALS['thinkup_font_mainheadergoogle']               = thinkup_var ( 'thinkup_font_mainheadergoogle' );
	$GLOBALS['thinkup_font_footerheadingswitch']            = thinkup_var ( 'thinkup_font_footerheadingswitch' );
	$GLOBALS['thinkup_font_footerheadingstandard']          = thinkup_var ( 'thinkup_font_footerheadingstandard' );
	$GLOBALS['thinkup_font_footerheadinggoogle']            = thinkup_var ( 'thinkup_font_footerheadinggoogle' );
	$GLOBALS['thinkup_font_mainfooterswitch']               = thinkup_var ( 'thinkup_font_mainfooterswitch' );
	$GLOBALS['thinkup_font_mainfooterstandard']             = thinkup_var ( 'thinkup_font_mainfooterstandard' );
	$GLOBALS['thinkup_font_mainfootergoogle']               = thinkup_var ( 'thinkup_font_mainfootergoogle' );
	$GLOBALS['thinkup_font_postfooterswitch']               = thinkup_var ( 'thinkup_font_postfooterswitch' );
	$GLOBALS['thinkup_font_postfooterstandard']             = thinkup_var ( 'thinkup_font_postfooterstandard' );
	$GLOBALS['thinkup_font_postfootergoogle']               = thinkup_var ( 'thinkup_font_postfootergoogle' );
	$GLOBALS['thinkup_font_bodysize']                       = thinkup_var ( 'thinkup_font_bodysize' );
	$GLOBALS['thinkup_font_h1size']                         = thinkup_var ( 'thinkup_font_h1size' );
	$GLOBALS['thinkup_font_h2size']                         = thinkup_var ( 'thinkup_font_h2size' );
	$GLOBALS['thinkup_font_h3size']                         = thinkup_var ( 'thinkup_font_h3size' );
	$GLOBALS['thinkup_font_h4size']                         = thinkup_var ( 'thinkup_font_h4size' );
	$GLOBALS['thinkup_font_h5size']                         = thinkup_var ( 'thinkup_font_h5size' );
	$GLOBALS['thinkup_font_h6size']                         = thinkup_var ( 'thinkup_font_h6size' );
	$GLOBALS['thinkup_font_sidebarsize']                    = thinkup_var ( 'thinkup_font_sidebarsize' );
	$GLOBALS['thinkup_font_preheadersize']                  = thinkup_var ( 'thinkup_font_preheadersize' );
	$GLOBALS['thinkup_font_preheadersubsize']               = thinkup_var ( 'thinkup_font_preheadersubsize' );
	$GLOBALS['thinkup_font_mainheadersize']                 = thinkup_var ( 'thinkup_font_mainheadersize' );
	$GLOBALS['thinkup_font_mainheadersubsize']              = thinkup_var ( 'thinkup_font_mainheadersubsize' );
	$GLOBALS['thinkup_font_footerheadingsize']              = thinkup_var ( 'thinkup_font_footerheadingsize' );
	$GLOBALS['thinkup_font_mainfootersize']                 = thinkup_var ( 'thinkup_font_mainfootersize' );
	$GLOBALS['thinkup_font_postfootersize']                = thinkup_var ( 'thinkup_font_postfootersize' );

	//  1.12.     Custom styling. - PREMIUM FEATURE

	//  1.13.     Support.
}
add_action( 'thinkup_hook_header', 'thinkup_reduxvariables' );

?>