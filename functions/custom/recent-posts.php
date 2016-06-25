<?php
add_action('widgets_init', 'awada_recent_posts_widgets');
function awada_recent_posts_widgets()
{
    register_widget('awada_footer_recent_posts');
    register_widget('awada_multi_widget');
	register_widget('awadaArchieveWidget');
}

/**
 * Adds widget for recent Post in footer.
 */
class awada_footer_recent_posts extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'awada_footer_recent_posts', //ID
            __('Awada Recent Posts', 'awada'), // Name
            array('description' => __('Display Recent posts on your sites', 'awada'),) // Args
        );
    }

    public function widget($args, $instance)
    {
        $title = !empty($instance['title']) ? apply_filters('widget_title', $instance['title']) : 'Receent Posts';
        $number_of_posts = !empty($instance['number_of_posts']) ? apply_filters('widget_title', $instance['number_of_posts']) : 5;
        $rmp_url = !empty($instance['rmp_url']) ? apply_filters('rmp_url', $instance['rmp_url']) : '#';

        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title']; ?>
        <?php $loop = new WP_Query(array('post_type' => 'post', 'showposts' => $number_of_posts, 'ignore_sticky_posts' => 1));
        if ($loop->have_posts()) : ?>
            <ul class="recent_posts_widget">
				<?php while ($loop->have_posts()) : $loop->the_post(); ?>
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('awada_recent_widget_thumb'); the_title(); ?></a>
					<a class="readmore" href="<?php the_permalink(); ?>"><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></a>
					<?php esc_attr(the_tags('Tags: ', ', ')); ?>
				</li>
				<?php endwhile; ?>
				<a href="<?php echo esc_url($rmp_url); ?>" class="btn btn-primary btn-lg" title=""><?php _e('Read More Posts', 'awada'); ?></a>
			</ul>
        <?php endif; ?>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        if (isset($instance['title']) && isset($instance['number_of_posts'])) {
            $title = $instance['title'];
            $number_of_posts = $instance['number_of_posts'];
        } else {
            $title = __('Recent Post', 'awada');
            $number_of_posts = 4;
        }
        $rmp_url = '';
        if (isset($instance['rmp_url']))
            $rmp_url = $instance['rmp_url'];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'awada'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label
                for="<?php echo esc_attr($this->get_field_id('number_of_posts')); ?>"><?php _e('Number of pages to show:', 'awada'); ?></label>
            <input size="3" maxlength="2" id="<?php echo esc_attr($this->get_field_id('number_of_posts')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('number_of_posts')); ?>" type="text"
                   value="<?php echo esc_attr($number_of_posts); ?>"/>
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id('rmp_url'); ?>"><?php _e('Read More Posts URL:', 'awada'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('rmp_url')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('rmp_url')); ?>" type="text"
                   value="<?php echo $rmp_url != "" ? esc_url($rmp_url) : ''; ?>"/>
        </p>
    <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['rmp_url'] = (!empty($new_instance['rmp_url'])) ? strip_tags($new_instance['rmp_url']) : '';
        $instance['number_of_posts'] = (!empty($new_instance['number_of_posts'])) ? strip_tags($new_instance['number_of_posts']) : '';
        return $instance;
    }

}

/* multi-widget */

