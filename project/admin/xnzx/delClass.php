<?
    /* 后台管理-新宁空间管理 删除班级API */
    
    list($uid, $json) = app_check('sv', ['id'], 1);
    
    $data = sql_query1('SELECT year, class FROM xnzx_class_table WHERE id = ? LIMIT 1', [$json['id']]);
    if (! sql_exec_count('DELETE FROM xnzx_class_table WHERE id = ? LIMIT 1', [$json['id']])) {
        api_callback(0, '操作数据库失败了哦！');
    }
    if (! sql_exec_count('DELETE FROM xnzx_student_table WHERE year = ? AND class = ?', [$data['year'], $data['class']])) {
        api_callback(0, '操作数据库失败了哦~');
    }
    
    api_callback(1, '');
?>