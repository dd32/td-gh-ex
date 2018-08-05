<?php
/**
 * Diplays the news layout in the block of one column
 * @param  array  $atts [description]
 * @return [type]       [description]
 */
function beenews_layout_1($atts=array()){
     extract( shortcode_atts( array(
        'cat_id' => 30,
        'category_title' => null,
        'limit' => 3,
    ), $atts, 'newslayout' ) );
  
    
    $args = array( 'category' => $cat_id, 'post_type' =>  'post' , 'numberposts' => $limit); 
    $postslist = get_posts( $args );    
    global $post;
    
?>

            <div class="news-block-recent"> 
                <h2 class="news-block-header news-block-header-line"><span><?php echo ($category_title)?$category_title:get_cat_name( $cat_id ); ?></span></h2> 
                <div class="row"> 
                    <?php 
                    foreach ($postslist as $post) :  setup_postdata($post); 
                    ?>  
                    <div class="news-block-list"> 
                        <div class="col-md-4">
                          <?php bee_news_post_thumbnail('category-thumb');?>
                        </div>                                 
                        <div class="col-md-8"> 
                            <h3><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title();  ?></a></h3> 
                            <?php bee_news_meta_simplified(); ?>                                  
                            <p>
                            <?php
                                $words = explode(" ", strip_tags(get_the_content()));
                                $content = implode(" ", array_splice($words, 0, 30)) . '...';
                                echo $content; 
                            ?>
                        </p>      
                        </div>                                 
                    </div>     
                    <?php endforeach; ?>  
                    <?php wp_reset_postdata(); ?>                      
                </div>                         
        </div>
            

<?php
}
?>
<?php
function beenews_layout_3($atts=array()){
     extract( shortcode_atts( array(
        'cat_id' => 30,
        'limit' => 7 ,
        'category_title' => null,
    ), $atts, 'newslayout' ) );
  
    
    $args = array( 'category' => $cat_id, 'post_type' =>  'post' , 'numberposts' => $limit); 
    $postslist = get_posts( $args );    
    global $post;
?>
<div class="news-block layout-column"> 
    <div class="panel panel-default min-ht"> 
        <div class="panel-heading">
            <span>
            <?php echo ($category_title)?$category_title:get_cat_name( $cat_id ); ?>
            </span>
            <a href="<?php echo  get_category_link($cat_id) ?>" target="_blank" class="pull-right"><i class="glyphicon glyphicon-list"></i> <?php _e( 'More news', 'bee-news' ); ?></a>
        </div>
         <div class="panel-body no-padding-bottom"> 
            <div class="row news-block-list"> 
                <?php 
                $archive_count = 1;
                foreach ($postslist as $post) :  setup_postdata($post); 
                ?> 

                <?php if ($archive_count == 1): ?>
                <div class="col-md-7"> 
                <?php endif; ?>

                <?php if ($archive_count == 1): // Show the first NEWS BLOCK ?>
                    <div class="news-block"> 
                        <?php bee_news_post_thumbnail('category-thumb');?>
                        <h3 class="ellipsis-text margin-top"><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title();  ?></a></h3> 
                        <?php bee_news_meta_simplified(); ?> 
                        <p>
                            <?php
                                $words = explode(" ", strip_tags(get_the_content()));
                                $content = implode(" ", array_splice($words, 0, 30)) . '...';
                                echo $content; 
                            ?>
                        </p>          
                    </div> <!-- end of News block -->
                <?php elseif ($archive_count  <= 5): ?>
                    <?php if ($archive_count == 2): ?>
                    <ul class="list-group list-group-news"> 
                    <?php endif;?>
                        <li class="list-group-item"> 
                           <h4 class="ellipsis-text margin-top"><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title();  ?></a></h4> 
                        </li>
                    <?php if ($archive_count == 5 || $archive_count == count($postslist)): ?>
                    </ul>    
                    <?php endif; ?>
                    <?php if ( $archive_count == 5 || $archive_count == count($postslist)): ?>
                </div> <!-- END OF "col-md-7" -->
                    <?php endif;?>

                <?php else: /** FOR posts > 4 **/?>
                    <?php if ($archive_count == 6): ?>   
                    <div class="col-md-5"> 
                    <?php endif; ?>
                        <div class="news-block"> 
                        <?php bee_news_post_thumbnail('category-thumb');?>
                        <h5 class="ellipsis-text margin-top"><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title();  ?></a></h5> 

                        </div> <!-- end of News block -->
                    <?php if ($archive_count == count($postslist)): ?>   
                    </div> <!-- END OF news-block -->
                    <?php endif; ?>


                <?php endif; ?>
                <?php $archive_count++; ?>
                <?php endforeach; ?>   
                <?php wp_reset_postdata(); ?> 
            </div>
         </div>

         <?php /* ?>
         <div class="panel-footer text-center">
            <a href="<?php echo  get_category_link($cat_id) ?>" class="btn btn-default btn-sm"><?php _e( 'Show More', 'bee-news' ); ?> <i class="glyphicon glyphicon-triangle-right"></i> </a>
         </div>  
         <?php */ ?>                                                         
    </div>                         
</div> 

<?php }
?>
<?php

