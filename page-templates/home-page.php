<?php 
/*
 * Template Name: Home Page 
 */
get_header(); 
$a1_options = get_option( 'a1_theme_options' );

?>
<section class="section-main">
<!--home banner-->

<?php if(empty($a1_options['remove-slider'])) { ?>
<div class="col-md-12 home-banner">
	<div id="myCarousel" class="carousel slide">
	   <div class="carousel-inner">
	   <?php  for($a1_i=1; $a1_i <= 5 ;$a1_i++ ): if(empty($a1_options['slider-img-'.$a1_i])) { continue; } ?>
		  <div class="item <?php if($a1_i==1){ echo'active'; } ?>">
			 <img src="<?php if(!empty($a1_options['slider-img-'.$a1_i])) { echo esc_url($a1_options['slider-img-'.$a1_i]); } ?>" width="1350" height="539" alt="<?php _e('First slide','a1') ?>">
			 <div class="col-md-offset-6 col-md-5 banner-text">
			 <?php if(!empty($a1_options['slidecaption-'.$a1_i])) { ?>
			 <h1><?php echo esc_attr($a1_options['slidecaption-'.$a1_i]); ?></h1>
			 <div class="circle-border"><span class="fa fa-circle"></span></div>    
			 <?php } if(!empty($a1_options['slidebuttontext-'.$a1_i])) { ?><a href="<?php echo esc_url($a1_options['slidebuttonlink-'.$a1_i]); ?>"><?php echo esc_attr($a1_options['slidebuttontext-'.$a1_i]); ?></a><?php } ?>
			 </div>
		  </div>
	   <?php endfor; ?>   
	   </div>
	   <!-- Carousel nav -->
	   <?php  for($a1_i=1; $a1_i <= 5 ;$a1_i++ ): if(!empty($a1_options['slider-img-'.$a1_i])) { ?>
		   <a class="carousel-control left nav-left" href="#myCarousel" data-slide="prev"></a>
		   <a class="carousel-control right nav-right" href="#myCarousel" data-slide="next"></a>
	   <?php } endfor; ?>
	</div> 
</div>

<?php } ?>

<!--home banner end-->
<!--feature part-->

<?php if(empty($a1_options['remove-core-features'])) { ?>
<div class="col-md-12 home-feature">
	<div class="container a1-container">
		<?php if(!empty($a1_options['coretitle']) || !empty($a1_options['corecaption'])) { ?>
			<div class="col-md-8 col-md-offset-2 feature-top">
				<?php if(!empty($a1_options['coretitle'])) { ?>
				<h2 class="home-heading"><?php echo esc_attr($a1_options['coretitle']); ?></h2>
				<div class="circle-border"><span class="fa fa-circle"></span></div>
				<?php } if(!empty($a1_options['corecaption'])) { echo '<p>'.esc_attr($a1_options['corecaption']).'</p>'; } ?>
			</div>
		<?php } ?>
		<div class="col-md-12 no-padding-lr">
			<div class="row feature-row1">
			<?php for($a1_section_i=1; $a1_section_i <=3 ;$a1_section_i++ ): ?>		
				<div class="col-md-4 col-sm-4 feature-box">
					<?php if(!empty($a1_options['home-icon-'.$a1_section_i])) { ?><span><img src="<?php echo esc_url($a1_options['home-icon-'.$a1_section_i]); ?>" /></span>
					<?php } if(!empty($a1_options['section-title-'.$a1_section_i])) { echo '<h5>'.esc_attr($a1_options['section-title-'.$a1_section_i]).'</h5>'; }
					 if(!empty($a1_options['section-content-'.$a1_section_i])) { echo '<p>'.esc_attr($a1_options['section-content-'.$a1_section_i]).'</p>'; } ?>
				</div>
			 <?php endfor; ?>    
			</div>
		</div>    
	</div>
</div>

<?php } ?>

<!--feature part end--> 
<!--product description start-->

