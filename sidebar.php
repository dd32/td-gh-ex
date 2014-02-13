<!--<div class="col-md-3 col-md-offset-1 sidebar">-->
  <?php if ( is_active_sidebar( 'content-sidebar' ) ) : 
		 dynamic_sidebar( 'content-sidebar' ); 
	 endif; ?>
<!--</div>-->
<!--end / sidebar--> 
<script>
jQuery(document).ready(function($) {
	 $('.sidebar > aside').find('ul').addClass('list-unstyled widget-list');
});
</script> 
