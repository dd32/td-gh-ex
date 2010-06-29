<?php
@session_start();

$_arjunaDefaultOptions = array(
	'headerMenu1_dropdown' => '3', // 1, 2, 3 (the depth of the menu, 1 being no dropdown)
	'headerMenu1_display' => 'pages', // pages, categories
	'headerMenu1_sortBy' => 'post_title', // [CATEGORIES]: name, ID, count, slug [PAGES]: post_title, ID, post_name (slug), menu_order (the page's Order value)
	'headerMenu1_sortOrder' => 'asc', // asc, desc
	'headerMenu1_alignment' => 'right', // right, left
	'headerMenu1_show' => true,
	'headerMenu1_disableParentPageLink' => false,
	'headerMenu1_exclude_categories' => '',
	'headerMenu1_exclude_pages' => '',
	'headerMenu2_dropdown' => '3', // 1, 2, 3 (the depth of the menu, 1 being no dropdown)
	'headerMenu2_display' => 'categories', // pages, categories
	'headerMenu2_sortBy' => 'name', // [CATEGORIES]: name, ID, count, slug [PAGES]: post_title, ID, post_name (slug), menu_order (the page's Order value)
	'headerMenu2_sortOrder' => 'asc', // asc, desc
	'headerMenu2_displayHomeButton' => true,
	'headerMenu2_displaySeparators' => true,
	'headerMenu2_show' => true,
	'headerMenu2_disableParentPageLink' => false,
	'headerMenu2_exclude_categories' => '',
	'headerMenu2_exclude_pages' => '',
	'headerImage' => 'lightBlue', //lightBlue, darkBlue
	'commentDisplay' => 'alt', // alt, left, right
	'commentDateFormat' => 'timePassed', // timePassed, date
	'comments_hideWhenDisabledOnPages' => true,
	'comments_hideWhenDisabledOnPosts' => false,
	'trackbacks_hideWhenDisabledOnPages' => true,
	'trackbacks_hideWhenDisabledOnPosts' => true,
	'footerStyle' => 'style1', // style1, style2
	'appendToPageTitle' => 'blogName', // blogName, custom
	'appendToPageTitleCustom' => '',
	'sidebarDisplay' => 'right', // right, left, none
	'sidebarWidth' => 'normal', // small, normal, large
	'sidebar_showDefault' => true, 
	'sidebar_showRSSButton' => true, 
	'sidebar_showTwitterButton' => false, 
	'sidebar_showFacebookButton' => false, 
	'sidebar_twitterURL' => '', 
	'sidebar_facebookURL' => '', 
	'sidebar_displayButtonTexts' => false, 
	'postsShowAuthor' => true,
	'postsShowTime' => false,
	'posts_showTopPostLinks' => false,
	'posts_showBottomPostLinks' => true,
	'pages_showInfoBar' => false,
	'customCSS' => false,
	'customCSS_input' => '',
	'pagination' => true,
	'pagination_pageRange' => 2, //the number of page buttons to show before and after the current page button
	'pagination_pageAnchors' => 1, //the number of buttons to always show at the beginning and end of the pagination bar
	'pagination_pageGap' => 1, //the number of pages in a gap before an ellipsis is added
	
	//Added 1.5
	'excerpts_index' => false,
	'excerpts_categoryPages' => true,
	'excerpts_archivePages' => true,
	'excerpts_searchPages' => true,
	'background_color' => '#d9d9d9',
	'background_style' => 'gradient_blueish', //if set, overrides background_color
	'solidBackground_buttonStyle' => 'default', //will only be used if the background color is solid
	'headerLogo' => '',
	'headerLogo_width' => 0,
	'headerLogo_height' => 0,

	'archives_includeTags' => true,
	'archives_includeCategories' => true,

	'miscellaneous_IE6Notice' => true,
	'headerMenus_enableJavaScript' => true,
	'headerMenus_effect' => 'slide', //slide, fade, none
	'headerMenus_delay' => 500 //in milliseconds

);


$optionsSaved = false;
function arjuna_create_options() {
	// Default values
	$options = $GLOBALS['_arjunaDefaultOptions'];
	
	// Overridden values
	$DBOptions = get_option('arjuna_options');
	if ( !is_array($DBOptions) ) $DBOptions = array();
	
	// Merge
	// Change since Arjuna 1.2: Values that are not used anymore will be deleted
	foreach ( $options as $key => $value )
		if ( isset($DBOptions[$key]) )
			$options[$key] = $DBOptions[$key];
	
	update_option('arjuna_options', $options);
	
	return $options;
}

function arjuna_get_options() {
	
	static $return = false;
	if($return !== false)
		return $return;
	
	$options = get_option('arjuna_options');
	
	if(!empty($options) && $options == $GLOBALS['_arjunaDefaultOptions'])
		$return = $options;
	else $return = arjuna_create_options();
	
	return $return;
}

