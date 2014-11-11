<?php get_header();?>
<div class="row">
                <div class="col-md-9">
                <?php if(have_posts()):while(have_posts()):the_post();?>
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?> kt-article">
                        <div id="kt-icon">
                            <div id="kt-icon-inner"><i class="glyphicon glyphicon-file"></i></div>
                        </div>
                        <div id="kt-article-title">
                            <h1><?php 
                                $thetitle = get_the_title($post->ID);
                                $origpostdate = get_the_date('M d, Y', $post->post_parent);
                                if($thetitle == null):echo $origpostdate; 
                                else:
                                the_title();
                                endif;
                                ?>
                            </h1>
                        </div>
                        <div>
                            <p class="small"><?php the_date('d, M Y') ;?> by <a href="<?php echo get_the_author_link();?>"><?php echo get_the_author(); ?></a> <?php echo __('in','beyondmagazine');?> <?php echo get_the_category_list(','); ?> &nbsp; 
                             <?php if(has_tag()):?>
                            <i class="glyphicon glyphicon-tags small"></i> &nbsp; 
                            <?php 
                            echo get_the_tag_list(' ',', ',' ');
                            ?> 
                            <?php endif; ?>
                            &nbsp; <i class="glyphicon glyphicon-comment small"></i> <?php comments_number( 'No Comments', '1 Comment', '% Comment' ); ?></p>
                            <p>
                            <?php if(has_post_thumbnail()):the_post_thumbnail('',array('class'=>'img-responsive')); endif; 
                            ?>
                            </p>
                            
                            <?php the_content();?>
                            
                            <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'beyondmagazine' ) . '</span>', 'after' => '</div>' ) ); ?>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <div id="kt-comments">
                                <?php comments_template( '', true ); ?>
                            </div>
                        </div>
                    </div>  
                    </div>
                </div>
                <?php endwhile; endif;?>
                <?php get_sidebar(); ?>
            </div>
<?php get_footer();?>