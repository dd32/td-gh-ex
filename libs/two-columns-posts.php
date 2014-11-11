<?php                
                        if(is_category()):$category = get_query_var('cat'); else: $category = ''; endif;
                        if(is_tag()):$tag = get_query_var('tag'); else: $tag = ''; endif;
                        if(is_search()):$search = get_query_var('s'); else: $search = ''; endif;
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $my_query = new WP_Query(array('post_type'=>'post' ,
                                                       'paged'=>$paged,
                                                       'cat'=>$category,
                                                       'tag'=>$tag,
                                                       's'=>$search));
                        $divider = 2;
                        ?>
<?php if( $my_query->have_posts() ) : ?>
                    <div class="kt-articles">  
                        <div class="row">
                        <?php while( $my_query->have_posts() ) : $my_query->the_post(); ?>
                            <article class="col-md-6">
                                <div class="kt-article clearfix">
                                    <a href="<?php the_permalink();?>">
                                    <?php if(has_post_thumbnail()):the_post_thumbnail('',array('class'=>'img-responsive')); endif;?>
                                    </a>
                                    <h1><?php the_title();?></h1>
                                    <p><?php the_excerpt();?></p>
                                    <a href="<?php the_permalink();?>" class="btn btn-primary pull-right"><?php echo __('Read More','beyondmagazine');?></a>
                                </div>
                            </article>
                            <?php $current_position = $my_query->current_post + 1; // current_post starts at 0 ?>

                                <?php if( $current_position < $my_query->found_posts && $current_position % $divider == 0 ) : ?>

                                <!-- if position is equal to the divider and not the last result close the currently open div and start another -->
                                </div><div class="row">
                                <?php endif; ?>
                                 
                              <?php endwhile; ?>

                              </div>
                              <!-- close whichever div was last open -->
                              <?php else: ?>
                              <div class="row no-found-posts"><?php echo __('No posts found.Sorry','beyondmagazine') ;?></div>
                              <?php endif; wp_reset_query();?>
                            
                    </div><!-- .kt-articles end here -->