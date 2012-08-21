<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title('&#124;', true, 'right'); ?><?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lte IE 9]><style type="text/css">#header h1 i{bottom:.6em;}</style><![endif]-->
<!--[if lte IE 8]><style type="text/css">#center{width:1000px;}</style><![endif]-->
<!--[if lte IE 7]><style type="text/css">#header{padding:0 auto;}#header ul {padding-left:1.5em;}#header ul li{float:left;}</style><![endif]-->
<!--[if lte IE 6]><style type="text/css">#center{width:800px;}#banner{background:none;}.overlay{display:none;}.browsing li {width:47%;margin:1%;}#footer{background-color:#111);}</style><![endif]-->

<!-- Begin WordPress Header -->
<?php wp_head(); ?>
<!-- End WordPress Header -->

</head>
<body <?php body_class(); ?>>
<div id="header">

<!-- The Website Title and Slogan -->
<h1 id="fittext3"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a><i>- <?php bloginfo('description');?> -</i></h1>
<!-- End Website Title and Slogan -->

<!-- The Navigation Menu -->
<ul>
<?php if ( has_nav_menu( 'bar' ) ) :  wp_nav_menu( array( 'theme_location' => 'bar', 'depth' => 2 ) ); else : ?>
<?php wp_list_pages( 'title_li=&depth=2' ); ?>
<?php endif; ?>
</ul>
<!-- End Navigation Menu -->

</div>

<!-- Setting up The Layout of the Webpage -->
<div id="banner"></div>
<div id="white">
<div id="center">
<div id="floatfix">

<?php $semperfi_404 = false;/* A 404 Error check */?> 
<?php if (is_search()) : ?>
<!-- Searching Code -->
    Your search for <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = esc_html($s, 1); $count = $allsearch->post_count; ''; '"<span class="search-terms">'; echo $key; '</span>"'; ' resulted in '; echo $count . ' '; 'articles found.'; wp_reset_query(); ?>
    <?php while (have_posts()) : the_post(); ?>
    <?php the_post_thumbnail('page-thumbnail'); ?>
    <?php the_excerpt(); ?>
    <?php endwhile; ?>
<!-- End Search -->  
    
<?php elseif ( have_posts() && is_home() || is_404() || is_category() || is_day() || is_month() || is_year() || is_paged() ) : ?>
<!-- Many Things -->
	<ul class="browsing">
<?php while (have_posts()) : the_post(); ?>
	<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
		<h5><span><?php the_time('M') ?><br/><?php the_time('jS') ?></span><?php if ( get_the_title() ) { the_title();} else { echo '(No Title)';} ?></h5>
        <?php if ( has_post_thumbnail()) : ?><div class="underlay" ><?php the_post_thumbnail('big-thumbnail'); ?><img class="overlay" src="<?php echo get_stylesheet_directory_uri(); ?>/images/001.png" /></div><?php endif; ?>
        <?php the_excerpt(); ?>
	</a></li>
<?php endwhile; ?>
    </ul>
<?php if ( $wp_query->max_num_pages > 1 ) { ?>
	<ul class="starsbar">
    	<h6>
        	<span class="left"><?php next_posts_link('&#8249; Older Posts'); ?></span>
            &#9733; &#9733; &#9733; &#9733; &#9733;
            <span class="right"><?php previous_posts_link('Newer Posts &#8250;'); ?></span>
		</h6>
	</ul>
<!-- End Many Things -->
<?php } else { ?>
	<ul class="starsbar">
		<h6>
        &#9733; &#9733; &#9733; &#9733; &#9733;
        </h6>
	</ul>
<?php } ?>

<?php if (have_posts() != true) : ?>

