<!--++++++++++++++ Footer Section Start +++++++++++++++++++++++++-->

<div id="footerOuterSeparator"></div>

<div id="divFooter" class="footerArea">

    <div class="container">

        <div class="divPanel">

            <div class="row">
            
            
             <?php if (!dynamic_sidebar('footer-sidebar')) : ?>
           
        
            
            
            
            
                <div class="col-md-3" id="footerArea1">
                <?php 
				$options = get_option( 'arinio_theme_options' ); 
									if($options['footert1'] != '')
									{
										echo $options['footert1'];
									}else{
										echo ' <h3>About Company</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet purus rutrum, vestibulum urna a, elementum nulla. Etiam pharetra nisi sit amet sapien malesuada, non hendrerit arcu pellentesque. .  </p>
                    
                     ';
										 				
									}
									?>
                   

                </div>
                <div class="col-md-3" id="footerArea2">

                    <h3>Recent Post </h3> 
                   <ul>
          <?php
						$args = array(
							'numberposts' => 5,
							'orderby' => 'post_date',
							'order' => 'DESC',
							'post_type' => 'post',
							'post_status' => 'draft, publish, future, pending, private',
						);
						$recent_posts = wp_get_recent_posts($args);
						foreach( $recent_posts as $recent ){
							echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
						}
						?>
        </ul>
                     

                </div>
                <div class="col-md-3" id="footerArea3">
 <?php 
				$options = get_option( 'arinio_theme_options' ); 
									if($options['footert2'] != '')
									{
										echo $options['footert2'];
									}else{
										echo ' <h3>Sample Content</h3> 
                    <p>Nam eget placerat justo. Suspendisse quis hendrerit nisl. Nullam eget malesuada dui. Phasellus auctor, justo eu euismod vestibulum, ex nisl mollis elit, ut efficitur mauris turpis ullamcorper nisl. Proin eleifend erat tellus, at feugiat mi pulvinar at. Fusce vitae ante fermentum nisi fermentum euismod eu ac quam.
                    </p>';
										 				
									}
									?>
                    

                </div>
                <div class="col-md-3" id="footerArea4">
 <?php 
				$options = get_option( 'arinio_theme_options' ); 
									if($options['footert3'] != '')
									{
										echo $options['footert3'];
									}else{
										echo ' <h3>Get in Touch</h3>  
                                                               
                    <ul id="contact-info">
                    <li>                                    
                        <i class="fa fa-phone icon"></i>
                        <span class="field">Phone:</span>
                        <br />
                       +91-21-2556-2200/2500-3200                                                                      
                    </li>
                    <li>
                        <i class="fa fa-envelope icon"></i>
                        <span class="field">Email:</span>
                        <br />
                        <a href="mailto:contact@mysite.com" title="Email">contact@mysite.com</a>
                    </li>
                    <li>
                        <i class="fa fa-home icon" style="margin-bottom:50px"></i>
                        <span class="field">Address:</span>
                        <br />
                       ARINIO GROUP

<br />
                        WZ-290,Plot No.-8, Commodo <br />
                         Aenean Cursus-100002
                    </li>
                    </ul>';
										 				
									}
									?>
                    

                </div>
            </div>
            
            
            
            <?php endif; // end primary widget area  ?>


<div class="row">
                <div class="col-md-12">
                 <?php if ( has_nav_menu( 'secondary' ) ) : ?>
	<nav role="navigation" class="navigation site-navigation secondary-navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'secondary','menu_id' => 'nava','depth'=>-1 ) ); ?>
	</nav>
	<?php endif; ?>
                 
                 
                   
                </div>
            </div>

           
            <div class="row">
                <div class="col-md-12">
                    <p class="copyright">
                     <?php  if($options['footertext'] != '') { echo $options['footertext']; }else{ echo " Copyright &#169; 2014 Your Company. All Rights Reserved."; } ?>  
                    </p>

                  
                </div>
            </div>
            <br />

        </div>

    </div>
    
</div>

<!--end / footer-->
<?php wp_footer(); ?>







<!--++++++++++++++ Footer Section End +++++++++++++++++++++++++-->
 


</body></html>