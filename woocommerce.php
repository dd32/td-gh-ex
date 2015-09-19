<?php

/*
Template Name: HowlThemes
*/
get_header(); 
?>
<div class="container woo-main">
	<div id="primary" class="content-area" style="margin-top: -10px;">
		<main id="main" class="site-main" role="main">


<?php woocommerce_content(); ?>


	</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>

</div>
<style>
.ads-container-head {
  display: none;
}
.container.woo-main {
  margin-top: 60px;
}
</style>
<?php get_footer(); ?>
