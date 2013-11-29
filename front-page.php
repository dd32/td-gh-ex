<?php
$is_front_page = get_option('spa_theme_options');

if ( 'posts' == get_option( 'show_on_front') && $is_front_page['front_page'] != 'yes' ) {
get_template_part('index');
}
else { 
get_header(); 
$current_options=get_option('spa_theme_options');
get_template_part('index', 'slider') ;
?>
<div class="container">	  
	<!-- jumbotron - Tagline with Description -->
	  <div class="jumbotron">
	     <?php if($current_options['tagline_title']!=''){?>
		 
        <h1 class="home_tagline"><?php echo $current_options['tagline_title'] ?></h1>
        <p><?php echo $current_options['tagline_contents']; ?> </p>
          <?php } ?>
      </div>
</div>
 <?php get_template_part('index', 'services')?>	 
<!-- Products & Tagline with Description -->
<div class="container-fluid">
	<div class="container">
	
	<div class="jumbotron">
        <h1 class="home_product_tagline"><?php echo $current_options['product_title']; ?></h1>
        <p><?php echo $current_options['product_contents']; ?></p>
    </div>
	<?php get_template_part('index','product'); ?>

	</div>
</div>	

<?php get_footer();
}?>