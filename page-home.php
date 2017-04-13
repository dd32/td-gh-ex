<?php
/**
 *	Template name: Home
 *
 *	The template for displaying Custom Page Template: Home.
 *
 *	@package WordPress
 *	@subpackage AccountantLaw
 */
?>
<?php get_header(); ?>
	<div id="subheader" class="cf">
		<div class="subheader-color cf">
			<div class="wrapper cf">
				<div class="full-header-content full-header-content-no-sidebar">
					<?php
						if ( get_theme_mod( 'lawyeria_lite_frontpage_header_title', __( 'Lorem ipsum dolor sit amet, consectetur adipscing elit.', 'accountantlaw' ) ) ) {
							echo '<h3>';
								echo esc_attr( get_theme_mod( 'lawyeria_lite_frontpage_header_title', __( 'Lorem ipsum dolor sit amet, consectetur adipscing elit.', 'accountantlaw' ) ) );
							echo '</h3>';
						}
					?>
				
					<?php
						if ( get_theme_mod( 'lawyeria_lite_frontpage_header_content', __( 'Ut fermentum aliquam neque, sit amet molestie orci porttitor sit amet. Mauris venenatis et tortor ut ultrices. Nam a neque venenatis, tristique lacus id, congue augue. In id tellus lacus. In porttitor sagittis tellus nec iaculis. Nunc sem odio, placerat a diam vel, varius.', 'accountantlaw' ) )) {
							echo '<p>';
								echo esc_attr( get_theme_mod( 'lawyeria_lite_frontpage_header_content', __( 'Ut fermentum aliquam neque, sit amet molestie orci porttitor sit amet. Mauris venenatis et tortor ut ultrices. Nam a neque venenatis, tristique lacus id, congue augue. In id tellus lacus. In porttitor sagittis tellus nec iaculis. Nunc sem odio, placerat a diam vel, varius.', 'accountantlaw' ) ) );
							echo '</p>';	
						}
					?>
				</div><!--/div .header-content-->
				<div class="subheader-features">
					<div class="feature">
						<?php
						if( get_theme_mod( 'accountantlaw_subheaderfeatures_box1_field1', __( '1.700+', 'accountantlaw' ) ) ):
							echo esc_attr( get_theme_mod( 'accountantlaw_subheaderfeatures_box1_field1', __( '1.700+', 'accountantlaw' ) ) );
						endif;
						?>
						<?php if( get_theme_mod( 'accountantlaw_subheaderfeatures_box1_field2', __( 'Trusted clients', 'accountantlaw' ) ) ): ?>
							<span><?php echo esc_attr( get_theme_mod( 'accountantlaw_subheaderfeatures_box1_field2', __( 'Trusted clients', 'accountantlaw' ) ) ); ?></span>
						<?php endif; ?>
					</div><!--/.feature-->
					<div class="feature">
						<?php
						if( get_theme_mod( 'accountantlaw_subheaderfeatures_box2_field1', __( '$180.000.000', 'accountantlaw' ) ) ):
							echo esc_attr( get_theme_mod( 'accountantlaw_subheaderfeatures_box2_field1', __( '$180.000.000', 'accountantlaw' ) ) );
						endif;
						?>
						<?php if( get_theme_mod( 'accountantlaw_subheaderfeatures_box2_field2', __( 'Recovered for your clients', 'accountantlaw' ) ) ): ?>
							<span><?php echo esc_attr( get_theme_mod( 'accountantlaw_subheaderfeatures_box2_field2', __( 'Recovered for your clients', 'accountantlaw' ) ) ); ?></span>
						<?php endif; ?>
					</div><!--/.feature-->
					<div class="feature">
						<?php
						if( get_theme_mod( 'accountantlaw_subheaderfeatures_box3_field1', __( '98%', 'accountantlaw' ) ) ):
							echo esc_attr( get_theme_mod( 'accountantlaw_subheaderfeatures_box3_field1', __( '98%', 'accountantlaw' ) ) );
						endif;
						?>
						<?php if( get_theme_mod( 'accountantlaw_subheaderfeatures_box3_field2', __( 'Succesful cases', 'accountantlaw' ) ) ): ?>
							<span><?php echo esc_attr( get_theme_mod( 'accountantlaw_subheaderfeatures_box3_field2', __( 'Succesful cases', 'accountantlaw' ) ) ); ?></span>
						<?php endif; ?>
					</div><!--/.feature-->
					<div class="feature">
						<?php
						if( get_theme_mod( 'accountantlaw_subheaderfeatures_box4_field1', __( '10.600', 'accountantlaw' ) ) ):
							echo esc_attr( get_theme_mod( 'accountantlaw_subheaderfeatures_box4_field1', __( '10.600', 'accountantlaw' ) ) );
						endif;
						?>
						<?php if( get_theme_mod( 'accountantlaw_subheaderfeatures_box4_field2', __( 'Personal injury cases', 'accountantlaw' ) ) ): ?>
							<span><?php echo esc_attr( get_theme_mod( 'accountantlaw_subheaderfeatures_box4_field2', __( 'Personal injury cases', 'accountantlaw' ) ) ); ?></span>
						<?php endif; ?>
					</div><!--/.feature-->
				</div><!--/.subheader-features-->
			</div><!--/div .wrapper-->
		</div><!--/div .full-header-color-->
	</div><!--/div #subheader-->
	<div class="second-subheader">
		<div class="wrapper">
			<h3>
				<?php
				if( get_theme_mod( 'lawyeria_lite_frontpage_subheader_title', __( 'Lorem Ipsum is simply dummy text of the printing and type setting industry.', 'accountantlaw' ) ) ) {
					echo esc_attr( get_theme_mod( 'lawyeria_lite_frontpage_subheader_title', __( 'Lorem Ipsum is simply dummy text of the printing and type setting industry.', 'accountantlaw' ) ) );
				}
				?>
			</h3><!--/h3-->
		</div><!--/div .wrapper-->
	</div><!--/div .second-subheader-->
