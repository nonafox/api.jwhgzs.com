<?
    /* 论坛 点赞API */
    
    list($uid, $json) = app_check();
    
    app_like('forum', $json['id'], $uid);
    
    api_callback(1, '');
?>