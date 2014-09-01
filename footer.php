</div>
<hr /><footer role="contentinfo" id="footer">  
  <div id="inner-footer" class="clearfix container padding-top-bottom">
  	<?php $options = get_option( 'faster_theme_options' ); ?>
	<div id="widget-footer" class="clearfix row">
    	<div class="col-md-4">
		  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
          <?php endif; ?>
         </div>
         <div class="col-md-4">
		  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
          <?php endif; ?>
		</div>
        <div class="col-md-4">
		  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
          <?php endif; ?>
		</div>
    </div>
        <nav class="footer-menu-nav">
     	<ul class="footer-nav nav navbar-nav">
        	<?php if((!empty($options['fburl'])) || (!empty($options['twitter'])) || (!empty($options['googleplus'])) || (!empty($options['linkedin']))) { ?>
        	<li><a>Follow Us :</a></li>
            <?php } if(!empty($options['fburl'])) { ?>
        	<li class="facebook_icon socia_icon"><a href="<?php echo $options['fburl']; ?>" target="_blank">facebook</a></li>
            <?php } if(!empty($options['twitter'])) { ?>
            <li class="twitter_icon socia_icon"><a href="<?php echo $options['twitter']; ?>">twitter</a></li>
            <?php } if(!empty($options['googleplus'])) { ?>
            <li class="google_icon socia_icon"><a href="<?php echo $options['googleplus']; ?>">google+</a></li>
            <?php } if(!empty($options['linkedin'])) { ?>
            <li class="linkedin_icon socia_icon"><a href="<?php echo $options['linkedin']; ?>">linkedin</a></li>
            <?php } ?>
        </ul>
    </nav>
    <p class="attribution">
	<?php 
		if(!empty($options['footertext']))
		{
			echo $options['footertext'];
		}
		echo " <a href='http://fasterthemes.com/wordpress-themes/MyWiki' target='_blank'>MyWiki</a> powered by WordPress.";				
	?>
    </p>
  </div>
  <!-- end #inner-footer --> 
  
</footer>
<!-- end footer -->
<!-- end #maincont .container --> 
<?php wp_footer(); // js scripts are inserted using this function ?>
</body>
</html>