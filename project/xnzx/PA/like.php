<?
    /* 新宁空间-珍贵档案 点赞API */
    
    list($uid, $json) = app_check();
    
    app_like('PA', $json['id'], $uid);
    
    api_callback(1, '');
?>