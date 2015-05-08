<?php
	/**
	* Template Name: Contact
	*/
	
	get_header();
	$contact_sidebar 	= get_post_meta($post->ID,'_contact_sidebar',true); 
	$page_layout_style 	= get_post_meta($post->ID,'themeofwp_layout_style',true); 
	$theme_layout 		= themeofwp_option(''.$shortname.'_theme_layout');
	
	if ( $contact_sidebar=='left' || $contact_sidebar=='right' || themeofwp_option(''.$shortname.'_contact_sidebar')=='left' || themeofwp_option(''.$shortname.'_contact_sidebar')=='right' || $work_sidebar=='none') {
	$col = 'col-md-9';
	}
	
	if ( $contact_sidebar=='nosidebar' || themeofwp_option(''.$shortname.'_contact_sidebar')=='nosidebar') {	
	$col= 'col-md-12';
	}	
?>

<!--/.theme-layout-start-->
<?php echo themeofwp_layout() ;?>

	<!--/#page-->
	<section id="contact-us">
		
		<!--/.container -->
		<div class="<?php if ( $page_layout_style=='boxed' ) : ?>container-fluid<?php endif; ?><?php if ( $page_layout_style=='fullwidth' ) : ?>container<?php endif; ?><?php if($theme_layout=='boxed' && $page_layout_style==''){ ?>container-fluid<?php } ?><?php if($theme_layout=='fullwidth' && $page_layout_style==''){ ?>container<?php } ?>">
		
			<!--/.row -->
			<div class="row">
	
				<?php if($contact_sidebar=='none' || $contact_sidebar==''){ ?>
					<!-- sidebar left -->	
						<?php if(themeofwp_option(''.$shortname.'_contact_sidebar')=='left'){ ?>
							<?php get_template_part( 'sidebar', 'contact' ); ?>
						<?php } ?>
						
					<?php } else { ?>
					
						<?php if($contact_sidebar=='none' || $contact_sidebar=='left'){ ?>
							<?php get_template_part( 'sidebar', 'contact' ); ?>
						<?php } ?>
					<!-- sidebar left -->
				<?php } ?>
				        
				<!--/#content-->
                <div id="content" class="site-content <?php echo $col; ?>" role="main">
				
					<?php if ( have_posts() ) { ?>
					<?php while ( have_posts() ) { the_post(); ?>
					
                    <header class="entry-header">
                        <h4 class="entry-title">
                            <?php the_title(); ?> <?php edit_post_link( __( ' - <i class="fa fa-pencil"></i> Edit - ', themeofwp ), '<small class="edit-link">', '</small><div class="clearfix"></div>' ); ?>
                        </h4>
                    </header>

                     <div class="row">
						<div class="col-lg-12">
							<?php the_content(); ?>    
						</div>
                    </div>
					
					<?php } ?>
					<?php } else { ?>
					<?php } ?>
                       
                </div>
				<!--/#content-->
					
				<?php if($contact_sidebar=='none' || $contact_sidebar==''){ ?>
					<!-- sidebar right -->	
						<?php if(themeofwp_option(''.$shortname.'_contact_sidebar')=='right'){ ?>
							<?php get_template_part( 'sidebar', 'contact' ); ?>
						<?php } ?>
						
					<?php } else { ?>
					
						<?php if($contact_sidebar=='none' || $contact_sidebar=='right'){ ?>
							<?php get_template_part( 'sidebar', 'contact' ); ?>
						<?php } ?>
					<!-- sidebar right -->
				<?php } ?>
								
			</div><!--/.row -->
		
		</div><!--/.container -->
	
	</section><!--/#page-->
	
</div><!--/.theme-layout-end-->

<?php get_footer();