<?
    /* 后台管理-新宁空间管理 设置学生九尾狐账号API */
    
    list($uid, $json) = app_check('sa', ['id'], 1);
    
    if (! sql_exec_count('UPDATE xnzx_student_table SET uid = ? WHERE id = ? LIMIT 1', [$json['uid'], $json['id']])) {
        api_callback(0, '操作数据库失败了，或者数据没有变呢~');
    }
    
    api_callback(1, '');
?>