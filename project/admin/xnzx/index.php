<?
    /* 后台管理-新宁空间管理 数据API */
    
    list($uid, $json) = app_check('s', [], 1);
    
    $data = sql_query('SELECT * FROM xnzx_class_table ORDER BY id DESC');
    
    api_callback(1, '', ['classList' => $data]);
?>