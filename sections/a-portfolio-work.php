<?php if(get_theme_mod('a_portfolio_work_section_enable')): ?>
<!--Start Our Work -->
<section id="our-work">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="section-title text-center">
          <?php
          $work_title = get_theme_mod('a_portfolio_work_page_title');
          $queried_post = get_post($work_title);
          ?>
          <h2><?php echo esc_html($queried_post->post_title); ?></h2>
          <p><?php echo esc_html($queried_post->post_content); ?></p>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <ul id="filters" class="nav nav-tabs justify-content-center">  
          <li class="nav-item" data-filter="*"> <a class="nav-link active"><?php echo esc_html__( 'All', 'a-portfolio' ) ;?></a></li>
            <?php 
            $work_category_id = get_theme_mod( 'a_portfolio_work_category_id' );
            $args = array('child_of' =>$work_category_id);
            $categories = get_categories( $args );?>
            <?php foreach($categories as $category):?>
              <li data-filter=".<?php echo esc_attr($category->name);?>" class="nav-item"><a class="nav-link" ><?php echo esc_html($category->name);?>(<?php echo absint( a_portfolio_get_cat_postcount( $category->term_id ) );?>)</a></li>
            <?php endforeach;?>
        </ul>
      </div>
    </div>
    <div class="tab-content">
      <div class="row work-container">
        <!-- Our work single start-->
        <?php 
          $sub_cats = get_categories('parent=' . $work_category_id);
          if( $sub_cats ) :
              foreach( $sub_cats as $sub_cat ) :
                  $sub_query = new WP_Query( array(
                      'category__in' => array( $sub_cat->term_id ),
                      'posts_per_page' => 6)
                  );
                  if ( $sub_query->have_posts() ) :
                      while( $sub_query->have_posts() ) : $sub_query->the_post();?>
                      <div class="work-item col-md-4 col-sm-6 col-xs-12 col-lg-3 <?php echo  esc_attr($sub_cat->name);?>" data-category="<?php echo  esc_attr($sub_cat->name);?>">
                        <div class="work-link">
                          <div class="work-hover">
                            <div class="work-hover-content">
                                <a href="<?php the_permalink();?>"><i class="fa fa-link"></i></a>
                            </div>
                          </div>
                          <?php the_post_thumbnail('a-portfolio-work-thumb');?>
                        </div>
                        <div class="work-caption">
                          <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                          <p><?php echo  esc_html($sub_cat->name);?></p>
                        </div>
                      </div>
                  <!-- Our work single end -->
              <?php endwhile;
                        endif;
                    endforeach;
              endif;
          ?>
      </div>
    </div>
  </div> 
</section>
<!-- End Our Work-->
<?php endif; ?>