function beenews_layout_5($atts=array()){
     extract( shortcode_atts( array(
        'cat_id' => 30,
        'limit' => 3,
        'category_title' => null,
    ), $atts, 'newslayout' ) );
  
    
    $args = array( 'category' => $cat_id, 'post_type' =>  'post' , 'numberposts' => $limit); 
    $postslist = get_posts( $args );    
    global $post;
    
?>

    <div class="panel panel-default min-ht"> 
        <div class="panel-heading">
            <span>
            <?php echo ($category_title)?$category_title:get_cat_name( $cat_id ); ?>
            </span>
            <a href="" target="_blank" class="pull-right"><i class="glyphicon glyphicon-list"></i> <?php _e( 'More news', 'bee-news' ); ?></a>
        </div>
        <div class="panel-body no-padding-bottom"> 
        <div class="row"> 
            <?php 
            foreach ($postslist as $post) :  setup_postdata($post); 
            ?>  
            <div class=" news-block-list border-bottom"> 
                <div class="col-md-4">
                    <?php bee_news_post_thumbnail('category-thumb');?>
                </div>                                 
                <div class="col-md-8 no-md-padding-left"> 
                    <h4><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title();  ?></a></h4> 
                    <?php bee_news_meta_simplified(); ?>  

                </div>    
                <div class="col-md-12">
                    <p>
                    <?php
                        $words = explode(" ", strip_tags(get_the_content()));
                        $content = implode(" ", array_splice($words, 0, 20)) . '...';
                        echo $content; 
                    ?>
          </p>          
                </div>                             
            </div>     
            <?php endforeach; ?>    
            <?php wp_reset_postdata(); ?>                    
        </div>             
        </div>
            
</div>

<?php
}
?>
<?php

function beenews_breaking_news($atts=array()){
     extract( shortcode_atts( array(
        'cat_id' => 30,
        'limit' => 3,
        'category_title' => null,
    ), $atts, 'newslayout' ) );
  
    
    $args = array( 'category' => $cat_id, 'post_type' =>  'post' , 'numberposts' => $limit); 
    $postslist = get_posts( $args );    
    global $post;
    $archive_count = 1;
    
?>
    <div id="carousel-news-bulleting" class="carousel slide vertical news-breaking" data-ride="carousel"> 
        <div class="news-breaking-news">
            <?php echo ($category_title)?$category_title:get_cat_name( $cat_id ); ?>
        </div>                 
        <div class="carousel-inner" role="listbox"> 

            <?php 
            foreach ($postslist as $post) :  setup_postdata($post); 
            ?>  
            <div class="item <?php echo ($archive_count == 1)? 'active': '' ?>"> 
                <h6 class="ellipsis-text"><a href="<?php the_permalink(  ); ?>" target="_blank"><?php the_title();  ?></a></h6>
            </div>
            <?php $archive_count++; ?>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
        </div>                 
    </div>
<?php
}
?>
<?php

