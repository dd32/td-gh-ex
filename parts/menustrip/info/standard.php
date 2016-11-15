<p id="infoClose" class="holderclose"><span><span class="fa fa-times"></span></span></p>
<div id="infoform">
`<?PHP
	if(get_theme_mod("antonine[info]","on")=="on"){
?>
<h1><span class="fa fa-info"></span> = <?PHP echo __("Information", "antonine"); ?></h1><p><?PHP echo __(" and shows this page", "antonine"); ?></p>
<?PHP
	}
	if(get_theme_mod("antonine[menu]","on")=="on"){
?>
<h1><span class="fa fa-bars"></span> = <?PHP echo __("Menu", "antonine"); ?></h1><p><?PHP echo __(" and shows a menu", "antonine"); ?></p>
<?PHP
	}
	if(get_theme_mod("antonine[search]","on")=="on"){
?>
<h1><span class="fa fa-search"></span>  = <?PHP echo __("Search", "antonine"); ?></h1><p><?PHP echo __(" and shows a search box", "antonine"); ?></p>
<?PHP
	}
	if(get_theme_mod("antonine[filters]","on")=="on"){
?>
<h1><span class="fa fa-sliders"></span> = <?PHP echo __("Filter", "antonine"); ?></h1><p><?PHP echo __(" and shows a site filter (only on the home page)", "antonine"); ?></p>
<?PHP
	}
	if(get_theme_mod("antonine[comments]","on")=="on"){
?>
<h1><span class="fa fa-commenting"></span> = <?PHP echo __("Comments", "antonine"); ?></h1><p><?PHP echo __(" and shows the 50 most recent comments", "antonine"); ?></p>

<?PHP
	}
	if(get_theme_mod("antonine[widgets]","on")=="on"){
?>
<h1><span class="fa fa-sitemap"></span> = <?PHP echo __("Extra Info", "antonine"); ?></h1><p><?PHP echo __(" and shows extra site information", "antonine"); ?></p>

<?PHP
	}
	if(get_theme_mod("antonine[files]","on")=="on"){
?>
<h1><span class="fa fa-folder"></span> = <?PHP echo __("Files", "antonine"); ?></h1><p><?PHP echo __(" and shows files hosted on the site", "antonine"); ?></p>

<?PHP
	}
	if(get_theme_mod("antonine[accessibility]","on")=="on"){
?>
<h1><span class="fa fa-eye"></span>= <?PHP echo __("Accessibility", "antonine"); ?></h1><p><?PHP echo __(" and shows accessibility options", "antonine"); ?></p>

<?PHP
	}
?>
</div>