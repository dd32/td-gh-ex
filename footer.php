<?php $arjunaOptions = arjuna_get_options(); ?>
<?php 
if ($arjunaOptions['headerImage'])
	$tmp = 'footer_'.$arjunaOptions['headerImage'];
else $tmp = 'footer_lightBlue';
?>
		<div class="clear"></div>
	</div><!-- .contentWrapper -->
	<div class="<?php if($arjunaOptions['footerStyle']=='style1') print 'footer'; else print 'footer2 '.$tmp; ?>">
		<a href="http://www.wordpress.org" class="icon1"><img src="<?php bloginfo('template_url'); ?>/images/<?php if($arjunaOptions['footerStyle']=='style1'): ?>wordpressIcon.png<?php else: ?>footer/WordPressIcon.png<?php endif; ?>" width="20" height="20" alt="Powered by WordPress" /></a>
		<a class="icon2"><img src="<?php bloginfo('template_url'); ?>/images/footer/SRSIcon.png" width="31" height="18" alt="Web Design by SRS Solutions" /></a>
		<span class="copyright">&copy; <?php print date('Y'); ?> <?php bloginfo('name'); ?></span>
		<span class="design"><a href="http://www.srssolutions.com/en/" title="Web Design by SRS Solutions">Design by <em>SRS Solutions</em></a></span>
	</div>
</div><!-- .pageContainer -->

<?php wp_footer(); ?>
</body>
</html>
