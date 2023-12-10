<?
    /* 首页轮播数据同步API */
    
    list($uid, $json) = app_check('x');
    
    $carouselList = sql_query('SELECT ' . sql_fieldsExcept('forum', ['content', 'postIP']) . ' FROM forum WHERE classify = ?', [c::$FORUM_CONFIG['carouselClassifyId']]);
    
    api_callback(1, '', ['carouselList' => $carouselList]);
?>