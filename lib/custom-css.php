<?php function backyard_header_customizer_css() {?>
<style>
  <?php $header_image = get_header_image(); if($header_image!=''){?>
.main-header { background-image:url(<?php echo esc_url($header_image); ?>);}
<?php }else{?>
.main-header {}
<?php } ?>
</style>
<?php } add_action('wp_head', 'backyard_header_customizer_css'); ?>