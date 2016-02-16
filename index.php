<?php

the_post();
$p43d_records_custom = get_post_custom($post->ID);
$p43d_records_esc_permalink = esc_url(get_permalink());

if (!empty($p43d_records_custom)) {

  if (array_key_exists('HTTPS', $_SERVER) === false) {
    $_SERVER['HTTPS'] = 'off';
  }
  $p43d_records_spec_mp3 = false;
  $p43d_records_total_length = '-';
  $p43d_records_recorded_sound_id_mp3 = intval(@$p43d_records_custom['cf_43d_records_recorded_sound_id_mp3'][0]);
  $p43d_records_recorded_sound_url_mp3 = @$p43d_records_custom['cf_43d_records_recorded_sound_url_mp3'][0];
  $p43d_records_recorded_sound_url_mp3 = ($_SERVER['HTTPS'] == 'on') ?
    str_replace('http://', 'https://', $p43d_records_recorded_sound_url_mp3)
    : str_replace('https://', 'http://', $p43d_records_recorded_sound_url_mp3);

  if ($p43d_records_recorded_sound_id_mp3 > 0) {
    $p43d_records_metas = wp_get_attachment_metadata($p43d_records_recorded_sound_id_mp3);
    $p43d_records_spec_mp3 = p43d_records_audio_meta_stringify($p43d_records_metas, true);
    $p43d_records_total_length = floatval($p43d_records_metas['length']);
    $p43d_records_total_length_formatted = $p43d_records_metas['length_formatted'];
  }

  $p43d_records_spec_ogg = false;
  $p43d_records_recorded_sound_id_ogg = intval(@$p43d_records_custom['cf_43d_records_recorded_sound_id_ogg'][0]);
  $p43d_records_recorded_sound_url_ogg = @$p43d_records_custom['cf_43d_records_recorded_sound_url_ogg'][0];
  $p43d_records_recorded_sound_url_ogg = ($_SERVER['HTTPS'] == 'on') ?
    str_replace('http://', 'https://', $p43d_records_recorded_sound_url_ogg)
    : str_replace('https://', 'http://', $p43d_records_recorded_sound_url_ogg);

  if ($p43d_records_recorded_sound_id_ogg > 0) {
    $p43d_records_metas = wp_get_attachment_metadata($p43d_records_recorded_sound_id_ogg);
    $p43d_records_spec_ogg = p43d_records_audio_meta_stringify($p43d_records_metas, true);
    $p43d_records_total_length = floatval($p43d_records_metas['length']);
    $p43d_records_total_length_formatted = $p43d_records_metas['length_formatted'];
  }

  $p43d_records_cover_image_id = has_post_thumbnail() ? get_post_thumbnail_id() : @$p43d_records_custom['cf_43d_records_cover_image_id'][0];

  $p43d_records_cover_image_src_1440 = wp_get_attachment_image_src($p43d_records_cover_image_id, 'landscape_1440');
  $p43d_records_cover_image_src_2560 = wp_get_attachment_image_src($p43d_records_cover_image_id, 'landscape_2560');
  $p43d_records_cover_image_src_3200 = wp_get_attachment_image_src($p43d_records_cover_image_id, 'landscape_3200');
  $p43d_records_cover_image_src_4096 = wp_get_attachment_image_src($p43d_records_cover_image_id, 'landscape_4096');
  $p43d_records_cover_image_src_5120 = wp_get_attachment_image_src($p43d_records_cover_image_id, 'landscape_5120');
  $p43d_records_cover_image_src_full = wp_get_attachment_image_src($p43d_records_cover_image_id, 'full');

  if (empty($p43d_records_cover_image_src_full)) {
    $p43d_records_cover_image_src_full = array(P43D_RECORDS_BASE_URL . '/img/default_logo.png');
  }
  if (empty($p43d_records_cover_image_src_1440)) {
    $p43d_records_cover_image_src_1440 = $p43d_records_cover_image_src_full;
  }
  if (empty($p43d_records_cover_image_src_2560)) {
    $p43d_records_cover_image_src_2560 = $p43d_records_cover_image_src_full;
  }
  if (empty($p43d_records_cover_image_src_3200)) {
    $p43d_records_cover_image_src_3200 = $p43d_records_cover_image_src_full;
  }
  if (empty($p43d_records_cover_image_src_4096)) {
    $p43d_records_cover_image_src_4096 = $p43d_records_cover_image_src_full;
  }
  if (empty($p43d_records_cover_image_src_5120)) {
    $p43d_records_cover_image_src_5120 = $p43d_records_cover_image_src_full;
  }

  $p43d_records_rec_date = trim(@$p43d_records_custom['cf_43d_records_rec_date'][0]);
  $p43d_records_rec_time = trim(@$p43d_records_custom['cf_43d_records_rec_time'][0]);

  $p43d_records_equips = trim(@$p43d_records_custom['cf_43d_records_equipments'][0]);

  $p43d_records_latitude = strlen(trim(@$p43d_records_custom['cf_43d_records_latitude'][0])) > 0 ? floatval($p43d_records_custom['cf_43d_records_latitude'][0]) : '';
  $p43d_records_longitude = strlen(trim(@$p43d_records_custom['cf_43d_records_longitude'][0])) > 0 ? floatval($p43d_records_custom['cf_43d_records_longitude'][0]) : '';
}

