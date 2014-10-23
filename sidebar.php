<?php 
/* This is the default sidebar used for blog pages */
?>
<!-- start sidebar -->
<aside class="col-md-4 blog-sidebar">
    <div class="sidebar-inner styled-box">
        <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('blog-sidebar') ) ?>
    </div>
</aside>
<!-- end blog-sidebar -->