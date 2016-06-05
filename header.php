<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Beautiplus
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="pageholder">
<div class="header <?php if( !is_front_page() && !is_home() ){ ?>headerinner<?php } ?>">
        <div class="container">
            <div class="logo">
            			<?php beautiplus_the_custom_logo(); ?>
                        <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                        <span><?php bloginfo('description'); ?></span>
            </div><!-- logo -->
         </div><!-- container --> 
         <div id="mainnavigation">
             <div class="container">
             <div class="toggle">
                <a class="toggleMenu" href="<?php echo esc_url('#');?>"><?php esc_attr_e('Menu','beautiplus'); ?></a>
             </div><!-- toggle --> 
            
            <div class="sitenav">
                    <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
            </div><!-- site-nav -->            
            <div class="clear"></div>            
         </div><!-- container -->
        </div><!-- #mainnavigation -->
  </div><!--.header -->

<?php if ( is_front_page() && ! is_home() ) { ?>
<!-- Slider Section -->
<?php for($sld=7; $sld<10; $sld++) { ?>
<?php if( get_theme_mod('page-setting'.$sld)) { ?>
<?php $slidequery = new WP_query('page_id='.get_theme_mod('page-setting'.$sld,true)); ?>
<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
$img_arr[] = $image;
$id_arr[] = $post->ID;
endwhile;
}
}
?>
<?php if(!empty($id_arr)){ ?>
<section id="home_slider">
<div class="slider-wrapper theme-default">
<div id="slider" class="nivoSlider">
	<?php 
	$i=1;
	foreach($img_arr as $url){ ?>
    <img src="<?php echo esc_url($url); ?>" title="#slidecaption<?php echo $i; ?>" />
    <?php $i++; }  ?>
</div>   
<?php 
$i=1;
foreach($id_arr as $id){ 
$title = get_the_title( $id ); 
$post = get_post($id); 
$content = apply_filters('the_content', substr(strip_tags($post->post_content), 0, 100)); 
?>                 
<div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">
<div class="slide_info">
<h2><?php echo $title; ?></h2>
<p><?php echo $content; ?></p>
<a class="slide_more" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_attr_e('Read More', 'beautiplus');?></a>
</div>
</div>      
<?php $i++; } ?>       
 </div>
<div class="clear"></div>   
</section>
<?php } else { ?>
<section id="home_slider">
<div class="slider-wrapper theme-default">
<div id="slider" class="nivoSlider">
    <img src="<?php echo get_template_directory_uri(); ?>/images/slides/slider1.jpg" alt="" title="#slidecaption1" />
    <img src="<?php echo get_template_directory_uri(); ?>/images/slides/slider2.jpg" alt="" title="#slidecaption2" />
    <img src="<?php echo get_template_directory_uri(); ?>/images/slides/slider3.jpg" alt="" title="#slidecaption3" />
</div>                    
                  <div id="slidecaption1" class="nivo-html-caption">
                    <div class="slide_info">
                            <h2><?php esc_attr_e('Modern WordPress themes','beautiplus'); ?></h2>
                            <p><?php esc_attr_e('This is an example page. Its different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. ','beautiplus'); ?></p>
                           <a class="slide_more" href="<?php echo esc_url('#');?>"><?php esc_attr_e('Read More', 'beautiplus');?></a>
                           
                    </div>
                    </div>
                    
                    <div id="slidecaption2" class="nivo-html-caption">
                        <div class="slide_info">
                                <h2><?php esc_attr_e('Modern WordPress themes','beautiplus'); ?></h2>
                                <p><?php esc_attr_e('This is an example page. Its different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors.','beautiplus'); ?></p> 
                                <a class="slide_more" href="<?php echo esc_url('#');?>"><?php esc_attr_e('Read More', 'beautiplus');?></a>                      
                        </div>
                    </div>
                    
                    <div id="slidecaption3" class="nivo-html-caption">
                        <div class="slide_info">
                                <h2><?php esc_attr_e('Modern WordPress themes','beautiplus'); ?></h2>
                                <p><?php esc_attr_e('This is an example page. Its different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors.','beautiplus'); ?></p>
                                <a class="slide_more" href="<?php echo esc_url('#');?>"><?php esc_attr_e('Read More', 'beautiplus');?></a>
                        </div>
                    </div>
</div>
<div class="clear"></div>
</section><!-- Slider Section -->

<?php }} ?> 
       
        
    <?php if ( is_front_page() && ! is_home() ) { ?> 
    
     <section id="wrapsecond">
            	<div class="container">
                    <div class="services-wrap">                       
                        <?php for($p=1; $p<4; $p++) { ?>       
                        <?php if( get_theme_mod('page-column'.$p,false)) { ?>          
                            <?php $queryxxx = new WP_query('page_id='.get_theme_mod('page-column'.$p,true)); ?>				
                                    <?php while( $queryxxx->have_posts() ) : $queryxxx->the_post(); ?> 
                                    <div class="fourbox <?php if($p % 3 == 0) { echo "last_column"; } ?>">                                    
                                      <?php if(has_post_thumbnail() ) { ?>
                                        <div class="thumbbx"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail();?></a></div>
                                      <?php } ?>
                                     <div class="pagecontent">
                                     <h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>                                    
                                    <?php echo beautiplus_content(20); ?>
                                    <a class="ReadMore" href="<?php echo esc_url( get_permalink() ); ?>">                                      
                                     <?php esc_attr_e('Read More','beautiplus'); ?>
                                    </a> 
                                     </div>                                   
                                    </div>
                                    <?php endwhile;
                                    wp_reset_query(); ?>
                                    
                        <?php } else { ?>
                                <div class="fourbox <?php if($p % 3 == 0) { echo "last_column"; } ?>">                       
                                    
                                    <div class="thumbbx"><a href="<?php echo esc_url('#');?>"><img src="<?php echo get_template_directory_uri(); ?>/images/services-icon<?php echo $p; ?>.jpg" alt="" /></a></div>
                                    <div class="pagecontent">
                                    <h3><a href="<?php echo esc_url('#');?>"><?php esc_attr_e('Beautiplus Services','beautiplus'); ?> <?php echo $p; ?></a></h3>
                                    
                                     <p><?php esc_attr_e('Beautiplus theme is Clean Coded and User friendly customizer options developed it perfectly suitable for WordPress Users.','beautiplus'); ?></p>  
                                     <a class="ReadMore" href="<?php echo esc_url('#');?>">                                      
                                     <?php esc_attr_e('Read More','beautiplus'); ?>
                                    </a>      
                                   </div>
                                 </div>
                        <?php }} ?>  
                    <div class="clear"></div>  
               </div><!-- services-wrap-->
              <div class="clear"></div>
            </div><!-- container -->
       </section>     
    
    
       <section id="Appwrap">
            	<div class="container">
                   <div class="appointmentwrap">                   
                 <?php if ( get_theme_mod( 'welcome_title' ) !== "" ){  ?>
                   <h3><?php echo esc_html( get_theme_mod( 'welcome_title', __('Welcome to Beautiplus','beautiplus'))); ?></h3>              
			     <?php } ?>
                
              <?php if ( get_theme_mod( 'welcome_description' ) !== "" ){  ?>
                <p><?php echo esc_html( get_theme_mod('welcome_description',__('This is an example page. Its different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors.This is an example page. Its different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. ','beautiplus')) ); ?></p> 
               <?php } ?>                
              </div> 
              
               <?php if ( get_theme_mod('welcome_link') !== "") { ?>
                   	<a class="ReadMore appbutton" href="<?php echo esc_url(get_theme_mod('welcome_link','#')); ?>">
					 <?php esc_attr_e('Read More','beautiplus'); ?>
                    </a> 
                <?php } ?>                                    
              <div class="clear"></div>
            </div><!-- container -->
       </section>
         
		   
<?php }?>