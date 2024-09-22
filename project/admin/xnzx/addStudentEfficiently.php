<?
    /* 后台管理-新宁空间管理 快捷添加学生API */
    
    list($uid, $json) = app_check('sa', ['year', 'class', 'list'], 1);

    $sex_table = [
        '男' => 1,
        '女' => 2
    ];
    
    $list = explode(PHP_EOL, $json['list']);
    $sid = 1;
    foreach ($list as $v) {
        $arr = explode(' ', preg_replace('/\s+/', ' ', trim($v)));
        if (count($arr) != 2)
            continue;
        $name = $arr[0];
        $sex = $sex_table[$arr[1]];
        if (sql_query_count('SELECT id FROM xnzx_student_table WHERE year = ? AND class = ? AND sid = ? LIMIT 1', [$json['year'], $json['class'], $sid])) {
            continue;
        }
        if (! sql_exec_count('INSERT INTO xnzx_student_table (id, type, year, class, sid, name, sex, uid, disabled, PA_photosName, PA_photosVersion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [sql_newId('xnzx_student_table'), 0, $json['year'], $json['class'], $sid, $name, $sex, 0, 0, '', 0])) {
            api_callback(0, '操作数据库失败了呢~');
        }
        $sid ++;
    }
    
    api_callback(1, '');
?>