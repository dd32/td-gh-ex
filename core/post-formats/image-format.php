<?php 

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

	if ( ! bazaarlite_is_single() ) :
	
		do_action('bazaarlite_thumbnail','thumbnail'); 
	
	else :

		do_action('bazaarlite_before_content');
		do_action('bazaarlite_thumbnail','thumbnail','on'); 

?>

<div class="post-article">

	<?php do_action('bazaarlite_after_content','post'); ?>

</div>

<?php endif; ?>