<?php if(empty($a1_options['remove-product-description'])) { ?>
<div class="col-md-12 home-product">
	<div class="container a1-container">
	<?php if(!empty($a1_options['producttitle']) || !empty($a1_options['productcaption'])) { ?>	
		<div class="col-md-8 col-md-offset-2 feature-top">
			<?php if(!empty($a1_options['producttitle'])) { ?>
			<h2 class="home-heading"><?php echo esc_attr($a1_options['producttitle']); ?></h2>
			<div class="circle-border"><span class="fa fa-circle"></span></div>
			<?php } if(!empty($a1_options['productcaption'])) { echo '<p>'.esc_attr($a1_options['productcaption']).'</p>'; } ?>
		</div>
	<?php } ?>
		<div class="row">
		<?php if(!empty($a1_options['productcontent'])) { echo '<div class="col-md-7 col-sm-7 description-left">'.$a1_options['productcontent'].'</div>'; } ?>
			<div class="col-md-4 col-sm-4 col-md-offset-1 col-sm-offset-1 description-right">
				<form method="post" name="contact_form" id="contact_form">
					<input id="a1_name" type="text" name="a1_name" placeholder="<?php _e('Enter your name','a1'); ?>">
					<input id="a1_email" type="email" name="a1_email" placeholder="<?php _e('Enter your email','a1'); ?>">
					<input id="a1_phone" type="text" name="a1_phone" placeholder="<?php _e('Enter your phone','a1'); ?>">
					<textarea id="a1_message" name="a1_message" placeholder="<?php _e('Enter your message','a1'); ?>"></textarea>
					<input type="submit" name="a1_submit" id="a1_submit" value="<?php _e('send','a1'); ?>">
				</form>
				<?php if(!empty($a1_options['product-form-email'])) { $a1_product_email = sanitize_email($a1_options['product-form-email']); } else { $a1_product_email=""; }
				if(isset($_POST['a1_submit'])) {
					$to = $a1_product_email;
					$subject = 'Your Subject';
					$headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
					$headers .= 'To: "'.$a1_product_email.'"';
					$message = '<table style="width:100%;border:1px solid #ddd;">
								<tr><td style="width:150px;border:1px solid #ddd;">Name :</td><td style="border:1px solid #ddd;"">'.$_POST['a1_name'].'</td></tr>
								<tr><td style="width:150px;border:1px solid #ddd;">E-mail :</td><td style="border:1px solid #ddd;"">'.$_POST['a1_email'].'</td></tr>
								<tr><td style="width:150px;border:1px solid #ddd;">Phone :</td><td style="border:1px solid #ddd;"">'.$_POST['a1_phone'].'</td></tr>
								<tr><td style="width:150px;border:1px solid #ddd;">Message :</td><td style="border:1px solid #ddd;"">'.$_POST['a1_message'].'</td></tr>
								</table>';
					$mail_sent = wp_mail( $to, $subject, $message, $headers );
				} ?>					
			</div>
		</div>
	</div>
</div>

<?php } ?>

<!--product end-->
<!--get touch start-->

<?php if(empty($a1_options['remove-getin-touch'])) { ?>
<div class="col-md-12 home-contact">
	<div class="container a1-container a1-get-touch-home">
		<?php if(!empty($a1_options['get-touch-title'])) { echo '<h2>'.esc_attr($a1_options['get-touch-title']).'</h2>'; } ?>
		<?php if(!empty($a1_options['get-touch-caption'])) { echo '<p>'.esc_attr($a1_options['get-touch-caption']).'</p>'; } ?>
		<?php if(!empty($a1_options['get-touch-logo'])) { ?><div class="logo-contact"><img src="<?php echo esc_url($a1_options['get-touch-logo']); ?>" alt=""></div><?php } ?>
		<?php if(!empty($a1_options['contactus-now-text'])) {

$data = '<a class="contact-button" href="'.esc_url($a1_options['get-touch-page']).'">'.esc_attr($a1_options['contactus-now-text']).'</a>'; echo apply_filters("the_content",$data); } ?>
	</div>
</div>

<?php } ?>

<!--get touch end-->

</section>

<?php get_footer(); ?>

