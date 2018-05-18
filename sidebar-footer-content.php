<?php
/**
 * The template for the footer Content 
 *
 * @package WordPress
 * @subpackage Admela
 * @since Admela 1.0
 */

 ?>
    <div class="admela_sitefooterinner"> 
  
		<div class="admela_footermiddle">
			<div class="admela_sitefooterlogo">
      <?php if(admela_get_option('admela_ftrcustom_logoactivestatus') != false) {  ?> 
      <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' ); ?>"> <img src=" <?php echo esc_url(admela_get_option('admela_ftrcustomlogo')); ?>" alt="<?php bloginfo( 'name' ); ?>" itemprop="image"/> </a>
     <?php if(admela_get_option('admela_ftrsitetit_active') != true) { ?>
	 <p>     
	 <?php 
		 bloginfo( 'description' ); 
     ?>
     </p>
     <?php	
		}
	  }
				   		
	else { 
	if(admela_get_option('admela_ftrsitetit_active') != true) {
	?>
      <div class="admela_sitetitle admela_restitle"> 
	    <a href="<?php echo esc_url(home_url('/'));  ?>" title="<?php bloginfo( 'name' ); ?>">
        <?php bloginfo( 'name' ); ?>
        </a>
        <p>
          <?php bloginfo( 'description' );  ?>
        </p>
      </div>
	<?php }}	?>
    </div>
			<div class="admela_sitefooterabtus">
 				<p> <?php echo esc_textarea(admela_get_option('admela_ftrabtuscontenttext')); ?> </p>
			</div>
    
		</div>
		<div class="admela_footerbottom">
	  
        <?php
		if(admela_get_option('admela_focopyrightscontent') != false):
		$admela_footertxt = admela_get_option('admela_focopyrightscontent');
		else:
		$admela_footertxt = 'Copyright at 2018. Admela Theme All Rights Reserved';
		endif;
  ?>
        <?php echo wp_kses_stripslashes($admela_footertxt); ?> </div>
		<div class="admela_top" id="admela_top"> <a href="#top">&uarr;</a> </div>
	  
    </div><!-- #Admela SiteFooter Attribution-## --> 
	
 