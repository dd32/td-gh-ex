<?php
/* Template Name: ContactUs page */

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
				           
                <div class="contact-wrap row">   
                    <div class="title-box">
						<?php $contact_info_title_check = get_theme_mod( 'contact_info_title_setting' );
						if(!empty($contact_info_title_check)) {?>
							<h2 class="content-heading"> <?php echo esc_attr( get_theme_mod('contact_info_title_setting', '') ); ?> </h2>
                        <?php }?>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
						<?php $contact_info_check = get_theme_mod( 'contact_info_setting' );
						if(!empty($contact_info_check)) {?>
							<p class="textwidget"> <?php echo esc_textarea( get_theme_mod('contact_info_setting', '') );?> </p>
						<?php }?>
                        <ul>
							<?php $contact_add_check = get_theme_mod( 'contact_add_setting' );
								if(!empty($contact_add_check)) {?>
									<li><i class="fa fa-map-marker"></i> <span><?php echo esc_textarea( get_theme_mod('contact_add_setting', '') );?></span> </li>
								<?php }?>
							<?php $contact_email_check = get_theme_mod( 'contact_email_setting' );
								if(!empty($contact_email_check)) {?>
									<li><i class="fa fa-envelope"></i> <span><a href="mailto:<?php echo esc_attr( get_theme_mod('contact_email_setting', '') );?>"><?php echo esc_attr( get_theme_mod('contact_email_setting', '') );?></a></span></li>
								<?php }?>
							<?php $contact_telephone_check = get_theme_mod( 'contact_telephone_setting' );
								if(!empty($contact_telephone_check)) {?>
									<li><i class="fa fa-phone"></i> <span><?php echo esc_attr( get_theme_mod('contact_telephone_setting', '') );?></span></li>
								<?php }?>
							<?php $contact_web_check = get_theme_mod( 'contact_web_setting' );
								if(!empty($contact_web_check)) {?>
									<li><i class="fa fa-globe"></i> <span><a href="<?php echo esc_url( get_theme_mod('contact_web_setting', '') );?>" ><?php echo esc_url( get_theme_mod('contact_web_setting', '') );?></a></span> </li>
								<?php }?>
                        </ul>                  
                    </div>

					<div class="col-lg-6 col-md-6 col-sm-6 contact-form">
						 <?php while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
						<?php endwhile; ?> 
					</div> 
            </div>
            <!--contact Us- end-->   
        </section>
<?php get_footer();?>
