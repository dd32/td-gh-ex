</div>
<hr /><footer role="contentinfo" id="footer">  
  <div id="inner-footer" class="clearfix container padding-top-bottom">
  	<?php $options = get_option( 'faster_theme_options' ); ?>
    <div id="widget-footer" class="clearfix row">
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
      <?php endif; ?>
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
      <?php endif; ?>
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
      <?php endif; ?>
    </div>
    <nav class="footer-menu-nav">
     	<ul class="footer-nav nav navbar-nav">
        	<?php if($options['fburl'] || $options['twitter'] || $options['googleplus'] || $options['linkedin']) { ?>
        	<li><a>Follow Us :</a></li>
            <?php } if($options['fburl']) { ?>
        	<li class="facebook_icon socia_icon"><a href="<?php echo $options['fburl']; ?>" target="_blank">facebook</a></li>
            <?php } if($options['twitter']) { ?>
            <li class="twitter_icon socia_icon"><a href="<?php echo $options['twitter']; ?>">twitter</a></li>
            <?php } if($options['googleplus']) { ?>
            <li class="google_icon socia_icon"><a href="<?php echo $options['googleplus']; ?>">google+</a></li>
            <?php } if($options['linkedin']) { ?>
            <li class="linkedin_icon socia_icon"><a href="<?php echo $options['linkedin']; ?>">linkedin</a></li>
            <?php } ?>
        </ul>
    </nav>
    <p class="attribution">
	<?php 		
		if($options['footertext'] != '')
		{
			echo $options['footertext'];
		}else{
			echo "Powered by <a href='http://wordpress.org' target='_blank'>WordPress</a>.";
			echo "Theme by <a href='http://fasterthemes.com' target='_blank'>FasterThemes</a>.";				
		}
	?>
    </p>
  </div>
  <!-- end #inner-footer --> 
  
</footer>
<!-- end footer -->
<!-- end #maincont .container --> 
<!--[if lt IE 7 ]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/cfinstall.min.js"></script>
<![endif]-->
<?php wp_footer(); // js scripts are inserted using this function ?>
</body>
</html>