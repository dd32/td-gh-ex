<?php 
/**
 * The 404 template file
**/
get_header(); 
?>
<div class="mini-content">
    <div class="col-md-9">
    <header>
			<div class="jumbotron">
				<h1>Epic 404 - Article Not Found</h1>
				<p>This is embarassing. We can't find what you were looking for.</p>
                <section class="post_content">
                    <p>Whatever you were looking for was not found, but maybe try looking again or search using the form below.</p>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php get_search_form(); ?>									
                        </div>
                	</div>
				</section>
			</div>
		</header>
    </div>
    <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>