$formErrors = array();
function arjuna_add_theme_options() {
	global $optionsSaved, $formErrors;
	if(isset($_POST['arjuna_save_options'])) {
		
		$options = arjuna_create_options();
		
		//Menu 1 dropdown
		$validOptions = array('1', '2', '3');
		if ( in_array($_POST['headerMenu1_dropdown'], $validOptions) ) $options['headerMenu1_dropdown'] = $_POST['headerMenu1_dropdown'];
		else $options['headerMenu1_dropdown'] = '3';

		//Menu 1 display
		$validOptions = array('pages', 'categories');
		if ( in_array($_POST['headerMenu1_display'], $validOptions) ) $options['headerMenu1_display'] = $_POST['headerMenu1_display'];
		else $options['headerMenu1_display'] = 'pages';
		
		if ($options['headerMenu1_display']=='pages') {
			//Menu 1 sorting for PAGES
			$validOptions = array('post_title', 'ID', 'post_name', 'menu_order');
			if ( in_array($_POST['headerMenu1_sortBy_pages'], $validOptions) ) $options['headerMenu1_sortBy'] = $_POST['headerMenu1_sortBy_pages'];
			else $options['headerMenu1_sortBy'] = $validOptions[0];
			//Menu 1 sorting order
			$validOptions = array('asc', 'desc');
			if ( in_array($_POST['headerMenu1_sortOrder_pages'], $validOptions) ) $options['headerMenu1_sortOrder'] = $_POST['headerMenu1_sortOrder_pages'];
			else $options['headerMenu1_sortOrder'] = $validOptions[0];
		} elseif ($options['headerMenu1_display']=='categories') {
			//Menu 1 sorting for CATEGORIES
			$validOptions = array('name', 'ID', 'count', 'slug');
			if ( in_array($_POST['headerMenu1_sortBy_categories'], $validOptions) ) $options['headerMenu1_sortBy'] = $_POST['headerMenu1_sortBy_categories'];
			else $options['headerMenu1_sortBy'] = $validOptions[0];
			//Menu 1 sorting order
			$validOptions = array('asc', 'desc');
			if ( in_array($_POST['headerMenu1_sortOrder_categories'], $validOptions) ) $options['headerMenu1_sortOrder'] = $_POST['headerMenu1_sortOrder_categories'];
			else $options['headerMenu1_sortOrder'] = $validOptions[0];
		}

		//Menu 1 show
		if ($_POST['headerMenu1_show']) $options['headerMenu1_show'] = true;
		else $options['headerMenu1_show'] = false;

		//Menu 1 alignment
		$validOptions = array('right', 'left');
		if ( in_array($_POST['headerMenu1_alignment'], $validOptions) ) $options['headerMenu1_alignment'] = $_POST['headerMenu1_alignment'];
		else $options['headerMenu1_alignment'] = $validOptions[0];
		
		// Menu 1 - Disable Parent Page Links in
		if ($_POST['headerMenu1_disableParentPageLink']) $options['headerMenu1_disableParentPageLink'] = true;
		else $options['headerMenu1_disableParentPageLink'] = false;
		
		// Menu 1 - Exclude items
		if($_POST['headerMenu1_exclude_categories']) {
			$options['headerMenu1_exclude_categories'] = implode(',', $_POST['headerMenu1_exclude_categories']);
		} else $options['headerMenu1_exclude_categories'] = '';

		if($_POST['headerMenu1_exclude_pages']) {
			$options['headerMenu1_exclude_pages'] = implode(',', $_POST['headerMenu1_exclude_pages']);
		} else $options['headerMenu1_exclude_pages'] = '';
		
		
		//Menu 2 show
		if ($_POST['headerMenu2_show']) $options['headerMenu2_show'] = true;
		else $options['headerMenu2_show'] = false;
		
		//Menu 2 dropdown
		$validOptions = array('1', '2', '3');
		if ( in_array($_POST['headerMenu2_dropdown'], $validOptions) ) $options['headerMenu2_dropdown'] = $_POST['headerMenu2_dropdown'];
		else $options['headerMenu2_dropdown'] = '3';

		//Menu 2 display
		$validOptions = array('pages', 'categories');
		if ( in_array($_POST['headerMenu2_display'], $validOptions) ) $options['headerMenu2_display'] = $_POST['headerMenu2_display'];
		else $options['headerMenu2_display'] = 'pages';

		if ($options['headerMenu2_display']=='pages') {
			//Menu 2 sorting for PAGES
			$validOptions = array('post_title', 'ID', 'post_name', 'menu_order');
			if ( in_array($_POST['headerMenu2_sortBy_pages'], $validOptions) ) $options['headerMenu2_sortBy'] = $_POST['headerMenu2_sortBy_pages'];
			else $options['headerMenu2_sortBy'] = $validOptions[0];
			//Menu 2 sorting order
			$validOptions = array('asc', 'desc');
			if ( in_array($_POST['headerMenu2_sortOrder_pages'], $validOptions) ) $options['headerMenu2_sortOrder'] = $_POST['headerMenu2_sortOrder_pages'];
			else $options['headerMenu2_sortOrder'] = $validOptions[0];
		} elseif ($options['headerMenu2_display']=='categories') {
			//Menu 2 sorting for CATEGORIES
			$validOptions = array('name', 'ID', 'count', 'slug');
			if ( in_array($_POST['headerMenu2_sortBy_categories'], $validOptions) ) $options['headerMenu2_sortBy'] = $_POST['headerMenu2_sortBy_categories'];
			else $options['headerMenu2_sortBy'] = $validOptions[0];
			//Menu 2 sorting order
			$validOptions = array('asc', 'desc');
			if ( in_array($_POST['headerMenu2_sortOrder_categories'], $validOptions) ) $options['headerMenu2_sortOrder'] = $_POST['headerMenu2_sortOrder_categories'];
			else $options['headerMenu2_sortOrder'] = $validOptions[0];
		}
		
		//Menu 2 Home Icon
		if ($_POST['headerMenu2_displayHomeButton']) $options['headerMenu2_displayHomeButton'] = true;
		else $options['headerMenu2_displayHomeButton'] = false;

		//Menu 2 Home Icon
		if ($_POST['headerMenu2_displaySeparators']) $options['headerMenu2_displaySeparators'] = true;
		else $options['headerMenu2_displaySeparators'] = false;
		
		// Menu 2 - Disable Parent Page Links in
		if ($_POST['headerMenu2_disableParentPageLink']) $options['headerMenu2_disableParentPageLink'] = true;
		else $options['headerMenu2_disableParentPageLink'] = false;

		
		// Menu 2 - Exclude items
		if($_POST['headerMenu2_exclude_categories']) {
			$options['headerMenu2_exclude_categories'] = implode(',', $_POST['headerMenu2_exclude_categories']);
		} else $options['headerMenu2_exclude_categories'] = '';

		if($_POST['headerMenu2_exclude_pages']) {
			$options['headerMenu2_exclude_pages'] = implode(',', $_POST['headerMenu2_exclude_pages']);
		} else $options['headerMenu2_exclude_pages'] = '';


		//Header Image
		$validOptions = array('lightBlue', 'darkBlue', 'khaki', 'seaGreen', 'lightRed');
		if ( in_array($_POST['headerImage'], $validOptions) ) $options['headerImage'] = $_POST['headerImage'];
		else $options['headerImage'] = $validOptions[0];


		//Comment display
		$validOptions = array('alt', 'left', 'right');
		if ( in_array($_POST['commentDisplay'], $validOptions) ) $options['commentDisplay'] = $_POST['commentDisplay'];
		else $options['commentDisplay'] = 'alt';

		// Comment display
		if ($_POST['comments_hideWhenDisabledOnPages']) $options['comments_hideWhenDisabledOnPages'] = true;
		else $options['comments_hideWhenDisabledOnPages'] = false;

		if ($_POST['comments_hideWhenDisabledOnPosts']) $options['comments_hideWhenDisabledOnPosts'] = true;
		else $options['comments_hideWhenDisabledOnPosts'] = false;
		
		if ($_POST['trackbacks_hideWhenDisabledOnPages']) $options['trackbacks_hideWhenDisabledOnPages'] = true;
		else $options['trackbacks_hideWhenDisabledOnPages'] = false;

		if ($_POST['trackbacks_hideWhenDisabledOnPosts']) $options['trackbacks_hideWhenDisabledOnPosts'] = true;
		else $options['trackbacks_hideWhenDisabledOnPosts'] = false;

		//Footer style
		$validOptions = array('style1', 'style2');
		if ( in_array($_POST['footerStyle'], $validOptions) ) $options['footerStyle'] = $_POST['footerStyle'];
		else $options['footerStyle'] = 'style1';

		//Comment date format
		$validOptions = array('timePassed', 'date');
		if ( in_array($_POST['commentDateFormat'], $validOptions) ) $options['commentDateFormat'] = $_POST['commentDateFormat'];
		else $options['commentDateFormat'] = 'timePassed';

		//Append to page title
		$validOptions = array('blogName', 'custom');
		if ( in_array($_POST['appendToPageTitle'], $validOptions) ) $options['appendToPageTitle'] = $_POST['appendToPageTitle'];
		else $options['appendToPageTitle'] = 'blogName';
		
		if ($_POST['appendToPageTitle']=='custom') {
			$options['appendToPageTitleCustom'] = $_POST['appendToPageTitleCustom'];
		}

		//Sidebar display
		$validOptions = array('right', 'left', 'none');
		if ( in_array($_POST['sidebarDisplay'], $validOptions) ) $options['sidebarDisplay'] = $_POST['sidebarDisplay'];
		else $options['sidebarDisplay'] = $validOptions[0];
		
		// Whether or not to show the default bars (if no widget bars are defined)
		if ($_POST['sidebar_showDefault']) $options['sidebar_showDefault'] = true;
		else $options['sidebar_showDefault'] = false;
		
		// Sidebar: RSS Button
		if ($_POST['sidebar_showRSSButton']) $options['sidebar_showRSSButton'] = true;
		else $options['sidebar_showRSSButton'] = false;
		
		// Sidebar: Twitter Button
		if ($_POST['sidebar_showTwitterButton']) {
			$twitterURL = trim($_POST['sidebar_twitterURL']);
			$options['sidebar_showTwitterButton'] = true;
			if ( !preg_match('/twitter\.com/i', $twitterURL) ) {
				if(!preg_match('/\.com/i', $twitterURL)) {
					//Add the twitter host name
					$twitterURL = "http://twitter.com/" . $twitterURL;
				} else {
					$options['sidebar_showTwitterButton'] = false;
					$twitterURL = "";
				}
			} elseif ( !preg_match('/http[s]?\:\/\//i', $twitterURL) ) {
				$twitterURL = "http://" . $twitterURL;
			} elseif ( empty($twitterURL) ) {
				$options['sidebar_showTwitterButton'] = false;
			}
			$options['sidebar_twitterURL'] = $twitterURL;
		} else $options['sidebar_showTwitterButton'] = false;
		
		// Sidebar: Facebook Button
		if ($_POST['sidebar_showFacebookButton']) {
			$facebookURL = trim($_POST['sidebar_facebookURL']);
			$options['sidebar_showFacebookButton'] = true;
			
			if ( empty($facebookURL) ) {
				$options['sidebar_showFacebookButton'] = false;
			} elseif ( !preg_match('/facebook\./i', $facebookURL) ) {
					$twitterURL = "http://facebook.com/" . $facebookURL;
			} elseif ( !preg_match('/http[s]?\:\/\//i', $facebookURL) ) {
				$facebookURL = "http://" . $facebookURL;
			}
			$options['sidebar_facebookURL'] = $facebookURL;
		} else $options['sidebar_showFacebookButton'] = false;

		if ($_POST['sidebar_displayButtonTexts']) $options['sidebar_displayButtonTexts'] = true;
		else $options['sidebar_displayButtonTexts'] = false;


		//Sidebar Width
		$validOptions = array('normal', 'small', 'large');
		if ( in_array($_POST['sidebarWidth'], $validOptions) ) $options['sidebarWidth'] = $_POST['sidebarWidth'];
		else $options['sidebarWidth'] = $validOptions[0];
		
		// Posts, Show Author
		if ($_POST['postsShowAuthor']) $options['postsShowAuthor'] = true;
		else $options['postsShowAuthor'] = false;
		
		// Posts, Show Time
		if ($_POST['postsShowTime']) $options['postsShowTime'] = true;
		else $options['postsShowTime'] = false;
		
		if ($_POST['pages_showInfoBar']) $options['pages_showInfoBar'] = true;
		else $options['pages_showInfoBar'] = false;
		
		//Navigation links to previous and next posts
		if ($_POST['posts_showTopPostLinks']) $options['posts_showTopPostLinks'] = true;
		else $options['posts_showTopPostLinks'] = false;
		
		if ($_POST['posts_showBottomPostLinks']) $options['posts_showBottomPostLinks'] = true;
		else $options['posts_showBottomPostLinks'] = false;
		
		if ($_POST['pagination']=='1') {
			$options['pagination'] = true;
			
			$validOptions = array(1,2,3,4,5);
			if ( in_array($_POST['pagination_pageRange'], $validOptions) ) $options['pagination_pageRange'] = $_POST['pagination_pageRange'];
			else $options['pagination_pageRange'] = 3;

			$validOptions = array(1,2,3);
			if ( in_array($_POST['pagination_pageAnchors'], $validOptions) ) $options['pagination_pageAnchors'] = $_POST['pagination_pageAnchors'];
			else $options['pagination_pageAnchors'] = 1;
			
			$validOptions = array(1,2,3);
			if ( in_array($_POST['pagination_pageGap'], $validOptions) ) $options['pagination_pageGap'] = $_POST['pagination_pageGap'];
			else $options['pagination_pageGap'] = 1;
			
		} else $options['pagination'] = false;
		
		//Custom CSS
		if ($_POST['customCSS']) {
			if (trim($_POST['customCSS_input'])) {
				$options['customCSS'] = true;
				$input = trim($_POST['customCSS_input']);
				$options['customCSS_input'] = $input;
			} else {
				$options['customCSS'] = false;
				$options['customCSS_input'] = '';
			}
		} else $options['customCSS'] = false;
		
		
		//Background Styles
		
		if ($_POST['backgroundStyle'] == '') {
			$options['background_style'] = '';
			$options['background_color'] = $_POST['backgroundColor'];
			$options['solidBackground_buttonStyle'] = $_POST['backgroundButtonStyle'];
		} else {
			$validOptions = array('gradient_blueish', 'gradient_gray', 'gradient_gray_reverse', 'gradient_khaki');
			if ( in_array($_POST['backgroundStyle'], $validOptions) )
				$options['background_style'] = $_POST['backgroundStyle'];
			else $options['background_style'] = 'gradient_blueish';
		}
		
		//Index Pages
		if ($_POST['archives_includeTags']) $options['archives_includeTags'] = true;
		else $options['archives_includeTags'] = false;
		
		if ($_POST['archives_includeCategories']) $options['archives_includeCategories'] = true;
		else $options['archives_includeCategories'] = false;
		
		//Excerpts
		if ($_POST['excerpts_index']) $options['excerpts_index'] = true;
		else $options['excerpts_index'] = false;
		
		if ($_POST['excerpts_categoryPages']) $options['excerpts_categoryPages'] = true;
		else $options['excerpts_categoryPages'] = false;
		
		if ($_POST['excerpts_archivePages']) $options['excerpts_archivePages'] = true;
		else $options['excerpts_archivePages'] = false;
		
		if ($_POST['excerpts_searchPages']) $options['excerpts_searchPages'] = true;
		else $options['excerpts_searchPages'] = false;
		
		//Logo
		if($_FILES['headerLogo']['type']) {
			if(!eregi('image/', $_FILES['headerLogo']['type'])) {
				//catch error
				$formErrors['headerLogo'] = __('The uploaded file is not a valid image. Only JPEG, PNG and GIF is supported.', 'Arjuna');
			} else {
				// check if valid image
				$info = getimagesize($_FILES['headerLogo']['tmp_name']);
				$supportedMimeTypes = array('image/gif', 'image/jpeg', 'image/png');
				if(!$info || !in_array($info['mime'], $supportedMimeTypes)) {
					//catch error
					$formErrors['headerLogo'] = __('The uploaded file is not a valid image. Only JPEG, PNG and GIF is supported.', 'Arjuna');
				} else {
					list($width, $height) = $info;
					$path = arjuna_get_upload_directory() . '/' . $_FILES['headerLogo']['name'];
					move_uploaded_file($_FILES['headerLogo']['tmp_name'], $path);
					$options['headerLogo'] = arjuna_get_upload_url() . '/' . $_FILES['headerLogo']['name'];
					$options['headerLogo_width'] = $width;
					$options['headerLogo_height'] = $height;
				}
			}
		}
		
		//Javascript menus
		if ($_POST['headerMenus_enableJavaScript']) $options['headerMenus_enableJavaScript'] = true;
		else $options['headerMenus_enableJavaScript'] = false;
		
		//IE6 Notice
		if ($_POST['miscellaneous_IE6Notice']) $options['miscellaneous_IE6Notice'] = true;
		else $options['miscellaneous_IE6Notice'] = false;
		
		
		update_option('arjuna_options', $options);
		$optionsSaved = true;
	}
	
	if(isset($_POST['removeLogo'])) {
		$options = arjuna_create_options();
		
		$options['headerLogo'] = '';
		$options['headerLogo_width'] = 0;
		$options['headerLogo_height'] = 0;
		
		update_option('arjuna_options', $options);
		$optionsSaved = true;
	}
	
	add_theme_page(__('Arjuna Options', 'Arjuna'), __('Arjuna Options', 'Arjuna'), 'edit_themes', basename(__FILE__), 'arjuna_add_theme_page');
}

function arjuna_admin_is_panel_open($ID) {
	if(!isset($_SESSION['arjunaAdminPanels']))
		return false;
	if(!isset($_SESSION['arjunaAdminPanels'][$ID]))
		return false;
	if($_SESSION['arjunaAdminPanels'][$ID])
		return true;
}


