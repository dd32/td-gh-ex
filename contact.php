<?php  //Template Name: Contact ?>
<?php 
	get_template_part('banner','header');
	$current_options=get_option('busiprof_theme_options'); 
	
	$mapsrc= $current_options['google_map_url'];
	$mapsrc=$mapsrc.'&amp;output=embed';	
	$template_uri=get_template_directory_uri(). '/images' ;
	//echo $current_options['facebook_url'];
?>
<div class="container">
	<div class="row-fluid contact_top_mn"><h2><?php the_title(); ?></h2><p><?php the_content();?></p></div>
		<div class="row-fluid cont_space">		
			<div class="span5 cont_detail">				
				<div class="contact_left_ic">					
					<div class="twitter_about">					
						<a href="<?php if($current_options['twitter_url']!='') { echo $current_options['twitter_url']; } ?>">&nbsp;</a>					
					</div>
					<div class="contact_left_ic_img"><img src="<?php echo $template_uri .'/contact_ic1.png'?>"></div>
					<div class="facebook_about">					
						<a href="<?php if($current_options['facebook_url']!='') { echo $current_options['facebook_url']; } ?>">&nbsp;</a>					
					</div>
					<div class="rss_about">					
						<a href="<?php if($current_options['linkedin_url']!='') { echo $current_options['linkedin_url']; } ?>">&nbsp;</a>					
					</div>
				</div>				
				<div class="contact_address">				
					<p><?php if($current_options['contact_address_1']!='') { echo $current_options['contact_address_1']; } ?><br>
					<?php if($current_options['contact_address_2']!='') { echo $current_options['contact_address_2']; } ?></p>
					<p>	<?php if($current_options['contact_number']!='') { _e("Phone : ",'busi_prof'); ?><?php   echo $current_options['contact_number']; } ?><br>
						<?php if($current_options['contact_fax_number']!='') {  _e("Fax : ",'busi_prof') ?><?php echo $current_options['contact_fax_number']; } ?><br>
						<?php if($current_options['contact_email']!='') { _e('Email :','busi_prof');?>  <a ><?php  echo $current_options['contact_email']; ?></a><?php } ?><br>
						<?php if($current_options['contact_website']!='') { _e('Website : ','busi_prof');?> <a href="<?php  echo $current_options['contact_website']; ?>"><?php echo $current_options['contact_website'];  ?></a> <?php } ?>
					</p>
				</div>
			</div>
			<div class="span7 contact_right">
					<h2><?php _e("Drop a line for us",'busi_prof')?></h2>
						<div id="myformdata">
							<form id="contactus_form" method="post"  action="">
							<?php wp_nonce_field('busiprof_name_nonce_check','busiprof_name_nonce_field'); ?>
								<input type="text" name="yourname" id="yourname" class="span6 cont_field" placeholder="Your Name..."  />								
								<input type="text" name="email" id="email" placeholder="Your Email..." class="span6 cont_field"  />								
								<textarea  class="span12 txt-area-box" style="height: 130px;" cols="40" rows="5" placeholder="Write Message..." name="message" id="message" ></textarea>
								<div class="">
									<input  type="submit" name="submit" id="submit"  class="cont_btn" value="Send Now!" />
								</div>
								<div class="span5" style="padding-top:10px; padding-left:10px;">
									<span  style="display:none; color:red" id="contact_user_name_error"><?php _e('Please Enter Your Name','busi_prof'); ?> </span>
									<span  style="display:none; color:red" id="contact_email_error"><?php _e('Please Enter valid email','busi_prof'); ?> </span>
									<span  style="display:none; color:red" id="contact_massage_error"><?php _e('Please Enter your contact message','busi_prof'); ?></span>
									<span  style="display:none; color:red" id="contact_nonce_error"><?php _e('Sorry, your nonce did not verify','busi_prof');?></span>
								</div>
								</form>	
								
								<br><br>
						</div>
						<div id="mailsentbox" style="display:none">
							<div class="alert alert-success" >
								<strong><?php _e('Thank  you!','busi_prof');?></strong> <?php _e('You successfully sent contact information...','busi_prof');?>
							</div>
						</div>
			</div>			
			<?php if(isset($_POST['submit']))
				{	$flag=1;
					if(empty($_POST['yourname']))
					{	
						$flag=0;
						echo "<script>jQuery('#contact_user_name_error').show();</script>";
					}else
					if($_POST['email']=='')
					{	
						$flag=0;
						echo "<script>jQuery('#contact_email_error').show();</script>";
					}else
					if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",$_POST['email'])) 
					{	
						$flag=0;
						echo "<script>jQuery('#contact_email_error').show();</script>";
					}else
					if($_POST['message']=='')
					{
						$flag=0;
						echo "<script>jQuery('#contact_massage_error').show();</script>";
					}else
					if(empty($_POST) || !wp_verify_nonce($_POST['busiprof_name_nonce_field'],'busiprof_name_nonce_check') )
					{
						echo "<script>jQuery('#contact_nonce_error').show();</script>";
					   exit;
					}
					else
					{	if($flag==1)
						{	
							$maildata =wp_mail(sanitize_email(get_option('admin_email')),trim($_POST['yourname'])." sent you a message from ".get_option("blogname"),stripslashes(trim($_POST['message']))."                     Message sent from:: ".trim($_POST['email']),"From: ".trim($_POST['yourname'])." <".trim($_POST['email']).">\r\nReply-To:".trim($_POST['email']));
							if($maildata)
							{ 	
								echo "<script>jQuery('#myformdata').hide();</script>";
								echo "<script>jQuery('#mailsentbox').show();</script>";
							}
						}
					}
				}
			?>
			<div class="row-fluid">
				<?php  if($current_options['google_map_url']!= '' ) {  ?>
				<div class="contact_map">		
				<iframe width="100%" height="335" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $mapsrc; ?>"></iframe><br /><small><a href="<?php echo $mapsrc; ?>" style="color:#0000FF;text-align:left"><?php _e( "View Larger Map", 'busi_prof' ); ?> </a></small>
				</div>
				<?php } ?>
			</div>
		</div>
</div>
<?php get_footer(); ?>