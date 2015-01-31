<?php
/**
 *
  Contact
 *
 */
?>
<?php
$nameError = '';
$emailError = '';
$commentError = '';
 
 

if (isset($_POST['submitted'])) {
    if (trim($_POST['firstname']) === '') {
        $nameError = 'Please enter your name.';
        $hasError = true;
    } else {
        $name = trim($_POST['firstname']);
    }
    if (trim($_POST['email']) === '') {
        $emailError = 'Please enter your email address.';
        $hasError = true;
    } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
        $emailError = 'You entered an invalid email address.';
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }
	 
    if (trim($_POST['phone']) === '') {
        $phoneError = 'Please enter your phone no.';
        $hasError = true;
    } else {
        $phone = trim($_POST['phone']);
    }
	
	
    if (trim($_POST['message']) === '') {
        $commentError = 'Please enter a message.';
        $hasError = true;
    } else {
        if (function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['message']));
        } else {
            $comments = trim($_POST['message']);
        }
    }

    //If there is no error, send the email
    if (!isset($hasError)) {
        $emailTo = get_option('tz_email');
        if (!isset($emailTo) || ($emailTo == '')) {
            $emailTo = get_option('admin_email');
        }
        $subject = '[Wordpress] From ' . $name;
        $body = "Name: $name \n\nPhone: $phone \n\nEmail: $email \n\nComments: $comments";
        $headers = 'From: ' . $name . ' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;
        mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }
}
?>

<!-- blog title -->
<!-- blog title ends -->
<?php if (isset($emailSent) && $emailSent == true) { ?>
            <div class="thanks">
                <p>Thanks, your email was sent successfully.</p>
            </div>
        <?php } else { ?>
    <?php if (isset($hasError) || isset($captchaError)) { ?>
                <p class="error common">Sorry, an error occured. </p>
            <?php } ?>
            
            
            
             <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="register-form" novalidate="novalidate">
					<div class="to">
                     	<input type="text" class="text"  name="firstname" value="<?php if (isset($_POST['firstname']))
            echo $_POST['firstname'];
            ?>" placeholder="Name" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Name';}"> <?php if ($nameError != '') { ?>
                    <span class="error name"> <?php echo $nameError; ?> </span>                           
                       <?php } ?>
					 	<input type="text" class="text" name="email" value="<?php if (isset($_POST['email']))
                       echo $_POST['email'];
                   ?>" placeholder="Email" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Email';}" style="margin-left:20px"><?php if ($emailError != '') { ?>
                    <span class="error email"> <?php echo $emailError; ?> </span>                            
                       <?php } ?>
					 	<input type="text" class="text"  name="phone" value="Phone" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Phone';}" style="margin-left:20px">
					</div>
					<div class="contacttext">
	                   <textarea value="<?php
                   if (isset($_POST['message'])) {
                       if (function_exists('stripslashes')) {
                           echo stripslashes($_POST['message']);
                       } else {
                           echo $_POST['message'];
                       }
                   }
                       ?>" placeholder="Message" name="message" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Message';}"></textarea> <?php if ($commentError != '') { ?>
                    <span class="error comment"> <?php echo $commentError; ?> </span>
                <?php } ?>
	                </div>
	                <div class="formsbt">
			           <input name="submit" type="submit" id="submit" value="Submit Your Message"> <input type="hidden" name="submitted" id="submitted" value="true" /><br>
			            
					</div>
					<div class="clear"></div>
                 </form>
                 

            
             
<?php } ?>
 