function beenews_corousel($atts=array()){
     extract( shortcode_atts( array(
        'cat_id' => 30,
        'limit' => 8,
        'category_title' => null,
    ), $atts, 'newslayout' ) );
  
    
    $args = array( 'category' => $cat_id, 'post_type' =>  'post' , 'numberposts' => $limit); 
    $postslist = get_posts( $args );    
    global $post;
    $archive_count = 1;
    
?>

    <div class="panel panel-default"> 
        <div class="panel-heading">
            <span>
            <?php echo ($category_title)?$category_title:get_cat_name( $cat_id ); ?>
            </span>
            <a href="" target="_blank" class="pull-right"><i class="glyphicon glyphicon-list"></i> <?php _e( 'More news', 'bee-news' ); ?></a>
        </div>                 
        <div class="panel-body panel-slider"> 
            <div class="row"> 
                <div class="col-md-12"> 
                    <div id="carousel-article" class="carousel slide" data-ride="carousel"> 
                        <!-- Indicators -->                                 
                        <ol class="carousel-indicators"> 
                            <li data-target="#carousel-article" data-slide-to="0" class="active"></li>                                     
                            <li data-target="#carousel-article" data-slide-to="1" class=""></li>                                     
                        </ol>                                 
                        <!-- Wrapper for slides -->                                 
                        <div class="carousel-inner" role="listbox"> 


                        <?php 
                        foreach ($postslist as $post) :  setup_postdata($post); 
                        ?>  
                        <?php if($archive_count % 4 == 1): ?>
                            <div class="item <?php echo ($archive_count == 1)?'active':'' ?>"> 
                        <?php endif; ?>
                                <div class="col-md-3"> 
                                
                                   <?php bee_news_post_thumbnail('category-thumb');?>
                                    
                                    <h6 class="ellipsis-text"><a href="<?php the_permalink(  ); ?>" target="_blank"><?php the_title(); ?></a></h6>
                                </div>
                        <?php if($archive_count  == count($postslist) || ($archive_count % 4 == 0 && $archive_count > 0)): ?>
                            </div>
                        <?php endif; ?>
                            
                        <?php $archive_count++; ?>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                        
                        </div>                                 
                        <!-- Controls -->                                 
                        <a class="left carousel-control" href="#carousel-article" role="button" data-slide="prev"> <span class="glyphicon glyphicon glyphicon-arrow-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> 
                        <a class="right carousel-control" href="#carousel-article" role="button" data-slide="next"> <span class="glyphicon glyphicon glyphicon-arrow-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> 

                    </div>                             
                </div>                         
            </div>                     
        </div>                 
    </div>

    
<?php
}
?>
<?php

function beenews_tabs($atts=array()){
     extract( shortcode_atts( array(
        'cat_id' => array(30, 18, 3 ),
        'limit' => 10,
    ), $atts, 'newslayout' ) );
  
    
    global $post;
  
    
?>

    <div class="tab-container"> 
    <ul class="nav nav-tabs" role="tablist"> 
        <?php $cat_count = 1; ?>
        <?php foreach($cat_id as $id): ?>
        <li role="presentation" class="<?php echo  ($cat_count == 1)?'active':''?>">
            <a href="#tab<?php echo $id ?>" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">
                <?php echo ($category_title)?$category_title:get_cat_name( $id ); ?>
            </a>
        </li>
        <?php $cat_count++; ?>
        <?php endforeach; ?>
    </ul>
    <div class="tab-content"> 
        <?php $cat_count = 1; ?>
        <?php foreach($cat_id as $id): 
          $args = array( 'category' => $id, 'post_type' =>  'post' , 'numberposts' => $limit); 
          $postslist = get_posts( $args );    

  
        ?>
        <div role="tabpanel" class="tab-pane <?php echo  ($cat_count == 1)?'active':''?> " id="tab<?php echo $id ?>"> 
            <ul class="list-group list-group-news">
                <?php 
                foreach ($postslist as $post) :  setup_postdata($post); 
                ?>  
                <li class="list-group-item">                    
                    <p class="ellipsis-text margin-top"><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></p> 
                </li>
                <?php endforeach; ?>   
                <?php wp_reset_postdata(); ?>                        
                </ul>                                 
        </div>
        <?php 
        $cat_count++;
        endforeach; ?>
    </div>                         
</div>
<?php
}
?>
<?php

