<?php
/**
 * @subpackage Avedon
 * @since Avedon 1.07
 */
?>

<?php if ( ! dynamic_sidebar( 'pitch-content' ) ); ?>
<?php if ( ! dynamic_sidebar( 'bottom-content' ) ); ?>

<div id="bottom" class="row-fluid">
<div class="span10 offset1 thirds">
<div class="row-fluid">

<div class="span4">
<?php if ( ! dynamic_sidebar( 'bottom-left' ) ): ?>
<div class="widget widget_text"><div class="textwidget"><h4 class="widget-title">About Us...</h4><i class="subicon avedonicon-code"></i><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p></div></div>
<?php endif; ?>
</div>

<div class="span4">
<?php if ( ! dynamic_sidebar( 'bottom-middle' ) ): ?>
<div class="widget widget_text"><div class="textwidget"><h4 class="widget-title">Our Location</h4><i class="subicon avedonicon-location"></i><ul><li><b>Address: </b> 25, Lorem Lis, California, US</li><li><b>Phone: </b> 800 123 3456</li><li><b>Fax: </b> 800 123 3456</li><li><b>Email: </b> info@anybiz.com</li></ul></div></div>
<?php endif; ?>
</div>

<div class="span4">
<?php if ( ! dynamic_sidebar( 'bottom-right' ) ): ?>
<div class="widget widget_text"><div class="textwidget"><h4 class="widget-title">Subscribe</h4><i class="subicon avedonicon-picture"></i><p class="margin-bottom-10">Subscribe to our newsletter and stay up to date!</p><form class="form-inline"><input class="input-medium" placeholder="Your email" type="text">&nbsp;<button type="submit" class="btn btn-inverse">Go</button></form></div></div>
<?php endif; ?>
</div>

<div class="row-fluid"><div class="span12">
<?php if ( ! dynamic_sidebar( 'footer-content' ) ); ?>
</div></div>

</div></div></div>

<footer id="foot" class="row-fluid"><div class="span10 offset1">
<span class="span11"><?php echo of_get_option('footer_text', 'no entry'); ?></span>
<span class="span1 pull-right totop hidden-phone"><a href="#"><i class="avedonicon-chevron-up"></i></a></span>
</div></footer>

<?php if ( of_get_option('show_supersize') ) { get_template_part('helper/super'); } ?>
<?php wp_footer(); ?>
</body>
</html>