</header><!--/header-->
<section id="testimonials">
	<div class="wrapper">
		<?php if( get_theme_mod( 'accountantlaw_testimonials_title', __( 'Happy clients', 'accountantlaw' ) ) ): ?>
			<h3><?php echo esc_attr( get_theme_mod( 'accountantlaw_testimonials_title', __( 'Happy clients', 'accountantlaw' ) ) ); ?></h3>
		<?php endif; ?>
		<?php if( get_theme_mod( 'accountantlaw_testimonials_subtitle', __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'accountantlaw' ) ) ): ?>
			<h4><?php echo esc_attr( get_theme_mod( 'accountantlaw_testimonials_subtitle', __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'accountantlaw' ) ) ); ?></h4>
		<?php endif; ?>
		<div class="container cf">
			<div class="testimonial">
				<?php if( get_theme_mod( 'accountantlaw_testimonials_box1_image', get_stylesheet_directory_uri() . '/images/testimonial-image.png' ) ): ?>
					<div class="testimonial-image" style="background-image: url('<?php echo esc_url( get_theme_mod( 'accountantlaw_testimonials_box1_image', get_stylesheet_directory_uri() . '/images/testimonial-image.png' ) ); ?>');">
					</div><!--/.testimonial-image-->
				<?php endif; ?>
				<?php if( get_theme_mod( 'accountantlaw_testimonials_box1_name', __( 'John Doe', 'accountantlaw' ) ) ): ?>
					<div class="testimonial-title">
						<?php echo esc_attr( get_theme_mod( 'accountantlaw_testimonials_box1_name', __( 'John Doe', 'accountantlaw' ) ) ); ?>
					</div><!--/.testimonial-title-->
				<?php endif; ?>
				<?php if( get_theme_mod( 'accountantlaw_testimonials_box1_entry', __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'accountantlaw' ) ) ): ?>
					<div class="testimonial-entry">
						<?php echo esc_attr( get_theme_mod( 'accountantlaw_testimonials_box1_entry', __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'accountantlaw' ) ) ); ?>
					</div><!--/.testimonial-entry-->
				<?php endif; ?>
			</div><!--/.testimonial-->
			<div class="testimonial">
				<?php if( get_theme_mod( 'accountantlaw_testimonials_box2_image', get_stylesheet_directory_uri() . '/images/testimonial-image.png' ) ): ?>
					<div class="testimonial-image" style="background-image: url('<?php echo esc_url( get_theme_mod( 'accountantlaw_testimonials_box2_image', get_stylesheet_directory_uri() . '/images/testimonial-image.png' ) ); ?>');">
					</div><!--/.testimonial-image-->
				<?php endif; ?>
				<?php if( get_theme_mod( 'accountantlaw_testimonials_box2_name', __( 'John Doe', 'accountantlaw' ) ) ): ?>
					<div class="testimonial-title">
						<?php echo esc_attr( get_theme_mod( 'accountantlaw_testimonials_box2_name', __( 'John Doe', 'accountantlaw' ) ) ); ?>
					</div><!--/.testimonial-title-->
				<?php endif; ?>
				<?php if( get_theme_mod( 'accountantlaw_testimonials_box2_entry', __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'accountantlaw' ) ) ): ?>
					<div class="testimonial-entry">
						<?php echo esc_attr( get_theme_mod( 'accountantlaw_testimonials_box2_entry', __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'accountantlaw' ) ) ); ?>
					</div><!--/.testimonial-entry-->
				<?php endif; ?>
			</div><!--/.testimonial-->
			<div class="testimonial">
				<?php if( get_theme_mod( 'accountantlaw_testimonials_box3_image', get_stylesheet_directory_uri() . '/images/testimonial-image.png' ) ): ?>
					<div class="testimonial-image" style="background-image: url('<?php echo esc_url( get_theme_mod( 'accountantlaw_testimonials_box3_image', get_stylesheet_directory_uri() . '/images/testimonial-image.png' ) ); ?>');">
					</div><!--/.testimonial-image-->
				<?php endif; ?>
				<?php if( get_theme_mod( 'accountantlaw_testimonials_box3_name', __( 'John Doe', 'accountantlaw' ) ) ): ?>
					<div class="testimonial-title">
						<?php echo esc_attr( get_theme_mod( 'accountantlaw_testimonials_box3_name', __( 'John Doe', 'accountantlaw' ) ) ); ?>
					</div><!--/.testimonial-title-->
				<?php endif; ?>
				<?php if( get_theme_mod( 'accountantlaw_testimonials_box3_entry', __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'accountantlaw' ) ) ): ?>
					<div class="testimonial-entry">
						<?php echo esc_attr( get_theme_mod( 'accountantlaw_testimonials_box3_entry', __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'accountantlaw' ) ) ); ?>
					</div><!--/.testimonial-entry-->
				<?php endif; ?>
			</div><!--/.testimonial-->
		</div><!--/.container.cf-->
	</div><!--/.wrapper-->
