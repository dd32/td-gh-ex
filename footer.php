<?php

/*
	Footer
	
	Establishes the widgetized footer and static post-footer section of iFeature. 
	
	Copyright (C) 2011 CyberChimps
*/

?>
	
	
	</div><!--end main-->
</div><!--end page_wrap-->			
	
		
<div id="footer">
    <div id="footer_wrap">
    	
    	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer") ) : ?>
		
		<div class="footer-widgets">
			<h3>Recent Posts</h3>
			<ul>
				<?php wp_get_archives('type=postbypost&limit=4'); ?>
			</ul>
		</div>
		
		<div class="footer-widgets">
			<h3>Archives</h3>
			<ul>
				<?php wp_get_archives('type=monthly&limit=16'); ?>
			</ul>
		</div>

		<div class="footer-widgets">
			<h3>Links</h3>
			<ul>
				<?php wp_list_bookmarks('categorize=0&title_li='); ?>
			</ul>
		</div>

		<div class="footer-widgets">
			<h3>WordPress</h3>
			<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
    		<?php wp_meta(); ?>
    		</ul>
		</div>
			<?php endif; ?>
		<div class="clear"></div>

		<!--Inserts Google Analytics Code-->
		<?php echo stripslashes(get_option('if_ga_code')); ?>
			   
		<?php wp_footer(); ?>
	</div><!--end footer_wrap-->
</div><!--end footer-->
	
	<div id="afterfooter">
		<div id="afterfooterwrap">
			<!--Inserts Copyright Text-->
			<?php $copyright = get_option('if_footer_text') ? : 'default' ; ?>
				<?php if ($copyright == 'default'): ?> 
					<div id="afterfootercopyright">
						<?php echo '' . get_bloginfo ( 'name' );  ?>
					</div>
				<?php endif;?>
				<?php if ($copyright != 'hide'):?> 
					<div id="afterfootercopyright">
						&copy; <?php echo stripslashes(get_option('if_footer_text')); ?>
					</div>
				<?php endif;?>
			<!--Inserts Afterfooter Menu-->
			<div id="afterfootermenu">
				<?php wp_nav_menu('depth=1'); ?>
			</div>
			<!--Inserts iFeature SEO Module-->
			
					<div id="seomodule">
						<?php include (TEMPLATEPATH . '/sections/seomodule.php' ); ?>
					</div>
			
		</div>  <!--end afterfooterwrap-->	
	</div> <!--end afterfooter-->	
	
</body>

</html>
