`<?PHP
	if(get_theme_mod("info")=="on"){
?>
<a><div id="infoShow"><span class="fa fa-info"></span></div></a>
<?PHP
	}
	if(get_theme_mod("menu")=="on"){
		if ( has_nav_menu( "primary" ) ) {
			
			?>
			<div id="menuShow"><span class="fa fa-bars"></span></div>
			<?PHP
					
		}else{
		
		}
	}
	if(get_theme_mod("share")=="on"){
?>
<a><div id="shareShow"><span class="fa fa-share-alt"></span></div></a>
<?PHP
	}
	if(get_theme_mod("search")=="on"){
?>
<a><div id="searchShow"><span class="fa fa-search"></span></div></a>
<?PHP
	}
	if(get_theme_mod("updates")=="on"){
?>
<a><div id="updatesShow"><span class="fa fa-globe"></span></div></a>
<?PHP
	}
	if(get_theme_mod("filters")=="on"){
		if(is_home()){
?>
<a><div id="filterShow"><span class="fa fa-sliders"></span></div></a>
<?PHP
		}
	}
	if(get_theme_mod("comments")=="on"){
?>
<a><div id="commmentsShow"><span class="fa fa-commenting"></span></div></a>
<?PHP
	}
	if(get_theme_mod("widgets")=="on"){
?>
<a><div id="widgetsShow"><span class="fa fa-sitemap"></span></div></a>
<?PHP
	}
	if(get_theme_mod("files")=="on"){
?>
<a><div id="filesShow"><span class="fa fa-folder"></span></div></a>
<?PHP
	}
	if(get_theme_mod("accessibility")=="on"){
?>
<a><div id="accessShow"><span class="fa fa-eye"></span></div></a>
<?PHP
	}
	if(get_theme_mod("subscribe")=="on"){
?>
<a><div id="subscribeShow"><span class="fa fa-envelope"></span></div></a>
<?PHP
	}
?>