<?php
if ( !defined( 'ABSPATH' ) )
    exit( 'restricted access' );

$typo = sampression_typography();
$general = $typo['typography']['general'];
$pp = $typo['typography']['post_pages'];
//sam_p($style);
$default_fonts = sampression_fonts_style();
?>
<div id="content">
    <form id="sampression-metadata" onsubmit="javascript:return false;">
        <input type="hidden" name="meta_data" value="typography" />
        <section class="row">
            <div class="box titled-box">
                <div class="box-title">
                    <h4><?php _e( 'Typography', 'sampression' ) ?></h4>
                    <div class="select-wrapper">
                        <select class="sam-select" id="typo-selctor" autocomplete="off">
                            <?php
                            $t_options = array( 'general' => 'General', 'post-pages' => 'Post/Pages' );
                            $counter = 0;
                            foreach ( $t_options as $tkey => $tval ) {
                                $counter++;
                                $sel = '';
                                if( $counter === 1 ) { $sel = ' selected="selected"'; }
                                echo '<option'.$sel.' value="'.$tkey.'">'.$tval.'</option>';
                            }                            
                            ?>
                        </select>
                    </div>
                </div>
                <div class="box-entry typo-general" id="typography-general">
                    <div class="section row">
                        <div class="sec-label"><?php _e( 'Body Text', 'sampression' ) ?></div>
                        <div class="entry">
                            <p id="paragraphtext" class="font-demo" style="font: <?php echo $general['p']['active']['size']; ?>px <?php echo $general['p']['active']['font']; ?>;"><?php _e( 'The quick brown fox jumps over the lazy dog.', 'sampression' ) ?></p>
                            <div class="select-wrapper font-face large-select alignleft" >
                                <?php sampression_font_select( 'p_font_face', 'sam-select change-fontface', $general['p']['active']['font'] ) ?>
                            </div>
                            <div class="select-wrapper font-size alignleft">
                                <?php sampression_font_size_select( 'p_font_size', 'sam-select change-fontsize', $general['p']['active']['size'] ) ?>
                            </div>
                        </div>
                    </div>
                    <!-- .section-->
                </div>
                <div id="typography-post-pages" class="box-entry hide typo-post-pages">
                    <section class="row">
                        <div class="box titled-box ">
                            <div class="box-title">
                                <h4><?php _e( 'Post/Page Title', 'sampression' ) ?></h4>
                            </div>
                            <div class="box-entry">
                                <div class="section row">
                                    <div class="sec-label"><?php _e( 'Title', 'sampression' ) ?></div>
                                    <div class="entry">
                                        <h1 id="sam-post-title" class="font-demo" style="font: <?php echo $pp['title']['text']['active']['size']; ?>px <?php echo $pp['title']['text']['active']['font']; ?>;"><?php _e( 'The quick brown fox jumps over the lazy dog.', 'sampression' ) ?></h1>
                                        <div class="select-wrapper font-face large-select alignleft" >
                                            <?php sampression_font_select( 'pp_title_font_face', 'sam-select change-fontface', $pp['title']['text']['active']['font'] ) ?>
                                        </div>
                                        <div class="select-wrapper font-size small-select alignleft">
                                            <?php sampression_font_size_select( 'pp_title_font_size', 'sam-select change-fontsize', $pp['title']['text']['active']['size'] ) ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- .section-->
                            </div>
                            </div>
                    </section>
                    <section class="row">
                        <div class="box titled-box ">
                            <div class="box-title">
                                <h4><?php _e( 'Meta Text', 'sampression' ) ?></h4>
                            </div>
                            <div class="box-entry">
                                <div class="section row">
                                    <div class="sec-label"><?php _e( 'Text', 'sampression' ) ?></div>
                                    <div class="entry">
                                        <div id="sam-meta-text" class="font-demo" style="font: <?php echo $pp['meta']['text']['active']['size']; ?>px <?php echo $pp['meta']['text']['active']['font']; ?>; "><?php _e( 'The quick brown fox jumps over the lazy dog.', 'sampression' ) ?></div>
                                        <div class="select-wrapper font-face large-select alignleft" >
                                            <?php sampression_font_select( 'pp_meta_font_face', 'sam-select change-fontface', $pp['meta']['text']['active']['font'] ) ?>
                                        </div>
                                        <div class="select-wrapper font-size small-select alignleft">
                                            <?php sampression_font_size_select( 'pp_meta_font_size', 'sam-select change-fontsize', $pp['meta']['text']['active']['size'] ) ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- .section-->
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section><a name="response"></a>
        <div id="response"></div>
        <a id="save" href="javascript:void(0);" class="button1 alignright save-data"><?php _e( 'Save', 'sampression' ) ?></a>
    </form>
</div>