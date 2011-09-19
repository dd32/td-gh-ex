</div>

<?php if (adt_get_option('adt_a728x15-footer', '') != '' ): ?>
<div class="ads_728-15-footer">			  
<?php echo adt_get_option('adt_a728x15-footer'); ?>
</div>
<?php endif; ?>

<div class="footer">

<div class="fl">
  <?php global $adt_footer_text; echo adt_get_option('adt_footer_text', $adt_footer_text); ?>
</div>

<div class="fr">
  Designed by <a href="http://wpmole.com">WPMole</a>.
</div>

</div>

<?php wp_footer(); ?>

</div>
</body>