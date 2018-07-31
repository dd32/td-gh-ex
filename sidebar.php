<?php /* Sidebar Template */ ?>

<div class="col-md-4 col-sm-4 main-sidebar">
    <?php if (is_active_sidebar('sidebar-1')) {
        dynamic_sidebar('sidebar-1');
    } ?>
</div>