<?php 
/**
 * Content-Single  Template
 *
 *
 * @file           content-single .php
 * @package        Appointment
 * @author         Priyanshu Mittal,Shahid Mansuri and Akhilesh Nagar
 * @copyright      2013 Appointpress
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/appoinment/content-single.php
 */


?>
 <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> </div>
		           <div class="blog_row_mn">
					 <h2> <?php the_title(); ?></h2>
					  <?php if(has_post_thumbnail()):?>    
                              <a href="<?php the_permalink(); ?>"title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
                             <?php endif;?>
                       <div class="blog_con_mn"> <?php the_content(); ?> </div>
				   

                      </div><!--  blog_row_mn -->
					 <div class="pagination_blog"><ul class="page-numbers"><?php 
					 $args=array('before' => '<li>'.__('Pages:','appointment'),'after' => '</li>');
					 wp_link_pages($args); ?></ul></div>