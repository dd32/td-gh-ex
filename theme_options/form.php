<h3><?php _e('RSS Feed Icon', 'theme') ?></h3>
<p><?php _e('Please notice that the configuration of the feed icon can be found in Design -> Widgets -> Feed Link.', 'theme') ?></p>

<h3><?php _e ('Contact form', 'theme') ?></h3>
<p><?php _e('Some words to the contact form: When an user use the form the mail will be send to the mail adress which is deposited in wordpress for the author of this page.', 'theme') ?></p>

<h3><?php _e ('Settings', 'theme') ?></h3>
<table class="form-table">
<tr valign="top">
  <th scope="row"><?php _e('Sidebar Adjustment:', 'theme') ?></th>
  <td> <select name="sidebar_adjustment">
       <?php $adjust = $this->LoadSetting('sidebar_adjustment'); ?>
         <option value="right" <?php echo ($adjust == 'right') ? 'selected' : '' ?>><?php _e('Right', 'theme') ?></option>
         <option value="left" <?php echo ($adjust == 'left') ? 'selected' : '' ?>><?php _e('Left', 'theme') ?></option>
       </select></td>
</tr>

<tr valign="top">
  <th scope="row"><?php _e('Featured posts:', 'theme') ?></th>
  <td> <select name="featured_cat_id">
         <option value=""><?php _e ('Please choose a category', 'theme') ?></option>
         <?php $current_cat_id = $this->LoadSetting('featured_cat_id'); ForEach (get_categories() AS $cat) : ?>
         <option value="<?php Echo $cat->cat_ID ?>"
                 <?php Echo ($cat->cat_ID == $current_cat_id) ? 'selected="selected" ' : '' ?>>
           <?php Echo HTMLSpecialChars($cat->name) ?>
         </option>
         <?php EndForEach; ?>
       </select></td>
</tr>

</table>

<table class="form-table">
<tr valign="top">
  <th scope="row">
    <input type="checkbox" name="use_excerpts" value="yes" <?php echo ($this->LoadSetting('use_excerpts')) ? 'checked="checked" ' : ''?>/>            
    <?php _e('On pages which list articles show only an excerpt. (Default is to show the whole article content.)', 'theme') ?></th>
</tr>
<tr valign="top">
  <th scope="row">
    <input type="checkbox" name="external_links" value="yes" <?php echo ($this->LoadSetting('external_links')) ? 'checked="checked" ' : ''?>/>
    <?php _e('Open external links in a new window.', 'theme') ?></th>
</tr>
<tr valign="top">
  <th scope="row">
    <input type="checkbox" name="imagebox" value="yes" <?php echo ($this->LoadSetting('imagebox')) ? 'checked="checked" ' : ''?>/>
    <?php PrintF(__('Open linked images in the <a href="%s">FancyImageBox</a>.', 'theme'), 'http://fancybox.net/') ?></th>
</tr>
<tr valign="top">
  <th scope="row">
    <input type="checkbox" name="kick_meta_generator" value="yes" <?php echo ($this->LoadSetting('kick_meta_generator')) ? 'checked="checked" ' : ''?>/>
    <?php _e('Remove the <i>&lt;meta name="generator" ... /&gt;</i> tag from the header of your wordpress pages.', 'theme') ?></th>
</tr>
<tr valign="top">
  <th scope="row">
    <input type="checkbox" name="no-print" value="yes" <?php echo ($this->LoadSetting('no-print')) ? 'checked="checked" ' : ''?>/>
    <?php _e('Avoid printing the website.', 'theme') ?></th>
</tr>
<tr valign="top">
  <th scope="row">
    <input type="checkbox" name="hide-be-berlin-logo" value="yes" <?php echo ($this->LoadSetting('hide-be-berlin-logo')) ? 'checked="checked" ' : ''?>/>
    <?php _e('Hide the Be-Berlin Logo in the header.', 'theme') ?></th>
</tr>
</table>

<h3><?php _e ('Handle with care', 'theme') ?></h3>
<p><?php _e('You should <b>not touch the following settings</b> if you not really know what you are doing. If you change these settings <b>your design can break</b> in certain cases. Check the fields below only if you want to use your own plugins which are better then the embedded ones.', 'theme') ?></p>
<table class="form-table">
<tr valign="top">
  <th scope="row">
    <input type="checkbox" name="no_gallery_cleaning" value="yes" <?php echo ($this->LoadSetting('no_gallery_cleaning')) ? 'checked="checked" ' : ''?>/>            
    <?php _e('<b>Do not</b> rewrite the wordpress gallery function with a valid one.', 'theme') ?></th>
</tr>
<tr valign="top">
  <th scope="row">
    <input type="checkbox" name="no_next_page_bug_fix" value="yes" <?php echo ($this->LoadSetting('no_next_page_bug_fix')) ? 'checked="checked" ' : ''?>/>            
    <?php _e('<b>Do not</b> fix the "Next-Page-Tag"-Bug in the wordpress TinyMCE Editor.', 'theme') ?></th>
</tr>
<!--
<tr valign="top">
  <th scope="row">
    <input type="checkbox" name="no_theme_by" value="yes" <?php echo ($this->LoadSetting('no_theme_by')) ? 'checked="checked" ' : ''?>/>            
    <?php _e('<b>Do not</b> show the "theme by" part in the footer.', 'theme') ?></th>
</tr>
-->
</table>