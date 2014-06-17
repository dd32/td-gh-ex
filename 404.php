<?php 
/**
 * 404 page template file
**/
get_header(); 
?>
<div class="container container-generator">
    <div class="col-md-12 generator-post no-padding">
            <div class="jumbotron">
            	<h1>Epic 404 - Article Not Found</h1>
            	<p>This is embarassing. We can't find what you were looking for.</p>
            <section class="post_content">
                <p>Whatever you were looking for was not found, but maybe try looking again or search using the form below.</p>
                <div class="row">
                    <div class="col-sm-12">
                    <form action="<?php echo home_url(); ?>/" class="search-form" method="get" role="search">
                    <label>
                    <input type="search" name="s" value="" placeholder="Search ..." class="search-field">
                    </label>
                    <input type="submit" value="Search" class="btn btn-primary comment-sub">
                    </form>								
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php get_footer(); ?>