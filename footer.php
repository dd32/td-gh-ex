<!--++++++++++++++ Footer Section Start +++++++++++++++++++++++++-->

<div id="footerOuterSeparator"></div>

<div id="divFooter" class="footerArea">

    <div class="container">

        <div class="divPanel">

            <div class="row">
            
            
            <?php if (!dynamic_sidebar('footer-sidebar')) : ?>
           
            <div class="col-md-3" id="footerArea1">  <h3><?php $options = get_option( 'arinio_theme_options' ); if($options['fwidgett1'] != '') { echo esc_attr($options['fwidgett1']); }else{ ?> <?php _e( 'About Company', 'ariwoo' ); ?> <?php } ?></h3>
                
				
				<p> <?php  if($options['footert1'] != '') { echo esc_attr($options['footert1']); }else{ ?> <?php _e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet purus rutrum, vestibulum urna a, elementum nulla. Etiam pharetra nisi sit amet sapien malesuada, non hendrerit arcu pellentesque.', 'ariwoo' ); ?> <?php  } ?> </p>
				 
                   

                </div>
                <div class="col-md-3" id="footerArea2">

                    <h3><?php if($options['fwidgett2'] != '') { echo esc_attr($options['fwidgett2']); }else{ ?> <?php _e( 'Recent Post', 'ariwoo' ); ?> <?php  } ?></h3> 
                   <ul class="sparrow">
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
                <div class="col-md-3" id="footerArea3">  <h3><?php if($options['fwidgett3'] != '') { echo esc_attr($options['fwidgett3']); }else{ ?> <?php _e( 'Sample Content', 'ariwoo' ); ?> <?php  } ?></h3>
                
                <p> <?php if($options['footert2'] != '') { echo esc_attr($options['footert2']); }else{ ?> <?php _e( 'Nam eget placerat justo. Suspendisse quis hendrerit nisl. Nullam eget malesuada dui. Phasellus auctor, justo eu euismod vestibulum, ex nisl mollis elit, ut efficitur mauris turpis ullamcorper nisl. Proin eleifend erat tellus, at feugiat mi pulvinar at.', 'ariwoo' ); ?> <?php } ?> </p>
 
                    

                </div>
                <div class="col-md-3" id="footerArea4"> 
                <h3><?php if($options['fwidgett4'] != '') { echo esc_attr($options['fwidgett4']); }else{ ?> <?php _e( 'Get in Touch', 'ariwoo' ); ?> <?php  } ?></h3>
    
                                                               
                    <ul id="contact-info">
                   
                    <li>
                        <i class="fa fa-home icon" style="margin-bottom:50px"></i>
                        <span class="field">Address:</span>
                        <br />
                       <?php if($options['footert3'] != '') { echo esc_attr($options['footert3']); }else{ ?> <?php _e( 'ARINIO GROUP <br /> WZ-290,Plot No.-8, Commodo <br /> Aenean Cursus-100002', 'ariwoo' ); ?> <?php } ?> 
                    </li>
                    </ul> 
                    

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