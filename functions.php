<?php
$optionsSaved = false;
function arjuna_create_options() {
	// Default values
	$defaultOptions = array(
		'headerMenu1_dropdown' => '3', // 1, 2, 3 (the depth of the menu, 1 being no dropdown)
		'headerMenu1_display' => 'pages', // pages, categories
		'headerMenu1_sortBy' => 'post_title', // [CATEGORIES]: name, ID, count, slug [PAGES]: post_title, ID, post_name (slug), menu_order (the page's Order value)
		'headerMenu1_sortOrder' => 'asc', // asc, desc
		'headerMenu1_alignment' => 'right', // right, left
		'headerMenu1_show' => true,
		'headerMenu2_dropdown' => '3', // 1, 2, 3 (the depth of the menu, 1 being no dropdown)
		'headerMenu2_display' => 'categories', // pages, categories
		'headerMenu2_sortBy' => 'name', // [CATEGORIES]: name, ID, count, slug [PAGES]: post_title, ID, post_name (slug), menu_order (the page's Order value)
		'headerMenu2_sortOrder' => 'ASC', // ASC, DESC
		'commentDisplay' => 'alt', // alt, left, right
		'footerStyle' => 'style1', // style1, style2
		'commentDateFormat' => 'timePassed', // timePassed, date
		'appendToPageTitle' => 'blogName', // blogName, custom
		'appendToPageTitleCustom' => '',
		'sidebarDisplay' => 'right', // right, left, none
		'sidebarWidth' => 'normal', // small, normal, large
		'enableIE6optimization' => true
	);

	// Overridden values
	$setOptions = get_option('arjuna_options');
	if ( !is_array($setOptions) ) $setOptions = array();
	
	// Merge
	$options = array_merge($defaultOptions, $setOptions);
	
	if ( $options != $setOptions )
		update_option('arjuna_options', $options);
	
	return $options;
}

function arjuna_add_theme_options() {
	global $optionsSaved;
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

		//Menu 2 sorting order
		$validOptions = array('asc', 'desc');
		if ( in_array($_POST['headerMenu2_sortOrder'], $validOptions) ) $options['headerMenu2_sortOrder'] = $_POST['headerMenu2_sortOrder'];
		else $options['headerMenu2_sortOrder'] = 'asc';


		//Comment display
		$validOptions = array('alt', 'left', 'right');
		if ( in_array($_POST['commentDisplay'], $validOptions) ) $options['commentDisplay'] = $_POST['commentDisplay'];
		else $options['commentDisplay'] = 'alt';

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
			if ($_POST['appendToPageTitleCustom']!=='') $options['appendToPageTitleCustom'] = $_POST['appendToPageTitleCustom'];
			else {
				$options['appendToPageTitle'] = 'blogName';
				$options['appendToPageTitleCustom'] = '';
			}
		}

		//Sidebar display
		$validOptions = array('right', 'left', 'none');
		if ( in_array($_POST['sidebarDisplay'], $validOptions) ) $options['sidebarDisplay'] = $_POST['sidebarDisplay'];
		else $options['sidebarDisplay'] = $validOptions[0];

		//Sidebar Width
		$validOptions = array('normal', 'small', 'large');
		if ( in_array($_POST['sidebarWidth'], $validOptions) ) $options['sidebarWidth'] = $_POST['sidebarWidth'];
		else $options['sidebarWidth'] = $validOptions[0];


		update_option('arjuna_options', $options);
		$optionsSaved = true;
	}
	
	add_theme_page(__('Arjuna Options', 'Arjuna'), __('Arjuna Options', 'Arjuna'), 'edit_themes', basename(__FILE__), 'arjuna_add_theme_page');
}


