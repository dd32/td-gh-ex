<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package appdetail
 */
get_header(); ?>
 <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-section">
                        <h1 class="err-page"><?php esc_html_e( 'ERROR 404', 'appdetail' ); ?></h1>
                        <h2 class="mb-20 mt-20"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'appdetail' ); ?></h2>
                        <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'appdetail' ); ?> <a class="error-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"> <?php esc_html_e( 'Go back to Homepage', 'appdetail' ); ?></a><br>
                            <?php esc_html_e( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'appdetail' ); ?>
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();