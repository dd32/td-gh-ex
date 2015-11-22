<?php
/**
 * Social media functions.
 *
 * @package ThinkUpThemes
 */

//----------------------------------------------------------------------------------
//	SEARCH - DISABLE SEARCH
//----------------------------------------------------------------------------------

function thinkup_input_headersearch() {
global $thinkup_header_searchswitch;

	if ( $thinkup_header_searchswitch == '1' ) {
		echo '<div id="pre-header-search">',
		     get_search_form(),
		     '</div>';
	}
}

//----------------------------------------------------------------------------------
//	SOCIAL MEDIA - DISPLAY MESSAGE
//----------------------------------------------------------------------------------

// Message Settings
function thinkup_input_socialmessage(){
global $thinkup_header_socialmessage;
global $thinkup_header_facebookswitch;
global $thinkup_header_twitterswitch;
global $thinkup_header_googleswitch;
global $thinkup_header_linkedinswitch;
global $thinkup_header_flickrswitch;
global $thinkup_header_lastfmswitch;
global $thinkup_header_rssswitch;
global $thinkup_header_diggswitch;

	if ( empty( $thinkup_header_facebookswitch ) and empty( $thinkup_header_twitterswitch ) and empty( $thinkup_header_googleswitch ) and empty( $thinkup_header_linkedinswitch ) and empty( $thinkup_header_flickrswitch ) and empty( $thinkup_header_lastfmswitch ) and empty( $thinkup_header_rssswitch ) and empty( $thinkup_header_diggswitch ) ) {	
		return '';
	} else if ( ! empty( $thinkup_header_socialmessage ) ) {	
		return $thinkup_header_socialmessage;
	} else if ( empty( $thinkup_header_socialmessage ) ) {
		return '';
	}
}


//----------------------------------------------------------------------------------
//	SOCIAL MEDIA - CUSTOM ICONS
//----------------------------------------------------------------------------------

