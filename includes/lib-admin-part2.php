<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly


function weaverx_form_textarea($value,$media = false) {
	$twide =  ($value['type'] == 'text') ? '60' : '140';
    $rows = ( isset($value['val'] ) ) ? $value['val'] : 1;
    $place = ( isset($value['placeholder'] ) ) ? ' placeholder="' . $value['placeholder'] . '"' : '';
    if ( $rows < 1 )
        $rows = 1;
?>
	<tr>
	<th scope="row" align="right"><?php weaverx_echo_name($value); ?>:&nbsp;</th>
	<td colspan=2>
		<textarea<?php echo $place;?> name="<?php weaverx_sapi_main_name($value['id']); ?>" id="<?php echo $value['id']; ?>" rows=<?php echo $rows; ?> style="width: 350px"><?php echo(esc_textarea( weaverx_getopt($value['id'] ))); ?></textarea>
<?php
	if ($media) {
	weaverx_media_lib_button($value['id']);
	}
?>
&nbsp;<small><?php echo $value['info']; ?></small>
	</td>

	</tr>
<?php
}

function weaverx_form_text($value,$media=false) {
	$twide =  ($value['type'] == 'text') ? '60' : '160';
?>
	<tr>
	<th scope="row" align="right"><?php weaverx_echo_name($value); ?>:&nbsp;</th>
	<td>
		<input name="<?php weaverx_sapi_main_name($value['id']); ?>" id="<?php echo $value['id']; ?>" type="text" style="width:<?php echo $twide;?>px;height:22px;" class="regular-text" value="<?php echo esc_textarea(weaverx_getopt( $value['id'] )); ?>" />
<?php
	if ($media) {
	   weaverx_media_lib_button($value['id']);
	}
?>
	</td>
<?php	weaverx_form_info($value);
?>
	</tr>
<?php
}

function weaverx_form_val($value, $unit = '') {
?>
	<tr>
	<th scope="row" align="right"><?php weaverx_echo_name($value); ?>:&nbsp;</th>
	<td>
		<input name="<?php weaverx_sapi_main_name($value['id']); ?>" id="<?php echo $value['id']; ?>" type="text" style="width:50px;height:22px;" class="regular-text" value="<?php echo esc_textarea(weaverx_getopt( $value['id'] )); ?>" /> <?php echo $unit; ?>
	</td>
<?php	weaverx_form_info($value);
?>
	</tr>
<?php
}

function weaverx_form_text_xy($value,$x='X', $y='Y', $units='px') {
	$xid = $value['id'] . '_' . $x;
	$yid = $value['id'] . '_' . $y;
    $colon = ($value['name']) ? ':' : '';
?>
	<tr>
	<th scope="row" align="right"><?php weaverx_echo_name($value); echo $colon;?>&nbsp;</th>
	<td>
		<?php echo '<span class="rtl-break">' . $x;?>:<input name="<?php weaverx_sapi_main_name($xid); ?>" id="<?php echo $xid; ?>" type="text" style="width:40px;height:20px;" class="regular-text" value="<?php weaverx_esc_textarea(weaverx_getopt( $xid )); ?>" /> <?php echo $units; ?></span>
		&nbsp;<?php echo '<span class="rtl-break">' . $y;?>:<input name="<?php weaverx_sapi_main_name($yid); ?>" id="<?php echo $yid; ?>" type="text" style="width:40px;height:20px;" class="regular-text" value="<?php weaverx_esc_textarea(weaverx_getopt( $yid )); ?>" /> <?php echo $units; ?></span>
	</td>
<?php	weaverx_form_info($value);
?>
	</tr>
<?php
}

function weaverx_form_checkbox($value) {
?>
	<tr>
	<th scope="row" align="right"><?php weaverx_echo_name($value); ?>:&nbsp;</th>
	<td>
	<input type="checkbox" name="<?php weaverx_sapi_main_name($value['id']); ?>" id="<?php echo $value['id']; ?>"
<?php 		checked(weaverx_getopt_checked( $value['id'] )); ?> >
	</td>
<?php 	weaverx_form_info($value);
?>
	</tr>
<?php
}

function weaverx_form_radio( $value ) {
?>

	<tr>
	<th scope="row" align="right"><?php weaverx_echo_name($value); ?>:&nbsp;</th>
	<td colspan="2">

    <?php
    $cur_val = weaverx_getopt_default( $value['id'], 'black' );
	foreach ($value['value'] as $option) {
        $desc = $option['val'];
        if ( $desc == 'none' ) {
            $desc = "None";
        } else {
            $icon = weaverx_relative_url('assets/css/icons/search-' . $desc . '.png');
            $desc = '<img style="background-color:#ccc;height:24px; width:24px;" src="' . $icon . '" />';
        }
	?>
        <input type="radio" name="<?php weaverx_sapi_main_name($value['id']); ?>" value="<?php echo $option['val']; ?>"
        <?php checked($cur_val,$option['val']); ?> > <?php echo $desc; ?>&nbsp;
    <?php } ?>
    <?php echo '<br /><small style="margin-left:5%;">' . $value['info'] . '</small>'; ?>
    </td>
	</tr>
<?php
}


function weaverx_form_select_id( $value, $show_row = true ) {
    if ( $show_row ) { ?>

	<tr>
	<th scope="row" align="right"><?php weaverx_echo_name($value); ?>:&nbsp;</th>
	<td>
    <?php } ?>

	<select name="<?php weaverx_sapi_main_name($value['id']); ?>" id="<?php echo $value['id']; ?>">
    <?php
	foreach ($value['value'] as $option) {
	?>
		<option value="<?php echo $option['val'] ?>" <?php selected( (weaverx_getopt( $value['id'] ) == $option['val']));?>><?php echo $option['desc']; ?></option>
    <?php } ?>
	</select>
    <?php if ( $show_row ) { ?>
	</td>
    <?php weaverx_form_info($value); ?>
	</tr>
    <?php }
}

