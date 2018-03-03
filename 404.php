<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package fmi
 */

get_header(); ?>

<?php
$home_layout = get_theme_mod('home_layout', 0);
if($home_layout){
?>
<div class="col-md-12">
<?php }else{?>
<div class="col-md-8">
<?php }?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">

      <section class="error-404 not-found">
        <header class="page-header">
          <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'fmi' ); ?></h1>
        </header><!-- .page-header -->

        <div class="entry-info">
        <div class="page-content">
          <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'fmi' ); ?></p>
          <?php get_search_form();?>
        </div><!-- .page-content -->
                </div>
                
      </section><!-- .error-404 -->

    </main><!-- #main -->
  </div><!-- #primary -->
</div>
<?php
get_footer();
