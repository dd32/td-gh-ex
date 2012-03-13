<?php
/**
 * The main template file.
 *
 * This is the default fron-page.php file
 * If the front-page is enabled in the Mantra settings 
 * than the custom look will be applied.
 * If not a standard index.php will be loaded.
 *
 * @package Cryout Creations
 * @subpackage Mantra
 */
$mantra_options= mantra_get_theme_options();
foreach ($mantra_options as $key => $value) {

     ${"$key"} = $value ;

}
get_header(); 
if ($mantra_frontpage!="Enable") {
?>




		<div id="container">
			<?php get_sidebar(); ?>
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<?php mantra_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php mantra_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'mantra' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'mantra' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php }
else { ?>
	<script type="text/javascript">
		jQuery(document).ready(function(){	

			jQuery("#slider").easySlider({
				auto: false, 
				continuous: false,
				numeric: true,
			});

jQuery("#slidertext1").css("margin-top",jQuery('#slidercontainer').height()/2-jQuery('#slider1').height()) ;
jQuery("#slidertext2").css("margin-top",jQuery('#slidercontainer').height()/2-jQuery('#slider2').height()) ;
jQuery("#slidertext3").css("margin-top",jQuery('#slidercontainer').height()/2-jQuery('#slider3').height()) ;
jQuery("#slidertext5").css("margin-top",jQuery('#slidercontainer').height()/2-jQuery('#slider5').height()) ;
jQuery("#slidertext4").css("margin-top",jQuery('#slidercontainer').height()/2-jQuery('#slider4').height()) ;
		});	
	</script>

<style>
#slidercontainer , #slider li, #slider2 li{ 
width:<?php echo $mantra_fpsliderwidth ?>px;
height:<?php echo $mantra_fpsliderheight ?>px;
}

.column-image {
height:<?php echo $mantra_colimageheight ?>px;
}
</style>
	
<div id="slidercontainer">
<div id="slider">
			<ul>				
   	  <?php if($mantra_sliderimg1) {?>  <li><a  href="<?php echo $mantra_sliderlink1 ?>"><img width="<?php echo $mantra_fpsliderwidth ?>" src="<?php echo $mantra_sliderimg1 ?>" id="slider1" alt="" /><?php if($mantra_slidertext1 || $mantra_slidertitle1) {?><div class="slidertext" id="slidertext1"><h2><?php echo $mantra_slidertitle1 ?></h2><?php echo $mantra_slidertext1 ?></div><?php } ?></a></li><?php } 
			if($mantra_sliderimg2) {?>	<li><a  href="<?php echo $mantra_sliderlink2 ?>"><img width="<?php echo $mantra_fpsliderwidth ?>" src="<?php echo $mantra_sliderimg2 ?>" id="slider2" alt="" /><?php if($mantra_slidertext2 || $mantra_slidertitle2) {?><div class="slidertext" id="slidertext2"><h2><?php echo $mantra_slidertitle2 ?></h2><?php echo $mantra_slidertext2 ?></div><?php } ?></a></li><?php } 
			if($mantra_sliderimg3) {?>	<li><a  href="<?php echo $mantra_sliderlink3 ?>"><img width="<?php echo $mantra_fpsliderwidth ?>" src="<?php echo $mantra_sliderimg3 ?>" id="slider3" alt="" /><?php if($mantra_slidertext3 || $mantra_slidertitle3) {?><div class="slidertext" id="slidertext3"><h2><?php echo $mantra_slidertitle3 ?></h2><?php echo $mantra_slidertext3 ?></div><?php } ?></a></li><?php } 
			if($mantra_sliderimg4) {?>	<li><a  href="<?php echo $mantra_sliderlink4 ?>"><img width="<?php echo $mantra_fpsliderwidth ?>" src="<?php echo $mantra_sliderimg4 ?>" id="slider4" alt="" /><?php if($mantra_slidertext4 || $mantra_slidertitle4) {?><div class="slidertext" id="slidertext4"><h2><?php echo $mantra_slidertitle4 ?></h2><?php echo $mantra_slidertext4 ?></div><?php } ?></a></li><?php } 
			if($mantra_sliderimg5) {?>	<li><a  href="<?php echo $mantra_sliderlink5 ?>"><img width="<?php echo $mantra_fpsliderwidth ?>" src="<?php echo $mantra_sliderimg5 ?>" id="slider5" alt="" /><?php if($mantra_slidertext5 || $mantra_slidertitle5) {?><div class="slidertext" id="slidertext5"><h2><?php echo $mantra_slidertitle5 ?></h2><?php echo $mantra_slidertext5 ?></div><?php } ?></a></li><?php } ?>
			
			</ul>
		</div>

</div>

<div id="front-columns"> 
	<div id="column1">
	<a  href="<?php echo $mantra_columnlink1 ?>">	<div class="column-image" ><img  src="<?php echo $mantra_columnimg1 ?>" id="column1" alt="" /> </div> <h3><?php echo $mantra_columntitle1 ?></h3> </a><div class="column-text"><?php echo $mantra_columntext1 ?></div>
	</div>
	<div id="column2">
		<a  href="<?php echo $mantra_columnlink2 ?>">	<div class="column-image" ><img  src="<?php echo $mantra_columnimg2 ?>" id="column2" alt="" /> </div> <h3><?php echo $mantra_columntitle2 ?></h3> </a><div class="column-text"><?php echo $mantra_columntext2 ?></div>
	</div>
	<div id="column3">
		<a  href="<?php echo $mantra_columnlink3 ?>">	<div class="column-image" ><img  src="<?php echo $mantra_columnimg3 ?>" id="column3" alt="" /> </div> <h3><?php echo $mantra_columntitle3 ?></h3> </a><div class="column-text"><?php echo $mantra_columntext3 ?></div>
	</div>
	<div id="column4">
		<a  href="<?php echo $mantra_columnlink4 ?>">	<div class="column-image" ><img  src="<?php echo $mantra_columnimg4 ?>" id="column4" alt="" /> </div> <h3><?php echo $mantra_columntitle4 ?></h3> </a><div class="column-text"><?php echo $mantra_columntext4 ?></div>
	</div>

</div>



<?php }




 get_footer(); ?>