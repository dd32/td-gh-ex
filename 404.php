<?php 
/**
 * The 404 template file
**/
get_header(); ?>
<div class="mini-content">
    <div class="col-md-9">
    <header>
			<div class="jumbotron">
				<h1><?php esc_html_e('Epic 404 - Article Not Found','besty'); ?></h1>
				<p><?php esc_html_e("This is embarassing. We can't find what you were looking for.","besty"); ?></p>
                <section class="post_content">
                    <p><?php esc_html_e('Whatever you were looking for was not found, but maybe try looking again or search using the form below.','besty'); ?></p>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php echo get_search_form(); ?>									
                        </div>
                	</div>
				</section>
			</div>
		</header>
    </div>
    <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>