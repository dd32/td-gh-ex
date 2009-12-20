<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
 if (!empty($_SERVER['SCRIPT_FILENAME'])&& 'comments.php'==basename($_SERVER['SCRIPT_FILENAME']) )
            die('Please do not load this page directly. Thanks!');
    if(!empty($post->post_password)){
        if($_COOKIE['wp-postpass_'.COOKIEHASH]!=$post->post_password ){?>
<p>
  <?php _e('Enter your password to view comments.') ?>
</p>        
<?php return;}
    }
?>
<?php if(get_comments_number()>0): ?>
<h3 class="commentstitle">
  <?php _e('Comments')?></h3>
<?php endif;if(comments_open()):?>
<ol class="comment-list">  
  <?php foreach($comments as $comment): ?>  
  <?php  $ctype=get_comment_type(); if ($ctype=='comment'){ ?>  
  <li class="comment">  
    <?php echo get_avatar($comment, 80) ?>
    <?php comment_text() ?>    
    <cite>            
      <?php if($comment->comment_approved=='0'): ?>
      <?php _e('Your comment is awaiting moderation.')?><br />            
      <?php endif; comment_author_link() ?> | 
      <a href="#comment-<?php comment_ID() ?>">                
        <?php comment_date();?> # 
        <?php comment_time()?></a>        
      <?php edit_comment_link(__('Edit'),' | ' ) ?>      
    </cite>  </li>  
  <?php }else{ ?>    
  <li class="trackping">        
    <?php comment_text() ?>        
    <cite>
      <?php if($comment->comment_approved=='0'): _e('Your comment is awaiting moderation.') ?><br />              
      <?php endif; comment_author_link()?> | 
      <a href="#comment-<?php comment_ID() ?>">              
        <?php comment_date();?> # 
        <?php comment_time()?></a>              
      <?php edit_comment_link(__('Edit'),' | ' )?>        
    </cite>    </li>  
  <?php } endforeach;?>
</ol>
<?php endif;?>
<?php if (comments_open()):if(get_option('comment_registration')&& !$user_ID ): ?>
<p>
  <?php printf(__('You must bu <a href="%s">logged in </a> to post a comment.'),get_option('site_url')."/wp-login.php?redirect_to=".urlencode(get_permalink()) ) ?>
</p>
<?php else:?>
<form action="<?php echo get_option('siteurl')?>/wp-comments-post.php" method="post" id="formset">
  <fieldset>
    <legend>
      <?php _e('Leave a comment')?>
    </legend>  <br />
    <?php if($user_ID):?>  
    <p>
      <?php printf(__('Loged in as %s'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>' )?>    
      <a href="<?php echo get_option('siteurl')?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>">
        <?php _e('Log Out')?> &raquo;</a>  
    </p>
    <?php else:?>  
    <div id="formtop">    
      <div class="formbox">        <small>
          <?php _e('Name');if($req) _e('(required)')?></small><br />        
        <label for="author">
          <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author);?>" size="24" tabindex="1" />
        </label>    
      </div>    
      <div class="formbox">        <small>
          <?php _e('Mail (will not be published)');if($req) _e('(required)')?></small><br />        
        <label for="email">
          <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email)?>" size="24" tabindex="2" />
        </label>    
      </div>    
      <div class="formbox">        <small>
          <?php _e('Website')?></small><br />        
        <label for="url">
          <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url)?>" size="24" tabindex="3" />
        </label>    
      </div>   
    </div>
    <?php endif?>   
<textarea name="comment" id="comment" cols="65" rows="10" tabindex="4"></textarea>   
    <p id="allowed"><small><strong>XHTML:</strong>
        <?php printf(__('You can use these tags: %s'),allowed_tags())?></small>   
    </p>     
    <p> 
      <input type="submit" id="submit" tabindex="5" value="<?php echo esc_attr_e('Submit Comment'); ?>" />      
      <input type="hidden" name="comment_post_ID" value="<?php echo $id?>" />  
    </p>  
    <?php do_action('comment_form',$post->ID)?>
    </fieldset>
</form>
<?php endif;else:?>
<p>
  <?php _e('Sory, the comment form is closed at this time.')?>
</p>
<?php endif?>
