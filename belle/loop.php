<?php
    // array for loading loop templates
	$templates = array();
	$page_head = '';
	
	if (is_search()){
		$templates[] = 'belle/loop-search.php';
		$page_head = sprintf( __('Search Results for \'%s\''), esc_attr( get_search_query() ) );
	}
    $templates[] = 'belle/mainloop.php';
?>
    <?php if ( ! empty($page_head) ): ?>
		<div class="page-head">
			<h1><?php echo $page_head; ?></h1>			
		</div>
	<?php endif; ?>

   <?php /* Check if there are posts */ if ( have_posts() ): ?>

		<?php /* Load the loop templates */ locate_template( $templates, true ); ?>
	
	<?php /* If there is nothing to loop */ else: ?>

		<?php locate_template( array('belle/404.php'), true ); ?>

	<?php endif; /* End Loop Init  */ ?>
