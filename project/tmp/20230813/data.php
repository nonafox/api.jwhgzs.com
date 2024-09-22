<?
    /* 临时文件列表API */
    
    list($uid, $json, $file) = app_check('x');
    
    $list = arr_sort(staticcs_list(u('static_user://tmp/20230813')), 'time', true);
    foreach ($list as $k => $v) {
        $list[$k]['url'] = u('static://user/tmp/20230813') . '/' . $v['name'];
    }
    
    api_callback(1, '', ['fileList' => $list]);
?>