function weaverx_form_select_layout($value) {
	$list = array(array('val' => 'default', 'desc' => __('Use Default','weaver-xtreme') ),
        array('val' => 'right', 'desc' => __('Sidebars on Right','weaver-xtreme') ),
        array('val' => 'right-top', 'desc' => __('Sidebars on Right (stack top)','weaver-xtreme') ),
		array('val' => 'left', 'desc' => __('Sidebars on Left','weaver-xtreme') ),
        array('val' => 'left-top', 'desc' => __(' Sidebars on Left (stack top)','weaver-xtreme') ),
		array('val' => 'split', 'desc' => __('Split - Sidebars on Right and Left','weaver-xtreme') ),
        array('val' => 'split-top', 'desc' => __('Split (stack top)','weaver-xtreme') ),
		array('val' => 'one-column', 'desc' => __('No sidebars, content only','weaver-xtreme') )
	);


	$value['value'] = $list;
	weaverx_form_select_id($value);
}

function weaverx_form_link($value) {
    $id = $value['id'];

	$link = array ('name' =>  $value['name'] , 'id' => $id.'_color', 'type' => 'ctext', 'info' => $value['info']);
	$hover = array ('name' => '<small>' . __('Hover','weaver-xtreme') . '</small>', 'id' => $id.'_hover_color', 'type' => 'ctext', 'info' => __('Hover Color','weaver-xtreme'));

	weaverx_form_ctext($link);
    $id_strong = $id . '_strong';
    $id_em = $id . '_em';
    $id_u = $id . '_u';
?>
    <tr><td><small style="float:right;"><?php _e('Link Attributes:','weaver-xtreme'); ?></small></td><td colspan="2">

    <small style="margin-left:5em;"><strong><?php _e('Bold','weaver-xtreme'); ?></strong></small>
    <input type="checkbox" name="<?php weaverx_sapi_main_name($id_strong); ?>" id="<?php echo $id_strong; ?>"
<?php checked(weaverx_getopt_checked( $id_strong )); ?> >

    &nbsp;<small><em><?php _e('Italic','weaver-xtreme'); ?></em></small>
    <input type="checkbox" name="<?php weaverx_sapi_main_name($id_em); ?>" id="<?php echo $id_em; ?>"
<?php checked(weaverx_getopt_checked( $id_em )); ?> >

    &nbsp;<small><u><?php _e('Underline','weaver-xtreme'); ?></u></small>
    <input type="checkbox" name="<?php weaverx_sapi_main_name($id_u); ?>" id="<?php echo $id_u; ?>"
<?php checked(weaverx_getopt_checked( $id_u )); ?> >

<?php

	weaverx_form_ctext($hover, true);
    echo '</td></tr>';
}


function weaverx_form_note($value) {
?>
	<tr>
	<th scope="row" align="right">&nbsp;</th>
		<td style="float:right;font-weight:bold;"><?php weaverx_echo_name($value); ?>&nbsp;
<?php
	weaverx_form_help($value);
?>
		</td>
<?php
	weaverx_form_info($value);
?>
	</tr>
<?php
}

function weaverx_form_info($value) {
	if ($value['info'] != '') {
	echo('<td style="padding-left: 10px"><small>'); echo $value['info']; echo("</small></td>");
	}
}


