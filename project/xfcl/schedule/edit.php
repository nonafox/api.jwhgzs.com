<?
    /* XFCL-赛程 修改API */
    
    list($uid, $json) = app_check('sa', ['time', 'score'], 100);
    
    if (! sql_exec_count('UPDATE xfcl SET time = ?, score = ?, note = ?, forumTopicId = ? WHERE id = ?', [$json['time'], $json['score'], $json['note'], $json['forumTopicId'] ? $json['forumTopicId'] : 0, $json['id']])) {
        api_callback(0, '操作数据库失败，或者数据没有改哦~');
    }
    
    api_callback(1, '');
?>