<?php
if ( 'yes' === $sample_join['join_enable'] ):
	$join_title = $sample_join['title'];
	$img_url = $sample_join['bg_image']['url'];
	$video_url = $sample_join['video_url'];
	?>
	<section class="join mgb-lg" style="background: url(<?php echo esc_url($img_url);?>);">
		<div class="container">
			<div class="join-holder">
				<a href="<?php echo esc_url($video_url['url']);?>" class="play-btn video video-popup mfp-iframe">
					<span class="fa fa-play" aria-hidden="true"></span>
				</a>
				<h1><?php echo esc_html($join_title);?></h1>
			</div>
		</div>
	</section>
	<?php endif;?>