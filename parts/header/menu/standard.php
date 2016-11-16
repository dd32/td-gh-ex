`<?PHP
	if(get_theme_mod("antonine_info","on")=="on"){
?>
<a><div id="infoShow"><span class="fa fa-info"><strong class="accessibility_hidden"><?PHP echo __("info","antonine"); ?></strong></span></div></a>
<?PHP
	}
	if(get_theme_mod("antonine_menu","on")=="on"){
		if ( has_nav_menu( "primary" ) ) {
			
			?>
			<div id="menuShow"><span class="fa fa-bars"></span><strong class="accessibility_hidden"><?PHP echo __("menu","antonine"); ?></strong></div>
			<?PHP
					
		}else{
		
		}
	}
	if(get_theme_mod("antonine_search","on")=="on"){
?>
<a><div id="searchShow"><span class="fa fa-search"><strong class="accessibility_hidden"><?PHP echo __("search","antonine"); ?></strong></span></div></a>
<?PHP
	}
	if(get_theme_mod("antonine_filters","on")=="on"){
		if(is_home()){
?>
<a><div id="filterShow"><span class="fa fa-sliders"><strong class="accessibility_hidden"><?PHP echo __("filter","antonine"); ?></strong></span></div></a>
<?PHP
		}
	}
	if(get_theme_mod("antonine_comments","on")=="on"){
?>
<a><div id="commmentsShow"><span class="fa fa-commenting"><strong class="accessibility_hidden"><?PHP echo __("comments","antonine"); ?></strong></span></div></a>
<?PHP
	}
	if(get_theme_mod("antonine_widgets","on")=="on"){
?>
<a><div id="widgetsShow"><span class="fa fa-sitemap"><strong class="accessibility_hidden"><?PHP echo __("widgets","antonine"); ?></strong></span></div></a>
<?PHP
	}
	if(get_theme_mod("antonine_files","on")=="on"){
?>
<a><div id="filesShow"><span class="fa fa-folder"><strong class="accessibility_hidden"><?PHP echo __("files","antonine"); ?></strong></span></div></a>
<?PHP
	}
?>