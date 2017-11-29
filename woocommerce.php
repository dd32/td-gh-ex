<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
AttireFramework::DynamicSidebars( 'left' );
?>

    <section id="primary" class="content-area col-lg-12">
        <main id="main" class="site-main" role="main">

			<?php woocommerce_content(); ?>

        </main><!-- #main -->
    </section><!-- #primary -->

<?php
AttireFramework::DynamicSidebars( 'right' );
get_footer();
