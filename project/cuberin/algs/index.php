<?
    list($uid, $json) = app_check('x');
    
    $res = [];
    $cubes = sql_query('SELECT * FROM cuberin_cubes');
    foreach ($cubes as $k => $v) {
        $alg_sets = sql_query('SELECT * FROM cuberin_alg_sets WHERE cube_id = ?', [$v['id']]);
        $v['alg_sets'] = $alg_sets;
        $res[] = $v;
    }
    
    $algs = sql_query('SELECT * FROM cuberin_algs WHERE set_id = ?', [$json['alg_set_id']]);
    foreach ($algs as $k => $v) {
        $algs[$k]['salgs'] = sql_query('SELECT * FROM cuberin_salgs WHERE alg_id = ?', [$v['id']]);
    }
    
    api_callback(1, '', ['classes' => $res, 'algs' => $algs, 'adminUids' => app_getAdminTable(false, 1)]);
?>