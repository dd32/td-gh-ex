<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package affidavit
 */
?>

<div class="col-md-4 sidebar-area">

    <?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

        <?php dynamic_sidebar( 'sidebar1' ); ?>

    <?php else : ?>

        <?php
            /*
             * This content shows up if there are no widgets defined in the backend.
            */
        ?>
        
        <div class="no-widgets">
            <p><?php esc_html_e( 'This is a widget ready area. Add some and they will appear here.', 'affidavit' );  ?></p>
        </div>

    <?php endif; ?>

</div>