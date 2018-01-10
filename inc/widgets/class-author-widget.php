<?php
/*-----------------------------------------------------------------------------------*/
/*	Author Widget Class
/*-----------------------------------------------------------------------------------*/

class bestblog_Author_Widget extends WP_Widget
{
    private $users_split_at = 200; //Do not run get_users() if there are more than 200 users on the website
    public $defaults;

    public function __construct()
    {
        $widget_ops = array( 'classname' => 'bestblog_author_widget', 'description' => __('Use this widget to display author/user profile info', 'best-blog') ,'customize_selective_refresh' => true);
        parent::__construct('bestblog_author_widget', __('bestblog Author Bio', 'best-blog'), $widget_ops);
        //Allow themes or plugins to modify default parameters
        $defaults = apply_filters('bestblog_author_widget_modify_defaults', array(
                      'title' => esc_attr__('CEO / Co-Founder', 'best-blog'),
                      'author' => 0,
                      'auto_detect' => 0,
                      'display_avatar' => 1,
                      'display_desc' => 1,
                      'display_all_posts' => 1,
                      'avatar_size' => 120,
                      'link_text' => esc_attr__('View all posts', 'best-blog'),
                      'limit_chars' => '',
                                          ));

        $this->defaults = $defaults;
    }



    public function widget($args, $instance)
    {
        extract($args);

        $instance = wp_parse_args((array) $instance, $this->defaults); ?>

<?php
//Check for user_id
  $user_id = $instance['author'];

  $author_link = !empty($instance['link_url']) ? esc_url($instance['link_url']) : get_author_posts_url(get_the_author_meta('ID', $user_id));

        echo $before_widget; ?>

        <div class="card card-profile">
          <div class="card-avatar">
            <?php echo get_avatar(get_the_author_meta('ID', $user_id), $instance['avatar_size']) ;?>
          </div>
          <div class="card-content">
            <?php if( !empty($instance['title'])): ?>
              <h6 class="category text-gray"><?php echo apply_filters('widget_title', $instance['title']); ?></h6>
            <?php endif; ?>
            <?php echo '<h4 class="card-title">' . get_the_author_meta('display_name', $user_id).  '</h4>'; ?>
            <?php if ($instance['display_desc']) : ?>
              <p class="card-description">
                <?php $description = get_the_author_meta('description', $user_id); ?>
                <?php echo wpautop($this->trim_chars($description, $instance['limit_chars'], $user_id)); ?>
              </p>
            <?php endif; ?>
            <?php if ($instance['display_all_posts'] && $instance['link_text']) : ?>
              <a href="<?php echo $author_link; ?>" class="button secondary radius "><?php echo $instance['link_text']; ?></a>
            <?php endif; ?>
          </div>
        </div>
<?php echo $after_widget; ?>
<?php
    }
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['author'] = absint($new_instance['author']);
        $instance['display_avatar'] = isset($new_instance['display_avatar']) ? 1 : 0;
        $instance['display_desc'] = isset($new_instance['display_desc']) ? 1 : 0;
        $instance['display_all_posts'] = isset($new_instance['display_all_posts']) ? 1 : 0;
        $instance['link_text'] = strip_tags($new_instance['link_text']);
        $instance['avatar_size'] = !empty($new_instance['avatar_size']) ? absint($new_instance['avatar_size']) : 120;
        $instance['limit_chars'] = isset($new_instance['limit_chars']) ? absint($new_instance['limit_chars']) : '';

