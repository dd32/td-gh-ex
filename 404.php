<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package arina
 */
 
get_header();
?>
 <section class="page-title">
    <div class="container">
        <h3><?php wp_title(''); ?></h3>          
    </div><!-- /.thm-container -->
</section><!-- /.page-title -->
<div class="breadcumb-wrapper">
    <div class="container">
      <?php echo wp_kses_post(arina_get_the_breadcrumb()); ?>
    </div><!-- /.thm-container -->
</div><!-- /.breadcumb-wrapper -->  

   <div class="main-content-section">
        <div class="container">
            <div class="row d-flex justify-content-center">
               <?php if(is_active_sidebar('sidebar-left')) : ?> 
			<div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
			<?php  else : ?>
			<div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
			<?php  endif ; ?> 
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <section class="error-404 not-found">
                                <div class="page-content">
                                    <h2 class="error_title"><?php esc_html_e( '404 Page Not Found', 'arina' ); ?></h2>
									
									<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'arina' ); ?></p>
									<?php
									    get_search_form();
									?>
                                </div><!-- .page-content -->
                            </section><!-- .error-404 -->
                        </main><!-- #main -->
                    </div>
                </div>
			<?php if(is_active_sidebar('sidebar-left')) { ?>
			<div class="col-lg-4 col-md-4 col-sm-12">
                <div class="sidebar">
				<?php dynamic_sidebar('sidebar-left'); ?>
				</div>
			</div>
			<?php } ?>
            <!--Sidebar-->
        </div>
    </div>
    </div>
<?php
get_footer();