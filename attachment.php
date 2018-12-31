<?php
/**
 * The template file to display an attachment
 *
 * @package agncy
 */

get_header();
?>
<?php get_template_part( 'template-parts/title-bar' ); ?>
<div class="container singular_content">
	<div class="row">
		<div class="col-xs-12 col-md-8">
			<div class="the_content">
				<?php
				$att_img = wp_get_attachment_image( get_the_ID(), 'large' );

				if ( empty( $att_img ) ) {
					$icon     = wp_get_attachment_image_src( get_the_ID(), null, true );
					$icon_url = $icon[0];
					$att_img  = '<img src="' . esc_url( $icon_url ) . '">';
				}

				echo '<p>' . wp_kses_post( $att_img ) . '</p>';
				the_content();
				?>
			</div>
			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				?>
				<div class="the_comments">
				<?php comments_template(); ?>
				</div>
				<?php
			endif;
			?>
		</div>
		<?php if ( is_active_sidebar( 'single-sidebar' ) ) : ?>
		<div class="col-xs-12 col-md-4">
			<ul id="single_sidebar" class="sidebar color-primary--before">
				<?php dynamic_sidebar( 'single-sidebar' ); ?>
			</ul>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
