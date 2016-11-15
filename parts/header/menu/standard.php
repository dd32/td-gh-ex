`<?PHP
	if(get_theme_mod("antonine[info]","on")=="on"){
?>
<a><div id="infoShow"><span class="fa fa-info"></span></div></a>
<?PHP
	}
	if(get_theme_mod("antonine[menu]","on")=="on"){
		if ( has_nav_menu( "primary" ) ) {
			
			?>
			<div id="menuShow"><span class="fa fa-bars"></span></div>
			<?PHP
					
		}else{
		
		}
	}
	if(get_theme_mod("antonine[search]","on")=="on"){
?>
<a><div id="searchShow"><span class="fa fa-search"></span></div></a>
<?PHP
	}
	if(get_theme_mod("antonine[filters]","on")=="on"){
		if(is_home()){
?>
<a><div id="filterShow"><span class="fa fa-sliders"></span></div></a>
<?PHP
		}
	}
	if(get_theme_mod("antonine[comments]","on")=="on"){
?>
<a><div id="commmentsShow"><span class="fa fa-commenting"></span></div></a>
<?PHP
	}
	if(get_theme_mod("antonine[widgets]","on")=="on"){
?>
<a><div id="widgetsShow"><span class="fa fa-sitemap"></span></div></a>
<?PHP
	}
	if(get_theme_mod("antonine[files]","on")=="on"){
?>
<a><div id="filesShow"><span class="fa fa-folder"></span></div></a>
<?PHP
	}
	if(get_theme_mod("antonine[accessibility]","on")=="on"){
?>
<a><div id="accessShow"><span class="fa fa-eye"></span></div></a>
<?PHP
	}
?>