function weaverx_form_widget_area( $value, $submit = false ) {
	/* build the rows for area settings
     * Defined Areas:
     *  'container' => '0', 'header' => '0', 'header_html' => '0', 'header_sb' => '0',
        'infobar' => '5px', 'content' => 'T:4px, B:8px', 'post' => '0', 'footer' => '0',
        'footer_sb' => '0', 'footer_html' => '0', 'widget' => '0', 'primary' => '0',
        'secondary' => '0', 'extra' => '0', 'top' => '0', 'bottom' => '0', 'wrapper' => '0'
     */

    // defaults - these are determined by the =Padding section of style-weaverx.css
    $default_tb = array(
        'infobar' => '5px', 'content' => 'T:4px, B:8px', 'post' => '0', 'footer' => '8px',
        'footer_sb' => '8px', 'primary' => '8px',
        'secondary' => '8px', 'extra' => '8px', 'top' => '8px', 'bottom' => '8px'
    );

    $default_lr = array(
        'infobar' => '5px', 'content' => '2%', 'post' => '0', 'footer' => '8px',
        'footer_sb' => '8px', 'primary' => '8px',
        'secondary' => '8px', 'extra' => '8px', 'top' => '8px', 'bottom' => '8px'
    );

    $default_margins = array(
        'infobar' => '5px', 'content' => 'T:0, B:10', 'footer' => 'T:10, B:10',
        'footer_sb' => 'T:0, B:10',  'primary' => 'T:0, B:10', 'widget' => '0, Auto - First: T:0, Last: B:0',
        'secondary' => 'T:0, B:10', 'extra' => 'T:0, B:10', 'top' => 'T:10, B:10', 'bottom' => 'T:10, B:10',
        'wrapper' => 'T:10, B:10'
    );

    $id = $value['id'];

    $def_tb = '0'; $def_lr = '0' ; $def_marg = '0';
    if ( isset( $default_tb[$id] ) ) $def_tb = $default_tb[$id];
    if ( isset( $default_lr[$id] ) ) $def_lr = $default_lr[$id];
    if ( isset( $default_margins[$id] ) ) $def_marg = $default_margins[$id];

    $use_percent = array('content', 'post');

    //echo '<table><tr><td>';
	$name = $value['name'];


    $lr_type = ( in_array($id, $use_percent) ) ? 'text_lr_percent' : 'text_lr';


    $opts = array (

        array( 'name' => $name,  'id' => '-welcome-widgets-menus', 'type' => 'header_area',
              'info' => $value['info']),

        array(  'name' => $name, 'id' => $id, 'type' => 'titles_area',
            'info' => $name ),

        array(  'name' => '<span class="i-left dashicons dashicons-align-none"></span>' . __('Padding','weaver-xtreme') ,
            'id' => $id . '_padding', 'type' => 'text_tb',
            'info' => '<em>' . $name . '</em>' . __(': Top/Bottom Inner padding (Default: ','weaver-xtreme') . $def_tb . ')' ),

        array(  'name' => '', 'id' => $id . '_padding', 'type' => $lr_type,
            'info' => '<em>' . $name . '</em>' . __(': Left/Right Inner padding (Default: ','weaver-xtreme') . $def_lr . ')' ),

        array(  'name' => '<span class="i-left dashicons dashicons-align-none"></span>' . __('Top/Bottom Margins','weaver-xtreme'),
            'id' => $id . '_margin', 'type' => 'text_tb',
            'info' => '<em>' . $name . '</em>' . __(': Top/Bottom margins. <em>Side margins auto-generated.</em> (Default: ','weaver-xtreme') . $def_marg . ')' )

    );

    weaverx_form_show_options($opts, false, false);


    $no_lr_margins = array(     // areas that can't allow left-right margin or width specifications
        'primary', 'secondary', 'content', 'post', 'widget'
    );
    $no_widgets = array(        // areas that don't have widgets
        'widget', 'content', 'post', 'wrapper', 'container', 'header', 'header_html', 'footer_html', 'footer', 'infobar'
    );

    $no_hide = array(
       'wrapper', 'container', 'content','widget', 'post'
    );


    if ( in_array( $id, $no_lr_margins )) {
        if ( $id != 'widget') {
            weaverx_form_checkbox(array(
                'name' => '<span class="i-left dashicons dashicons-align-none"></span>' . __('Add Side Margin(s)','weaver-xtreme'),
                'id' => $id . '_smartmargin',
                'type' => '',
                'info' => '<em>' . $name . '</em>' .
                __(': Automatically add left/right "smart" margins for separation of areas.','weaver-xtreme') ));
        }

        weaverx_form_note(array('name' => '<strong>' . __('Width','weaver-xtreme') . '</strong>',
            'info' => __('The width of this area is automatically determined by the enclosing area','weaver-xtreme')));
    } else if ( $id != 'wrapper' ) {

        weaverx_form_val( array(
            'name' => '<span class="i-left" style="font-size:150%;">&harr;</span> ' . __('Width','weaver-xtreme'),
            'id' => $id . '_width_int', 'type' => '',
            'info' => '<em>' . $name . '</em>' . __(': Set Width of Area in percent of enclosing area on desktop and small tablet (Default: 100%)','weaver-xtreme'),
            'value' => array() ), '%' );

        weaverx_form_align(array(
            'name' => '<span class="i-left dashicons dashicons-editor-alignleft"></span><small>' . __('Align Area','weaver-xtreme') . '</small>',
            'id' => $id . '_align',
            'type' => '',
            'info' => '<em>' . $name . '</em>' . __(': How to align this area (Default: Left Align)','weaver-xtreme') )

        );
    }


    if ( $id == 'wrapper' ) {       // setting #wrapper sets theme width.

        $info = __('<em>Change Theme Width.</em> Standard width is 940px. Widths less than 768px may give unexpected results on mobile devices. Weaver Xtreme can not create a fixed-width site.','weaver-xtreme');

        weaverx_form_val( array(
            'name' => '<span class="i-left" style="font-size:150%;">&harr;</span><em style="color:red;">' . __('Theme Width','weaver-xtreme') . '</em>',
            'id' => 'theme_width_int', 'type' => '',
            'info' => $info,
            'value' => array() ), 'px' );
    }

    if ( in_array( $id, array( 'container', 'header', 'footer') ) ) {
        $opts_max = array(
           array(
            'name' => '<span class="i-left" style="font-size:150%;">&harr;</span><small>' . __('Max Width','weaver-xtreme') . '</small>',
            'id' => $id . '_max_width_int', 'type' => '+val_px',
            'info' => '<em>' . $name . '</em>' . __(': Set Max Width of Area for Desktop View. Advanced Option. (&starf;Plus)','weaver-xtreme'),
            'value' => array() ),
           array(
            'name' => '<small>' . __('Full-width BG','weaver-xtreme') . '</small>', 'id' => $id . '_extend_bgcolor', 'type' => '+color',
            'info' => '<em>' . $name . '</em>' . __(': Extend BG color to full theme width on Desktop View (&starf;Plus)','weaver-xtreme'),
            'value' => array() ),

        );
        weaverx_form_show_options($opts_max, false, false);
    }


    if ( ! in_array( $id, $no_widgets) ) {

        $opts02 = array(
            array('name' => '<span class="i-left" style="font-size:120%;">&nbsp;&#9783;</span>' . __('Columns','weaver-xtreme'),
                'id' => $id . '_cols_int', 'type' => 'val_num',
                'info' => '<em>' . $name . '</em>' . __(': Equal width columns of widgets (Default: 1; max: 8)','weaver-xtreme') ),

            array('name' => '<span class="i-left dashicons dashicons-align-none"></span><small>' . __('No Smart Widget Margins','weaver-xtreme') . '</small>',
                'id' => $id . '_no_widget_margins', 'type' => 'checkbox',
                'info' => '<em>' . $name . '</em>' . __(': Do not use "smart margins" between widgets on rows.','weaver-xtreme') ),

            array('name' => '<span class="i-left" style="font-size:140%;">&nbsp;=</span><small>' . __('Equal Height Widget Rows','weaver-xtreme') . '</small>',
                'id' => $id . '_eq_widgets', 'type' => '+checkbox',
                'info' => '<em>' . $name . '</em>' . __(': Make widgets equal height rows if &gt; 1 column (&starf;Plus)','weaver-xtreme') ),

        );

        weaverx_form_show_options($opts02, false, false);


        $custom_widths = array( 'header_sb', 'footer_sb', 'primary', 'secondary', 'top', 'bottom');
        if ( in_array( $id, $custom_widths) ) { /* if ( $id == 'header_sb' || $id == 'footer_sb' ) { */ ?>
    <tr><th scope="row" align="right"><span class="i-left" style="font-size:120%;">&nbsp;&#9783;</span><small><?php _e('Custom Widget Widths:','weaver-xtreme'); ?></small></th><td colspan="2" style="padding-left:20px;">
		<small><?php _e('You can optionally specify widget widths, including for specific devices. Please read the help entry!','weaver-xtreme'); ?>
        <?php weaverx_help_link('help.html#CustomWidgetWidth',__('Help on Custom Widget Widths','weaver-xtreme')); ?>
        <?php _e('(&starf;Plus) (&diams;)','weaver-xtreme'); ?></small></td>
	</tr>
         <?php
         $opts2 = array(
            array('name' => '<span class="i-left dashicons dashicons-desktop"></span><small>' . __('Desktop','weaver-xtreme') . '</small>',
                'id' => '_' . $id . '_lw_cols_list', 'type' => '+textarea',
                'placeholder' => __('25,25,50; 60,40; - for example','weaver-xtreme'),
                'info' => __('List of widths separated by comma. Use semi-colon (;) for end of each row.  (&starf;Plus) (&diams;)','weaver-xtreme')),
            array('name' => '<span class="i-left dashicons dashicons-tablet"></span><small>' . __('Small Tablet','weaver-xtreme') . '</small>',
                'id' => '_' . $id . '_mw_cols_list', 'type' => '+textarea',
                'info' => __('List of widget widths. (&starf;Plus) (&diams;)','weaver-xtreme')),
            array('name' => '<span class="i-left dashicons dashicons-smartphone"></span><small>' . __('Phone','weaver-xtreme') . '</small>',
                'id' => '_' . $id . '_sw_cols_list', 'type' => '+textarea',
                'info' => __('List of widget widths. (&starf;Plus) (&diams;)','weaver-xtreme')),
        );

        weaverx_form_show_options($opts2, false, false);
        }
    }

    $opts3 = array (
        array( 'name' => '<span class="i-left" style="font-size:200%;margin-left:4px;">&#x25a1;</span><small>' . __('Add Border','weaver-xtreme') . '</small>', 'id' => $id . '_border', 'type' => 'checkbox',
            'info' => '<em>' . $name . '</em>' . __(': Add the "standard" border (as set on Custom tab)','weaver-xtreme')),
        array( 'name' => '<span class="i-left dashicons dashicons-admin-page"></span><small>' . __('Shadow','weaver-xtreme') . '</small>', 'id' => $id .'_shadow', 'type' => 'shadows',
            'info' => '<em>' . $name . '</em>' . __(': Wrap Area with Shadow.','weaver-xtreme')),
        array( 'name' => '<span class="i-left dashicons dashicons-marker"></span><small>' . __('Rounded Corners','weaver-xtreme') . '</small>', 'id' => $id .'_rounded', 'type' => 'rounded',
            'info' => '<em>' . $name . '</em>' . __(': Rounded corners. Needs bg color or borders to show. Set for any overlapping nested area also!','weaver-xtreme') ),


    );

    weaverx_form_show_options($opts3, false, false);



    if ( ! in_array( $id, $no_hide) ) {
        weaverx_form_select_hide(array(
            'name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Area','weaver-xtreme') . '</small>',
            'id' => $id .'_hide',
            'info' => '<em>' . $name . '</em>' . __(': Hide area on different display devices','weaver-xtreme'),
            'value' => '' ) );
    }

    // class names
    $opts4 = array (
        array( 'name' => '<span class="i-left">{ }</span> <small>' . __('Add Classes','weaver-xtreme') . '</small>', 'id' => $id . '_add_class',  'type' => '+widetext',
            'info' => '<em>' . $name . '</em>' . __(': Space separated class names to add to this area (<em>Advanced option</em>) (&starf;Plus)','weaver-xtreme')
        )
    );

    weaverx_form_show_options($opts4, false, false);

    if ( $submit )
        weaverx_form_submit('');
    //echo '</td></tr></table>';

}





