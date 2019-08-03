<?php if(of_get_option('digital_woocart')=='on'){ ?>
<a class="cart-flotingcarte" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
<?php } ?>
</div><!-- end div #page-inner -->

<?php load_template (get_template_directory() . '/includes/adfun.php'); ?><!-- end wrapper -->
<script>
function toggleeffect() {
  var x = document.getElementById("mobview");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
<?php wp_footer(); ?>


</body>
</html>
