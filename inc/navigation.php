<nav id="site-navigation" class="main-navigation navbar navbar-expand-lg navbar-light">	
<div class="container">		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#optimizeprimary" aria-controls="optimizeprimary" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
		
			<?php
			wp_nav_menu( array(
				'theme_location' => 'optimize-navigation',
				'menu_id'        => 'primary-menu',
				   'menu'            => '',
        'container'       => 'div',
        'container_class' => 'collapse navbar-collapse justify-content-md-left',
        'container_id'    => 'optimizeprimary',
        'menu_class'      => 'menuTest',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        //'before'          => 'BeforeTest',
       // 'after'           => 'AfterTEst',
       // 'link_before'     => 'LinkBefore',
        //'link_after'      => 'LinkAfter',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'item_spacing'    => 'preserve',
        'depth'           => 0,
      //  'walker'          => '',
        
				
				
			) );
			?>
		 </div>
		</nav><!-- #site-navigation -->