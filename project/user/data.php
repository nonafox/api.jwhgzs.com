<?
    /* 用户数据同步API */
    
    list($uid, $json) = app_check();
    
    $udata = app_getUserData($uid, $json, $json['uid']);
    if (! $udata)
        api_callback(0, '用户数据错误！');
    
    api_callback(1, '', ['userData' => $udata]);
?>