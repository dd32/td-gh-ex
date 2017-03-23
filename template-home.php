<?php
 /**
  * Template Name: Home
  *
  * home.php
  * Page template used for setting the front page
  *
  * @subpackage Best_Reloaded
  * @since Best Reloaded 0.1
  */
?>

<?php get_header(); ?>
    <?php if ( get_theme_mod( 'bestreloaded_display_intro_text' ) && get_theme_mod( 'bestreloaded_intro_text') ) : ?>
        <div class="row">
            <div class="col-sm-12 text-center">
                <p class="hero-p"><?php echo wp_kses_post( get_theme_mod( 'bestreloaded_intro_text' ) ); ?></p>
                <hr class="hr-row-divider">
            </div><!-- end .col-xs-12 -->
        </div><!-- end .row -->
    <?php endif; ?>
    <div id="main_content" role="main">
        <div class="row">
            <div class="col-md-9">
                <div id="carousel-home" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
				    <ol class="carousel-indicators">
					    <li data-target="#carousel-home" data-slide-to="0" class="active"></li>
					    <li data-target="#carousel-home" data-slide-to="1"></li>
					    <li data-target="#carousel-home" data-slide-to="2"></li>
				    </ol>

				    <!-- Wrapper for slides -->
    				<div class="carousel-inner" role="listbox">
    				    <?php get_template_part( 'inc/parts/loop', 'slides' ); ?>
    				</div>

					<!-- Controls -->
					<a class="carousel-control-prev" href="#carousel-home" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only"><?php esc_html_e('Previous', 'best-reloaded' ); ?></span>
					</a>
					<a class="carousel-control-next" href="#carousel-home" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only"><?php esc_html_e('Next', 'best-reloaded');?></span>
					</a>
				</div>
	            <hr class="hr-row-divider">
	        </div><!-- end .col-sm-9 -->

			<div class="col-md-3 widget-area">

				<?php dynamic_sidebar( 'sidebar-2' ); ?>

			</div><!-- end .col-md-3 -->
		</div><!-- end .row -->

            <?php get_sidebar( 'home' ); ?>

            <?php get_template_part( 'inc/parts/loop', 'home' ); ?>

        </div><!-- end .row -->
    </div><!-- end #main_content -->
<?php get_footer(); ?>
