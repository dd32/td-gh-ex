<?php
//global $wp_query;
//$template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );
$col_class = 'span8';
if( is_page_template ( 'page-template-wide-col-no-sidebar.php' ) ){ // show wide column if sidebar is removed
	$col_class = 'span12';
}
?>
			<div class="<?php echo $col_class; ?> clearfix">
				<div id="primary" class="content-area">
					<div id="content" class="site-content" role="main">