get_header();
?>

  <ul id="main_menu">
    <li class="menulist" title="Menu"><img src="<?php echo P43D_RECORDS_BASE_URL; ?>/img/icon_M.svg"
                              alt="blog menu"/></li>
    <li class="infobox" title="Information"><img src="<?php echo P43D_RECORDS_BASE_URL; ?>/img/icon_I.svg" alt="info"/></li>
    <li class="timeline" title=""><img src="<?php echo P43D_RECORDS_BASE_URL; ?>/img/icon_T.svg"
                              alt="timeline"/>
    </li>
  </ul>

  <ul id="social">
    <li><a href="https://www.facebook.com/sharer.php?u=<?php echo $p43d_records_esc_permalink; ?>" target="_blank"><img
          src="<?php echo P43D_RECORDS_BASE_URL; ?>/img/icon_social_fb.svg" alt="facebook"/></a></li>
    <li><a href="https://plus.google.com/share?url=<?php echo $p43d_records_esc_permalink; ?>" target="_blank"><img
          src="<?php echo P43D_RECORDS_BASE_URL; ?>/img/icon_social_gp.svg" alt="google plus"/></a></li>
    <li><a
        href="https://www.tumblr.com/share/link?url=<?php echo $p43d_records_esc_permalink; ?>&amp;title=<?php echo esc_url(get_the_title()); ?>"
        target="_blank"><img src="<?php echo P43D_RECORDS_BASE_URL; ?>/img/icon_social_tm.svg"
                             alt="tumblr"/></a></li>
    <li><a
        href="https://twitter.com/share?url=<?php echo $p43d_records_esc_permalink; ?>&amp;text=<?php echo esc_url(get_the_title()); ?>"
        target="_blank"><img src="<?php echo P43D_RECORDS_BASE_URL; ?>/img/icon_social_tw.svg"
                             alt="twitter"/></a></li>
  </ul>

  <ul id="ctrl_btns">
    <li class="play">
      <img class="default" src="<?php echo P43D_RECORDS_BASE_URL; ?>/img/icon_play.svg"
           alt="play button"/>
      <img class="over"
           src="<?php echo P43D_RECORDS_BASE_URL; ?>/img/icon_play_over.svg"
           alt="play button"/>
    </li>
    <li class="pause hidden">
      <img class="default"
           src="<?php echo P43D_RECORDS_BASE_URL; ?>/img/icon_pause.svg"
           alt="pause button"/>
      <img class="over"
           src="<?php echo P43D_RECORDS_BASE_URL; ?>/img/icon_pause_over.svg"
           alt="pause button"/>
    </li>
  </ul>

  <p id="bg"><!--// <?php the_post_thumbnail(); ?> //--></p>

  <div id="info_content">

    <p class="close_btn"><img src="<?php echo P43D_RECORDS_BASE_URL; ?>/img/icon_close.svg"
                              alt="close button"/></p>

    <div class="outer_container">
      <div class="bg"></div>

      <div <?php post_class("inner_container"); ?>>
        <h1><?php bloginfo('name'); ?></h1>

        <h2><?php the_title(); ?></h2>

        <p class="posted_on info"><span
            class="label">Posted On</span><?php echo date('F j, Y H:i', strtotime($post->post_date)); ?></p>
        <?php if (strlen($p43d_records_rec_date) > 0) : ?>
          <p class="recorded_on info"><span
              class="label">Recorded On</span><?php echo $p43d_records_rec_date . ' ' . $p43d_records_rec_time; ?>
          </p>
        <?php endif; ?>

        <?php if (strlen($p43d_records_latitude) > 0 && strlen($p43d_records_longitude) > 0) :
          $geo_str = p43d_records_geo_stringify($p43d_records_latitude, $p43d_records_longitude);
          ?>
          <p class="geo info"><span class="label">Where</span><?php echo $geo_str; ?> <a
              href="https://maps.google.com/maps?z=12&amp;t=e&amp;ll=<?php echo $p43d_records_latitude . ',' . $p43d_records_longitude; ?>&amp;q=<?php echo $p43d_records_latitude . ',' . $p43d_records_longitude; ?>"
              target="_blank" class="icon_link"><img class="geo_icon"
                                                     src="<?php echo P43D_RECORDS_BASE_URL; ?>/img/icon_geo.svg"
                                                     alt="Google Maps"/></a></p>
        <?php endif; ?>

        <?php if ($p43d_records_spec_mp3 !== false) : ?>
          <dl class="specs mp3 hidden">
            <dt>SPECS</dt>
            <dd>
              <ul><?php foreach ($p43d_records_spec_mp3 as $spec): ?>
                  <li><?php echo $spec; ?></li><?php endforeach; ?></ul>
            </dd>
          </dl>
        <?php endif; ?>
        <?php if ($p43d_records_spec_ogg !== false) : ?>
          <dl class="specs ogg hidden">
            <dt>SPECS</dt>
            <dd>
              <ul><?php foreach ($p43d_records_spec_ogg as $spec): ?>
                  <li><?php echo $spec; ?></li><?php endforeach; ?></ul>
            </dd>
          </dl>
        <?php endif; ?>

        <?php if (strlen($p43d_records_equips) > 0) : ?>
          <p class="equipments info"><span class="label">Equipments</span><?php echo $p43d_records_equips; ?></p>
          <?php
        endif;

        $p43d_records_categ = get_the_category_list(', ', 'multiple', $post->ID);
        if (strlen($p43d_records_categ) > 0) : ?>
          <p class="tags info"><span class="label">Categories</span><?php echo $p43d_records_categ; ?></p>
          <?php
        endif;

        $p43d_records_tags = wp_get_post_tags($post->ID);
        if (count($p43d_records_tags) > 0) : ?>
          <p class="tags info"><span class="label">Tags</span><?php the_tags(''); ?></p>
          <?php
        endif;
        ?>

        <div class="content">
          <?php
          the_content();
          ?>

          <?php
          wp_link_pages(array(
            'before' => '<p class="page-links">' . __('Pages:', '43d-records'),
            'after' => '</p>',
          ));
          ?>
          <div class="post_link_container">
            <?php
            previous_post_link('<p class="post_link">%link</p>', __('<span>&laquo; Previous Entry</span> &ldquo;%title&rdquo;', '43d-records'), false);
            next_post_link('<p class="post_link">%link</p>', __('<span>&raquo; Next Entry</span> &ldquo;%title&rdquo;', '43d-records'), false);
            ?>
          </div>

          <?php
          if (comments_open() || get_comments_number()) {
            comments_template();
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <div id="menulist">
    <p class="close_btn"><img src="<?php echo P43D_RECORDS_BASE_URL; ?>/img/icon_close.svg"
                              alt="close button"/></p>

    <div class="outer_container">
      <div class="bg"></div>

      <div class="inner_container">
        <h1><?php bloginfo('name'); ?></h1>
        <?php
        $p43d_records_desc = get_bloginfo('description', 'display');
        if (strlen($p43d_records_desc) > 0) :
          ?>
          <p class="description"><?php echo $p43d_records_desc; ?></p>
        <?php endif; ?>

        <?php
        wp_reset_postdata();
        $p43d_records_args = array('post_type' => 'post', 'posts_per_page' => 10000, 'numberposts' => 10000);
        $p43d_records_tmp = get_posts($p43d_records_args);
        if (count($p43d_records_tmp) > 0) :
          ?>
          <h3>records list</h3>
          <ul id="posts_list">
            <?php foreach ($p43d_records_tmp as $p43d_records_rec) : setup_postdata($p43d_records_rec); ?>
              <li><span class="label">Posted On</span><span
                  class="subinfo"><?php echo date('F j, Y H:i', strtotime($p43d_records_rec->post_date)); ?></span><span
                  class="title"><a
                    href="<?php echo esc_url(get_permalink($p43d_records_rec->ID)); ?>"><?php echo htmlspecialchars($p43d_records_rec->post_title); ?></a></span>
              </li>
            <?php endforeach; ?>
          </ul>
          <?php
          posts_nav_link(' &#8212; ', __('&laquo; Previous Entry', '43d-records'), __('Next Entry &raquo;', '43d-records'));
        endif;

        $p43d_records_tags = get_tags();
        if (count($p43d_records_tags) > 0) : ?>

          <h3>tags</h3>
          <p class="post_tags">
            <?php

            $p43d_records_tags_html = array();
            foreach ($p43d_records_tags as $p43d_records_tag) {
              $p43d_records_tag_link = get_tag_link($p43d_records_tag->term_id);

              $p43d_records_tags_html[] = '<a href="' . $p43d_records_tag_link . '" title="' . $p43d_records_tag->name
                . 'Tag" class="' . $p43d_records_tag->slug . '">' . $p43d_records_tag->name . '</a>';
            }
            echo implode(', ', $p43d_records_tags_html);
            ?>
          </p>
          <?php
        endif;

        wp_reset_postdata();
        ?>

      </div>
    </div>
  </div>

  <div id="timeline">
    <ul class="buttons">
      <li class="back10s"><img src="<?php echo P43D_RECORDS_BASE_URL; ?>/img/icon_back10s.svg"
                               alt="10s back button"/></li>
      <li class="rewind"><img src="<?php echo P43D_RECORDS_BASE_URL; ?>/img/icon_rewind.svg"
                              alt="rewind button"/></li>
    </ul>
    <div class="if">
      <p class="cursor"></p>

      <div class="horizontal_bar"></div>
      <p class="current_time">0:00</p>

      <p class="total_time"><?php echo $p43d_records_total_length_formatted; ?></p>
    </div>
    <div class="bg"></div>
  </div>


  <script type="text/javascript">

    (function ($) {

      function Application() {
        this.init();
      }

      Application.prototype.init = function () {
        var self = this;

        this.$window = $(window);
        this.$bg = $('#bg');

        this.$main_menu = $('#main_menu');
        this.$social = $('#social');
        this.$ctrls = $('#ctrl_btns');
        this.fade_elements = [this.$main_menu, this.$social, this.$ctrls];

        this.$menu_menulist = $('#main_menu .menulist');
        this.$menu_menulist_open = false;
        this.$menu_infobox = $('#main_menu .infobox');
        this.$menu_infobox_open = false;
        this.$menu_timeline = $('#main_menu .timeline');
        this.$menu_timeline_open = false;

        this.$menulist = $('#menulist');
        this.$menulist_close_btn = $('#menulist .close_btn');

        this.$info_content = $('#info_content');
        this.$info_close_btn = $('#info_content .close_btn');
        this.$info_content_specs_mp3 = $('#info_content dl.specs.mp3');
        this.$info_content_specs_ogg = $('#info_content dl.specs.ogg');

        this.$timeline = $('#timeline');

        this.SOUND_URL = {
          mp3: '<?php echo esc_url($p43d_records_recorded_sound_url_mp3); ?>',
          ogg: '<?php echo esc_url($p43d_records_recorded_sound_url_ogg); ?>'
        };
        this.SOUND_LENGTH = <?php echo $p43d_records_total_length; ?>;

        this.BG_URL = [
          ['<?php echo $p43d_records_cover_image_src_1440[0]; ?>', 768],
          ['<?php echo $p43d_records_cover_image_src_2560[0]; ?>', 1920],
          ['<?php echo $p43d_records_cover_image_src_3200[0]; ?>', 2560],
          ['<?php echo $p43d_records_cover_image_src_4096[0]; ?>', 3200],
          ['<?php echo $p43d_records_cover_image_src_5120[0]; ?>', 9999]
        ];

        $('img', this.$bg).hide();

        this.BG_RESIZE_CHECK_TIME = 500;
        this.BG_RESIZE_CHECK_TIMER = -1;
        this.$window.resize(this.bgResizeProcess);

        this.FULL_VIEW_TIME = 4000;
        this.FULL_VIEW_TIMER = -1;

        setTimeout(function () {
          self.$info_content.animate({width: 'toggle'}, 600, function () {
            $('.inner_container, .close_btn', self.$info_content).fadeTo(200, 1);
            self.$menu_infobox_open = true;
          });

          self.bgResizeProcess(0);
        }, 200);

        //// event handlers

        this.$menu_menulist.click(function (e) {
          e.preventDefault();
          if (self.$menu_menulist_open) return;

          if (self.$menu_infobox_open) {
            $('.inner_container, .close_btn', self.$info_content).fadeTo(200, 0);
            self.$info_content.animate({width: 'toggle'}, 400, function () {
              self.$menu_infobox_open = false;
            });
          }

          if (self.$menu_timeline_open) {
            self.$menu_timeline_open = false;
            self.$timeline.fadeOut();
          }

          self.$menulist.animate({width: 'toggle'}, 600, function () {
            $('.inner_container, .close_btn', self.$menulist).fadeTo(200, 1);
            self.$menu_menulist_open = true;
          });
        });

        this.$menulist_close_btn.click(function (e) {
          e.preventDefault();
          if (!self.$menu_menulist_open) return;

          $('.inner_container, .close_btn', self.$menulist).fadeTo(200, 0);
          self.$menulist.animate({width: 'toggle'}, 600, function () {
            self.$menu_menulist_open = false;
          });
        });

        this.$menu_infobox.click(function (e) {
          e.preventDefault();
          if (self.$menu_infobox_open) return;

          if (self.$menu_menulist_open) {
            $('.inner_container, .close_btn', self.$menulist).fadeTo(200, 0);
            self.$menulist.animate({width: 'toggle'}, 400, function () {
              self.$menu_menulist_open = false;
            });
          }

          if (self.$menu_timeline_open) {
            self.$menu_timeline_open = false;
            self.$timeline.fadeOut();
          }

          self.$info_content.animate({width: 'toggle'}, 600, function () {
            $('.inner_container, .close_btn', self.$info_content).fadeTo(200, 1);
            self.$menu_infobox_open = true;
          });
        });

        this.$info_close_btn.click(function (e) {
          e.preventDefault();
          if (!self.$menu_infobox_open) return;

          $('.inner_container, .close_btn', self.$info_content).fadeTo(200, 0);
          self.$info_content.animate({width: 'toggle'}, 400, function () {
            self.$menu_infobox_open = false;
          });
        });

        this.$menu_timeline.click(function (e) {
          e.preventDefault();
          if (self.$menu_timeline_open) return;

          if (self.$menu_infobox_open) {
            $('.inner_container, .close_btn', self.$info_content).fadeTo(200, 0);
            self.$info_content.animate({width: 'toggle'}, 400, function () {
              self.$menu_infobox_open = false;
            });
          }
          if (self.$menu_menulist_open) {
            $('.inner_container, .close_btn', self.$menulist).fadeTo(200, 0);
            self.$menulist.animate({width: 'toggle'}, 400, function () {
              self.$menu_menulist_open = false;
            });
          }

          self.$timeline.fadeIn(function () {
            self.$menu_timeline_open = true;
          });
          SC.resizeProcess();
        });

        this.$window.bind('touchstart touchmove', full_view_mode);
        this.$window.mousemove(full_view_mode);

        function full_view_mode(e) {
          clearTimeout(self.FULL_VIEW_TIMER);
          for (elm of self.fade_elements)
          {
            elm.fadeIn();
          }
          if (self.$menu_timeline_open) {
            self.$timeline.fadeIn();
          }
          SC.resizeProcess();

          self.FULL_VIEW_TIMER = setTimeout(function () {
            if (
              !self.$menu_menulist_open && !self.$menu_infobox_open
            ) {
              for (elm of
              self.fade_elements
            )
              {
                elm.fadeOut();
              }
            }
            if (self.$menu_timeline_open) {
              self.$timeline.fadeOut();
            }
          }, self.FULL_VIEW_TIME);
        }
      };

      Application.prototype.bgResizeProcess = function (e) {
        var self = APP;
        clearTimeout(self.BG_RESIZE_CHECK_TIMER);

        var d_time = (typeof e === 'number') ? e : self.BG_RESIZE_CHECK_TIME;

        self.BG_RESIZE_CHECK_TIMER = setTimeout(function(){
          var bg_num = self.BG_URL.length, cw =  self.$window.width();
          for (var i = 0; i < bg_num; i++) {
            if (cw <= self.BG_URL[i][1] && self.BG_URL[i][0].length > 0) {
              self.$bg.css('background-image', "url('" + self.BG_URL[i][0] + "')");
              break;
            }
          }
        }, d_time);
      };

      //////////////////

      function Soundscape() {
        this.init();
      }

      Soundscape.prototype.init = function () {
        var self = this;

        this.context = false;
        this.audio = false;
        this.format = '';
        this.timeline_width = 0;
        this.timeline_interbal_id = -1;
        this.is_touch = ('ontouchstart' in window);

        this.$window = $(window);
        this.$play = $('#ctrl_btns .play');
        this.$pause = $('#ctrl_btns .pause');
        this.$timeline = $('#timeline');
        this.$current_time = $('#timeline .current_time');
        this.$cursor = $('#timeline .cursor');
        this.$horizontal_bar = $('#timeline .horizontal_bar');
        this.$back10s = $('#timeline .back10s');
        this.$rewind = $('#timeline .rewind');

        this.$play.hide();
        this.$pause.hide();

        this.$window.resize(this.resizeProcess);

        var at = new Audio();

        this.support_codecs = {
          mp3: !!at.canPlayType('audio/mpeg;').replace(/^no$/, ''),
          ogg: !!at.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/, ''),
          wav: !!at.canPlayType('audio/wav; codecs="1"').replace(/^no$/, ''),
          m4a: !!(at.canPlayType('audio/x-m4a;') || at.canPlayType('audio/aac;')).replace(/^no$/, ''),
          webm: !!at.canPlayType('audio/webm; codecs="vorbis"').replace(/^no$/, '')
        };

        this.$window.load(function () {

          if (APP.SOUND_URL['mp3'].length == 0 && APP.SOUND_URL['ogg'].length == 0) {
            return;
          }

          try {
            window.AudioContext = window.AudioContext || window.webkitAudioContext;
            self.context = new AudioContext();
          } catch (e) {
            alert('Web Audio API is not supported in this browser.');
            return;
          }

          if (self.support_codecs.mp3 && APP.SOUND_URL['mp3'].length > 0) {
            self.format = 'mp3';
            if (APP.$info_content_specs_mp3) {
              APP.$info_content_specs_mp3.show();
            }
          } else if (self.support_codecs.ogg && APP.SOUND_URL['ogg'].length > 0) {
            self.format = 'ogg';
            if (APP.$info_content_specs_ogg) {
              APP.$info_content_specs_ogg.show();
            }
          }

          if (self.format.length == 0) {
            alert('The audio format of this content is not supported in this browser.');
            return;
          }

          self.audio = new Audio(APP.SOUND_URL[self.format]);
          self.audio.addEventListener('loadstart', function () {
            var source = self.context.createMediaElementSource(self.audio);
            source.connect(self.context.destination);
          }, false);

          self.$play.fadeIn();
        });

        this.$play.click(function (e) {
          self.audio.volume = 1;
          self.audio.loop = true;

          self.audio.play();

          self.$play.hide();
          self.$pause.fadeIn();

          clearInterval(self.timeline_interbal_id);
          self.timeline_interbal_id = setInterval(self.updateTime, 100);

          e.preventDefault();
        });

        this.$pause.click(function (e) {
          e.preventDefault();

          if (self.audio) {
            self.audio.pause();
          }

          self.$pause.hide();
          self.$play.fadeIn();

          clearInterval(self.timeline_interbal_id);
          self.timeline_interbal_id = -1;
        });

        this.$back10s.click(function (e) {
          e.preventDefault();

          if (self.audio) {
            self.audio.currentTime = Math.max(0, self.audio.currentTime - 10);
          }
          this.blur();
        });

        this.$rewind.click(function (e) {
          e.preventDefault();

          if (self.audio) {
            self.audio.currentTime = 0;
          }
          this.blur();
        });

        this.current_time = -1;
        this.cursor_mouse_x = -1;
        this.cursor_x = -1;
        this.new_time = -1;
        this.cursor_dragging = false;

        this.$cursor.mousedown(function (e) {
          e.preventDefault();

          self.cursor_dragging = true;
          self.current_time = 0;
          if (self.audio) {
            self.current_time = self.audio.currentTime;
          }

          self.cursor_x = parseFloat(self.$cursor.css('margin-left'));
          self.cursor_mouse_x = e.clientX;

          self.$window.bind('mousemove', self.handleCursor);
          self.$window.bind('mouseup', self.stopHandleCursor);
        });

        this.$cursor.bind('touchstart', function (e) {
          e.preventDefault();

          self.cursor_dragging = true;
          self.current_time = 0;
          if (self.audio) {
            self.current_time = self.audio.currentTime;
          }

          self.cursor_x = parseFloat(self.$cursor.css('margin-left'));
          self.cursor_mouse_x = e.originalEvent.targetTouches[0].pageX;

          self.$window.bind('mousemove touchmove', self.handleCursor);
          self.$window.bind('touchend', self.stopHandleCursor);
        });

      };

      Soundscape.prototype.handleCursor = function (e) {

        e.preventDefault();
        var self = SC;

        var seekLimit = self.audio ? Math.min(self.audio.seekable.end(0), APP.SOUND_LENGTH) : APP.SOUND_LENGTH;
        var current_mouse = (self.is_touch && e.originalEvent.targetTouches) ? e.originalEvent.targetTouches[0].pageX : e.clientX;
        var delta = (current_mouse - self.cursor_mouse_x) / self.timeline_width * APP.SOUND_LENGTH;
        self.new_time = Math.min(self.audio.seekable.end(0), Math.max(0, self.current_time + delta));

        var marginLeft = self.new_time / APP.SOUND_LENGTH * self.timeline_width;
        self.$cursor.css('margin-left', marginLeft);
      };

      Soundscape.prototype.stopHandleCursor = function (e) {
        e.preventDefault();
        var self = SC;

        self.$window.unbind('mousemove touchmove', self.handleCursor);
        self.$window.unbind('mouseup touchend', self.stopHandleCursor);

        if (self.cursor_dragging) {
          self.cursor_dragging = false;
        } else {
          return;
        }

        self.audio.currentTime = self.new_time;
      };

      Soundscape.prototype.resizeProcess = function () {
        var self = SC;
        self.timeline_width = self.$horizontal_bar.width();
      };

      Soundscape.prototype.updateTime = function () {
        var self = SC;

        var marginLeft = self.audio.currentTime / APP.SOUND_LENGTH * self.timeline_width;
        if (!self.cursor_dragging) {
          self.$cursor.css('margin-left', marginLeft);
        }
        self.$current_time.text(convertTimeFormat(self.audio.currentTime));
      };

      var APP = new Application();
      var SC = new Soundscape();

      function convertTimeFormat(s) {
        s = Math.round(s);

        var sec = s % 60;
        if (sec < 10) {
          sec = '0' + sec;
        }
        return Math.floor(s / 60) + ':' + sec;
      }

    })(jQuery);


  </script>
<?php
get_footer();