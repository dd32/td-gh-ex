<a href="#menu" class="menu-link mdl-button mdl-js-button mdl-button--fab"><i class="fa fa-bars"></i></a>
<nav id="menu" class="panel" role="navigation">
    <?php
    // Get the Appropriate Walker First.
    wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_class'	=> 'mdl-list', 'walker'	=> new Adviso_Mobile_Menu ) ); ?>
    
</nav><!-- #site-navigation -->