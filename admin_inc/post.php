<?php
/**
 * User: sunouchi
 * Date: 15/07/09
 * Time: 12:14
 */
?>

<div id="p43d-records-meta">
  <?php if (strlen($error_message) > 0) : ?>
    <p class="error"><?php echo $error_message; ?></p>
  <?php endif; ?>
  <dl>
    <dt class="first"><span><?php _e('Recorded Sound', '43d-records'); ?></span></dt>
    <dd class="first">
      <p>
        <input id="recorded_sound_id_mp3" name="recorded_sound_id_mp3" type="hidden"
               value="<?php echo esc_attr($recorded_sound_id_mp3); ?>"/>
        <input id="recorded_sound_url_mp3" name="recorded_sound_url_mp3"
               value="<?php echo esc_attr($recorded_sound_url_mp3); ?>" readonly="readonly"/>
        <span class="content_specs mp3"><?php
          if (strlen($recorded_sound_specs_mp3) > 0) {
            echo $recorded_sound_specs_mp3;
          }
          ?></span>
        <span class="block">
        <button id="upload_mp3_button" type="button"><?php _e('Set MP3 File', '43d-records'); ?></button>
        <button id="delete_mp3_button" type="button"><?php _e('Clear', '43d-records'); ?></button>
        </span>
      </p>
      <p>
        <input id="recorded_sound_id_ogg" name="recorded_sound_id_ogg" type="hidden"
               value="<?php echo esc_attr($recorded_sound_id_ogg); ?>"/>
        <input id="recorded_sound_url_ogg" name="recorded_sound_url_ogg"
               value="<?php echo esc_attr($recorded_sound_url_ogg); ?>" readonly="readonly"/>
        <span class="content_specs ogg"><?php
          if (strlen($recorded_sound_specs_ogg) > 0) {
            echo $recorded_sound_specs_ogg;
          }
          ?></span>
        <span class="block">
        <button id="upload_ogg_button" type="button"><?php _e('Set OGG File (option)', '43d-records'); ?></button>
        <button id="delete_ogg_button" type="button"><?php _e('Clear', '43d-records'); ?></button>
          </span>
      </p>
    </dd>

    <dt><span><?php _e('Cover Image (Jpeg image as large as possible)', '43d-records'); ?></span></dt>
    <dd>
      <p>
        <input id="cover_image_id" name="cover_image_id" type="hidden"
               value="<?php echo esc_attr($cover_image_id); ?>"/>
        <button class="<?php if ($have_img) {
          echo 'hidden';
        } ?>" id="upload_cover_img_button" type="button"><?php _e('Set Jpeg Image', '43d-records'); ?></button>
        <button class="<?php if (!$have_img) {
          echo 'hidden';
        } ?>" id="delete_cover_img_button" type="button"><?php _e('Delete Jpeg Image', '43d-records'); ?></button>
      </p>

      <p id="cover_image_container"><?php if ($have_img): ?>
          <img src="<?php echo esc_url($cover_image_src[0]); ?>"
               alt="cover image"
               style="max-width:100%;" /><?php endif; ?></p>
    </dd>

    <dt><span><?php _e('Date Recorded On', '43d-records'); ?></span></dt>
    <dd>
      <p><?php _e('Date (Month Day, Year)', '43d-records'); ?>
        <input name="rec_date" class="text rec_date" id="rec_date" value="<?php if (isset($rec_date)) {
          echo esc_attr($rec_date);
        } ?>"/>

        <?php _e('Time (Hours:Minutes)', '43d-records'); ?>
        <input name="rec_time" class="text rec_time" id="rec_time" value="<?php if (isset($rec_time)) {
          echo esc_attr($rec_time);
        } ?>" placeholder="00:00"/></p>
    </dd>

    <dt><span><?php _e('Equipments', '43d-records'); ?></span></dt>
    <dd>
      <p>
        <input name="equipments" class="equipments" id="equipments" value="<?php if (isset($equipments)) {
          echo esc_attr($equipments);
        } ?>"/>
      </p>
    </dd>

    <dt><span><?php _e('Location', '43d-records'); ?></span></dt>
    <dd>
      <p>
        <?php _e('Latitude', '43d-records'); ?>
        <input name="latitude" class="text latitude" id="latitude" value="<?php if (isset($latitude)) {
          echo esc_attr($latitude);
        } ?>"/>

        <?php _e('Longitude', '43d-records'); ?>
        <input name="longitude" class="text longitude" id="longitude" value="<?php if (isset($longitude)) {
          echo esc_attr($longitude);
        } ?>"/>
      </p>

      <p id="map-canvas"></p>
    </dd>
  </dl>

  <input type="hidden" name="e-nonce" id="e-nonce" value="<?php echo wp_create_nonce('e-nonce'); ?>"/>
</div>

