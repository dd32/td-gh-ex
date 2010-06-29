<?php
class Arjuna {
	private $defaults = array(
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
		'footerStyle' => 'style1', // style1, style2
		'appendToPageTitle' => 'blogName', // blogName, custom
		'appendToPageTitleCustom' => '',
		'sidebarDisplay' => 'right', // right, left, none
		'sidebarWidth' => 'normal', // small, normal, large
		'sidebar_showDefault' => true, 
		'sidebar_showRSSButton' => true, 
		'sidebar_showTwitterButton' => false, 
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
		'customCSS_useFilesystem' => false,
		'pagination' => true,
		'pagination_pageRange' => 2, //the number of page buttons to show before and after the current page button
		'pagination_pageAnchors' => 1, //the number of buttons to always show at the beginning and end of the pagination bar
		'pagination_pageGap' => 1, //the number of pages in a gap before an ellipsis is added
		
		//Added 1.5
		'background_color' => '#d9d9d9',
		'background_style' => 'gradient_blueish' //if set, overrides background_color
	);
	
	public function __construct() {
	}
	
	private function processOptionsForm() {
		
	}
	
	public function getOptionsPage() {
		
	}
}
?>