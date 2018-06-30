<?php $impressive_options = get_option( 'impressive_theme_options' ); ?>
        <footer>
            <div class="footer-bg">
                <div class="impressive-container container">
				  <?php if(get_theme_mod ( 'footerCopyright_logo_switch',1)==1): ?>
					<?php if(has_custom_logo() ) { ?>
						<div class="footer-logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php the_custom_logo(); ?></a> 
						</div>
				    <?php } ?>
                  <?php endif; ?> 
			      <?php if(get_theme_mod ( 'footerCopyright_icon_switch',1)==1): 
			      		$TopHeaderSocialIconDefault = array(array('url'=>$impressive_options['fburl'],'icon'=>'fa-facebook'),array('url'=>$impressive_options['twitter'],'icon'=>'fa-twitter'),array('url'=>$impressive_options['youtube'],'icon'=>'fa-youtube'),array('url'=>$impressive_options['rss'],'icon'=>'fa-rss'),);?>
					<div class="footer-social-icon">
						<ul>
							<?php for($i=1; $i<=4; $i++) : 
	                                if(get_theme_mod('TopHeaderSocialIconLink'.$i,$TopHeaderSocialIconDefault[$i-1]['url'])!= '' && get_theme_mod('TopHeaderSocialIcon'.$i,$TopHeaderSocialIconDefault[$i-1]['icon'])!= ''){     ?>
	                                   <li><a href="<?php echo esc_url(get_theme_mod('TopHeaderSocialIconLink'.$i,$TopHeaderSocialIconDefault[$i-1]['url'])); ?>" class="icon" title="" target="_blank">
	                                        <i class="fa <?php echo esc_attr(get_theme_mod('TopHeaderSocialIcon'.$i,$TopHeaderSocialIconDefault[$i-1]['icon'])); ?>"></i>
	                                    </a></li>                                            
                            <?php } endfor; ?>
						</ul>
					</div>					
                    <?php endif; ?> 
                    <div class="copyright">
					    <p class="color-text"><?php echo wp_kses_post(get_theme_mod ( 'footertext',(!empty($impressive_options['footertext'])) ? $impressive_options['footertext']:''));?></p>
					    <p>
						<?php
						 printf(/* translators: %1$s is theme url*/ esc_html__( 'Powered by %1$s', 'impressive' ), '<a href="'.esc_url('https://fruitthemes.com/wordpress-themes/impressive/').'" target="_blank">Impressive WordPress Theme</a>' );
						 ?>
						 </p>
                    </div>
                </div>
            </div>
        </footer>
<?php wp_footer(); ?>
</body>
</html>