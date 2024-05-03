<?
    /* 短链接系统 跳转数据获取API */
    
    $data = sql_query1('SELECT * FROM shortUrl WHERE tag LIKE ? LIMIT 1', [substr($_GET['tag'], 1)]);
    if ($data)
        $url = u($data['url']);
    else
        $url = u('shortUrlPortal://');
    
    header('Location: ' . $url);
?>