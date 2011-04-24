<?php
/*

	Section: Navigation
	Author: Tyler Cunningham
	Description: Creates site navigation
	Version: 0.1
	
*/

	$homeimage		= get_option('if_menuicon') ? '': 'default';

?>
<?php if ($homeimage == 'default' ):?>
<div id="homebutton"><a href="<?php echo home_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/images/home.png?>" alt="Home" /></a></div>
<?php endif;?>
<?php if ($homeimage != 'default' ):?>
<div id="homebutton"><a href="<?php echo home_url(); ?>/"><img src="<?php echo $homeimage?>" alt="Home" /></a></div>
<?php endif;?>
    <div id="navwrapper">
        <?php wp_nav_menu( array(
	    'theme_location' => 'header-menu', // Setting up the location for the main-menu, Main Navigation.
	    'menu_class' => 'sf-menu', //Adding the class for dropdowns
	    'container_id' => 'navwrap', //Add CSS ID to the containter that wraps the menu.
	    'fallback_cb' => 'menu_fallback', //if wp_nav_menu is unavailable, WordPress displays wp_page_menu function, which displays the pages of your blog.
	    )
	);
    ?>
    </div>
<div id="searchbar">
<form method="get" class="searchform" action="<?php echo home_url(); ?>/">
		<div><input type="text" name="s" class="s" value="Search" id="searchsubmit" onfocus="if (this.value == 'Search') this.value = '';" /></div>
	<div><input type="submit" class="searchsubmit" value="" /></div>
</form>
</div>
    
<!--end nav.php-->