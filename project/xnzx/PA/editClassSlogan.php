<?
    /* 新宁空间-珍贵档案 修改班级标语API */
    
    list($uid, $json) = app_check('s', [], 100);
    
    if (! sql_exec_count('UPDATE xnzx_class_table SET PA_slogan = ? WHERE year = ? AND class = ? LIMIT 1', [$json['slogan'], $json['id'][0], $json['id'][1]])) {
        api_callback(0, '操作数据失败了呢~');
    }
    
    api_callback(1, '');
?>