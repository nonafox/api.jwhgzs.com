<?php
    
    $list = [];
    foreach (str_split('abcdefghijklmnopqrstuvwxyz0123456789') as $v) {
        $list[] = $v;
        foreach (str_split('abcdefghijklmnopqrstuvwxyz0123456789') as $v2) {
            $list[] = $v . $v2;
        }
    }
    file_put_contents('list.json', json_encode($list));
?>