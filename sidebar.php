<aside id="sidebar" class="alignright col-md-3">
  <?php
  if (  is_active_sidebar( 'sidebar-blog' ) ){
	 dynamic_sidebar(  'sidebar-blog'  );
	 }
	 elseif( is_active_sidebar( 'default_sidebar' ) ) {
	 dynamic_sidebar('default_sidebar');
	 }
  ?>          
                
</aside>