<?php get_header(); ?>

<div id="content" class="row">

	<div id="main" class="col-sm-8" role="main">

		<article id="post-not-found" class="block">

			<section class="post_content">

				<?php get_template_part( 'nothing' ); ?>

			</section>

		</article>

	</div>
	
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

        <?php the_widget( 'WP_Widget_Pages' ); ?> 
        <?php the_widget( 'WP_Widget_Meta' ); ?> 
         
    </div>

</div>

<?php get_footer(); ?>
