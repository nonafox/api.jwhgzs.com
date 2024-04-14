<?
    /* 后台管理-短链接管理 数据API */
    
    list($uid, $json) = app_check('s', [], 100);
    
    $data = sql_query('SELECT * FROM shortUrl ORDER BY id DESC');
    foreach ($data as $k => $v) {
        $data[$k]['url'] = $data[$k]['url'];
        $data[$k]['resolved_url'] = u($data[$k]['url']);
        $data[$k]['resolved'] = $data[$k]['url'] != $data[$k]['resolved_url'];
    }
    
    api_callback(1, '', ['urlList' => $data]);
?>