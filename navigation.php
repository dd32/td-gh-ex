    	<!-- NAVIGATION -->
        <div id="navigation">
            <?php if(has_nav_menu('primary-menu', 'autoadjust')) : ?>
                <!-- PRIMARY MENU -->
                <div id="primary-menu">
                    <div class="container row">
                        <?php wp_nav_menu(array(
                            'container'			=> false,
                            'fallback_cb'		=> false,
                            'items_wrap'		=> '<ul class="%2$s">%3$s</ul>',
                            'menu_class'		=> 'drop-down-menu last col width-100',
                            'theme_location'	=> 'primary-menu'
                        )); ?>
                    </div>
                </div>
                <!-- PRIMARY MENU END -->
			<?php endif;
			if(has_nav_menu('secondary-menu', 'autoadjust')) : ?>
                <!-- SECONDARY MENU -->
                <div id="secondary-menu">
                    <div class="container row">
                        <?php wp_nav_menu(array(
                            'container'			=> false,
                            'fallback_cb'		=> false,
                            'items_wrap'		=> '<ul class="%2$s">%3$s</ul>',
                            'menu_class'		=> 'horizontal-aligned-menu last col width-100',
                            'theme_location'	=> 'secondary-menu'
                        )); ?>
                    </div>
                </div>
                <!-- SECONDARY MENU END -->
            <?php endif; ?>
        </div>
        <!-- NAVIGATION END -->