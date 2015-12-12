<?php
/*
  Template Name: Contact Page
 */
?>
<?php get_header(); ?>
<?php
$nameError = '';
$emailError = '';
$commentError = '';
if (isset($_POST['submitted'])) {
    if (trim($_POST['contactName']) === '') {
        $nameError = 'Please enter your name.';
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
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
    if (trim($_POST['comments']) === '') {
        $commentError = 'Please enter a message.';
        $hasError = true;
    } else {
        if (function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['comments']));
        } else {
            $comments = trim($_POST['comments']);
        }
    }
    if (!isset($hasError)) {
        $emailTo = get_option('tz_email');
        if (!isset($emailTo) || ($emailTo == '')) {
            $emailTo = get_option('admin_email');
        }
        $subject = '[PHP Snippets] From ' . $name;
        $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
        $headers = 'From: ' . $name . ' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;
        mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }
}
?>

<div class="content-wrapper">
<div class="container">
<div id="primary" class="content-area">
    <div class="row">
        <div class="page-post-container-wrapper">
            <div class="col-md-8">
                <div class="content-bar">
                    <div id="" class="post">
                        <div class="page-heading">
                            <h2><?php echo BFRONT_CONTACT_US; ?></h2>
                        </div>
                        <div class="page-content clear">
                            <?php if (have_posts()) while (have_posts()) : the_post(); ?>
                                <?php the_content(); ?>
                                    <?php if (isset($emailSent) && $emailSent == true) { ?>
                                        <div class="thanks">
                                            <p>Thanks, your email was sent successfully.</p>
                                        </div>
                                    <?php } else { ?>
                                    <?php if (isset($hasError) || isset($captchaError)) { ?>
                                        <p class="error">Sorry, an error occured. </p>
                                    <?php } ?>
                                    <form action="<?php the_permalink(); ?>" id="contactForm" class="contactform" method="post">      
                                        <input type="text"  id="contactName" name="contactName"  value="<?php if (isset($_POST['contactName']))
                                echo $_POST['contactName']; ?>" class="required requiredField" placeholder="Your Name" required/>
                                        <?php if ($nameError != '') { ?>
                                            <span class="error"> <?php echo $nameError; ?> </span>
                                        <?php } ?>
                                        <input type="email" name="email" id="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" class="required requiredField email" placeholder="Your Email" required/>
                                        <?php if ($emailError != '') { ?>
                                            <span class="error"> <?php echo $emailError; ?> </span>
                                        <?php } ?>               
                                        <textarea name="comments" id="commentsText" rows="20" cols="30" class="required requiredField" placeholder="Your Message" required><?php if (isset($_POST['comments'])) {
                if (function_exists('stripslashes')) {
                    echo stripslashes($_POST['comments']);
                } else {
                    echo $_POST['comments'];
                }
            } ?></textarea>

                                        <input class="submit" type="submit" value="<?php echo "Your Message" ?>"/>
                                        <input type="hidden" name="submitted" id="submitted" value="true" />
                                        </form>   
                                    <?php } ?>
                                <?php endwhile; ?>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php get_footer(); ?>