<?php  //Template Name: Contact ?>
		<?php 
			get_template_part('banner','header');
			$current_options=get_option('busiprof_theme_options'); 
			
			$mapsrc= $current_options['google_map_url'];
			//$mapsrc=$mapsrc.'&amp;output=embed';	
			$template_uri=get_template_directory_uri(). '/images' ;
			//echo $current_options['facebook_url'];
			?>
	
		<div class="container">
			<div class="row-fluid contact_top_mn">
			<h2><?php the_title(); ?>
			</h2>
			<p><?php the_content();?></p>
			</div>
			
			
			<div class="row-fluid cont_space">
		
				<div class="span5 cont_detail">
				
				<div class="contact_left_ic">
				
					<?php if($current_options['twitter_url']!='') { ?>
					<div class="twitter_about">
					
						<a href="<?php echo $current_options['twitter_url'] ;?>">&nbsp;</a>
					
					</div>
					<?php } ;?>
					
					<div class="contact_left_ic_img"><img src="<?php echo $template_uri .'/contact_ic1.png'?>"></div>
					
					<?php if($current_options['facebook_url']!='') { ?>
					<div class="facebook_about">
					
					<a href="<?php echo $current_options['facebook_url'] ;?>">&nbsp;</a>
					
					</div>
					<?php } ;?>
					
					<?php if($current_options['rss_url']!='') { ?>
					<div class="rss_about">
					
					<a href="<?php echo $current_options['rss_url'] ;?>">&nbsp;</a>
					
					
					</div>
					<?php } ;?>
				</div>
				
				<div class="contact_address">
					<?php the_post();
					$content=get_the_content();
					if(!empty($content)){ echo $content;}
					else{ ?>
					<p><?php _e("378 Kingston Court",'busi_prof')?><br><?php _e("West New York, NJ 07093",'busi_prof')?></p>
					<p><?php _e("Phone : 973-960-4715",'busi_prof')?><br>
						<?php _e("Fax : 0276-758645",'busi_prof') ?><br>
						<?php _e('Email','busi_prof');?> : <a href="#">info@busiprof.com</a><br>
						<?php _e('Website','busi_prof');?> : <a href="#">www.busiprof.com</a></p>
					<?php }	?>
				</div>
				</div>
		
				<div class="span7 contact_right">
				<h2><?php _e("Drop a line for us",'busi_prof')?></h2>
				
	
				
				
				
				<div id="myformdata">
					<form id="contactus_form" method="post" class="" action="">
					<?php wp_nonce_field('busiprof_name_nonce_check','busiprof_name_nonce_field'); ?>
					
						<input type="text" name="yourname" id="yourname" class="span6 cont_field" placeholder="Your Name..."  />
						
						<input type="text" name="email" id="email" placeholder="Your Email..." class="span6 cont_field"  />
						
						<textarea  class="span12 txt-area-box" style="height: 130px;" cols="40" rows="5" name="message" id="message" >Write Message...</textarea>
						<input  type="submit" name="submit" id="submit"  class="cont_btn" value="Send Now!" />
						<br><br><br>
						</form>
				</div>
				<font color="#0088CC">
						<?php 
						if(isset($_POST['submit']))
						{
							$flag=1;
							 if(empty($_POST['yourname']))
							{
								$flag=0;
								
								_e('Please Enter Your Name<br>','busi_prof');
							} 
							
							else if(!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/',$_POST['yourname']))
							{
								$flag=0;
								_e('Please Enter Valid Name<br>','busi_prof');
							}
							
							 if($_POST['email']=='')
							{
								$flag=0;
								_e('Please Enter E-mail<br>','busi_prof');
							}
							 
								
								 else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",$_POST['email'])) 
								{
									$flag=0;
								_e('Please Enter Valid E-Mail<br>','busi_prof');
								}
							 
							
							 if($_POST['message']=='')
							{
								$flag=0;
								echo "Please Enter Message";
							}
							
							 
							if ( empty($_POST) || !wp_verify_nonce($_POST['busiprof_name_nonce_field'],'busiprof_name_nonce_check') )
						{
						   print 'Sorry, your nonce did not verify.';
						   exit;
						}
						else
						{
							if($flag==1)
							{
							
						$maildata =wp_mail(sanitize_email(get_option('admin_email')),trim($_POST['yourname'])." sent you a message from ".get_option("blogname"),stripslashes(trim($_POST['message']))."                     Message sent from:: ".trim($_POST['email']),"From: ".trim($_POST['yourname'])." <".trim($_POST['email']).">\r\nReply-To:".trim($_POST['email']));
						?>
						<div id="mailsent" >
					<div class="alert alert-success"  >
					<strong><?php _e('Thank  you!','busi_prof');?></strong> <?php _e('You successfully sent contact information...','busi_prof');?>
					</div>
				</div>	
						<?php
						
							
							}
							}
						}

					?>
					</font>
				
				
				
				
				
				</div>
		
			</div>
				<div class="row-fluid">
				<?php  if($current_options['google_map_url'] != '' ) { ?>
				<div class="contact_map">
				
				<iframe width="100%" height="335" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $mapsrc;?>"></iframe><br /><small><a href="<?php echo $mapsrc ; ?>" style="color:#0000FF;text-align:left"><?php _e( "View Larger Map", 'sis_spa' ); ?> </a></small>
				</div>
				<?php } ?>
				</div>
			
			
		</div>	
			
		<?php get_footer(); ?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	