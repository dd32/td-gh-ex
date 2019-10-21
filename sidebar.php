	<aside id="hjylWidget">
		<ul>
			<li class="twitter_rss widget">
			<?php 
				global $bb10_theme_options;
				
				$twitter_url = isset($bb10_theme_options['twitter_url']) ? esc_url( $bb10_theme_options['twitter_url'] ) : ''; 
				$twitter_name = isset($bb10_theme_options['twitter_name']) ? esc_attr( $bb10_theme_options['twitter_name'] ) : 'Follow me on twitter!';				
				$weibo_name = isset($bb10_theme_options['weibo_name']) ? esc_attr( $bb10_theme_options['weibo_name'] ) : 'WeiBo'; 
				$weibo_url = isset($bb10_theme_options['weibo_url']) ? esc_url( $bb10_theme_options['weibo_url'] ) : '';				
				$email_name = isset($bb10_theme_options['email_name']) ? esc_attr( $bb10_theme_options['email_name'] ) : 'Email to me!'; 
				$email_url = isset($bb10_theme_options['email_url']) ? esc_url( $bb10_theme_options['email_url'] ) : '';				
				$rss_name = isset($bb10_theme_options['rss_name']) ? esc_attr( $bb10_theme_options['rss_name'] ) : 'Subscribe me!'; 
				$rss_url = isset($bb10_theme_options['rss_url']) ? esc_url( $bb10_theme_options['rss_url'] ) : '';				
				$qrcode_name = isset($bb10_theme_options['qrcode_name']) ? esc_attr( $bb10_theme_options['qrcode_name'] ) : 'Add me on WeChat!'; 
				$qrcode_url = isset($bb10_theme_options['qrcode_url']) ? esc_url( $bb10_theme_options['qrcode_url'] ) : '';
			?>
				<?php if ($twitter_url != '') { ?>
					<a href="<?php echo $twitter_url; ?>" rel="bookmark" title="<?php echo $twitter_name; ?>"><span><?php echo hjyl_get_svg( array( 'icon' => 'twitter') ); ?></span></a>
				<?php } ?>
				<?php if ($weibo_url != '') { ?>
					<a href="<?php echo $weibo_url; ?>" rel="bookmark" title="<?php echo $weibo_name; ?>"><span><?php echo hjyl_get_svg( array( 'icon' => 'weibo') ); ?></span></a>
				<?php } ?>
				<?php if ($email_url != '') { ?>
					<a href="<?php echo $email_url; ?>" rel="bookmark" title="<?php echo $email_name; ?>"><span><?php echo hjyl_get_svg( array( 'icon' => 'email') ); ?></span></a>
				<?php } ?>
				<?php if ($rss_url != '') { ?>
					<a href="<?php echo $rss_url; ?>" rel="bookmark" title="<?php echo $rss_name; ?>"><span><?php echo hjyl_get_svg( array( 'icon' => 'feed') ); ?></span></a>
				<?php } ?>
				<?php if ($qrcode_url != '') { ?>
				<span class="qrcode"><?php echo hjyl_get_svg( array( 'icon' => 'qrcode') ); ?></span>
				<img src="<?php echo $qrcode_url; ?>" width="258" height="258" alt="<?php echo $qrcode_name; ?>" class="qrcodeimg" />
				<?php } ?>
			</li>
			<div class="clear"></div>
			<?php if (is_home()) { ?>
				<?php if ( !dynamic_sidebar('home') ) : ?>
					<li id="archives" class="widget widget_archive">
						<h2><span><?php _e( 'Archives', 'bb10' ); ?></span></h2>
						<ul>
							<?php wp_get_archives( array( 'type' => 'monthly', 'show_post_count' => true ) ); ?>
						</ul>
					</li>

					<li id="meta" class="widget">
						<h2><span><?php _e( 'Meta', 'bb10' ); ?></span></h2>
						<ul>
							<?php wp_register(); ?>
							<li><?php wp_loginout(); ?></li>
							<?php wp_meta(); ?>
						</ul>
					</li>
				<?php endif; ?>
			<?php } elseif( is_single() ) { ?>
				<?php dynamic_sidebar( 'single' ); ?>
			<?php } elseif( is_404() ) { ?>
				<?php dynamic_sidebar( 'error' ); ?>
			<?php } else { ?>
				<?php dynamic_sidebar( 'other' ); ?>
			<?php } ?>
		</ul>
	</aside><!-- #hjylWidget-->