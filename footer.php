			</div><!--.main-->
	</div><!--.grid-->			
		<footer>
			<section class="esection grid">	
				<div class="father-col clearfix">
					<?php if(!dynamic_sidebar('widgetsfoot')); ?>
				</div><!--father-col clearfix-->	
				<!--<?php if ( function_exists( 'baena_display_copyright' ) ) baena_display_copyright(); ?>-->
				<div class="footer-credits">
					<p class="footer-copyright">&copy; 
						<?php echo esc_html( date_i18n( __( 'Y', 'baena' ) ) ); ?> <a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php echo bloginfo( 'name' ); ?></a>
					</p>
				</div><!--footer-credits-->
			</section>	  
		</footer>
		<a href="#goup" class="goup"><i class="arrow-up icon" aria-hidden="true"></i></a>
		<?php wp_footer(); ?>
			   
	</body>
	</html>