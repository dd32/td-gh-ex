<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="profile" href="https://gmpg.org/xfn/11" />
<?php if (is_archive() && ($paged > 1)&& ($paged < $wp_query->max_num_pages)) { ?>
<link rel="prefetch" href="<?php echo get_next_posts_page_link(); ?>">
<link rel="prerender" href="<?php echo get_next_posts_page_link(); ?>">
<?php } ?>
<!--[if lte IE 9]>
    <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5.js"></script>
<![endif]-->
<?php wp_head();?>
</head>
<body <?php body_class(); ?> id="hjyl_bb10">
<?php wp_body_open(); ?>
	<header id="hjyl_header">
		<h1 id="bb_logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
		<div class="logo-line"></div>
		<?php if ( get_header_image() ) : ?>
		<p class="header-logo"><img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" style="max-width:600px;max-height:150px;" /></p>
		<?php endif; ?>
		<?php get_search_form(); ?>
		<nav id="hjyl_menu">
		<?php if(!bb10_IsMobile || !is_404()) { ?>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'bb10_wp_list_pages', 'container' => false ) ); ?>
		<?php }else{ ?>
			<?php wp_nav_menu( array( 'theme_location' => 'mobile', 'fallback_cb' => 'bb10_wp_list_pages', 'container' => false ) ); ?>
		<?php } ?>
		</nav>
	</header>
	<div class="clear"></div>
<div id="hjylContainer">
	<div id="hjylContent">
		<div class="hjylPosts">
			<div class="position">
				<?php echo hjyl_get_svg( array( 'icon' => 'home' ) ); ?> <a href="<?php echo esc_url(home_url()); ?>"><?php _e('Home', 'bb10'); ?></a> > 
					<?php if(is_single()) {?>
						<?php the_category(', '); ?> >
					<?php } ?>
					<?php
					/* If this is a tag archive */
					if(is_category()) {
						single_cat_title();
					/* If this is a search result */
					} elseif (is_search()) {
						printf( __( 'Search Results for: %s', 'bb10' ), get_search_query() );
					/* If this is a tag archive */
					} elseif(is_tag()) {
						single_tag_title();
					/* If this is a daily archive */
					} elseif (is_day()) {
						the_time( 'Y, F jS' );
					/* If this is a monthly archive */
					} elseif (is_month()) {
						the_time( 'Y, F' );
					/* If this is a yearly archive */
					} elseif (is_year()) {
						the_time( 'Y' );
					/* If this is a single */
					} elseif (is_singular()) {
						if(""!==get_the_title() ) {
							the_title();
						}else{
							printf(__('Untitled #%s', 'bb10'),get_the_date('Y-m-d'));
						}
					/* If this is Error 404 */
					} elseif (is_404()) {
						_e('404 Error', 'bb10');	
					} elseif ( is_author() ) {
						printf(__( 'Author "%s" as followed', 'bb10' ), get_the_author_meta( 'display_name' ));
					}
					$paged = get_query_var('paged'); if ( $paged > 1 ){
						printf(__(' - Page %s - ', 'bb10'), $paged);
					}
					?>
				</div><!--position-->