<!-- 404 Error -->
<div class="reading">
    <div class="spacing"></div>
    <h3 class="title">Code 404.</h3>
    <div class="underlay"><img src="<?php echo get_template_directory_uri(); ?>/images/error404.jpg" class="attachment-page-thumbnail wp-post-image"></div>
    <span class="content"><p>Echo Bravo Eight Two Four Five. This is Three Two One One Romeo. Be advised. We're recieving a coding error 404. Repeat, We're recieving a coding error 404. You are to be extracked at the rondevu point at <?php echo date('H') ?>57 Hundred Hours. Over and out.</p></span>
    </div>
    <ul class="commentbox">
    <h4 class="title">Comments</h4>
    
    <ol class="commentlist">
		<li class="comment even thread-even">
				<div id="div-comment-1280" class="comment-body">
                    <div class="comment-author vcard">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/gary.jpg" class="avatar avatar-100 photo grav-hashed grav-hijack" height="100" width="100"> <cite class="fn">Gary</cite> <span class="says">says:</span>
                    </div>
    				<p>"Well, it appears that link fed us bad intell. We are to be extracked at the rondevu point in <?php echo date('H') ?>00 Hundred Hours which doesn't give us much time, but we should manage just fine."</p>
					</div>
		</li>
		<li class="comment odd alt">
				<div id="div-comment-1280" class="comment-body">
                    <div class="comment-author vcard">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/mike.jpg" class="avatar avatar-100 photo grav-hashed grav-hijack" height="100" width="100"> <cite class="fn">Mike</cite> <span class="says">says:</span>
                    </div>
    				<p>Just great! So tired of humping it through these data files. And for what!? Nothing. Absolutely nothing...</p>
					</div>
		</li>
        <li class="comment even thread-even">
				<div id="div-comment-1280" class="comment-body">
                    <div class="comment-author vcard">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/gary.jpg" class="avatar avatar-100 photo grav-hashed grav-hijack" height="100" width="100"> <cite class="fn">Gary</cite> <span class="says">says:</span>
                    </div>
    				<p>I know. You think they would spend more time checking the links. For cry eye, everything is on the inter-webs. It's not like this is something new. Hell, the fact that it is an 404 error means it's most likely old in the first place.</p>
					</div>
		</li>
		<li class="comment odd alt">
				<div id="div-comment-1280" class="comment-body">
                    <div class="comment-author vcard">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/mike.jpg" class="avatar avatar-100 photo grav-hashed grav-hijack" height="100" width="100"> <cite class="fn">Mike</cite> <span class="says">says:</span>
                    </div>
    				<p>Well, on the brightside, we don't have to keep searching any more.</p>
					</div>
		</li>
        <li class="comment even thread-even">
				<div id="div-comment-1280" class="comment-body">
                    <div class="comment-author vcard">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/gary.jpg" class="avatar avatar-100 photo grav-hashed grav-hijack" height="100" width="100"> <cite class="fn">Gary</cite> <span class="says">says:</span>
                    </div>
    				<p>Ya, that is nice.</p>
					</div>
		</li>
        <li class="comment odd alt">
				<div id="div-comment-1280" class="comment-body">
                    <div class="comment-author vcard">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/blackhawk.jpg" class="avatar avatar-100 photo grav-hashed grav-hijack" height="100" width="100"> <cite class="fn">Blackhawk Helicopter</cite> <span class="says">says:</span>
                    </div>
    				<p>Thump. Thump. Thump.</p>
					</div>
		</li>
        <li class="comment even thread-even">
				<div id="div-comment-1280" class="comment-body">
                    <div class="comment-author vcard">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/mike.jpg" class="avatar avatar-100 photo grav-hashed grav-hijack" height="100" width="100"> <cite class="fn">Mike</cite> <span class="says">says:</span>
                    </div>
    				<p>O Hell Ya! Do you hear that!</p>
					</div>
		</li>
        <li class="comment odd alt">
				<div id="div-comment-1280" class="comment-body">
                    <div class="comment-author vcard">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/pilot.jpg" class="avatar avatar-100 photo grav-hashed grav-hijack" height="100" width="100"> <cite class="fn">Gary</cite> <span class="says">says:</span>
                    </div>
    				<p>Come in Three Two One One Romeo.  Come in Three Two One One Romeo. Light that smoke. Repeat. Light that smoke.</p>
					</div>
		</li>
        <li class="comment even thread-even">
				<div id="div-comment-1280" class="comment-body">
                    <div class="comment-author vcard">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/gary.jpg" class="avatar avatar-100 photo grav-hashed grav-hijack" height="100" width="100"> <cite class="fn">Gary</cite> <span class="says">says:</span>
                    </div>
    				<p>Smoke is lit.</p>
					</div>
		</li>
        <li class="comment odd alt">
				<div id="div-comment-1280" class="comment-body">
                    <div class="comment-author vcard">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/pilot.jpg" class="avatar avatar-100 photo grav-hashed grav-hijack" height="100" width="100"> <cite class="fn">Gary</cite> <span class="says">says:</span>
                    </div>
    				<p>Roger, Roger. Prepair for extraction.</p>
					</div>
		</li>
        <li class="comment even thread-even">
        <div id="div-comment-1280" class="comment-body">
		<p>Hurry up and click the <a href="<?php echo home_url(); ?>/">Extraction Point</a>.</p>
        </div>
		</li>
