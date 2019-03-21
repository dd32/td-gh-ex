<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
<?php 
	wp_enqueue_script("jquery");
	wp_head(); ?>
    <meta name="viewport" content="width=device-width">
</head>

<body <?php body_class(); ?>>


<div class="page-wrapper page-wrapper page-wrapper">
    <header id="main-header" class="l-header  l-header--concierge" role="banner" aria-hidden="false">
		<div class="l-header__top-strip">
			<div class="l-top-strip js-topStrip ">
				<div class="l-top-strip__cta-list">	
                <?php if ( has_nav_menu( 'header-home-menu' ) ) {
					?>
                <!-------- MENU TOP HOME --------------->
         <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#"><?php echo __('Navbar', 'apelle-uno' );?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topHomeMenu" aria-controls="topHomeMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


                <?php 
                    wp_nav_menu(
                      array(
                        'theme_location' => 'header-home-menu',
                        'container' => 'div',
                        'container_id' => 'topHomeMenu',
                        'container_class' => 'collapse navbar-collapse',
                        'menu_class'=>'nav navbar-nav',
                        'link_before' => '',
                        'link_after' => '',
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
        
        <div class="l-header__inner" style="margin-top:50px" >
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
        
	</header>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 apelle-uno-header-image">
			<img class="rounded-bottom" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
		</div>
      </div>
    </div>