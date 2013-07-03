<?php 
/**
 * Template Name: Contact
 *
 *
 * @file           contact.php
 * @package        Appointment
 * @author         Priyanshu Mittal,Shahid Mansuri and Akhilesh Nagar
 * @copyright      2013 Appointpress
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/appoinment/contact.php
 */


?>
<?php get_header(); ?>
    <div class="inner_top_mn">
		<div class="page_wi">
			<h2>
				<?php bloginfo('title');?><br>
				<span><?php bloginfo('description');?></span>	
			</h2>
			<div class="search_box">			 
               <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="text"  name="s"  placeholder="<?php esc_attr_e( 'Search', 'appointment' ); ?>" />
		        <input type="submit" class="search_btn" name="submit"  value="" />
			   </form>          
		   </div>
		</div>
	</div>
    </header>
     <section>		
		<div class="page_wi">
         <?php if(have_posts()) : the_post(); ?>
			<div class="contact_top_mn">
				<h2><?php the_title(); ?> <span><?php _e('Lets get in touch','appointment'); ?></span></h2>	
				<div class="about_border_row"></div>
            
             
			</div>
            <div class="contact_left_mn">
				
				<div class="contact_address">
					    <?php the_content()?>
				</div>				
			</div>
            <?php endif;?>
			     
			
			   
				<div class="contact_right">
				<h2><?php _e('Drop a line for us','appointment'); ?></h2>
				<form method="post" id="contactus_form">
				<!--nonce-->
				 <?php wp_nonce_field('appointment_name_nonce_check','appointment_name_nonce_field'); ?>
				<!--end nonce-->		
				<div class="about_border_row"></div>
				<input type="text" name="yourname" id="yourname" class="contact_frist_txt" value="Your Name..." onClick="if(this.value=='Your Name...'){this.value=''}" onBlur="if(this.value==''){this.value='Your Name...'}"  />  
				<input type="text" name="email" id="email" value="Your Email..." onClick="if(this.value=='Your Email...'){this.value=''}" onBlur="if(this.value==''){this.value='Your Email...'}"  />
				
				<textarea cols="40" rows="5" name="message" id="message" onClick="if(this.value=='Write Message...'){this.value=''}" onBlur="if(this.value==''){this.value='Write Message...'}">Write Message...</textarea>
				<input  type="submit" name="submit" id="submit"  class="send_now_btn" value="Send Now!" />
				</form>
<!--Php validation or Mail aend code-->

<font color="#FF0000">
<?php 
if(isset($_POST['submit']))
{
	$flag=1;
	if($_POST['yourname']=='')
	{
		$flag=0;
		
		_e("Please Enter Your Name",'appointment');
		echo "<br>";
	}
	
	else if(!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/',$_POST['yourname']))
	{
   		$flag=0;
		_e("Please Enter Valid Name",'appointment');
		echo "<br>";
	}
	
	if($_POST['email']=='')
	{
		$flag=0;
		_e("Please Enter E-mail",'appointment');
		echo "<br>";
	}
	
		
		else if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $_POST['email']))
		{
			$flag=0;
			_e("Please Enter Valid E-Mail",'appointment');
		echo "<br>";
		}
	
	
	if($_POST['message']=='')
	{
		$flag=0;
		_e("Please Enter Message",'appointment');
	}
	
	
	
if ( empty($_POST) || !wp_verify_nonce($_POST['appointment_name_nonce_field'],'appointment_name_nonce_check') )
{
   _e('Sorry, your nonce did not verify.','appointment');
   exit;
}
else
{
   	if($flag==1)
	{
	wp_mail(sanitize_email(get_option("admin_email")),trim($_POST['yourname'])." sent you a message from ".get_option("blogname"),stripslashes(trim($_POST['message'])),"From: ".trim($_POST['yourname'])." <".trim($_POST['email']).">\r\nReply-To:".trim($_POST['email']));

	_e("Mail Successfully Sent",'appointment');
	 
	
	}
	}
}

?>	
</font>
<!--Finish Mail send code-->

				
			</div>

         	<div class="about_border_row1 about_border_row1_new_slider"></div>
			      	        	
        </div>
    </section>
    <?php get_footer();?>

