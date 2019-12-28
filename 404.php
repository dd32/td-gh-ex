<?php
/**
* 404.php
*
* @author    Franchi Design
* @package   Atomy
* @version   1.0.2
*/

get_header('404');
?>

<section class="at-404-page <?php echo esc_attr(get_theme_mod('atomy_enable_full_width_body','container') )?>" style="background: url('<?php echo esc_url( get_theme_mod( 'at_404_page_image' ) ); ?>') no-repeat center; background-size:cover;">
</section>
	<div class="container mt-3">
      <div class="at-main text-center">
        <span>
			<?php echo esc_html('Oops!','atomy');?>
		</span>
		<h1><?php echo esc_html('404 That page can&rsquo;t be found.','atomy');?></h1>
		<hr class="at-hr-404-page">
		<p><?php echo esc_html('It looks like nothing was found at this location. Maybe try a search?','atomy');?></p>
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
       <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <button class="button at-gen-act mt-5" style="border:none">
		      <?php esc_html_e('Go Back To Home','atomy');?> 
		  </button>
	  </a>     
</div>
</div>

<?php
get_footer('404');
