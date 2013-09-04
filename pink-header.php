
 <?php get_header(); $current_options=get_option('spa_theme_options'); $call_us=$current_options['call_us'];
 $my_meta = get_post_meta($post->ID,'_my_meta',TRUE); //print_r($my_meta);
 ?>
 <!--   pink strip--> 
<div class="container">
 <div class="pink-container">		 
	<div class="row-fluid">
			 <div class="span3" style="margin-top:20px;margin-left:5px; width:auto;">
			    <dl class="pink_title">
				<dt><?php if(isset($my_meta['heading_one'])){ echo $my_meta['heading_one']; } else{ 
		  echo "GET YOURSELF";} ?></dt>
				<dt><h1 class="pink-head"><?php if(isset($my_meta['heading_two'])) { echo $my_meta['heading_two'];} else{ 
		  echo "REFRESHED";} ?></h1></dt>
				</dl>
			 </div>
			 
			 <div class="span6" style="margin-top:20px"><p><?php if(isset( $my_meta['banner_description'])){ echo $my_meta['banner_description'];}  else{ 
		  echo " Banner Description Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla. Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla rutrum sit amet mauris ";}?></p>
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