<?php get_header(); ?>

<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6  col-sm-6 ">
        <h1>404 Page</h1>
      </div>
      <div class="col-md-6  col-sm-6 ">
        <ol class="breadcrumb  pull-right">
          <?php RedPro_breadcrumbs(); ?>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--end / page-title-->
<div class="main-container">
  <div class="container"> 
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-8 main">
        <div class="page-content">
          <p class="error-message">
            <?php _e( 'It looks like nothing was found at this location. May be try a search?', 'RedPro' ); ?>
          </p>
          <?php get_search_form(); ?>
        </div>
        <!-- .page-content --> 
        
      </div>
      <!--end / main-->
      <div class="col-md-3 col-md-offset-1 sidebar">
      	<?php get_sidebar(); ?>
      </div>
    </div>
  </div>
  
  <!-- /container --> 
</div>
<?php get_footer(); ?>
