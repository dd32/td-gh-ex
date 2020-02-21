
</section>
		<?php  get_sidebar(); ?>
	  </div>
  		<footer>
        <!-- Feel free to remove the credit below, but we'd love it if you would leave it in! -->
  			<p>
  				&copy; <?php  echo date("Y")  ?> <?php  bloginfo('name'); ?> | <strong><?php printf( __( 'Commodore', 'commodore' ),''); ?></strong> by <a href="<?php echo esc_url('http://unitednetworksonline.com/wordpress-themes/'); ?>" title="<?php esc_attr_e( 'United Networks', 'commodore' ); ?>"><strong><?php printf( __( 'United Networks', 'commodore' ),''); ?></strong></a><br />
  				<a href="<?php  bloginfo('rss2_url'); ?>"><?php _e("Entries (RSS)","commodore"); ?></a> <?php _e("and","commodore"); ?> <a href="<?php  bloginfo('comments_rss2_url'); ?>"><?php _e("Comments (RSS)","commodore"); ?></a>
  			</p>
  		</footer>
  		<?php  wp_footer(); ?>
       <!-- closes container div from header -->
		 </div>


		<script>

		function formfocus() {
		  document.getElementById("s").focus();
		}

		window.onload = formfocus();
		flipcursor(0);
		var $a=jQuery.noConflict();
		$a("document").ready(function() {
		    setTimeout(function() {
		        $a("#terminal").trigger('click');
		    },1);
		});
		function $(elid){
						return document.getElementById(elid);
					}
					var cursor;
					window.onload = init();
					function init(){
						cursor = $("cursor");
						cursor.style.left = "0px";
					}
					function nl2br(txt){
						return txt.replace(/\n/g, "<br />");
					}
					function writeit(from, e){
						e = e || window.event;
						var w = $("writer");

						var tw = from.value;
						w.innerHTML = nl2br(tw);
					}
					function moveIt(count, e){
       		e = e || window.event;
           var keycode = e.keyCode || e.which;
						if(keycode == 37 && parseInt(cursor.style.left) >= (0-((count-1)*10))){
							cursor.style.left = parseInt(cursor.style.left) - 10 + "px";
						} else if(keycode == 39 && (parseInt(cursor.style.left) + 10) <= 0){
							cursor.style.left = parseInt(cursor.style.left) + 10 + "px";
						}
					}
					function alert(txt){
					console.log(txt);
					}

</script>

	</body>
</html>
