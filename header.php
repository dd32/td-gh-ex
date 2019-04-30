<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Best_Charity
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="main-wrapper">
		<header class="header1">
			<div class="t-header">
				<div class="container">
          <?php if(get_theme_mod('best_charity_top_header_enable')):?>
            <div class="t-holder">
              <ul class="contact-info">
               <?php top_header_contact_info_items();?>
             </ul>

             <?php if(get_theme_mod('best_charity_top_header_search_form_enable')):?>
              <form role="search" method ="get" id="searchform" action="<?php echo esc_url(home_url('/'));?>" class="search-form form-inline">
                <input type="text" value="" name="<?php esc_attr_e( 's', 'best-charity' );?>" id="<?php esc_attr_e( 's', 'best-charity' );?>" placeholder="<?php the_search_query();?>">
                <button class="btn" type="submit"><span class="fa fa-search" aria-hidden="true"></span></button>
              </form>
            <?php endif;?>
          </div>
        <?php endif;?>
      </div>
    </div>
    <div class="b-header header--fixed">
     <nav class="navbar navbar-expand-xl">
      <div class="container">
       <?php 
       if(has_custom_logo()):
        the_custom_logo();
      else:    
        ?>
        <h1 class="site-title"><a href="<?php echo esc_url(home_url());?>" class="navbar-brand"><?php bloginfo('title');?></a></h1>
      <?php endif;?>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <div id="nav-icon3">
         <span></span>
         <span></span>
         <span></span>
         <span></span>
       </div>
     </button>

     <?php
     if ( has_nav_menu( 'primary' ) ) :
      wp_nav_menu( array(
        'theme_location'    => 'primary',
        'depth'             => 7,
        'menu_class'        => 'navbar-nav ml-auto',
        'container_class' => 'collapse navbar-collapse',
        'container_id' => 'navbarSupportedContent', 
        'fallback_cb'       => 'ngo_charity_navwalker::fallback',
        'walker'            => new best_charity_navwalker(),
      ));
      ?>
      <?php else : ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?> " class="nav-link"> <?php esc_html_e('Add a menu','best-charity'); ?></a>
            </li>
          </ul>
        </div>
      <?php endif; ?>
    </div>
  </nav>
</div>
</header>
<?php if( is_home() || (!is_front_page())):?>
<nav class="breadcrumb-block mgb-lg" style="background: url(<?php if(has_header_image()):echo esc_url(get_header_image());endif;?>);">
  <div class="container">
    <div class="breadcrumb-holder">
      <div class="title">
        <?php if(is_home()): ?>
          <h1><?php bloginfo('name'); ?></h1>
          <?php else: ?>
            <?php if ( is_archive() ) {
              the_archive_title( '<h1>', '</h1>' );
            }
            else{
              echo '<h1>';
              echo esc_html( get_the_title() );
              echo '</h1>';
            } ?>
          <?php endif; ?>
        </div>

        <?php if(is_home()): ?>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url());?>"><?php bloginfo('name'); ?></a></li>
          </ol>
          <?php else:?> 
            <?php breadcrumb_trail(); ?>
          <?php endif; ?>
        </div>
      </div>
    </nav>
  <?php endif;?>
