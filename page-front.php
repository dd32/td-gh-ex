<?php
/*
	Template Name: Front Page
	Design Theme's Front Page to Display the Home Page if Selected
	
*/
get_header(); ?>


<span id="section_one"></span>
<!--++++++++++++++ Slider Section Start +++++++++++++++++++++++++-->


<div id="carouselSection" class="cntr"> 
		<div id="myCarousel" class="carousel slide">
		
			<div class="carousel-inner">
            
				<div class="item active" style="background-image:url( <?php  $options = get_option( 'arinio_theme_options' );  if($options['slide1image'] != '') { echo $options['slide1image']; }else{ echo get_template_directory_uri(); echo '/img/slide1.jpg'; } ?>);">
					<div class="carousel-caption-text">
<div class="container">


<?php $options = get_option( 'arinio_theme_options' ); 
 if($options['slide1title'] != '') {
?>
<div class="slide_h1_wrap"><h1 class="headline"><?php echo $options['slide1title'];?></h1></div>
 
<?php } else { ?>
<div class="slide_h1_wrap"><h1 class="headline">One Page Theme </h1></div>
<?php } ?>


<?php $options = get_option( 'arinio_theme_options' ); 
 if($options['slide1subtitle'] != '') {
?>
<div class="slide_h3_wrap"><h3 class="sub-headline"><?php echo $options['slide1subtitle'];?></h3></div>
<?php } else { ?>
<div class="slide_h3_wrap"><h3 class="sub-headline"> Voluptate Velit Esse - Get Started Today!</h3></div>
<?php } ?>




<?php $options = get_option( 'arinio_theme_options' ); 
 if($options['slide1des'] != '') {
?>
 
<div class="descriptions"><p><?php echo $options['slide1des'];?></p>
<?php } else { ?>
<div class="descriptions"><p>Erat dolor purus turpis hymenaeos vel luctus integer consectetuer porttitor ut.</p>
<?php } ?>

</div>
</div>
</div>
				</div>
				
                
                
                
                
                
                
				<div class="item" style="background-image:url(<?php  $options = get_option( 'arinio_theme_options' );  if($options['slide2image'] != '') { echo $options['slide2image']; }else{ echo get_template_directory_uri(); echo '/img/slide2.jpg'; } ?>);">
					 <div class="carousel-caption-text">
<div class="container">

<?php $options = get_option( 'arinio_theme_options' ); 
 if($options['slide2title'] != '') {
?>
<div class="slide_h1_wrap"><h1 class="headline"><?php echo $options['slide2title'];?></h1></div>
 
<?php } else { ?>
<div class="slide_h1_wrap"><h1 class="headline">One Page Theme</h1></div>
<?php } ?>


<?php $options = get_option( 'arinio_theme_options' ); 
 if($options['slide2subtitle'] != '') {
?>
<div class="slide_h3_wrap"><h3 class="sub-headline"><?php echo $options['slide2subtitle'];?></h3></div>
<?php } else { ?>
<div class="slide_h3_wrap"><h3 class="sub-headline">Voluptate Velit Esse - Get Started Today!</h3></div>
<?php } ?>




<?php $options = get_option( 'arinio_theme_options' ); 
 if($options['slide2des'] != '') {
?>
 
<div class="descriptions"><p><?php echo $options['slide2des'];?></p>
<?php } else { ?>
<div class="descriptions"><p>Erat dolor purus turpis hymenaeos vel luctus integer consectetuer porttitor ut.</p>
<?php } ?>
</div>
</div>
</div>
				</div>
                
                
</div>
			<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
		</div>
</div>




<span id="section_two"></span>

<div id="contentOuterSeparator"></div>

<div class="container" >

    <div class="divPanel page-content" >
    
    
    
    
    
    
    
   <!--++++++++++++++ Service Section Start +++++++++++++++++++++++++--> 
    
    
    
    

        <div class="row">
 
 <div class="col-md-12" >           <div class="lead">
 
 
                       <h2> <?php $options = get_option( 'arinio_theme_options' ); if($options['msheading'] != '') { echo $options['msheading']; }else{ echo "Our Services"; } ?></h2> 
                       <p class="saperator"><img src="<?php echo get_template_directory_uri(); ?>/styles/recent-blog-seperator-icon.jpg"></p>
                    </div> </div> </div> 
 
 <div class="row">
<div class="col-md-4 ">
<div class="menu12"  ><div><i class="fa <?php $options = get_option( 'arinio_theme_options' ); if($options['sicon1'] != '') { echo $options['sicon1']; }else{ echo "fa-desktop"; } ?> main-color"  ></i></div></div>
                    
                    <h3 style="text-align:center;"><?php $options = get_option( 'arinio_theme_options' ); if($options['fstitle'] != '') { echo $options['fstitle']; }else{ echo "Web Development"; } ?></h3>
                    <p style="text-align:center;" ><?php $options = get_option( 'arinio_theme_options' ); if($options['fdtitle'] != '') { echo $options['fdtitle']; }else{ echo "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum ."; } ?>
                       
                    </p>

                </div>
