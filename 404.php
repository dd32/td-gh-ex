<?php
/**
* 404.php
*
* @author    Franchi Design
* @package   Atomy
*/

get_header();
?>

<section class="at-404-page <?php echo esc_attr(get_theme_mod('atomy_enable_full_width_body','container') )?>">
</section>
	<div class="container mt-3">
      <div class="at-main text-center">
        <span>
			<?php echo esc_html__('Oops!','atomy');?>
		</span>
		<h1><?php echo esc_html__('404 That page can&rsquo;t be found.','atomy');?></h1>
		<hr class="at-hr-404-page">
		<p><?php echo esc_html__('It looks like nothing was found at this location. Maybe try a search?','atomy');?></p>
		<div class="container">	
		<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
       <?php
         get_search_form();
       ?>
	   </div>
	   <div class="col-md-4"></div>
	   </div>
	   </div>   
</div>
</div>

<?php
get_footer();
