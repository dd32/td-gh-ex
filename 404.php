<?php get_header(); ?>
<section class="inner-page-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-page-title">
          <h1 class="title"><?php the_title(); ?></h1>
        </div><!--header-->
        <div class="breadcrumbs">
          <?php abaya_breadcrumbs(); ?><!--crumbs-->
        </div><!--breadcrumbs-->
      </div><!--col-->
    </div><!--row-->
  </div><!--container-->
</section><!--inner-page-bg-->
<section id="content">
  <section class="container">
  <div class="row">
            <h1><?php esc_html_e( 'Oops!', 'abaya' ); ?></h1>
			<h2><?php esc_html_e( '404 Not Found', 'abaya' ); ?></h2>
			<div class="error-details">
				<p> <?php esc_html_e( 'Sorry, an error has occured, Requested page not found!', 'abaya' ); ?></p> 
			</div>
			<p><a href="<?php echo esc_url( home_url( '/' )); ?>"><span class="fa fa-home"></span><?php esc_html_e('Take Me Home', 'abaya'); ?></a></p> 
    </div>
  </section><!--container-->
</section><!--content-->
<?php get_footer(); ?>