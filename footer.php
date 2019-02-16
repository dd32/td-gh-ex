<?php
/**
 * Auspicious (footer.php)
 *
 * The (footer.php) template file contains all of the codes that will render in the footer. This file is a template partial,
 * which uses get_footer(); to render only the footer and should not include any contents.
 *
 * @package     Auspicious
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://getbenonit.com)
 */

?>
	</section>
</section>
<div id="secondary" class="secondary-navigation">
	<?php Benlumia007\Backdrop\Menu\display( 'secondary' ); ?>
</div>
<div id="social" class="social-navigation">
	<?php Benlumia007\Backdrop\Menu\display( 'social' ); ?>
</div>
<footer id="footer" class="site-footer">
		<div class="site-info">
			<?php
				printf(
					// Translators: 1 = Date, 2 = Site Link.
					esc_html__( 'Copyright &#169; %1$s. %2$s', 'auspicious' ),
					absint( date_i18n( 'Y' ) ),
					Benlumia007\Backdrop\Site\display( 'site-link' )
				); // WPCS XSS OK.
				?>
			<br />
			<?php
				printf(
					// Translators: 1 = WordPress Link, 2 = Theme Link.
					esc_html__( 'Powered By %1$s and %2$s', 'auspicious' ),
					Benlumia007\Backdrop\Site\display( 'wp-link' ),
					Benlumia007\Backdrop\Site\display( 'theme-link' )
				); // WPCS XSS OK.
				?>
		</div>
	</footer>
<?php wp_footer(); ?>
</body>
</html>
