<?php 
$corpbiz_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'corpbiz_options', array() ), $corpbiz_options ); 
$settings= array();
$settings=array('animationSpeed'=>$current_options['animationSpeed'],'slideshowSpeed' =>$current_options['slideshowSpeed']);

wp_register_script('corpbiz-slider',get_template_directory_uri().'/js/front-page/slider.js',array('jquery'));
wp_localize_script('corpbiz-slider','slider_settings',$current_options);
wp_enqueue_script('corpbiz-slider');
if($current_options['home_banner_enabled'] == true) {  ?>
<div id="main-header">
	<div class="row"><div class="slide_star_seperate"></div></div>
	<?php
			if($current_options['slider_radio']=='demo')
			{
			$query_args =''; ?>
	<div class="flexslider et_slider_auto et_slider_speed_7000" id="featured">		
		<ul class="slides">
			<li class="slide flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; display: list-item;">
				<h2><a href="#"><?php _e('Flexible Responsive','corpbiz'); ?></a></h2><br/>
				<div class="description"><?php _e('Multi-Purpose Theme','corpbiz'); ?></div>
				<a href="#">
					<img width="960" height="295" alt="Sleek Beautiful" src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/slider_1.png" />
				</a>
			</li> <!-- end .slide -->				
			<li class="slide" style="width: 100%; float: left; margin-right: -100%; position: relative; display: none;">
				<h2><a href="#"><?php _e('Clean Elegant','corpbiz'); ?></a></h2><br/>
				<div class="description"><?php _e('Multi-Purpose Theme','corpbiz'); ?></div>
				<a href="#">
					<img width="960" height="295" alt="Sleek Beautiful" src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/slider_2.png" />
				</a>
			</li> <!-- end .slide -->	
			<li class="slide" style="width: 100%; float: left; margin-right: -100%; position: relative; display: none;">
				<h2><a href="#"><?php _e('Clean Elegant','corpbiz'); ?></a></h2><br/>
				<div class="description"><?php _e('Multi-Purpose Theme','corpbiz'); ?></div>
				<a href="#">
					<img width="960" height="295" alt="Sleek Beautiful" src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/slider_3.png" />
				</a>
			</li> <!-- end .slide -->
		</ul>
		<ul class="flex-direction-nav">
			<li><a href="#" class="flex-prev"></a></li>
			<li><a href="#" class="flex-next"></a></li>
		</ul>
	</div>
	<?php }
		else if($current_options['slider_radio']=='image')
		{
		$k=true;
		$query_args =''; ?>
		<div class="flexslider et_slider_auto et_slider_speed_7000" id="featured">		
			<?php if($current_options['slider_list']){ ?>
			<ul class="slides">
				<?php foreach($current_options['slider_list'] as $slider_list)
					  {
					  if($slider_list['slider_image_url'] != '' ) { ?>
				<li class="slide" style="width: 100%; float: left; margin-right: -100%; position: relative; display: none;">
					<div class="flex-slider-center">
					<?php if($slider_list['slider_title'] != '' ) { ?>
						<h2><a href="#"><?php _e('Clean Elegant','corpbiz'); ?></a></h2><br/>
						<?php }
						if($slider_list['slider_title_one'] != '' ) {?>
						<div class="description"><?php echo esc_html($slider_list['slider_title_one']); ?></div>
						<?php } ?>
						<img <?php if($slider_list['slider_title'] !='' ) { echo esc_html($slider_list['slider_title']); } ?> class="img-responsive" src="<?php echo esc_url($slider_list['slider_image_url']); ?>">
                    </div>
				</li>	
				<?php } } ?>
				</ul>
				<?php } ?>
	</div>
		<?php } 
			else if($current_options['slider_radio']=='post')
			{
				$featured_slider_post=$current_options['featured_slider_post'];
				$featured_slider_post=explode(',',$featured_slider_post);
				$query_args =array( 'post_type' => 'post', 'post__in' =>$featured_slider_post,'ignore_sticky_posts' => 1 );
				
			}
			else if($current_options['slider_radio']=='category')
			{
				//$slider_select_category=$current_options['slider_select_category'];
				//$slider_select_category= substr_replace($slider_select_category, '',-1);
				$query_args =array( 'category__in' =>$current_options['slider_select_category'],'ignore_sticky_posts' => 1 );
			} 
			$the_query = new WP_Query($query_args);
			?>
		<div class="flexslider et_slider_auto et_slider_speed_7000" id="featured">		
		<ul class="slides">
		<?php
			if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
			 ?>
			<li class="slide flex-active-slide">
				<div><h2><?php the_title();?></h2></div>
				<div class="description"><?php the_content(); ?></div>
				<a href="#">
					<?php $default_arg =array('class' => "img-responsive"); 
					if(has_post_thumbnail()):  the_post_thumbnail('', $default_arg);  
					endif; ?>
				</a>
			</li> <!-- end .slide -->	
			<?php } wp_reset_postdata(); } ?>			
		</ul>
		<ul class="flex-direction-nav">
			<li><a href="#" class="flex-prev"></a></li>
			<li><a href="#" class="flex-next"></a></li>
		</ul>
	</div>		
</div>
<?php } ?>