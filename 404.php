<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package affidavit
 */

get_header(); ?>

<div class="page-title-area">
    <div class="container">
        <h1 class="page-title"><?php esc_html_e('404','affidavit'); ?></h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1 class="page-title"><?php esc_html_e( 'Not Found', 'affidavit' ); ?></h1>
            <p>
            <?php esc_html_e( 'The article you were looking for was not found. You may want to check your link or perhaps that page does not exist anymore. Maybe try a search?', 'affidavit' ); ?>
            </p>
            <?php get_search_form(); ?>
        </div>

        <?php get_sidebar(); ?>

    </div>
</div>

<?php get_footer(); ?>