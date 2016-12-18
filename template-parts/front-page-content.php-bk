<?php 
	get_header();	
	$homepage_banner_img_deault = get_stylesheet_directory_uri().'/images/banner1.jpg';
?>

        <section class="ct_section ct_section_slider">
            <div id="carousel-acool-generic" class="carousel slide" data-ride="carousel" data-interval="5000" >
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="<?php echo esc_url(acool_get_option( 'ct_acool','homepage_banner_img',$homepage_banner_img_deault));?> "  width="100%"/>
                        <div class="carousel-caption">
                        <h1><?php echo esc_html(acool_get_option( 'ct_acool','homepage_banner_text_h1',__( 'The jQuery slider that just slides.', 'acool' )) );?></h1><p class="ct_slider_text"><?php echo esc_html(acool_get_option( 'ct_acool','homepage_banner_text',__( 'No fancy effects or unnecessary markup.', 'acool' )) );?></p><a class="btn" href="<?php echo esc_url(acool_get_option( 'ct_acool','homepage_banner_button_url','#') );?>"><?php echo esc_html(acool_get_option( 'ct_acool','homepage_banner_button_text',__( 'Download', 'acool' )) );?></a>                       
                        </div>
                    </div>
                </div>
            </div>
        </section>

<div id="ct_content" class="ct_acool_content">   
	<style>
section#section-id-580caf4c1638f h2{color:#3b3b3b; text-transform:uppercase;}section#section-id-580caf4c1638f,section#section-id-580caf4c1638f h3,section#section-id-580caf4c1638f,section#section-id-580caf4c1638f .casems{color:#333333;}			
			
.ct_section_post_list_2{ padding:50px 0;} 	
	
.ct_section_post_list_2 .ct_vertical_column{ margin:0 2%;} 			
.ct_section_post_list_2 .ct_post_img a:hover .meta{ width:96%; margin-left:2%;}	

.ct_section_post_list_2 .ct_post_more .casems {    color: inherit;}	
.ct_section_post_list_2 .ct_post_more a.casems:hover{ color: inherit;}
.ct_section_post_list_2 .post-meta-2{ font-size:0.9em; margin-bottom:10px;}
</style>
  
        <section id="section-id-580caf4c1638f" class="ct_section ct_section_post_list_2 " style=" background-color:rgba(255,255,255,1);-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;background-size:100% 100%;">
			<div class="container "> 
				<?php
					$homepage_post_list_h1 = acool_get_option( 'ct_acool','homepage_post_list_h1',__('Blog posts', 'acool'));					
					$homepage_post_list_text = acool_get_option( 'ct_acool','homepage_post_list_text', __('Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere.', 'acool'));						
				?>	
              <div class="ct_section_title">
                  <h2><?php echo $homepage_post_list_h1;?></h2>
                  <h3><?php echo $homepage_post_list_text;?></h3> 
              </div>
					
								
				<div class="row most">
                <?php 
					global $wpdb;//ignore_sticky_posts //caller_get_posts 3.1 del
					
					$post_list_num = acool_get_option( 'ct_acool','homepage_post_list_num',6);
					$post_list_cat = acool_get_option( 'ct_acool','post_list_cat','uncategorized');
				
                    query_posts( array( 
					'showposts' => $post_list_num ,//6
					'ignore_sticky_posts' => 1,
					'category_name' => $post_list_cat,
					
					 ));
					 
                    if (have_posts()) :  while (have_posts()) : the_post();                             
                ?> 
                    <div class="col-xs-12 col-sm-4 ct_clear_margin_padding"> 
              			<div class="col-md-12  ct_clear_margin_padding">
                            <div id="post-3420" class="ct_vertical_column ct_clear_margin_padding">
                                <div class="ct_post_img">
                                    <a href="<?php the_permalink(); ?>">
                                    <?php
                                            $exclude_id = get_the_ID();
                                            $thumb_array = acool_get_thumbnail($exclude_id);
                                    ?>
                                            <img src="<?php echo $thumb_array['fullpath'];?>" />
                                    
                                        <div class="meta">
                                            <span class="glyphicon glyphicon-search ct_search_icon" ></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>


						<div class="col-md-12">
                            <div class="ct_post_info">
                                <h3><?php the_title(); ?></h3>
                                <p class="post-meta-2"><i class="fa fa-calendar-times-o" aria-hidden="true"></i> <?php the_time('M d, y');?></p>   
                                <?php the_excerpt();?>                   
                            </div>
                        </div>
                    </div><!--div class="ct_row ct_clear_margin_padding"-->
                <?php endwhile; endif; ?>                             
               
                </div>					
                
                <div class="ct_post_more">
                    <a href="<?php $post_list_link =  esc_url(acool_get_option( 'ct_acool','homepage_blog_url',''));if($post_list_link == ''){echo esc_url(home_url('/')).'blog/'; }else{echo $post_list_link;} ?>" class="casems"><span>MORE</span><i></i></a>
                </div>
                
			</div>
		</section>                
	</div>




