			</div><!--.main-->
	</div><!--.grid-->			
		<footer>
			<section class="ejemplo-section grid">	
				<div class="padre-col clearfix">
					<?php if(!dynamic_sidebar('widgetspie')); ?>
				</div><!--padre-col clearfix-->	
				<?php if ( function_exists( 'baena_display_copyright' ) ) baena_display_copyright(); ?>
			</section>	  
		</footer>

		<?php wp_footer(); ?>
			<a href="#subir" class="subir"><i class="arrow-up icon" aria-hidden="true"></i></a>   
	</body>
	</html>