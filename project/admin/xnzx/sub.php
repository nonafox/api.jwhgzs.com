<?
    /* 后台管理-新宁空间管理 学生数据API */
    
    list($uid, $json) = app_check('s', ['year', 'class'], 1);
    
    $data = sql_query('SELECT * FROM xnzx_student_table WHERE type = 0 AND year = ? AND class = ?', [$json['year'], $json['class']]);
    
    api_callback(1, '', ['studentList' => $data]);
?>