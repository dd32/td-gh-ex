<?php
/**
 * Template Name: Contact Us
 * */
get_header();
$impressive_options = get_option( 'impressive_theme_options' );
?>
<section>
    <div class="impressive-container container">
        <div class="site-breadcumb">
            <h1><?php the_title(); ?> </h1>
            <ol class="breadcrumb breadcrumb-menubar">
                <?php if (function_exists('impressive_custom_breadcrumbs')) impressive_custom_breadcrumbs(); ?>
            </ol>
        </div>
        <div class="row contact-page">       
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-8 col-sm-6 contact-form">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>	
            <div class="col-md-4 col-sm-6">
                <div class="contact-info">
					<h3>
					<?php
						if (get_theme_mod ( 'contactus_section_title',(!empty($impressive_options['contact-info-title'])) ? $impressive_options['contact-info-title']:'')!='') {
							echo esc_attr(get_theme_mod ( 'contactus_section_title',(!empty($impressive_options['contact-info-title'])) ? $impressive_options['contact-info-title']:''));
						} else {
							 esc_html_e('Contact Information','impressive');
						}
						?>
					</h3>
 				 <?php if (get_theme_mod ( 'contactus_section_info',(!empty($impressive_options['contact-info'])) ? $impressive_options['contact-info']:'')!='') { 
						echo '<p>'.esc_attr(get_theme_mod ( 'contactus_section_info',(!empty($impressive_options['contact-info'])) ? $impressive_options['contact-info']:'')).'</p>';
                  } ?>   
                 <?php if(get_theme_mod ( 'contactus_section_telephone',(!empty($impressive_options['contact-telephone'])) ? $impressive_options['contact-telephone']:'')!='' ||
                    get_theme_mod ( 'contactus_section_fax',(!empty($impressive_options['contact-fax'])) ? $impressive_options['contact-fax']:'')!='' ||
                    get_theme_mod ( 'contactus_section_email',(!empty($impressive_options['contact-email'])) ? $impressive_options['contact-email']:'')!='' ||
                    get_theme_mod ( 'contactus_section_web',(!empty($impressive_options['contact-web'])) ? $impressive_options['contact-web']:'')!='' ||
                    get_theme_mod ( 'contactus_section_address',(!empty($impressive_options['contact-address'])) ? $impressive_options['contact-address']:'')!='') { ?>  
                    <div class="contact-add">
                        <ul> 
							<?php if (get_theme_mod ( 'contactus_section_telephone',(!empty($impressive_options['contact-telephone'])) ? $impressive_options['contact-telephone']:'')!='' ) {  ?>
								<li><p><?php esc_html_e('Telephone  ','impressive'); ?></p> :<span>  <?php echo esc_attr(get_theme_mod ( 'contactus_section_telephone',(!empty($impressive_options['contact-telephone'])) ? $impressive_options['contact-telephone']:'')) ?></span></li>         
                            <?php  } 
                             if (get_theme_mod ( 'contactus_section_fax',(!empty($impressive_options['contact-fax'])) ? $impressive_options['contact-fax']:'')!='') {  ?>               
								<li><p><?php esc_html_e('Fax  ','impressive'); ?></p>:<span> <?php echo esc_attr(get_theme_mod ( 'contactus_section_fax',(!empty($impressive_options['contact-fax'])) ? $impressive_options['contact-fax']:'')) ?></span></li>
                            <?php }
                            if (get_theme_mod ( 'contactus_section_email',(!empty($impressive_options['contact-email'])) ? $impressive_options['contact-email']:'')!='') {  ?>               
                                <li><p><?php esc_html_e('E-Mail  ','impressive'); ?></p>:<span> <?php echo esc_attr(get_theme_mod ( 'contactus_section_telephone',(!empty($impressive_options['contact-telephone'])) ? $impressive_options['contact-telephone']:'')) ?></span></li>
                            <?php }                              
                            if (get_theme_mod ( 'contactus_section_web',(!empty($impressive_options['contact-web'])) ? $impressive_options['contact-web']:'')!='') {  ?>
								<li><p><?php esc_html_e('Website  ','impressive'); ?></p>:<span> <a href="<?php echo esc_url(get_theme_mod ( 'contactus_section_web',(!empty($impressive_options['contact-web'])) ? $impressive_options['contact-web']:'')) ?>"><?php echo esc_url(get_theme_mod ( 'contactus_section_web',(!empty($impressive_options['contact-web'])) ? $impressive_options['contact-web']:'')) ?></a></span></li>
                            <?php } if (get_theme_mod ( 'contactus_section_address',(!empty($impressive_options['contact-address'])) ? $impressive_options['contact-address']:'')!='') {  ?>
								<li><p><?php esc_html_e('Address  ','impressive'); ?></p>:<span>  <?php echo esc_attr(get_theme_mod ( 'contactus_section_address',(!empty($impressive_options['contact-address'])) ? $impressive_options['contact-address']:'')) ?></span></li>
                            <?php } ?>
                        </ul>
                    </div>                    
                 <?php } ?>
                </div>                
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>