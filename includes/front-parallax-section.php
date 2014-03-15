<?php  $parallaxeffectmeta = get_post_meta( $post->ID,'_skt_parallaxeffect_metabox',true );
if($parallaxeffectmeta == '1'){ ?>
<div id="full-division-box" class="skt-section">
	<div class="container full-content-box" >
		<div class="row-fluid">
			<div class="span12">
				<?php if(sketch_get_option($advertica_shortname."_para_content_left")) { echo do_shortcode( sketch_get_option($advertica_shortname."_para_content_left") );} ?>				
			</div>
		</div>
	</div>
</div>
<?php } ?>