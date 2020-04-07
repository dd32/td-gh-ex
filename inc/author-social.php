<?php
/**
 * Author social
 *
 * @package Fmi
 */

/**
 * Author social fields
 */
function vs_get_author_fields() {
  return array(
    'facebook'   => esc_html__( 'Facebook Profile URL', 'fmi' ),
    'twitter'    => esc_html__( 'Twitter Profile URL', 'fmi' ),
    'instagram'  => esc_html__( 'Instagram Profile URL', 'fmi' ),
    'pinterest'  => esc_html__( 'Pinterest Profile URL', 'fmi' ),
    'youtube'    => esc_html__( 'YouTube Profile URL', 'fmi' ),
    'telegram'   => esc_html__( 'Telegram Profile URL', 'fmi' ),
    'vimeo'      => esc_html__( 'Vimeo Profile URL', 'fmi' ),
    'soundcloud' => esc_html__( 'SoundCloud Profile URL', 'fmi' ),
    'spotify'    => esc_html__( 'Spotify Profile URL', 'fmi' ),
    'dribbble'   => esc_html__( 'Dribbble Profile URL', 'fmi' ),
    'behance'    => esc_html__( 'Behance Profile URL', 'fmi' ),
    'github'     => esc_html__( 'GitHub Profile URL', 'fmi' ),
    'ok'         => esc_html__( 'Odnoklassniki Profile URL', 'fmi' ),
    'vk'         => esc_html__( 'VK Profile URL', 'fmi' ),
    'xing'       => esc_html__( 'Xing Profile URL', 'fmi' ),
    'linkedin'   => esc_html__( 'LinkedIn Profile URL', 'fmi' ),
    'twitch'     => esc_html__( 'Twitch Profile URL', 'fmi' ),
    'flickr'     => esc_html__( 'Flickr Profile URL', 'fmi' ),
    'snapchat'   => esc_html__( 'Snapchat Profile URL', 'fmi' ),
    'medium'     => esc_html__( 'Medium Profile URL', 'fmi' ),
    'weibo'      => esc_html__( 'Weibo Profile URL', 'fmi' ),
    'wechat'     => esc_html__( 'WeChat Profile URL', 'fmi' ),
    'tumblr'     => esc_html__( 'Tumblr Profile URL', 'fmi' ),
    'reddit'     => esc_html__( 'Reddit Profile URL', 'fmi' ),
    'bloglovin'  => esc_html__( 'Bloglovin Profile URL', 'fmi' ),
    'rss'        => esc_html__( 'RSS Profile URL', 'fmi' ),
  );
}
add_filter( 'user_contactmethods', 'vs_get_author_fields', 1000, 1 );

/**
 * Author Social Links
 */
function vs_author_social_links( $author ) {
  $links = vs_get_author_fields();
  $list = array();
  $url = get_the_author_meta( 'url', $author );
  if ( $url ) {
    $list[] = array(
      'label' => esc_html__( 'Website', 'fmi' ),
      'key'   => 'website',
      'url'   => $url,
    );
  }
  foreach ( $links as $key => $label ) {
    $author_url = get_the_author_meta( $key, $author );
    if ( $author_url ) {
      $list[] = array(
        'label' => $label,
        'key'   => $key,
        'url'   => $author_url,
      );
    }
  }
  if ( $list ) {
  ?>
  <div class="vs-social-links-wrap">
    <div class="vs-social-links-items">
      <?php
      foreach ( $list as $data ) {
      ?>
      <div class="vs-social-links-item vs-social-links-<?php echo esc_attr( $data['key'] ); ?>">
        <a href="<?php echo esc_url( $data['url'] ); ?>" class="vs-social-links-link" target="_blank">
          <i class="vs-icon vs-icon-<?php echo esc_attr( $data['key'] ); ?>"></i>
        </a>
      </div>
      <?php
      }
      ?>
    </div>
  </div>
  <?php
  }
}
