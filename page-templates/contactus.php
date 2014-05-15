<?php 
/*
Template Name: Contact us Page
*/
get_header();
$booster_options = get_option( 'faster_theme_options' ); 
?>

<div class="separator"></div>
<!-- Header END -->
<?php while ( have_posts() ) : the_post(); ?>
<section class="section-main back-img-aboutus">
  <div class="container">
    <div class="col-md-12 no-padding-left img-banner-aboutus">
    	 <p class="font-34 color-fff conter-text"><?php echo get_the_title(); ?></p>
          <?php if (function_exists('booster_custom_breadcrumbs')) booster_custom_breadcrumbs(); ?>
    </div>
  </div>
</section>

<div class="panel-body-class">
<div class="panel-body1 container ">

<section class="section-main container no-padding">
  <div class="col-md-12 no-padding-left">

      <h2 class="font-color-text font-34 p-margin"><?php echo get_post_meta(get_the_id(),'content_title',true); ?></h2>
		<p class="font-14 p-margin">
        <?php echo get_the_content(); ?>       
<iframe width="98%" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo $booster_options['gmaddress']; ?>&output=embed"></iframe>
		</p>
  </div>
</section>
  
<div class="separator hr-top"></div>
   <section class="section-main container no-padding">
      <div class="col-md-12 no-padding-left">
      	<div class="col-md-4">
      <P class="contactus-add"><?php _e('Addresses','booster'); ?></P>
        <P><?php _e('Address 1:','booster'); ?></P>
        <P><?php echo apply_filters("the_content",$booster_options['address1']); ?></P>
        <P><?php _e('Address 2:','booster'); ?></P>
        <P><?php echo apply_filters("the_content",$booster_options['address2']); ?></P>
        </div>
        <div class="col-md-8">
        <p class="contactus-add cont-left">	Feedback </p>
        <?php if ( shortcode_exists( 'contact-form-7' ) ) { echo do_shortcode('[contact-form-7 id="46" title="Contact form 1"]'); } ?> 
        </div>
        
        
      </div>
    </section>
    

</div>
</div>
<?php endwhile; // end of the loop. ?>   

<?php get_footer(); ?>