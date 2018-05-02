<?php $testimonials = atlast_business_show_testimonials();

if (!empty($testimonials)):
	foreach ($testimonials as $testimonial):
		$page = get_post($testimonial);
		?>
		<div class="column col-6 col-xs-12">
			<div class="single-testimonial-item">
				<?php
				$thumbUrl = get_the_post_thumbnail_url($page->ID, 'atlast-business-front-testimonial');
				if ($thumbUrl != false): ?>
					<div class="single-testimonial-item-image">
						<img class="circle single-testimonial-image img-responsive" src="<?php echo esc_url($thumbUrl); ?>"
						     alt="<?php echo esc_attr($page->post_title); ?>"/>
						<a href="<?php echo esc_url(get_permalink($page->ID)); ?>"></a>
					</div>
				<?php endif; ?>
				<p><?php echo atlast_business_get_first_paragraph($page->post_content); ?></p>
				<h4 class="text-right">
					<a href="<?php echo esc_url(get_permalink($page->ID)); ?>">
						<?php echo esc_html($page->post_title); ?>
					</a>
				</h4>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>