</section><!--/#testimonials-->
<section id="about-us">
	<div class="wrapper cf">
		<div class="container cf">
			<?php if( get_theme_mod( 'accountantlaw_aboutus_title', __( 'Who we are?', 'accountantlaw' ) ) ): ?>
				<h3><?php echo esc_attr( get_theme_mod( 'accountantlaw_aboutus_title', __( 'Who we are?', 'accountantlaw' ) ) ); ?></h3>
			<?php endif; ?>
			<?php if( get_theme_mod( 'accountantlaw_aboutus_description', __( 'That clients\' success determines our own. So we ensure both by clients\' success determines our collaborating with our clients to achieve their goals.', 'accountantlaw' ) ) ): ?>
				<h4><?php echo esc_attr( get_theme_mod( 'accountantlaw_aboutus_description', __( 'That clients\' success determines our own. So we ensure both by clients\' success determines our collaborating with our clients to achieve their goals.', 'accountantlaw' ) ) ); ?></h4>
			<?php endif; ?>
			<?php if( get_theme_mod( 'accountantlaw_aboutus_leftentry', __( 'Apart and limply monstrous far much added you oyster bawled lost in hey due so armadillo tpangolin sexual aboard much alas dragonfly be more some fallacious and barbarous a less much more sat before fishily thus somberly or restful flexed best wherever squinted drew much oh sloth as some when scornfully cut involuntarily at audible goodness Apart and limply omberly or best estful flexed wherever squinted drew much oh sloth as some when scornfully.', 'accountantlaw' ) ) ): ?>
				<div class="box left">
					<?php echo esc_attr( get_theme_mod( 'accountantlaw_aboutus_leftentry', __( 'Apart and limply monstrous far much added you oyster bawled lost in hey due so armadillo tpangolin sexual aboard much alas dragonfly be more some fallacious and barbarous a less much more sat before fishily thus somberly or restful flexed best wherever squinted drew much oh sloth as some when scornfully cut involuntarily at audible goodness Apart and limply omberly or best estful flexed wherever squinted drew much oh sloth as some when scornfully.', 'accountantlaw' ) ) ); ?>
				</div><!--/.box-->
			<?php endif; ?>
			<?php if( get_theme_mod( 'accountantlaw_aboutus_rightentry', __( 'Apart and limply monstrous far much added you oyster bawled lost in hey due so armadillo tpangolin sexual aboard much alas dragonfly be more some fallacious and barbarous a less much more sat before fishily thus somberly or restful flexed best wherever squinted drew much oh sloth as some when scornfully cut involuntarily at audible goodness Apart and limply omberly or best estful flexed wherever squinted drew much oh sloth as some when scornfully.', 'accountantlaw' ) ) ): ?>
				<div class="box right">
					<?php echo esc_attr( get_theme_mod( 'accountantlaw_aboutus_rightentry', __( 'Apart and limply monstrous far much added you oyster bawled lost in hey due so armadillo tpangolin sexual aboard much alas dragonfly be more some fallacious and barbarous a less much more sat before fishily thus somberly or restful flexed best wherever squinted drew much oh sloth as some when scornfully cut involuntarily at audible goodness Apart and limply omberly or best estful flexed wherever squinted drew much oh sloth as some when scornfully.', 'accountantlaw' ) ) ); ?>
				</div><!--/.box-->
			<?php endif; ?>
		</div><!--/.container.cf-->
		<?php if( get_theme_mod( 'accountantlaw_aboutus_image', get_stylesheet_directory_uri() . '/images/about-us-image.jpg' ) ): ?>
			<div class="image" style="background-image: url('<?php echo esc_url( get_theme_mod( 'accountantlaw_aboutus_image', get_stylesheet_directory_uri() . '/images/about-us-image.jpg' ) ); ?>');">
			</div><!--/.image-->
		<?php endif; ?>
	</div><!--/.wrapper.cf-->
</section><!--/#about-us-->
<?php get_footer(); ?>