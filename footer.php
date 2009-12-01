	</div><!-- /c1 -->

	<div id="c2">

<?php include(TEMPLATEPATH."/sidebar.php");?>

	</div><!-- /c2 -->

	</div><!-- /innerwrap -->

</div><!-- /main -->

<div class="navigation">
	<div class="innerwrap">
		<div id="search">
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</div>
		<?php if (function_exists('wp_pagenavi')) { ?><?php wp_pagenavi(); ?><?php } ?>
	</div>
</div>

<div id="footer">

	<div class="innerwrap">

		<ul id="widgets-bottom">

		<?php if ( !function_exists('dynamic_sidebar')
		|| !dynamic_sidebar('bottom') ) : ?>
		<?php endif; ?>

		</ul>

		<div id="footer-info">
			<?php bloginfo('name'); ?> is powered by <a href="http://www.wordpress.org/" target="_blank">WordPress</a> using theme <a href="http://frostpress.com/themes/artemis/" target="_blank">Artemis</a><?php wp_footer(); ?>
		</div>

	</div>

</div>

</body>
</html>