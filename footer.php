<div id="footer"><div class="inner">
	<div id="foot">
		<div class="div1">Proudly Powered by <a href="http://wordpress.org/" rel="external nofollow">WordPress</a>. Theme:Fmi by <a href="http://www.forrss.com/" rel="external">Forrss</a>.</div>
		<div class="div2">
<?php
if( fmi_theme_option( 'vs-social-email' ) ) :
    echo '<a href="' . esc_url( 'mailto:' . antispambot( fmi_theme_option( 'vs-social-email' ), 1 ) ) . '" title="' . __( 'Send Us an Email', 'fmi' ) . '"><i class="fa fa-envelope-o"></i></a>';endif;
if( fmi_theme_option( 'vs-social-skype' ) ) :
    echo '<a href="skype:' . esc_html( fmi_theme_option( 'vs-social-skype' ) ) . '?userinfo" title="' . __( 'Contact Us on Skype', 'fmi' ) . '"><i class="fa fa-skype"></i></a>';endif;
if( fmi_theme_option( 'vs-social-facebook' ) ) :
    echo '<a href="' . esc_url( fmi_theme_option( 'vs-social-facebook' ) ) . '" target="_blank" title="' . __( 'Find Us on Facebook', 'fmi' ) . '"><i class="fa fa-facebook"></i></a>';endif;
if( fmi_theme_option( 'vs-social-twitter' ) ) :
    echo '<a href="' . esc_url( fmi_theme_option( 'vs-social-twitter' ) ) . '" target="_blank" title="' . __( 'Follow Us on Twitter', 'fmi' ) . '"><i class="fa fa-twitter"></i></a>';endif;
if( fmi_theme_option( 'vs-social-google-plus' ) ) :
    echo '<a href="' . esc_url( fmi_theme_option( 'vs-social-google-plus' ) ) . '" target="_blank" title="' . __( 'Find Us on Google Plus', 'fmi' ) . '"><i class="fa fa-google-plus"></i></a>';endif;
if( fmi_theme_option( 'vs-social-youtube' ) ) :
    echo '<a href="' . esc_url( fmi_theme_option( 'vs-social-youtube' ) ) . '" target="_blank" title="' . __( 'View our YouTube Channel', 'fmi' ) . '"><i class="fa fa-youtube"></i></a>';endif;
if( fmi_theme_option( 'vs-social-instagram' ) ) :
    echo '<a href="' . esc_url( fmi_theme_option( 'vs-social-instagram' ) ) . '" target="_blank" title="' . __( 'Follow Us on Instagram', 'fmi' ) . '"><i class="fa fa-instagram"></i></a>';endif;
if( fmi_theme_option( 'vs-social-pinterest' ) ) :
    echo '<a href="' . esc_url( fmi_theme_option( 'vs-social-pinterest' ) ) . '" target="_blank" title="' . __( 'Pin Us on Pinterest', 'fmi' ) . '"><i class="fa fa-pinterest"></i></a>';endif;
if( fmi_theme_option( 'vs-social-linkedin' ) ) :
    echo '<a href="' . esc_url( fmi_theme_option( 'vs-social-linkedin' ) ) . '" target="_blank" title="' . __( 'Find Us on LinkedIn', 'fmi' ) . '"><i class="fa fa-linkedin"></i></a>';endif;
if( fmi_theme_option( 'vs-social-tumblr' ) ) :
    echo '<a href="' . esc_url( fmi_theme_option( 'vs-social-tumblr' ) ) . '" target="_blank" title="' . __( 'Find Us on Tumblr', 'fmi' ) . '"><i class="fa fa-tumblr"></i></a>';endif;
if( fmi_theme_option( 'vs-social-flickr' ) ) :
    echo '<a href="' . esc_url( fmi_theme_option( 'vs-social-flickr' ) ) . '" target="_blank" title="' . __( 'Find Us on Flickr', 'fmi' ) . '"><i class="fa fa-flickr"></i></a>';endif;
?>
        </div>
		<div class="clear"></div>
	</div>
</div></div>

<div id="back_top"><i class="fa fa-angle-up"></i></div>

</div>

<?php wp_footer();?>
</body>
</html>