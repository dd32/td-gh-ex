<?php 
get_header(); 
$options = get_option( 'faster_theme_options' ); ?>
<div class="main-container">
  <div class="container"> 
    <!-- Example row of columns -->
    <div class="row">
      <?php
	 if(!empty($options['bloglayout'])) {
	 if($options['bloglayout'] == 'left'){	
        echo '<div class="col-md-3 sidebar">';
      		 get_sidebar(); 
      	echo '</div>';
	 }  
	if($options['bloglayout'] == 'full'){
	echo '<div class="col-md-12 main full-page">';
	}else{
		echo '<div class="col-md-8 main">';
		}
	 } else {
		 echo '<div class="col-md-8 main">';
	 }
	  $post_per_page = get_option('posts_per_page');
	  $args = array( 'posts_per_page'  => $post_per_page, 
		'orderby'      => 'post_date', 
		'order'        => 'DESC',
		'post_type'    => 'post',
		'paged' => $paged,
		'post_status'    => 'publish'	
      );
	$query = new WP_Query($args); ?>
      <?php if ($query->have_posts() ) : ?>
      <?php while ($query->have_posts()) : $query->the_post(); ?>
      <article class="post">
        <h2 class="post-title"><a href="#"></a> </h2>
        <div class="post-meta">
          <div class="post-date"> <span class="day"><?php echo esc_html(get_the_time('d')); ?></span> <span class="month"><?php echo esc_html(get_the_time('M')); ?></span> </div>
          <!--end / post-date-->
          <div class="post-meta-author">
            <div class="post-author-name">
              <h5><a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
                </a></h5>
             </div>
              <?php redpro_entry_meta(); ?>
              <div class="clear-fix"></div>			     
            </div>
          <!--end / post-meta--> 
        </div>
        <?php if(has_post_thumbnail()) { ?>
        <figure class="feature-thumbnail-large">         
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large');?></a>            
        </figure>
        <?php } ?>
        <div class="post-content">
          <?php the_excerpt(); ?>
        </div>
        <!--end / post-content--> 
      </article>
      <?php endwhile; endif; ?>
      <?php wp_reset_query();     
        the_posts_pagination( array(
            'screen-reader-text'=>'',
            'Previous' => __( 'Back', 'redpro' ),
            'Next' => __( 'Onward', 'redpro' ),
          ) ); ?>		
      <!--end / article--> 
    </div>
    <!--end / main-->
    <?php 
	  if(!empty($options['bloglayout'])) {
	  if($options['bloglayout'] == 'right'){
		echo '<div class="col-md-4 sidebar">';
	  get_sidebar();
	  echo '</div>';
	  } }
	  if(empty($options['bloglayout'])){
		echo '<div class="col-md-4 sidebar">';
	  	get_sidebar();
	  	echo '</div>';
	  } ?>
  </div>
</div>
<?php get_footer(); ?>