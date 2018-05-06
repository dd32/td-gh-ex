<?php 
function agensy_cat_list(){
    $agensy_cat_list = get_categories(
        array(
            'hide_empty' => '0',
            'exclude' => '1',
        )
    );
    $agensy_cat_list = array();
    $agensy_cat_list[''] = esc_html__('-- Choose --','agensy');
    foreach($agensy_cat_list as $agensy_cat_list){
        $agensy_cat_list_array[$agensy_cat_list->slug] = $agensy_cat_list->name;
    }
    return $agensy_cat_list_array;
}