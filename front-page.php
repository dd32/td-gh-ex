<?php
/**
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Bharat consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Bharat
 * @since Bharat 1.0
 */

get_header(); ?>

	<div id="primary" class="front-page">
		<div id="content" role="main">

		<!-- featured box -->
			<div class="featured-image-box">
				<div class="fib-image">
					<?php if ('' == get_theme_mod('bharat_top_feature_left_image')) : ?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/bharat-wordpress-theme.jpg">
					<?php else: ?>
						<img src="<?php echo bharat_escape_html(get_theme_mod('bharat_top_feature_left_image')); ?>">
					<?php endif; ?>
					
				</div>
				<div class="fib-text">
				<?php if ('' == get_theme_mod('bharat_feature_top_headline')) : ?>
					<h2><?php _e('THE TAJMAHAL', 'bharat'); ?></h2>
				<?php else: ?>	
					<h2><?php echo bharat_escape_html(get_theme_mod('bharat_feature_top_headline')); ?></h2>
				<?php endif; ?>
				
				<?php if ('' == get_theme_mod('bharat_feature_top_desc')) : ?>
					<p class="feature_para"><?php _e('Come, walk along the pathway beside the reflecting pool with fountains upto the mausoleum crafted in soft & pure marble and jewelled with semi precious stones, where in the serenity of paradise rests the Queen in peace with her King. Come to unfold the pages from the past to churn the charm out of its mystique and enrich your imagination about this marvel of an epic in stone, The Taj! ', 'bharat'); ?></p>
				<?php else: ?>	
					<p><?php echo bharat_escape_html(get_theme_mod('bharat_feature_top_desc')); ?></p>
				<?php endif; ?>
				
				<?php if ('' == get_theme_mod('bharat_top_cta_button_text')) : ?>
					<?php else: ?>				
						<p class="button"><a href="<?php echo bharat_escape_html(get_theme_mod('bharat_top_cta_button_link')); ?>" class="read-more"><?php echo bharat_escape_html(get_theme_mod('bharat_top_cta_button_text')); ?></a></p>
					<?php endif; ?>
					
				</div>
			</div>
		<!-- featured box -->

		<!-- three column box -->
			<div class="three-column-box-wrapper">

				<?php if ('' == get_theme_mod('bharat_three_feature_heading')) : ?>
					<div class="tc-heading"><h4>Symbol of Love</h4></div>
					<?php else: ?>
					<div class="tc-heading"><h4><?php echo bharat_escape_html(get_theme_mod('bharat_three_feature_heading')); ?></h4></div>
					<?php endif; ?>

				<!-- Box1 -->
				<div class="three-column-box first">
					<div class="tc-image">
						<?php if ('' == get_theme_mod('bharat_three_feature_image1')) : ?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/4.jpg">
						<?php else: ?>
						<img src="<?php echo bharat_escape_html(get_theme_mod('bharat_three_feature_image1')); ?>">
						<?php endif; ?>
					</div>
					<div class="tc-text">
						<?php if ('' == get_theme_mod('bharat_three_feature_title1')) : ?>
							<h4><?php _e('GREAT DESIGN', 'bharat'); ?></h4>
						<?php else: ?>
							<h4><?php echo bharat_escape_html(get_theme_mod('bharat_three_feature_title1')); ?></h4>
						<?php endif; ?>
						
						
						<?php if ('' == get_theme_mod('bharat_three_feature_desc1')) : ?>
							<p><?php _e('Lorem lean startup ipsum product market fit customer development acquihire technical cofounder. User engagement A/B testing shrink a market venture capital pitch deck.', 'bharat'); ?></p>
						<?php else: ?>
							<p><?php echo bharat_escape_html(get_theme_mod('bharat_three_feature_desc1')); ?></p>
						<?php endif; ?>
						
					</div>
				</div>
				<!-- Box1 -->

				<!-- Box2 -->
				<div class="three-column-box second">
					<div class="tc-image">
						<?php if ('' == get_theme_mod('bharat_three_feature_image2')) : ?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/4.jpg">
						<?php else: ?>
						<img src="<?php echo bharat_escape_html(get_theme_mod('bharat_three_feature_image2')); ?>">
						<?php endif; ?>
					</div>
					<div class="tc-text">
						<?php if ('' == get_theme_mod('bharat_three_feature_title2')) : ?>
							<h4><?php _e('CLEAN & MODERN', 'bharat'); ?></h4>
						<?php else: ?>
							<h4><?php echo bharat_escape_html(get_theme_mod('bharat_three_feature_title2')); ?></h4>
						<?php endif; ?>
						
						
						<?php if ('' == get_theme_mod('bharat_three_feature_desc2')) : ?>
							<p><?php _e('Lorem lean startup ipsum product market fit customer development acquihire technical cofounder. User engagement A/B testing shrink a market venture capital pitch deck.', 'bharat'); ?></p>
						<?php else: ?>
							<p><?php echo bharat_escape_html(get_theme_mod('bharat_three_feature_desc2')); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<!-- Box2 -->

				<!-- Box3 -->
				<div class="three-column-box third">
					<div class="tc-image">
						<?php if ('' == get_theme_mod('bharat_three_feature_image3')) : ?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/4.jpg">
						<?php else: ?>
						<img src="<?php echo bharat_escape_html(get_theme_mod('bharat_three_feature_image3')); ?>">
						<?php endif; ?>
					</div>
					<div class="tc-text">
						<?php if ('' == get_theme_mod('bharat_three_feature_title3')) : ?>
							<h4><?php _e('FULL RESPONSIVE', 'bharat'); ?></h4>
						<?php else: ?>
							<h4><?php echo bharat_escape_html(get_theme_mod('bharat_three_feature_title3')); ?></h4>
						<?php endif; ?>
						
						
						<?php if ('' == get_theme_mod('bharat_three_feature_desc3')) : ?>
							<p><?php _e('Lorem lean startup ipsum product market fit customer development acquihire technical cofounder. User engagement A/B testing shrink a market venture capital pitch deck.', 'bharat'); ?> </p>
						<?php else: ?>
							<p><?php echo bharat_escape_html(get_theme_mod('bharat_three_feature_desc3')); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<!-- Box1 -->

			</div>
		<!-- three column box -->

		<!-- CTA section box -->
		<div class="clear"></div>
			<div class="cta-section">
				<div class="fib-text">
					<?php if ('' == get_theme_mod('bharat_cta_head')) : ?>
						<h4><?php _e('WELCOME TO INDIA', 'bharat'); ?></h4>
					<?php else: ?>
						<h4><?php echo bharat_escape_html(get_theme_mod('bharat_cta_head')); ?></h4>
					<?php endif; ?>
					
					<?php if ('' == get_theme_mod('bharat_cta_desc')) : ?>
					<?php else: ?>
						<p><?php echo bharat_escape_html(get_theme_mod('bharat_cta_desc')); ?></p>
					<?php endif; ?>
				
					<?php if ('' == get_theme_mod('bharat_cta_button_text')) : ?>
					<?php else: ?>				
						<p class="button"><a href="<?php echo bharat_escape_html(get_theme_mod('bharat_cta_button_link')); ?>" class="read-more light"><?php echo bharat_escape_html(get_theme_mod('bharat_cta_button_text')); ?></a></p>
					<?php endif; ?>
					
				</div>
			</div>
		<!-- CTA section box -->

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>