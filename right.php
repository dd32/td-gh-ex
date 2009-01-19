<div id="right">

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(2) ) : ?>
			
<h2>Search</h2>
<?php include (TEMPLATEPATH . '/searchform.php'); ?>


<h2>Main Menu</h2>
<ul>
<?php wp_list_pages('title_li='); ?>
</ul>

<h2>Meta</h2>
<ul>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
		<?php wp_meta(); ?>
</ul>



<?php endif; ?>

</div>

