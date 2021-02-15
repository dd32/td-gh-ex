<nav id="site-navigation" class="main-navigation" role="navigation">
	<span class="toggle-menu" aria-controls="primary-menu" aria-expanded="false">
		 <span class="screen-reader-text">
			<?php esc_html_e('Primary Menu', 'advance-blog'); ?>
		</span>
		<i class="ham"></i>
	</span>

    <?php wp_nav_menu(array(
        'theme_location' => 'menu-1',
        'menu_id' => 'primary-menu',
        'container' => 'div',
        'container_class' => 'menu'
    )); ?>

    <div class="social-icons">
        <?php
        wp_nav_menu(
            array('theme_location' => 'social',
                'link_before' => '<span>',
                'link_after' => '</span>',
                'menu_id' => 'social-menu',
                'fallback_cb' => false,
                'menu_class' => false
            )); ?>
    </div>

    <div class="nav-icon">
        <button type="button" class="search-icon">
            <i class="ion-ios-search-strong"></i>
        </button>
    </div>

</nav>

<div id="popup-search" class="popup-search">
    <a href="javascript:void(0)" class="searchbar-skip-link"></a>
    <a href="javascript:void(0)" class="esc-search">
        <span></span>
        <span></span>
    </a>
    <div class="popup-search-wrapper">
        <div class="popup-search-align">
            <?php get_search_form(); ?>
        </div>
    </div>
</div>
