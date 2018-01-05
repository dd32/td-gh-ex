<?php

function cryout_optset($var, $val1, $val2='', $val3='', $val4=''){
	$vals = array( $val1, $val2, $val3, $val4 );
	if ( in_array($var, $vals) ) {
		return false;
	} else {
		return true;
	}
}

function mantra_custom_styles() {
	$options = mantra_get_theme_options();
	extract($options);
	//	if ($mantra_dimselect=="Absolute") {
    $totalwidth = $mantra_sidewidth+$mantra_sidebar;
    $contentSize = $mantra_sidewidth;
    $sidebarSize = $mantra_sidebar;
	/* 	}
	elseif ($mantra_dimselect=="Relative") {
    $totalwidth = $mantra_sidewidthRel+$mantra_sidebarRel;
    $contentSize = intval(($mantra_sidewidthRel/$totalwidth*100)-2);
    $sidebarSize = intval(($mantra_sidebarRel/$totalwidth*100)-2);
	} */
	ob_start(); ?>

	<?php
	/* LAYOUT CSS */

	/* ABSOLUTE DIMENSIONS. */
	//if ( $mantra_dimselect=="Absolute" ) { ?>
		#wrapper { <?php echo (($mantra_mobile == 'Enable') ? 'max-' : '');?>width: <?php echo ($totalwidth); ?>px; }
		#content { width: 100%; max-width:<?php echo absint( $contentSize ) ?>px; max-width: calc( 100% - <?php echo absint( $sidebarSize ) ?>px ); }
		<?php if (is_page_template() && !is_page_template('templates/template-blog.php') && !is_page_template('templates/template-onecolumn.php') && !is_page_template('templates/template-page-with-intro.php')) {

			if (is_page_template("templates/template-twocolumns-right.php") ) { ?>
				#primary, #secondary {width:<?php echo absint( $sidebarSize ) ?>px;}
				#primary .widget-title, #secondary .widget-title { margin-right: -2em; text-align: left;}
				<?php }
		?><?php  if ( is_page_template("templates/template-twocolumns-left.php")) { ?>
				#content {float:right;}
				#primary,#secondary {width:<?php echo absint( $sidebarSize ) ?>px;float:left;clear:left;border:none;border-right:1px dotted #EEE;}
				#primary .widget-title, #secondary .widget-title { border-radius:0 15px 0 0 ; text-align:right; margin-left: -2em;}
		 <?php }

		?><?php  if ( is_page_template("templates/template-threecolumns-right.php")) { ?>
				#primary,#secondary {width: <?php echo absint( $mantra_sidebar/2 ) ?>px;}
				#primary .widget-title, #secondary .widget-title { margin-right: -2em; text-align: left;}
				<?php }
		?><?php  if ( is_page_template("templates/template-threecolumns-left.php")) { ?>
				#content {float:right;display:block;}
				#primary,#secondary {width:<?php echo absint( $sidebarSize/2 ) ?>px;float:left;border:none;border-right:1px dotted #EEE;}
				#primary .widget-title, #secondary .widget-title { border-radius:0 15px 0 0 ; text-align:right; margin-left: -2em; }
		 <?php }

		?><?php  if (is_page_template("templates/template-threecolumns-center.php")) { ?>
				#content { float:right;margin:0 <?php echo absint( $sidebarSize/2) ?>px 0 <?php echo -(absint( $contentSize + $sidebarSize ) ) ?>px;display:block;}
				#primary {width:<?php echo absint( $sidebarSize/2 ) ?>px;float:left;border:none;border-right:1px dotted #EEE;}
				#secondary {width:<?php echo absint( $sidebarSize/2 ) ?>px;float:right;}
				#primary  .widget-title { border-radius:0 15px 0 0 ; text-align:right;padding-right:15px;margin-left: -2em;}
				#secondary .widget-title { margin-right: -2em; text-align: left;}
		<?php }

			} //is_page_template
		else { // IF NO PAGE TEMPLATE HAS BEEN SELECTED

		 if ($mantra_side == "1c" ) { ?>
			 #content {max-width:<?php echo absint($totalwidth) ?>px; margin-top:0;}  <?php }

	?><?php  if ($mantra_side == "2cSr" ) { ?>
			#primary,#secondary {width:<?php echo absint( $sidebarSize ) ?>px;}
			#primary .widget-title, #secondary .widget-title { margin-right: -2em; text-align: left;}
			<?php }

	?><?php  if ($mantra_side == "2cSl" ) { ?>
			#content {float:right;}
			#primary,#secondary {width:<?php echo absint( $sidebarSize ) ?>px;float:left;clear:left;border:none;border-right:1px dotted #EEE;}
			#primary .widget-title, #secondary .widget-title { border-radius:0 15px 0 0 ; text-align:right; margin-left: -2em;}
	<?php }

	?><?php  if ($mantra_side == "3cSr" ) { ?>
			#primary,#secondary {width: <?php echo absint( $mantra_sidebar/2 ) ?>px;}
			#primary .widget-title, #secondary .widget-title { margin-right: -2em; text-align: left;}
			<?php }

	?><?php  if ($mantra_side == "3cSl" ) { ?>
			#content {float:right;display:block;}
			#primary,#secondary {width:<?php echo absint( $sidebarSize/2 ) ?>px;float:left;border:none;border-right:1px dotted #EEE;}
			#primary .widget-title, #secondary .widget-title { border-radius:0 15px 0 0 ; text-align:right; margin-left: -2em; }
	 <?php }

	?><?php  if ($mantra_side == "3cSs") { ?>
			#content { float:right;margin:0 <?php echo absint( $sidebarSize/2) ?>px 0 <?php echo -(absint( $contentSize + $sidebarSize ) ) ?>px;display:block;}
			#primary {width:<?php echo absint( $sidebarSize/2 ) ?>px;float:left;border:none;border-right:1px dotted #EEE;}
			#secondary {width:<?php echo absint( $sidebarSize/2 ) ?>px;float:right;}
			#primary  .widget-title { border-radius:0 15px 0 0 ; text-align:right;padding-right:15px;margin-left: -2em;}
			#secondary .widget-title { margin-right: -2em; text-align: left;}
	 <?php }

		}//else
	// }//absolute dim

/* RELATIVE DIMENSIONS. */ /* NOT UPDATED IN 3.0 !!! */

/* else if ($mantra_dimselect=="Relative") { ?>
#wrapper { width:<?php echo absint($totalwidth) ?>% ;}
#access, #colophon, #branding, #main {width:100%;}
#access .menu-header, div.menu {width:96% ;}
#content {margin-left: 2%;}
#primary, #secondary {padding-left:1%;}
<?php
	if (is_page_template() && !is_page_template('template-blog.php') && !is_page_template('template-onecolumn.php') && !is_page_template('template-page-with-intro.php')) {

?><?php if (is_page_template("template-twocolumns-right.php")) { ?>
#content { width:<?php echo absint($contentSize) ?>%;}
#primary,#secondary {width:<?php echo absint($sidebarSize ) ?>%;}<?php }

?><?php if (is_page_template("template-twocolumns-left.php")) { ?>
#content { width:<?php echo absint($contentSize ) ?>%;float:right;margin:0px 20px 0 0;}
#primary,#secondary {width:<?php echo absint($sidebarSize ) ?>%;float:left;padding-left:0px;clear:left;border:none;border-right:1px dotted #EEE;padding-right:20px;}
 .widget-title { -moz-border-radius:0 10px 0 0; -webkit-border-radius:0 10px 0 0;border-radius:0 10px 0 0 ; text-align:right;padding-right:5%;width:95%;margin-left:-10px;}
#primary ul.xoxo  {padding:0 0 0 10px ;} <?php }

?><?php if ( is_page_template("template-threecolumns-right.php")) { ?>
#content { width:<?php echo absint($contentSize-2) ?>%;}
#primary,#secondary {width:<?php echo absint($sidebarSize/2) ?>%;} <?php }

?><?php if (is_page_template("template-threecolumns-left.php")) { ?>
#content { width:<?php echo absint($contentSize-2) ?>%;float:right;margin:0px 20px 0 0;display:block;}
#primary,#secondary {width:<?php echo absint($sidebarSize/2) ?>%;float:left;padding-left:0px;border:none;border-right:1px dotted #EEE;padding-right:10px;}
 .widget-title { -moz-border-radius:0 10px 0 0; -webkit-border-radius:0 10px 0 0;border-radius:0 10px 0 0 ; text-align:right;padding-right:8%;width:95%;margin-left:-10px;}
#main .widget-area ul.xoxo {margin:0 0 0 10px ;} <?php }

?><?php if ( is_page_template("template-threecolumns-center.php")) { ?>
#content { width:<?php echo absint($contentSize-1) ?>%;float:right;margin:0px <?php echo absint($sidebarSize/2+2) ?>% 0 <?php echo -(absint($contentSize+$sidebarSize)) ?>%;display:block;}
#primary {width:<?php echo absint($sidebarSize/2) ?>%;float:left;padding-left:0px;border:none;border-right:1px dotted #EEE;padding-right:20px;}
#secondary {width:<?php echo absint($sidebarSize/2) ?>%;float:right;}
#primary  .widget-title { -moz-border-radius:0 10px 0 0; -webkit-border-radius:0 10px 0 0;border-radius:0 10px 0 0 ; text-align:right;padding-right:8%;width:100%;margin-left:-10px;}
#primary ul.xoxo  {padding:0 0 0 10px ;} <?php }
	}// is_page_template

	 else {  // IF NO PAGE TEMPLATE HAS BEEN SELECTED

 if ($mantra_side == "1c") { ?>
#content { margin: 20px; }  <?php }

?><?php if ($mantra_side == "2cSr" ) { ?>
#content { width:<?php echo absint($contentSize) ?>%;}
#primary,#secondary {width:<?php echo absint($sidebarSize) ?>%;}<?php }

?><?php if ($mantra_side == "2cSl" ) { ?>
#content { width:<?php echo absint($contentSize) ?>%;float:right;margin:0px 20px 0 0;}
#primary,#secondary {width:<?php echo absint($sidebarSize) ?>%;float:left;padding-left:0px;clear:left;border:none;border-right:1px dotted #EEE;padding-right:20px;}
 .widget-title { -moz-border-radius:0 10px 0 0; -webkit-border-radius:0 10px 0 0;border-radius:0 10px 0 0 ; text-align:right;padding-right:5%;width:95%;margin-left:-10px;}
#primary ul.xoxo  {padding:0 0 0 10px ;} <?php }

?><?php if ($mantra_side == "3cSr" ) { ?>
#content { width:<?php echo absint($contentSize-2) ?>%;}
#primary,#secondary {width:<?php echo absint($sidebarSize/2) ?>%;} <?php }

?><?php if ($mantra_side == "3cSl" ) { ?>
#content { width:<?php echo absint($contentSize-2) ?>%;float:right;margin:0px 20px 0 0;display:block;}
#primary,#secondary {width:<?php echo absint($sidebarSize/2 ) ?>%;float:left;padding-left:0px;;border:none;border-right:1px dotted #EEE;padding-right:15px;}
 .widget-title { -moz-border-radius:0 10px 0 0; -webkit-border-radius:0 10px 0 0;border-radius:0 10px 0 0 ; text-align:right;padding-right:8%;width:100%;margin-left:-10px;}
#main .widget-area ul.xoxo {margin:0 0 0 10px ;} <?php }

?><?php if ($mantra_side == "3cSs") { ?>
#content { width:<?php echo absint($contentSize-1) ?>%;float:right;margin:0px <?php echo absint($sidebarSize/2+2) ?>% 0 <?php echo -(absint($contentSize+$sidebarSize)) ?>%;display:block;}
#primary {width:<?php echo absint($sidebarSize/2) ?>%;float:left;padding-left:0px;border:none;border-right:1px dotted #EEE;padding-right:20px;}
#secondary {width:<?php echo absint($sidebarSize/2) ?>%;float:right;}
#primary  .widget-title { -moz-border-radius:0 10px 0 0; -webkit-border-radius:0 10px 0 0;border-radius:0 10px 0 0 ; text-align:right;padding-right:8%;width:100%;margin-left:-10px;}
#primary ul.xoxo  {padding:0 0 0 10px ;} <?php }

	 }//else
} */

	/*
	 * THE REST OF THE CSS
	 */
	?>
	html {
		font-size:<?php echo esc_attr($mantra_fontsize) ?>; <?php
		if ($mantra_lineheight != "Default") { ?>line-height:<?php echo absint( $mantra_lineheight ) ?>; <?php }
		if ($mantra_wordspace != "Default") { ?>word-spacing:<?php echo esc_attr( $mantra_wordspace ) ?>;<?php }
		if ($mantra_letterspace != "Default") { ?>letter-spacing:<?php echo esc_attr( $mantra_letterspace ) ?>;<?php }
		if ($mantra_textalign != "Default") { ?>text-align:<?php echo esc_attr( $mantra_textalign ) ?>;<?php } ?>
	}
	<?php
	if ($mantra_hcenter != "") { ?> #bg_image { display:block;margin:0 auto;} <?php }
	if ($mantra_contentbg != "#FFFFFF") { ?> #main, #access ul li.current_page_item, #access ul li.current-menu-item,
											 #access ul ul li, #nav-toggle { background-color:<?php echo esc_attr( $mantra_contentbg ); ?>} <?php }
	if ($mantra_menubg != "#FAFAFA") { ?> #access ul li { background-color:<?php echo esc_attr( $mantra_menubg ); ?>} <?php }
	if (cryout_optset($mantra_s1bg, "")) { ?> #primary { background-color:<?php echo esc_attr(  $mantra_s1bg ); ?>} <?php }
	if (cryout_optset($mantra_s2bg ,"" )){ ?> #secondary { background-color:<?php echo esc_attr(  $mantra_s2bg ); ?>} <?php }

	$mantra_googlefont = str_replace('+',' ',preg_replace('/:.*/i','',$mantra_googlefont));
	$mantra_googlefonttitle = str_replace('+',' ',preg_replace('/:.*/i','',$mantra_googlefonttitle));
	$mantra_googlefontside = str_replace('+',' ',preg_replace('/:.*/i','',$mantra_googlefontside));
	$mantra_googlefontsubheader = str_replace('+',' ',preg_replace('/:.*/i','',$mantra_googlefontsubheader));

	if (!empty($mantra_googlefont)){                                               ?> body, input, textarea {font-family:<?php echo "\"$mantra_googlefont\""; ?>; } <?php }
	elseif (stripslashes($mantra_fontfamily) != '"Segoe UI", Arial, sans-serif') { ?> body, input, textarea {font-family:<?php echo $mantra_fontfamily; ?>; } <?php }

	if (!empty($mantra_googlefonttitle)) {    ?> #content h1.entry-title a, #content h2.entry-title a, #content h1.entry-title, #content h2.entry-title,
												#front-text1 h2, #front-text2 h2 {font-family: <?php echo "\"$mantra_googlefonttitle\"" ?>; }<?php }
	elseif ($mantra_fonttitle != "Default") { ?> #content h1.entry-title a, #content h2.entry-title a, #content h1.entry-title, #content h2.entry-title,
												#front-text1 h2, #front-text2 h2 {font-family:<?php echo $mantra_fonttitle ?>; } <?php }

	if (!empty($mantra_googlefontside)) {    ?> .widget-area {font-family:<?php echo "\"$mantra_googlefontside\"" ?>; }<?php }
	elseif ($mantra_fontside != "Default") { ?> .widget-area {font-family:<?php echo $mantra_fontside ?>; }<?php }

	if (!empty($mantra_googlefontsubheader)) { 	      ?> .entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4,
													.entry-content h5, .entry-content h6  {font-family:<?php echo "\"$mantra_googlefontsubheader\"" ?>; }<?php }
	elseif ($mantra_fontsubheader != "Default") { ?> .entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4,
													.entry-content h5, .entry-content h6  {font-family:<?php  echo $mantra_fontsubheader ?>; }<?php }

	if ($mantra_caption != "Light") { ?> #content .wp-caption { <?php
					    if ($mantra_caption == "White") { ?> background-color:#FFF;<?php }
					elseif ($mantra_caption == "Light Gray") {?> background-color:#EEE;<?php }
					elseif ($mantra_caption == "Gray") {?> background-color:#CCC;<?php }
					elseif ($mantra_caption == "Dark Gray") {?> background-color:#444; color:#CCC;<?php }
					elseif ($mantra_caption == "Black") {?> background-color:#000; color:#CCC;<?php }
	?> } <?php }
	if ($mantra_menurounded == "Disable") { ?> #access ul li {border-radius:0;}<?php }
	if     ($mantra_metaback == "White") { ?> .entry-meta { background:#FFF;} <?php }
	elseif ($mantra_metaback == "None") { ?> .entry-meta { background:#FFF;border:none;-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;} <?php }

	if ($mantra_postseparator == "Show") { ?> article.post, article.page { padding-bottom:10px;border-bottom:3px solid #EEE } <?php }
	if ($mantra_contentlist == "Hide") { ?> .entry-content ul li { background-image:none ; padding-left:0;} .entry-content ul { margin-left:0; } <?php }

	if ($mantra_comtext == "Hide") { ?> #respond .form-allowed-tags { display:none;} <?php }
		if ($mantra_comclosed == "Hide in posts") { ?> .nocomments { display:none;} <?php }
	elseif ($mantra_comclosed == "Hide in pages") { ?> .nocomments2 {display:none;} <?php }
	elseif ($mantra_comclosed == "Hide everywhere") { ?> .nocomments, .nocomments2 {display:none;} <?php }
	if ($mantra_comoff == "Hide") { ?> .comments-link span { display:none;} <?php }

	if ($mantra_tables == "Enable") { ?> #content table, #content tr td {border:none;} #content tr, #content tr th, #content thead th {background:none;} <?php }
	if ($mantra_headfontsize != "Default") { ?> #content h1.entry-title, #content h2.entry-title { font-size:<?php echo esc_attr( $mantra_headfontsize ); ?>; }<?php }
	if ($mantra_sidefontsize != "Default") { ?> .widget-area, .widget-area a:link, .widget-area a:visited { font-size:<?php echo esc_attr( $mantra_sidefontsize ); ?>; }<?php }
	if ($mantra_textshadow != "Enable") { ?> #content h1, #content h2, #content h3, #content h4, #content h5, #content h6,
											 #content .entry-title, #site-title a, #site-description { text-shadow:none; moz-text-shadow:none; -webkit-text-shadow:none; }<?php }
	if ($mantra_headerindent == "Enable") { ?> #content h1, #content h2, #content h3, #content h4, #content h5, #content h6 { margin-left:20px;}
											.sticky hgroup { background: url(<?php echo get_template_directory_uri().'/resources/images/icon-featured.png' ; ?>) no-repeat 12px 10px transparent; padding-left: 15px; } <?php } ?>

	#header-container > div { margin-top:<?php echo absint( $mantra_headermargintop ); ?>px; }
	#header-container > div { margin-left:<?php echo absint( $mantra_headermarginleft ); ?>px; } <?php
	if ($mantra_backcolor != "444444") { ?> body { background-color:<?php echo esc_attr( $mantra_backcolor ); ?> !important; }<?php }
	if ($mantra_headercolor != "333333") { ?> #header { background-color:<?php echo esc_attr( $mantra_headercolor ); ?>; }<?php }
	if ($mantra_prefootercolor != "222222") { ?> #footer { background-color:<?php echo esc_attr( $mantra_prefootercolor ); ?>; }<?php }
	if ($mantra_footercolor != "171717") { ?> #footer2 { background-color:<?php echo esc_attr( $mantra_footercolor ); ?>; }<?php }
	if ($mantra_titlecolor != "0D85CC") { ?> #site-title span a { color:<?php echo esc_attr( $mantra_titlecolor ); ?>; }<?php }
	if ($mantra_descriptioncolor != "0D85CC") { ?> #site-description { color:<?php echo esc_attr( $mantra_descriptioncolor ); ?>; }<?php }
	if ($mantra_contentcolor != "333333") { ?> #content, #content p, #content ul, #content ol { color:<?php echo esc_attr( $mantra_contentcolor ); ?>  ;}<?php }
	if ($mantra_linkscolor != "0D85CC") { ?> .widget-area a:link, .widget-area a:visited, a:link, a:visited ,#searchform #s:hover, #container #s:hover, #access a:hover,
											 #wp-calendar tbody td a, #site-info a, #site-copyright a, #access li:hover > a,
											 #access ul ul:hover > a { color:<?php echo esc_attr( $mantra_linkscolor ); ?>; }<?php }
	if ($mantra_hovercolor != "333333") { ?>  a:hover, .entry-meta a:hover, .entry-utility a:hover,
											  .widget-area a:hover { color:<?php echo esc_attr( $mantra_hovercolor ) ; ?>; }<?php }
	if ($mantra_headtextcolor != "333333") { ?> #content .entry-title a, #content .entry-title, #content h1, #content h2, #content h3,
												#content h4, #content h5, #content h6 { color:<?php echo esc_attr( $mantra_headtextcolor ); ?>; }<?php }
	if ($mantra_headtexthover != "000000") { ?> #content .entry-title a:hover { color:<?php echo esc_attr( $mantra_headtexthover ); ?>; }<?php }
	if ($mantra_sideheadbackcolor != "444444") { ?> .widget-title { background-color:<?php echo esc_attr( $mantra_sideheadbackcolor ); ?>; }<?php }
	if ($mantra_sideheadtextcolor != "2EA5FD") { ?> .widget-title { color:<?php echo esc_attr( $mantra_sideheadtextcolor ); ?>; }<?php }

	if ($mantra_magazinelayout == "Enable") { ?> #content article.post{ float:left; width:47%; margin-right:3%; }
												#content article.sticky { margin-right:3%;padding:0; }
												#content article.sticky > * {margin:2%;}
												#content article:nth-of-type(2n+1) {clear: both; } <?php } ?>

	#footer-widget-area .widget-title { color:<?php echo esc_attr( $mantra_footerheader ); ?>; }
	#footer-widget-area a { color:<?php echo esc_attr( $mantra_footertext ); ?>; }
	#footer-widget-area a:hover { color:<?php echo esc_attr( $mantra_footerhover ); ?>; } <?php

	switch ($mantra_menualign) {
		case "center": ?> #access ul { display: table; margin: 0 auto; } <?php break;
		case "right": ?> #access .menu-header, div.menu { float: right; } <?php break;
		default: break;
	} // switch ?>

	#content .wp-caption { background-image:url(<?php echo get_template_directory_uri() . "/resources/images/pins/" . esc_attr($mantra_pin); ?>.png); } <?php
	if ($mantra_sidebullet != "arrow_white") { ?> .widget-area ul ul li { background-image: url(<?php echo get_template_directory_uri() . "/resources/images/bullets/" . esc_attr($mantra_sidebullet); ?>.png); background-position: left calc(2em / 2 - 4px); } <?php }

	if ($mantra_pagetitle == "Hide") { ?> .page h1.entry-title, .home .page h2.entry-title { display:none; } <?php }
	if ($mantra_categtitle == "Hide") { ?> h1.page-title { display:none; } <?php }
	if (($mantra_postdate == "Hide" && $mantra_postcateg == "Hide") || ($mantra_postauthor == "Hide" && $mantra_postcateg == "Hide") ) { ?>.entry-meta .bl_sep { display:none; } <?php }
	if ($mantra_postdate == "Hide") { ?> .entry-meta time.onDate { display:none; } <?php }
	if ($mantra_postcomlink == "Hide") { ?> .entry-meta .comments-link, .entry-meta2 .comments-link { display:none; } <?php }
	if ($mantra_postauthor == "Hide") { ?> .entry-meta .author { display:none; } <?php }
	if ($mantra_postcateg == "Hide") { ?> .entry-meta span.bl_categ, .entry-meta2 span.bl_categ { display:none; } <?php }
	if ($mantra_posttag == "Hide") { ?> .entry-utility span.bl_posted, .entry-meta2 span.bl_tagg,.entry-meta3 span.bl_tagg { display:none; } <?php }
	if ($mantra_postbook == "Hide") { ?> .entry-utility span.bl_bookmark { display:none; } <?php }
	if ($mantra_parmargin) { ?> #content p:not(:last-child), .entry-content ul, .entry-summary ul,
							    .entry-content ol, .entry-summary ol { margin-bottom:<?php echo esc_attr( $mantra_parmargin ); ?>;} <?php }
	if ($mantra_parindent != "0px") { ?>  p {text-indent: <?php echo esc_attr( $mantra_parindent );?>; } <?php }
	if ($mantra_posttime == "Hide") { ?> .entry-meta .entry-time { display:none; } <?php }
	if ($mantra_postmetas == "Hide") { ?> #content .entry-meta, #content .entry-header div.entry-meta2 > * { display:none; } <?php }
	if (($mantra_mobile == "Enable") &&  $mantra_hcontain) { ?> #branding { -webkit-background-size: contain !important; -moz-background-size: contain !important; background-size: contain !important; } <?php } ?>

	#branding { height:<?php echo HEADER_IMAGE_HEIGHT; ?>px ;} <?php
	if ($mantra_hratio) { ?> @media (max-width: 800px) {#branding, #bg_image { min-height:inherit !important; } }<?php }

	return ob_get_clean();
} // mantra_custom_styles()

if ( ! function_exists( 'mantra_frontpage_css' ) ) :
function mantra_frontpage_css() {
	$mantra_options = mantra_get_theme_options();
	extract( $mantra_options );
	ob_start(); ?>
	/* Mantra frontpage CSS */
	<?php if ($mantra_fronthideheader) {?> #branding { display: none; } <?php }
		  if ($mantra_fronthidemenu) {?> #access { display: none; } <?php }
		  if ($mantra_fronthidewidget) {?> #colophon { display: none; } <?php }
		  if ($mantra_fronthidefooter) {?> #footer2 { display: none; } <?php }
		  if ($mantra_fronthideback) {?> #main { background: none; } <?php } ?>

	#slider {
		max-width: <?php echo absint( $mantra_fpsliderwidth )?>px;
		max-height: <?php echo absint( $mantra_fpsliderheight ) ?>px;
		border: <?php echo absint( $mantra_fpsliderborderwidth ) . 'px solid ' . esc_attr($mantra_fpsliderbordercolor) ?>;
	}

	.column-image {
		border: <?php echo absint( $mantra_fpsliderborderwidth/2 ) . 'px solid ' . esc_attr($mantra_fpsliderbordercolor) ?>;
	}

	#front-text1 h2,
	#front-text2 h2 {
		color: <?php echo esc_attr( $mantra_fronttitlecolor ); ?>;
	}

	.column-image {
		max-height: <?php echo absint( $mantra_colimageheight ) ?>px;
	}

	#front-columns h3 a {
		color: <?php echo esc_attr( $mantra_fronttitlecolor ) ?>;
	}

	<?php
	switch($mantra_fpslidernav) {
		case "Bullets":
			break;
		case "Numbers": ?>
			.theme-default .nivo-controlNav { bottom:-40px; }
			.theme-default .nivo-controlNav a { background: none; text-decoration:underline; text-indent:0; } <?php
			break;
		case "None": ?>
			.theme-default .nivo-controlNav { display:none; } <?php
			break;
	}

	return ob_get_clean();
} // mantra_frontpage_css()
endif;

function mantra_customcss() {
	$options = mantra_get_theme_options();

	if ( !empty($options['mantra_customcss']) ) {
		return htmlspecialchars_decode( $options['mantra_customcss'], ENT_QUOTES );
	}
} // mantra_customcss()


function mantra_customjs() {
	$options = mantra_get_theme_options();

	if ( !empty($options['mantra_customjs']) ) { ?>
		<script type="text/javascript">
		<?php echo htmlspecialchars_decode( $options['mantra_customjs'], ENT_QUOTES ); ?>
		</script> <?php
	}
} // mantra_customjs()

// FIN
