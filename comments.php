<?php 

if  ( comments_open() && ( have_comments()) ) : 

	echo comments_number( 
		'<h3 class="comments">' . esc_html__( "No comments","alhena-lite") . '</h3>', 
		'<h3 class="comments">1 ' . esc_html__( "comment","alhena-lite") . '</h3>', 
		'<h3 class="comments">% ' . esc_html__( "comments","alhena-lite") . '</h3>' 
	); 

?>

<section id="comments">
	<ul class="commentlist">
		<?php wp_list_comments('type=all&callback=alhenalite_comment&short_ping=TRUE'); ?>
	</ul>
</section>

<?php endif; ?>

<?php 
function alhenalite_comment ($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
 
 <article id="comment-<?php comment_ID(); ?>" class="comment-container">
	 
     <div class="comment-avatar">
       	<?php echo get_avatar( $comment->comment_author_email, 80 ); ?>
	 </div>
     
 	<div class="comment-text">
	   <header class="comment-author">
       		
        	<span class="author"><?php printf(esc_html__('<cite>%s</cite>',"alhena-lite"), get_comment_author_link()) ?></span>
            <time datetime="<?php echo get_comment_date("c")?>" class="comment-date">  
      		<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(esc_html__('%1$s at %2$s',"alhena-lite"), get_comment_date(),  get_comment_time()) ?></a> - 
	  		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      		<?php edit_comment_link(esc_html__('(Edit)',"alhena-lite")) ?>
    		</time>
            
      </header>

      <?php if ($comment->comment_approved == '0') : ?>
         <br /><em><?php esc_html_e('Your comment is awaiting approval.',"alhena-lite") ?></em>
      <?php endif; ?>
	  
	  <?php comment_text() ?>
      
	</div>
    
 	<div class="clear"></div>
    
</article>

<?php } ?>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>

<div class="wp-pagenavi">
     <div class="alignleft"><?php previous_comments_link(esc_html__('&laquo;',"alhena-lite")) ?></div>
     <div class="alignright"><?php next_comments_link(esc_html__('&raquo;',"alhena-lite")) ?></div>
</div> 
<?php endif; // check for comment navigation ?>

<div class="clear"></div>

<section class="contact-form">

	<?php comment_form(array('label_submit' =>  esc_html__('Comment',"alhena-lite")) ); ?>
    
    <div class="clear"></div>

</section>