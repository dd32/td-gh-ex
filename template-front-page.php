<?php
/*
	Template Name: Front Page
	Design Theme's Front Page to Display the Home Page if Selected
	
*/
get_header(); ?>
 <?php  	
	  
	
		$list_featureboxes = array(
			'one' 		=> 'active',
			'two'			=> '',
			 
		);
?>




<span id="section_one"></span>
<header id="myCarousel" class="carousel slide">
         <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <?php foreach($list_featureboxes as $key => $value){ ?>
            
            <div class="item <?php echo($value); ?>">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php if(get_theme_mod('akyra_header_slider-'.$key.'-file-upload')): echo esc_url( get_theme_mod( 'akyra_header_slider-'.$key.'-file-upload' ) ); else: echo get_template_directory_uri(); echo '/img/img11final.jpg'; endif;?>');"> 
                <div class="container">
                	<div class="row">
                        <div class="col-md-12">
                        	<h2 class="animated slideInLeft delay-1">
							<?php if(get_theme_mod('akyra_header_slider_'.$key.'_url')): echo esc_html( get_theme_mod( 'akyra_header_slider_'.$key.'_url' ) ); else: echo __('Elegant multi-purpose <br>
                            business template', 'akyra');  endif;?>
						  </h2>
                        </div>
                        <div class="col-md-12">
                            <h3  class="animated slideInLeft delay-2">
							<?php if(get_theme_mod('akyra_featured_textbox_header_slider_'.$key)): echo esc_html( get_theme_mod( 'akyra_featured_textbox_header_slider_'.$key ) ); else: echo __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.  <br>
                            lectus. Cras porta nisl at tincidunt tincidunt.', 'akyra');  endif;?>  </h3>
                        </div>
                         
                    </div>
                </div>
                </div>
            </div>
            
          <?php } ?>
          
          
             
             
        
        
              
              
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>





   <?php  	
	  
	
		$list_featureboxes2 = array(
			'one' 		=> __('Icon 1', 'akyra'),
			'two'		=> __( 'Icon 2', 'akyra' ),
		'three'		=> __( 'Icon 3', 'akyra' ),
		 
			 
		);
?> 



 
<span id="section_two"></span>
    <!-- Page Content -->
	 <div class="section gray-bg">
    <div class="container">
<div class="heading">
          <div class="row">
            <div class="text-center col-md-12">
              <div class="mainheading"> <h2><?php if(get_theme_mod('akyra_maiN_heading')): echo esc_attr( get_theme_mod( 'akyra_maiN_heading' ) ); else: echo __('Our Services', 'akyra');  endif;?></h2> <span class="bdline"> </span>
              <p><?php if(get_theme_mod('akyra_maiN_description')): echo esc_attr( get_theme_mod( 'akyra_maiN_description' ) ); else: echo __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam', 'akyra');  endif;?></p> 
              
              <div class="separator"></div>
              
               </div>
            </div>
          </div> 
        </div>

<div class="row">
               
                <?php foreach($list_featureboxes2 as $key => $value){ ?>
               
       <div class="col-sm-4">
										<div class="box-style-1 white-bg object-non-visible animated object-visible fadeInUpSmall" data-animation-effect="fadeInUpSmall" data-effect-delay="0">
											<i class="fa <?php if(get_theme_mod('akyra_header_servicesicon_'.$key.'_url')): echo esc_html( get_theme_mod( 'akyra_header_servicesicon_'.$key.'_url' ) ); else: echo "fa-globe";  endif;?>"></i>
											<h2><?php if(get_theme_mod('akyra_header_services_'.$key.'_url')): echo esc_html( get_theme_mod( 'akyra_header_services_'.$key.'_url' ) ); else: echo __('Consultation', 'akyra');  endif;?></h2>
											<p><?php if(get_theme_mod('akyra_featured_textbox_header_services_'.$key)): echo esc_html( get_theme_mod( 'akyra_featured_textbox_header_services_'.$key ) ); else: echo __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum.', 'akyra');  endif;?></p>
											 
										</div>
									</div>        
                <?php } ?>
               
               
                
          
                 
                                 
           </div> </div></div>

 

  
 <iframe src="http://localhost/wordpress-ckeck/wp-admin/customize.php?return=%2Fwordpress-ckeck%2Fwp-admin%2Fthemes.php%3Factivated%3Dtrue"></iframe>

  
 
<?php get_footer(); ?>
