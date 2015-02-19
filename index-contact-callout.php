<?php $current_options = get_option('appointment_lite_options',theme_data_setup()); 
if($current_options['front_callout_enable'] == 'on') { ?>
<!-- Top Contact Detail Section -->
<div class="top-contact-detail-section">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="contact-area">
					<div class="media">
						<div class="contact-icon">
							<i class="fa fa-phone"></i>
						</div>
						<div class="media-body">
						    <?php if(isset($current_options['front_contact1_title'])){?>
							<h6><?php echo $current_options['front_contact1_title']; ?></h6>
							<?php } ?>
							<?php if(isset($current_options['front_contact1_val'])){?>
							<h4><?php echo $current_options['front_contact1_val']; ?></h4>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="contact-area">
					<div class="media">
						<div class="contact-icon">
							<i class="fa fa-clock-o"></i>
						</div>
						<div class="media-body">
							<?php if(isset($current_options['front_contact2_title'])){?>
							<h6><?php echo $current_options['front_contact2_title']; ?></h6>
							<?php } ?>
							<?php if(isset($current_options['front_contact2_val'])){?>
							<h4><?php echo $current_options['front_contact2_val']; ?></h4>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="contact-area">
					<div class="media">
						<div class="contact-icon">
							<i class="fa fa-envelope"></i>
						</div>
						<div class="media-body">
							<?php if(isset($current_options['front_contact3_title'])){?>
							<h6><?php echo $current_options['front_contact3_title']; ?></h6>
							<?php } ?>
							<?php if(isset($current_options['front_contact3_val'])){?>
							<h4><?php echo $current_options['front_contact3_val']; ?></h4>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Top Contact Detail Section -->
<?php } ?>

<div class="clearfix"></div>