<div id="footer-bar1" class="large-3 columns">
<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) { ?>
					<ul class="xoxo">
						<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
					</ul>
					
					<?php } else { ?>
			
			<ul class="xoxo">
			<li class="widget-container"><h3 class="widget-title"><?php _e( 'Meta', 'agency' ); ?></h3>	<ul>
			<li><?php _e( 'Site Admin', 'agency' ); ?></li>			<li><?php _e( 'Log out', 'agency' ); ?></li>
			<li><?php _e( 'Entries ', 'agency' ); ?><abbr title="<?php _e('Really Simple Syndication', 'agency');?>"><?php _e( 'RSS', 'agency' ); ?></abbr></li>
			<li><?php _e( 'Comments ', 'agency' ); ?><abbr title="<?php _e('Really Simple Syndication', 'agency');?>"><?php _e( 'RSS', 'agency' ); ?></abbr></li>
			<li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.','agency'); ?>"><?php _e( 'WordPress.org', 'agency' ); ?></a></li>
						</ul>	</li>	</ul>			
					
<?php } ?>

</div><!--footer 1 end-->



<div id="footer-bar2" class="large-3 columns">
<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) { ?>
					<ul class="xoxo">
						<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
					</ul>
<?php } else { ?>
		<ul class="xoxo">
	<li class="widget-container"><h3 class="widget-title"><?php _e( 'About us', 'agency' ); ?></h3><div class="textwidget">
	<?php _e( 'This is a text widget. Put your own widget by going to appeareance widget area. Nullam posuere felis a lacus tempor eget dignissim arcu adipiscing. ', 'agency' ); ?></div>
		</li></ul>
				
<?php } ?>
</div><!--footer 2 end-->


<div id="footer-bar3" class="large-3 columns">
<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) { ?>
					<ul class="xoxo">
						<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
					</ul>
					
	<?php } else { ?>
		<ul class="xoxo">
	<li class="widget-container"><h3 class="widget-title"><?php _e( 'Our Services', 'agency' ); ?></h3><div class="textwidget"><?php _e( 'This is a text widget. Put your own widget by going to appeareance widget area. Nullam posuere felis a lacus tempor eget dignissim arcu adipiscing. ', 'agency' ); ?></div>
		</li></ul>
				
<?php } ?>
</div><!--footer 3 end-->

<div id="footer-bar4" class="large-3 columns">
<?php if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) { ?>
					<ul class="xoxo">
						<?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
					</ul>
					
	<?php } else { ?>
		<ul class="xoxo">
	<li class="widget-container"><h3 class="widget-title"><?php _e( 'Contact us', 'agency' ); ?></h3><div class="textwidget">
	<?php _e( 'This is a text widget. Put your own widget by going to appeareance widget area.', 'agency' ); ?></div>
		</li></ul>
				
<?php } ?>
</div><!--footer 4 end-->