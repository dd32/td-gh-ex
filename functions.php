<?php
/*
Author: Ali Siddique
Author URI: http://alisiddique.com/
*/

/**
 * Table of Functions:
 *
 * 1.0 - cleanup.php
 *   1.1 - Head Clean up
 *   1.2 - Remove RSS Feed
 *   1.3 - Remove injected CSS for recent comments widget
 *   1.4 - Remove injected CSS from recent comments widget
 *   1.5 - Remove injected CSS from gallery
 *   1.6 - Remove the p from around images
 * 2.0 - title.php
 * 3.0 - scripts.php
 * 4.0 - theme-support.php
 *   4.1 - wp thumbnails
 *	 4.2 - wp custom background
 *	 4.3 - Post format type
 * 	 4.4 - WP Menus
 * 5.0 - related-post.php
 * 6.0 - nav.php
 * 7.0 - utility.php
 *   7.1 - Read More
 * 8.0 - custom-post-type.php
 * 9.0 - admin.php
 *	 9.1 - Removing some default WordPress dashboard widgets
 *   9.2 - Example custom dashboard widget
 *   9.3 - Adding custom login css
 *   9.4 - Changing text in footer of admin
 * 10.0 - initial.php
 *    10.1 - Launching theme function
 *    10.2 - OEMBED SIZE OPTIONS
 *    10.3 - THUMBNAIL SIZE OPTIONS
 * 11.0 - sidebars.php
 * 12.0 - widgets.php
 * 13.0 - comments.php
 * 14.0 - fonts.php
 * 15.0 - shortcodes.php
 * 16.0 - gallery.php
 * 17.0 - custom-function.php
 * 18.0 - 
 * -----------------------------------------------------------------------------
 */
 
//	WordPress Head Clean up
//	=================================================================
	require_once( 'library/cleanup.php' );
	
//	WordPress Better Title
//	=================================================================
	require_once( 'library/title.php' );

//	Style and Script loaded this file
//	=================================================================
	require_once( 'library/scripts.php' );
	
//	Theme support function
//	=================================================================
	require_once( 'library/theme-support.php' );
	
//	Related post
//	=================================================================
	require_once( 'library/related-post.php' );
	
//	Pagination 
//	=================================================================
	require_once( 'library/nav.php' );
	
//	Utility functions
//	=================================================================
	require_once( 'library/utility.php' );

//	Customize WordPress admin (off by default)
//	=================================================================
	//require_once( 'library/admin.php' );
	
//	Initial functions
//	=================================================================
	require_once( 'library/initial.php' );

//	Functions for sidebars
//	=================================================================
	require_once( 'library/sidebars.php' );

//	Functions for widgets
//	=================================================================
	require_once( 'library/widgets.php' );

//	Comments
//	=================================================================
	require_once( 'library/comments.php' );

//	Font loaded to this scripts
//	=================================================================
	require_once( 'library/fonts.php' );
	
//	Short-code function
//	=================================================================
	require_once( 'library/shortcodes.php' );
	
//	Gallery function
//	=================================================================
	require_once( 'library/gallery.php' );
	
//	Custom Header function 
//	=================================================================
	require_once( 'library/custom-header.php' );

	
//	Custom Functions
//	=================================================================
	require_once( 'library/custom-function.php' );
	


/* DON'T DELETE THIS CLOSING TAG */ ?>
