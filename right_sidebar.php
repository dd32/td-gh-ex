<div id="right_sidebar">

<ul>

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
		
	<li><h2><?php _e('Calendar'); ?></h2>
		<?php get_calendar(); ?>
	</li>
        	
	<li>
               <h2><?php _e('Tags'); ?></h2>
		<p><?php wp_tag_cloud(''); ?></p>
	</li>

        <li><h2><?php _e('Subscribe'); ?></h2>
	   <ul>
		<li><a class="rss" href="feed:<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>

		<li><a class="rss" href="feed:<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>

	   </ul>
	</li>


   <li><h2><?php _e('Meta'); ?></h2>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
		</ul>
	</li>

       <li>
		<?php include ('searchform.php'); ?>
	</li>
     	
<?php endif; ?>

</ul>

</div>