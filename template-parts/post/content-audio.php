<?php
/**
 * The template part for displaying slider
 * @package Academic Education 
 * @subpackage academic_education
 * @since 1.0
 */
?>

<?php
	$content = apply_filters( 'the_content', get_the_content() );
	$audio   = false;

	// Only get audio from the content if a playlist isn't present.
	if ( false === strpos( $content, 'wp-playlist-script' ) ) {
		$audio = get_media_embedded_in_content( $content, array( 'audio' ) );
	}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-wrap">
    <div class="box-image">
      	<?php
			if ( ! is_single() ) {

				// If not a single post, highlight the audio file.
				if ( ! empty( $audio ) ) {
					foreach ( $audio as $audio_html ) {
						echo '<div class="entry-audio">';
							echo $audio_html;
						echo '</div><!-- .entry-audio -->';
					}
				};

			};
	    ?>
    </div>    
    <div class="post-main">
      <h3 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h3>
      <div class="adminbox">        
        <i class="fas fa-user"></i><span class="entry-author"> <?php the_author(); ?> </span>
        <i class="fas fa-comments"></i><span class="entry-comments"><?php comments_number( __('0 Comments','academic-education'), __('0 Comments','academic-education'), __('0 % Comments','academic-education')); ?>
        </span>
        <i class="far fa-calendar-alt"></i></i><span> <?php the_date(); ?> </span>
      </div>
      <div class="new-text">
        <?php the_excerpt();?>
      </div>
      <div class="continue-read">
        <a href="<?php the_permalink(); ?>"><span><?php esc_html_e('READ MORE...','academic-education'); ?></span></a>
      </div>
    </div>
  </div>
</div>