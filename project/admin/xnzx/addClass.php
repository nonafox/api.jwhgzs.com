<?
    /* 后台管理-新宁空间管理 添加班级API */
    
    list($uid, $json) = app_check('sa', ['year', 'class'], 1);
    
    if (sql_query_count('SELECT id FROM xnzx_class_table WHERE year = ? AND class = ? LIMIT 1', [$json['year'], $json['class']])) {
        api_callback(0, '这个班级已经添加了哦！~');
    }
    if (! sql_exec_count('INSERT INTO xnzx_class_table (id, year, class, PA_slogan, PA_photosName, PA_photosVersion) VALUES (?, ?, ?, ?, ?, ?)', [sql_newId('xnzx_class_table'), $json['year'], $json['class'], '', '', 0])) {
        api_callback(0, '操作数据库失败了呢~');
    }
    
    api_callback(1, '');
?>