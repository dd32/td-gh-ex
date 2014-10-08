<?php 
/*
 * 404 Template File.
 */
get_header(); ?>
<div class="container webpage-container">
    <div class="col-md-12 no-padding">
            <div class="jumbotron">
            	<h1>Epic 404 - Article Not Found</h1>
            	<p>This is embarassing. We can't find what you were looking for.</p>
            <section class="post_content">
                <p>Whatever you were looking for was not found, but maybe try looking again or search using the form below.</p>
                <div class="row">
                    <div class="col-sm-12">
                    <div class="search-form-404"><?php echo get_search_form(); ?></div>							
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php get_footer(); ?>
