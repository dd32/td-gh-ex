<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>

<?php
    if ( !is_page() ) :
        if ( is_active_sidebar( 'apex-business-main-sidebar' ) ) :
?>
<div class="three columns">
    <?php dynamic_sidebar( 'apex-business-main-sidebar' ); ?>
</div><!-- /.three columns -->
<?php
        endif;
    endif;
?>

<?php
    if ( is_page() ) :
        if ( is_active_sidebar( 'apex-business-page-sidebar' ) ) :
?>
<div class="three columns">
    <?php dynamic_sidebar( 'apex-business-page-sidebar' ); ?>
</div><!-- /.three columns -->
<?php
        endif;
    endif;
?>
