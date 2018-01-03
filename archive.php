
<?php get_header();
/**
 * The template for displaying archive
 *
 * imonthemes
 * @subpackage bestblog
 * @since bestblog 1.0
 */
 ?>
 <!--Call Sub Header-->
 <?php echo bestblog_mainpost_page_title( );?>
 <!--Call Sub Header-->

 <?php $site_layout = get_theme_mod( 'site_layout', 'fluid main-raised' ); ?>
 <div id="blog-content" class="padding-vertical-large-3 padding-vertical-small-2 <?php if ( 'box_wbb z-depth-2' == $site_layout) : ?> margin-horizontal-cs-1 <?php endif;?>">
   <?php get_template_part( 'template-parts/main-post', 'loop',get_post_format() );?>
 </div><!--container END-->

<?php get_footer(); ?>
