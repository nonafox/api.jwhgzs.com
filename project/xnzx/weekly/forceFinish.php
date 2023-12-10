<?
    /* 新宁空间-班级周报 周报强制出版/取消强制出版API */
    
    list($uid, $json) = app_check('as', ['id'], 1);
    
    $data = sql_query1('SELECT forceFinished FROM xnzx_weekly WHERE id = ?', [$json['id']]);
    if (! sql_exec_count('UPDATE xnzx_weekly SET forceFinished = ? WHERE id = ?', [(intval($data['forceFinished']) == 1 ? 0 : 1), intval($json['id'])])) {
        api_callback(0, '操作数据失败！~');
    }
    
    api_callback(1, '');
?>