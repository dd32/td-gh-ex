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