function weaverx_form_menu_opts( $value, $submit = false ) {
	// build the rows for area settings

    //echo '<table><tr><td>';
	$name = $value['name'];
    $id = $value['id'];

    $opts = array(

        array( 'name' => $name,  'id' => '-menu', 'type' => 'header_area',
              'info' => $value['info']),

        array( 'name' => __('Menu Bar','weaver-xtreme'),
            'id' => $id, 'type' => 'titles_menu',    // includes color, font size, font family
            'info' => __('Entire Menu Bar','weaver-xtreme') ),

        array( 'name' => __('Item BG','weaver-xtreme'),
            'id' => $id . '_link_bgcolor', 'type' => 'ctext',
            'info' => '<em>' . $name . '</em>' . __(': Background Color for Menu Bar Items (links)','weaver-xtreme') ),

        array( 'name' => '<small>' . __('Dividers between menu items','weaver-xtreme') . '</small>',
            'id' => $id . '_dividers_color', 'type' => '+color',
            'info' => '<em>' . $name . '</em>' . __(': Add colored dividers between menu items. Leave blank for none.  (&starf;Plus)','weaver-xtreme') ),

        array( 'name' => '<small>' . __('Hover BG','weaver-xtreme') . '</small>',
            'id' => $id . '_hover_bgcolor', 'type' => 'ctext',
            'info' => '<em>' . $name . '</em>' . __(': Hover BG Color (Default: rgba(255,255,255,0.15))','weaver-xtreme') ),
        array( 'name' => '<small>' . __('Hover Text Color','weaver-xtreme') . '</small>',
            'id' => $id . '_hover_color', 'type' => 'color',
            'info' => '<em>' . $name . '</em>' . __(': Hover Text Color','weaver-xtreme') ),


        array( 'name' => '<small>' . __('<em>Mobile</em> Open Submenu Arrow BG','weaver-xtreme') . '</small>',
            'id' => $id . '_clickable_bgcolor', 'type' => 'ctext',
            'info' => '<em>' . $name . '</em>' . __(': Clickable mobile open submenu arrow BG. Contrasting BG color required for proper user interface. (Default: rgba(255,255,255,0.2))','weaver-xtreme') ),



        array( 'name' => __('Submenu BG','weaver-xtreme'),
            'id' => $id . '_sub_bgcolor', 'type' => 'ctext',
            'info' => '<em>' . $name . '</em>' . __(': Background Color for submenus','weaver-xtreme') ),
        array( 'name' => '<small>' . __('Submenu Text Color','weaver-xtreme') . '</small>',
            'id' => $id . '_sub_color', 'type' => 'ctext',
            'info' => '<em>' . $name . '</em>' . __(': Text Color for submenus','weaver-xtreme') ),

        array( 'name' => '<small>' . __('Submenu Hover BG','weaver-xtreme') . '</small>',
            'id' => $id . '_sub_hover_bgcolor', 'type' => 'ctext',
            'info' => '<em>' . $name . '</em>' . __(': Submenu Hover BG Color (Default: Inherit Top Level)','weaver-xtreme') ),
        array( 'name' => '<small>' . __('Submenu Hover Text Color','weaver-xtreme') . '</small>',
            'id' => $id . '_sub_hover_color', 'type' => 'color',
            'info' => '<em>' . $name . '</em>' . __(': Submenu Hover Text Color (Default: Inherit Top Level)','weaver-xtreme') ),

        // can't get to font properties for the submenus beause no way to add the classes


        array ('name' => '<span class="i-left dashicons dashicons-editor-alignleft"></span>' . __('Align Menu','weaver-xtreme'),
        'id' => $id . '_align', 'type' => 'select_id',
        'info' => __('Align this menu on desktop view. Mobile menus always left aligned.','weaver-xtreme'),
        'value' => array(
			array('val' => 'left', 'desc' => 'Left'),
			array('val' => 'center', 'desc' => 'Center'),
			array('val' => 'right', 'desc' => 'Right')
        )),

        array( 'name' => '<span class="i-left" style="font-size:200%;margin-left:4px;">&#x25a1;</span><small>' . __('Add Border','weaver-xtreme') . '</small>',
            'id' => $id . '_border', 'type' => 'checkbox',
            'info' => '<em>' . $name . '</em>' . ': Add the "standard" border (as set on Custom tab)' ),
        array( 'name' => '<span class="i-left dashicons dashicons-admin-page"></span><small>' . __('Shadow','weaver-xtreme') . '</small>',
            'id' => $id .'_shadow', 'type' => 'shadows',
            'info' => '<em>' . $name . '</em>' . __(': Wrap Menu Bar with Shadow.','weaver-xtreme') ),
        array( 'name' => '<span class="i-left dashicons dashicons-marker"></span><small>' . __('Rounded Corners','weaver-xtreme') . '</small>',
            'id' => $id .'_rounded', 'type' => 'rounded',
            'info' => '<em>' . $name . '</em>' . __(': Add rounded corners to menu.','weaver-xtreme') ),
    );

    weaverx_form_show_options($opts, false, false);


    if ( $id == 'm_primary' ) {
       weaverx_form_checkbox(array(
        'name' => '<small>' . __('Move Primary Menu to Top','weaver-xtreme') . '</small>',
        'id' => $id . '_move',
        'info' => '<em>' . $name . '</em>' . __(': Move Primary Menu at Top of Header Area (Default: Bottom)','weaver-xtreme'),
        'value' => '' ) );
    } elseif ( $id == 'm_secondary' ){
        weaverx_form_checkbox(array(
        'name' => '<small>' . __('Move Secondary Menu to Bottom','weaver-xtreme') . '</small>',
        'id' => $id . '_move',
        'info' => '<em>' . $name . '</em>' . __(': Move Secondary Menu at Bottom of Header Area (Default: Top)','weaver-xtreme'),
        'value' => '' ) );
    }

    $opts2 = array(
        array( 'name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Area','weaver-xtreme') . '</small>',
            'id' => $id .'_hide', 'type' => 'select_hide',
            'info' => '<em>' . $name . '</em>' . __(': Hide menu on different display devices','weaver-xtreme') ),
        array( 'name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Arrows','weaver-xtreme') . '</small>',
            'id' => $id . '_hide_arrows', 'type' => 'checkbox',
            'info' => '<em>' . $name . '</em>' . __(': Hide Arrows on Desktop Menu','weaver-xtreme')),
        array( 'name' => '<span class="i-left dashicons dashicons-align-none"></span><small>' . __('Desktop Menu Padding','weaver-xtreme') . '</small>',
            'id' => $id .'_menu_pad_dec', 'type' => 'val_em',
            'info' => '<em>' . $name . '</em>' . __(': Add vertical padding to Desktop menu bar and submenus (Default: 0.6em)','weaver-xtreme') ),
        array( 'name' => '<span class="i-left">{ }</span> <small>Add Classes</small>',
            'id' => $id . '_add_class', 'type' => '+widetext',
            'info' => '<em>' . $name . '</em>' . __(': Space separated class names to add to this area (<em>Advanced option</em>) (&starf;Plus)','weaver-xtreme') ),
        array('name' => '<span class="i-left dashicons dashicons-editor-code"></span><small>' . __('Left HTML','weaver-xtreme') . '</small>',
            'id' => $id . '_html_left', 'type' => '+textarea',
            'placeholder' => __('Any HTML, including shortcodes.','weaver-xtreme'),
            'info' => __('Add HTML Left (Works best with Centered Menu) (&diams;)(&starf;Plus)','weaver-xtreme')),
        array( 'name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Area','weaver-xtreme') . '</small>',
            'id' => $id .'_hide_left', 'type' => '+select_hide',
            'info' => '<em>' . $name . '</em>' . __(': Hide Left HTML','weaver-xtreme') ),
        array('name' => '<span class="i-left dashicons dashicons-editor-code"></span><small>' . __('Right HTML','weaver-xtreme') . '</small>',
            'id' => $id . '_html_right', 'type' => '+textarea',
            'placeholder' => __('Any HTML, including shortcodes.','weaver-xtreme'),
            'info' => __('Add HTML to Menu on Right (Works best with Centered Menu) (&diams;)(&starf;Plus)','weaver-xtreme')),
        array( 'name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Area','weaver-xtreme') . '</small>',
            'id' => $id .'_hide_right', 'type' => '+select_hide',
            'info' => '<em>' . $name . '</em>' . __(': Hide Right HTML','weaver-xtreme') ),
        array( 'name' => '<small>' . __('HTML: Text Color','weaver-xtreme') . '</small>',
            'id' => $id .'_html_color', 'type' => 'ctext',
            'info' => '<em>' . $name . '</em>' . __(': Text Color for Left/Right Menu Bar HTML','weaver-xtreme') ),
        array( 'name' => '<span class="i-left dashicons dashicons-align-none"></span><small>' . __('HTML: Top Margin','weaver-xtreme') . '</small>',
            'id' => $id .'_html_margin_dec', 'type' => 'val_em',
            'info' => '<em>' . $name . '</em>' . __(': Margin above Added Menu HTML (Usually needed only with Desktop Menu Padding)','weaver-xtreme') ),

    );

    weaverx_form_show_options($opts2, false, false);


    if ( $submit )
        weaverx_form_submit('');
}



