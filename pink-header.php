
 <?php get_header(); $current_options=get_option('spa_theme_options'); 
 $call_us=$current_options['call_us'];
 //$my_meta = get_post_meta($post->ID,'spa_pink_meta',TRUE); print_r($my_meta);
 $bd=get_post_meta( $post->ID, 'banner_description', true );
	
 $h1=get_post_meta( $post->ID, 'heading_one', true );
 $h2=get_post_meta( $post->ID, 'heading_two', true );
 ?>
 <!--   pink strip--> 
<div class="container">
 <div class="pink-container">		 
	<div class="row-fluid">
			 <div class="span3" style="margin-top:20px;margin-left:5px; width:auto;">
			    <dl class="pink_title">
				<dt><?php if($h1!=''){ echo $h1; } else{ 
		  _e("GET YOURSELF",'sis_spa');} ?></dt>
				<dt><h1 class="pink-head"><?php if($h2!='') { echo $h2;} else{ 
		  _e("REFRESHED",'sis_spa');} ?></h1></dt>
				</dl>
			 </div>
			 
			 <div class="span6" style="margin-top:20px"><p><?php if($bd!=''){ echo $bd;}  else{ 
		  _e(" Banner Description Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla. Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla rutrum sit amet mauris ",'sis_spa');}?></p>
			</div>
		<div class="spa_tag">
			<span>
			<?php _e( "Call us on", 'sis_spa' ); ?>
			<p> <?php echo $call_us ?></p>
			</span>
			
			</div> 
</div>
	
</div></div>		
<!---End of pink strip---->