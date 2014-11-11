<?php get_header();?>
            <div class="row">
                <div class="col-md-9">
                    <div id="kt-latest-title" class="h1">
                        <p><span><?php echo __('RECENT FROM BLOG','beyond');?></span></p>
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
                  
                    
                    
                    <!-- 3 articles/row ---->
                    <!--
                    <div class="kt-articles">
                        <div class="row">
                            <article class="col-md-4">
                                <div class="kt-article clearfix">
                                    <a href="#"><img src="img/del-1.jpg" alt="" class="img-responsive" /></a>
                                    <h1>Sidebar title 1</h1>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the industry's standard dummy. </p>
                                    <a href="#" class="btn btn-primary pull-right">READ MORE</a>
                                    <br class="clear" />
                                </div>
                            </article>
                            <article class="col-md-4">
                                <div class="kt-article clearfix">
                                    <a href="#"><img src="img/del-1.jpg" alt="" class="img-responsive" /></a>
                                    <h1>Sidebar title 1</h1>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the industry's standard dummy. </p>
                                    <a href="#" class="btn btn-primary pull-right">READ MORE</a>
                                    <br class="clear" />
                                </div>
                            </article>
                            <article class="col-md-4">
                                <div class="kt-article clearfix">
                                    <a href="#"><img src="img/del-1.jpg" alt="" class="img-responsive" /></a>
                                    <h1>Sidebar title 1</h1>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the industry's standard dummy. </p>
                                    <a href="#" class="btn btn-primary pull-right">READ MORE</a>
                                    <br class="clear" />
                                </div>
                            </article>                            
                        </div>
                    </div>
                    -->
                    <!-- 3 articles/row ends---->
               
                <?php get_sidebar(); ?>
            </div>
<?php get_footer();?>