function arjuna_add_theme_page () {
	global $optionsSaved, $formErrors;

	$options = arjuna_get_options();
	
	if ( $optionsSaved )
		echo '<div id="message" class="updated fade"><p><strong>'.__('The Arjuna options have been saved.', 'Arjuna').'</strong></p></div>';
?>
<input type="hidden" id="arjuna_themeURL" value="<?php bloginfo('template_directory'); ?>" />
<form action="#" method="post" name="arjuna_form" id="arjuna_update_theme" enctype="multipart/form-data">
	<div class="wrap">
		<h2><?php _e('Arjuna Theme Options', 'Arjuna'); ?></h2>
		
		<div class="tSRSIntro">
			<div class="tTop">
			<?php printf(__('Thank you for using Arjuna, the free WordPress theme designed by %s.', 'Arjuna'), '<a href="http://www.srssolutions.com/en/" class="tSRS">SRS Solutions</a>'); ?>
			<div class="tTwitter">
				<a href="http://www.twitter.com/srssolutions"><?php _e('Follow Us', 'Arjuna'); ?></a>
				to receive news, updates, and more.
			</div>
			<div class="logo"></div>
			</div>
			<div class="tMid">
				<div class="tReportBugs">
					<h5><?php _e('Report Bugs', 'Arjuna'); ?></h5>
					<a href="http://www.srssolutions.com/en/downloads/bug_report"><?php _e('Report a Bug', 'Arjuna'); ?></a> &mdash; <?php _e('Please include your Wordpress version, browser details and a screenshot, if necessary.', 'Arjuna'); ?>
				</div>
				<ul class="tUsefulLinks">
					<h5><?php _e('Useful Links', 'Arjuna'); ?></h5>
					<li><a href="http://www.srssolutions.com/en/downloads/arjuna_wordpress_theme#changelog"><?php _e('Changelog', 'Arjuna'); ?></a></li>
					<li><a href="http://www.srssolutions.com/en/downloads/arjuna_wordpress_theme#faq"><?php _e('FAQ', 'Arjuna'); ?></a></li>
					<li><a href="http://www.srssolutions.com/en/downloads/arjuna_wordpress_theme#roadmap"><?php _e('Roadmap', 'Arjuna'); ?></a></li>
					<li><a href="http://www.srssolutions.com/en/downloads/arjuna_wordpress_theme#comments"><?php _e('Leave Feedback', 'Arjuna'); ?></a></li>
				</ul>
				<div class="tSupport">
					<h5><?php _e('Support &amp; Sales', 'Arjuna'); ?></h5>
					<a href="http://www.srssolutions.com/en/contact/rfq"><?php _e('Contact Sales', 'Arjuna'); ?></a> &mdash; <?php _e('Need installation or integration support? Need something customized or extended?', 'Arjuna'); ?>
				</div>
			</div>
			<div class="tBottom">
				<?php /* <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=GV5N8DN6XR6PY"><img src="https://www.paypal.com/<?php if(defined('WPLANG') && WPLANG != '') print WPLANG; else print 'en_US'; ?>/i/btn/btn_donate_SM.gif" /></a> */ ?>
				<span><?php _e('Arjuna is completely free. Therefore, please understand that we do NOT offer free support. If you require support of any kind other than fixing a bug that is related to Arjuna, please request a quote from us.', 'Arjuna'); ?></span>
			</div>
		</div>
		
		<?php
		if(!empty($formErrors))
			print '<div class="error">';
			foreach($formErrors as $error)
				print '<p>'.$error.'</p>';
			print '</div>';
		?>
		
		<h3><?php _e('General Blog Appearance', 'Arjuna'); ?></h3>
		
		<div self:ID="logo" class="srsContainer<?php if(!arjuna_admin_is_panel_open('logo')) print ' srsContainerClosed'; ?>">
			<h4 class="title"><span><?php _e('Logo', 'Arjuna'); ?></span></h4>
			<div class="inside">
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><?php _e('Header Logo', 'Arjuna'); ?></th>
							<td>
							<?php if(is_writable(arjuna_get_upload_directory())): ?>
								<input type="file" name="headerLogo" id="headerLogo" />
								<?php if($options['headerLogo']): ?>
									<div class="logoPreview"><img src="<?php print $options['headerLogo']; ?>" /></div>
									<input type="submit" name="removeLogo" value="Remove Logo" />
								<?php endif; ?>
								<br /><span class="description"><?php printf(__('The custom logo will be included in the header, aligned to the left and vertically centered.', 'Arjuna'), arjuna_get_upload_directory());?></span>
							<?php else: ?>
								<span class="description"><?php printf(__('You do not have write permissions for the upload directory %s. Please check with your webmaster or host to set write permissions for this directory.', 'Arjuna'), arjuna_get_upload_directory());?></span>
							<?php endif; ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="bottom"><span></span></div>
		</div>
		
		<div self:ID="firstHeaderMenu" class="srsContainer<?php if(!arjuna_admin_is_panel_open('firstHeaderMenu')) print ' srsContainerClosed'; ?>">
			<h4 class="title"><span><div class="tIcon" id="icon-firstMenu"></div><?php _e('First Header Menu', 'Arjuna'); ?></span></h4>
			<div class="inside">
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><?php _e('Enabled', 'Arjuna'); ?></th>
							<td>
								<label><input name="headerMenu1_show" type="checkbox"<?php if($options['headerMenu1_show']) echo ' checked="checked"'; ?> /> <?php _e('Enable this menu', 'Arjuna'); ?></label>
								<br />
								<span class="description"><?php _e('If disabled, the menu will be hidden.', 'Arjuna');?></span>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><?php _e('Dropdown', 'Arjuna'); ?></th>
							<td>
								<label>
									<input name="headerMenu1_dropdown" type="radio" value="1"<?php if($options['headerMenu1_dropdown']=='1') echo ' checked="checked"'; ?> />
									 <?php _e('No dropdown menu', 'Arjuna'); ?>
								</label><br />
								<label>
									<input name="headerMenu1_dropdown" type="radio" value="2"<?php if($options['headerMenu1_dropdown']=='2') echo ' checked="checked"'; ?> />
									 <?php _e('One-level dropdown menu', 'Arjuna'); ?>
								</label><br />
								<label>
									<input name="headerMenu1_dropdown" type="radio" value="3"<?php if($options['headerMenu1_dropdown']=='3') echo ' checked="checked"'; ?> />
									 <?php _e('Two-level dropdown menu', 'Arjuna'); ?>
								</label>
							</td>
						<tr valign="top">
							<th scope="row"><?php _e('Alignment', 'Arjuna'); ?></th>
							<td>
								<div class="tALeft"><label>
									<input name="headerMenu1_alignment" type="radio" value="left"<?php if($options['headerMenu1_alignment']=='left') echo ' checked="checked"'; ?> />
									 <?php _e('Left', 'Arjuna'); ?>
								</label></div>
								<div class="tALeft"><label>
									<input name="headerMenu1_alignment" type="radio" value="right"<?php if($options['headerMenu1_alignment']=='right') echo ' checked="checked"'; ?> />
									 <?php _e('Right', 'Arjuna'); ?>
								</label></div>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><?php _e('Menu lists only', 'Arjuna'); ?></th>
							<td>
								<div class="tALeft"><label>
									<input name="headerMenu1_display" type="radio" onclick="headerMenu1_tD(this);" value="pages"<?php if($options['headerMenu1_display']=='pages') echo ' checked="checked"'; ?> />
									 <?php _e('Pages', 'Arjuna'); ?>
								</label></div>
								<div class="tALeft"><label>
									<input name="headerMenu1_display" type="radio" onclick="headerMenu1_tD(this);" value="categories"<?php if($options['headerMenu1_display']=='categories') echo ' checked="checked"'; ?> />
									 <?php _e('Categories', 'Arjuna'); ?>
								</label></div>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><?php _e('Sorting Order', 'Arjuna'); ?></th>
							<td>
								<div id="headerMenu1_sortBy_categories"<?php if($options['headerMenu1_display']=='pages'): ?> style="display:none;"<?php endif; ?>>
								<?php _e('Sort menu items in', 'Arjuna'); ?> 
								<select name="headerMenu1_sortOrder_categories">
									<option value="asc"<?php if($options['headerMenu1_sortOrder']=='asc'): ?> selected="selected"<?php endif; ?>><?php _e('ascending', 'Arjuna'); ?></option>
									<option value="desc"<?php if($options['headerMenu1_sortOrder']=='desc'): ?> selected="selected"<?php endif; ?>><?php _e('descending', 'Arjuna'); ?></option>
								</select>
								<?php _e('order by', 'Arjuna'); ?>
								<select name="headerMenu1_sortBy_categories">
									<option value="name"<?php if($options['headerMenu1_sortBy']=='name'): ?> selected="selected"<?php endif; ?>><?php _e('Category Name', 'Arjuna'); ?></option>
									<option value="ID"<?php if($options['headerMenu1_sortBy']=='ID'): ?> selected="selected"<?php endif; ?>><?php _e('Category ID', 'Arjuna'); ?></option>
									<option value="count"<?php if($options['headerMenu1_sortBy']=='count'): ?> selected="selected"<?php endif; ?>><?php _e('Post Count', 'Arjuna'); ?></option>
									<option value="slug"<?php if($options['headerMenu1_sortBy']=='slug'): ?> selected="selected"<?php endif; ?>><?php _e('Category Slug', 'Arjuna'); ?></option>
								</select>
								</div>
								<div id="headerMenu1_sortBy_pages"<?php if($options['headerMenu1_display']=='categories'): ?> style="display:none;"<?php endif; ?>>
								<?php _e('Sort menu items in', 'Arjuna'); ?> 
								<select name="headerMenu1_sortOrder_pages">
									<option value="asc"<?php if($options['headerMenu1_sortOrder']=='asc'): ?> selected="selected"<?php endif; ?>><?php _e('ascending', 'Arjuna'); ?></option>
									<option value="desc"<?php if($options['headerMenu1_sortOrder']=='desc'): ?> selected="selected"<?php endif; ?>><?php _e('descending', 'Arjuna'); ?></option>
								</select>
								<?php _e('order by', 'Arjuna'); ?>
								<select name="headerMenu1_sortBy_pages">
									<option value="post_title"<?php if($options['headerMenu1_sortBy']=='post_title'): ?> selected="selected"<?php endif; ?>><?php _e('Page Title', 'Arjuna'); ?></option>
									<option value="ID"<?php if($options['headerMenu1_sortBy']=='ID'): ?> selected="selected"<?php endif; ?>><?php _e('Page ID', 'Arjuna'); ?></option>
									<option value="post_name"<?php if($options['headerMenu1_sortBy']=='post_name'): ?> selected="selected"<?php endif; ?>><?php _e('Page Slug', 'Arjuna'); ?></option>
									<option value="menu_order"<?php if($options['headerMenu1_sortBy']=='menu_order'): ?> selected="selected"<?php endif; ?>><?php _e('Page Order', 'Arjuna'); ?></option>
								</select>
								</div>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><?php _e('Menu Items', 'Arjuna'); ?></th>
							<td>
							<div id="headerMenu1_include_categories"<?php if($options['headerMenu1_display']=='pages'): ?> style="display:none;"<?php endif; ?>>
								<?php _e('Include categories', 'Arjuna'); ?><br />
								<?php
								$categories = arjuna_get_all_categories($options['headerMenu1_exclude_categories'], '', $options['headerMenu1_dropdown']);
								?>
								<select multiple="multiple" size="7" name="headerMenu1_include_categories[]" id="hm1ic" style="height:auto;width:400px; padding-right:20px;">
									<?php arjuna_admin_walk_categories($categories); ?>
								</select>
								<div class="tArrows">
									<a href="#" class="tArrowUp" id="hm1ic_up"></a><a href="#" class="tArrowDown" id="hm1ic_down"></a>
								</div>
								<?php _e('Exclude categories', 'Arjuna'); ?><br />
								<?php
								$categories = arjuna_get_all_categories('', $options['headerMenu1_exclude_categories'], $options['headerMenu1_dropdown']);
								?>
								<select multiple="multiple" size="7" name="headerMenu1_exclude_categories[]" id="hm1ec" style="height:auto;width:400px; padding-right:20px;">
									<?php if(!empty($options['headerMenu1_exclude_categories'])) arjuna_admin_walk_categories($categories); ?>
								</select>
								<span class="description"><?php _e('Note: While the above fields show empty categories, the theme will only display categories that have at least one published post in them.', 'Arjuna'); ?></span>
							</div>
							<div id="headerMenu1_include_pages"<?php if($options['headerMenu1_display']!='pages'): ?> style="display:none;"<?php endif; ?>>
								<?php _e('Include pages', 'Arjuna'); ?><br />
								<?php
								$pages = arjuna_get_all_pages($options['headerMenu1_exclude_pages'], '', $options['headerMenu1_dropdown']);
								?>
								<select multiple="multiple" size="7" name="headerMenu1_include_pages[]" id="hm1ip" style="height:auto;width:400px; padding-right:20px;">
									<?php arjuna_admin_walk_pages($pages); ?>
								</select>
								<div class="tArrows">
									<a href="#" class="tArrowUp" id="hm1ip_up"></a><a href="#" class="tArrowDown" id="hm1ip_down"></a>
								</div>
								<?php _e('Exclude pages', 'Arjuna'); ?><br />
								<?php
								$pages = arjuna_get_all_pages('', $options['headerMenu1_exclude_pages'], $options['headerMenu1_dropdown']);
								?>
								<select multiple="multiple" size="7" name="headerMenu1_exclude_pages[]" id="hm1ep" style="height:auto;width:400px; padding-right:20px;">
									<?php if(!empty($options['headerMenu1_exclude_pages'])) arjuna_admin_walk_pages($pages); ?>
								</select>
							</div>
							</td>
						</tr>
						<?php /*
						<tr id="headerMenu1_disableParentPageLink_pages"<?php if($options['headerMenu1_display']!='pages'): ?> style="display:none;"<?php endif; ?>>
							<th scope="row"><?php _e('Parent Page Links', 'Arjuna'); ?></th>
							<td>
								<label><input name="headerMenu1_disableParentPageLink" type="checkbox"<?php if($options['headerMenu1_disableParentPageLink']) echo ' checked="checked"'; ?> /> <?php _e('Disable hyperlinking of parent page items.', 'Arjuna'); ?></label>
								<br />
								<span class="description"><?php _e('If checked, the menu\'s "zero level" items will not be linked to their respective permalinks. This is especially useful if you use a dropdown menu for each page item and you don\' want your users to be able to click on the parent page items.', 'Arjuna');?></span>
							</td>
						</tr>
						*/ ?>
					</tbody>
				</table>
				
			</div>
			<div class="bottom"><span></span></div>
		</div>
		
		<div self:ID="secondHeaderMenu" class="srsContainer<?php if(!arjuna_admin_is_panel_open('secondHeaderMenu')) print ' srsContainerClosed'; ?>">
			<h4 class="title"><span><div class="tIcon" id="icon-secondMenu"></div><?php _e('Second Header Menu', 'Arjuna'); ?></span></h4>
			<div class="inside">
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><?php _e('Enabled', 'Arjuna'); ?></th>
							<td>
								<label><input name="headerMenu2_show" type="checkbox"<?php if($options['headerMenu2_show']) echo ' checked="checked"'; ?> /> <?php _e('Enable this menu', 'Arjuna'); ?></label>
								<br />
								<span class="description"><?php _e('If disabled, the menu will be hidden.', 'Arjuna');?></span>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Separators', 'Arjuna'); ?></th>
							<td>
								<label><input name="headerMenu2_displaySeparators" type="checkbox"<?php if($options['headerMenu2_displaySeparators']) echo ' checked="checked"'; ?> /> <?php _e('Visually separate the menu buttons', 'Arjuna'); ?></label>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><?php _e('Dropdown', 'Arjuna'); ?></th>
							<td>
								<label>
									<input name="headerMenu2_dropdown" type="radio" value="1"<?php if($options['headerMenu2_dropdown']=='1') echo ' checked="checked"'; ?> />
									 <?php _e('No dropdown menu', 'Arjuna'); ?>
								</label><br />
								<label>
									<input name="headerMenu2_dropdown" type="radio" value="2"<?php if($options['headerMenu2_dropdown']=='2') echo ' checked="checked"'; ?> />
									 <?php _e('One-level dropdown menu', 'Arjuna'); ?>
								</label><br />
								<label>
									<input name="headerMenu2_dropdown" type="radio" value="3"<?php if($options['headerMenu2_dropdown']=='3') echo ' checked="checked"'; ?> />
									 <?php _e('Two-level dropdown menu', 'Arjuna'); ?>
								</label>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><?php _e('Menu lists only', 'Arjuna'); ?></th>
							<td>
								<div class="tALeft"><label>
									<input name="headerMenu2_display" type="radio" onclick="headerMenu2_tD(this);" value="pages"<?php if($options['headerMenu2_display']=='pages') echo ' checked="checked"'; ?> />
									 <?php _e('Pages', 'Arjuna'); ?>
								</label></div>
								<div class="tALeft"><label>
									<input name="headerMenu2_display" type="radio" onclick="headerMenu2_tD(this);" value="categories"<?php if($options['headerMenu2_display']=='categories') echo ' checked="checked"'; ?> />
									 <?php _e('Categories', 'Arjuna'); ?>
								</label></div>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><?php _e('Sorting Order', 'Arjuna'); ?></th>
							<td>
								<div id="headerMenu2_sortBy_categories"<?php if($options['headerMenu2_display']=='pages'): ?> style="display:none;"<?php endif; ?>>
								<?php _e('Sort menu items in', 'Arjuna'); ?> 
								<select name="headerMenu2_sortOrder_categories">
									<option value="asc"<?php if($options['headerMenu2_sortOrder']=='asc'): ?> selected="selected"<?php endif; ?>><?php _e('ascending', 'Arjuna'); ?></option>
									<option value="desc"<?php if($options['headerMenu2_sortOrder']=='desc'): ?> selected="selected"<?php endif; ?>><?php _e('descending', 'Arjuna'); ?></option>
								</select>
								<?php _e('order by', 'Arjuna'); ?>
								<select name="headerMenu2_sortBy_categories">
									<option value="name"<?php if($options['headerMenu2_sortBy']=='name'): ?> selected="selected"<?php endif; ?>><?php _e('Category Name', 'Arjuna'); ?></option>
									<option value="ID"<?php if($options['headerMenu2_sortBy']=='ID'): ?> selected="selected"<?php endif; ?>><?php _e('Category ID', 'Arjuna'); ?></option>
									<option value="count"<?php if($options['headerMenu2_sortBy']=='count'): ?> selected="selected"<?php endif; ?>><?php _e('Post Count', 'Arjuna'); ?></option>
									<option value="slug"<?php if($options['headerMenu2_sortBy']=='slug'): ?> selected="selected"<?php endif; ?>><?php _e('Category Slug', 'Arjuna'); ?></option>
								</select>
								</div>
								<div id="headerMenu2_sortBy_pages"<?php if($options['headerMenu2_display']=='categories'): ?> style="display:none;"<?php endif; ?>>
								<?php _e('Sort menu items in', 'Arjuna'); ?> 
								<select name="headerMenu2_sortOrder_pages">
									<option value="asc"<?php if($options['headerMenu2_sortOrder']=='asc'): ?> selected="selected"<?php endif; ?>><?php _e('ascending', 'Arjuna'); ?></option>
									<option value="desc"<?php if($options['headerMenu2_sortOrder']=='desc'): ?> selected="selected"<?php endif; ?>><?php _e('descending', 'Arjuna'); ?></option>
								</select>
								<?php _e('order by', 'Arjuna'); ?>
								<select name="headerMenu2_sortBy_pages">
									<option value="post_title"<?php if($options['headerMenu2_sortBy']=='post_title'): ?> selected="selected"<?php endif; ?>><?php _e('Page Title', 'Arjuna'); ?></option>
									<option value="ID"<?php if($options['headerMenu2_sortBy']=='ID'): ?> selected="selected"<?php endif; ?>><?php _e('Page ID', 'Arjuna'); ?></option>
									<option value="post_name"<?php if($options['headerMenu2_sortBy']=='post_name'): ?> selected="selected"<?php endif; ?>><?php _e('Page Slug', 'Arjuna'); ?></option>
									<option value="menu_order"<?php if($options['headerMenu2_sortBy']=='menu_order'): ?> selected="selected"<?php endif; ?>><?php _e('Page Order', 'Arjuna'); ?></option>
								</select>
								</div>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Home Button', 'Arjuna'); ?></th>
							<td>
								<label><input name="headerMenu2_displayHomeButton" type="checkbox"<?php if($options['headerMenu2_displayHomeButton']) echo ' checked="checked"'; ?> /> <?php _e('Display Home button', 'Arjuna'); ?></label>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><?php _e('Menu Items', 'Arjuna'); ?></th>
							<td>
							<div id="headerMenu2_include_categories"<?php if($options['headerMenu2_display']=='pages'): ?> style="display:none;"<?php endif; ?>>
								<?php _e('Include categories', 'Arjuna'); ?><br />
								<?php
								$categories = arjuna_get_all_categories($options['headerMenu2_exclude_categories'], '', $options['headerMenu2_dropdown']);
								?>
								<select multiple="multiple" size="7" name="headerMenu2_include_categories[]" id="hm2ic" style="height:auto;width:400px; padding-right:20px;">
									<?php arjuna_admin_walk_categories($categories); ?>
								</select>
								<div class="tArrows">
									<a href="#" class="tArrowUp" id="hm2ic_up"></a><a href="#" class="tArrowDown" id="hm2ic_down"></a>
								</div>
								<?php _e('Exclude categories', 'Arjuna'); ?><br />
								<?php
								$categories = arjuna_get_all_categories('', $options['headerMenu2_exclude_categories'], $options['headerMenu2_dropdown']);
								?>
								<select multiple="multiple" size="7" name="headerMenu2_exclude_categories[]" id="hm2ec" style="height:auto;width:400px; padding-right:20px;">
									<?php if(!empty($options['headerMenu2_exclude_categories'])) arjuna_admin_walk_categories($categories); ?>	
								</select>
								<span class="description"><?php _e('Note: While the above fields show empty categories, the theme will only display categories that have at least one published post in them.</span>', 'Arjuna'); ?></span>
							</div>
							<div id="headerMenu2_include_pages"<?php if($options['headerMenu2_display']!='pages'): ?> style="display:none;"<?php endif; ?>>
								<?php _e('Include pages', 'Arjuna'); ?><br />
								<?php
								$pages = arjuna_get_all_pages($options['headerMenu2_exclude_pages'], '', $options['headerMenu2_dropdown']);
								?>
								<select multiple="multiple" size="7" name="headerMenu2_include_pages[]" id="hm2ip" style="height:auto;width:400px; padding-right:20px;">
									<?php arjuna_admin_walk_pages($pages); ?>
								</select>
								<div class="tArrows">
									<a href="#" class="tArrowUp" id="hm2ip_up"></a><a href="#" class="tArrowDown" id="hm2ip_down"></a>
								</div>
								<?php _e('Exclude pages', 'Arjuna'); ?><br />
								<?php
								$pages = arjuna_get_all_pages('', $options['headerMenu2_exclude_pages'], $options['headerMenu2_dropdown']);
								?>
								<select multiple="multiple" size="7" name="headerMenu2_exclude_pages[]" id="hm2ep" style="height:auto;width:400px; padding-right:20px;">
									<?php if(!empty($options['headerMenu2_exclude_pages'])) arjuna_admin_walk_pages($pages); ?>	
								</select>
							</div>
							</td>
						</tr>
						<?php /*
						<tr id="headerMenu2_disableParentPageLink_pages"<?php if($options['headerMenu2_display']!='pages'): ?> style="display:none;"<?php endif; ?>>
							<th scope="row"><?php _e('Parent Page Links', 'Arjuna'); ?></th>
							<td>
								<label><input name="headerMenu2_disableParentPageLink" type="checkbox"<?php if($options['headerMenu2_disableParentPageLink']) echo ' checked="checked"'; ?> /> <?php _e('Disable hyperlinking of parent page items.', 'Arjuna'); ?></label>
								<br />
								<span class="description"><?php _e('If checked, the menu\'s "zero level" items will not be linked to their respective permalinks. This is especially useful if you use a dropdown menu for each page item and you don\' want your users to be able to click on the parent page items.', 'Arjuna');?></span>
							</td>
						</tr>
						*/ ?>
					</tbody>
				</table>
			</div>
			<div class="bottom"><span></span></div>
		</div>
		
		<div self:ID="background" class="srsContainer<?php if(!arjuna_admin_is_panel_open('background')) print ' srsContainerClosed'; ?>">
			<h4 class="title"><span><?php _e('Background &amp; Color Schemes', 'Arjuna'); ?></span></h4>
			<div class="inside">
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><?php _e('Background Style', 'Arjuna'); ?></th>
							<td>
								<?php 
								$versions = array(
									array('id' => 'backgroundStyle_blueish', 'value' => 'gradient_blueish', 'label' => __('Blueish gradient')),
									array('id' => 'backgroundStyle_gray', 'value' => 'gradient_gray', 'label' => __('Gray gradient')),
									array('id' => 'backgroundStyle_grayReverse', 'value' => 'gradient_gray_reverse', 'label' => __('Gray gradient (reverse)')),
									array('id' => 'backgroundStyle_khaki', 'value' => 'gradient_khaki', 'label' => __('Khaki gradient'))
								);
								foreach($versions as $version):
								?>
								<div class="tImageOptions">
									<input name="backgroundStyle" type="radio" id="<?php print $version['id']; ?>" value="<?php print $version['value']; ?>"<?php if($options['background_style']==$version['value']) echo ' checked="checked"'; ?> />
									<div class="tImage" id="icon-<?php print $version['value'];?>"></div>
									<span><label for="<?php print $version['id']; ?>"><?php print $version['label']; ?></label></span>
								</div>
								<?php endforeach; ?>
								<div class="tImageOptions" style="float:none; clear:left;">
									<input name="backgroundStyle" type="radio" id="backgroundStyle_solid" value=""<?php if($options['background_style']=='') echo ' checked="checked"'; ?> />
									<span style="margin-top:0;"><label for="backgroundStyle_solid">Solid Color:
										<div class="backgroundColor"><div id="backgroundColor_picker"><div class="inner"></div></div></div>
										<input name="backgroundColor" type="text" id="backgroundColor" value="<?php print $options['background_color']; ?>" />
										Button Style: <select name="backgroundButtonStyle" id="backgroundButtonStyle">
											<option value="default"<?php if($options['solidBackground_buttonStyle'] == 'default') print ' selected="selected"'; ?>>Default</option>
											<option value="light"<?php if($options['solidBackground_buttonStyle'] == 'light') print ' selected="selected"'; ?>>Light</option>
										</select>
									</label></span>
								</div>
								<br class="clear" /><span class="description"><?php _e('If the background is a solid color, you can choose the style of the buttons yourself.', 'Arjuna'); ?></span>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Header Image', 'Arjuna'); ?></th>
							<td>
								<table class="form-table">
									<tbody>
									<tr>
									<td>
										<div class="tImageOptions" style="float:none;overflow:hidden;">
											<input name="headerImage" type="radio" id="headerImage_lightBlue" value="lightBlue"<?php if($options['headerImage']=='lightBlue') echo ' checked="checked"'; ?> />
											<div class="tImage" id="icon-lightBlue"></div>
											<span><label for="headerImage_lightBlue"><?php _e('Light Blue', 'Arjuna'); ?></label></span>
										</div>
										<div class="tImageOptions" style="float:none;overflow:hidden;">
											<input name="headerImage" type="radio" id="headerImage_darkBlue" value="darkBlue"<?php if($options['headerImage']=='darkBlue') echo ' checked="checked"'; ?> />
											<div class="tImage" id="icon-darkBlue"></div>
											<span><label for="headerImage_darkBlue"><?php _e('Dark Blue', 'Arjuna'); ?></label></span>
										</div>
										<div class="tImageOptions" style="float:none;overflow:hidden;">
											<input name="headerImage" type="radio" id="headerImage_khaki" value="khaki"<?php if($options['headerImage']=='khaki') echo ' checked="checked"'; ?> />
											<div class="tImage" id="icon-khaki"></div>
											<span><label for="headerImage_khaki"><?php _e('Khaki', 'Arjuna'); ?></label></span>
										</div>
										<div class="tImageOptions" style="float:none;overflow:hidden;">
											<input name="headerImage" type="radio" id="headerImage_seaGreen" value="seaGreen"<?php if($options['headerImage']=='seaGreen') echo ' checked="checked"'; ?> />
											<div class="tImage" id="icon-seaGreen"></div>
											<span><label for="headerImage_seaGreen"><?php _e('Sea Green', 'Arjuna'); ?></label></span>
										</div>
										<div class="tImageOptions" style="float:none;overflow:hidden;">
											<input name="headerImage" type="radio" id="headerImage_lightRed" value="lightRed"<?php if($options['headerImage']=='lightRed') echo ' checked="checked"'; ?> />
											<div class="tImage" id="icon-lightRed"></div>
											<span><label for="headerImage_lightRed"><?php _e('Light Red', 'Arjuna'); ?></label></span>
										</div>
									</td>
									</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Footer Style', 'Arjuna'); ?></th>
							<td>
								<div class="tImageOptions" style="float:none;overflow:hidden;">
									<input name="footerStyle" style="margin-top:12px;" type="radio" id="footerStyle_style1" value="style1"<?php if($options['footerStyle']=='style1') echo ' checked="checked"'; ?> />
									<div class="tImage" id="icon-footerStyle1"></div>
								</div>
								<div class="tImageOptions" style="float:none;overflow:hidden;">
									<input name="footerStyle" style="margin-top:8px;" type="radio" id="footerStyle_style2" value="style2"<?php if($options['footerStyle']=='style2') echo ' checked="checked"'; ?> />
									<div class="tImage <?php print $options['headerImage']; ?>" id="icon-footerStyle2"></div>
									<span style="margin-top:4px;"><label for="footerStyle_style2"><?php _e('Match Header Image', 'Arjuna'); ?></label></span>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="bottom"><span></span></div>
		</div>
		
		<div self:ID="sidebar" class="srsContainer<?php if(!arjuna_admin_is_panel_open('sidebar')) print ' srsContainerClosed'; ?>">
			<h4 class="title"><span><?php _e('Sidebar', 'Arjuna'); ?></span></h4>
			<div class="inside">
				<p class="note"><?php printf(__('Note: To see how the sidebar and its widget bars work in Arjuna, please read our %sFAQ%s.', 'Arjuna'), '<a href="http://www.srssolutions.com/en/downloads/arjuna_wordpress_theme#faq">', '</a>'); ?></p>
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><?php _e('Sidebar Position', 'Arjuna'); ?></th>
							<td>
								<div class="tImageOptions">
									<input name="sidebarDisplay" type="radio" id="sidebarDisplay_right" value="right"<?php if($options['sidebarDisplay']=='right') echo ' checked="checked"'; ?> />
									<div class="tImage" id="icon-sidebarRight"></div>
									<span><label for="sidebarDisplay_right"><?php _e('Right sidebar', 'Arjuna'); ?></label></span>
								</div>
								<div class="tImageOptions">
									<input name="sidebarDisplay" type="radio" id="sidebarDisplay_left" value="left"<?php if($options['sidebarDisplay']=='left') echo ' checked="checked"'; ?> />
									<div class="tImage" id="icon-sidebarLeft"></div>
									<span><label for="sidebarDisplay_left"><?php _e('Left sidebar', 'Arjuna'); ?></label></span>
								</div>
								<div class="tImageOptions">
									<input name="sidebarDisplay" type="radio" id="sidebarDisplay_none" value="none"<?php if($options['sidebarDisplay']=='none') echo ' checked="checked"'; ?> />
									<div class="tImage" id="icon-sidebarNone"></div>
									<span><label for="sidebarDisplay_none"><?php _e('No sidebar', 'Arjuna'); ?></label></span>
								</div>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Sidebar Width', 'Arjuna'); ?></th>
							<td>
									<div class="tALeft"><label><input name="sidebarWidth" type="radio" id="sidebarWidth_small" value="small"<?php if($options['sidebarWidth']=='small') echo ' checked="checked"'; ?> /> <?php _e('Small', 'Arjuna'); ?></label></div>
									<div class="tALeft"><label><input name="sidebarWidth" type="radio" id="sidebarWidth_normal" value="normal"<?php if($options['sidebarWidth']=='normal') echo ' checked="checked"'; ?> /> <?php _e('Normal', 'Arjuna'); ?></label></div>
									<div class="tALeft"><label><input name="sidebarWidth" type="radio" id="sidebarWidth_large" value="large"<?php if($options['sidebarWidth']=='large') echo ' checked="checked"'; ?> /> <?php _e('Large', 'Arjuna'); ?></label></div>
									<br /><span class="description"><?php _e('If you intend to use the two column sidebar, we recommend to choose either the normal or the large sidebar.', 'Arjuna'); ?></span>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Default Widgets', 'Arjuna'); ?></th>
							<td>
								<label><input name="sidebar_showDefault" type="checkbox"<?php if($options['sidebar_showDefault']) echo ' checked="checked"'; ?> /> <?php _e('Display default sidebar widgets if the widget bars are empty.', 'Arjuna'); ?></label><br />
								<span class="description"><?php _e('If enabled, the following widgets will be displayed if the widget bar is empty: <b>Sidebar Top:</b> Recent Posts and Browse by Tags, <b>Sidebar Left:</b> Categories, <b>Siderbar Right:</b> Meta', 'Arjuna'); ?></span>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('RSS Button', 'Arjuna'); ?></th>
							<td>
								<label><input name="sidebar_showRSSButton" type="checkbox"<?php if($options['sidebar_showRSSButton']) echo ' checked="checked"'; ?> /> <?php _e('Display an RSS button on the very top of the sidebar.', 'Arjuna'); ?></label>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Twitter Button', 'Arjuna'); ?></th>
							<td>
								<label><input name="sidebar_showTwitterButton" onclick="sidebar_twitterURL_switch(this)" type="checkbox"<?php if($options['sidebar_showTwitterButton']) echo ' checked="checked"'; ?> /> <?php _e('Display a Twitter button on the very top of the sidebar.', 'Arjuna'); ?></label>
								<div id="sidebar_twitterURL"<?php if(!$options['sidebar_showTwitterButton']) echo ' style="display:none;"'; ?>>
									Your Twitter URL:<input type="text" class="regular-text" name="sidebar_twitterURL" value="<?php print $options['sidebar_twitterURL'] ?>" />
								</div>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Facebook Button', 'Arjuna'); ?></th>
							<td>
								<label><input name="sidebar_showFacebookButton" onclick="sidebar_facebookURL_switch(this)" type="checkbox"<?php if($options['sidebar_showFacebookButton']) echo ' checked="checked"'; ?> /> <?php _e('Display a Facebook button on the very top of the sidebar.', 'Arjuna'); ?></label>
								<div id="sidebar_facebookURL"<?php if(!$options['sidebar_showFacebookButton']) echo ' style="display:none;"'; ?>>
									Your Facebook URL:<input type="text" class="regular-text" name="sidebar_facebookURL" value="<?php print $options['sidebar_facebookURL'] ?>" />
								</div>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Display Button Labels', 'Arjuna'); ?></th>
							<td>
								<label><input name="sidebar_displayButtonTexts" type="checkbox"<?php if($options['sidebar_displayButtonTexts']) echo ' checked="checked"'; ?> /> <?php _e('Display labels next to the buttons (RSS, Twitter and Facebook).', 'Arjuna'); ?></label>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="bottom"><span></span></div>
		</div>
		
		<h3><?php _e('General Options', 'Arjuna'); ?></h3>
		
		<div self:ID="archives" class="srsContainer<?php if(!arjuna_admin_is_panel_open('archives')) print ' srsContainerClosed'; ?>">
			<h4 class="title"><span><?php _e('Index Pages', 'Arjuna'); ?></span></h4>
			<div class="inside">
				<p class="note"><?php _e('Index pages include the homepage (unless it is static), archives, category and tag listing pages as well as search results pages. Basically any page that displays a listing of posts.'); ?></p>
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><?php _e('Display Tags', 'Arjuna'); ?></th>
							<td>
								<label><input name="archives_includeTags" type="checkbox"<?php if($options['archives_includeTags']) echo ' checked="checked"'; ?> /> <?php _e('Display the tags of a post right below each post.', 'Arjuna'); ?></label><br />
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Display Categories', 'Arjuna'); ?></th>
							<td>
								<label><input name="archives_includeCategories" type="checkbox"<?php if($options['archives_includeCategories']) echo ' checked="checked"'; ?> /> <?php _e('Display the categories of a post right below each post.', 'Arjuna'); ?></label><br />
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="bottom"><span></span></div>
		</div>
		
		<div self:ID="singlePosts" class="srsContainer<?php if(!arjuna_admin_is_panel_open('singePosts')) print ' srsContainerClosed'; ?>">
			<h4 class="title"><span><?php _e('Single Posts and Pages', 'Arjuna'); ?></span></h4>
			<div class="inside">
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><?php _e('Display Author', 'Arjuna'); ?></th>
							<td>
								<label><input name="postsShowAuthor" type="checkbox"<?php if($options['postsShowAuthor']) echo ' checked="checked"'; ?> /> <?php _e('Include the author of a post in the post header.', 'Arjuna'); ?></label><br />
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Display Time', 'Arjuna'); ?></th>
							<td>
								<label><input name="postsShowTime" type="checkbox"<?php if($options['postsShowTime']) echo ' checked="checked"'; ?> /> <?php _e('Include the time and date of when the post has been published, instead of only the date.', 'Arjuna'); ?></label><br />
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Display Info Bar for Pages', 'Arjuna'); ?></th>
							<td>
								<label><input name="pages_showInfoBar" type="checkbox"<?php if($options['pages_showInfoBar']) echo ' checked="checked"'; ?> /> <?php _e('Display the info bar right below the title of pages.', 'Arjuna'); ?></label><br />
								<span class="description"><?php _e('The info bar usually includes the author of the page, the publish date and the comments button. This options entirely hides the bar so that only the title is shown.', 'Arjuna'); ?></span>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Navigation Links', 'Arjuna'); ?></th>
							<td>
								<label><input name="posts_showTopPostLinks" type="checkbox"<?php if($options['posts_showTopPostLinks']) echo ' checked="checked"'; ?> /> <?php _e('Display links to the previous and next posts above each post.', 'Arjuna'); ?></label><br />
								<label><input name="posts_showBottomPostLinks" type="checkbox"<?php if($options['posts_showBottomPostLinks']) echo ' checked="checked"'; ?> /> <?php _e('Display links to the previous and next posts below each post.', 'Arjuna'); ?></label><br />
								<span class="description"><?php _e('Note: The links will only be shown on permalink pages, i.e. the URL where one single post/page is displayed.', 'Arjuna'); ?></span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="bottom"><span></span></div>
		</div>

		<div self:ID="comments" class="srsContainer<?php if(!arjuna_admin_is_panel_open('comments')) print ' srsContainerClosed'; ?>">
			<h4 class="title"><span><?php _e('Comments &amp; Trackbacks', 'Arjuna'); ?></span></h4>
			<div class="inside">
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><?php _e('Display comments as follows', 'Arjuna'); ?></th>
							<td>
								<div class="tImageOptions" style="float:none;overflow:hidden;">
									<input name="commentDisplay" type="radio" id="commentDisplay_left" value="left"<?php if($options['commentDisplay']=='left') echo ' checked="checked"'; ?> />
									<div class="tImage" id="icon-commentsLeft"></div>
									<span><label for="commentDisplay_left"><?php _e('Aligned to the left', 'Arjuna'); ?></label></span>
								</div>
								<div class="tImageOptions" style="float:none;overflow:hidden;">
									<input name="commentDisplay" type="radio" id="commentDisplay_right" value="right"<?php if($options['commentDisplay']=='right') echo ' checked="checked"'; ?> />
									<div class="tImage" id="icon-commentsRight"></div>
									<span><label for="commentDisplay_right"><?php _e('Aligned to the right', 'Arjuna'); ?></label></span>
								</div>
								<div class="tImageOptions" style="float:none;overflow:hidden;">
									<input name="commentDisplay" type="radio" id="commentDisplay_alt" value="none"<?php if($options['commentDisplay']=='alt') echo ' checked="checked"'; ?> />
									<div class="tImage" id="icon-commentsAlt"></div>
									<span><label for="commentDisplay_alt"><?php _e('Alternate between left and right alignment', 'Arjuna'); ?></label></span>
								</div>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Date Format', 'Arjuna'); ?></th>
							<td>
									<label><input name="commentDateFormat" type="radio" value="timePassed"<?php if($options['commentDateFormat']=='timePassed') echo ' checked="checked"'; ?> /> <?php _e('Passed Time (Example: <em>&quot;Written by admin about 3 days ago.&quot;</em>)', 'Arjuna'); ?></label><br />
									<label><input name="commentDateFormat" type="radio" value="date"<?php if($options['commentDateFormat']=='date') echo ' checked="checked"'; ?> /> <?php printf(__('Default Date Format (Example: <em>&quot;Written by admin on %s&quot;</em>)', 'Arjuna'), date(get_option('date_format'))); ?></label><br />
									<span class="description"><?php _e('The default date format can be customized in Settings &gt; General.', 'Arjuna'); ?></span>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Comment Display', 'Arjuna'); ?></th>
							<td>
								<label><input name="comments_hideWhenDisabledOnPages" type="checkbox"<?php if($options['comments_hideWhenDisabledOnPages']) echo ' checked="checked"'; ?> /> <?php _e('Hide any traces of comments when they are disabled for <strong>Pages</strong>.', 'Arjuna'); ?></label><br />
								<label><input name="comments_hideWhenDisabledOnPosts" type="checkbox"<?php if($options['comments_hideWhenDisabledOnPosts']) echo ' checked="checked"'; ?> /> <?php _e('Hide any traces of comments when they are disabled for <strong>Posts</strong>.', 'Arjuna'); ?></label><br />
								<span class="description"><?php _e('Note: If enabled, the comments tab section as well as the comment form on pages/posts will be removed.', 'Arjuna'); ?></span>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Trackback Display', 'Arjuna'); ?></th>
							<td>
								<label><input name="trackbacks_hideWhenDisabledOnPages" type="checkbox"<?php if($options['trackbacks_hideWhenDisabledOnPages']) echo ' checked="checked"'; ?> /> <?php _e('Hide any traces of trackbacks and pingbacks when they are disabled for <strong>Pages</strong>.', 'Arjuna'); ?></label><br />
								<label><input name="trackbacks_hideWhenDisabledOnPosts" type="checkbox"<?php if($options['trackbacks_hideWhenDisabledOnPosts']) echo ' checked="checked"'; ?> /> <?php _e('Hide any traces of trackbacks and pingbacks when they are disabled for <strong>Posts</strong>.', 'Arjuna'); ?></label><br />
								<span class="description"><?php _e('Note: If enabled, the trackbacks tab section on pages/posts will be removed.', 'Arjuna'); ?></span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="bottom"><span></span></div>
		</div>
		
		<div self:ID="excerpts" class="srsContainer<?php if(!arjuna_admin_is_panel_open('excerpts')) print ' srsContainerClosed'; ?>">
			<h4 class="title"><span><?php _e('Excerpts', 'Arjuna'); ?></span></h4>
			<div class="inside">
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><?php _e('Show excerpts on', 'Arjuna'); ?></th>
							<td>
								<label><input name="excerpts_index" type="checkbox"<?php if($options['excerpts_index']) echo ' checked="checked"'; ?> /> <?php _e('Homepage/Index page', 'Arjuna'); ?></label><br />
								<label><input name="excerpts_categoryPages" type="checkbox"<?php if($options['excerpts_categoryPages']) echo ' checked="checked"'; ?> /> <?php _e('Category &amp; tag pages', 'Arjuna'); ?></label><br />
								<label><input name="excerpts_archivePages" type="checkbox"<?php if($options['excerpts_archivePages']) echo ' checked="checked"'; ?> /> <?php _e('Archive pages', 'Arjuna'); ?></label><br />
								<label><input name="excerpts_searchPages" type="checkbox"<?php if($options['excerpts_searchPages']) echo ' checked="checked"'; ?> /> <?php _e('Search pages', 'Arjuna'); ?></label><br />
								<span class="description"><?php _e('Note: If enabled, an excerpt will be shown instead of the full post on selected pages. If a post does not have a custom excerpt, an automatic excerpt of the first 55 words will be displayed.', 'Arjuna'); ?></span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="bottom"><span></span></div>
		</div>
		
		<div self:ID="pagination" class="srsContainer<?php if(!arjuna_admin_is_panel_open('pagination')) print ' srsContainerClosed'; ?>">
			<h4 class="title"><span><?php _e('Pagination', 'Arjuna'); ?></span></h4>
			<div class="inside">
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><?php _e('Pagination', 'Arjuna'); ?></th>
							<td>
								<label><input name="pagination" onclick="pagination_switch(this)" type="radio" value="1"<?php if($options['pagination']) echo ' checked="checked"'; ?> /> <?php _e('Use Arjuna pagination', 'Arjuna'); ?></label><br />
								<span class="description"><?php _e('If enabled, Arjuna will use its own native pagination to allow your users to navigate the blog using pages.', 'Arjuna');?></span><br />
								<div id="pagination_input"<?php if(!$options['pagination']) echo ' style="display:none;"'; ?> style="padding:5px 0 5px 20px;">
									<table>
									<tr>
										<th scope="row"><?php _e('Page Range', 'Arjuna'); ?>:</th>
										<td>
										<select name="pagination_pageRange" style="width:50px;"><?php
										$validValues = array(1, 2, 3, 4, 5);
										foreach($validValues as $value) {
											if ($options['pagination_pageRange'] == $value)
												print '<option value="'.$value.'" selected="selected">'.$value.'</option>';
											else print '<option value="'.$value.'">'.$value.'</option>';
										}
										?></select><span class="description"><?php _e('The number of page buttons that will appear before and after the current page button.', 'Arjuna'); ?></span>
										</td>
									</tr>
									<tr>
										<th scope="row"><?php _e('Page Anchors', 'Arjuna'); ?>:</th>
										<td>
										<select name="pagination_pageAnchors" style="width:50px;"><?php
											$validValues = array(1, 2, 3);
											foreach($validValues as $value) {
												if ($options['pagination_pageAnchors'] == $value)
													print '<option value="'.$value.'" selected="selected">'.$value.'</option>';
												else print '<option value="'.$value.'">'.$value.'</option>';
											}
										?></select><span class="description"><?php _e('The number of page buttons that will always appear at the beginning and the end of the pagination.', 'Arjuna'); ?></span>
										</td>
									</tr>
									<tr>
										<th scope="row"><?php _e('Page Gap', 'Arjuna'); ?>:</th>
										<td>
										<select name="pagination_pageGap" style="width:50px;"><?php
											$validValues = array(1, 2, 3);
											foreach($validValues as $value) {
												if ($options['pagination_pageGap'] == $value)
													print '<option value="'.$value.'" selected="selected">'.$value.'</option>';
												else print '<option value="'.$value.'">'.$value.'</option>';
											}
										?></select><span class="description"><?php _e('The number of page buttons in a gap before an ellipsis (...) is displayed.', 'Arjuna'); ?></span>
										</td>
									</tr>
								</table>
								</div>
								<label><input name="pagination" onclick="pagination_switch(this)" type="radio" value="0"<?php if(!$options['pagination']) echo ' checked="checked"'; ?> /> <?php _e('Use WordPress default', 'Arjuna'); ?></label><br />
								<span class="description"><?php _e('The default depends on your WordPress version and whether you have any pagination plugins activated. If the wp-paginate or wp-pagenavi plugin is activated, then Arjuna will use these plugins to create the pagination.', 'Arjuna');?></span><br />
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="bottom"><span></span></div>
		</div>
		
		<div self:ID="miscellaneous" class="srsContainer<?php if(!arjuna_admin_is_panel_open('miscellaneous')) print ' srsContainerClosed'; ?>">
			<h4 class="title"><span><?php _e('Miscellaneous', 'Arjuna'); ?></span></h4>
			<div class="inside">
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><?php _e('Append to page title', 'Arjuna'); ?></th>
							<td>
								<label><input name="appendToPageTitle" type="radio" value="blogName"<?php if($options['appendToPageTitle']=='blogName') echo ' checked="checked"'; ?> /> <?php printf(__('Blog Name (&quot; - %s&quot;)', 'Arjuna'), get_bloginfo('blogname')); ?></label><br />
								<label><input name="appendToPageTitle" type="radio" value="custom"<?php if($options['appendToPageTitle']=='custom') echo ' checked="checked"'; ?> /> <?php _e('Custom:', 'Arjuna'); ?></label> <input type="text" value="<?php if(!empty($options['appendToPageTitleCustom'])) echo $options['appendToPageTitleCustom']; ?>" name="appendToPageTitleCustom" /><br />
								<span class="description"><?php _e('This will be appended to the page title of every web page (posts, pages, categories, etc.)', 'Arjuna'); ?></span>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Enable JavaScript menus', 'Arjuna'); ?></th>
							<td>
								<label><input name="headerMenus_enableJavaScript" type="checkbox"<?php if($options['headerMenus_enableJavaScript']) echo ' checked="checked"'; ?> /> <?php _e('Enable JavaScript dropdown menus. This will improve usability of the menus. If JavaScript is disabled, CSS-based dropdown menus will be used instead.', 'Arjuna'); ?></label><br />
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Show IE6 Notice', 'Arjuna'); ?></th>
							<td>
								<label><input name="miscellaneous_IE6Notice" type="checkbox"<?php if($options['miscellaneous_IE6Notice']) echo ' checked="checked"'; ?> /> <?php _e('Display a notice to Internet Explorer 6 users to update their browsers.', 'Arjuna'); ?></label><br />
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e('Custom CSS', 'Arjuna'); ?></th>
							<td>
								<?php
								//first check for permissions
								if (!is_writable(dirname(__FILE__).'/')):
								?>
								<br />
								<span class="description"><?php sprintf(__('Arjuna needs write permissions to create a new file %s, which will contain the custom CSS.'), '&quot;user-style.css&quot;'); ?></span>
								<?php else: ?>
								<label><input name="customCSS" onclick="customCSS_switch(this)" type="checkbox"<?php if($options['customCSS']) echo ' checked="checked"'; ?> /> <?php _e('Enable custom CSS rules', 'Arjuna'); ?></label><br />
								<span class="description"><?php _e('If enabled, Arjuna will include your custom CSS rules with every page call. If you intend to make some minor changes to the theme, enabling this option ensures that you can safely upgrade Arjuna without losing your custom CSS. We recommend to use child themes for more serious customizations.', 'Arjuna');?></span>
								<div id="customCSS_input"<?php if(!$options['customCSS']) echo ' style="display:none;"'; ?>>
									<textarea name="customCSS_input"><?php
										print $options['customCSS_input'];
									?></textarea>
								</div>
								<?php endif; ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="bottom"><span></span></div>
		</div>
		
		<p class="submit">
			<input class="button-primary" type="submit" name="arjuna_save_options" value="<?php _e('Save Changes', 'Arjuna'); ?>" />
		</p>
	</div>
</form>
	<?php
}

