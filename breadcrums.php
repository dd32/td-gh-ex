<?php
if (get_theme_mod('breadcrumb_title', 1) == 1) {
    $class = 'no-breadcrumb';
} else {
    $class = '';
}
?>
<div class="enigma_header_breadcrum_title <?php echo esc_attr($class); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (get_theme_mod('breadcrumb_title', 1) == 1) {
                    ?>
                    <h1><?php if (is_home()) {
                            echo "";
                        } else {
                            the_title();
                        } ?></h1>
                <?php } ?>
                <!-- BreadCrumb -->
                <?php if (function_exists('weblizar_breadcrumbs')) weblizar_breadcrumbs(); ?>
                <!-- BreadCrumb -->
            </div>
        </div>
    </div>
</div>