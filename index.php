<?php get_header(); ?>
<?php global $advance;?>


	<!-- head select -->   
 	

  <?php $advance_slider_enabel = get_theme_mod('advance_slider_enabel',1);?>
<?php if( isset($advance_slider_enabel) && $advance_slider_enabel == 1 ):?> 
       <?php $advance_header_checkbox = get_theme_mod('advance_header_checkbox',1);?>
       
       <?php if( isset($advance_header_checkbox) && $advance_header_checkbox == 1){ ?>
       <?php get_template_part('headers/part','head1'); ?>
        <?php } ?>
        
         <?php if( isset($advance_header_checkbox) && $advance_header_checkbox == 0){ ?>
       <?php get_template_part('headers/part','headsingle'); ?>
        <?php } ?> 
        
        
 <?php else:?> 
 <?php get_template_part('headers/part','headsingle'); ?>
 <div class="clearfix"></div>
     <?php endif?> 
<!-- / head select --> 

<?php if (  is_front_page() || is_home() ) { ?>
  <?php $advance_slider_enabel = get_theme_mod('advance_slider_enabel',1);?>
    <?php if( isset($advance_slider_enabel) && $advance_slider_enabel == 1 ):?>

 <!--Slider-->
<div id="slider">
  <?php get_template_part('parts/salider','post'); ?>
 </div>  
<div class="clearfix"></div>
<?php endif?>
<?php } ?> 

<!--Slider end-->


<div class="clearfix"></div>	  
<!-- block -->
<?php if (  is_front_page() || is_home() ) { ?>

	<?php if ( is_active_sidebar( 'sidebar-frontpage' ) ) :?>
			<?php	dynamic_sidebar( 'sidebar-frontpage' );?>


 		
			<?php endif;?>
<?php } ?>  	


<!--LATEST POSTS-->

<?php if (  is_front_page() || is_home() ) { ?>
		<?php $advance_latstpst_checkbox = get_theme_mod('advance_latstpst_checkbox',1);?>
			<?php if( isset($advance_latstpst_checkbox) && $advance_latstpst_checkbox == 1 ):?>

		 <?php get_template_part('parts/part','layout'); ?>
	<div class="clearfix"></div>
	<?php endif;?>
<?php }?> 

<!--LATEST POSTS END-->



<?php get_footer(); ?>