class awada_multi_widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'awada_multi_widget',
            __('Awada Multi-Widget', 'awada'),
            array('description' => __('This widget shows Recent Posts,Recent Comments & Popular Posts', 'awada'))
        );
    }

    function widget($args, $instance)
    {
        extract($args);
        $popular_posts_num = apply_filters('widget_title', $instance['popular_posts_num']);
        $recent_posts_num = apply_filters('widget_title', $instance['recent_posts_num']);
        $recent_comment_num = apply_filters('widget_title', $instance['recent_comment_num']);
        echo $before_widget; ?>
        <div id="tabbed_widget" class="tabbable">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#recent" data-toggle="tab"><?php _e('RECENT', 'awada'); ?></a></li>
            <li><a href="#new" data-toggle="tab"><?php _e('POPULAR', 'awada'); ?></a></li>
            <li><a href="#commentstab" data-toggle="tab"><?php _e('COMMENTS', 'awada'); ?></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" id="new">
                <?php $pop = new WP_Query(array('post_type' => 'post', 'showposts' => $popular_posts_num, 'orderby' => 'comment_count', 'ignore_sticky_posts' => 1));
                    if ($pop->have_posts()): ?>
                    <ul class="recent_posts_widget">
                        <?php while ($pop->have_posts()) : $pop->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('awada_recent_widget_thumb'); the_title(); ?></a>
                            <a class="readmore" href="<?php the_permalink(); ?>"><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></a>
                        </li>
                        <?php endwhile; ?>
                    </ul><?php
                    wp_reset_query();
                endif; ?>
            </div>

            <div class="tab-pane active" id="recent"><?php
                $loop = new WP_Query(array('post_type' => 'post', 'showposts' => $recent_posts_num));
                if ($loop->have_posts()) :?>
                    <ul class="recent_posts_widget">
                        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('awada_recent_widget_thumb'); the_title(); ?></a>
                                <a class="readmore" href="<?php the_permalink(); ?>"><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php wp_reset_query(); endif; ?>
            </div>

            <div class="tab-pane" id="commentstab">
                <ul class="recent_posts_widget">
                <?php $args = array(
                        'number' => $recent_comment_num,
                    );
                    $comments = get_comments($args);
                    foreach ($comments as $comment) {
                        ?>
                        <li>
                        <a href="<?php echo get_the_permalink($comment->comment_post_ID); ?>"><?php echo get_avatar($comment, 77); echo get_the_title($comment->comment_post_ID); ?></a>
                        <a class="readmore" href="<?php echo get_the_permalink($comment->comment_post_ID); ?>"><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></a>
                        </li><?php
                    }
                    wp_reset_query();?>
                </ul>
            </div>
            </div>
        </div>
        <?php echo $before_widget;
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['recent_posts_num'] = strip_tags($new_instance['recent_posts_num']);
        $instance['popular_posts_num'] = strip_tags($new_instance['popular_posts_num']);
        $instance['recent_comment_num'] = strip_tags($new_instance['recent_comment_num']);
        return $instance;
    }

    function form($instance)
    {
        if (isset($instance['recent_posts_num'])) {
            $recent_posts_num = esc_attr($instance['recent_posts_num']);
        } else {
            $recent_posts_num = 4;
        }
        if (isset($instance['popular_posts_num'])) {
            $popular_posts_num = esc_attr($instance['popular_posts_num']);
        } else {
            $popular_posts_num = 4;
        }
        if (isset($instance['recent_comment_num'])) {
            $recent_comment_num = esc_attr($instance['recent_comment_num']);
        } else {
            $recent_comment_num = 4;
        }
        ?>
        <p>
            <label
                for='<?php echo $this->get_field_id('title'); ?>'><?php _e('Number of recent posts:', 'awada'); ?></label>
            <input type="text" id='<?php echo $this->get_field_id("recent_posts_num"); ?>'
                   name='<?php echo $this->get_field_name("title"); ?>' value="<?php echo $recent_posts_num; ?>"
                   class="widefat">
        </p>
        <p>
            <label
                for='<?php echo $this->get_field_id('popular_posts_num'); ?>'><?php _e('Number Of Popular Posts:', 'awada'); ?></label>
            <input type="text" id='<?php echo $this->get_field_id("popular_posts_num"); ?>'
                   name='<?php echo $this->get_field_name("popular_posts_num"); ?>'
                   value="<?php echo $popular_posts_num; ?>" class="widefat">
        </p>
        <p>
        <label
            for='<?php echo $this->get_field_id('recent_comment_num'); ?>'><?php _e('Number Of Recent Comments:', 'awada'); ?></label>
        <input type="text" id='<?php echo $this->get_field_id("recent_comment_num"); ?>'
               name='<?php echo $this->get_field_name("recent_comment_num"); ?>'
               value="<?php echo $recent_comment_num; ?>" class="widefat">
        </p><?php
    }
}

class awadaArchieveWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'awada_archieves',
            __('Awada Archieves', 'awada'),
            array('description' => __('Awada Archieves Widget', 'awada'))
        );
    }

    function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        if ($title != "") {
            echo $before_title . $title . $after_title;
        } else {
            echo $before_title . 'Archives' . $after_title;
        }
        echo $before_widget; ?>
        <ul class="cat_list_widget"><?php
            $html = wp_get_archives(array(
                'echo' => false,
                'before' => '',
            ));
            echo $html; ?>
        </ul>
        <?php echo $after_widget;
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    function form($instance)
    {
        if (isset($instance['title'])) {
            $title = esc_attr($instance['title']);
        } else {
            $title = __('Archives', 'awada');
        }
        ?>
        <p>
            <label for='<?php echo $this->get_field_id('title'); ?>'><?php _e('Title:', 'awada'); ?></label>
            <input type="text" id='<?php echo $this->get_field_id("title"); ?>'
                   name='<?php echo $this->get_field_name("title"); ?>' value="<?php echo $title; ?>" class="widefat">
        </p><?php
    }
}
?>