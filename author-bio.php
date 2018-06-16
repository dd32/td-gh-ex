<?php


/**
 * The template for displaying Author bio
 *
 * @package WordPress
 * @subpackage admela
 * @since Admela 1.0
 */


 $admela_authordesc = get_the_author_meta( 'description' );

 if(!empty($admela_authordesc)) {
 
?>

<div class="admela_authorbox" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"> <!-- Author bio Section --> 
  
  <?php echo get_avatar( get_the_author_meta( 'user_email' ), 100 ); ?>
  <div class="admela_authorinfo">
    <div class="admela_author_link"> <h5> <?php esc_html_e('Written By','admela'); ?></h5><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"> <?php echo get_the_author(); ?> </a></div>
	<?php wp_filter_nohtml_kses(the_author_meta( 'description' )); ?>
  </div>
  <div class="admela_authorfooter">
     <div class="admela_author_social">
      <?php 
			if ( get_the_author_meta( 'facebook_id' ) != false ) { // user profile fb id 
			echo "<a class=\"fab fa-facebook-f\" href=\"". esc_url(get_the_author_meta( 'facebook_id' ) ). "\"></a>";
			} 
			if ( get_the_author_meta( 'google_profile' ) != false ) { // user profile googleplus id 
			echo "<a class=\"fab fa-google-plus-g\" href=\"". esc_url(get_the_author_meta( 'google_profile' )) . "\"></a>";
			}
			if ( get_the_author_meta( 'twitter_id' ) != false ) {  // user profile twitter id 
			echo "<a class=\"fab fa-twitter\" href=\"". esc_url(get_the_author_meta( 'twitter_id' )) . "\"></a>";
			}
			if ( get_the_author_meta( 'linkedin_id' ) != false ) { // user profile linkedin id 
			echo "<a class=\"fab fa-linkedin-in\" href=\"". esc_url(get_the_author_meta( 'linkedin_id' ) ). "\"></a>";
			}
			if ( get_the_author_meta( 'youtube_id' ) != false ) { // user profile youtube id
			echo "<a class=\"fab fa-youtube\" href=\"". esc_url(get_the_author_meta( 'youtube_id' )) . "\"></a>";
			}
			if ( get_the_author_meta( 'pintrest_id' ) != false ) { // user profile pintrest id
			echo "<a class=\"fab fa-pinterest\" href=\"". esc_url(get_the_author_meta( 'pintrest_id' ) ). "\"></a>";
			}
			if ( get_the_author_meta( 'instagram_id' ) != false ) { // user profile instagram id
			echo "<a class=\"fab fa-instagram\" href=\"". esc_url(get_the_author_meta( 'instagram_id' )) . "\"></a>";
			}
			?>
    </div>
  </div>
</div> <!-- .admela_authorbox --> 
 <?php  } ?>


