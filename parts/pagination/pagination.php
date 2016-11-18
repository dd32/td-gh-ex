<?PHP
	$prev_link = get_previous_posts_link();
	$next_link = get_next_posts_link();
	
	$pagination = false;
	
	if ($prev_link || $next_link) {
		$pagination = true;
	}
?>
<div class="paginationNumbers">
	<?PHP if($pagination){
		?><p><?PHP echo __("Choose from the list", 'antonine'); ?></p><?PHP
		}
	?>
	<?PHP
		the_posts_pagination( array(
			'mid_size' => 2,
			"before_page_number" => __("Extra posts page", "antonine") . " ",
			'prev_text' => __( 'Previous posts page', 'antonine' ),
			'next_text' => __( 'Next posts page', 'antonine' ),
		) );
	?>
	<p><?PHP if($pagination){echo __("Or Scroll down for more", 'antonine');}?></p>
</div>