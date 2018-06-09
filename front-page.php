<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Best Blog
 * @since Best Blog 1.0
 */
 if ( !is_page_template() ) {
get_header();?>

<?php get_template_part( 'home','part/slider' );?>
<div class="grid-container padding-vertical-large-2 padding-vertical-small-2 padding-horizontal-cs-1">
  <div class="grid-x grid-margin-x align-center">
    <?php if ( is_active_sidebar( 'home-widgets-bestblog' ) ) :?>
      <div class="large-auto small-24 cell">
        <?php dynamic_sidebar( 'home-widgets-bestblog' );?>
      </div>
    <?php endif;?>
    <?php if ( is_active_sidebar( 'home-sidebar-bestblog' ) ) :?>
      <div class="large-7 small-24 cell">
        <div id="home-sidebar" class="sidebar-inner" >
          <div  class="grid-x grid-margin-x ">
            <?php dynamic_sidebar( 'home-sidebar-bestblog' );?>
          </div>
        </div>
      </div>
    <?php endif;?>
  </div>
</div>
<?php
get_footer();
} else {
	include( get_page_template() );
}
