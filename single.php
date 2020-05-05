<?php
/**
 * Displaying all single posts.
 * @package Academic Education
 */

get_header(); ?>

<?php do_action( 'academic_education_single_header' ); ?>

<div class="container">
	<main id="main" role="main" class="content-with-sidebar">
	    <div class="wrapper">
		    <?php
  	        $academic_education_layout = get_theme_mod( 'academic_education_theme_options','Right Sidebar');
  	        if($academic_education_layout == 'One Column'){?>
  	 	     	<div class="singlebox" class="main-content">
					<?php while ( have_posts() ) : the_post(); 
						get_template_part( 'template-parts/post/single-post');
	        	    endwhile; // end of the loop. ?>
	       		</div>
			<?php }else if($academic_education_layout == 'Three Columns'){?>
	   			<div class="row">
			    	<div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
			       	<div class="col-lg-6 col-md-6 singlebox" class="main-content">
						<?php while ( have_posts() ) : the_post(); 
							get_template_part( 'template-parts/post/single-post');
			            endwhile; // end of the loop. ?>
			       	</div>
					<div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
				</div>
			<?php }else if($academic_education_layout == 'Four Columns'){?>
				<div class="row">
	 			   	<div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-2'); ?></div>
	   		    	<div class="col-lg-3 col-md-3 singlebox" class="main-content">
						<?php while ( have_posts() ) : the_post(); 
						get_template_part( 'template-parts/post/single-post');
	          	 		 endwhile; // end of the loop. ?>
	       			</div>
					<div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-2'); ?></div>
					<div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-3'); ?></div>
				</div>
			<?php }else if($academic_education_layout == 'Right Sidebar'){?>
				<div class="row">
       				<div class="col-lg-8 col-md-8 singlebox" class="main-content">
						<?php while ( have_posts() ) : the_post(); 
						get_template_part( 'template-parts/post/single-post');
        			    endwhile; // end of the loop. ?>
       				</div>
					<div class="col-lg-4 col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
				</div>
			<?php }else if($academic_education_layout == 'Left Sidebar'){?>
				<div class="row">
   					<div class="col-lg-4 col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
					<div class="col-lg-8 col-md-8 singlebox" class="main-content">
						<?php while ( have_posts() ) : the_post(); 
						get_template_part( 'template-parts/post/single-post');
            			endwhile; // end of the loop. ?>
       				</div>
   				</div>
			<?php }else if($academic_education_layout == 'Grid Layout'){?>
				<div class="row">
    			   	<div class="col-lg-8 col-md-8 singlebox" class="main-content">
						<?php while ( have_posts() ) : the_post(); 
						get_template_part( 'template-parts/post/single-post');
        				endwhile; // end of the loop. ?>
       				</div>
					<div class="col-lg-4 col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
				</div>
			<?php }else {?>
				<div class="row">
       				<div class="col-lg-8 col-md-8 singlebox" class="main-content">
						<?php while ( have_posts() ) : the_post(); 
						get_template_part( 'template-parts/post/single-post');
         			   endwhile; // end of the loop. ?>
      			 	</div>
					<div class="col-lg-4 col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
				</div>
			<?php } ?>
        	<div class="clearfix"></div>
	    </div>
    </main> 
</div>

<?php do_action( 'academic_education_single_footer' ); ?>

<?php get_footer(); ?>