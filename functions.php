<?php
/**
 * p43d-records functions and definitions
 *
 * @package p43d-records
 */

if (!function_exists('p43d_records_setup')) {

  define('P43D_RECORDS_BASE_URL', esc_url(get_template_directory_uri()));
  define('P43D_RECORDS_WEBSITE', 'https://records.43d.jp/');

  if (! isset($content_width)) {
    $content_width = 640;
  }

  function p43d_records_setup()
  {
    load_theme_textdomain('43d-records', get_template_directory() . '/languages');
    add_theme_support('post-thumbnails', array('post', 'page'));
    add_theme_support('automatic-feed-links');
    add_theme_support('html5');
    add_theme_support('title-tag');

    if (is_singular() && comments_open()) {
      wp_enqueue_script('comment-reply');
    }
  }

  add_action('after_setup_theme', 'p43d_records_setup');


  function p43d_records_add_custom_image_sizes()
  {
    global $p43d_records_my_custom_image_sizes;
    $p43d_records_my_custom_image_sizes = array(
      'thumbnail_320' => array(
        'name' => 'Thumbnail 320',
        'width' => 320,
        'height' => 320,
        'crop' => false,
        'selectable' => true
      ),
      'thumbnail_640' => array(
        'name' => 'Thumbnail 640',
        'width' => 640,
        'height' => 640,
        'crop' => false,
        'selectable' => true
      ),
      'landscape_960' => array(
        'name' => 'Landscape width 960',
        'width' => 960,
        'height' => 0,
        'crop' => false,
        'selectable' => true
      ),
      'landscape_1440' => array(
        'name' => 'Landscape width 1440',
        'width' => 1440,
        'height' => 0,
        'crop' => false,
        'selectable' => true
      ),
      'landscape_1920' => array(
        'name' => 'Landscape width 1920',
        'width' => 1920,
        'height' => 0,
        'crop' => false,
        'selectable' => true
      ),
      'landscape_2560' => array(
        'name' => 'Landscape width 2560',
        'width' => 2560,
        'height' => 0,
        'crop' => false,
        'selectable' => true
      ),
      'landscape_3200' => array(
        'name' => 'Landscape width 3200',
        'width' => 3200,
        'height' => 0,
        'crop' => false,
        'selectable' => true
      ),
      'landscape_4096' => array(
        'name' => 'Landscape width 4096',
        'width' => 4096,
        'height' => 0,
        'crop' => false,
        'selectable' => true
      ),
      'landscape_5120' => array(
        'name' => 'Landscape width 5120',
        'width' => 5120,
        'height' => 0,
        'crop' => false,
        'selectable' => true
      )
    );
    foreach ($p43d_records_my_custom_image_sizes as $slug => $size) {
      add_image_size($slug, $size['width'], $size['height'], $size['crop']);
    }
  }

  add_action('after_setup_theme', 'p43d_records_add_custom_image_sizes');


  function p43d_records_add_custom_image_size_select($t)
  {
    global $p43d_records_my_custom_image_sizes;
    $size_names = $t;

    foreach ($p43d_records_my_custom_image_sizes as $key => $val) {
      if (isset($val['selectable']) && $val['selectable']) {
        $size_names[$key] = $val['name'];
      }
    }
    return $size_names;
  }

  add_filter('image_size_names_choose', 'p43d_records_add_custom_image_size_select');


  function p43d_records_add_scritps_and_styles()
  {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');

    wp_register_style('custom_wp_admin_css', get_template_directory_uri() . '/js/jquery-ui-1.11.4.custom/jquery-ui.min.css', false, '1.11.4');
    wp_enqueue_style('custom_wp_admin_css');
    wp_register_style('custom_wp_admin_css2', get_template_directory_uri() . '/css/admin.min.css', false, '0.9');
    wp_enqueue_style('custom_wp_admin_css2');
    wp_enqueue_script('jquery-ui-datepicker', array('jquery'));
  }

  add_action('admin_enqueue_scripts', 'p43d_records_add_scritps_and_styles');


  function p43d_records_add_meta_box()
  {
    add_meta_box("43d_records_form", __('43d Records Editor', '43d-records'), 'p43d_records_form_cb', 'post');
  }

  function p43d_records_form_cb()
  {
    global $post;

    $error_message = '';
    $custom = get_post_custom($post->ID);

    if (!empty($custom)) {
      $upload_link = esc_url(get_upload_iframe_src('image', $post->ID));

      $recorded_sound_id_mp3 = intval(@$custom['cf_43d_records_recorded_sound_id_mp3'][0]);
      if ($recorded_sound_id_mp3 > 0) {
        $recorded_sound_specs_mp3 = p43d_records_audio_meta_stringify(wp_get_attachment_metadata($recorded_sound_id_mp3));
      } else {
        $recorded_sound_specs_mp3 = '';
      }
      $recorded_sound_url_mp3 = @$custom['cf_43d_records_recorded_sound_url_mp3'][0];

      $recorded_sound_id_ogg = intval(@$custom['cf_43d_records_recorded_sound_id_ogg'][0]);
      if ($recorded_sound_id_ogg > 0) {
        $recorded_sound_specs_ogg = p43d_records_audio_meta_stringify(wp_get_attachment_metadata($recorded_sound_id_ogg));
      } else {
        $recorded_sound_specs_ogg = '';
      }
      $recorded_sound_url_mp3 = @$custom['cf_43d_records_recorded_sound_url_mp3'][0];
      $recorded_sound_url_ogg = @$custom['cf_43d_records_recorded_sound_url_ogg'][0];

      $cover_image_id = @$custom['cf_43d_records_cover_image_id'][0];
      $cover_image_src = wp_get_attachment_image_src($cover_image_id, array(640, 640));
      $have_img = is_array($cover_image_src);

      $rec_date = trim(@$custom['cf_43d_records_rec_date'][0]);
      $rec_time = trim(@$custom['cf_43d_records_rec_time'][0]);

      $equipments = trim(@$custom['cf_43d_records_equipments'][0]);

      $latitude = strlen(trim(@$custom['cf_43d_records_latitude'][0])) > 0 ? floatval($custom['cf_43d_records_latitude'][0]) : '';
      $longitude = strlen(trim(@$custom['cf_43d_records_longitude'][0])) > 0 ? floatval($custom['cf_43d_records_longitude'][0]) : '';
    }
    include_once(get_template_directory() . '/admin_inc/post.php');
  }

  add_action('add_meta_boxes_post', 'p43d_records_add_meta_box');


  function p43d_records_save_events($post_id)
  {
    global $post;
    if (!wp_verify_nonce($_POST['e-nonce'], 'e-nonce')) {
      return $post_id;
    }

    if (!current_user_can('edit_post', $post->ID)) {
      return $post_id;
    }

    // sound
    $recorded_sound_id_mp3 = trim($_REQUEST['recorded_sound_id_mp3']);
    if ($recorded_sound_id_mp3 > 0) {
      update_post_meta($post->ID, 'cf_43d_records_recorded_sound_id_mp3', $recorded_sound_id_mp3);
    } else {
      update_post_meta($post->ID, 'cf_43d_records_recorded_sound_id_mp3', '');
    }
    $recorded_sound_url_mp3 = trim($_REQUEST['recorded_sound_url_mp3']);
    if (strlen($recorded_sound_url_mp3) > 0) {
      update_post_meta($post->ID, 'cf_43d_records_recorded_sound_url_mp3', $recorded_sound_url_mp3);
    } else {
      update_post_meta($post->ID, 'cf_43d_records_recorded_sound_url_mp3', '');
    }

    $recorded_sound_id_ogg = trim($_REQUEST['recorded_sound_id_ogg']);
    if ($recorded_sound_id_ogg > 0) {
      update_post_meta($post->ID, 'cf_43d_records_recorded_sound_id_ogg', $recorded_sound_id_ogg);
    } else {
      update_post_meta($post->ID, 'cf_43d_records_recorded_sound_id_ogg', '');
    }
    $recorded_sound_url_ogg = trim($_REQUEST['recorded_sound_url_ogg']);
    if (strlen($recorded_sound_url_mp3) > 0) {
      update_post_meta($post->ID, 'cf_43d_records_recorded_sound_url_ogg', $recorded_sound_url_ogg);
    } else {
      update_post_meta($post->ID, 'cf_43d_records_recorded_sound_url_ogg', '');
    }

    // cover image
    $cover_image_id = intval($_REQUEST['cover_image_id']);
    if ($cover_image_id > 0) {
      update_post_meta($post->ID, 'cf_43d_records_cover_image_id', $cover_image_id);
      update_post_meta($post->ID, '_thumbnail_id', $cover_image_id);
    } else {
      update_post_meta($post->ID, 'cf_43d_records_cover_image_id', '');
      update_post_meta($post->ID, '_thumbnail_id', '');
    }

    // date recorded on
    $rec_date = trim($_REQUEST['rec_date']);
    if (strlen($rec_date) > 0) {
      update_post_meta($post->ID, 'cf_43d_records_rec_date', $rec_date);
    } else {
      update_post_meta($post->ID, 'cf_43d_records_rec_date', '');
    }

    $rec_time = trim($_REQUEST['rec_time']);
    if (strlen($rec_time) > 0) {
      update_post_meta($post->ID, 'cf_43d_records_rec_time', $rec_time);
    } else {
      update_post_meta($post->ID, 'cf_43d_records_rec_time', '');
    }

    // equipments
    $equipments = trim($_REQUEST['equipments']);
    if (strlen($equipments) > 0) {
      update_post_meta($post->ID, 'cf_43d_records_equipments', $equipments);
    } else {
      update_post_meta($post->ID, 'cf_43d_records_equipments', '');
    }

    // location
    $latitude = trim($_REQUEST['latitude']);
    if (strlen($latitude) > 0) {
      update_post_meta($post->ID, 'cf_43d_records_latitude', $latitude);
    } else {
      update_post_meta($post->ID, 'cf_43d_records_latitude', '');
    }

    $longitude = trim($_REQUEST['longitude']);
    if (strlen($longitude) > 0) {
      update_post_meta($post->ID, 'cf_43d_records_longitude', $longitude);
    } else {
      update_post_meta($post->ID, 'cf_43d_records_longitude', '');
    }

  }

  add_action('save_post', 'p43d_records_save_events');


  function p43d_records_filesize_format($b)
  {
    $b = intval($b);

    if ($b > 0) {
      $units = array('B', 'KB', 'MB', 'GB');
      $unit_index = intval(log($b, 1024));

      return sprintf('%.2f%s', $b / pow(1024, $unit_index), $units[$unit_index]);
    }

    return $b;
  }


  function p43d_records_audio_meta_stringify($metas, $array = false)
  {
    $specs = array();
    if (array_key_exists('filesize', $metas)) {
      $specs[] = 'Size: ' . p43d_records_filesize_format($metas['filesize']);
    }
    if (array_key_exists('length_formatted', $metas)) {
      $specs[] = 'Length: ' . $metas['length_formatted'];
    }
    if (array_key_exists('sample_rate', $metas)) {
      $specs[] = 'Sampling Rate: ' . number_format($metas['sample_rate']) . 'Hz';
    }
    if (array_key_exists('bitrate', $metas)) {
      $specs[] = 'Bitrate: ' . number_format($metas['bitrate'] / 1000) . 'kbps';
    }
    if (array_key_exists('channels', $metas)) {
      if ($metas['channels'] == 2) {
        $specs[] = 'Stereo';
      } else if ($metas['channels'] == 1) {
        $specs[] = 'Monaural';
      }
    }

    if (!$array) {
      if (count($specs) > 0) {
        return implode(', ', $specs);
      }
      return '';
    }

    return $specs;
  }


  function p43d_records_geo_stringify($lat, $lng)
  {
    $lat = p43d_records_dec2dms($lat);
    $str = abs($lat['deg']) . '°' . $lat['min'] . '′' . round($lat['sec']) . '″';
    $str .= ($lat['deg'] >= 0) ? 'N ' : 'S ';

    $lng = p43d_records_dec2dms($lng);
    $str .= abs($lng['deg']) . '°' . $lng['min'] . '′' . round($lng['sec']) . '″';
    $str .= ($lng['deg'] >= 0) ? 'E' : 'W';

    return $str;
  }


  function p43d_records_dec2dms($dec)
  {
    $tmp = explode('.', $dec);
    $tmp[1] = floatval('0.' . $tmp[1]) * 3600;
    $min = floor($tmp[1] / 60);
    $sec = $tmp[1] - ($min * 60);

    return array("deg" => intval($tmp[0]), "min" => $min, "sec" => $sec);
  }

}
