<?php 
/* This is the sidebar used on the default page template */
?>
<!-- start sidebar -->
<aside class="col-md-4 blog-sidebar">
    <div class="sidebar-inner styled-box">
        <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('page-sidebar') ) ?>
    </div>
</aside>
<!-- end blog-sidebar -->