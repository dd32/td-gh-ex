<?php

function sampression_action_hooks($hook = '') {
    if($hook === '')
        return;

    $hooks = (object) sampression_hooks_setting();
    foreach($hooks->hook as $hkey => $hval) {
        if((str_replace('sam_', '', $hkey) === $hook) && $hval['execute'] === 'yes') {
            echo $hval['content'];
        }
    }
}


function sam_hook_before_head_close(){
    sampression_action_hooks('before_head_close');
}
function sam_hook_before_body_close(){
    sampression_action_hooks('before_body_close');
}
add_action('sampression_before_head_close', 'sam_hook_before_head_close');
add_action('sampression_before_body_close', 'sam_hook_before_body_close');