// register function
add_action('admin_menu', 'arjuna_create_options');
add_action('admin_menu', 'arjuna_add_theme_options');



if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name'=>'Sidebar Top',
			'id'=>'sidebar_full_top',
			'description'=>'This is the top widget bar in the sidebar, extending to full width of the sidebar.',
			'before_widget' => '<div class="sidebarBox">',
			'after_widget' => '</div>',
			'before_title' => '<h4><span>',
			'after_title' => '</span></h4>'
	));
	register_sidebar(array(
		'name'=>'Sidebar Left',
			'id'=>'sidebar_left',
			'description'=>'This is the widget bar on the left hand side in the sidebar. It appears right below the top widget bar.',
			'before_widget' => '<div class="sidebarBox">',
			'after_widget' => '</div>',
			'before_title' => '<h4><span>',
			'after_title' => '</span></h4>'
	));
	register_sidebar(array(
		'name'=>'Sidebar Right',
			'id'=>'sidebar_right',
			'description'=>'This is the widget bar on the right hand side in the sidebar. It appears right below the top widget bar, next to the left widget bar.',
			'before_widget' => '<div class="sidebarBox">',
			'after_widget' => '</div>',
			'before_title' => '<h4><span>',
			'after_title' => '</span></h4>'
	));
	register_sidebar(array(
		'name'=>'Sidebar Bottom',
			'id'=>'sidebar_full_bottom',
			'description'=>'This is the bottom widget bar in the sidebar, extending to full width of the sidebar. It will appear below the left and right widget bars.',
			'before_widget' => '<div class="sidebarBox">',
			'after_widget' => '</div>',
			'before_title' => '<h4><span>',
			'after_title' => '</span></h4>'
	));
	
	/*
	register_sidebar(array(
		'name'=>'header_bar',
			'before_widget' => '<div id="%1$s" class="headerbox  %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name'=>'footer_bar',
			'before_widget' => '<div id="%1$s" class="footerbox  %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
	));
	*/
}

