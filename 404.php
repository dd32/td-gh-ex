<?php 
/*
* 404 page template
*/
get_header(); ?>

<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6  col-sm-6 ">
        <h1>404 Page</h1>
      </div>
      <div class="col-md-6  col-sm-6 ">
        <ol class="archive-breadcrumb  pull-right">
          <?php if (function_exists('foodrecipes_custom_breadcrumbs')) foodrecipes_custom_breadcrumbs(); ?>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="main-container">
  <div class="foodrecipes-container-recipes container">
    <div class="row">
      <div class="col-md-12 main no-padding">
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
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
