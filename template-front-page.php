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

 <!-- Half Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        
        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
             <?php foreach($list_featureboxes as $key => $value){ ?>
            <div class="item <?php echo($value); ?>">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php if(get_theme_mod('aribiz_header_slider-'.$key.'-file-upload')): echo esc_url( get_theme_mod( 'aribiz_header_slider-'.$key.'-file-upload' ) ); else: echo esc_url( get_template_directory_uri() ); echo '/img/bg122.jpg'; endif;?>');">
                 <div class="container">
                	<div class="row">
                        <div class="col-md-12">
                        <div class="col-md-12">
                        	 <div class="alsdd"><h2>
							 <?php if(get_theme_mod('aribiz_header_slider_'.$key.'_url')): echo esc_html( get_theme_mod( 'aribiz_header_slider_'.$key.'_url' ) ); else: echo __('ELEGANT TEMPLATE', 'aribiz');  endif;?>
							 </h2></div>   
                              
                              <div class="alsd">  <p>
							  <?php if(get_theme_mod('aribiz_featured_textbox_header_slider_'.$key)): echo esc_html( get_theme_mod( 'aribiz_featured_textbox_header_slider_'.$key ) ); else: echo __('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.', 'aribiz');  endif;?>  
							  </p> </div> 
                      
                      
                      
                       </div>
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

    <!-- Page Content -->
     
          <?php  	
	  
	
		$list_featureboxes2 = array(
			'one' 		=> __('Icon 1', 'aribiz'),
			'two'		=> __( 'Icon 2', 'aribiz' ),
		'three'		=> __( 'Icon 3', 'aribiz' ),
		 
			 
		);
?> 
 
       
        
    
        <div class="section   services">
        <div class="container">
                        <div class="row">
                        
                        
                             <?php foreach($list_featureboxes2 as $key => $value){ ?>
                            
                            
                           <div class="col-sm-4">
						   <div class="aribg">
              <div class="service-icon">
                 <i class="fa <?php if(get_theme_mod('aribiz_header_servicesicon_'.$key.'_url')): echo esc_html( get_theme_mod( 'aribiz_header_servicesicon_'.$key.'_url' ) ); else: echo "fa-laptop";  endif;?>"></i>
              </div>
              <div class="service-info">
                <h3><?php if(get_theme_mod('aribiz_header_services_'.$key.'_url')): echo esc_html( get_theme_mod( 'aribiz_header_services_'.$key.'_url' ) ); else: echo __('Mobile Ready', 'aribiz');  endif;?></h3>
                <p><?php if(get_theme_mod('aribiz_featured_textbox_header_services_'.$key)): echo esc_html( get_theme_mod( 'aribiz_featured_textbox_header_services_'.$key ) ); else: echo __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore', 'aribiz');  endif;?></p>
              </div>
            </div> </div> 
                              
                              
                      <?php } ?>
                             
                        </div>
                        <!-- /.row -->
                    </div></div>
        
     
        
    
        
        
                
        
        
        
        

 
 
<?php get_footer(); ?>
