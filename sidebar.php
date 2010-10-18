<!--sidebar.php-->
<aside>

	<ul>
		<li><img src="<?php bloginfo('template_url'); ?>/images/about_person.jpg" alt="avatar" /></li>
		<li><img src="<?php bloginfo('template_url'); ?>/images/your_ad_rpd.jpg" alt="ad" /></li>
		<li><img src="<?php bloginfo('template_url'); ?>/images/advert_125x125.gif" alt="ad_125x125" /></li>
  </ul>
 
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>

<!--searchfield-->
<h2>Search</h2>
<?php get_search_form(); ?>

<br /><br />

<?php endif; ?>

</aside>
<!--sidebar.php end--> 
</div>
<!--end maincontent div-->