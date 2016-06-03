<p id="infoClose" class="holderclose"><span><span class="fa fa-times"></span></span></p>
<div id="infoform">
`<?PHP
	if(get_theme_mod("info")=="on"){
?>
<h1><span class="fa fa-info"></span> = <?PHP echo __("Information", "antonine"); ?></h1><p><?PHP echo __(" and shows this page", "antonine"); ?></p>
<?PHP
	}
	if(get_theme_mod("menu")=="on"){
?>
<h1><span class="fa fa-bars"></span> = <?PHP echo __("Menu", "antonine"); ?></h1><p><?PHP echo __(" and shows a menu", "antonine"); ?></p>
<?PHP
	}
	if(get_theme_mod("share")=="on"){
?>
<h1><span class="fa fa-share-alt"></span> = <?PHP echo __("Sharing", "antonine"); ?></h1><p><?PHP echo __(" and shows sharing options", "antonine"); ?></p>
<?PHP
	}
	if(get_theme_mod("search")=="on"){
?>
<h1><span class="fa fa-search"></span>  = <?PHP echo __("Search", "antonine"); ?></h1><p><?PHP echo __(" and shows a search box", "antonine"); ?></p>
<?PHP
	}
	if(get_theme_mod("updates")=="on"){
?>
<h1><span class="fa fa-globe"></span> = <?PHP echo __("Updates", "antonine"); ?></h1><p><?PHP echo __(" and shows site updates, and will turn red when new ones exist", "antonine"); ?></p>
<?PHP
	}
	if(get_theme_mod("filters")=="on"){
?>
<h1><span class="fa fa-sliders"></span> = <?PHP echo __("Filter", "antonine"); ?></h1><p><?PHP echo __(" and shows a site filter (only on the home page)", "antonine"); ?></p>
<?PHP
	}
	if(get_theme_mod("comments")=="on"){
?>
<h1><span class="fa fa-commenting"></span> = <?PHP echo __("Comments", "antonine"); ?></h1><p><?PHP echo __(" and shows the 50 most recent comments", "antonine"); ?></p>

<?PHP
	}
	if(get_theme_mod("widgets")=="on"){
?>
<h1><span class="fa fa-sitemap"></span> = <?PHP echo __("Extra Info", "antonine"); ?></h1><p><?PHP echo __(" and shows extra site information", "antonine"); ?></p>

<?PHP
	}
	if(get_theme_mod("files")=="on"){
?>
<h1><span class="fa fa-folder"></span> = <?PHP echo __("Files", "antonine"); ?></h1><p><?PHP echo __(" and shows files hosted on the site", "antonine"); ?></p>

<?PHP
	}
	if(get_theme_mod("accessibility")=="on"){
?>
<h1><span class="fa fa-eye"></span>= <?PHP echo __("Accessibility", "antonine"); ?></h1><p><?PHP echo __(" and shows accessibility options", "antonine"); ?></p>

<?PHP
	}
	if(get_theme_mod("subscribe")=="on"){
?>
<h1><span class="fa fa-envelope"></span> = <?PHP echo __("Subscription", "antonine"); ?></h1><p><?PHP echo __(" and shows information on subscribing to this site", "antonine"); ?></p>

<?PHP
	}
?>
</div>