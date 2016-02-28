<?php get_header(); ?>
<?php global $safreen;?>


	 <!-- head select -->   
 	

  <?php $safreen_slider_enabel = get_theme_mod('safreen_slider_enabel');?>
<?php if( isset($safreen_slider_enabel) && $safreen_slider_enabel != 1 ):?> 
       
       <?php get_template_part('headers/part','head1'); ?>
        
 <?php else:?> 
 <?php get_template_part('headers/part','headsingle'); ?>
 <div class="clearfix"></div>
     <?php endif?> 
<!-- / head select --> 
<?php if (  is_front_page() || is_home() ) { ?>
<?php $safreen_slider_enabel = get_theme_mod('safreen_slider_enabel');?>
<?php if( isset($safreen_slider_enabel) && $safreen_slider_enabel != 1 ):?>

 <!--Slider-->
 
<div id="slider">

<?php get_template_part('parts/part','nivo'); ?>

 
</div>  
<div class="clearfix"></div>
	   
     <?php endif?>
<?php } ?> 

<!--Slider end-->


<a id="showHere"></a>
<div class="clearfix"></div>	  


	<!-- block -->
    
	<?php if (  is_front_page() || is_home() ) { ?>

<?php $safreen_service_checkbox = get_theme_mod('safreen_enable_serviceblock');?>
<?php if( isset($safreen_service_checkbox) && $safreen_service_checkbox != 1 ):?>

<?php get_template_part('parts/part','service-block'); ?>        
 	
    <div class="clearfix"></div>
    <?php endif?>

  <?php } ?>  	

            <!-- Start Callout section -->

<?php if (  is_front_page() || is_home() ) { ?> <?php get_template_part('parts/part-welcome','text'); ?>
 <!-- END #callout -->
 
<div class="clearfix"></div>
       
        <?php } ?>
   	
 
		
	        <!--About Us Section -->
<?php if (  is_front_page() || is_home() ) { ?>



<?php $safreen_enable_aboutus = get_theme_mod('safreen_enable_aboutus');?>
<?php if( isset($safreen_enable_aboutus) && $safreen_enable_aboutus != 1 ):?>
<?php get_template_part('parts/part','about-us'); ?>
<div class="clearfix"></div>

<?php endif;?>
 	
        <?php } ?>  	
            


<!--About Us Section -->


<!--LATEST POSTS-->

<?php if (  is_front_page() || is_home() ) { ?>
<?php $safreen_latstpst_checkbox = get_theme_mod('safreen_latstpst_checkbox');?>
<?php if( isset($safreen_latstpst_checkbox) && $safreen_latstpst_checkbox != 1 ):?>

 <?php get_template_part('parts/part','layout'); ?>


<div class="clearfix"></div>

<?php endif;?>
<?php }?> 

<!--LATEST POSTS END-->



 <!--our team Section -->
<?php if (  is_front_page() || is_home() ) { ?>

<?php $safreen_ourteam_enable = get_theme_mod('safreen_enable_ourteam');

 if( isset($safreen_ourteam_enable) && $safreen_ourteam_enable != 1):?>
 <?php get_template_part('parts/part','our-team');?>
 
 <div class="clearfix"></div>

 <?php endif;?>
 
   <?php } ?>       
 	
        
 
<!--Our team Section -->

 <!--our client Section -->
<?php if (  is_front_page() || is_home() ) { ?>

<?php get_template_part('parts/part','our-client'); ?>
       
 	
        <?php } ?>  	
            


<!--Our lient Section -->

<?php get_footer(); ?>