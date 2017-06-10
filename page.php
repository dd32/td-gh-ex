<?php get_header(); ?>

<!-- Featured Slider, Carousel -->
<?php
if ( get_field( 'show_page_featured_slider' ) === 'yes' ) {
	get_template_part( 'templates/sliders/slider' );
}
?>

<!-- Page Content -->
<div id="page-content" class="clear-fix<?php echo ( get_field( 'full_width_page_content' ) === 'no' ) ? ' boxed-wrapper': ''; ?>" data-layout="<?php echo esc_attr( get_field( 'show_page_sidebar' ) ); ?>">

	<?php 
	
	// Featured Links, Banners
	if (  get_field( 'show_page_featured_links' ) !== 'no' ) {
		get_template_part( 'templates/header/featured', 'links' );
	}

	// Sidebar Alt
	get_template_part( 'templates/sidebars/sidebar', 'alt' );

	if ( get_field( 'show_page_sidebar' ) !== 'none' ) {
		
		// Sidebar Left
		if ( get_field( 'show_page_sidebar' ) === 'lsidebar' ||  get_field( 'show_page_sidebar' ) === 'lrsidebar' ) {
			get_template_part( 'templates/sidebars/sidebar', 'left' );
		}
		
		// Sidebar Right
		if ( get_field( 'show_page_sidebar' ) === 'rsidebar' ||  get_field( 'show_page_sidebar' ) === 'lrsidebar' ) {
			get_template_part( 'templates/sidebars/sidebar', 'right' );
		}
	}
 	?>

	<!-- Blog Single Wrapper -->
	<div class="blog-page-wrap">
		
		<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php 
			if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();?>

			<?php if (  has_post_thumbnail() && get_field( 'show_page_featured_image' ) !== 'no' ) : ?>
			<div class="post-media">
				<?php the_post_thumbnail( 'ashe-full-thumbnail' ); ?>
			</div>
			<?php endif; ?>
			
			<?php if ( get_field( 'show_page_title' ) !== 'no' ) : ?>
			<header class="post-header">
				<h1 class="post-title"><?php the_title(); ?></h1>	
			</header>
			<?php endif; ?>
			

			<div class="post-content">
				<?php the_content(''); ?>
			</div>

			<?php
			endwhile;
			endif; // have_posts()
			?>
		</article>

		<?php get_template_part( 'templates/single/comments', 'area' ); ?>

	</div><!-- .blog-single-wrap -->

</div><!-- #page-content -->

<?php get_footer(); ?>