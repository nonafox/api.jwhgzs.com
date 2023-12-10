<?
    /* 后台管理-新宁空间管理 修改班级API */
    
    list($uid, $json) = app_check('sa', ['id', 'year', 'class'], 1);
    
    if (sql_query_count('SELECT id FROM xnzx_class_table WHERE year = ? AND class = ? LIMIT 1', [$json['year'], $json['class']])) {
        api_callback(0, '这个班级已经添加了哦~');
    }
    if (! sql_exec_count('UPDATE xnzx_class_table SET year = ?, class = ? WHERE id = ? LIMIT 1', [$json['year'], $json['class'], $json['id']])) {
        api_callback(0, '操作数据库失败了，或者数据没有变呢~');
    }
    
    api_callback(1, '');
?>