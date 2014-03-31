<?php
/*
Template name: Wiki template
*/ 
get_header();
?>
<div id="content" class="clearfix">
  <div id="main" class="col-sm-8 clearfix nopadding-left" role="main">
    <div id="home-main" class="home-main home">
      <header>
        <div class="page-catheader">
          <h2 class="page-title">Article Categories</h2>          
        </div>
      </header>
        <?php
	$cat = array(
			'child_of'                 => 0,
			'parent'                   => '',
			'orderby'                  => 'name',
			'order'                    => 'ASC',
			'hide_empty'               => 0,
			'hierarchical'             => 1,
			'include'                  => '',
			'exclude'                  => '',
			'number'                   => '',
			'taxonomy'                 => 'category',
			'pad_counts'               => false
			 );
	 
	 $cat = get_categories( $cat ); 
		$i=0;
		foreach ($cat as $categories) {
			$i++;
			if($i<5)$cat_id="cat-id"; else $cat_id='';
			if($i % 2 == 1)
			{				
				echo"<div class='border-bottom' style='float:left;'>";
			}
			
			?>
        
        <div class="cat-main-section <?php echo $cat_id?>">
          <header>
           <a href="<?php echo get_category_link( $categories->term_id );?>"> <h4> <?php echo $categories->name ;?> <span>(<?php echo $categories->count?>)</span></h4> </a>
          </header>
          <?php
								$args = array(
'posts_per_page' => 5,
	'tax_query' => array(
		'relation' => 'AND',
		array(
		'taxonomy' => 'category',
			'field' => 'id',
			'terms' => array($categories->term_id),
			
		),
	)
); $cat_post = new WP_Query( $args );
if ( $cat_post->have_posts() ) :?>
          <div class="content-according">
          	<ul>
            <?php while ( $cat_post->have_posts() ):$cat_post->the_post(); ?>
            <li><a href="<?php echo get_permalink($post->ID)?>">
              <?php the_title();?>
            </a></li>
            <?php endwhile;?>
            </ul>
          </div>
          <?php endif;?>
        </div>
        <?php 	
		if($i % 2 ==0)
			{
				echo"</div>";
			}
		}
		if($i % 2 ==1)
			{
				echo"</div>";
			}
		?> 
    </div>    
    <!-- end #main --> 
  </div>  
  <?php get_sidebar(); // sidebar 1 ?>
</div></div>
<!-- end #content -->
<?php get_footer();?>