 <!--Footer-->
 <?php 
 $display_footer_widgets    = avata_option('display_footer_widgets'); 
 $footer_columns            = avata_option('footer_columns'); 
 ?>
  <?php if( $display_footer_widgets == '1' ):?>
<footer id="footer">
<div class="container">
    <div class="row">
    <?php 
					for( $i=1;$i<=$footer_columns; $i++ ){
					?>
                    <div class="col-md-<?php echo 12/$footer_columns; ?>">
                    <?php
							if(is_active_sidebar("footer_widget_".$i)){
	                           dynamic_sidebar("footer_widget_".$i);
                               }
							?>
                    </div>
                    
                    <?php }?>
      </div>
    </div>
</footer>
<?php endif;?>

<section id="footer-copyright">
    <div class="container">
        <div class="row">
            <p class="col-md-4">
              <?php
                        printf(__('Designed by <a href="%s">HooThemes</a>.','avata'),esc_url('http://www.hoothemes.com/'));
                      
                      ?>
            </p>

            <div class="col-md-8 hidden-phone">
               <?php 
					 wp_nav_menu(array('theme_location'=>'footer_menu','depth'=>1,'fallback_cb' =>false,'menu_class'=>'footer-links','link_before' => '', 'link_after' => '','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>'));
					?>
            </div>

        </div>
    </div>
</section>


<?php wp_footer(); ?>

</body>
</html>