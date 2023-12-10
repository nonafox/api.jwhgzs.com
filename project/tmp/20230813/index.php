<?
    /* 临时文件上传API */
    
    list($uid, $json, $file) = app_check('xfa', ['fname']);
    
    $oriUrl = $file['tmp_name'];
    staticcs_upload($oriUrl, u('static_user://tmp/20230813') . '/' . $json['fname']);
    api_callback(1, '');
?>