function weaverx_form_text_props( $value, $type = 'titles') {
    // display text properties for an area or title

    $id = $value['id'];
    $name = $value['name'];
    $info = $value['info'];

    $id_colorbg = $id . '_bgcolor';

    $id_color = $id . '_color';
    $id_size = $id . '_font_size';
    $id_family = $id . '_font_family';
    $id_bold = $id . '_bold';
    $id_normal = $id . '_normal';
    $id_italic = $id . '_italic';

    // COLOR BG & COLOR BOX

    weaverx_form_ctext( array(
        'name' => $name . ' BG',
        'id' => $id_colorbg,
        'info' => '<em>' . $info . __(':</em> Background Color (use CSS+ to specify custom CSS for area)','weaver-xtreme')));

	if ( $type == 'menu' || $id == 'post_title' )
        weaverx_form_ctext( array(
            'name' =>  $name . ' ' . __('Text Color','weaver-xtreme'),
            'id' => $id_color,
            'info' => '<em>' . $info . __(':</em> Text properties','weaver-xtreme')));
    else
        weaverx_form_color( array(
            'name' => $name . ' ' . __('Text Color','weaver-xtreme'),
            'id' => $id_color,
            'info' => '<em>' . $info . __(':</em> Text properties','weaver-xtreme')));

    // FONT PROPERTIES
?>
    <tr>
	<th scope="row" align="right"><span class="i-left font-bold font-italic"><span style="font-size:16px;">a</span><span style="font-size:14px;">b</span><span style="font-size:12px;">c</span></span><small>
    <?php echo ($type == 'titles') ? __('Title','weaver-xtreme') : __('Text','weaver-xtreme');?>
    <?php _e('Font properties:','weaver-xtreme'); ?></small>&nbsp;</th>
	<td colspan="2">
        <?php
        if ( $type != 'content') {
            echo '&nbsp;<span class="rtl-break"><small><em>Size:</em></small>'; weaverx_form_select_font_size(array('id' => $id_size), false); echo '</span>';
        }
        echo '&nbsp;<span class="rtl-break"><small><em>Family:</em></small>'; weaverx_form_select_font_family(array('id' => $id_family), false); echo '</span>'; ?>

        <?php if ( $type == 'titles' ) { ?>
        &nbsp;<span class="rtl-break"><small><?php _e('Normal Weight','weaver-xtreme'); ?></small>
        <input type="checkbox" name="<?php weaverx_sapi_main_name($id_normal); ?>" id="<?php echo $id_normal; ?>"
<?php checked(weaverx_getopt_checked( $id_normal )); ?> ></span>

        <?php } else { ?>
        &nbsp;<span class="rtl-break"><small><strong><?php _e('Bold','weaver-xtreme'); ?></strong></small>
        <input type="checkbox" name="<?php weaverx_sapi_main_name($id_bold); ?>" id="<?php echo $id_bold; ?>"
<?php checked(weaverx_getopt_checked( $id_bold )); ?> ></span>
        <?php } ?>
        &nbsp;<span class="rtl-break"><small><em><?php _e('Italic','weaver-xtreme'); ?></em></small>
        <input type="checkbox" name="<?php weaverx_sapi_main_name($id_italic); ?>" id="<?php echo $id_italic; ?>"
<?php checked(weaverx_getopt_checked( $id_italic )); ?> ></span>
<?php   if ( apply_filters('weaverx_xtra_type', '+plus_fonts' ) == 'inactive' )
            echo '<small>&nbsp;&nbsp; ' . __('(Add new fonts with <em>Weaver Xtreme Plus</em>)','weaver-xtreme') . '</small>';
        else
            echo '<small>&nbsp;&nbsp; ' . __('(Add new fonts from Custom &amp; Fonts tab.)','weaver-xtreme') . '</small>';?>
    </td>
    </tr>
<?php

}

