<?php get_header(); ?>
<section class="section-main back-img-aboutus">
  <div class="container">
    <div class="col-md-12 img-banner-aboutus">
      <p class="font-34 color-fff conter-text""><?php esc_html_e('404 Page','booster'); ?></p>
         <?php if (function_exists('booster_custom_breadcrumbs')) booster_custom_breadcrumbs(); ?>
    </div>
  </div>
</section>
<div class="main-container">
  <div class="container"> 
    <div class="row">
      <div class="col-md-12 main no-padding">
        <div class="jumbotron">			
				<h1><?php esc_html_e('Epic 404 - Article Not Found','booster') ?></h1>
				<p><?php esc_html_e('This is embarrassing. We could not find what you were looking for.','booster'); ?></p>
                <section class="post_content">
                    <p><?php esc_html_e('Whatever you were looking for was not found, but maybe try looking again or search using the form below.','booster'); ?></p>
                  <div class="row">
                      <div class="col-sm-12">
                          <form role="search" method="get" class="search-form" action="<?php echo esc_url(site_url('/')); ?>">
                          <label>
                             <input type="search" class="search-field"   placeholder="<?php esc_html_e('Search','booster'); ?>" value="" name="s">
                          </label>
                          <input type="submit" class="search-submit" value="<?php esc_html_e('Search','booster'); ?>">
                          </form>								
                      </div>
              	</div>
				</section>
			</div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>