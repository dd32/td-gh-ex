</div> <!-- end content -->
	
<div id="footer"> <!-- begin footer -->
	<div id="footer-inner" class="clear"> <!-- begin footer-inner -->
			<ul>
				<li onmouseover='this.style.borderTopColor="#237FE6";return;'
					onmouseout='this.style.borderTopColor="#3F3F3F";return;'><?php footer_category_link(1); ?>
					<img src="<?php footer_image(1); ?>" width="<?php echo FOOTER_IMAGE_WIDTH; ?>" height="<?php echo FOOTER_IMAGE_HEIGHT; ?>" alt="" /></li>
				<li onmouseover='this.style.borderTopColor="#237FE6";return;'
					onmouseout='this.style.borderTopColor="#3F3F3F";return;'><?php footer_category_link(2); ?>
					<img src="<?php footer_image(2); ?>" width="<?php echo FOOTER_IMAGE_WIDTH; ?>" height="<?php echo FOOTER_IMAGE_HEIGHT; ?>" alt="" /></li>
				<li onmouseover='this.style.borderTopColor="#237FE6";return;'
					onmouseout='this.style.borderTopColor="#3F3F3F";return;'><?php footer_category_link(3); ?>
					<img src="<?php footer_image(3); ?>" width="<?php echo FOOTER_IMAGE_WIDTH; ?>" height="<?php echo FOOTER_IMAGE_HEIGHT; ?>" alt="" /></li>
				<li style="padding-right: 13px;" onmouseover='this.style.borderTopColor="#237FE6";return;'
					onmouseout='this.style.borderTopColor="#3F3F3F";return;'><?php footer_category_link(4); ?>
					<img src="<?php footer_image(4); ?>" width="<?php echo FOOTER_IMAGE_WIDTH; ?>" height="<?php echo FOOTER_IMAGE_HEIGHT; ?>" alt="" /></li>
			</ul>
		
	</div> <!-- end footer-inner -->
</div> <!-- end footer -->

<div id="copyright" class="clear"> <!-- begin copyright -->
	<p style="text-align:center;padding-top:5px;font-size:10px;">
		 Powered by <a href="http://wordpress.org/" title="Wordpress">Wordpress</a>. Auto Dezmembrari by <a href="http://auto.dezmembrari.ro/" title="auto dezmembrari">Auto Dezmembrari</a> &copy; <?php echo date( "Y" ); ?>.</p>
				
</div> <!-- end copyright -->
	
	
</div> <!-- end wrapper -->
	
</div> <!-- end main-wrapper -->

<?php wp_footer(); ?>

</body>
</html>