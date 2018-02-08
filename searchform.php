<?php
/**
 * The template for displaying search forms in Shape
 *
 * @package Shape
 * @since Shape 1.0
 */
 ?>
<form class="form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" id="searchform" role="search">
	<i class="fa fa-remove"></i>
	<input type="search" placeholder="<?php esc_attr_e('search here', 'agency-x'); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s"/>
	<button type="submit" value="send"><i class="fa fa-search"></i></button>
</form>