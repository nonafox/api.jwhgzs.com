<?
    // 遍历静态成员参考：https://www.jb51.cc/php/1083774.html
    $class = new ReflectionClass('c');
    $json = json_encode($class -> getStaticProperties());
    header('Content-type: application/json');
    die($json);
?>