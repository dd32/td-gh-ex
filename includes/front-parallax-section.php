<div id="full-division-box" class="skt-section">
	<div class="container full-content-box" >
		<div class="row-fluid">
			<div class="span12">
				<?php if(sketch_get_option($advertica_shortname."_para_content_left")) {
					echo do_shortcode( sketch_get_option($advertica_shortname."_para_content_left") );
				} else {
					_e('<div class="skt-awesome-section"> 
						<div class="skt-awesome-title">Awesome Parallax Section</div><div class="skt-awesome-desp">Advertica features an amazing parallax section</div>
					  </div>', 'advertica-lite');
				} ?>
			</div>
		</div>
	</div>
</div>