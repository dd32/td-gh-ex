<?php get_header(); ?>

<div class="container">
<div id="primary" class="content-area">
    <div class="row">
        <div class="page-post-container-wrapper">
            <div class="col-md-8">
                <div class="content-bar">
                <!-- ----------------Post loop starts --------------------- -->

                <?php get_template_part('loop', 'search'); ?> 

                <!-- ------------------Post loop ends----------------------- -->

            </div>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
</div>    
<?php get_footer(); ?>