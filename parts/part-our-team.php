<?php 
/* Our Team */

$ourteam_title_safreen = esc_html( get_theme_mod('safreen_ourtem_title',__('Our Dream Team ','safreen')) );
$ourteam_subtitle_safreen = esc_html( get_theme_mod('safreen_ourteam_subtitle',__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. ','safreen')) );

?>
<?php if ( is_active_sidebar( 'sidebar-ourteam' ) ) :?>
<div id='our-team-safreen'>
<div class="row">
 


                    
                        <div class="text-center">
                            <h2 class="team-safreen-title wow fadeIn" ><?php if( !empty($ourteam_title_safreen) ):?>
                            
                            <?php echo $ourteam_title_safreen ?>
                            <div  class="small-border wow flipInY" ></div>

                            <?php endif;?>
                            <?php if( !empty($ourteam_subtitle_safreen) ):?>
						<span><?php echo $ourteam_subtitle_safreen ?></span>
                             <?php endif;?>

                            </h2>
                                                    </div>


			
				<?php dynamic_sidebar( 'sidebar-ourteam' );?>
           
                       				
			
            </div></div>
            <?php endif;?>