// Facebook - Custom Icon
function thinkup_input_facebookicon(){
global $thinkup_header_facebookiconswitch;
global $thinkup_header_facebookcustomicon;

	$output = NULL;

	if ( $thinkup_header_facebookiconswitch == '1' and ! empty( $thinkup_header_facebookcustomicon ) ) {
		$output .= '#pre-header-social li.facebook a,';
		$output .= '#pre-header-social li.facebook a:hover {';
		$output .= 'background: url("' . $thinkup_header_facebookcustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.facebook i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

// Twitter - Custom Icon
function thinkup_input_twittericon(){
global $thinkup_header_twittericonswitch;
global $thinkup_header_twittercustomicon;

	$output = NULL;

	if ( $thinkup_header_twittericonswitch == '1' and ! empty( $thinkup_header_twittercustomicon ) ) {
		$output .= '#pre-header-social li.twitter a,';
		$output .= '#pre-header-social li.twitter a:hover {';
		$output .= 'background: url("' . $thinkup_header_twittercustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.twitter i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

// Google+ - Custom Icon
function thinkup_input_googleicon(){
global $thinkup_header_googleiconswitch;
global $thinkup_header_googlecustomicon;

	$output = NULL;

	if ( $thinkup_header_googleiconswitch == '1' and ! empty( $thinkup_header_googlecustomicon ) ) {
		$output .= '#pre-header-social li.google-plus a,';
		$output .= '#pre-header-social li.google-plus a:hover {';
		$output .= 'background: url("' . $thinkup_header_googlecustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.google-plus i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

// LinkedIn - Custom Icon
function thinkup_input_linkedinicon(){
global $thinkup_header_linkediniconswitch;
global $thinkup_header_linkedincustomicon;

	$output = NULL;

	if ( $thinkup_header_linkediniconswitch == '1' and ! empty( $thinkup_header_linkedincustomicon ) ) {
		$output .= '#pre-header-social li.linkedin a,';
		$output .= '#pre-header-social li.linkedin a:hover {';
		$output .= 'background: url("' . $thinkup_header_linkedincustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.linkedin i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

// Flickr - Custom Icon
function thinkup_input_flickricon(){
global $thinkup_header_flickriconswitch;
global $thinkup_header_flickrcustomicon;

	$output = NULL;

	if ( $thinkup_header_flickriconswitch == '1' and ! empty( $thinkup_header_flickrcustomicon ) ) {
		$output .= '#pre-header-social li.flickr a,';
		$output .= '#pre-header-social li.flickr a:hover {';
		$output .= 'background: url("' . $thinkup_header_flickrcustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.flickr i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

// LastFM - Custom Icon
function thinkup_input_lastfmicon(){
global $thinkup_header_lastfmiconswitch;
global $thinkup_header_lastfmcustomicon;

	$output = NULL;

	if ( $thinkup_header_lastfmiconswitch == '1' and ! empty( $thinkup_header_lastfmcustomicon ) ) {
		$output .= '#pre-header-social li.lastfm a,';
		$output .= '#pre-header-social li.lastfm a:hover {';
		$output .= 'background: url("' . $thinkup_header_lastfmcustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.lastfm i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;

}

// RSS - Custom Icon
function thinkup_input_rssicon(){
global $thinkup_header_rssiconswitch;
global $thinkup_header_rsscustomicon;

	$output = NULL;

	if ( $thinkup_header_rssiconswitch == '1' and ! empty( $thinkup_header_rsscustomicon ) ) {
		$output .= '#pre-header-social li.rss a,';
		$output .= '#pre-header-social li.rss a:hover {';
		$output .= 'background: url("' . $thinkup_header_rsscustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.rss i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

// Input Custom Social Media Icons
function thinkup_input_socialicon(){

	$output = NULL;

	$output .= thinkup_input_facebookicon();
	$output .= thinkup_input_twittericon();
	$output .= thinkup_input_googleicon();
	$output .= thinkup_input_linkedinicon();
	$output .= thinkup_input_flickricon();
	$output .= thinkup_input_lastfmicon();
	$output .= thinkup_input_rssicon();

	if ( ! empty( $output ) ) {
		echo    '<style type="text/css">' . "\n" . $output . '</style>';
	}
}
add_action( 'wp_head', 'thinkup_input_socialicon', 13 );


//----------------------------------------------------------------------------------
//	SOCIAL MEDIA - OUTPUT SOCIAL MEDIA SELECTIONS
//----------------------------------------------------------------------------------

function thinkup_input_socialmedia() {
global $thinkup_header_socialswitch;
global $thinkup_header_socialmessage;
global $thinkup_header_facebookswitch;
global $thinkup_header_facebooklink;
global $thinkup_header_twitterswitch;
global $thinkup_header_twitterlink;
global $thinkup_header_googleswitch;
global $thinkup_header_googlelink;
global $thinkup_header_linkedinswitch;
global $thinkup_header_linkedinlink;
global $thinkup_header_flickrswitch;
global $thinkup_header_flickrlink;
global $thinkup_header_lastfmswitch;
global $thinkup_header_lastfmlink;
global $thinkup_header_rssswitch;
global $thinkup_header_rsslink;

	if ( $thinkup_header_socialswitch == '1' ) {

		echo '<div id="pre-header-social"><ul>';

			if ( ! empty ( $thinkup_header_socialmessage ) ) {
				echo '<li class="social message">' . thinkup_input_socialmessage() . '</li>';
			}

			// Facebook settings
			if ( $thinkup_header_facebookswitch == '1' ) {
				echo '<li class="social facebook"><a href="' . $thinkup_header_facebooklink . '" data-tip="bottom" data-original-title="Facebook"></a></li>';
			}

			// Twitter settings
			if ( $thinkup_header_twitterswitch == '1' ) {
				echo '<li class="social twitter"><a href="' . $thinkup_header_twitterlink . '" data-tip="bottom" data-original-title="Twitter"></a></li>';
			}

			// Google+ settings
			if ( $thinkup_header_googleswitch == '1' ) {
				echo '<li class="social google"><a href="' . $thinkup_header_googlelink . '" data-tip="bottom" data-original-title="Google+"></a></li>';
			}

			// LinkedIn settings
			if ( $thinkup_header_linkedinswitch == '1' ) {
				echo '<li class="social linkedin"><a href="' . $thinkup_header_linkedinlink . '" data-tip="bottom" data-original-title="LinkedIn"></a></li>';
			}

			// Flickr settings
			if ( $thinkup_header_flickrswitch == '1' ) {
				echo '<li class="social flickr"><a href="' . $thinkup_header_flickrlink . '" data-tip="bottom" data-original-title="Flickr"></a></li>';
			}

			// Last FM settings
			if ( $thinkup_header_lastfmswitch == '1' ) {
				echo '<li class="social lastfm"><a href="' . $thinkup_header_lastfmlink . '" data-tip="bottom" data-original-title="Last FM"></a></li>';
			}

			// RSS settings
			if ( $thinkup_header_rssswitch == '1' ) {
				echo '<li class="social rss"><a href="' . $thinkup_header_rsslink . '" data-tip="bottom" data-original-title="RSS"></a></li>';
			}

		echo	'</ul></div>';

	}
}


?>