<div class="col-md-4 " >
<div class="menu12"  ><div><i class="fa <?php $options = get_option( 'arinio_theme_options' ); if($options['sicon2'] != '') { echo $options['sicon2']; }else{ echo "fa-group"; } ?> main-color"  ></i></div></div>
                      
                     <h3 style="text-align:center;"><?php $options = get_option( 'arinio_theme_options' ); if($options['sstitle'] != '') { echo $options['sstitle']; }else{ echo "APPS DEVELOPMENT"; } ?></h3>
                    <p style="text-align:center;"><?php $options = get_option( 'arinio_theme_options' ); if($options['sdtitle'] != '') { echo $options['sdtitle']; }else{ echo "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum."; } ?>
                      
                    </p>

                </div>
                <div class="col-md-4 " >
                <div class="menu12"  ><div><i class="fa <?php $options = get_option( 'arinio_theme_options' ); if($options['sicon3'] != '') { echo $options['sicon3']; }else{ echo "fa-gear"; } ?> main-color"  ></i></div></div>
  
                    <h3 style="text-align:center;"><?php $options = get_option( 'arinio_theme_options' ); if($options['sstitle3'] != '') { echo $options['sstitle3']; }else{ echo "IT CONSULTING"; } ?></h3> 
                    <p style="text-align:center;"><?php $options = get_option( 'arinio_theme_options' ); if($options['sdtitle'] != '') { echo $options['sdtitle']; }else{ echo "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum ."; } ?> 
                       
                    </p>

                </div>
                
    <div class="col-md-12" >          <hr style="margin:45px 0 35px">  </div> </div> 
    
    
    <!--++++++++++++++ Service Section End +++++++++++++++++++++++++-->
    
    
    
    
    
    
  <!--++++++++++++++ Blog Section Start +++++++++++++++++++++++++-->  
    
     <?php function custom_excerpt_length( $length ) {
        return 19;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 ); ?>
    
    
    <div class="blog-wrapper"  >
    <div class="blog-container">
   <div class="row" >  
   <div class="col-md-12" >     <div class="lead">
                        <h2><?php if($options['blogh'] != '') { echo $options['blogh']; }else{ echo "Our Blog"; } ?></h2> 
                       <p class="saperator"><img src="<?php echo get_template_directory_uri(); ?>/styles/recent-blog-seperator-icon.jpg"></p>
                    </div></div></div> 
  
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
      <div class="asat">    <h3 ><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
         <i class="fa fa-calendar main-cal"></i><?php
                        $archive_year = get_the_time('Y');
                        $archive_month = get_the_time('m');
                        $archive_day = get_the_time('d');
                        ?>
                        <a href="<?php
                        echo get_day_link($archive_year,
                                $archive_month,
                                $archive_day);
                        ?>"><?php echo get_the_time('m, d, Y') ?></a>
          <p class="postp">
          <?php the_excerpt(); ?>
          </p>
          
         </div> 
          
          
          <!--end / post-content--> 
          
        </div>
                </div>  </div>
        <?php endwhile; // end of the loop. ?>
        <?php comments_template( '', true ); ?>
 </div> </div> 
    
    </div> 
   
    <!--++++++++++++++ Blog Section End +++++++++++++++++++++++++-->
    
   



<!--++++++++++++++ About Section Start +++++++++++++++++++++++++-->

<div class="row" id="section_three"><div class="col-md-12">           <div class="lead">
                        <h2><?php $options = get_option( 'arinio_theme_options' ); if($options['aboutus'] != '') { echo $options['aboutus']; }else{ echo "About Us"; } ?></h2> 
                       <p class="saperator"><img src="<?php echo get_template_directory_uri(); ?>/styles/recent-blog-seperator-icon.jpg"></p>
                    </div> </div></div>

<div class="row">

			<!--Edit Main Content Area here-->
                <div class="col-md-12" id="divMain">
<?php $options = get_option( 'arinio_theme_options' ); if($options['aboutusd'] != '') { echo $options['aboutusd']; }else{ echo '<p ><img src="'; echo get_template_directory_uri(); echo '/images/slide1.jpg" width="1140px" height="200px" alt="" ></p><h4>Who We Are</h4>
					 					
                   <p><strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elite.</strong></p>                                 
                    <p>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. </p>
										 
					
					<h4>Why Choose Us?</h4>
                    <p><strong>Aenean commodo ligula eget dolor. Aenean massa.</strong></p>                                 
                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. </p>'; } ?>
                  
			 
			
			 
			
			 
                </div>
				 

<div class="col-md-12" >          <hr style="margin:45px 0 35px">   </div> </div>


<!--++++++++++++++ About Section End +++++++++++++++++++++++++-->





</div></div>

 
 


<div class="container">

 <!--++++++++++++++ Contact Section Start +++++++++++++++++++++++++-->          
            
<div class="row" id="section_four"> <div class="col-md-12" >           <div class="lead">
                        <h2><?php $options = get_option( 'arinio_theme_options' ); if($options['contacth'] != '') { echo $options['contacth']; }else{ echo "Contact Us"; } ?></h2> 
                       <p class="saperator"><img src="<?php echo get_template_directory_uri(); ?>/styles/recent-blog-seperator-icon.jpg"></p>
                    </div> </div>    </div>    
                    
 <div class="row slide" id="slide10" >  
    
<div class="col-md-12 span"   ><p class="ptext">
<?php $options = get_option( 'arinio_theme_options' ); if($options['contactd'] != '') { echo $options['contactd']; }else{ echo "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.  "; } ?></p>

<div class="cofrm">  
<div id="fields">
  <?php get_template_part('home-contact'); ?>
                    
                    
                    
                   
				</div>
			</div>

                </div>
 
<div class="col-md-12" >          <hr style="margin:45px 0 35px">   </div> </div>  



  <!--++++++++++++++ Contact Section End +++++++++++++++++++++++++-->


         
  <div id="footerInnerSeparator"></div>
 </div>

</div>

<div class="container">
<p id="back-top" style="display: block;">
		<a href="#top"><span><i class="fa fa-arrow-up main-arrow"></i> </span></a>
</p>
</div>


 
   

 
<?php get_footer(); ?>
