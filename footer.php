    <footer class="ct_footer">

	<?php
      	$display_footer_widget_area = of_get_option('display_footer_widget_area',0);
      	if( $display_footer_widget_area == '1' )
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
                          	<ul class="ct_social">
                        	<?php 
              
								for($i=0;$i<9; $i++)
							  	{
								  	$social_icon  = of_get_option('social_icon_'.$i);
								  	$social_link  = of_get_option('social_link_'.$i);
								  	$social_title = of_get_option('social_title_'.$i);
								  	if($social_link !="")
								  	{
								  		echo '<li><a href="'.esc_url($social_link).'" target="_blank" data-toggle="tooltip" title="'.esc_attr($social_title).'"><i class="'.$social_icon.'"></i></a></li>';
								  	}
								}
							?>
      	
                          	</ul>
                          	<p>&copy; <?php echo date("Y");?>, <?php printf(__('Powered by <a href="%s">WordPress</a>. Designed by <a href="%s">CooThemes.com</a>.','Acool'),esc_url('http://wordpress.org/'),esc_url('http://www.coothemes.com/'));?></p>
                      	</div>
                  	</div>
              	</div>
          	</div>
		</div>        
     
    </footer>
 
</div><!--div class="ct_acool "-->

<?php wp_footer(); ?>
</body>
</html>