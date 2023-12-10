<?
    /* 跨域转发API */
    
    http_prosi($_GET['url'], $_GET['data'] ? $_GET['data'] : $_POST);
?>