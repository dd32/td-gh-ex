<?php
/**
 * Main Template
 */
get_header(); ?>

<?php
$options = get_option('theme_options');
$homesidebarradio = $options['homesidebarradio'];
if( $homesidebarradio  == 1 ) {  $sidebarleftp = 'float_right ';} 
elseif( $homesidebarradio  == 3 ) {  $sidebarleftp = 'hundred-width';} 
else{$sidebarleftp = 'float_left ';}  ?>


	<div id="primary " class="site-content <?php echo $sidebarleftp;?>">

		<div id="content" role="main">
		<div class="content-title"><h1><?php _e( 'Latest Post', 'artikler' ); ?></h1></div>
		
        		<?php if ( have_posts() ) : ?>
        
				<?php get_all_posts(); ?>

			<?php artikler_theme_content_nav( 'nav-below' ); ?>

		<?php else : ?>
<div class="no-found">
<h1><?php _e( 'No Post Found', 'artikler' ); ?></h1>
<?php _e( 'Search Other Post', 'artikler' ); ?>
<div class="no-found-search"><?php get_search_form(); ?></div>
</div>
		<?php endif; // end have_posts() check ?>
        
		</div>
		</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
