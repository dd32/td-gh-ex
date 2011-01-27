<?php

    if ( !current_user_can('manage_options') ) {
        wp_die( __( 'You do not have sufficient permissions to manage options for this site.','contexture-page-security' ) );
    }

    global $themeDir,
           $hook_suffix;

    $newOpts = array();
    $message = '';
    $debugOpts = '';


    echo "<!-- The hook for the current page is \"";
    print_r( $hook_suffix );
    echo "\" -->\n";


    if(!empty($_POST) && wp_verify_nonce($_POST['_wpnonce'],'aj-options')){


        //Get rid of any leading forward slashes
        $_POST['css-path'] = preg_replace('/^\/+/', '', trim( $_POST['css-path'] ) );

        //Set new options
        $newOpts['css-path'] = $_POST['css-path'];
        $newOpts['attrib'] = (isset($_POST['attrib'])) ? 'false' : 'true';

        //Update the options
        ctx_aj_set_options($newOpts);
        //Show success message

        //Build error message
        $message = sprintf(__('<div id="message" class="updated below-h2">
            <p>
                Options updated. <a href="%s" target="_blank">View your site</a> to see how it looks.
            </p>%s
        </div>','adventurejournal'),
                get_bloginfo('url'),
                (isset($_POST['attrib'])) ? __('<p>I see you removed the attribution. Does this mean we\'re not friends any more?</p>','adventurejournal') : ''
        );
    }

    //Load default theme variables
    $AJOpts = get_option('ctx-adventurejournal-options');

    if($_GET['showopts']=='true'){
        $debugOpts = '<hr/><pre>'.print_r($AJOpts,true).'</pre><hr/>';
    }

    ?>
    <script type="text/javascript">
        jQuery(function(){
            jQuery('#attrib').click(function(){
                if( jQuery(this).filter(':checked').length>0 ){
                    return confirm('<?php _e('Are you sure? Why not leave it for a week or two? We would really appreciate it.','adventurejournal') ?>');
                }
            });
            jQuery('#show-more').click(function(){
                jQuery(this).hide();
                jQuery('#more-opts').show();
            });
        });
    </script>
    <style type="text/css">
        #ad-msg-auth, #ad-msg-anon { width:500px; }

        #ctx-about {width:326px;float:right;border:1px solid #e5e5e5;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;padding:10px;margin-top:25px;margin-right:20px;margin-left:10px;}
        #ctx-about a.img-block {display:block;text-align:center;}
        #ctx-about p, #ctx-about div {padding-left:10px;color:#9c9c9c;}
        #ctx-about p a { color:gray; }
        #ctx-ps-opts-form {float:left;width:765px;}
        .ctx-footnote { color:#9C9C9C; font-style:italic; }
        #show-more { cursor:pointer; color:gray; visibility:hidden; }
        #ctx-opts-table {  }
    </style>
<div class="wrap">
<table cellpadding="0" cellspacing="0" id="ctx-opts-table" style="border:none;width:100%;">
    <tr>
        <td id="ctx-ps-opts-form">
                <div class="icon32" id="icon-users"><br/></div>
                <h2><?php _e('Adventure Journal Options','adventurejournal') ?></h2>
                <?php echo $message,$debugOpts; ?>
                <p></p>
                <form method="post" action="">
                    <?php wp_nonce_field('aj-options'); ?>
                    <h3 class="title"><?php _e('Custom Stylesheet','adventurejournal'); ?></h3>
                    <p><?php _e('You can use a custom stylesheet to override the default Adventure Journal styles.
                    We suggest you keep the custom css file in the <code>/wp-content/</code>
                    directory so that upgrades to WordPress or Adventure Journal don\'t erase your CSS.','adventurejournal') ?></p>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">
                                <label for="filter-menu"><?php _e('CSS File Location:','adventurejournal') ?></label>
                            </th>
                            <td>
                                <label>
                                    <?php echo 'http://'.$_SERVER['SERVER_NAME'].'/' ?>
                                    <input type="text" name="css-path" id="css-path" title="Example: wp-content/adventurejournal_override.css" style="width:250px;" value="<?php echo $AJOpts['css-path']; ?>" /> <span style="color:red;"><?php if(!file_exists(ABSPATH.$AJOpts['css-path'])){ _e('Notice: File does not exist! ('.'http://'.$_SERVER['SERVER_NAME'].'/'.$AJOpts['css-path'].')','adventurejournal'); } ?></span><br/>
                                </label>
                            </td>
                        </tr>
                    </table>

                    <h3 class="title"><?php _e('Layout','adventurejournal'); ?></h3>
                    <p>You can change the site's layout from the <a href="<?php admin_url('themes.php?page=theme-layouts')?>">layout screen</a>.</p>
                <h5 id="show-more" style="display:none"><?php _e('(+) show advanced options','adventurejournal') ?></h5>
                    <div id="more-opts" style="display:none">
                        <h3 class="title"><?php _e('Attribution','adventurejournal'); ?></h3>
                        <p><?php _e('If you\'re feeling particularly cold-hearted, you can hide the attribution
                            links at the bottom of the theme. We think you\'re a good sort, though, and know that you
                            would never, ever stoop so low.','adventurejournal') ?></p>
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row">
                                    <label for="filter-menu"><?php _e('Hide Attribution:','adventurejournal') ?></label>
                                </th>
                                <td>
                                    <label>
                                        <input type="checkbox" name="attrib" id="attrib" <?php if($AJOpts['attrib']=='false'){echo ' checked="checked"';}?> />
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </div>


                  <p>
                    <input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
                    </p>
                </form>

        </td>
        <td style="vertical-align:top;">
            <div id="ctx-about">
                <a class="img-block" href="http://www.contextureintl.com"><img src="<?php echo get_bloginfo('template_url').'/images/ctx-logo.gif'; ?>" alt="Contexture International" /></a>
                <p>Contexture International is an all-in-one agency specializing in <a href="http://www.contextureintl.com/portfolio/graphic-design/">graphic design</a>, <a href="http://www.contextureintl.com/portfolio/web-interactive/">web design</a>, and <a href="http://www.contextureintl.com/portfolio/broadcast-video-production/">broadcast and video production</a>, with an unparalleled ability to connect with the heart of your audience.</p>
                <p>Contexture's staff has successfully promoted organizations and visionaries for more than 2 decades through exceptional storytelling, in just the right contexts for their respective audiences, with overwhelming returns on investment.  See the proof in our <a href="http://www.contextureintl.com/portfolio/">portfolio </a>or learn more <a href="http://www.contextureintl.com/about-us/">about us</a>.</p>
                <div><a href="http://www.contextureintl.com/">Need a custom web or video project?</a></div>
                <div><a href="http://www.contextureintl.com/wordpress/adventure-journal-wordpress-theme/">Need help with Adventure Journal?</a></div>
            </div>
        </td>
    </tr>
</table>
</div>