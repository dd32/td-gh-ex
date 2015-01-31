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
                <div class="fill" style="background-image:url('<?php  $options = get_option( 'arinio_theme_options' );  if($options['slide1image'] != '') { echo $options['slide1image']; }else{ echo get_template_directory_uri(); echo '/img/img11final.jpg'; } ?>');"> 
                <div class="container">
                	<div class="row">
                        <div class="col-md-12">
                        	<h2 class="animated slideInLeft delay-1"><?php  if($options['slide1title'] != '') { echo $options['slide1title']; }else{ echo "We are stylish"; } ?> </h2>
                        </div>
                        <div class="col-md-12">
                            <h3  class="animated slideInLeft delay-2"><?php  if($options['slide1subtitle'] != '') { echo $options['slide1subtitle']; }else{ echo "Now you can buy me"; } ?></h3>
                        </div>
                         
                    </div>
                </div>
                </div>
            </div>
            
          
          
          
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php  $options = get_option( 'arinio_theme_options' );  if($options['slide2image'] != '') { echo $options['slide2image']; }else{ echo get_template_directory_uri(); echo '/img/img11final.jpg'; } ?>');">
                 <div class="container">
                	<div class="row">
                        <div class="col-md-12">
                        	<h2 class="animated slideInLeft delay-1"><?php  if($options['slide2title'] != '') { echo $options['slide2title']; }else{ echo "We are elegant"; } ?> </h2>
                        </div>
                        <div class="col-md-12">
                            <h3 class="animated slideInLeft delay-2"><?php  if($options['slide2subtitle'] != '') { echo $options['slide2subtitle']; }else{ echo "Now you can buy me"; } ?></h3>
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










<?php if($options['servicessection'] == 'on' || $options['servicessection'] == '') { ?>
<span id="section_two"></span>
    <!-- Page Content -->
	 <div class="section">
    <div class="container">
<div class="heading">
          <div class="row">
            <div class="text-center col-md-12">
              <div class="mainheading"> <h2><?php $options = get_option( 'arinio_theme_options' ); if($options['msheading'] != '') { echo $options['msheading']; }else{ echo "Our Services"; } ?></h2> <span class="bdline"> </span>
              <p><?php $options = get_option( 'arinio_theme_options' ); if($options['msheadingdes'] != '') { echo $options['msheadingdes']; }else{ echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus accumsan egestas neque, vitae venenatis ex porta Maecenas dictum purus sed porta."; } ?></p>  </div>
            </div>
          </div> 
        </div>

<div class="row">
                <div class="col-md-4">
                    <div class="arfeature">
                    <div class="arfeature-inner">

					<header>
 	<i class="fa <?php $options = get_option( 'arinio_theme_options' ); if($options['sicon1'] != '') { echo $options['sicon1']; }else{ echo "fa-globe"; } ?>"></i>

					<?php $options = get_option( 'arinio_theme_options' ); if($options['fstitle'] != '') { echo $options['fstitle']; }else{ echo "Development"; } ?>

					 </header>

					<p><?php $options = get_option( 'arinio_theme_options' ); if($options['fdtitle'] != '') { echo $options['fdtitle']; }else{ echo "Duis in odio quis lorem imperdiet fermentum sit amet nec ante. Nunc nibh odio, interdum."; } ?></p>

					
                    </div>
                </div></div>
               <div class="col-md-4">
                <div class="arfeature">
                   <div class="arfeature-inner">

					<header>

						<i class="fa <?php $options = get_option( 'arinio_theme_options' ); if($options['sicon2'] != '') { echo $options['sicon2']; }else{ echo "fa-globe"; } ?>"></i>

					<?php $options = get_option( 'arinio_theme_options' ); if($options['sstitle'] != '') { echo $options['sstitle']; }else{ echo "Designing"; } ?>

					 </header>

					<p><?php $options = get_option( 'arinio_theme_options' ); if($options['sdtitle'] != '') { echo $options['sdtitle']; }else{ echo "Duis in odio quis lorem imperdiet fermentum sit amet nec ante. Nunc nibh odio, interdum."; } ?></p>

					

				  </div></div>
                </div>                <div class="col-md-4">                  <div class="arfeature">
                 <div class="arfeature-inner">

					<header>

						<i class="fa <?php $options = get_option( 'arinio_theme_options' ); if($options['sicon3'] != '') { echo $options['sicon3']; }else{ echo "fa-globe"; } ?>"></i>

					<?php $options = get_option( 'arinio_theme_options' ); if($options['sstitle3'] != '') { echo $options['sstitle3']; }else{ echo "CONSULTING"; } ?>

					 </header>

					<p><?php $options = get_option( 'arinio_theme_options' ); if($options['sdtitle3'] != '') { echo $options['sdtitle3']; }else{ echo "Duis in odio quis lorem imperdiet fermentum sit amet nec ante. Nunc nibh odio, interdum."; } ?></p>
								
				   </div></div>
             </div>
           </div> </div></div>

<?php } ?> 



 







 

  
  
  
  
  
  
  
    <?php if($options['blogsection'] == 'on' || $options['blogsection'] == '') { ?>
  <div class="section">
   <div class="container">
   <div class="heading">
          <div class="row">
              <div class="text-center col-md-12">
              <div class="mainheading"> <h2><?php if($options['blogh'] != '') { echo $options['blogh']; }else{ echo "Our Blog"; } ?></h2> <span class="bdline"> </span>
              <p><?php if($options['bloghdd'] != '') { echo $options['bloghdd']; }else{ echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus accumsan egestas neque, vitae venenatis ex porta Maecenas dictum purus sed porta."; } ?></p>  </div>
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
    
    <?php  if($options['blogp'] != '') { $blogpt = $options['blogp']; }else{ $blogpt = 3; } ?>
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
      <?php } ?>
  
  
 

 <div class="container">
<p id="back-top" style="display: block;">
		<a href="#top"><span><i class="fa fa-arrow-up main-arrow"></i> </span></a>
</p>
</div>
 
<?php get_footer(); ?>