</ol></ul>
    <ul class="starsbar">
    	<h6>
		&#9733; &#9733; &#9733; &#9733; &#9733;
		</h6>
	</ul>
<!-- End 404 Error -->
<?php $semperfi_404 = true;?>
<?php endif; ?> 

<!-- Some of the Formating is weird on so the formating is beautiful when the page is created -->
<?php elseif (have_posts()) : the_post();?>
	<div class="reading">
    <div class="spacing"></div>
	<h3 class="title"><?php if ( is_page()) : else : ?><span><?php the_time('M') ?><br/><?php the_time('jS') ?></span><?php endif; ?><?php if ( get_the_title() ) { the_title();} else { echo '(No Title)';} ?></h3>
	<?php if ( has_post_thumbnail()) : ?><div class="underlay">
		<?php the_post_thumbnail('big-thumbnail'); ?>
        
    </div>
<?php endif; ?>
	<span id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
		<?php the_content(); ?>
    </span>
    <span class="right" style="width:100%;"><?php wp_link_pages(); ?></span>
	<?php the_tags('<br />Tags: ', ', ', ''); ?>
	</div>
    
    <?php if ( is_page()) : ?>
    <ul class="starsbar">
    	<h6>
            <span class="left"><?php previous_post_link('%link', '&#8249; Older Pages'); ?></span>
            &#9733; &#9733; &#9733; &#9733; &#9733;
            <span class="right"><?php next_post_link('%link', 'Newer Pages &#8250;'); ?></span>
     	</h6>
	</ul>
    <?php elseif (is_attachment()) : ?>
    <ul class="starsbar">
    	<h6>
        	<span class="left"><?php previous_image_link( false, '&#8249; Previous Image'); ?></span>
            &#9733; &#9733; &#9733; &#9733; &#9733;
            <span class="right"><?php next_image_link( false, 'Next Image &#8250;'); ?></span>
		</h6>
	</ul>
    <?php else : ?>
	<ul class="starsbar">
    	<h6>
        	<span class="left"><?php previous_post_link('%link', '&#8249; Older Post'); ?></span>
            &#9733; &#9733; &#9733; &#9733; &#9733;
            <span class="right"><?php next_post_link('%link', 'Newer Post &#8250;'); ?></span>
		</h6>
	</ul>
    <?php endif; ?>

	
<?php endif; ?> <!-- End  -->

<!-- The Comments -->
<?php if($semperfi_404): ?>
<?php elseif ( comments_open() ) : ?>
<?php comments_template( '', true ); ?>
<?php elseif ( is_page() || is_single() ) : ?>
<ul class="commentbox hidecomment">
	<h4 class="title">Comments are closed</h4>
</ul>
<?php endif; ?>
<!-- End Comments -->

<!-- The Sidebar / Widget Area -->
<?php if (semperfi_is_sidebar_active('widget') ) : ?><ul class="browsing widget">
<li><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer widget1') ) : ?><?php endif; ?></li>
<li><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer widget2') ) : ?><?php endif; ?></li>
<li><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer widget3') ) : ?><?php endif; ?></li>
<li class="bottomline"></li>
</ul><?php endif; ?>
<!-- End Sidebar / Widget Area -->

<ul class="finishline"></ul>
</div>
</div>
</div>
<!-- Closing the Layout of the Page with a Finishing Touch. -->

<div id="footer">

<p>Good Old Fasioned Hand Written Code by <a href="http://schwarttzy.com/about-2/">Eric J. Schwarz</a> <!-- <?php echo get_num_queries(); ?> queries in <?php timer_stop(1); ?> seconds --></p>

</div>

<!-- Start of WordPress Footer  -->
<?php wp_footer(); ?>
<!-- End of WordPress Footer -->

</body>
</html>