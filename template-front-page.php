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



  <header id="myCarousel" class="carousel slide">
        

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
         <?php foreach($list_featureboxes as $key => $value){ ?>
        
            <div class="item <?php echo($value); ?>">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php if(get_theme_mod('aron_header_slider-'.$key.'-file-upload')): echo esc_url( get_theme_mod( 'aron_header_slider-'.$key.'-file-upload' ) ); else: echo get_template_directory_uri(); echo '/img/slider-2.jpg'; endif;?>');">
                 <div class="carousel-caption"><div class="container"><h2><?php if(get_theme_mod('aron_header_slider_'.$key.'_url')): echo esc_html( get_theme_mod( 'aron_header_slider_'.$key.'_url' ) ); else: echo __('WordPress Theme', 'aron');  endif;?></h2><p class="lead"><?php if(get_theme_mod('aron_featured_textbox_header_slider_'.$key)): echo esc_html( get_theme_mod( 'aron_featured_textbox_header_slider_'.$key ) ); else: echo __('Lorem ipsum dolor sit amet, consectetur. <br> Suspendisse venenatis mi et risus fringilla.', 'aron');  endif;?>   </div>               </div>  </div>
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
			'one' 		=> __('Icon 1', 'aron'),
			'two'		=> __( 'Icon 2', 'aron' ),
		'three'		=> __( 'Icon 3', 'aron' ),
		'four'		=> __( 'Icon 4', 'aron' ),
			 
		);
?> 
 
<div class="section services">
  <div class="container">

        <div class="heading">
          <div class="row">
            <div class="text-center col-sm-8 col-sm-offset-2">
              <h2><?php if(get_theme_mod('aron_maiN_heading')): echo esc_attr( get_theme_mod( 'aron_maiN_heading' ) ); else: echo __('Our Services', 'aron');  endif;?></h2>
              <span class="border"></span>
              <p><?php if(get_theme_mod('aron_maiN_description')): echo esc_attr( get_theme_mod( 'aron_maiN_description' ) ); else: echo __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam', 'aron');  endif;?> </p>
            </div>
          </div> 
        </div>
<div class="row svc">

   <?php foreach($list_featureboxes2 as $key => $value){ ?>


            <div class="text-center col-md-3 box1">
            
              <i class="fa <?php if(get_theme_mod('aron_header_servicesicon_'.$key.'_url')): echo esc_html( get_theme_mod( 'aron_header_servicesicon_'.$key.'_url' ) ); else: echo "fa-laptop";  endif;?>"></i>
              <h5><?php if(get_theme_mod('aron_header_services_'.$key.'_url')): echo esc_html( get_theme_mod( 'aron_header_services_'.$key.'_url' ) ); else: echo __('Consultation', 'aron');  endif;?></h5>
              <p><?php if(get_theme_mod('aron_featured_textbox_header_services_'.$key)): echo esc_html( get_theme_mod( 'aron_featured_textbox_header_services_'.$key ) ); else: echo __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum.', 'aron');  endif;?></p>
             
            </div>
            
             <?php } ?>
            
            
             
             
             
          </div>
        
        
        
        
        
        
</div></div>
 


 


 




 
<div class="section blog">
   <div class="container">
   <div class="heading">
          <div class="row">
            <div class="text-center col-sm-8 col-sm-offset-2">
              <h2><?php if(get_theme_mod('aron_maiN_heading')): echo esc_attr( get_theme_mod( 'aron_maiN_heading' ) ); else: echo __('Blog', 'aron');  endif;?></h2>
             <span class="border"></span>
              <p><?php if(get_theme_mod('aron_maiN_heading')): echo esc_attr( get_theme_mod( 'aron_maiN_heading' ) ); else: echo __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam', 'aron');  endif;?></p>
            </div>
          </div> 
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
          <?php function custom_excerpt_length( $length ) {
        return 22;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 ); ?>
    
    
    <div class="blog-wrapper">
    <div class="blog-container">
   
  
     <div class="row">
    
 
      <?php 
	 $args = array(
	'posts_per_page'      => 3,
	'order'    => 'DESC'
);
query_posts( $args );
	 
	 
	 
	    ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="recent-posts-container">
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                     <div class="postat">
        <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php    the_post_thumbnail();  ?>
                        
                    </a>
                    <?php
                } 
                ?></div>
      <div class="asat">    <h3 ><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
         <i class="fa fa-calendar main-cal ab"></i><?php
                        $archive_year = get_the_time('Y');
                        $archive_month = get_the_time('m');
                        $archive_day = get_the_time('d');
                        ?>
                        <a href="<?php
                        echo get_day_link($archive_year,
                                $archive_month,
                                $archive_day);
                        ?>"><?php echo get_the_time('m, d, Y') ?></a> <span class="author">By : <?php the_author_posts_link(); ?>  </span>
          <div class="blog-border"></div>
         <div class="postp"><?php the_excerpt(); ?></div>
          
          
         </div> 
          
          
          <!--end / post-content--> 
          
        </div>
                </div>  </div>
        <?php endwhile; // end of the loop. ?>
        <?php comments_template( '', true ); ?>
 </div> </div> 
    
    </div>   
        
    
   </div></div>
 


 











  





 
 
 
<?php get_footer(); ?>
