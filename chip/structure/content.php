<?php
/**
 * Chip Life CONTENT Hooks
 */
 
/** Chip Life Taxonomy */
add_action( 'chip_life_content', 'chip_life_taxonomy_title_init' );
function chip_life_taxonomy_title_init() {
	
	if ( is_search() ) {		
		$taxonomy_title = sprintf( '<div class="taxonomy-wrap"><h2 class="taxonomy-title">%1$s %2$s</h2></div>', apply_filters( 'chip_life_taxonomy_title_text_static', 'Search Results for:' ), apply_filters( 'chip_life_taxonomy_title_text_dynamic', get_search_query() ) );
		echo apply_filters( 'chip_life_taxonomy_title_output', $taxonomy_title );
	}
	
	else if ( is_category() ) {		
		$taxonomy_title = sprintf( '<div class="taxonomy-wrap"><h2 class="taxonomy-title">%1$s %2$s</h2></div>', apply_filters( 'chip_life_taxonomy_title_text_static', 'Category Archives:' ), apply_filters( 'chip_life_taxonomy_title_text_dynamic', single_cat_title( '', false ) ) );
		echo apply_filters( 'chip_life_taxonomy_title_output', $taxonomy_title );
	}
	
	else if ( is_tag() ) {		
		$taxonomy_title = sprintf( '<div class="taxonomy-wrap"><h2 class="taxonomy-title">%1$s %2$s</h2></div>', apply_filters( 'chip_life_taxonomy_title_text_static', 'Tag Archives:' ), apply_filters( 'chip_life_taxonomy_title_text_dynamic', single_tag_title( '', false ) ) );
		echo apply_filters( 'chip_life_taxonomy_title_output', $taxonomy_title );
	}
	
	else if ( is_day() ) {		
		$taxonomy_title = sprintf( '<div class="taxonomy-wrap"><h2 class="taxonomy-title">%1$s %2$s</h2></div>', apply_filters( 'chip_life_taxonomy_title_text_static', 'Daily Archives:' ), apply_filters( 'chip_life_taxonomy_title_text_dynamic', get_the_date() ) );
		echo apply_filters( 'chip_life_taxonomy_title_output', $taxonomy_title );
	}
	
	else if ( is_month() ) {		
		$taxonomy_title = sprintf( '<div class="taxonomy-wrap"><h2 class="taxonomy-title">%1$s %2$s</h2></div>', apply_filters( 'chip_life_taxonomy_title_text_static', 'Monthly Archives:' ), apply_filters( 'chip_life_taxonomy_title_text_dynamic', get_the_date('F Y') ) );
		echo apply_filters( 'chip_life_taxonomy_title_output', $taxonomy_title );
	}
	
	else if ( is_year() ) {		
		$taxonomy_title = sprintf( '<div class="taxonomy-wrap"><h2 class="taxonomy-title">%1$s %2$s</h2></div>', apply_filters( 'chip_life_taxonomy_title_text_static', 'Yearly Archives:' ), apply_filters( 'chip_life_taxonomy_title_text_dynamic', get_the_date('Y') ) );
		echo apply_filters( 'chip_life_taxonomy_title_output', $taxonomy_title );
	}		
			
}

/** Chip Life Loop Init */
add_action( 'chip_life_content', 'chip_life_loop_init' );
?>