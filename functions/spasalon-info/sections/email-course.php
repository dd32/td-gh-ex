<?php
/**
 * Email Course
 */
?>
<div id="trustworthy_website" class="spasalon-tab-pane">

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="spasalon-info-title text-center"><?php echo __('Trustworthy Websites Details','spasalon'); ?><?php if( !empty($spasalon['Version']) ): ?> <sup id="spasalon-theme-version"><?php echo esc_attr( $spasalon['Version'] ); ?> </sup><?php endif; ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="spasalon-tab-pane-half spasalon-tab-pane-first-half">
					<p>
						<?php esc_html_e( 'A website exists for one and ONLY one reason:','spasalon');?>
						<b><?php esc_html_e('To bring you more business.','spasalon'); ?></b>
					</p>
					<p>
		   				<?php esc_html_e('Think of your website as a hardworking salesman who works 24/7 and never asks for a raise!','spasalon');?>
		   			</p>
					<p>
					<?php esc_html_e( 'In this email course I deliver 4 highly actionable tips on how you can build a website which is trustworthy and which, in turn, brings more business to you.', 'spasalon' ); ?>
					</p>
				</div>
			</div>	
			<div class="offer-content clearfix">
			<div class="media pricing-content text-center padding10">
				<div class="media-body">
					<a href="<?php echo 'http://webriti.com/website-email-course/';?>" target="_blank" class="btn btn-info btn-lg" id="email_course"><?php esc_html_e('JOIN COURSE','spasalon' ); ?></a>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>