function beenews_breaking_news_slider($atts=array()){
     extract( shortcode_atts( array(
        'cat_id' => 91,
        'limit' => 3,
        'category_title' => null,
        'thumbnail' => 'post-thumbnail',
    ), $atts, 'newslayout' ) );
  
    $args = array( 'category' => $cat_id, 'post_type' =>  'post' , 'numberposts' => $limit); 
    $postslist = get_posts( $args );   

    $archive_count = 1; 
    global $post;


?>

    
    <div id="carousel-news<?php echo $cat_id;  ?>" class="carousel slide carousel-news" data-ride="carousel">


        <!-- Indicators -->
        <ol class="carousel-indicators">
        <?php 
        foreach ($postslist as $post) :  setup_postdata($post); 
        ?> 
            <li data-target="#carousel-news<?php echo $cat_id;  ?>" data-slide-to="<?php echo ($archive_count - 1) ?>" class="<?php echo ($archive_count == 1)? 'active':'' ?>">
                <p><?php the_title(); ?></p>
            </li>
        <?php 
        $archive_count++;
        endforeach; ?>
        </ol>

        


        <!-- START Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <?php
        $archive_count =1 ;
         foreach ($postslist as $post) :  setup_postdata($post); 
        ?>
            <div class="item <?php echo ($archive_count == 1)? 'active':'' ?>">
                
                <?php 
                bee_news_virgin_post_thumbnail($thumbnail);
                ?>
                <div class="carousel-caption">
                    <label><?php echo ($category_title)?$category_title:get_cat_name( $cat_id ); ?></label>
                    <p><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
                </div>
            </div>
        <?php 
        $archive_count++;
        endforeach; ?>
        </div>
        <!-- END OF Wrapper for WRAPER slides -->
    
        <?php  wp_reset_postdata(); ?>
        
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-news<?php echo $cat_id?>" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-news<?php echo $cat_id?>" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>

  
<?php
}

?>

<?php

function beenews_newslider($atts=array()){
     extract( shortcode_atts( array(
        'cat_id' => 18,
        'limit' => 5,
        'category_title' => null,
        'thumbnail' => 'post-thumbnail',
    ), $atts, 'newslayout' ) );
  
    $args = array( 'category' => $cat_id, 'post_type' =>  'post' , 'numberposts' => $limit); 
    $postslist = get_posts( $args );   
    $archive_count = 1; 
    global $post;
?>


<div class="panel panel-default panel-slider-sm">
    <div class="panel-heading"><span>
            <?php echo ($category_title)?$category_title:get_cat_name( $cat_id ); ?>
            </span></div>
    <div class="panel-body panel-slider">
        <div class="row">
            <div class="col-md-12">
                <div id="carousel-article<?php echo $cat_id;  ?>" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <!-- <ol class="carousel-indicators">
                        <li data-target="#carousel-article" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-article" data-slide-to="1"></li>
                    </ol> -->
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                    <?php 
                    foreach ($postslist as $post) :  setup_postdata($post); 
                    ?> 
                        <div class="item <?php  echo ($archive_count == 1)?'active':'' ;?>">
                            
                             <?php bee_news_post_thumbnail($thumbnail);?>
                            <h6 class="ellipsis-text"><a href="<?php the_permalink();?>" target="_blank"><?php the_title(); ?></h6>
                        </div>
                    <?php  
                    $archive_count++;
                    endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-article<?php echo $cat_id;  ?>" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                    <a class="right carousel-control" href="#carousel-article<?php echo $cat_id;  ?>" role="button" data-slide="next">
                    <span class="glyphicon glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            </div>
        </div>
    </div>
</div>

  
<?php
}
?>
