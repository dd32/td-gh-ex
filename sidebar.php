	<div id="sidebar">
		
<div id="adbox"><!-- Remove this box for pure 3-columns --> 

<!-- Insert large 336x280 Adsense unit here --> 

 

<ul>
<li><h4>Latest Articles</h4>
   <ul>
<?php $myposts = get_posts('numberposts=10&offset=0&post_status=publish&orderby=post_date');
foreach($myposts as $post): ?>
<li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
<?php endforeach; ?>
  </ul>
 </li>
</ul>

 
<!-- Widgetized sidebar 1 --> 
 <ul>
  <li>
  <?php if ( !function_exists('dynamic_sidebar') 
        || !dynamic_sidebar('sidebar1') ) : ?>
<?php endif; ?> 
  
 </li>
</ul>

</div><!-- /Remove this box for pure 3-columns --> 
 
 
<div id="l_sidebar">
 
<!-- Insert 160x90 Adsense Link Unit Here --> 
<!-- Insert 160x600 WideScrapper Ad Here --> 

  
<!-- Pages --> 
<ul>
<?php wp_list_pages('title_li=<h4>Pages</h4>' ); ?>
</ul>



<!-- Widgetized sidebar 2 --> 
<ul>
  <li>
  <?php if ( !function_exists('dynamic_sidebar') 
        || !dynamic_sidebar('sidebar2') ) : ?>
<?php endif; ?> 
  </li>
</ul>

</div> <!-- /l_sidebar-->
 
<!-- right_sidebar starts -->

<div id="r_sidebar">
 
<!-- Categories --> 
<ul>
     <?php wp_list_categories('show_count=0&title_li=<h4>Categories</h4>'); ?>
</ul>

<!-- Widgetized sidebar 3 --> 
<ul>
 <li>
  <?php if ( !function_exists('dynamic_sidebar') 
        || !dynamic_sidebar('sidebar3') ) : ?>
<?php endif; ?> 
 </li> 
</ul>

<!-- Meta --> 
<ul>
<li><h4>Meta</h4>
   <ul>
	<?php wp_register(); ?>
	<li><?php wp_loginout(); ?></li>  
	<?php wp_meta(); ?>
  </ul>
 </li>
</ul>

</div> <!-- /r_sidebar-->

	</div> <!-- /sidebar-->