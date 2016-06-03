<div class="paginationNumbers">
	<p><?PHP echo __("Choose from the list", 'antonine'); ?></p>
	<?PHP
		the_posts_pagination( array(
			'mid_size' => 2,
			"before_page_number" => __("Extra posts page", "antonine") . " ",
			'prev_text' => __( 'Previous posts page', 'antonine' ),
			'next_text' => __( 'Next posts page', 'antonine' ),
		) );
	?>
	<p><?PHP echo __("Or Scroll down for more", 'antonine'); ?></p>
</div>