$GLOBALS['content_width'] = $content_width = 600;

// Localization
function theme_init(){
	load_theme_textdomain('Arjuna', get_template_directory() . '/languages');
}
add_action ('init', 'theme_init');

//CSS for plugin page
add_action('admin_print_styles', 'arjuna_admin_initCSS');

function arjuna_admin_initCSS() {
	wp_enqueue_style('arjunaAdminCSS', get_bloginfo('template_url').'/admin.css');
	wp_enqueue_style('fionnFarbtasticCSS', get_bloginfo('template_url').'/lib/farbtastic/farbtastic.css');
}

//JS for plugin page
add_action('admin_print_scripts', 'arjuna_admin_initJS');

function arjuna_admin_initJS() {
	wp_enqueue_script('fionnFarbtasticJS', get_bloginfo('template_url').'/lib/farbtastic/farbtastic.js');
	wp_enqueue_script('arjunaAdminJS', get_bloginfo('template_url').'/admin.js');
}


//for WordPress versions below 2.7, include a legacy comments file because threaded comments are not supported yet
add_filter( 'comments_template', 'legacy_comments' );
function legacy_comments( $file ) {
	//is WordPress 2.7 or below?
	if ( !function_exists('wp_list_comments') )
		$file = TEMPLATEPATH . '/comments_legacy.php';
	return $file;
}


