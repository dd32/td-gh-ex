<?php
/**
 * Displaying all single posts.
 * @package Academic Education
 */

get_header(); ?>

<?php do_action( 'academic_education_single_header' ); ?>

<div class="container">
    <div class="wrapper">
	    <?php
	        $layout = get_theme_mod( 'academic_education_theme_options','Right Sidebar');
	        if($layout == 'One Column'){?>
	        	<div class="singlebox" id="main-content">
					<?php while ( have_posts() ) : the_post(); ?>
						<h1><?php the_title();?></h1>
						<div class="adminbox">
							<i class="fas fa-calendar-alt"></i><span><?php echo esc_html( get_the_date() ); ?></span>
							<i class="fas fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
							<i class="fas fa-comments"></i><span class="entry-comments"> <?php comments_number( __('0 Comment', 'academic-education'), __('0 Comments', 'academic-education'), __('% Comments', 'academic-education') ); ?> </span>
						</div>
						<?php if(has_post_thumbnail()) { ?>
							<hr>
							<div class="feature-box">	
								<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
							</div>
							<hr>
						<?php } 
						the_content();

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'academic-education' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'academic-education' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
							
						if ( is_singular( 'attachment' ) ) {
							// Parent post navigation.
							the_post_navigation( array(
								'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'academic-education' ),
							) );
						} elseif ( is_singular( 'post' ) ) {
							// Previous/next post navigation.
							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next page', 'academic-education' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'academic-education' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous page', 'academic-education' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'academic-education' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) );
						}
		                
		                echo '<div class="clearfix"></div>';
		                
						the_tags();

						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
		                ?>
						<?php edit_post_link( __( 'Edit', 'academic-education' ), '<span class="edit-link">', '</span>' ); ?>
		            <?php endwhile; // end of the loop. ?>
		       	</div>
		    <?php }else if($layout == 'Three Columns'){?>
		   		<div class="row">
			    	<div class="col-md-3 col-sm-3" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
			       	<div class="col-md-6 col-sm-6 singlebox" id="main-content">
						<?php while ( have_posts() ) : the_post(); ?>
							<h1><?php the_title();?></h1>
							<div class="adminbox">
								<i class="fas fa-calendar-alt"></i><span><?php echo esc_html( get_the_date() ); ?></span>
								<i class="fas fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
								<i class="fas fa-comments"></i><span class="entry-comments"> <?php comments_number( __('0 Comment', 'academic-education'), __('0 Comments', 'academic-education'), __('% Comments', 'academic-education') ); ?> </span>
							</div>
							<?php if(has_post_thumbnail()) { ?>
								<hr>
								<div class="feature-box">	
									<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
								</div>
								<hr>					
							<?php } 
							the_content();

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'academic-education' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'academic-education' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );
								
							if ( is_singular( 'attachment' ) ) {
								// Parent post navigation.
								the_post_navigation( array(
									'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'academic-education' ),
								) );
							} elseif ( is_singular( 'post' ) ) {
								// Previous/next post navigation.
								the_post_navigation( array(
									'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next page', 'academic-education' ) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Next post:', 'academic-education' ) . '</span> ' .
										'<span class="post-title">%title</span>',
									'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous page', 'academic-education' ) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Previous post:', 'academic-education' ) . '</span> ' .
										'<span class="post-title">%title</span>',
								) );
							}
			                
			                echo '<div class="clearfix"></div>';
			                
							the_tags(); 

							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
			                ?>
							<?php edit_post_link( __( 'Edit', 'academic-education' ), '<span class="edit-link">', '</span>' ); ?>
			            <?php endwhile; // end of the loop. ?>
			       	</div>
					<div class="col-md-3 col-sm-3" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
				</div>
			<?php }else if($layout == 'Four Columns'){?>
				<div class="row">
			    	<div class="col-md-3 col-sm-3" id="sidebar"><?php dynamic_sidebar('sidebar-2'); ?></div>
			       	<div class="col-md-3 col-sm-3 singlebox" id="main-content">
						<?php while ( have_posts() ) : the_post(); ?>
							<h1><?php the_title();?></h1>
							<div class="adminbox">
								<i class="fas fa-calendar-alt"></i><span><?php echo esc_html( get_the_date() ); ?></span>
								<i class="fas fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
								<i class="fas fa-comments"></i><span class="entry-comments"> <?php comments_number( __('0 Comment', 'academic-education'), __('0 Comments', 'academic-education'), __('% Comments', 'academic-education') ); ?> </span>
							</div>
							<?php if(has_post_thumbnail()) { ?>
								<hr>
								<div class="feature-box">	
									<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
								</div>
								<hr>					
							<?php } 
							the_content();

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'academic-education' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'academic-education' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );
								
							if ( is_singular( 'attachment' ) ) {
								// Parent post navigation.
								the_post_navigation( array(
									'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'academic-education' ),
								) );
							} elseif ( is_singular( 'post' ) ) {
								// Previous/next post navigation.
								the_post_navigation( array(
									'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next page', 'academic-education' ) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Next post:', 'academic-education' ) . '</span> ' .
										'<span class="post-title">%title</span>',
									'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous page', 'academic-education' ) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Previous post:', 'academic-education' ) . '</span> ' .
										'<span class="post-title">%title</span>',
								) );
							}
			                
			                echo '<div class="clearfix"></div>';
			                
							the_tags(); 

							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
			                ?>
							<?php edit_post_link( __( 'Edit', 'academic-education' ), '<span class="edit-link">', '</span>' ); ?>
			            <?php endwhile; // end of the loop. ?>
			       	</div>
					<div class="col-md-3 col-sm-3" id="sidebar"><?php dynamic_sidebar('sidebar-2'); ?></div>
					<div class="col-md-3 col-sm-3" id="sidebar"><?php dynamic_sidebar('sidebar-3'); ?></div>
				</div>
       		<?php }else if($layout == 'Right Sidebar'){?>
       			<div class="row">
			       	<div class="col-md-8 col-sm-8 singlebox" id="main-content">
						<?php while ( have_posts() ) : the_post(); ?>
							<h1><?php the_title();?></h1>
							<div class="adminbox">
								<i class="fas fa-calendar-alt"></i><span><?php echo esc_html( get_the_date() ); ?></span>
								<i class="fas fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
								<i class="fas fa-comments"></i><span class="entry-comments"> <?php comments_number( __('0 Comment', 'academic-education'), __('0 Comments', 'academic-education'), __('% Comments', 'academic-education') ); ?> </span>
							</div>
							<?php if(has_post_thumbnail()) { ?>
								<hr>
								<div class="feature-box">	
									<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
								</div>
								<hr>
							<?php } 
							the_content();

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'academic-education' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'academic-education' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );
								
							if ( is_singular( 'attachment' ) ) {
								// Parent post navigation.
								the_post_navigation( array(
									'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'academic-education' ),
								) );
							} elseif ( is_singular( 'post' ) ) {
								// Previous/next post navigation.
								the_post_navigation( array(
									'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next page', 'academic-education' ) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Next post:', 'academic-education' ) . '</span> ' .
										'<span class="post-title">%title</span>',
									'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous page', 'academic-education' ) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Previous post:', 'academic-education' ) . '</span> ' .
										'<span class="post-title">%title</span>',
								) );
							}
			                
			                echo '<div class="clearfix"></div>';
			                
							the_tags(); 

							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
			                ?>
							<?php edit_post_link( __( 'Edit', 'academic-education' ), '<span class="edit-link">', '</span>' ); ?>
			            <?php endwhile; // end of the loop. ?>
			       	</div>
					<div class="col-md-4 col-sm-4" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
				</div>
			<?php }else if($layout == 'One Column'){?>
				<div class="row">
		       		<div class="col-md-4 col-sm-4" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
					<div class="col-md-8 col-sm-8 singlebox" id="main-content">
						<?php while ( have_posts() ) : the_post(); ?>
							<h1><?php the_title();?></h1>
							<div class="adminbox">
								<i class="fas fa-calendar-alt"></i><span><?php echo esc_html( get_the_date() ); ?></span>
								<i class="fas fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
								<i class="fas fa-comments"></i><span class="entry-comments"> <?php comments_number( __('0 Comment', 'academic-education'), __('0 Comments', 'academic-education'), __('% Comments', 'academic-education') ); ?> </span>
							</div>
							<?php if(has_post_thumbnail()) { ?>
								<hr>
								<div class="feature-box">	
									<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
								</div>
								<hr>
							<?php } 
							the_content();

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'academic-education' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'academic-education' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );
								
							if ( is_singular( 'attachment' ) ) {
								// Parent post navigation.
								the_post_navigation( array(
									'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'academic-education' ),
								) );
							} elseif ( is_singular( 'post' ) ) {
								// Previous/next post navigation.
								the_post_navigation( array(
									'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next page', 'academic-education' ) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Next post:', 'academic-education' ) . '</span> ' .
										'<span class="post-title">%title</span>',
									'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous page', 'academic-education' ) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Previous post:', 'academic-education' ) . '</span> ' .
										'<span class="post-title">%title</span>',
								) );
							}
			                
			                echo '<div class="clearfix"></div>';
			                
							the_tags(); 

							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
			                ?>
							<?php edit_post_link( __( 'Edit', 'academic-education' ), '<span class="edit-link">', '</span>' ); ?>
			            <?php endwhile; // end of the loop. ?>
			       	</div>
			    </div>
			<?php }else if($layout == 'Grid Layout'){?>
				<div class="row">
			       	<div class="col-md-8 col-sm-8 singlebox" id="main-content">
						<?php while ( have_posts() ) : the_post(); ?>
							<h1><?php the_title();?></h1>
							<div class="adminbox">
								<i class="fas fa-calendar-alt"></i><span><?php echo esc_html( get_the_date() ); ?></span>
								<i class="fas fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
								<i class="fas fa-comments"></i><span class="entry-comments"> <?php comments_number( __('0 Comment', 'academic-education'), __('0 Comments', 'academic-education'), __('% Comments', 'academic-education') ); ?> </span>
							</div>
							<?php if(has_post_thumbnail()) { ?>
								<hr>
								<div class="feature-box">	
									<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
								</div>
								<hr>					
							<?php } 
							the_content();

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'academic-education' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'academic-education' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );
								
							if ( is_singular( 'attachment' ) ) {
								// Parent post navigation.
								the_post_navigation( array(
									'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'academic-education' ),
								) );
							} elseif ( is_singular( 'post' ) ) {
								// Previous/next post navigation.
								the_post_navigation( array(
									'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next page', 'academic-education' ) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Next post:', 'academic-education' ) . '</span> ' .
										'<span class="post-title">%title</span>',
									'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous page', 'academic-education' ) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Previous post:', 'academic-education' ) . '</span> ' .
										'<span class="post-title">%title</span>',
								) );
							}
			                
			                echo '<div class="clearfix"></div>';
			                
							the_tags(); 

							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
			                ?>
							<?php edit_post_link( __( 'Edit', 'academic-education' ), '<span class="edit-link">', '</span>' ); ?>
			            <?php endwhile; // end of the loop. ?>
			       	</div>
					<div class="col-md-4 col-sm-4" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
				</div>
			<?php } ?>
        <div class="clearfix"></div>
    </div>
</div>

<?php do_action( 'academic_education_single_footer' ); ?>

<?php get_footer(); ?>