<?php
/**
 * The template for displaying home page.
 *
 * Template Name: Custom Home Page
 *
 * @package Advance Blogging
 */
get_header(); ?>

<?php do_action( 'advance_blogging_above_slider' ); ?>

<main id="main" role="main">
	<section id="slider">
		<div class="container-fluid">
			<div class="row m-0">
				<div class="col-lg-8 col-md-8 p-0">
					<?php if( get_theme_mod('advance_blogging_slider_arrows') != ''){?>
						<div class="slider">
						  	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod( 'advance_blogging_slider_speed',3000)) ?>"> 
							    <?php $advance_blogging_slider_pages = array();
							      for ( $count = 1; $count <= 4; $count++ ) {
							        $mod = intval( get_theme_mod( 'advance_blogging_slider_page' . $count ));
							        if ( 'page-none-selected' != $mod ) {
							          $advance_blogging_slider_pages[] = $mod;
							        }
							      }
							      if( !empty($advance_blogging_slider_pages) ) :
							        $args = array(
							          'post_type' => 'page',
							          'post__in' => $advance_blogging_slider_pages,
							          'orderby' => 'post__in'
							        );
							        $query = new WP_Query( $args );
							        if ( $query->have_posts() ) :
							          $i = 1;
							    ?>
							    <div class="carousel-inner" role="listbox">
							      <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
							        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
							            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>
		          				        <div class="carousel-caption">
								            <div class="inner_carousel">
								            	<?php if( get_theme_mod('advance_blogging_slider_title',true) != ''){ ?>
								            		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h1>
								            	<?php }?>
								                <?php if( get_theme_mod('advance_blogging_slider_content',true) != ''){ ?>
								                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_blogging_string_limit_words( $excerpt,esc_attr(get_theme_mod('advance_blogging_slider_excerpt','35')) ) ); ?></p>
								                <?php }?>
								            </div>
								        </div>
							        </div>
							      <?php $i++; endwhile; 
							      wp_reset_postdata();?>
							    </div>
							    <?php else : ?>
							        <div class="no-postfound"></div>
							    <?php endif;
							    endif;?>
							    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		      						<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Previous','advance-blogging' );?></span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		      						<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Next','advance-blogging' );?></span>
		   						</a>
						  	</div>  	
						</div>	
					<?php }?>	
				</div>
				<div class="col-lg-4 col-md-4 p-0">
					<?php if( get_theme_mod('advance_blogging_blogcategory_setting') != ''){?>
						<div class="cat-post">
							<?php 
							$advance_blogging_catData = get_theme_mod('advance_blogging_blogcategory_setting');
				            if($advance_blogging_catData){              
				                $page_query = new WP_Query(array( 'category_name' => esc_html( $advance_blogging_catData ,'advance-blogging')));?>
				              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
				              	<div class="abt-img-box">   
			                      	<?php the_post_thumbnail(); ?>
			                      	<div class="cat-box">
			                      		<div class="cat-border">
				                       		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
				                      		<p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_blogging_string_limit_words( $excerpt,18 ) ); ?></p>
				                      	</div>
			                      	</div>
			                    </div>
				              <?php endwhile;
				              wp_reset_postdata();
				            } ?>
			        	</div>
			        <?php }?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</section>

	<?php do_action( 'advance_blogging_below_slider' ); ?>

	<section id="latest">
		<div class="container">	
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<div class="row">
						<?php 
						$advance_blogging_catData = get_theme_mod('advance_blogging_latest_post_setting');
			            if($advance_blogging_catData){              
			                $page_query = new WP_Query(array( 'category_name' => esc_html( $advance_blogging_catData ,'advance-blogging')));?>
			              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
			                 	<div class="col-lg-6 col-md-6">
			                 		<div class="post-section">
					                    <div class="latest-post">
					                    	<div class="latest-img-box">
						                    	<?php if(has_post_thumbnail()) { ?>
												    <?php the_post_thumbnail();  ?>
													<div class="metabox">
													    <div class="dateday"><?php echo esc_html( get_the_date( 'd') ); ?></div>
													    <hr class="metahr m-0 p-0">
													    <div class="month"><?php echo esc_html( get_the_date( 'M' ) ); ?></div>
													    <div class="year"><?php echo esc_html( get_the_date( 'Y' ) ); ?></div>
													</div>
												<?php } ?>
											</div>
					                      	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
					                      	<p><?php the_excerpt(); ?></p>
					                    </div>
					                    <div class="button-post">
				                  			<a href="<?php echo esc_url( get_permalink() );?>" class="blog-btn" title="<?php esc_attr_e( 'READ MORE', 'advance-blogging' ); ?>"><?php esc_html_e('READ MORE','advance-blogging'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','advance-blogging' );?></span></a>
				                  		</div>
			                  		</div>
			                  	</div>
			              <?php endwhile;
			              wp_reset_postdata();
			            }?>
		        	</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div id="sidebar"><?php dynamic_sidebar('home'); ?></div>
				</div>
			</div>
		</div>
	</section>
	
	<?php do_action( 'advance_blogging_below_product_section' ); ?>

	<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>