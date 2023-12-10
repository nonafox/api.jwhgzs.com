<?
    /* 后台管理-短链接管理 数据API */
    
    list($uid, $json) = app_check('s', [], 100);
    
    $data = sql_query('SELECT * FROM shortUrl ORDER BY id DESC');
    foreach ($data as $k => $v) {
        $data[$k]['ori_url'] = $data[$k]['url'];
        $data[$k]['url'] = u($data[$k]['url']);
    }
    
    api_callback(1, '', ['urlList' => $data]);
?>