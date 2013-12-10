<?php 

	novalite_bottom_content();
	do_action( 'novalite_socials' ); 
	
?>
    
<footer id="footer">
	<div class="container">
		<div class="row" >
             
			<div class="span12 copyright" >
    
                 <?php if (novalite_setting('wip_copyright_text')): ?>
                	<p> <?php echo stripslashes(novalite_setting('wip_copyright_text')); ?> </p>
                <?php else: ?>
                	<p> Copyright <?php echo get_bloginfo("name"); ?> <?php echo date("Y"); ?> - Powered by <a href="http://www.wpinprogress.com/" target="_blank">WP in Progress</a> </p>
            	<?php endif; ?>
    
			</div>
                
		</div>
	</div>
</footer>
    
<div id="back-to-top">
<a href="#" style=""><i class="icon-chevron-up"></i></a> 
</div>
    
<?php wp_footer() ?>  
 
</body>

</html>