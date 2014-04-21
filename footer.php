</div>
<footer class="footer">
  <div class="container">
    <div class="row">
      <?php 
		$options = get_option( 'faster_theme_options' ); 
		$social = '';
		if($options['fburl'] != ''){ $facebook_link = $options['fburl']; $social = 'provided'; }/*else{ $facebook_link = 'https://www.facebook.com/faster.themes'; }*/
		if($options['twitter'] != ''){ $twitter_link = $options['twitter']; $social = 'provided';}/*else{ $twitter_link = 'https://twitter.com/FasterThemes'; }*/
		?>
      <?php if ( is_active_sidebar( 'footer-sidebar' ) ) : 
		 		dynamic_sidebar( 'footer-sidebar' ); 
				?>
      <aside class="col-md-3 footer-separator" id="follow_us">
        <h6>Follow Us</h6>
        <?php $options = get_option( 'faster_theme_options' ); ?>
        <ul class=" list-unstyled social">
          <li><a href="<?php echo $facebook_link; ?>" target="_blank" class="sprite facebook-icon">facebook</a></li>
          <li><a href="<?php echo $twitter_link;?>" target="_blank" class="sprite twitter-icon">twitter</a></li>
        </ul>
        <div class="copyright"> <span>
          <?php 
									if($options['footertext'] != '')
									{
										echo $options['footertext'];
									}else{
										echo "Powered by <a href='http://wordpress.org' target='_blank'>WordPress</a>.";
										echo "<br />";
										echo "Theme by <a href='http://fasterthemes.com' target='_blank'>FasterThemes</a>.";				
									}
									?>
          </span> </div>
      </aside>
      <?php
			  	else: 
		?>
      <aside class="col-md-3 footer-separator widget_recent_entries" id="recent-posts-3">
        <h6>Recent Post</h6>
        <ul>
          <?php
						$args = array(
							'numberposts' => 5,
							'orderby' => 'post_date',
							'order' => 'DESC',
							'post_type' => 'post',
							'post_status' => 'draft, publish, future, pending, private',
						);
						$recent_posts = wp_get_recent_posts($args);
						foreach( $recent_posts as $recent ){
							echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
						}
						?>
        </ul>
      </aside>
      <aside class="col-md-3 footer-separator widget_recent_comments" id="recent-comments-2">
        <h6>Recent Comments</h6>
        <ul id="recentcomments">
          <?php
						$args = array(
							'number' => 5,
						);
						$comments = get_comments($args);
						foreach( $comments as $comment ){
							echo '<li class="recentcomments"><a href="'.get_comments_link($comment->comment_post_ID).'" title="'.esc_attr($comment->comment_content).'" >'.$comment->comment_author.' on '.get_the_title($comment->comment_post_ID).'</a> </li> ';
						}
						?>
        </ul>
      </aside>
      <aside class="col-md-3 footer-separator widget_text" id="text-3">
        <h6>Text Widget</h6>
        <div class="textwidget">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis.</div>
      </aside>
      <aside class="col-md-3 footer-separator" id="follow_us">
      <?php if($social =='provided'):?>
        <h6>Follow Us</h6>
        <ul class=" list-unstyled social">
         <?php if($facebook_link !=''):?> <li><a href="<?php echo $facebook_link;?>" target="_blank" class="sprite facebook-icon">facebook</a></li><?php endif;// facebook ?>
         <?php if($twitter_link !=''):?>   <li><a href="<?php echo $twitter_link;?>" target="_blank" class="sprite twitter-icon">twitter</a></li><?php endif; // twitter ?>
        </ul>
        <?php endif; //social provider ?>
        <div class="copyright"> <span>
          <?php $footertext_options = filter_var($options['footertext'], FILTER_SANITIZE_STRING);
									if($footertext_options != '')
									{
										echo $footertext_options;
									}else{
										echo "Powered by <a href='http://wordpress.org' target='_blank'>WordPress</a>.";
										echo "<br />";
										echo "Theme by <a href='http://fasterthemes.com' target='_blank'>FasterThemes.</a>";				
									}
									?>
          </span> </div>
      </aside>
      <?php endif;?>
    </div>
  </div>
</footer>
<!--end / footer-->
<?php wp_footer(); ?>
</body></html>