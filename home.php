<?php 
get_header(); 
$options = get_option( 'faster_theme_options' );
?>
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
	  }
	?>
      <?php 
	  $post_per_page = get_option('posts_per_page');
	  $args = array( 'posts_per_page'  => $post_per_page, 
		'orderby'      => 'post_date', 
		'order'        => 'DESC',
		'post_type'    => 'post',
		'paged' => $paged,
		'post_status'    => 'publish'	
      );
	$query = new WP_Query($args);
	?>
      <?php if ($query->have_posts() ) : ?>
      <?php while ($query->have_posts()) : $query->the_post(); ?>
      <article class="post">
        <h2 class="post-title"><a href="#"></a> </h2>
        
        <div class="post-meta">
          <div class="post-date"> <span class="day"><?php echo get_the_time('d'); ?></span> <span class="month"><?php echo get_the_time('M'); ?></span> </div>
          <!--end / post-date-->
          
          <div class="post-meta-author">
            <div class="post-author-name">
              <h5><a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
                </a></h5>
             </div>
              <?php redpro_entry_meta(); ?>
              <div class="clear-fix"></div>
			  <?php the_tags(); ?>
            </div>
          
          <!--end / post-meta--> 
          
        </div>
        
        <figure class="feature-thumbnail-large">
          <?php 
			$id = get_the_ID();
			$feat_image = wp_get_attachment_url(get_post_thumbnail_id($id)); 
			if($feat_image!='')
			{
			?>
          <a href="<?php echo $feat_image ?>"> <img src="<?php echo $feat_image ?>" class="img-responsive" alt="<?php echo get_the_title();?>" /> </a>
          <?php 
			 } 
			 ?>
        </figure>
        
        <div class="post-content">
          <?php the_excerpt(); ?>
        </div>
        <!--end / post-content--> 
      </article>
      <?php endwhile; endif; ?>
      <?php wp_reset_query();?>
     
        <!--Pagination Start-->
        <?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>
        <?php if(is_plugin_active('faster-pagination/ft-pagination.php')) {?>
            <?php faster_pagination();?>
        <?php }else { ?>
        <?php if(get_option('posts_per_page ') < $wp_query->found_posts) { ?>
          <nav class="redpro-nav">
                <span class="redpro-nav-previous"><?php previous_posts_link(); ?></span>
                <span class="redpro-nav-next"><?php next_posts_link(); ?></span>
			</nav>
        <?php } ?>
        <?php }//is plugin active ?>
        <!--Pagination End-->

      <!--end / article--> 
    </div>
    <!--end / main-->
    <?php 
	if(!empty($options['bloglayout'])) {
	  if($options['bloglayout'] == 'right'){
		echo '<div class="col-md-3 col-md-offset-1 sidebar">';
	  get_sidebar();
	  echo '</div>';
	  }
	  if($options['bloglayout'] == ''){
		echo '<div class="col-md-3 col-md-offset-1 sidebar">';
	  	get_sidebar();
	  	echo '</div>';
	  } } ?>
  </div>
</div>
<?php get_footer(); ?>
