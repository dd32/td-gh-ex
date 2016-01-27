<?php
/**
 * Blog Section
 * 
 * @package Benevolent
 */
 
 $benevolent_ed_blog_date = get_theme_mod( 'benevolent_ed_blog_date', '1' );
 $benevolent_blog_section_title = get_theme_mod( 'benevolent_blog_section_title' );
 $benevolent_blog_section_content = get_theme_mod( 'benevolent_blog_section_content' );
 $benevolent_blog_section_readmore = get_theme_mod( 'benevolent_blog_section_readmore', __( 'Read More', 'benevolent' ) );
 
 if( $benevolent_blog_section_title || $benevolent_blog_section_content ){
 ?>
    <header class="header">
    	<div class="container">
    		<div class="text">
    			<?php if( $benevolent_blog_section_title ) echo '<h2 class="main-title">' . esc_html( $benevolent_blog_section_title ) . '</h2>';
                echo wpautop( esc_html( $benevolent_blog_section_content ) );?>
    		</div>
    	</div>
    </header>
    <?php } 
    
    $blog_qry = new WP_Query( array( 
        'post_type'             => 'post',
        'post_status'           => 'publish',
        'posts_per_page'        => 3,
        'ignore_sticky_posts'   => true    
    ) );
    if( $blog_qry->have_posts() ){
    ?>    
    <div class="blog-holder">
    	<div class="container">
    		<div class="row">
    			<?php
                while( $blog_qry->have_posts() ){
                    $blog_qry->the_post();
                ?>
                <div class="columns-3">
    				<div class="post">
                        <?php if( has_post_thumbnail() ){ ?>
    					<a href="<?php the_permalink(); ?>" class="post-thumbnail"><?php the_post_thumbnail( 'benevolent-blog' ); ?></a>
                        <?php } ?>
    					<div class="text-holder">
    						<header class="entry-header">
    							<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    							<div class="entry-meta">
    								<span class="posted-on"><span class="fa fa-calendar-o"></span><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_date() ); ?></a></span>
    							</div>
    						</header>
    						<div class="entry-content">
    							<?php echo wpautop( benevolent_excerpt( get_the_content(), 100, '.', false, false ) ); ?>
    						</div>
    						<a href="<?php the_permalink(); ?>" class="readmore"><?php echo esc_html( $benevolent_blog_section_readmore ); ?></a>
    					</div>
    				</div>
    			</div>
    			<?php
                }
                wp_reset_postdata();
                ?>    			
    		</div>
    	</div>
    </div>
    <?php }