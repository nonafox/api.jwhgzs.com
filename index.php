<?php
    require_once __DIR__ . '/config/index.php';
    require_once __DIR__ . '/require/index.php';
    
    function text_url2host($url = '') {
        return strtolower(explode('/', $url)[2]);
    }
    function text_format_dir($dir = '') {
        if (! $dir) return '/';
        return rtrim(trim(preg_replace('/\\/+/iu', '/', $dir)), '/');
    }
    
    function __pregMatch($pattern = '', $str = '') {
        return preg_match('/^' . str_ireplace('\\*', '[^\\.]+', preg_quote($pattern, '/')) . '$/iu', $str);
    }
    function __parseUrl($dir = '', $host = '') {
        $table = c::$ROUTER;
        $domain = strtolower($host);
        $match = null;
        foreach ($table as $k => $v) {
            if (__pregMatch($k, $domain)) {
                $match = $v;
                foreach ($v as $k2 => $v2) {
                    if ($k2 !== 0 && __pregMatch($k2, $dir)) {
                        $match = $v2;
                        break;
                    }
                }
                break;
            }
        }
        if ($match === null)
            return false;
        $router = '' . $match[0];
        $model = $match[1] ? $match[1] : 'default';
        
        $parts = explode('?', $router);
        $res = $parts[0];
        $params = $parts[1];
        $res = str_ireplace('$', $dir, $res);
        $params = str_ireplace('$', urlencode($dir), $params);
        $base = __DIR__ . '/project/';
        $base2 = __DIR__ . '/model/' . $model . '/';
        $static = file_exists($base2 . 'static.set');
        $paths = [];
        $paths[] = $base . $res;
        $paths[] = $base . $res . '.php';
        $paths[] = $base . $res . '/index.php';
        
        $ok = false;
        foreach ($paths as $k => $v) {
            if (file_exists($v) && (! is_dir($v))) {
                $ok = $v;
            }
        }
        if (! $ok) {
            $ok = $base2 . '/404.php';
            http_response_code(404);
        }
        $ok = text_format_dir($ok);
        
        return ['url' => $ok, 'params' => $params, 'model' => $model];
    }
    function __parseDomain($domain = '') {
        foreach (c::$ROUTER as $k => $v)
            if (__pregMatch($k, $domain))
                return true;
        return false;
    }
    function __handleParams($params = '') {
        foreach (explode('&', $params) as $v) {
            $parts = explode('=', $v);
            $_GET[urldecode($parts[0])] = urldecode($parts[1]);
        }
    }
    
    $__url = text_format_dir($_GET['__url']);
    $__host = $_SERVER['HTTP_HOST'];
    $__urlData = __parseUrl($__url, $__host);
    $__model_url = __DIR__ . '/model/' . $__urlData['model'];
    include_once $__model_url . '/head.php';
    $finfo = finfo_open(FILEINFO_MIME);
    $mime = finfo_file($finfo, $__urlData['url']);
    if (pathinfo($__urlData['url'])['extension'] == 'php') {
        __handleParams($__urlData['params']);
        include_once $__urlData['url'];
    }
    else {
        header('Content-type: ' . $mime);
        echo(file_get_contents($__urlData['url']));
    }
    finfo_close($finfo);
    include_once $__model_url . '/tail.php';
?>