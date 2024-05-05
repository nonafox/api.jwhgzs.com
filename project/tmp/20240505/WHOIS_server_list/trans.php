<?php
    
    $res = '';
    $lines = explode(PHP_EOL, file_get_contents('list.dat'));
    foreach ($lines as $line) {
        if (! $line || strpos($line, '//') === 0) continue;
        [$ext, $server] = explode(' ', $line);
        if ($server)
            $res .= '"' . $ext . '" => "' . $server . '", ';
    }
    file_put_contents('list.php', '<?php $whois_servers = [' . $res . ']; ?>');
?>