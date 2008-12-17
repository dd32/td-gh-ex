<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<div>
<?php
$value = wp_specialchars($s, 1);
if (!$value) {
$value = __('To Search, just type and enter','ayumi');
}
?>
<input type="text" value="<?php echo $value; ?>" name="s" id="s" onfocus="if (this.value == '<?php _e('To Search, just type and enter','ayumi') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('To Search, just type and enter','ayumi') ?>';}" />
<input type="hidden" id="searchsubmit" value="<?php _e('Search','ayumi') ?>" />
</div>
</form>