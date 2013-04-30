
<div class="site-search">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="form-inline" id="searchform" role="search">
		<fieldset>
			<input type="search" value="<?php echo get_search_query(); ?>" class="input-medium" id="search" name="s" />
			<input type="submit" value="<?php esc_attr_e( 'Search', 'activetab' ); ?>" class="btn search-submit-button-real">
			<span class="btn search-submit-button hide nowrap"><i class="icon-search"></i> <?php esc_attr_e( 'Search', 'activetab' ); ?></span>
		</fieldset>
	</form>
</div>
