<?
    /* 后台管理-新宁空间管理 修改学生API */
    
    list($uid, $json) = app_check('sa', ['id', 'sid', 'name', 'sex'], 1);
    
    if (sql_query_count('SELECT id FROM xnzx_student_table WHERE year = ? AND class = ? AND sid = ? LIMIT 1', [$json['year'], $json['class'], $json['sid']])) {
        api_callback(0, '这个学生已经添加了哦！');
    }
    if (! sql_exec_count('UPDATE xnzx_student_table SET sid = ?, name = ?, sex = ? WHERE id = ? LIMIT 1', [$json['sid'], $json['name'], $json['sex'], $json['id']])) {
        api_callback(0, '操作数据库失败了，或者数据没有变呢~');
    }
    
    api_callback(1, '');
?>