// custom comments
$commentCount = 0;
function arjuna_get_comment($comment, $args, $depth) {
	global $commentCount;
	$arjunaOptions = arjuna_get_options();
	$GLOBALS['comment'] = $comment;
	$commentClass = 'comment';
	
?>
	<li <?php comment_class();?> id="comment-<?php comment_ID() ?>">
		<?php 
			if (function_exists('get_avatar'))
				echo get_avatar($comment, 40);
		?>
		<div class="message">
			<div class="t"><div></div></div>
			<div class="i"><div class="i2">
				<span class="title"><a href="#comment-<?php comment_ID() ?>">#<?php print ++$commentCount;?></a> | <?php _e('Written by', 'Arjuna'); ?> <?php if (!get_comment_author_url()): print get_comment_author_link(); else: ?><a href="<?php comment_author_url(); ?>" class="authorLink"><?php comment_author(); ?></a><?php endif; ?> <?php
					if($arjunaOptions['commentDateFormat'] == 'timePassed'){
						printf(__('about %s ago', 'Arjuna'), arjuna_get_time_passed(strtotime($comment->comment_date_gmt)));
					} else {
						print __('on', 'Arjuna').' '.get_comment_time(get_option('date_format'));
					}
				?>.</span>
				<span class="links">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					<?php edit_comment_link(__('Edit', 'Arjuna'),' | ',''); ?>
				</span>
				<?php if ($comment->comment_approved == '0'): ?>
					<p><?php _e('Your comment is awaiting moderation.', 'Arjuna'); ?></p>
				<?php endif; ?>
				<div id="commentbody-<?php comment_ID() ?>">
					<?php comment_text(); ?>
				</div>
			</div></div>
			<div class="b"><div></div></div>
		</div>
	<?php //</li> , WP, as strange as this is, adds it automatically ?>
<?php
}

