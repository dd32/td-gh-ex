	<div id="sidebar">

<div id="header">		

<?php if (is_home()) { ?><h1><?php } ?>
<a class="blogtitle" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a><?php if (is_home()) { ?></h1><?php } ?><div class="description"><?php bloginfo('description'); ?></div>

</div>


<!-- Search Form --> 
<?php get_search_form(); ?>
 <br />


<!-- RSS Links --> 
<a href="<?php bloginfo('rss2_url'); ?>" rel="alternate" type="application/rss+xml"><img src="<?php echo get_template_directory_uri(); ?>/images/rss16.png" class="rssicon" title="RSS" alt="RSS" height="16" width="16" />Subscribe Feed (RSS)</a>
<br /><br />
 
<!-- Widgetized sidebar 1 --> 
<ul>
  <li>
 <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
 <?php dynamic_sidebar( 'sidebar-1' ); ?>
<?php endif; ?> 
  </li>
</ul>
 

<!-- Widgetized sidebar 2 --> 
<ul>
  <li>
<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
 <?php dynamic_sidebar( 'sidebar-2' ); ?>
<?php endif; ?> 
  </li>
</ul>


</div> <!-- /sidebar-->