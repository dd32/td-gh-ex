<?php 
/*
 * 404 Template File.
 */
get_header(); ?>
<section class="section-main">
 <div class="col-md-12 a1-breadcrumb">
    <div class="container a1-container">
      <div class="col-md-6 col-sm-6 no-padding-lr left-part">
        <h3><?php echo '404 -'; _e('Article Not Found', 'a1'); ?></h3>
      </div>
      <div class="col-md-6 col-sm-6 no-padding-lr right-part">
        <?php if(function_exists('a1_custom_breadcrumbs')) a1_custom_breadcrumbs(); ?>
      </div>
    </div>
  </div>
<div class="clearfix"></div>
<div class="container a1-container a1-not-found">
    <div class="row">	
      <div class="col-md-12 blog-article no-padding">
		<h2><?php _e('Epic 404 - Article Not Found', 'a1'); ?></h2>
		<p><?php _e( 'It looks like nothing was found at this location try a search', 'a1' ); ?>?</p>
		<?php get_search_form(); ?>
      </div>
    </div>
</div>
</section>
<?php get_footer(); ?>