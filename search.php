<?php get_header(); ?>
<!--Call Sub Header-->
<?php echo bestblog_mainpost_page_title( );?>
<!--Call Sub Header-->

<div id="blog-content" class="padding-vertical-large-3 padding-vertical-small-2">
  <?php get_template_part( 'template-parts/main-post', 'loop',get_post_format() );?>
</div><!--container END-->

<?php get_footer(); ?>
