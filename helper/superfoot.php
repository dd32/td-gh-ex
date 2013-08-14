
<?php if ( of_get_option('show_supersize') ) { ?>

<?php $multicheck = of_get_option('super_array');
if ($multicheck) {

if (!empty($multicheck['scrollarrows'])) { echo '<a id="prevslide" class="circled avedonicon-chevron-left"></a><a id="nextslide" class="circled avedonicon-chevron-right"></a>'; }
else {};

if (!empty($multicheck['progbar'])) { echo '<div id="progress-back" class="load-item"><div id="progress-bar"></div></div>'; }
else {};


echo '<div id="controls-wrapper" class="load-item row-fluid"><div id="controls" class="span10 offset1">';

if (!empty($multicheck['slidecount'])) { echo '<div id="slidecounter"><span class="slidenumber"></span> / <span class="totalslides"></span></div>'; }
else {};

if (!empty($multicheck['slidecaption'])) { echo '<div id="slidecaption"></div>'; }
else {};

if (!empty($multicheck['slidelist'])) { echo '<ul id="slide-list"></ul>'; }
else {};

echo '</div></div>';

} ?>


 <?php } ?>