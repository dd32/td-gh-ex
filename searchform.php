<form role="search" method ="get" id="searchform" action="<?php echo esc_url(home_url('/'));?>" class="search">
	<input type="text" value="" name="<?php esc_attr_e( 's', 'a-portfolio' );?>" id="<?php esc_attr_e( 's', 'a-portfolio' );?>" placeholder="<?php the_search_query();?>">
	<div class="s-button">
		<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'a-portfolio' );?>">
	</div>
</form>