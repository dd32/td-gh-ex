<?php
/**
 * Free vs. Pro section.
 *
 * @package Bayn Lite
 */

?>
<div id="pro" class="gt-tab-pane">
	<table class="form-table">
		<thead>
			<tr>
				<th></th>
				<th><?php esc_html_e( 'Lite', 'bayn-lite' ); ?></th>
				<th><?php esc_html_e( 'PRO', 'bayn-lite' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Responsive Design', 'bayn-lite' ); ?></h3>
					<p><?php esc_html_e( 'Works in any browsers on desktops, tablets and mobile devices and optimized for speed.', 'bayn-lite' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-yes"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Custom Logo', 'bayn-lite' ); ?></h3>
					<p><?php esc_html_e( 'Supports custom logo in WordPress 4.5. Upload your logo has never been easier.', 'bayn-lite' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-yes"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Front Page Theme Options', 'bayn-lite' ); ?></h3>
					<p><?php esc_html_e( 'Change the look of your front page with a lot of useful customizations.', 'bayn-lite' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-yes"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Portfolios', 'bayn-lite' ); ?></h3>
					<p><?php esc_html_e( 'Give you an easy way to manage and showcase projects on your site.', 'bayn-lite' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Testimonials', 'bayn-lite' ); ?></h3>
					<p><?php esc_html_e( 'Allow you to add, organize, and display your testimonials on your site.', 'bayn-lite' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( '1-Click Demo Import', 'bayn-lite' ); ?></h3>
					<p><?php esc_html_e( 'Save time setting up the theme and get exactly what you see in the demo.', 'bayn-lite' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Custom Google Fonts', 'bayn-lite' ); ?></h3>
					<p><?php esc_html_e( 'Integrated all Google Fonts with various options to customize for a beautiful typography.', 'bayn-lite' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Custom Colors', 'bayn-lite' ); ?></h3>
					<p><?php esc_html_e( 'Customize colors of any element on your website.', 'bayn-lite' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Infinite Scroll', 'bayn-lite' ); ?></h3>
					<p><?php esc_html_e( 'Load more posts when reaching the end of the page. Support auto mode and manual mode.', 'bayn-lite' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Call To Action', 'bayn-lite' ); ?></h3>
					<p><?php esc_html_e( 'Add some marketing text and a call-to-action button.', 'bayn-lite' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-yes"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Recent Posts', 'bayn-lite' ); ?></h3>
					<p><?php esc_html_e( 'Display your latest recent posts from your blog.', 'bayn-lite' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-yes"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Priority Support', 'bayn-lite' ); ?></h3>
					<p><?php esc_html_e( 'You will benefit of our full support for any issues you have with the theme.', 'bayn-lite' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td></td>
				<td colspan="2">
					<a href="<?php echo esc_url( "https://gretathemes.com/wordpress-themes/{$this->pro_slug}/{$this->utm}" ); ?>" target="_blank" class="button button-primary button-hero">
						<?php
						/* translators: pro theme name. */
						echo esc_html( sprintf( __( 'Get %s PRO now', 'bayn-lite' ), $this->pro_name ) );
						?>
					</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
