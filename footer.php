    <footer class="ct_footer">

	<?php
		$display_footer_widget_area = acool_get_option( 'ct_acool','display_footer_widget_area',1);
      	if( $display_footer_widget_area )
		{
    ?>    
        <div class="container ct_footer_columns">
            <div class="row ioftsc">
            	<?php get_sidebar( 'footer' ); ?>
            </div>
        </div>
	<?php }?>       
        
		<div class="ct_footer_bottom copyright">
			<div class="container">
              	<div class="row">
                  	<div class="col-md-12">
                      	<div class="ct_social_front">
                          	<p>
							<?php 
								$footer_info = acool_get_option( 'ct_acool','footer_info','' );
								
								if ( '' != $footer_info )
								{
									echo '<span class="footer_info">'.esc_html($footer_info).'</span>'; 
								}
                            ?>
                           <?php printf(__('Powered by <a href="%s">WordPress</a>. Designed by <a href="%s">CooThemes.com</a>.','acool'),esc_url('http://wordpress.org/'),esc_url('http://www.coothemes.com/'));?>                  
                            </p>
                      	</div>
                  	</div>
              	</div>
          	</div>
		</div>       
     
    </footer>
 
</div><!--div class="ct_acool "-->

<div class="side">
	<ul>
		<li id="gotop"><a href="javascript:goTop();" class="sidetop"><img src="<?php echo get_template_directory_uri(); ?>/images/side_icon05.png"></a></li>
	</ul>
</div>

<?php wp_footer(); ?>
</body>
</html>