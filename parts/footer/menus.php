<script>(function(){document.documentElement.className='js'})();</script>
<?php
	if(get_theme_mod("info")=="on"){
?>
<div id="navMenuHolder" class="holder">
	<p id='menuClose' class="holderclose"><span><span class="fa fa-times"></span></span></p>
	<nav id="primary-navigation" class="site-navigation nav-menu-standard" role="navigation">
		<?PHP

		wp_nav_menu( 
				array( 
					'theme_location' => 'primary', 
					'menu_class' => 'nav-menu-standard',
					'walker' => new Walker_Menu_Antonine(),
				)
			);

		?>
	</nav>
</div>
<?PHP
	}
	if(get_theme_mod("share")=="on"){
?>
<?PHP
	get_template_part('parts/menustrip/share/standard');
?>
<?PHP
	}
	if(get_theme_mod("search")=="on"){
?>
<div id="searchHolder" class="holder">
	<div id="searchBar" class="holderbar">
		<?PHP
			get_template_part('parts/menustrip/search-form/standard');
		?>
	</div>
</div>
<?PHP
	}
	if(get_theme_mod("accessibility")=="on"){
?>
<div id="accessHolder" class="holder">
	<div id="accessBar" class="holderbar">
		<?PHP
			get_template_part('parts/menustrip/accessibility/standard');
		?>
	</div>
</div>
<?PHP
	}
	if(is_home()){
		if(get_theme_mod("filters")=="on"){
?>
<div id="filterHolder" class="holder">
	<p id='filterClose' class="holderclose"><span><span class="fa fa-times"></span></span></p>
	<div id="filterBar" class="holderbar">
		<?PHP
			get_template_part('parts/menustrip/filter-form/standard');
		?>
	</div>
</div>
<?PHP
		}
	}
	if(get_theme_mod("comments")=="on"){
?>
<div id="commentsHolder" class="holder">
	<div id="commentsBar" class="holderbar">
		<?PHP
			get_template_part('parts/menustrip/recent-comments/standard');
		?>
	</div>
</div>
<?PHP
	}
	if(get_theme_mod("info")=="on"){
?>
<div id="infoHolder" class="holder">
	<div id="infoBar" class="holderbar">
		<?PHP
			get_template_part('parts/menustrip/info/standard');
		?>
	</div>
</div>
<?PHP
	}
	if(get_theme_mod("subscribe")=="on"){
?>
<div id="subscribeHolder" class="holder">
	<div id="subscribeBar" class="holderbar">
		<?PHP
			get_template_part('parts/menustrip/subscribe/standard');
		?>
	</div>
</div>
<?PHP
	}
	if(get_theme_mod("updates")=="on"){
?>
<div id="updatesHolder" class="holder">
	<div id="updatesBar" class="holderbar">
		<?PHP
			get_template_part('parts/menustrip/update/standard');
		?>
	</div>
</div>
<?PHP
	}
	if(get_theme_mod("widgets")=="on"){
?>
<div id="widgetsHolder" class="holder">
	<div id="widgetsBar" class="holderbar">
		<?PHP
			get_template_part('parts/menustrip/widgets/standard');
		?>
	</div>
</div>
<?PHP
	}
	if(get_theme_mod("files")=="on"){
?>
<div id="filesHolder" class="holder">
	<div id="filesBar" class="holderbar">
		<?PHP
			get_template_part('parts/menustrip/files/standard');
		?>
	</div>
</div>
<?PHP
	}
?>
<div id="menuStrip">
<?PHP	
	get_template_part( 'parts/header/menu/standard'); 
?>
</div>
<div id="previewHolder">
	<div id="previewHolderContent">
		<article class="home-page content_preview">
			<header class="entry-header">
				<div class="title-holder">
					<p id="previewClose"><span><span class="fa fa-times"></span></span></p>
					<h1 id="previewTitle" class="entry-title"><?PHP echo __("Preview title will appear here", "antonine"); ?></h1>
				</div>
				<div class="content-holder">
					<div id="previewContent" class="entry-content-index">
					</div>
				</div><!-- .entry-content -->	
			</header><!-- .entry-header -->
		</article><!-- #post-## -->
	</div>
</div>