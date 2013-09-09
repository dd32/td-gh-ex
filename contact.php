<?php 
/* Template Name:Contact */ 
 get_template_part('pink','header');
 $current_options=get_option('spa_theme_options'); 
 $call_us=$current_options['call_us'];

 ?>
  <!-- Contact US -->  
<div class="container">
	
   <div class="row-fluid">	

    <div class="span12"><h2 class="contact-header"><?php _e( "CONTACT INFO", 'sis_spa' ); ?></h2></div> 
   <div class="span12" id="contact-section" style="margin-left:0px;" >
    <div class="span5" style="margin-left:0px;">   
    <form class="" method="post" id="contactus_form">
            <fieldset>
		
				<!--nonce-->
				 <?php wp_nonce_field('spa_name_nonce_check','spa_name_nonce_field'); ?>
				<!--end nonce-->		
						
<!--Php validation or Mail aend code-->				 
<font color="#FF0000">
<?php 
if(isset($_POST['submit']))
{
	$flag=1;
	if($_POST['yourname']=='')
	{
		$flag=0;
		
		echo "Please Enter Your Name<br>";
	}
	
	else if(!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/',$_POST['yourname']))
	{
   		$flag=0;
		echo "Please Enter Valid Name<br>";
	}
	
	if($_POST['email']=='')
	{
		$flag=0;
		echo "Please Enter E-mail<br>";
	}
	
		
		else if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $_POST['email']))
		{
			$flag=0;
		echo "Please Enter Valid E-Mail<br>";
		}
	
	if($_POST['subject']=='')
	{
		$flag=0;
		echo "Please Enter Subject<br>";
	}
	if($_POST['message']=='')
	{
		$flag=0;
		echo "Please Enter Message";
	}
	
	
	
if ( empty($_POST) || !wp_verify_nonce($_POST['spa_name_nonce_field'],'spa_name_nonce_check') )
{
   print 'Sorry, your nonce did not verify.';
   exit;
}
else
{
   	if($flag==1)
	{
	wp_mail(sanitize_email(get_option("admin_email")),trim($_POST['yourname'])." sent you a message from ".get_option("blogname"),stripslashes(trim($_POST['message'])),"From: ".trim($_POST['yourname'])." <".trim($_POST['email']).">\r\nReply-To:".trim($_POST['email']));
	//phpinfo();
	echo "Mail Successfully Sent";
	}
	}
}

?>	
</font>
<!--Finish Mail send code-->

				 <label class="form_name"><?php _e( "Your Name", 'sis_spa' ); ?></label>
				<p><input type="text" name="yourname" placeholder="Your Name" id="yourname" class="contact-input-fields" rows="1" value="<?php if(isset($_POST['yourname'])) echo esc_attr( $_POST['yourname'] );?>"></textarea></p> 
				 <label class="form_name"><?php _e( "Email*", 'sis_spa' ); ?></label> 
				<p><input type="text" name="email" placeholder="E-mail" id="email" class="contact-input-fields" rows="1" value="<?php if(isset($_POST['email'])) echo esc_attr( $_POST['email'] );?>"></textarea></p>
				<label class="form_name"><?php _e( "Subject", 'sis_spa' ); ?></label>
				<p><input type="text" name="subject" id="subject" placeholder="Subject" class="contact-input-fields" rows="1" value="<?php if(isset($_POST['subject'])) echo esc_attr( $_POST['subject'] );?>"></p>				 
				<label class="form_name"><?php _e( "Your Message", 'sis_spa' ); ?></label>
				<p><textarea  name="message" id="message"  placeholder="Messages" class="contact-input-fields"  ><?php if(isset($_POST['message'])) { echo esc_textarea( $_POST['message'] ); } ?></textarea></p>
				
				<!--<input  type="submit" name="submit"   class="contact-form-submit" value="SUBMIT" />-->
				<label>
                <button type="submit" class="contact-form-submit"><?php _e( "Submit", 'sis_spa' ); ?></button>
              </label>
		    </fieldset>
    </form>
    </div>
    <div class="span7" style="margin-top: 10px margin-left:0px;">
      <?php
     	 the_post();
		 
 $content=get_the_content();
		   // print_r ($content);
		  if(!empty($content)){ echo $content; 
		  
		  }
		  else{
	      ?>
    <div class="span5" id="contact-info" >
    <h2 class="contact-add"><?php _e( "Spa Salon", 'sis_spa' ); ?></h2>
    <br />
    <div class="address-detail">
	<?php _e('8901 Marmora Road','sis_spa');?>,<br>
    <?php _e('Glasgow','sis_spa');?>,<br>
    <?php _e('D04 89GR.','sis_spa');?><br><br>
    <abbr title="Free Phone"><?php _e('Free phone:','sis_spa');?></abbr> +1 800 559 658 <br>
    <abbr title="Telephone"><?php _e('Telephone:','sis_spa');?></abbr> +1 800 559 658<br><br>
    <abbr title="Fax"><?php _e('Fax:','sis_spa');?></abbr> +1 800 559 658 <br>
    </div>
	<div class="address-detail">
    <?php _e('Eamil:','sis_spa');?><a href="mailto:#"> mail@demolink.org</a>
    </div>
    </div>
    
    <div class="span5" id="contact-info">
    <h2 class="contact-add"><?php _e( "Opening Hours", 'sis_spa' ); ?></h2>
    <br />
   <div class="address-detail">
    <?php _e('Mon','sis_spa');?>. 11:00 &ndash; 17:30 <br><br>
    <?php _e('Tue','sis_spa');?>. - <?php _e('Thu','sis_spa');?>. 9:30 &ndash; 17:30 <br><br>
    <?php _e('Fri','sis_spa');?>. 9:30 &ndash; 21:00 <br><br>
    <?php _e('Sat','sis_spa');?>. 9:30 &ndash; 17:30 <br><br>
    <?php _e('Sun','sis_spa');?>. 12:00 &ndash; 17:00 <br><br>
    </div>
    </div>
   <?php }  ?> 
    
    <div class="span11" id="phone">
    <span class="call-us"><?php _e( "Call us on", 'sis_spa' ); ?></span>
    <div class="info-arrange"><img class="phone-icon" src="<?php echo get_template_directory_uri();?>/images/telephone.png"><h1 class="phone-no"><?php echo $call_us;?></h1></div>
    </div>
    

    
    
    </div><!-- Get in touch -->
    
    

    
            
            

</div></div> </div><!-- /Contact Us -->   
<?php get_footer();?>	  
	  
	
         
			     
			
			   
				


				
			