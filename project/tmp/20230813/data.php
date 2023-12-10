<?
    /* 临时文件列表API */
    
    list($uid, $json, $file) = app_check('x');
    
    $list = staticcs_list(u('static_user://tmp/20230813'));
    
    api_callback(1, '', ['fileList' => $list]);
?>