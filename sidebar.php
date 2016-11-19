<?php 
/**
 * The sidebar for our theme
 *
 * @package astrology
 */
if ( is_active_sidebar( 'sidebar-1' ) ) :
?>
<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
    <div class="blog-sidebar blog-padd">
    	<?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
</div>
<?php endif; ?>