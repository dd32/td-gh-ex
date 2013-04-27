<div class="grid_6 alpha">
    <div class="footer_widget first">
	 <?php if (is_active_sidebar('first-footer-widget-area')) : ?>
            <?php dynamic_sidebar('first-footer-widget-area'); ?>
        <?php else : ?>
    <h4>Company About Us</h4>
    <p>We provide high-quality spa treat ments delivered in a serene setting are the very heart of a quality spa experience. Our Spa services are considered to be the best.</p>
	 <?php endif; ?>
    </div>
    </div>
     <div class="grid_6">
    <div class="footer_widget">
	<?php if (is_active_sidebar('second-footer-widget-area')) : ?>
            <?php dynamic_sidebar('second-footer-widget-area'); ?>
            <?php else : ?> 
    <h4>Latest News</h4>
    <p>We provide so many services like spa treatments, body treatments, massage. Other than this varieties of facials are available which can beautify your skin.</p>
	 <?php endif; ?> 
    </div>
    </div>
    <div class="grid_6">
    <div class="footer_widget">
	 <?php if (is_active_sidebar('third-footer-widget-area')) : ?>
            <?php dynamic_sidebar('third-footer-widget-area'); ?>
        <?php else : ?>
    <h4>Search Anything</h4>
    <p> Qarius dui, quis posuere nibh ollis quis. Mauris omma rhoncus rttitor. <a href="http://www.appointway.com">http://appointway.com</a> </p>
            <form class="searchform" action="#" method="get">
                <input onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}"  value="Search" type="text" name="s" id="s" />
                <input type="submit" value="" name="submit"/>
            </form>
	<?php endif; ?>
    </div>
    </div>
    <div class="grid_6 omega">
    <div class="footer_widget last">
	 <?php if (is_active_sidebar('fourth-footer-widget-area')) : ?>
     <?php dynamic_sidebar('fourth-footer-widget-area'); ?>
     <?php else : ?>
    <h4>Footer Widgets</h4>
    <p>Footer is widgetized. To setup the footer, drag the required Widgets in Appearance -> Widgets Tab in the First, Second, Third and Fourth Footer Widget Areas.</p>
	<?php endif; ?>
    </div>
    </div>