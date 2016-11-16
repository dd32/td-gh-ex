<?php
	get_header(); 
	$posts_total = 0;

	if(have_posts()){
?>	
	<div id="primary" class="content-area">
		<main id="main" class="site-main"><?PHP

			query_posts( $query_string . '&posts_per_page=-1' );

			while ( have_posts() ) : the_post();

				get_template_part( 'parts/content/content-all', get_post_format() );

			endwhile;
	
		?></main>
		<div id="scroll_bottom" scroll="on" page="<?PHP echo $posts_total; ?>" total_posts="<?PHP echo $posts_total; ?>"></div>
	</div>
<?PHP
	}else{
?><div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="no-posts">
				<?PHP
					echo __("Sorry, nothing found. Try again?","antonine");
				?>
				<?PHP
					get_template_part("parts/search/search-form");
				?>
			</div>
		</main>
	</div><?PHP
}?>
<?php 
	get_footer(); 
?>