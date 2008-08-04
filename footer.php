<hr />
<div id="footer">
<div class="left-col">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(3) ) : else : ?>

<?php 
$numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish'");
if (0 < $numposts) $numposts = number_format($numposts); 

$numcmnts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'");
if (0 < $numcmnts) $numcmnts = number_format($numcmnts);
?>
<h2>Welcome to <?php bloginfo('name'); ?></h2> 
<p>There are <?php echo $numposts ;?> posts and <?php echo $numcmnts ;?> comments so far. Feel invited to browse the <a href="/archive/">archives</a>, read the <a href="/about/">about</a> or comment on the latest post.</p>
<br />
<p>Copyright &copy; <?php echo date("Y"); ?> <a title="Copyright" href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a>  |  <?php bloginfo('name'); ?> is proudly powered by 
<a href="http://wordpress.org">WP</a>.</p>
<p>Created by <a title="The support page for your theme." href="http://3oneseven.com/">miloIIIIVII</a> | <?php wp_loginout(); ?> | <img src="<?php bloginfo('stylesheet_directory'); ?>/images/rss.gif" alt="" /><a href="feed:<?php bloginfo('rss2_url'); ?>" class="rss"> Entries RSS</a> | <img src="<?php bloginfo('stylesheet_directory'); ?>/images/rss.gif" alt="" /><a href="feed:<?php bloginfo('comments_rss2_url'); ?>" class="rss"> Comments RSS</a>.
<br /><?php echo $wpdb->num_queries; ?> queries. <?php timer_stop(1); ?> seconds.</p>

<?php endif; ?>
</div> 

<div class="middle-col">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(4) ) : else : ?>

<h2>Recent entries</h2>
		       <ul>
		       <?php get_archives('postbypost','8'); ?>  
		       </ul>

<?php endif; ?>
</div>
<div class="right-col">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(5) ) : else : ?>

<h2>Categories</h2>
		       <ul>
	<?php wp_list_cats('sort_column=name&hide_empty=0&optioncount=0&hierarchical=1'); ?>
		        </ul>
	
<?php endif; ?>		
</div>
<?php do_action('wp_footer'); ?>
</div></div>
</body>
</html>