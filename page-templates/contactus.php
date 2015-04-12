<?php
/* Template Name: ContactUs page */
$avocation_options = get_option('avocation_theme_options');
?>
<?php get_header();?>
        <!--==============================Section=================================-->
        <section>          
            <!--Breadcrumb Start-->
            <div class="breadcrumb-bg">
                <div class="royals-container container">
                    <div class="site-breadcumb">
                        <h1><?php the_title();?></h1>
                        <ol class="breadcrumb breadcrumb-menubar">
                          <?php if (function_exists('avocation_custom_breadcrumbs')) avocation_custom_breadcrumbs(); ?>                               
                        </ol>
                    </div>  
                </div>
            </div>
            <!--Breadcrumb End-->  

            <!--contact us-start-->
                
                
         
            <div class="avocation-container container">   
				<div class="col-lg-6 col-md-6 col-sm-6 contact-form">
					 <?php while (have_posts()) : the_post(); ?>
					<div class="item" >
                             
                                </div>
                    <?php the_content(); ?>
                    <?php endwhile; ?> 
                </div>            
                <div class="contact-wrap row">   
                    <div class="title-box">
						<?php if(!empty($avocation_options['contact-info-title'])){?>
                        <h2 class="content-heading"> <?php echo esc_attr($avocation_options['contact-info-title']); ?> </h2><?php }?>
                    </div>
                  
                    <div class="col-lg-6 col-md-6 col-sm-6">
						  <?php if(!empty($avocation_options['contact-info'])){?>
                        <p class="textwidget"> <?php echo esc_attr($avocation_options['contact-info']);?> </p>
							<?php }?>
                        <ul>
							<?php if(!empty($avocation_options['contact-address'])){?>
                            <li><i class="fa fa-map-marker"></i> <span><?php echo esc_attr($avocation_options['contact-address']);?></span> </li><?php }?>
                            <?php if(!empty($avocation_options['contact-email'])){?>
                            <li><i class="fa fa-envelope"></i> <span><?php echo esc_attr($avocation_options['contact-email']);?></span></li><?php }?>
                            <?php if(!empty($avocation_options['contact-telephone'])){?>
                            <li><i class="fa fa-phone"></i> <span><?php echo esc_attr($avocation_options['contact-telephone']);?></span></li><?php }?>
                            <?php if(!empty($avocation_options['contact-web'])){?>
                            <li><i class="fa fa-globe"></i> <span><a href="#"><?php echo esc_attr($avocation_options['contact-web']);?></a></span> </li><?php }?>
                        </ul>                  
                    </div>
                    
                    
                    <?php if(!empty($avocation_options['contact-code'])) {?>
                <div class="col-lg-6 col-md-6 col-sm-6 contact-form">
                    <?php echo do_shortcode($avocation_options['contact-code']); ?> 
                </div>
            <?php } ?>
						
                    
            </div>
            <!--contact Us- end-->   
        </section>
<?php get_footer();?>
