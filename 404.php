<?php
/**
 *
 *
 * The template for displaying 404 pages (Not Found)
 *
 *
 *
 */
get_header();
?>
<!-- *** Single Post Starts *** -->
<div class="content-wrapper">
    <div class="container">
	<div id="primary" class="content-area">
          <div class="row">
            <div class="col-md-8">
                <div class="content-bar">
                    <!-- *** Post loop starts *** -->

                    <!-- *** Post1 Starts *** -->
                                       
                    <div class="post-content clear">
                        <h1 class="embarassing"><?php esc_html_e( 'This is somewhat embarrassing, isn\'t it?', 'bfront' ); ?></h1>
                        <p>
                        <?php esc_html_e( 'It seems we can\'t find what you are looking for. Trying one of the links below, can help.', 'bfront' ); ?>
                        </p>
                        <?php the_widget('WP_Widget_Recent_Posts', array('number' => 10), array('widget_id' => '404')); ?>

                        <div class="widget">
                            <h3 class="widgettitle">
                                <?php echo BFRONT_MOST_USED_CATEGORIES; ?>
                            </h3>
                            <ul>
                                <?php wp_list_categories(array('orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10)); ?>
                            </ul>
                        </div>
                        <?php
                        /* translators: %1$s: smilie */
                        $archive_content = '<p>' . sprintf(BFRONT_TRY_LOOKING_MONTHLY_ARCHIVES, convert_smilies(':)')) . '</p>';
                        the_widget('WP_Widget_Archives', array('count' => 0, 'dropdown' => 1), array('after_title' => '</h2>' . $archive_content));
                        ?>
                        <?php the_widget('WP_Widget_Tag_Cloud'); ?>

                    </div>
                            
                          
                           
                    </div>
                 </div>
                 <div class="col-md-4">
                     <?php get_sidebar(); ?> 
                 </div>
            </div><!-- #main -->
	</div><!-- #primary -->
    </div>
</div>    
<?php get_footer(); ?>