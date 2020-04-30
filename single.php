<?php
/**
* single.php
*
* @author    Franchi Design
* @package   Atomy
*/

get_header('portfolio');

if ( false == get_theme_mod('atomy_enable_breadcrumbs_blog',false)) :?>
<div class="<?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_header','container'))?> at-woocommerce-breadcrumbs">
<?php atomy_custom_breadcrumbs(); ?>
</div>
<?php endif;?>
	<div id="primary" class="content-area <?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?>">
	  <?php if ( false == get_theme_mod('at_layout_sidebar_blog', false)):?><div class="row"><?php endif; ?>
		<main id="main" class="site-main <?php if ( false == get_theme_mod( 'at_layout_sidebar_blog', false) ):?>col-md-9 <?php endif; ?>">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );?>
			<div class="at-nav-link-blog <?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?>">
				<?php
			echo atomy_the_post_navigation();?>
			</div>
		<?php 
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile; // End of the loop.
		?>
	</main>
	<?php if (false == get_theme_mod( 'at_layout_sidebar_blog', false) ):?>
	<div class="at-sidebar at-sid-blog col-md-3 pl-0 mt-3">
      <?php get_sidebar(); ?>
	</div>
	<?php endif; 
	  if ( false == get_theme_mod( 'at_layout_sidebar_blog', false) ):?></div><?php endif; ?>
	</div><!-- #primary -->

<?php
get_footer();
 ?>