function weaverx_from_fi_location( $value, $is_post = false ) {
    $value['value'] = array(
        array('val' => 'content-top', 'desc' => __('With Content - top','weaver-xtreme') ),
        array('val' => 'content-bottom', 'desc' => __('With Content - bottom','weaver-xtreme') ),
        array('val' => 'title-before', 'desc' => __('Before Title','weaver-xtreme') ),
        array('val' => 'header-image', 'desc' => $is_post ? __('Hide on Blog View','weaver-xtreme') :
              __('Header Image Replacement','weaver-xtreme') ),
        array('val' => 'post-before', 'desc' => __('Outside of Page/Post','weaver-xtreme') )
	);


	weaverx_form_select_id($value);
}


function weaverx_form_align( $value ) {
    $value['value'] = array(
        array('val' => 'float-left', 'desc' => __('Align Left','weaver-xtreme') ),
        array('val' => 'center', 'desc' => __('Center','weaver-xtreme') ),
        array('val' => 'float-right', 'desc' => __('Align Right','weaver-xtreme') )
	);

	weaverx_form_select_id($value);
}


function weaverx_form_fi_align( $value ) {
    $value['value'] = array(
        array('val' => 'fi-alignleft', 'desc' => __('Align Left','weaver-xtreme') ),
         array('val' => 'fi-aligncenter', 'desc' => __('Center','weaver-xtreme') ),
        array('val' => 'fi-alignright', 'desc' => __('Align Right','weaver-xtreme') ),
        array('val' => 'fi-alignnone', 'desc' => __('No Align','weaver-xtreme') )
	);

	weaverx_form_select_id($value);
}

