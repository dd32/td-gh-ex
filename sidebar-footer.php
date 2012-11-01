<div id="footer-bar1" class="four columns">
<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) { ?>
					<ul class="xoxo">
						<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
					</ul>
					
					<?php } else { ?>
			
			<ul class="xoxo">
						<li class="widget-container"><h3 class="widget-title">Meta</h3>			<ul>
			<li><a href="http://localhost/wordpress/wp-admin/">Site Admin</a></li>			<li><a href="http://localhost/wordpress/wp-login.php?action=logout&#038;_wpnonce=9bec108013">Log out</a></li>
			<li><a href="http://localhost/wordpress/?feed=rss2" title="Syndicate this site using RSS 2.0">Entries <abbr title="Really Simple Syndication">RSS</abbr></a></li>
			<li><a href="http://localhost/wordpress/?feed=comments-rss2" title="The latest comments to all posts in RSS">Comments <abbr title="Really Simple Syndication">RSS</abbr></a></li>
			<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress.org</a></li>
						</ul>	</li>	</ul>			
					
<?php } ?>

</div><!--footer 1 end-->



<div id="footer-bar2" class="four columns">
<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) { ?>
					<ul class="xoxo">
						<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
					</ul>
<?php } else { ?>
		<ul class="xoxo">
	<li class="widget-container"><h3 class="widget-title">About us</h3><div class="textwidget">This is a text widget. Put your own widget by going to appeareance widget area. Nullam posuere felis a lacus tempor eget dignissim arcu adipiscing. Donec est est, rutrum vitae bibendum vel, suscipit non metus. Nullam posuere felis a lacus tempor eget dignissim arcu adipiscing. Donec est est, rutrum vitae bibendum vel, suscipit non metus</div>
		</li></ul>
				
<?php } ?>
</div><!--footer 2 end-->


<div id="footer-bar3" class="four columns">
<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) { ?>
					<ul class="xoxo">
						<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
					</ul>
					
	<?php } else { ?>
		<ul class="xoxo">
	<li class="widget-container"><h3 class="widget-title">Contact us</h3><div class="textwidget">This is a text widget. Put your own widget by going to appeareance widget area. Nullam posuere felis a lacus tempor eget dignissim arcu adipiscing. Donec est est, rutrum vitae bibendum vel, suscipit non metus. Nullam posuere felis a lacus tempor eget dignissim arcu adipiscing. Donec est est, rutrum vitae bibendum vel, suscipit non metus</div>
		</li></ul>
				
<?php } ?>
</div><!--footer 3 end-->