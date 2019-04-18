<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
<?php 	
	wp_head(); ?>
    <meta name="viewport" content="width=device-width">
    
</head>

<body <?php body_class(); ?> >


<div class="page-wrapper page-wrapper page-wrapper">
    <header id="main-header" class="l-header  l-header--concierge" role="banner" aria-hidden="false">
        <?php if ( has_header_image() ) { ?>
        <div style="padding-left:0px; padding-right:0px" class="container-fluid bg-apelleuno">
          <div class="row" style="margin:0px">
            <div class="col-12 apelle-uno-header-image" style="padding: 0;">
                <img  src="<?php esc_url(header_image()); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" width="100%" alt="" />
            </div>
          </div>
        </div>
        <?php } ?>
		<div class="l-header__top-strip">
			<div class="l-top-strip js-topStrip ">
				<div class="l-top-strip__cta-list">	
                <?php if ( has_nav_menu( 'header-home-menu' ) ) {
					?>
                <!-------- MENU TOP HOME --------------->
         <nav class="navbar navbar-expand-md navbar-apelleuno bg-apelleuno " id="stickyMenu"   >
     

                            <div class="c-logo " itemscope="" itemtype="http://schema.org/Organization">
                                <a href="<?php echo esc_url(get_site_url()); ?>" class="navbar-brand" id="logo" itemprop="url">
                                    <meta itemprop="name" content="Demo">
                                    <?php 
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			if ( has_custom_logo() ) {
					echo '<img src="'. esc_url( $logo[0] ) .'" alt="Demo logo" class="c-logo__img" itemprop="logo">';
			} else {
					echo '<b>'. esc_html(get_bloginfo( 'name' )) .'</b>';
			}
			?>
                                </a>
                            </div>

					
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topHomeMenu" aria-controls="topHomeMenu" aria-expanded="false" aria-label="<?php echo esc_attr_e( "Toggle navigation" ,'apelle-uno' ); ?>">
        <span class="navbar-toggler-icon"></span>
      </button>


                <?php 
                    wp_nav_menu(
                      array(
                        'theme_location' => 'header-home-menu',
                        'container' => 'div',
                        'container_id' => 'topHomeMenu',
                        'container_class' => 'collapse navbar-collapse ',
                        'menu_class'=>'nav navbar-nav multi-level',
                        'link_before' => '',
                        'link_after' => '',
						'items_wrap'=>'<ul id="%1$s" class="%2$s multi-level ">%3$s</ul>',
						'depth'=>'11',
						'walker'=> new apelleuno_Apelle_Walker_Nav_Menu()
                      )
                    );
                    
                    
                    ?>
           
</nav>  
                <!-------- FINE MENU TOP HOME ---------->
<?php } ?>
				</div>
            </div>
		</div>
        
        <div class="l-header__inner"  >
			<div class="l-header__top-banner">
				<div class="l-top-banner" >
					<div class="l-top-banner__inner">
						 <?php if ( has_nav_menu( 'top-primary' ) ) {
					?>
                        <!-------- PRIMARY TOP MENU --------------->
						<div class="l-top-banner__primary-nav">
                        	<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<?php 
                            wp_nav_menu(
                              array(
                                'theme_location' => 'top-primary',
                                'container' => 'div',
                                'container_id' => 'topPrimaryMenu',
                                'container_class' => 'collapse navbar-collapse',
								'menu_class'=>'navbar-nav',
                                'link_before' => '',								
								'items_wrap'=>'<ul id="%1$s" class="%2$s multi-level ">%3$s</ul>',
                                'link_after' => '',
								'depth'=>'11',
								'walker'=> new apelleuno_Apelle_Walker_Nav_Menu_primary()
                              )
                            );
                            
                            
                            ?>
                            </nav>
                        </div>
                        <!-------- PRIMARY TOP MENU ---------->
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        
	</header><script type="text/javascript">
jQuery('.multi-level a.dropdown-toggle').on('click', function(e) {
	console.log('click');
  if (!jQuery(this).next().hasClass('show')) {
	jQuery(this).parents('.apelleuno-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = jQuery(this).next(".apelleuno-menu");
  $subMenu.toggleClass('show');


  jQuery(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
	jQuery('.apelleuno-submenu .show').removeClass("show");
  });


  return false;
});
    </script>
    