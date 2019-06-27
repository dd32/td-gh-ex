<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package atlas_concern
 */

get_header();
?>
<div class="page-banner">
	<div class="container">
		<div class="row">
		  <div class="text-center col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3><?php esc_html_e('Error !','atlas-concern'); ?></h3>
			 <div class="breadcrumb">
			   <ul>
			   <li><?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?></li>
			   </ul>
			 </div>
         </div>
        </div>
   </div>
</div>
<div class="message error-404 not-found">
   <div class="container">
    <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	      <div class="text-center">
		    <h3><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'atlas-concern' ); ?></h3>
		    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'atlas-concern' ); ?></p>
	      
		  <div class="home-btn">
		  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home-turn"><?php esc_html_e('Return to Homepage','atlas-concern'); ?></a>
	      </div>
		  </div>
	</div>
   </div>
  </div>
</div>


<?php
get_footer();
