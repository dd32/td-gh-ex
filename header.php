<?php
/**
 * The template for displaying the header
 *
 * 
 * @package WordPress
 * @subpackage Admela
 * @since Admela 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head itemscope="itemscope" itemtype="http://schema.org/WebSite">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php if( true != admela_get_option('admela_responsive')): ?>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php endif; ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>">
	<?php endif;		
	/**
	* This hook is important for wordpress plugins and other many things
	*/
	wp_head();

	
?>
</head>

<?php 
 
$admela_blog_bdyclass = 'admela_lyt1';

?>

<body <?php body_class(''.esc_attr($admela_blog_bdyclass).''); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

<div class="admela_sitepushmenu">
	<div class="admela_pushclose">&#9540;</div>
	<div class="admela_pushmenutit">
	<?php
	if(admela_get_option('admela_custom_logo_activestatus') != false) { 				
		if(is_home()): ?>
		    <h1 class="admela_sitetitle" itemprop="headline">
				<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' ); ?>">
					<img src="<?php echo esc_url(admela_get_option('admela_custom_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" itemprop="image"/>
				</a>
			</h1>
			<?php else: ?>
			<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' ); ?>" class="admela_fontstlye">
				<img src=" <?php echo esc_url(admela_get_option('admela_custom_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" itemprop="image"/>
			</a>
			<?php 					
			endif;				
			}
			elseif (is_home()) { ?>
			<h1 class="admela_sitetitle admela_restitle1" itemprop="headline">
				<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' ); ?>">
					<?php bloginfo( 'name' ); ?>
				</a>									
			</h1> 
            <p><?php bloginfo( 'description' );  ?></p>						
			<?php } 				
			else { ?>
			<div class="admela_sitetitle admela_restitle" itemprop="headline"> 
				<a href="<?php echo esc_url(home_url('/'));  ?>" title="<?php bloginfo( 'name' ); ?>" class="admela_fontstlye">
					<?php bloginfo( 'name' ); ?>
				</a>  
				<p><?php bloginfo( 'description' );  ?></p>						
		    </div>
	<?php }	?>
	</div>	
	<?php if(has_nav_menu('admela-primary-menu')): ?>
		<nav class="admela_menu" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
			<?php 				
				wp_nav_menu(array('menu' => 'admela-primary-menu', 'theme_location' => 'admela-primary-menu'));  
			?>
		</nav>	
	<?php endif; ?>
</div>

<div class="admela_sitecontainer">

   <?php
  
	$admela_searchck = admela_get_option('admela_hdrsrch');
 
	if( 1 != (int) $admela_searchck ):    
	?>
	<div class="admela_searchout"> 
	<span class="admela_searchcls"><i class="fa fa-close"></i></span>
	<div class="admela_searchget">
		<?php get_search_form(); ?>
	<span class="admela_subtext"><?php esc_html_e('Hit enter after type your search item','admela'); ?></span>
	</div>
	</div>	
	<?php
	endif;
	?>
	<header class="admela_siteheader" itemscope="" itemtype="http://schema.org/WPHeader">
		
		
		<?php 
		
		get_template_part('tempheader-parts/amlayout1header','content'); // layout1 header content
	   	   				
		?>
		
		
	</header>

<div class="admela_siteinner">
	<?php
	if(is_home() && !is_paged()) {
		
		if((admela_get_option('hm_slideractive') != '') && (admela_get_option('hm_slideractive1') == '') && (admela_get_option('hm_slideractive2') == '')) {
			
                /*
				 * Include the Slider And Featured Content Template.			
				 */

				get_template_part('tempslider-parts/bly1sliderandfeatured','content');	
		        
				/*
				 * Include the Home Page After Slider Section Ad Template.			
				*/
	             
				get_template_part('tempad-parts/afterslider','ad');			
	    
		} 
	}
 ?>