<?php
/**
 * Chip Life CONTENT Hooks
 */
 
/** Chip Life Taxonomy */
add_action( 'chip_life_content', 'chip_life_taxonomy_title_init' );
function chip_life_taxonomy_title_init() {
	
	if ( is_search() ) {		
		$taxonomy_title = sprintf( '<div class="taxonomy-wrap"><h2 class="taxonomy-title"><span class="archive-label">%1$s</span> <span class="archive-title">%2$s</span></h2></div>', apply_filters( 'chip_life_search_archive_label', 'Search Results for:' ), apply_filters( 'chip_life_search_archive_title', get_search_query() ) );
		echo apply_filters( 'chip_life_search_archive_output', $taxonomy_title );
	}
	
	else if ( is_category() ) {				
		$taxonomy_title = sprintf( '<div class="taxonomy-wrap"><h2 class="taxonomy-title"><span class="archive-label">%1$s</span> <span class="archive-title">%2$s</span></h2></div>', apply_filters( 'chip_life_category_archive_label', 'Category Archives:' ), apply_filters( 'chip_life_category_archive_title', single_cat_title( '', false ) ) );
		echo apply_filters( 'chip_life_category_archive_output', $taxonomy_title );
	
	}
	
	else if ( is_tag() ) {		
		$taxonomy_title = sprintf( '<div class="taxonomy-wrap"><h2 class="taxonomy-title"><span class="archive-label">%1$s</span> <span class="archive-title">%2$s</span></h2></div>', apply_filters( 'chip_life_tag_archive_label', 'Tag Archives:' ), apply_filters( 'chip_life_tag_archive_title', single_tag_title( '', false ) ) );
		echo apply_filters( 'chip_life_tag_archive_output', $taxonomy_title );
	}
	
	else if ( is_day() ) {		
		$taxonomy_title = sprintf( '<div class="taxonomy-wrap"><h2 class="taxonomy-title"><span class="archive-label">%1$s</span> <span class="archive-title">%2$s</span></h2></div>', apply_filters( 'chip_life_day_archive_label', 'Daily Archives:' ), apply_filters( 'chip_life_day_archive_title', get_the_date() ) );
		echo apply_filters( 'chip_life_day_archive_output', $taxonomy_title );
	}
	
	else if ( is_month() ) {		
		$taxonomy_title = sprintf( '<div class="taxonomy-wrap"><h2 class="taxonomy-title"><span class="archive-label">%1$s</span> <span class="archive-title">%2$s</span></h2></div>', apply_filters( 'chip_life_month_archive_label', 'Monthly Archives:' ), apply_filters( 'chip_life_month_archive_title', get_the_date('F Y') ) );
		echo apply_filters( 'chip_life_month_archive_output', $taxonomy_title );
	}
	
	else if ( is_year() ) {		
		$taxonomy_title = sprintf( '<div class="taxonomy-wrap"><h2 class="taxonomy-title"><span class="archive-label">%1$s</span> <span class="archive-title">%2$s</span></h2></div>', apply_filters( 'chip_life_year_archive_label', 'Yearly Archives:' ), apply_filters( 'chip_life_year_archive_title', get_the_date('Y') ) );
		echo apply_filters( 'chip_life_year_archive_output', $taxonomy_title );
	}		
			
}

/** Chip Life Loop Init */
add_action( 'chip_life_content', 'chip_life_loop_init' );
?>