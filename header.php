<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Animate Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$animate_lite_show_book_appointment_button        = get_theme_mod('animate_lite_show_book_appointment_button', false);
$animate_lite_show_hdr_social_area                = get_theme_mod('animate_lite_show_hdr_social_area', false);
$animate_lite_show_slidersection 	          = get_theme_mod('animate_lite_show_slidersection', false);
$animate_lite_show_2column_servicessections 	  = get_theme_mod('animate_lite_show_2column_servicessections', false);
$animate_lite_show_welcomepagepart	  = get_theme_mod('animate_lite_show_welcomepagepart', false);
?>
<div id="sitelayout" <?php if( get_theme_mod( 'animate_lite_boxlayout' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($animate_lite_show_slidersection)) {
	 	$inner_cls = '';
	}
	else {
		$inner_cls = 'siteinner';
	}
}
else {
$inner_cls = 'siteinner';
}
?>
<div class="site-header <?php echo esc_attr($inner_cls); ?> <?php if( get_theme_mod('animate_lite_stickyheader',false) == false ) { ?>no-sticky<?php } ?>">   
   <div class="header_menubar">
     <div class="container">   
         <div class="toggle">
           <a class="toggleMenu" href="#"><?php esc_html_e('Menu','animate-lite'); ?></a>
         </div><!-- toggle --> 
         <div class="main_menu">                   
            <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
         </div><!--.main_menu -->
         <div class="clear"></div>
      </div><!-- .container -->           
   </div><!--.header_menubar -->     
  <div class="logowrapper">
    <div class="container">   
      <div class="logo">
        <?php animate_lite_the_custom_logo(); ?>
           <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p><?php echo esc_html($description); ?></p>
            <?php endif; ?>
      </div><!-- logo -->    
       <div class="hdr_rightcol">       
        <?php if( $animate_lite_show_hdr_social_area != ''){ ?> 
             <div class="hdr_social">                                                
               <?php $animate_lite_hdrfb_link = get_theme_mod('animate_lite_hdrfb_link');
                if( !empty($animate_lite_hdrfb_link) ){ ?>
                <a title="facebook" class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($animate_lite_hdrfb_link); ?>"></a>
               <?php } ?>
            
               <?php $animate_lite_hdrtwitt_link = get_theme_mod('animate_lite_hdrtwitt_link');
                if( !empty($animate_lite_hdrtwitt_link) ){ ?>
                <a title="twitter" class="fab fa-twitter" target="_blank" href="<?php echo esc_url($animate_lite_hdrtwitt_link); ?>"></a>
               <?php } ?>
        
              <?php $animate_lite_hdrgplus_link = get_theme_mod('animate_lite_hdrgplus_link');
                if( !empty($animate_lite_hdrgplus_link) ){ ?>
                <a title="google-plus" class="fab fa-google-plus" target="_blank" href="<?php echo esc_url($animate_lite_hdrgplus_link); ?>"></a>
              <?php }?>
        
              <?php $animate_lite_hdrlinked_link = get_theme_mod('animate_lite_hdrlinked_link');
                if( !empty($animate_lite_hdrlinked_link) ){ ?>
                <a title="linkedin" class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($animate_lite_hdrlinked_link); ?>"></a>
              <?php } ?>                  
           </div><!--end .hdr_social--> 
           <?php } ?>          
          <?php if( $animate_lite_show_book_appointment_button != ''){ ?> 
             <?php
             $animate_lite_book_appointment_btntext = get_theme_mod('animate_lite_book_appointment_btntext');
             if( !empty($animate_lite_book_appointment_btntext) ){ ?>
                 <?php $animate_lite_appointment_button_link = get_theme_mod('animate_lite_appointment_button_link');
                   if( !empty($animate_lite_appointment_button_link) ){ ?>
                        <a class="appointbtn" href="<?php echo esc_url($animate_lite_appointment_button_link); ?>">
						   <?php echo esc_html($animate_lite_book_appointment_btntext); ?>
                        </a>
                <?php } ?> 
             <?php } ?> 
           <?php } ?>           
       </div><!--.hdr_rightcol -->   
    <div class="clear"></div> 
   </div><!-- .container --> 
   <div class="zig-zag-bottom"></div>
 </div><!-- .logowrapper -->    
</div><!--.site-header -->   
<?php 
if ( is_front_page() && !is_home() ) {
if($animate_lite_show_slidersection != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('animate_lite_pageforslider'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('animate_lite_pageforslider'.$i,true));
	  }
	}
?> 
<div class="slider_wrapper">                
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo esc_attr( $j ); ?>" class="nivo-html-caption">         
    	<h2><?php the_title(); ?></h2>
    	<?php the_excerpt(); ?>
        <div class="clear"></div>
		<?php
        $animate_lite_buttontextforslider = get_theme_mod('animate_lite_buttontextforslider');
        if( !empty($animate_lite_buttontextforslider) ){ ?>
            <a class="slide_morebtn" href="<?php the_permalink(); ?>"><?php echo esc_html($animate_lite_buttontextforslider); ?></a>
        <?php } ?>                  
    </div>   
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>   
<?php } ?>
<?php } } ?>        
<?php if ( is_front_page() && ! is_home() ) {
 if( $animate_lite_show_2column_servicessections != ''){ ?>  
  <div id="pageboxsection">
     <div class="container">        
       <?php 
        for($n=1; $n<=4; $n++) {    
        if( get_theme_mod('animate_lite_servicespage_box'.$n,false)) {      
            $queryvar = new WP_Query('page_id='.absint(get_theme_mod('animate_lite_servicespage_box'.$n,true)) );		
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>     
            <div class="page_three_box <?php if($n % 2 == 0) { echo "last_column"; } ?>">                                       
                <div class="servicesboxbg"> 
				<?php if(has_post_thumbnail() ) { ?>
                <div class="page_img_box"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>        
                <?php } ?>
                <div class="page_content">              	
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <?php the_excerpt(); ?>
                  <a class="learnmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more','animate-lite'); ?></a>
                </div>
              </div>                            
            </div>
            <?php endwhile;
            wp_reset_postdata();                                  
        } } ?>                                 
    <div class="clear"></div>  
   </div><!-- .container -->
</div><!-- #pageboxsection -->              
<?php } ?>
<?php if( $animate_lite_show_welcomepagepart != ''){ ?>  
<section id="singlepagsection">
  <div class="container">                               
	<?php 
	  if( get_theme_mod('animate_lite_welcomepagepart',false)) {     
	  $queryvar = new WP_Query('page_id='.absint(get_theme_mod('animate_lite_welcomepagepart',true)) );			
       while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>     
         <div class="title_imgbox">
          <h3><?php the_title(); ?></h3>           
            <?php if (has_post_thumbnail() ){ ?>
		       <?php the_post_thumbnail(); ?>			
		    <?php } ?> 
        </div>    
        <div class="welcome_descbox">       
           <?php the_content(); ?>     
        </div>                                          
    <?php endwhile;
     wp_reset_postdata(); ?>                                    
    <?php } ?>                                 
<div class="clear"></div>                       
</div><!-- container -->
</section><!-- #singlepagsection-->
<?php } ?>
<?php } ?>