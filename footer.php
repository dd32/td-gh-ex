<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Catchbase
 */
?>
<?php 
    /** 
     * catchbase_after_content hook
     *
     * @hooked catchbase__content_sidebar_wrap_end - 10
     * @hooked catchbase_sidebar_secondary (three-column) - 20 
     * @hooked catchbase_content_end - 30
     *
     */
    do_action( 'catchbase_after_content' ); 
?>
            
<?php                
    /** 
     * catchbase_footer hook
     *
     * @hooked catchbase_footer_menu - 10
     * @hooked catchbase_footer_content_start - 20
     * @hooked catchbase_footer_sidebar - 30
     * @hooked catchbase_get_footer_content - 100
     * @hooked catchbase_footer_content_end - 110
     * @hooked catchbase_page_end - 200
     *
     */
    do_action( 'catchbase_footer' );
?>

<?php               
/** 
 * catchbase_after hook
 *
 * @hooked catchbase_scrollup - 10
 * @hooked catchbase_mobile_menus- 20
 *
 */
do_action( 'catchbase_after' );?>

<?php wp_footer(); ?>

</body>
</html>