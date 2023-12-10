<?
    /* 后台管理-新宁空间管理 添加学生API */
    
    list($uid, $json) = app_check('sa', ['year', 'class', 'sid', 'name', 'sex'], 1);
    
    if (sql_query_count('SELECT id FROM xnzx_student_table WHERE year = ? AND class = ? AND sid = ? LIMIT 1', [$json['year'], $json['class'], $json['sid']])) {
        api_callback(0, '这个学生已经添加了哦！');
    }
    if (! sql_exec_count('INSERT INTO xnzx_student_table (id, type, year, class, sid, name, sex, uid, disabled, PA_photosName, PA_photosVersion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [sql_newId('xnzx_student_table'), 0, $json['year'], $json['class'], $json['sid'], $json['name'], $json['sex'], 0, 0, '', 0])) {
        api_callback(0, '操作数据库失败了呢~');
    }
    
    api_callback(1, '');
?>