function weaverx_form_select_hide($value) {
	$value['value'] = array(array('val' => 'hide-none', 'desc' => __('Do Not Hide','weaver-xtreme') ),
        array('val' => 's-hide', 'desc' => __('Hide: Phones','weaver-xtreme') ),
        array('val' => 'm-hide', 'desc' => __('Hide: Small Tablets','weaver-xtreme') ),
		array('val' => 'm-hide s-hide', 'desc' => __('Hide: Phones+Tablets','weaver-xtreme') ),
        array('val' => 'l-hide', 'desc' => __('Hide: Desktop','weaver-xtreme') ),
		array('val' => 'l-hide m-hide', 'desc' => __('Hide: Desktop+Tablets','weaver-xtreme') ),
        array('val' => 'hide', 'desc' => __('Hide on All Devices','weaver-xtreme') )
	);

	weaverx_form_select_id($value);
}

function weaverx_form_select_font_size( $value, $show_row = true ) {
	$value['value'] = array(array('val' => 'default', 'desc' => __('Inherit','weaver-xtreme') ),
        array('val' => 'm-font-size', 'desc' => __('Medium Font','weaver-xtreme') ),
        array('val' => 'xxs-font-size', 'desc' => __('XX-Small Font','weaver-xtreme') ),
        array('val' => 'xs-font-size', 'desc' => __('X-Small Font','weaver-xtreme') ),
        array('val' => 's-font-size', 'desc' => __('Small Font','weaver-xtreme') ),
        array('val' => 'l-font-size', 'desc' => __('Large Font','weaver-xtreme') ),
		array('val' => 'xl-font-size', 'desc' => __('X-Large Font','weaver-xtreme') ),
        array('val' => 'xxl-font-size', 'desc' => __('XX-Large Font','weaver-xtreme') ),
        array('val' => 'customA-font-size', 'desc' => __('Custom Size A','weaver-xtreme') ),
        array('val' => 'customB-font-size', 'desc' => __('Custom Size B','weaver-xtreme') )
	);
    $value['value'] = apply_filters('weaverx_add_font_size', $value['value']);
	weaverx_form_select_id( $value, $show_row);
}


function weaverx_form_select_font_family( $value, $show_row = true ) {
	$value['value'] = array(array('val' => 'default', 'desc' => __('Inherit','weaver-xtreme') ),
        array('val' => 'sans-serif', 'desc' => __('Arial (Sans Serif)','weaver-xtreme') ),
        array('val' => 'arialBlack', 'desc' => __('Arial Black','weaver-xtreme') ),
        array('val' => 'arialNarrow', 'desc' => __('Arial Narrow','weaver-xtreme') ),
        array('val' => 'lucidaSans', 'desc' => __('Lucida Sans','weaver-xtreme') ),
        array('val' => 'trebuchetMS', 'desc' => __('Trebuchet MS','weaver-xtreme') ),
        array('val' => 'verdana', 'desc' => __('Verdana','weaver-xtreme') ),

        array('val' => 'serif', 'desc' => __('Times (Serif)','weaver-xtreme') ),
        array('val' => 'cambria', 'desc' => __('Cambria','weaver-xtreme') ),
        array('val' => 'garamond', 'desc' => __('Garamond','weaver-xtreme') ),
        array('val' => 'georgia', 'desc' => __('Georgia','weaver-xtreme') ),
        array('val' => 'lucidaBright', 'desc' => __('Lucida Bright','weaver-xtreme') ),
        array('val' => 'palatino', 'desc' => __('Palatino','weaver-xtreme') ),

        array('val' => 'monospace', 'desc' => __('Courier (Monospace)','weaver-xtreme') ),
        array('val' => 'consolas', 'desc' => __('Consolas','weaver-xtreme') ),

        array('val' => 'papyrus', 'desc' => __('Papyrus','weaver-xtreme') ),
        array('val' => 'comicSans', 'desc' => __('Comic Sans MS','weaver-xtreme') )
	);
    $value['value'] = apply_filters('weaverx_add_font_family', $value['value']);
    ?>
    <select name="<?php weaverx_sapi_main_name($value['id']); ?>" id="<?php echo $value['id']; ?>">
    <?php
	foreach ($value['value'] as $option) {
	?>
		<option class="font-<?php echo $option['val'];?>" value="<?php echo $option['val'] ?>"<?php selected( (weaverx_getopt( $value['id'] ) == $option['val']));?>><?php echo $option['desc']; ?></option>
    <?php } ?>
	</select>
<?php
}

