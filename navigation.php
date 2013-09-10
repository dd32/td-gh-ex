<?php if(!defined('ABSPATH')) exit; //Exit if accessed directly
	if(has_nav_menu('main_menu')) : ?>
        <!-- Navigation -->
        <div id="navigation">
            <div class="row">
                <div class="col width-100 last">
                    <?php wp_nav_menu(array(
						'theme_location'  => 'main_menu',
						'menu'            => '',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'menu',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => ''
					)); ?>
                </div>
            </div>    
        </div>
        <!-- Navigation end -->
	<?php endif; ?>