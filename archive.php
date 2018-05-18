<?php
/**
 * The template for displaying archive pages
 *
 * @package WordPress
 * @subpackage Admela
 * @since Admela 1.0
 */

get_header(); 

echo '<main id="admela_maincontent" class="admela_maincontent">';
 
?>

<div class="admela_contentarea">

<div class="admela_contentlist">
  
  <div class="admela_contentlistmain">
			<header class="admela_archiveheader">
			<?php   
				the_archive_title( '<h1 class="admela_archivetitle">', '</h1>' );
				the_archive_description( '<div class="admela_taxonomydescription">', '</div>' );
			?>
			</header>
		<!-- .archive-header -->
    
        <?php
		if(is_author()):	
        
			echo'<div class="admela_authorpg">';		
        
				get_template_part( 'author','bio' );
		
			echo'</div>';
		
		endif;
		?>
		<div class="admela_contentlistinner">
	      
        <?php
						
        if ( have_posts() ) : 
		
		    $admela_bylineck = admela_get_option('admela_ebylfp');
		
		   
		
			//Start the loop.
			while ( have_posts() ) : the_post();
			
		
				/*
				 * Include the Post-Format-specific template for the content.			
				 */
				 
				get_template_part( 'content' );
				               
			    // End the loop.
			    endwhile;			

			    // If no content, include the "No posts found" template.
			    else :
		
			    echo '<p class="admela_searchpst">';
					esc_html_e('Sorry No Posts Were Found','admela');	
				echo '</p>';			

			    endif;
										
			    admela_paging_nav(); // admela-pagination
				
			?>
  </div>
  </div>
  <!-- .content-area-inner -->


</div>
  
<!-- .content-area -->

<div class="admela_primarycontentarea">


        <?php
		

		get_sidebar('right'); // Theme Right Sidebar

		?>
</div>

</div>

<?php 

echo '</main>';  //site-main 

get_footer(); 

 
 
