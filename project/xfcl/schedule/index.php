<?
    /* XFCL-赛程 数据API */
    
    list($uid, $json) = app_check('x', []);
    
    $data = sql_query('SELECT * FROM xfcl ORDER BY id DESC');
    $adminUids = app_getAdminTable(false, 100);
    
    api_callback(1, '', ['schedule' => $data, 'adminUids' => $adminUids]);
?>