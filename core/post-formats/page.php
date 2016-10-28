<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('suevafree_page_format_function')) {

	function suevafree_page_format_function() {
		
		do_action('suevafree_thumbnail', 'blog' ); ?>
			
		<div class="post-article">
		
			<?php 
			
				do_action('suevafree_before_content'); 
				
				if ( is_page() ) : 
				
					echo '<div class="line"></div>';
					
				endif;
					
				if ( is_search() ):
					
					do_action('suevafree_excerpt');
				
				else:
			
					the_content();
					
					echo "<div class='clear'></div>";
					
					wp_link_pages();
					
					comments_template();
					
				endif;
			
			?>
		
		</div>

<?php 

	}

	add_action( 'suevafree_page_format', 'suevafree_page_format_function', 10, 2 );

}

?>