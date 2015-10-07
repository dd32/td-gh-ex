<?php 
$current_options=get_option('spa_theme_options',spa_the_theme_setup()); 
if($current_options['enable_news'] == 'yes') {
?>
<!-----Homepage Blog Section----->
<div class="blog_section">
	<div class="container">
		
		<div class="jumbotron">
			<h1 class="home_product_tagline"><?php echo $current_options['news_title']; ?></h1>
			<p><?php echo $current_options['news_contents'];?></p>
		</div>
		<div class="row">
		<?php  
		
		$args = array( 'post_type' => 'post','ignore_sticky_posts' => 1);
        $post_type_data = new WP_Query( $args );
        $i=1;
		while($post_type_data ->have_posts()):
        $post_type_data ->the_post();?>
		<div class="span6">
				<div class="home_post_area">
					<div class="home-blog-post-img">
						<span class="post-date"><div class="date"><?php echo get_the_date('j'); ?><div class="month-year"><?php echo get_the_date('M'); ?></div></div></span>
							<?php $defalt_arg =array('class' => "img-responsive"); ?>
							<?php if(has_post_thumbnail()): ?>
							<?php the_post_thumbnail('', $defalt_arg); ?>
							<?php endif; ?>
					</div>
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<p><?php  echo get_blog_page_excerpt(); ?></p>
				</div>
			</div>
		<?php 
			  if($i==2)
			  { 
			     echo '<div class="clearfix"></div>';
				 $i=0;
			  }$i++;
			  wp_reset_postdata();
			endwhile;  ?>	
		</div>
	</div>
</div>
<?php } ?>
<!-----/Homepage Blog Section----->