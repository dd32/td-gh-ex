<?php 

/* About Us section part */ 

$service_title_safreen = esc_html( get_theme_mod('safreen_aboutus_title',__('Why Choose Us? ','safreen')) );
$service_subtitle_safreen = esc_html( get_theme_mod('safreen_aboutus_subtitle',__('Find reasons to choose us as your Web partner ','safreen')) );
?>
<?php if ( is_active_sidebar( 'sidebar-aboutus' ) ) :?>
<section id="section-features">

                    <div class="row">
                        <div class="text-center">
                            <h2 class="wow fadeIn" ><?php if( !empty($service_title_safreen) ):?>
                            
                            <?php echo $service_title_safreen ?>
                            
                            <?php endif;?>
                            <?php if( !empty($service_subtitle_safreen) ):?>
						<span><?php echo $service_subtitle_safreen ?></span>
                             <?php endif;?>

                            </h2>
                            <div  class="small-border wow flipInY" ></div>
                        </div>
                        
                        
				
				<?php dynamic_sidebar( 'sidebar-aboutus' );?>
			
			

</section>

<?php endif;?>