function weaverx_form_rounded($value) {
	$value['value'] = array(array('val' => 'none', 'desc' => __('None','weaver-xtreme') ),
        array('val' => '-all', 'desc' => __('All Corners','weaver-xtreme') ),
        array('val' => '-left', 'desc' => __('Left Corners','weaver-xtreme') ),
		array('val' => '-right', 'desc' => __('Right Corners','weaver-xtreme') ),
        array('val' => '-top', 'desc' => __('Top Corners','weaver-xtreme') ),
		array('val' => '-bottom', 'desc' => __('Bottom Corners','weaver-xtreme') ),
	);

	weaverx_form_select_id($value);
}

function weaverx_form_shadows($value) {
	$value['value'] = array(array('val' => '-0', 'desc' => __('No Shadow','weaver-xtreme') ), // as in .shadow-0
        array('val' => '-1', 'desc' => __('All Sides, 1px','weaver-xtreme') ),
        array('val' => '-2', 'desc' => __('All Sides, 2px','weaver-xtreme') ),
		array('val' => '-3', 'desc' => __('All Sides, 3px','weaver-xtreme') ),
        array('val' => '-4', 'desc' => __('All Sides, 4px','weaver-xtreme') ),
		array('val' => '-rb', 'desc' => __('Right + Bottom','weaver-xtreme') ),
        array('val' => '-lb', 'desc' => __('Left + Bottom','weaver-xtreme') ),
        array('val' => '-tr', 'desc' => __('Top + Right','weaver-xtreme') ),
        array('val' => '-tl', 'desc' => __('Top + Left','weaver-xtreme') ),
        array('val' => '-custom', 'desc' => __('Custom Shadow','weaver-xtreme') )
	);
    $value['value'] = apply_filters('weaverx_add_shadows', $value['value']);

	weaverx_form_select_id($value);
}

// custom forms

function weaverx_custom_css( $value='' ) {

    $css = weaverx_getopt('add_css');

    if (isset($value['id']))
        $icon = $value['id'];
    if ( !isset($icon) || !$icon )
        $icon = ' ';

    $dash = '';
	if ( $icon[0] == '-' ) {                      // add a leading icon
        $dash = '<span style="padding:.2em;" class="dashicons dashicons-' . substr( $icon, 1) . '"></span>';
    }
?>
<tr class="atw-row-header"><td colspan="3">
<a id="custom-css-rules"></a>
	<span style="color:black;padding:.2em;" class="dashicons dashicons-screenoptions"></span>
    <span style="font-weight:bold; font-size: larger;"><em>
        <?php _e('Custom CSS Rules','weaver-xtreme'); ?> <?php weaverx_help_link('help.html#CustomCSS', __('Custom CSS Rules','weaver-xtreme'));?></em></span>
</td></tr>
<tr><td colspan="3">

	<!-- ======== -->
<p>
<?php _e('Rules you add here will be the <em>last</em> CSS Rules included by Weaver Xtreme, and thus override all other Weaver Xtreme generated CSS rules.
Specify complete CSS rules, but don\'t add the &lt;style&gt; HTML element. You can prefix your selectors with <code>.is-desktop, .is-mobile, .is-smalltablet, or .is-phone</code>
to create rules for specific devices.
<strong>NOTE:</strong> Because Weaver Xtreme uses classes on many of its elements, you may to need to use
<em>!important</em> with your rules to force the style override.
It is possible that other plugins might generate CSS that comes after these rules.','weaver-xtreme'); ?>
</p>
<textarea name="<?php weaverx_sapi_main_name('add_css'); ?>" rows=12 style="width: 95%"><?php weaverx_esc_textarea($css); ?></textarea>
</td></tr>
<?php
}

function weaverx_check_version() {

    $version = WEAVERX_VERSION;

    $check_site = 'http://weaverxtra.wordpress.com';
    $home_site = 'http://weavertheme.com';
    $msg = __(' - Available at:','weaver-xtreme') . ' ' .
    '<a href="http://weavertheme.com/download/" target="_blank">WeaverTheme.com/download/</a>';

    $latest = weaverx_latest_version($check_site);     // check if newer version is available
    if ( $latest != 'unavailable' && version_compare($version,$latest,'<') ) {
        $saveme = WEAVERX_THEMENAME . __(' Current version: ','weaver-xtreme') . $version . __(' Newer version: ','weaver-xtreme') . $latest .
            $msg;
        weaverx_save_msg($saveme);
        // xxx('. A newer version (','weaver-xtreme')
    }
	return '';
}

function weaverx_latest_version($check_site) {
	$rss = fetch_feed($check_site. '/feed/');
	 if (is_wp_error($rss) ) {
		return 'unavailable';
	}
	$out = '';
	$items = 1;
	$num_items = $rss->get_item_quantity($items);
	if ( $num_items < 1 ) {
		$out .= 'unavailable';
		$rss->__destruct();
		unset($rss);
		return $out;
	}
	$rss_items = $rss->get_items(0, $items);
	foreach ($rss_items as $item ) {
		$title = esc_attr(strip_tags($item->get_title()));
		if ( empty($title) )
			$title = 'unavailable';
	}
	if (stripos($title,'announcement') === false) {
		$blank = strpos($title,' ');    // find blank
		if ($blank < 1)     // problem
			$title = 'unavailable';
		else {
			$title = substr($title,0,$blank);
		}
	}
	$out .= $title;
	$rss->__destruct();
	unset($rss);
	return $out;
}

function weaverx_elink( $href, $title, $label, $before='', $after='') {
    echo $before . '<a href="' . esc_url($href) . '" title="' . $title . '">' . $label . '</a>' . $after;
 }

 function weaverx_tab_title( $title, $help_link, $help_title ) {
    echo '<h3>'. $title; weaverx_help_link( $help_link, $help_title ) ; echo '</h3>';
 }

?>
