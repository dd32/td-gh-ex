
<aside>
<!-- anIMass WordPress Theme design by Richard Dickinson - http://www.richard-dickinson.com/ -->
	<ul>
		<li><img src="<?php bloginfo('template_url'); ?>/images/about_person.jpg" alt="avatar" /></li>
		<li><img src="<?php bloginfo('template_url'); ?>/images/your_ad_rpd.jpg" alt="ad" /></li>
		<li><img src="<?php bloginfo('template_url'); ?>/images/advert_125x125.gif" alt="ad_125x125" /></li>
</ul>
<!--sidebar.php-->

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>



		<!--searchfield-->
		<?php get_search_form(); ?>

	<br /><br />



<!--sidebar.php end-->

<?php endif; ?>

</aside>
</div>