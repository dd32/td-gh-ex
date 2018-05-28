<?php
/**
 * avik-support.php
 * @link https://www.denisfranchi.com
 *
 * @package Avik
 * 
 *  @version   1.0.0
 */
?>

<div class="avik-image-background-support container" style="background: url('<?php echo get_template_directory_uri().'/img/services.jpg';  ?>'); background-repeat: no-repeat;
	background-position: center center;background-size: cover;" >
      <div class="logo-support">
            <h1><?php esc_html_e( 'AVIK', 'avik' ); ?></h1><h2><?php esc_html_e( 'V 1.0.0', 'avik' ); ?></h2>
      </div> 
      <div class="text-support">
      <h1><?php esc_html_e( 'Welcome to Avik', 'avik' ); ?></h1>
<h5><?php esc_html_e( 'Thank you for choosing the best theme we have ever build!', 'avik' ); ?></h5>
 </div>
</div>

  <!-- Tab links -->

  <div class="avik-tab-support">
<div class="tab">
  <button class="tablinks" onclick="openGuide(event, 'WELCOME')"id="defaultOpen"><?php esc_html_e( 'WELCOME', 'avik' ); ?></button>
  <button class="tablinks" onclick="openGuide(event, 'GUIDES')"><?php esc_html_e( 'GUIDES', 'avik' ); ?></button>
  <button class="tablinks" onclick="openGuide(event, 'SUPPORT')"><?php esc_html_e( 'SUPPORT', 'avik' ); ?></button>
</div>

<!-- Tab content -->

<!-- Welcome -->

<div id="WELCOME" class="tabcontent">
<i class="far fa-smile fa-3x"></i>
  <h3 class="avik-welkome-support-title"><?php esc_html_e( 'Welcome', 'avik' ); ?></h3>
  <p class="avik-welkome-support"><?php esc_html_e( 'Thank you for choosing Avik.The theme is ready to be used.You can customize everything you want in a few simple clicks directly from the front end.', 'avik' ); ?>
   </p> 
  
</div>

<!-- Guides -->

<div id="GUIDES" class="tabcontent">
<i class="fas fa-book fa-3x"></i>  
<h3 class="avik-welkome-support-title"><?php esc_html_e( 'Guides', 'avik' ); ?></h3>
  <p class="avik-welkome-support">
  <?php esc_html_e( 'Here you will find some very useful guides for using Avik', 'avik' ); ?>
  </p> 
<div class="avik-guide-support-admin">
   <div class="avik-guide">
   <i class="fas fa-info-circle fa-3x"></i> 
   <h2><?php esc_html_e( 'Guide to add id sections in the menu', 'avik' ); ?></h2>
    <p><?php esc_html_e('Insert id section for ancor the scroll', 'avik'); ?></p>
    <button class="avik-button-guide-admin-support"><a class="avik-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/community/index.php?threads/guide-to-add-id-sections-in-the-menu.6/' ); ?>"><?php esc_html_e( 'Open Guide', 'avik' ); ?></a></button>  
   </div>
   <div class="avik-guide">
   <i class="fas fa-info-circle fa-3x"></i> 
      <h2><?php esc_html_e( 'Guide for the section Who we are', 'avik' ); ?></h2>
      <p><?php esc_html_e( 'Create a dedicated page', 'avik' ); ?></p>
      <button class="avik-button-guide-admin-support"><a class="avik-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/community/index.php?threads/guide-for-the-section-who-we-are.7/' ); ?>"><?php esc_html_e( 'Open Guide', 'avik' ); ?></a></button>   
   </div>
   <div class="avik-guide">
   <i class="fas fa-info-circle fa-3x"></i>
      <h2><?php esc_html_e('Guide for the section Services', 'avik'); ?></h2>
      <p><?php esc_html_e('Create a dedicated page', 'avik'); ?></p>
      <button class="avik-button-guide-admin-support"><a class="avik-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/community/index.php?threads/guide-for-the-section-services.8/' ); ?>"><?php esc_html_e( 'Open Guide', 'avik' ); ?></a></button>
   </div>
   <div class="avik-guide"> 
   <i class="fas fa-info-circle fa-3x"></i>
      <h2><?php esc_html_e('Guide for the section Portfolio', 'avik'); ?></h2>
      <p><?php esc_html_e('Create a dedicated page', 'avik'); ?></p>  
      <button class="avik-button-guide-admin-support"><a class="avik-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/community/index.php?threads/guide-for-the-section-portfolio.9/' ); ?>"><?php esc_html_e( 'Open Guide', 'avik' ); ?></a></button>
</div>
</div>
<div class="avik-clear-guide-support-admin"></div>
</div>

<!-- Support -->

<div id="SUPPORT" class="tabcontent">
<i class="fas fa-user fa-3x"></i>
<h3 class="avik-welkome-support-title"><?php esc_html_e('Support', 'avik'); ?></h3>
  <p class="avik-welkome-support"><?php esc_html_e('We offer full support for our theme, taking care of our customers and making sure we solve all the probleavik.Every time an update will be released you will be notified via a back-end notification, where you will be able to see the changes made and any bugs fixed.', 'avik'); ?>
</p>
<h3 class="avik-welkome-support-title"><?php esc_html_e('Forum Support', 'avik'); ?></h3>
<p class="avik-welkome-support"><?php esc_html_e('We offer outstanding support through our forum. To get support first you need to register (create an account) and open a thread in the Avik Section.', 'avik'); ?></p>
<button class="avik-button-admin-support"><a class="avik-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/comunity/index.php' ); ?>"><?php esc_html_e('Open Forum', 'avik'); ?></a></button>
</div>
</div>
<script>
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
           






      