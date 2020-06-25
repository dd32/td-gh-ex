<?php
$rambo_pro_theme_options = rambo_theme_data_setup();
$current_options = wp_parse_args(  get_option( 'rambo_pro_theme_options', array() ), $rambo_pro_theme_options );
if( $current_options['news_enable'] == false )
{
?>
<div class="for_mobile">
<div class="container">
			<div id="rambo_recent_news_widget-3" class="rambo_post_section widget widget_rambo_recent_news_widget">
				<div class="row">
					<div class="span12">
						<div class="team_head_title">
							<?php
							 if( $current_options['latest_news_title'] != '' ) { ?> 
							<h3 class="widget-title"><?php echo esc_html($current_options['latest_news_title']);?>
							</h3>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="row">
				<?php 	$args = array( 'post_type' => 'post','posts_per_page' => 3,'post__not_in'=>get_option("sticky_posts")) ; 	
						query_posts( $args );
						if(query_posts( $args ))
					{	
						while(have_posts()):the_post();
					{ 
				?>				
			    <div class="span4 latest_news_section">		
				<?php $defalt_arg =array('class' => "img-responsive latest_news_img");?>
					<?php if(has_post_thumbnail()){ ?>
						<a href="<?php the_permalink(); ?>" >
						<?php the_post_thumbnail('',$defalt_arg);?></a>
						<?php } ?>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
					<p><?php  echo get_the_excerpt(); ?></p>

					<div class="latest_news_comment">
						<span class="pull-left"><i class="fa fa-calendar icon-spacing"></i><a href="<?php echo esc_url( home_url('/') ); ?><?php echo esc_html(date( 'Y/m' , strtotime( get_the_date() )) ); ?>"><?php echo esc_html(get_the_date());?></a></span>
						<span class="pull-right"><i class="fa fa-comment icon-spacing"></i><a href="<?php comments_link(); ?>"><?php echo esc_html(get_comments_number());?></a></span>
					</div>
				</div>
					<?php } endwhile; } ?>
				</div>
			</div>	
</div>	
</div>
<?php } ?>
<!-- /Latest News Section -->	