        return $instance;
    }

    public function form($instance)
    {
        $instance = wp_parse_args((array) $instance, $this->defaults); ?>

<p>
  <?php if ($this->count_users() <= $this->users_split_at) : ?>
    <?php $authors = get_users(); ?>
    <label for="<?php echo $this->get_field_id('author'); ?>"><?php _e('Choose author/user', 'best-blog'); ?>:</label>
    <select name="<?php echo $this->get_field_name('author'); ?>" id="<?php echo $this->get_field_id('author'); ?>" class="widefat">
      <?php foreach ($authors as $author) : ?>
        <option value="<?php echo $author->ID; ?>" <?php selected($author->ID, $instance['author']); ?>><?php echo $author->data->user_login; ?></option>
      <?php endforeach; ?>
    </select>
  <?php else: ?>
    <label for="<?php echo $this->get_field_id('author'); ?>"><?php _e('Enter author/user ID', 'best-blog'); ?>:</label>
    <input id="<?php echo $this->get_field_id('author'); ?>" type="text" name="<?php echo $this->get_field_name('author'); ?>" value="<?php echo $instance['author']; ?>" class="small-text" />
  <?php endif; ?>
</p>

<p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e('Author designation', 'best-blog'); ?></label>
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
</p>

<h4><?php _e('Display Options', 'best-blog'); ?></h4>
<ul>
  <li>
    <input id="<?php echo $this->get_field_id('display_avatar'); ?>" type="checkbox" name="<?php echo $this->get_field_name('display_avatar'); ?>" value="1" <?php checked(1, $instance['display_avatar']); ?>/>
    <label for="<?php echo $this->get_field_id('display_avatar'); ?>"><?php _e('Display author avatar', 'best-blog'); ?></label>
  </li>
  <li>
    <label for="<?php echo $this->get_field_id('avatar_size'); ?>"><?php _e('Avatar size:', 'best-blog'); ?></label>
    <input id="<?php echo $this->get_field_id('avatar_size'); ?>" type="text" name="<?php echo $this->get_field_name('avatar_size'); ?>" value="<?php echo $instance['avatar_size']; ?>" class="small-text"/>
  </li>
</ul>

<hr/>
<ul>
  <li>
    <input id="<?php echo $this->get_field_id('display_desc'); ?>" type="checkbox" name="<?php echo $this->get_field_name('display_desc'); ?>" value="1" <?php checked(1, $instance['display_desc']); ?>/>
    <label for="<?php echo $this->get_field_id('display_desc'); ?>"><?php _e('Display author description', 'best-blog'); ?></label>
  </li>
  <li>
    <label for="<?php echo $this->get_field_id('limit_chars'); ?>"><?php _e('Limit description:', 'best-blog'); ?></label>
    <input id="<?php echo $this->get_field_id('limit_chars'); ?>" type="number" name="<?php echo $this->get_field_name('limit_chars'); ?>" value="<?php echo $instance['limit_chars']; ?>" class="widefat"/>
    <small class="howto"><?php _e('Specify number of characters to limit author description length', 'best-blog'); ?></small>
  </li>
</ul>

<hr/>
<ul>
  <li>
    <input id="<?php echo $this->get_field_id('display_all_posts'); ?>" type="checkbox" name="<?php echo $this->get_field_name('display_all_posts'); ?>" value="1" <?php checked(1, $instance['display_all_posts']); ?>/>
    <label for="<?php echo $this->get_field_id('display_all_posts'); ?>"><?php _e('Display author "all posts" archive link', 'best-blog'); ?></label>
  </li>
  <li>
    <label for="<?php echo $this->get_field_id('link_text'); ?>"><?php _e('Link text:', 'best-blog'); ?></label>
    <input id="<?php echo $this->get_field_id('link_text'); ?>" type="text" name="<?php echo $this->get_field_name('link_text'); ?>" value="<?php echo $instance['link_text']; ?>" class="widefat"/>
    <small class="howto"><?php _e('Specify text for "all posts" link if you want to show separate link', 'best-blog'); ?></small>
  </li>

</ul>



<?php do_action('bestblog_author_widget_add_opts', $this, $instance); ?>
<?php
    }

    /* Check total number of users on the website */
    public function count_users()
    {
        $user_count = count_users();
        if (isset($user_count['total_users']) && !empty($user_count['total_users'])) {
            return $user_count['total_users'];
        }
        return 0;
    }
    /**
    * Limit character description
    *
    * @param string  $string Content to trim
    * @param int     $limit  Number of characters to limit
    * @param string  $more   Chars to append after trimmed string
    * @return string Trimmed part of the string
    */
    public function trim_chars($string, $limit, $more = '...')
    {
        if (!empty($limit)) {
            $text = trim(preg_replace("/[\n\r\t ]+/", ' ', $string), ' ');
            preg_match_all('/./u', $text, $chars);
            $chars = $chars[0];
            $count = count($chars);

            if ($count > $limit) {
                $chars = array_slice($chars, 0, $limit);

                for ($i = ($limit -1); $i >= 0; $i--) {
                    if (in_array($chars[$i], array( '.', ' ', '-', '?', '!' ))) {
                        break;
                    }
                }

                $chars =  array_slice($chars, 0, $i);
                $string = implode('', $chars);
                $string = rtrim($string, ".,-?!");
                $string.= $more;
            }
        }

        return $string;
    }
}

add_action('widgets_init', 'bestblog_author_widget_register');
function bestblog_author_widget_register()
{
    register_widget('bestblog_Author_Widget');
}
