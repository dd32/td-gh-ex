<?php 
/*
Template Name: About us Page
*/
get_header(); 
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
		</p>
  </div>
</section>
<?php endwhile; // end of the loop. ?>    
<div class="separator hr-top"></div>
<section class="section-main container no-padding">
  <div class="col-md-12 no-padding-left">
		<h1 class="font-color-text p-margin"><?php _e('Our Team','booster'); ?></h1>
</div>
  <div class="col-md-12 no-padding-left hr-bottom">
  <?php     $booster_args = array(
                    'orderby'          => 'post_date',
                    'order'            => 'DESC',
                    'post_type'        => 'member',
                    'post_status'      => 'publish'
                );
    $booster_member = new WP_Query( $booster_args );
   
    while ( $booster_member->have_posts() ) {
    $booster_member->the_post();
?>
<?php $booster_feature_img = wp_get_attachment_url(get_post_thumbnail_id(get_the_id())); ?>
        <div class="col-md-3 padding-left-right-30 clear-data">
                <div class="img-laft">
                    <img src="<?php echo $booster_feature_img; ?>" alt="" class="img-responsive img-boder our-team-image" />
                </div>  
            <div class="img-test-padding">
            	<p class="sp"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></p>
                <p class="out-time-cont">
                	<?php echo get_the_excerpt(); ?>
                </p>
            </div>  
        </div>
<?php } ?> 
</div>  
</section>

</div>
</div>
<?php get_footer(); ?>