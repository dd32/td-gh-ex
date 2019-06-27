<?php
/**
 * Silver Quantum ( footer.php )
 *
 * @package     Silver Quantum
 * @copyright   Copyright (C) 2014-2019. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://luthemes.com )
 */

use Benlumia007\Backdrop\Site\Site as site;
use Benlumia007\Backdrop\View\View as menu;
?>
	<footer id="footer" class="site-footer">
		<div class="site-info">
			<?php
			printf(
				// Translators: 1 = Date, 2 = Site Link.
				esc_html__( 'Copyright &#169; %1$s. %2$s', 'silver-quantum' ),
				absint( date_i18n( 'Y' ) ),
				site::render( 'site-link' ) // phpcs:ignore
			);
			?>
			<br />
			<?php
			printf(
				// Translators: 1 = WordPress Link, 2 = Theme Link.
				esc_html__( 'Powered By %1$s and %2$s', 'silver-quantum' ),
				site::render( 'wp-link' ), // phpcs:ignore
				site::render( 'theme-link' ) // phpcs:ignore
			);
			?>
		</div>
		<?php menu::display( 'menu', [ 'social' ] ); ?>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
