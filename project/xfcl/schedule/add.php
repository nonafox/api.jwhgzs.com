<?
    /* XFCL-赛程 添加API */
    
    list($uid, $json) = app_check('sa', ['time', 'score'], 100);
    
    if (! sql_exec_count('INSERT INTO xfcl (id, time, score, note, forumTopicId) VALUES (?, ?, ?, ?, ?)', [sql_newId('xfcl'), $json['time'], $json['score'], $json['note'], $json['forumTopicId'] ? $json['forumTopicId'] : 0])) {
        api_callback(0, '操作数据库失败了呢~');
    }
    
    api_callback(1, '');
?>