<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMebqn8xZA5IYj3ioum-pE-Xgnuh_Gf8Y"></script>
<script>
  jQuery(function () {
    var $ = jQuery;

    // location
    var map, marker, latlng, lat, lon;

    function gmap_initialize() {
      var mapOptions;

      getCfValue();

      if (lat === false || lon === false) {
        mapOptions = {
          zoom: 1
        };
      } else {
        latlng = new google.maps.LatLng(lat, lon);
        mapOptions = {
          center: latlng,
          zoom: 10
        };
      }

      map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);

      if (lat === false || lon === false) {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function (position) {
            var pos = new google.maps.LatLng(position.coords.latitude,
              position.coords.longitude);

            map.setCenter(pos);
            map.setZoom(10);
          }, function () {
            handleNoGeolocation(true);
          });
        } else {
          // Browser doesn't support Geolocation
          handleNoGeolocation(false);
        }
      } else {
        marker = new google.maps.Marker({
          position: latlng,
          map: map
        });
      }

      google.maps.event.addListener(map, "click", function (me) {
        lat = me.latLng.lat();
        lon = me.latLng.lng();

        if (marker == null) {
          marker = new google.maps.Marker({
            position: me.latLng,
            map: map
          });
        } else {
          marker.setPosition(me.latLng);
        }
        $('#latitude').val(lat);
        $('#longitude').val(lon);
      });

      $('#latitude').on('change', function () {
        getCfValue();
        refreshMap();
      });

      $('#longitude').on('change', function () {
        getCfValue();
        refreshMap();
      });
    }

    function refreshMap() {
      latlng = new google.maps.LatLng(lat, lon);
      map.setCenter(latlng);

      if (marker == null) {
        marker = new google.maps.Marker({
          position: latlng,
          map: map
        });
      } else {
        marker.setPosition(latlng);
      }
    }

    function getCfValue() {
      lat = trimStr($('#latitude').val());
      lon = trimStr($('#longitude').val());

      lat = lat === '' ? false : parseFloat(lat);
      lon = lon === '' ? false : parseFloat(lon);
    }

    function handleNoGeolocation(errorFlag) {
      map.setCenter(new google.maps.LatLng(0, 0));
    }

    google.maps.event.addDomListener(window, 'load', gmap_initialize);

    // sound
    var frame_audio, selection_type;

    $('#upload_mp3_button, #upload_ogg_button').click(function (e) {
      e.preventDefault();

      if ($(this).attr('id') == 'upload_mp3_button') {
        selection_type = 'mp3';
      } else if ($(this).attr('id') == 'upload_ogg_button') {
        selection_type = 'ogg';
      }

      if (frame_audio) {
        frame_audio.open();
        return;
      }

      frame_audio = wp.media({
        title: 'Select or Upload Media',
        button: {
          text: 'Use this media'
        },
        multiple: false
      });

      frame_audio.on('select', function () {
        var attachment = frame_audio.state().get('selection').first().toJSON();
        console.log(attachment);

        if (selection_type == 'mp3') {
          if (attachment.mime != "audio/mpeg") {
            alert('MP3 file must be set here !');
            return;
          }
          $('#recorded_sound_id_mp3').val(attachment.id);
          $('#recorded_sound_url_mp3').val(attachment.url);
        }

        if (selection_type == 'ogg') {
          if (attachment.mime != "audio/ogg") {
            alert('OGG file must be set here !');
            return;
          }
          $('#recorded_sound_id_ogg').val(attachment.id);
          $('#recorded_sound_url_ogg').val(attachment.url);
        }
      });

      frame_audio.open();
    });

    $('#delete_mp3_button').click(function (e) {
      e.preventDefault();

      $('#recorded_sound_id_mp3').val('');
      $('#recorded_sound_url_mp3').val('');
      $('.content_specs.mp3').html('');
    });

    $('#delete_ogg_button').click(function (e) {
      e.preventDefault();

      $('#recorded_sound_id_ogg').val('');
      $('#recorded_sound_url_ogg').val('');
      $('.content_specs.ogg').html('');
    });

    // cover image
    var frame;
    $('#upload_cover_img_button').click(function (e) {
      e.preventDefault();

      if (frame) {
        frame.open();
        return;
      }

      frame = wp.media({
        title: 'Select or Upload Media',
        button: {
          text: 'Use this media'
        },
        multiple: false
      });

      frame.on('select', function () {
        var attachment = frame.state().get('selection').first().toJSON();

        if (attachment.mime != "image/jpeg") {
          alert('Jpeg file must be set here !');
          return;
        }

        $('#cover_image_container').append('<img src="' + attachment.sizes.thumbnail_640.url + '" alt="cover image" style="max-width:100%;" />');
        $('#cover_image_id').val(attachment.id);
        $('#upload_cover_img_button').addClass('hidden');
        $('#delete_cover_img_button').removeClass('hidden');
      });

      frame.open();
    });

    $('#delete_cover_img_button').click(function (e) {
      e.preventDefault();

      $('#cover_image_container').html('');
      $('#upload_cover_img_button').removeClass('hidden');
      $('#delete_cover_img_button').addClass('hidden');
      $('#cover_image_id').val('');
    });

    // date
    $("#rec_date").datepicker({
      changeMonth: true,
      changeYear: true,
      numberOfMonths: 1,
      showButtonPanel: true,
      showOtherMonths: true,
      selectOtherMonths: true
    });

    $("#rec_date").datepicker("option", 'dateFormat', 'MM d, yy');
    $("#rec_date").datepicker("setDate", "<?php if (isset($rec_date)) { echo $rec_date; } ?>");

  });

  // utilities
  function trimStr(x) {
    return x.replace(/^\s+|\s+$/gm, '');
  }
</script>