<div id="ct_content" class="ct_acool_content">   
	<style>
			section#section-id-580cd4a22d44f h2{color:#3b3b3b; text-transform:uppercase;}section#section-id-580cd4a22d44f,section#section-id-580cd4a22d44f h3,section#section-id-580cd4a22d44f,section#section-id-580cd4a22d44f .casems{color:#333333;}			
			
.ct_section_contact_us{ padding:50px 0;} 	
	
/*css for contact form*/
.section_text {
	padding-bottom: 30px;
}

.contact-area {
margin: 0 auto;
width: 100%;
max-width: 500px;
text-align: center;
overflow: hidden;
}
.contact-form {
margin: 0 auto;
}

.contact-form input, .contact-form select, .contact-form textarea {
	font-size: 15px;
	width: 100%;
	background-color: rgba(0,200,242,0.02);
	border: 1px solid #0094B3;
	padding: 7px;
	overflow: hidden;
	margin-bottom: 30px;
}

input:invalid {
	box-shadow: none;
	background-color:rgba(0,200,242,0.17);
}

.noticefailed {
    color:#FF0000;
}
.noticesuccess {
    color:#009F00;
}
#submit{ color:#000;}
.ct_google_map{ border:solid 1px #DEDEDE;}
</style>
 
	<section id="section-id-580cd4a22d44f" class="ct_section ct_section_contact_us " style=" background-color:rgba(233,232,230,1);-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;background-size:100% 100%;">
		<div class="container "> 

				<?php
					$homepage_contact_ust_h1 = acool_get_option( 'ct_acool','homepage_contact_ust_h1',__('Contact Us', 'acool'));					
					$homepage_contact_us_text = acool_get_option( 'ct_acool','homepage_contact_us_text', __('Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere.', 'acool'));	
					
					$homepage_contact_us_email = acool_get_option( 'ct_acool','homepage_contact_us_email', get_bloginfo( 'admin_email'));						
					$google_maps = acool_get_option( 'ct_acool','google_maps','!1m18!1m12!1m3!1d3058.276857292534!2d-75.2014636841563!3d39.95756237942114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c6c656420e77d1%3A0x904100f3a0d41015!2s3852+Filbert+St%2C+Philadelphia%2C+PA+19104!5e0!3m2!1sen!2sus!4v1477039414870');											
				?>				
              
			<div class="ct_section_title">
					<h2><?php echo $homepage_contact_ust_h1;?></h2>
					<h3><?php echo $homepage_contact_us_text;?></h3> 
			</div>
            
			<div class="row">
          		<div class="col-md-6 ct_google_map">
                    <iframe src="https://www.google.com/maps/embed?pb=<?php echo $google_maps;?>" width="100%" height="360" frameborder="0" style="border:0" allowfullscreen=""></iframe>
				</div>
                
                <div class="col-md-6">
               		<div class="acool_contact_form">
                        <div class="contact-area">
                            <form class="contact-form" action="" method="post">
                                <input id="name" tabindex="1" name="name" size="22" type="text" value="" placeholder="Name">
                                <input id="email" tabindex="2" name="email" size="22" type="email" value="" placeholder="Email">
                                <textarea id="message" tabindex="4" cols="39" name="x-message" rows="7" placeholder="Message"></textarea>
                                <input id="sendto" name="sendto" type="hidden" value="<?php echo $homepage_contact_us_email;?>">
                                <input id="submit" name="submit" type="button" value="Post">
                            </form>
             			</div>
					</div><!--div class="acool_contact_form"-->
				</div>
            </div><!--div class="row"-->
                
		</div><!--div class="container -->

	</section>                
    </div>
<?php get_footer(); ?>