<?php get_header();?>
            <div class="row" id="kt-main">
                <div class="col-md-9">
                    <div id="kt-latest-title" class="h1">
                        <p><span><?php echo __('RECENT FROM BLOG','beyondmagazine');?></span></p>
                    </div>
                    <?php 
                    if(of_get_option('post_layout','two_col') == 'two_col'):
                        get_template_part('libs/two-columns-posts');
                    elseif(of_get_option('post_layout','two_col') == 'three_col'):
                        get_template_part('libs/three-columns-posts');
                    endif;
                    ?>
                        <div id="kt-pagination">
                            <div class="alignleft">
                                <?php previous_posts_link(__( '&laquo; Newer posts', 'beyondmagazine')); ?>
                            </div>
                            <div class="alignright">
                                <?php next_posts_link(__( 'Older posts &raquo;', 'beyondmagazine')); ?>
                            </div>
                        </div>
                    </div><!-- .col-md-9 ends here -->
                <?php get_sidebar(); ?>
            </div>
<?php get_footer();?>