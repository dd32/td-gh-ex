
<?php 

    $staff_section_cat  = get_theme_mod('bakes_and_cakes_staff_section_cat');
    $staff_page         = get_theme_mod('bakes_and_cakes_staff_page');
    
    echo '<div class="container">';
    if($staff_page){
        $page_qry = new WP_Query(array(   
		   'post_type' => 'page',
	       'p' => $staff_page,
		));
			
		if($page_qry->have_posts()){
		    while($page_qry->have_posts()){ $page_qry->the_post(); 
				echo '<header class="header">';
				  echo '<h1 class="main-title">';
				    the_title();
				  echo '</h1>';
				    the_excerpt();
				echo '</header>';
		    }
		}
	        wp_reset_postdata();
    }
        if($staff_section_cat){

        $staff_qry = new WP_Query( array( 'cat' => $staff_section_cat, 'posts_per_page' => -1, 'ignore_sticky_posts'   => true ) );
            
            if( $staff_qry->have_posts() ){
	 
			echo '<div id="staff-slider" class="flexslider">';
				echo '<ul class="slides">';
                    while($staff_qry->have_posts()){ $staff_qry-> the_post();
					echo '<li>';
						echo '<div class="holder">';
						if(has_post_thumbnail()){
							echo '<div class="img-holder">';
							the_post_thumbnail('bakes-and-cakes-staff-thumb');
							echo '</div>';
						}
							echo '<div class="text-holder">';
								echo '<strong class="name">';
								the_title();
								echo '</strong>';
								echo '<p>';
							      the_content();
								echo '</p>';
							echo '</div>';
						echo '</div>';
					echo '</li>';
                 }
				echo'</ul>';
			echo '</div>';
			echo '<div id="carousel" class="flexslider">';
				echo '<ul class="slides">';
				    while($staff_qry->have_posts()){
                    	$staff_qry-> the_post();
							if(has_post_thumbnail()){
								echo '<li>';
								the_post_thumbnail();
								echo '</li>';
							}
				    }
	    			 /*items mirrored twice, total of 12*/ 
	  			echo '</ul>';
			echo '</div>';
		}
		 } 
		echo '</div>';
		?>
