<?php /* Template Name: Homepage */ ?>

<?php get_header(); ?>



<?php if(function_exists('get_field')){ ?>

<?php if(have_rows('home_page_builder')): ?>

<?php while(have_rows('home_page_builder')):the_row(); ?>


	<?php if(get_sub_field('style')=='post_banner'){ ?>

		<?php get_template_part('block','banner'); ?>

	<?php }elseif(get_sub_field('style')=='slick_slider'){ ?>

		<?php get_template_part('block','slider'); ?>

	<?php }elseif(get_sub_field('style')=='thumbnails_one'){ ?>

		<?php get_template_part('block','thumbnail'); ?>

	<?php }elseif(get_sub_field('style')=='one_column'){ ?>

		<?php get_template_part('block','onecolumn'); ?>

	<?php }elseif(get_sub_field('style')=='two_columns'){ ?>

		<?php get_template_part('block','twocolumns'); ?>

	<?php } ?>


<?php endwhile; ?>

<?php endif; ?>

<?php } ?>



<?php get_sidebar(); ?>

<?php get_template_part('footer','widget' ); ?>

<?php get_footer(); ?>