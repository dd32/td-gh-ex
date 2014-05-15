<?php 
/*
Template Name: Services Page
*/
get_header(); 
?>

<div class="padding-hr-10"></div>
<div class="separator"></div>
<!-- Header END -->
<?php while ( have_posts() ) : the_post(); ?>
<section class="section-main back-img-aboutus">
  <div class="container">
    <div class="col-md-12 img-banner-aboutus">
    	 <p class="font-34 color-fff conter-text"><?php echo get_the_title(); ?></p>
         <?php if (function_exists('booster_custom_breadcrumbs')) booster_custom_breadcrumbs(); ?>
    </div>
  </div>
</section>

<div class="panel-body-class">
<div class="panel-body1 container ">

    <section class="section-main container no-padding">
      <div class="col-md-12 no-padding-left">
      <p class="font-34 font-color-service p-margin "><?php echo get_post_meta(get_the_id(),'content_title',true); ?></p>
      </div>
    </section>
<?php endwhile; // end of the loop. ?>    
    <section class="section-main container no-padding">
    	<div class="col-md-12 no-padding-left">
  <?php     $booster_args = array(
  			'paged'			   => $paged,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'service',
            'post_status'      => 'publish'
        );
    $booster_services = new WP_Query( $booster_args );
   
    while ( $booster_services->have_posts() ) {
    $booster_services->the_post();
	?>
	<?php $booster_feature_img = wp_get_attachment_url(get_post_thumbnail_id(get_the_id())); ?>
        	<div class="col-md-4 clear-data">
            	<div class="img-laft">
           		 	<img src="<?php echo $booster_feature_img; ?>" class="img-responsive img-boder booster-services-image" />
                </div>
                <div class="service-img-test-padding">
                 <p class="service-font-15 sp"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></p>
				<p class="service-font">
				<?php echo get_the_excerpt(); ?>
                </p>	
                </div>
            </div>
    <?php } ?>  
        <div class="col-md-12">
        <?php 
             booster_pagination($booster_services->max_num_pages);
        ?>
        </div>       
        </div>
    </section>   

</div>
</div>

<?php get_footer(); ?>