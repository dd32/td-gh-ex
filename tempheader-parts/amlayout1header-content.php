<?php

/**
 * Theme layout1 header content.
 *
 * @package WordPress
 * @subpackage Admela
 * @since Admela 1.0
 */
 


if((admela_get_option('admela_hdfacebook') == false) && (admela_get_option('admela_hdtwitter') == false) && (admela_get_option('admela_hdgoogleplus') == false) && (admela_get_option('admela_hdinstagram') == false)){ 
   $admela_hdsocialclass = 'admela_hdrsocialwot';
}
else {
   $admela_hdsocialclass = '';
}
?>
<div class="admela_header1 <?php echo esc_attr($admela_hdsocialclass); ?>">
<div class="admela_headerinner">
	<?php if((admela_get_option('admela_hdfacebook') != false) || (admela_get_option('admela_hdtwitter') != false) || (admela_get_option('admela_hdgoogleplus') != false) || (admela_get_option('admela_hdinstagram') != false)){ ?>
	<div class="admela_headerfirst">
	  <div class="admela_headershareicon">
		<i class="fa fa-share-alt"></i>
	  </div>
      <ul class="admela_headerfirstsub">	   
		<?php
		if(admela_get_option('admela_hdfacebook') != false){
		?>
		<li><a href="<?php echo esc_url(admela_get_option('admela_hdfacebook')); ?>" class="admela_socialiconfb" target="_blank"><i class="fa fa-facebook"></i></a></li>
		<?php } 
        if(admela_get_option('admela_hdtwitter') != false) {
		?>
		<li><a href="<?php echo esc_url(admela_get_option('admela_hdtwitter')); ?>" class="admela_socialicontwt" target="_blank"><i class="fa fa-twitter"></i></a></li>
		<?php } 
		if(admela_get_option('admela_hdgoogleplus') != false) {
		?>
		<li><a href="<?php echo esc_url(admela_get_option('admela_hdgoogleplus')); ?>" class="admela_socialicongle" target="_blank"><i class="fa fa-google-plus"></i></a></li>
		<?php
		}
		if(admela_get_option('admela_hdinstagram') != false) {
		?>
		<li><a href="<?php echo esc_url(admela_get_option('admela_hdinstagram')); ?>" class="admela_socialiconins" target="_blank"><i class="fa fa-instagram"></i></a></li>
		<?php
		}
		?>
	   </ul>
	</div>
	<?php } ?>
	<div class="admela_headermid">
         <?php if(admela_get_option('admela_custom_logo_activestatus') != false) { 				
				    if(is_home()): ?>
					<h1 class="admela_sitetitle" itemprop="headline">
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' ); ?>">
					<img src="<?php echo esc_url(admela_get_option('admela_custom_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" itemprop="image"/>
					</a>
					</h1>
					<?php else: ?>
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' ); ?>" class="admela_fontstlye">
					<img src=" <?php echo esc_url(admela_get_option('admela_custom_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" itemprop="image"/>
					</a>
					<?php 
					
					endif;				
					}
				    elseif (is_home()) { ?>
					<h1 class="admela_sitetitle admela_restitle1" itemprop="headline">
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' ); ?>">
					<?php bloginfo( 'name' ); ?>
					</a>									
					</h1> 
                   <p><?php bloginfo( 'description' );  ?></p>						
					<?php } 				
					else { ?>
					<div class="admela_sitetitle admela_restitle" itemprop="headline"> 
					<a href="<?php echo esc_url(home_url('/'));  ?>" title="<?php bloginfo( 'name' ); ?>" class="admela_fontstlye">
					<?php bloginfo( 'name' ); ?>
					</a>  
					<p><?php bloginfo( 'description' );  ?></p>						
					</div>
					<?php }	?>
			</div>
	<div class="admela_headerlast">
       
		    <?php
		    $admela_searchck = admela_get_option('admela_hdrsrch');
			if(   1 != (int) $admela_searchck ):
            ?>
			<div class="admela_hdlsticon admela_hdlsrchicon">
				<i class="fa fa-search"></i>
			</div>
            <?php
            endif;	
			if(has_nav_menu('admela-primary-menu')):
            ?>			
        <div class="admela_hdlsticon admela_hdmenuicon">
			<i class="fa fa-bars"></i>
		</div>	
		<?php
        endif;			
        ?>		
	</div>
</div>
</div>
