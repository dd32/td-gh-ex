			<div class="span-24 header">
				<div class="paddings">
					<div class="span-16">
						<?php if (is_home()) { ?>
							<h1 class="logo"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
						<?php } else { ?>
							<span class="logo"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></span>
						<?php } ?>
						<span class="tagline"><?php bloginfo('description'); ?></span>
					</div>
					<div class="icons">
						<a href="<?php bloginfo('rss2_url'); ?>" class="fr last"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/rss-icon.gif" alt="<?php _e('RSS icon', 'default'); ?>" /></a>
						<a href="mailto:<?php echo antispambot(get_option('admin_email')); ?>" class="fr"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/email-icon.gif" alt="<?php _e('Email icon', 'default'); ?>" /></a>
					</div>
					<div class="clear"></div>
				</div>
			</div>

			<div class="span-24 menu">
				<ul class="menu-wrapper">
					<li class="first <?php if ( is_home() ) { ?>current_page_item<?php } ?>"><a href="<?php echo get_option('home'); ?>/" title="<?php _e('A link to home page', 'default'); ?>"><?php _e('Home', 'default'); ?></a></li>
					<?php wp_list_pages('sort_column=menu_order&depth=1&title_li=');?>
				</ul>
			</div>
