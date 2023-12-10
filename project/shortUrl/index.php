<?
    /* 短链接系统 跳转数据获取API */
    
    list($uid, $json) = app_check('x');
    
    $data = sql_query1('SELECT * FROM shortUrl WHERE tag LIKE ? LIMIT 1', [$json['tag']]);
    if ($data)
        $url = u($data['url']);
    else
        api_callback(0, '不存在这个短链呢~');
    
    api_callback(1, '', ['url' => $url]);
?>