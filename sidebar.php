<?php
/* 	SPARK Theme's Right Sidebar Area
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SPARK 1.0
*/
if (!is_active_sidebar( 'sidebar-1'  )): echo '<style>#content{width:100%;}</style>'; return; endif; ?>
<div id="right-sidebar"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>