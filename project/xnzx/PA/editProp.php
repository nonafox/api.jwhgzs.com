<?
    /* 新宁空间-珍贵档案 修改外号/梗API */
    
    list($uid, $json) = app_check('s', [], 100);
    
    if (! sql_exec_count('UPDATE xnzx_student_PA SET name = ?, detail = ? WHERE id = ?', [$json['name'] ? $json['name'] : '', $json['detail'] ? $json['detail'] : '', $json['id']])) {
        api_callback(0, '操作数据失败了呢~');
    }
    
    api_callback(1, '');
?>