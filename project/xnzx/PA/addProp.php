<?
    /* 新宁空间-珍贵档案 添加外号/梗API */
    
    list($uid, $json) = app_check('s', [], 100);
    
    $id = sql_newId('xnzx_student_PA');
    if (! sql_exec_count('INSERT INTO xnzx_student_PA (id, pid, type, name, detail) VALUES (?, ?, ?, ?, ?)', [$id, $json['pid'], $json['type'], $json['name'] ? $json['name'] : '', $json['detail'] ? $json['detail'] : ''])) {
        api_callback(0, '操作数据失败了呢~');
    }
    
    api_callback(1, '');
?>