$trackbackCount = 0;
function arjuna_get_trackback($comment, $args, $depth) {
	global $trackbackCount;
	$arjunaOptions = arjuna_get_options();
	$GLOBALS['comment'] = $comment;
	$commentClass = 'comment';
	
?>
	<li <?php comment_class();?> id="comment-<?php comment_ID() ?>">
		<?php 
			if (function_exists('get_avatar'))
				echo get_avatar($comment, 40);
		?>
		<div class="message">
			<div class="t"><div></div></div>
			<div class="i"><div class="i2">
				<span class="title"><a href="#comment-<?php comment_ID() ?>">#<?php print ++$trackbackCount;?></a> | <?php _e('Pinged by', 'Arjuna'); ?> <?php if (!get_comment_author_url()): print get_comment_author_link(); else: ?><a href="<?php comment_author_url(); ?>" class="authorLink"><?php comment_author(); ?></a><?php endif; ?> <?php
					if($arjunaOptions['commentDateFormat'] == 'timePassed'){
						printf(__('about %s ago', 'Arjuna'), arjuna_get_time_passed(strtotime($comment->comment_date_gmt)));
					} else {
						print __('on', 'Arjuna').' '.get_comment_time(get_option('date_format'));
					}
				?>.</span>
				<span class="links">
					<?php edit_comment_link(__('Edit', 'Arjuna'),'',''); ?>
				</span>
				<?php if ($comment->comment_approved == '0'): ?>
					<p><?php _e('Your trackback is awaiting moderation.', 'Arjuna'); ?></p>
				<?php endif; ?>
				<div id="commentbody-<?php comment_ID() ?>">
					<?php comment_text(); ?>
				</div>
			</div></div>
			<div class="b"><div></div></div>
		</div>
	<?php //</li> , WP, as strange as this is, adds it automatically ?>
<?php
}

function arjuna_cancel_comment_reply_link($text) {
	$style = isset($_GET['replytocom']) ? '' : ' style="display:none;"';
	$link = esc_html( remove_query_arg('replytocom') ) . '#respond';
	echo apply_filters('cancel_comment_reply_link', '<a rel="nofollow" id="cancel-comment-reply-link" class="btnCancel btn" href="' . $link . '"' . $style . '>' . $text . '</a>', $link, $text);
}

function arjuna_get_time_passed($pastTime) {
	$currentTime = time();
	$seconds = $currentTime - $pastTime;
	
	if ($seconds > 28944000) { //older than 335 days
		$years = round($seconds/31557600); //365.25 days
		return $years==1 ? __('1 year', 'Arjuna') : sprintf(__('%d years', 'Arjuna'), $years);
	} 
	if ($seconds > 2592000) { //older than 30 days
		$months = round($seconds/2629800); //1 month (average)
		return $months==1 ? __('1 month', 'Arjuna') : sprintf(__('%d months', 'Arjuna'), $months);
	} 
	if ($seconds > 518400) { //older than 6 days
		$weeks = round($seconds/604800); //1 week
		return $weeks==1 ? __('1 week', 'Arjuna') : sprintf(__('%d weeks', 'Arjuna'), $weeks);
	} 
	if ($seconds > 82800) { //older than 23 hours
		$days = round($seconds/86400); //1 day
		return $days==1 ? __('1 day', 'Arjuna') : sprintf(__('%d days', 'Arjuna'), $days);
	} 
	if ($seconds > 3540) { //older than 59 minutes
		$hours = round($seconds/3600); //1 hour
		return $hours==1 ? __('1 hour', 'Arjuna') : sprintf(__('%d hours', 'Arjuna'), $hours);
	} 
	if ($seconds > 59) { //older than 59 seconds
		$minutes = round($seconds/60); //1 minute
		return $minutes==1 ? __('1 minute', 'Arjuna') : sprintf(__('%d minutes', 'Arjuna'), $minutes);
	}
	
	return $seconds==1 ? __('1 second', 'Arjuna') : sprintf(__('%d seconds', 'Arjuna'), $seconds);
}

function has_pages() {
	global $wp_query;
	if ( !is_single() && $wp_query->max_num_pages > 1 )
		return true;
		
	return false;
}
function arjuna_get_previous_page_link($label) {
	global $paged;

	if ( !is_single() && $paged > 1 ) {
		echo '<a href="' . previous_posts(false) . '" class="newer"><span>'. preg_replace( '/&([^#])(?![a-z]{1,8};)/', '&#038;$1', $label ) .'</span></a>';
	}
}
function arjuna_get_next_page_link($label) {
	global $paged, $wp_query;
	$max_page = $wp_query->max_num_pages;

	if ( !$paged )
		$paged = 1;

	$nextpage = intval($paged) + 1;

	if ( !is_single() && ( empty($paged) || $nextpage <= $max_page) ) {
		echo '<a href="' . next_posts( $max_page, false ) . '" class="older"><span>'. preg_replace('/&([^#])(?![a-z]{1,8};)/', '&#038;$1', $label) .'</span></a>';
	}
}

// Returns true if there is at least one other post than the one being viewed currently
function arjuna_has_other_posts() {
	if (get_adjacent_post(false, '', false))
		return true;
	if (get_adjacent_post(false, '', true))
		return true;
	return false;
}

function arjuna_get_next_post_link($label) {
	$post = get_adjacent_post(false, '', false);
	if (!$post) return;
	echo '<a href="'.get_permalink($post).'" rel="next" class="older"><span>'.$label.'</span></a>';
}

