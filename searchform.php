<?php
/**
 * Default search form.
 *
 */


?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'scr_title', 'ba-tours-light' ); ?></span>
		<input type="search" class="search-field"
			placeholder="<?php esc_html_e( 'Search ...', 'ba-tours-light' ); ?>"
			value="<?php echo get_search_query() ?>" name="s"
			title="<?php echo esc_html_x( 'Search for:', 'title', 'ba-tours-light' ); ?>" />
	</label>
	<button type="submit" class="btn btn-primary">
		<label class="screen-reader-text"><?php echo esc_html_x( 'Search', 'scr_submit', 'ba-tours-light' ); ?></label>
		<?php echo esc_html_x( 'Search', 'submit', 'ba-tours-light' ); ?>
	</button>
</form>