function arjuna_add_theme_page () {
	global $optionsSaved;

	$options = arjuna_create_options();
	if ( $optionsSaved )
		echo '<div id="message" class="updated fade"><p><strong>'.__('The Arjuna options have been saved.', 'Arjuna').'</strong></p></div>';
?>
<form action="#" method="post" name="arjuna_form" id="eos_update_theme">
	<div class="wrap">
		<h2><?php _e('Arjuna Theme Options', 'Arjuna'); ?></h2>
		
		<div class="tSRSIntro">
			<?php printf(__('Thank you for downloading Arjuna, the free WordPress theme designed by %s.', 'Arjuna'), '<a href="http://www.srssolutions.com/en/" class="tSRS">SRS Solutions</a>'); ?>
			<div class="tRow">
				<div class="tReportBugs">
					<h5><?php _e('Report Bugs', 'Arjuna'); ?></h5>
					<a href="http://www.srssolutions.com/en/downloads/bug_report"><?php _e('Report a Bug', 'Arjuna'); ?></a> &mdash; <?php _e('Please include your Wordpress version, browser details and a screenshot, if necessary.', 'Arjuna'); ?>
				</div>
				<ul class="tUsefulLinks">
					<h5><?php _e('Useful Links', 'Arjuna'); ?></h5>
					<li><a href="http://www.srssolutions.com/en/downloads/arjuna_wordpress_theme#changelog"><?php _e('Changelog', 'Arjuna'); ?></a></li>
					<li><a href="http://www.srssolutions.com/en/downloads/arjuna_wordpress_theme#faq"><?php _e('FAQ', 'Arjuna'); ?></a></li>
					<li><a href="http://www.srssolutions.com/en/downloads/arjuna_wordpress_theme#comments"><?php _e('Leave Feedback', 'Arjuna'); ?></a></li>
					<li><a href="http://www.srssolutions.com/en/downloads/arjuna_wordpress_theme#features"><?php _e('Upcoming Features', 'Arjuna'); ?></a></li>
				</ul>
				<div class="tSupport">
					<h5><?php _e('Support &amp; Sales', 'Arjuna'); ?></h5>
					<a href="http://www.srssolutions.com/en/contact/rfq"><?php _e('Contact Sales', 'Arjuna'); ?></a> &mdash; <?php _e('Need installation or integration support? Need something customized or extended?', 'Arjuna'); ?>
				</div>
			</div>
		</div>
		
		<h3><?php _e('Header Menus', 'Arjuna'); ?></h3>
		<table width="100%"><tr>
			<td width="50%">
				<div class="tIcon" id="icon-firstMenu"></div>
				<h4><?php _e('First Header Menu', 'Arjuna'); ?></h4>
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
						</tr>
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
					</tbody>
				</table>
			</td>
			<td width="50%" valign="top">
				<div class="tIcon" id="icon-secondMenu"></div>
				<h4><?php _e('Second Header Menu', 'Arjuna'); ?></h4>
				<table class="form-table">
					<tbody>
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
					</tbody>
				</table>
			</td>
		</tr></table>
		<h3><?php _e('General Options', 'Arjuna'); ?></h3>
		<h4><?php _e('Sidebar', 'Arjuna'); ?></h4>
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
			</tbody>
		</table>

		<h4><?php _e('Comments', 'Arjuna'); ?></h4>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><?php _e('Display comments as follows', 'Arjuna'); ?></th>
					<td>
						<div class="tImageOptions" style="float:none">
							<input name="commentDisplay" type="radio" id="commentDisplay_left" value="left"<?php if($options['commentDisplay']=='left') echo ' checked="checked"'; ?> />
							<div class="tImage" id="icon-commentsLeft"></div>
							<span><label for="commentDisplay_left"><?php _e('Aligned to the left', 'Arjuna'); ?></label></span>
						</div>
						<div class="tImageOptions" style="float:none">
							<input name="commentDisplay" type="radio" id="commentDisplay_right" value="right"<?php if($options['commentDisplay']=='right') echo ' checked="checked"'; ?> />
							<div class="tImage" id="icon-commentsRight"></div>
							<span><label for="commentDisplay_right"><?php _e('Aligned to the right', 'Arjuna'); ?></label></span>
						</div>
						<div class="tImageOptions" style="float:none">
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
							<label><input name="commentDateFormat" type="radio" value="date"<?php if($options['commentDateFormat']=='date') echo ' checked="checked"'; ?> /> <?php printf(__('Standard Date Format (Example: <em>&quot;Written by admin on %s&quot;</em>)', 'Arjuna'), date('F jS, Y')); ?></label><br />
					</td>
				</tr>
			</tbody>
		</table>

		<h4><?php _e('Miscellaneous', 'Arjuna'); ?></h4>
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
					<th scope="row"><?php _e('Footer Style', 'Arjuna'); ?></th>
					<td>
						<div class="tImageOptions" style="float:none">
							<input name="footerStyle" style="margin-top:12px;" type="radio" value="style1"<?php if($options['footerStyle']=='style1') echo ' checked="checked"'; ?> />
							<div class="tImage" id="icon-footerStyle1"></div>
						</div>
						<div class="tImageOptions" style="float:none">
							<input name="footerStyle" style="margin-top:6px;" type="radio" value="style2"<?php if($options['footerStyle']=='style2') echo ' checked="checked"'; ?> />
							<div class="tImage" id="icon-footerStyle2"></div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>

		<h3><?php _e('Performance Optimization', 'Arjuna'); ?></h3>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><?php _e('Internet Explorer 6 Optimization', 'Arjuna'); ?></th>
					<td>
						<label><input name="enableIE6optimization" type="checkbox"<?php if($options['enableIE6optimization']) echo ' checked="checked"'; ?> /> <?php _e('Enable IE6 performance optimization', 'Arjuna'); ?></label><br />
						<br />
						<span class="description"><?php _e('If turned on, Arjuna will attempt to detect IE6 and serve a stand-alone CSS file specifically made for IE6.', 'Arjuna'); ?><br /><?php _e('Note: IE6 will still work the same if this option is turned off, however, you and your IE6 users will save an estimated 28kb (11 image and 2 CSS files) in bandwidth for first-time visitors. IE6 also might render more rapidly if this is turned on.', 'Arjuna');?></span>
					</td>
				</tr>
			</tbody>
		</table>

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
		'name'=>'sidebar_full_top',
			'before_widget' => '<div class="sidebarBox">',
			'after_widget' => '</div>',
			'before_title' => '<h4><span>',
			'after_title' => '</span></h4>'
	));
	register_sidebar(array(
		'name'=>'sidebar_left',
			'before_widget' => '<div class="sidebarBox">',
			'after_widget' => '</div>',
			'before_title' => '<h4><span>',
			'after_title' => '</span></h4>'
	));
	register_sidebar(array(
		'name'=>'sidebar_right',
			'before_widget' => '<div class="sidebarBox">',
			'after_widget' => '</div>',
			'before_title' => '<h4><span>',
			'after_title' => '</span></h4>'
	));
	register_sidebar(array(
		'name'=>'sidebar_full_bottom',
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
	wp_enqueue_style('arjunaAdminCSS', get_bloginfo('stylesheet_directory').'/admin.css');
}

//JS for plugin page
add_action('admin_print_scripts', 'arjuna_admin_initJS');

function arjuna_admin_initJS() {
	wp_enqueue_script('arjunaAdminJS', get_bloginfo('stylesheet_directory').'/admin.js');
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
function arjuna_get_comment($comment, $args, $depth) {
	$arjunaOptions = get_option('arjuna_options');
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
				<span class="title"><?php _e('Written by', 'Arjuna'); ?> <?php if (get_comment_author_url()): print get_comment_author_link(); else: ?><a href="<?php comment_author_url(); ?>" class="authorLink"><?php comment_author(); ?></a><?php endif; ?> <?php
					if($arjunaOptions['commentDateFormat'] == 'timePassed'){
						printf(__('about %s ago'), arjuna_get_time_passed(strtotime($comment->comment_date)));
					} else {
						print __('on', 'Arjuna').' '.date(__('F jS, Y', 'Arjuna'), strtotime($comment->comment_date));
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
		return sprintf(__($years==1?'1 year':'%d years', 'Arjuna'), $years);
	} 
	if ($seconds > 2592000) { //older than 30 days
		$months = round($seconds/2629800); //1 month (average)
		return sprintf(__($months==1?'1 month':'%d months', 'Arjuna'), $months);
	} 
	if ($seconds > 518400) { //older than 6 days
		$weeks = round($seconds/604800); //1 week
		return sprintf(__($weeks==1?'1 week':'%d weeks', 'Arjuna'), $weeks);
	} 
	if ($seconds > 82800) { //older than 23 hours
		$days = round($seconds/86400); //1 day
		return sprintf(__($days==1?'1 day':'%d days', 'Arjuna'), $days);
	} 
	if ($seconds > 3540) { //older than 59 minutes
		$hours = round($seconds/3600); //1 hour
		return sprintf(__($hours==1?'1 hour':'%d hours', 'Arjuna'), $hours);
	} 
	if ($seconds > 59) { //older than 59 seconds
		$minutes = round($seconds/60); //1 minute
		return sprintf(__($minutes==1?'1 minute':'%d minutes', 'Arjuna'), $minutes);
	}
	
	return sprintf(__($seconds==1?'1 second':'%d seconds', 'Arjuna'), $seconds);
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
		echo '<a href="' . next_posts( $max_page, false ) . '"  class="older"><span>'. preg_replace('/&([^#])(?![a-z]{1,8};)/', '&#038;$1', $label) .'</span></a>';
	}
}

function arjuna_get_appendToPageTitle() {
	$arjunaOptions = get_option('arjuna_options');
	
	echo " - ";
	if ($arjunaOptions['appendToPageTitle']=='blogName') {
		bloginfo('name');
	} elseif ($arjunaOptions['appendToPageTitle']=='custom') {
		echo $arjunaOptions['appendToPageTitleCustom'];
	}
}

//Try to detect if IE6 or below is the user's browser. This allows for Arjuna to optimize IE6 output and significantly reduce bandwidth for IE6 users.
function arjuna_isIE6() {
	$userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
	if (( strpos($userAgent, 'msie 6') !== false || strpos($userAgent, 'msie 5') !== false ) && strpos($userAgent, 'opera') === false)
		return true;
	return false;
}