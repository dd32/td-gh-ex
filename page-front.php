<?php
/*
	Template Name: Front Page
	Design Theme's Front Page to Display the Home Page if Selected
	
*/
get_header(); ?>




<span id="section_one"></span>
<header id="myCarousel" class="carousel slide">
         <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            
            
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php  $options = get_option( 'arinio_theme_options' );  if($options['slide1image'] != '') { echo esc_url_raw($options['slide1image']); }else{ echo get_template_directory_uri(); echo '/images/img11final.jpg'; } ?>');"> 
                <div class="container">
                	<div class="row">
                        <div class="col-md-12">
                        	<h2 class="animated slideInLeft delay-1"><?php  if($options['slide1title'] != '') { echo esc_attr($options['slide1title']); }else{ ?> <?php _e( 'We are stylish', 'avnii' ); ?> <?php } ?></h2>
                        </div>
                        <div class="col-md-12">
                            <h3  class="animated slideInLeft delay-2"><?php  if($options['slide1subtitle'] != '') { echo esc_attr($options['slide1subtitle']); }else{ ?> <?php _e( 'Now you can buy me', 'avnii' ); ?> <?php } ?></h3>
                        </div>
                         
                    </div>
                </div>
                </div>
            </div>
            
          
          
          
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php  $options = get_option( 'arinio_theme_options' );  if($options['slide2image'] != '') { echo esc_url_raw($options['slide2image']); }else{ echo get_template_directory_uri(); echo '/images/img11final.jpg'; } ?>');">
                 <div class="container">
                	<div class="row">
                        <div class="col-md-12">
                        	<h2 class="animated slideInLeft delay-1"><?php  if($options['slide2title'] != '') { echo esc_attr($options['slide2title']); }else{ ?> <?php _e( 'We are elegant', 'avnii' ); ?> <?php } ?> </h2>
                        </div>
                        <div class="col-md-12">
                            <h3 class="animated slideInLeft delay-2"><?php  if($options['slide2subtitle'] != '') { echo esc_attr($options['slide2subtitle']); }else{ ?> <?php _e( 'Now you can buy me', 'avnii' ); ?> <?php } ?></h3>
                        </div>
                         
                    </div>
                </div>
                 </div>
            </div>
            
                 
              
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>










 
<span id="section_two"></span>
    <!-- Page Content -->
	 <div class="section">
    <div class="container">
<div class="heading">
          <div class="row">
            <div class="text-center col-md-12">
              <div class="mainheading"> <h2><?php $options = get_option( 'arinio_theme_options' ); if($options['msheading'] != '') { echo esc_attr($options['msheading']); }else{ ?> <?php _e( 'Our Services', 'avnii' ); ?> <?php } ?></h2> <span class="bdline"> </span>
              <p><?php $options = get_option( 'arinio_theme_options' );  if(!empty($options['msheadingdes'])) { echo esc_attr($options['msheadingdes']); }else{ ?> <?php _e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus accumsan egestas neque, vitae venenatis ex porta Maecenas dictum purus sed porta.', 'avnii' ); ?> <?php } ?></p>  </div>
            </div>
          </div> 
        </div>

<div class="row">
                <div class="col-md-4">
                    <div class="arfeature">
                    <div class="arfeature-inner">

					<header>
 	<i class="fa <?php $options = get_option( 'arinio_theme_options' ); if($options['sicon1'] != '') { echo esc_attr($options['sicon1']); }else{ echo "fa-globe"; } ?>"></i>

					<?php $options = get_option( 'arinio_theme_options' ); if($options['fstitle'] != '') { echo esc_attr($options['fstitle']); }else{ ?> <?php _e( 'Development', 'avnii' ); ?> <?php } ?>

					 </header>

					<p><?php $options = get_option( 'arinio_theme_options' ); if($options['fdtitle'] != '') { echo esc_attr($options['fdtitle']); }else{ ?> <?php _e( 'echo "Duis in odio quis lorem imperdiet fermentum sit amet nec ante. Nunc nibh odio, interdum.', 'avnii' ); ?> <?php } ?></p>

					
                    </div>
                </div></div>
               <div class="col-md-4">
                <div class="arfeature">
                   <div class="arfeature-inner">

					<header>

						<i class="fa <?php $options = get_option( 'arinio_theme_options' ); if($options['sicon2'] != '') { echo esc_attr($options['sicon2']); }else{ echo "fa-globe"; } ?>"></i>

					<?php $options = get_option( 'arinio_theme_options' ); if($options['sstitle'] != '') { echo esc_attr($options['sstitle']); }else{ ?> <?php _e( 'Designing', 'avnii' ); ?> <?php } ?> 

					 </header>

					<p><?php $options = get_option( 'arinio_theme_options' ); if($options['sdtitle'] != '') { echo esc_attr($options['sdtitle']); }else{ ?> <?php _e( 'Duis in odio quis lorem imperdiet fermentum sit amet nec ante. Nunc nibh odio, interdum.', 'avnii' ); ?> <?php } ?></p>

					

				  </div></div>
                </div>                <div class="col-md-4">                  <div class="arfeature">
                 <div class="arfeature-inner">

					<header>

						<i class="fa <?php $options = get_option( 'arinio_theme_options' ); if($options['sicon3'] != '') { echo esc_attr($options['sicon3']); }else{ echo "fa-globe"; } ?>"></i>

					<?php $options = get_option( 'arinio_theme_options' ); if($options['sstitle3'] != '') { echo esc_attr($options['sstitle3']); }else{ ?> <?php _e( 'CONSULTING', 'avnii' ); ?> <?php } ?>

					 </header>

					<p><?php $options = get_option( 'arinio_theme_options' ); if($options['sdtitle3'] != '') { echo esc_attr($options['sdtitle3']); }else{ ?> <?php _e( 'Duis in odio quis lorem imperdiet fermentum sit amet nec ante. Nunc nibh odio, interdum.', 'avnii' ); ?> <?php } ?></p>
								
				   </div></div>
             </div>
           </div> </div></div>

  



 







 

  
  
  
  
  
  
  
    
  <div class="section">
   <div class="container">
   <div class="heading">
          <div class="row">
              <div class="text-center col-md-12">
              <div class="mainheading"> <h2><?php if($options['blogh'] != '') { echo esc_attr($options['blogh']); }else{ ?> <?php _e( 'Our Blog', 'avnii' ); ?> <?php } ?></h2> <span class="bdline"> </span>
              <p><?php if(!empty($options['bloghdd'])) { echo esc_attr($options['bloghdd']); }else{ ?> <?php _e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus accumsan egestas neque, vitae venenatis ex porta Maecenas dictum purus sed porta.', 'avnii' ); ?> <?php } ?></p>  </div>
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
    
    <?php  $blogpt = 3;  ?>
      <?php 
	 $args = array(
	'posts_per_page'      => $blogpt,
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
                <?php $format = get_post_format( $post->ID );
			  ?>
      <div class="asat">    <h3> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
         <i class="fa fa-calendar main-cal ab"></i><?php
                        $archive_year = get_the_time('Y');
                        $archive_month = get_the_time('m');
                        $archive_day = get_the_time('d');
                        ?>
                        <a href="<?php
                        echo get_day_link($archive_year,
                                $archive_month,
                                $archive_day);
                        ?>"><?php echo get_the_time('m, d, Y') ?></a>
          
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
      
  
  
 

 <div class="container">
<p id="back-top" style="display: block;">
		<a href="#top"><span><i class="fa fa-arrow-up main-arrow"></i> </span></a>
</p>
</div>
 
<?php get_footer(); ?>