function arjuna_get_previous_post_link($label) {
	$post = get_adjacent_post(false, '', true);
	if (!$post) return;
	echo '<a href="'.get_permalink($post).'" rel="prev" class="newer"><span>'.$label.'</span></a>';
}

function arjuna_get_appendToPageTitle() {
	$arjunaOptions = get_option('arjuna_options');
	
	if ($arjunaOptions['appendToPageTitle']=='blogName') {
		echo " - ";
		bloginfo('name');
	} elseif ($arjunaOptions['appendToPageTitle']=='custom' && !empty($arjunaOptions['appendToPageTitleCustom'])) {
		echo " - " . $arjunaOptions['appendToPageTitleCustom'];
	}
}

function arjuna_get_custom_CSS() {
	$arjunaOptions = arjuna_get_options();
	if($arjunaOptions['customCSS'] && $arjunaOptions['customCSS_input'])
		return '<style>'.$arjunaOptions['customCSS_input'].'</style>';
	return '';
}

function arjuna_get_pagination($previousLabel, $nextLabel) {
	$arjunaOptions = arjuna_get_options();
	global $wp_query;	
	
	$currentPage = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
	$postsPerPage = intval(get_query_var('posts_per_page'));
	$totalPages = intval(ceil($wp_query->found_posts/$postsPerPage));
		
	if ($totalPages > 1) {
		$output = '';
		$output .= '<div class="pagination"><div><ol>';
		
		
		//display page info, e.g. "Page 2 of 7"
		$output .= '<li class="info"><span>'.sprintf(__('Page %s of %s', 'Arjuna'), $currentPage, $totalPages).'</span></li>';
		
		//previous button
		$previousPageURL = get_pagenum_link($currentPage - 1);
		if ($currentPage > 1 && !empty($previousPageURL))
			$output .= '<li class="prev"><a href="'.$previousPageURL.'"><span>'.$previousLabel.'</span></a></li>';
		
		//the pages to be included in the pagination
		$include = array();

		$startPaginationAt = $currentPage - $arjunaOptions['pagination_pageRange'];
		if($startPaginationAt<1) $startPaginationAt = 1;
		$endPaginationAt = $currentPage + $arjunaOptions['pagination_pageRange'];
		if($endPaginationAt>$totalPages) $endPaginationAt = $totalPages;

		for ($i=1; $i<=$arjunaOptions['pagination_pageAnchors']; $i++)
			$include[$i] = true;
		
		if( $startPaginationAt - $arjunaOptions['pagination_pageGap'] > $arjunaOptions['pagination_pageAnchors'] )
			$include['gap'] = 'gap';
		
		for ($i=$startPaginationAt; $i<=$endPaginationAt; $i++) {
			$include[$i] = true;
		}
		
		if( $endPaginationAt + $arjunaOptions['pagination_pageGap'] < $totalPages-$arjunaOptions['pagination_pageAnchors']+1 )
			$include['gap'] = 'gap';


		for ($i=$totalPages-$arjunaOptions['pagination_pageAnchors']+1; $i<=$totalPages; $i++)
			$include[$i] = true;


		//write to output string
		foreach($include as $key => $value) {
			if($key=='gap') {
				$output .= '<li class="gap"><span>...</span></li>';
			} elseif($key==$currentPage) {
				$URL = get_pagenum_link($key);
				$output .= '<li class="current"><a href="'.$URL.'" title="'.sprintf(__('Page %s', 'Arjuna'), $key).'"><span>'.$key.'</span></a></li>';
			} else {
				$URL = get_pagenum_link($key);
				$output .= '<li><a href="'.$URL.'" title="'.sprintf(__('Page %s', 'Arjuna'), $key).'"><span>'.$key.'</span></a></li>';
			}
		}
		
		//next button
		$nextPageURL = get_pagenum_link($currentPage + 1);
		if ($currentPage < $totalPages && !empty($nextPageURL))
			$output .= '<li class="next"><a href="'.$nextPageURL.'"><span>'.$nextLabel.'</span></a></li>';
	
		$output .= '</ol></div></div>';
		
		echo $output;
	}
	return;
}

function arjuna_get_post_pagination($previousLabel, $nextLabel) {
	$arjunaOptions = arjuna_get_options();
	global $post, $page, $numpages, $multipage, $more, $pagenow;
	
	$currentPage = $page;
	$totalPages = $numpages;
		
	if ($multipage) {
		$output = '';
		$output .= '<div class="pagination"><div><ol>';
		
		
		//display page info, e.g. "Page 2 of 7"
		$output .= '<li class="info"><span>'.sprintf(__('Page %s of %s', 'Arjuna'), $currentPage, $totalPages).'</span></li>';
		
		//previous button
		$previousPageURL = arjuna_post_pagination_get_url($currentPage - 1);
		if ($currentPage > 1 && !empty($previousPageURL))
			$output .= '<li class="prev"><a href="'.$previousPageURL.'"><span>'.$previousLabel.'</span></a></li>';
		
		//the pages to be included in the pagination
		$include = array();

		for ($i=1; $i<=$totalPages; $i++) {
			if($i==$currentPage) {
				$URL = arjuna_post_pagination_get_url($i);
				$output .= '<li class="current"><a href="'.$URL.'" title="'.sprintf(__('Page %s', 'Arjuna'), $i).'"><span>'.$i.'</span></a></li>';
			} else {
				$URL = arjuna_post_pagination_get_url($i);
				$output .= '<li><a href="'.$URL.'" title="'.sprintf(__('Page %s', 'Arjuna'), $i).'"><span>'.$i.'</span></a></li>';
			}
		}

		//next button
		$nextPageURL = arjuna_post_pagination_get_url($currentPage + 1);
		if ($currentPage < $totalPages && !empty($nextPageURL))
			$output .= '<li class="next"><a href="'.$nextPageURL.'"><span>'.$nextLabel.'</span></a></li>';
	
		$output .= '</ol></div></div>';
		
		echo $output;
	}
	return;
}
function arjuna_post_pagination_get_url($page) {
	if($page == 1)
		return add_query_arg('page', $page, get_permalink());
	elseif('' == get_option('permalink_structure') || in_array($post->post_status, array('draft', 'pending')))
		return add_query_arg('page', $page, get_permalink());
	elseif('page' == get_option('show_on_front') && get_option('page_on_front') == $post->ID)
		return trailingslashit(get_permalink()) . user_trailingslashit('page/' . $page, 'single_paged');
	
	return trailingslashit(get_permalink()) . user_trailingslashit($page, 'single_paged');
}

function arjuna_get_comment_pagination($fragment = '#_comments') {
	if ( !is_singular() || !get_option('page_comments') )
		return;
	if(get_comment_pages_count() <= 1)
		return;
	
	echo '<div class="pagination commentPagination"><div>';
	
	if(function_exists('paginate_comments_links')) {
		echo '<span class="title">' . __('Comment Pages:', 'Arjuna') . '</span>';
		paginate_comments_links('prev_text='.__('Previous', 'Arjuna').'&next_text='.__('Next', 'Arjuna').'&type=list&add_fragment='.$fragment);
	} else {
		echo '<span class="older">'; previous_comments_link(__('Older Comments', 'Arjuna')); echo '</span>';
		echo '<span class="newer">'; next_comments_link(__('Newer Comments', 'Arjuna')); echo '</span>';
	}
	
	echo '</div></div>';
}

function arjuna_get_edit_link($label) {
	global $post;
		
	if ( !$url = get_edit_post_link( $post->ID ) ) return;
	
	return '<a href="'.$url.'" class="btn postEdit"><span>'.$label.'</span></a>';
}


function arjuna_parseExcludes($IDs, $type) {
	if(!function_exists('icl_object_id'))
		return $IDs;
	
	$array = explode(',', $IDs);
	$newArray = array();
	foreach($array as $ID)
		$newArray[] = icl_object_id($ID,$type);
	
	return implode(',', $newArray);
}

function arjuna_get_all_pages($exclude, $include, $depth) {
	$pages = array();
	
	$parameters = 'depth='.$depth;
	if($exclude)
		$parameters .= '&exclude='.$exclude;
	if($include)
		$parameters .= '&include='.$include;
	$wp_pages = get_pages($parameters);
	
	foreach($wp_pages as $wp_page) {
		if($wp_page->post_parent) {
			//find parent
			if(!arjuna_get_all_pages_iterator($pages, $wp_page))
				$pages[$wp_page->ID] = (object) array(
				'ID' => $wp_page->ID,
				'title' => $wp_page->post_title,
				'children' => array()
			);
		} else {
			$pages[$wp_page->ID] = (object) array(
				'ID' => $wp_page->ID,
				'title' => $wp_page->post_title,
				'children' => array()
			);
		}
	}
	
	return $pages;
}
function arjuna_get_all_pages_iterator(&$pages, $wp_page) {
	foreach($pages as $ID => $page) {
		if($ID == $wp_page->post_parent) {
			$pages[$ID]->children[$wp_page->ID] = (object) array(
				'ID' => $wp_page->ID,
				'title' => $wp_page->post_title,
				'children' => array()
			);
			return true;
		} elseif(!empty($page->children)) {
			if(arjuna_get_all_pages_iterator($page->children, $wp_page))
				return true;
		}
	}
	return false;
}

function arjuna_admin_walk_pages($pages, $level=0) {
	if(empty($pages))
		return true;
	
	foreach($pages as $page) {
		print '<option value="'.$page->ID.'"'.($level ? ' style="margin-left:'. 15*$level .'px;"' : '').'>'.$page->title.'</option>';
		if(!empty($page->children))
			arjuna_admin_walk_pages($page->children, $level+1);
	}
}

function arjuna_get_all_categories($exclude, $include, $depth) {
	global $_tmp_buffer;
	$_tmp_buffer = array();
	
	$categories = array();
	
	$parameters = 'depth='.$depth . '&hide_empty=0';
	if($exclude)
		$parameters .= '&exclude='.$exclude;
	if($include)
		$parameters .= '&include='.$include;
	$wp_categories = get_categories($parameters);
	
	foreach($wp_categories as $wp_category) {
		if($wp_category->parent) {
			//put into buffer
			if(!isset($_tmp_buffer[$wp_category->parent]))
				$_tmp_buffer[$wp_category->parent] = array();
			$_tmp_buffer[$wp_category->parent][] = (object) array(
				'ID' => $wp_category->cat_ID,
				'title' => $wp_category->cat_name,
				'children' => array()
			);
		} else {
			$categories[$wp_category->cat_ID] = (object) array(
				'ID' => $wp_category->cat_ID,
				'title' => $wp_category->cat_name,
				'children' => array()
			);
		}
	}
	
	//now use the buffer
	foreach($categories as $ID => $category)
		$categories[$ID] = arjuna_get_all_categories_iterator($category);
	
	return $categories;
}
function arjuna_get_all_categories_iterator($category) {
	global $_tmp_buffer;
	
	if(!isset($_tmp_buffer[$category->ID]))
		return $category;
	
	$categories = $_tmp_buffer[$category->ID];
	foreach($categories as $key => $cat)
		$categories[$key] = arjuna_get_all_categories_iterator($cat);
	
		
	$category->children = $categories;
		
	return $category;
}

function arjuna_admin_walk_categories($categories, $level=0) {
	if(empty($categories))
		return true;
	
	foreach($categories as $category) {
		print '<option value="'.$category->ID.'"'.($level ? ' style="margin-left:'. 15*$level .'px;"' : '').'>'.$category->title.'</option>';
		if(!empty($category->children))
			arjuna_admin_walk_categories($category->children, $level+1);
	}
}

function arjuna_get_upload_directory() {
	$uploadpath = wp_upload_dir();
	$path = $uploadpath['basedir'] . '/arjuna';
	if(!is_dir($path))
		@mkdir($path, 0777, true);
	return $path;
}
function arjuna_get_upload_url() {
	$uploadpath = wp_upload_dir();
	if ($uploadpath['baseurl']=='')
		$uploadpath['baseurl'] = get_bloginfo('siteurl').'/wp-content/uploads';
	return $uploadpath['baseurl'] . '/arjuna';
}

add_filter('get_comments_number', 'arjuna_comment_count', 0);
function arjuna_comment_count( $count ) {
	if (!is_admin()) {
		global $id;
		$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
		return count($comments_by_type['comment']);
	} 
	return $count;
}

