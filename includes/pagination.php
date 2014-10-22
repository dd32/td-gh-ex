<?php
/**
* WP Newsstream pagination functionality
*
*/
if ( ! function_exists( 'wp_newsstream_pagination' ) ) :
	function wp_newsstream_pagination() {	
		global $wp_query; 		
		$big = 999999999;		  
		$total_pages = $wp_query->max_num_pages; 		  
		if ($total_pages > 1){  		  
		  $current_page = max(1, get_query_var('paged'));			
		  echo '<div class="pagination">';			
		  echo paginate_links(array(  
			  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),  
			  'current' => $current_page,  
			  'total' => $total_pages,  
			  'prev_text' => __('<span class="fa fa-chevron-left"></span>', 'wp-newsstream'),  
			  'next_text' => __('<span class="fa fa-chevron-right"></span>', 'wp-newsstream')  
			));		  
		  echo '</div>';			
		}	
	}
endif;
?>