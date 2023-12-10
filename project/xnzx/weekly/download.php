<?
    /* 新宁空间-班级周报 周报doc文档下载API */
    
    list($uid, $json) = app_check('x', [], 1, true);
    if ($json['id'])
        list($uid, $json) = app_check('vs', [], 1, true);
    else if ($json['cid'])
        list($uid, $json) = app_check('v', [], 1, true);
    
    if ($json['id']) {
        $data = sql_query1('SELECT year, class, term, num, note, nameInvisible FROM xnzx_weekly WHERE id = ?', [$json['id']]);
        $year = $data['year'];
        $list = sql_query('SELECT author, title, tiji, content, houji FROM xnzx_weekly_article WHERE parentId = ? AND status >= 1 ORDER BY postTime DESC', [$json['id']]);
        $fname = $year . ' 秋届 ' . $data['class'] . ' 班 ' . $data['term'] . ' 第 ' . $data['num'] . ' 期 ' . $data['note'] . ' 班级周报';
    } else if ($json['cid']) {
        $year = $json['year'];
        $data = sql_query('SELECT id FROM xnzx_weekly WHERE year = ? AND class = ?', [$year, $json['class']]);
        $arr = [];
        foreach ($data as $v)
            $arr[] = $v['id'];
        $list = sql_query('SELECT author, title, tiji, content, houji FROM xnzx_weekly_article WHERE parentId IN (\'' . implode('\', \'', $arr) . '\') AND author = ? AND status >= 1 ORDER BY postTime DESC', [$json['cid']]);
        $fname = app_xnzx_sid2name($year, $json['class'], $json['cid'])[1] . ' 班级周报投稿汇总';
        $data = null;
    }
    
    header('Content-disposition: attachment; filename="' . $fname . '.doc"');
    
    $html = '';
    $html .= <<<CONTENT
        <div style="color: gray; font-family: 黑体; text-align: center;">
            本文档由jwhgzs.com自动生成~
        </div>
        <br/>
CONTENT;
    foreach ($list as $v) {
        $name = app_xnzx_sid2name($year, $data ? $data['class'] : $json['class'], $data ? $v['author'] : $json['cid'])[1];
        $author = ($data['nameInvisible'] ? '' : $name);
        $title = htmlspecialchars($v['title']);
        $tiji = htmlspecialchars($v['tiji']);
        $houji = htmlspecialchars($v['houji']);
        $html .= <<<CONTENT
            <div style="font-size: 140%; font-weight: bold; font-family: 楷体; text-align: center;">
                $title
            </div>
            <div style="margin-top: 10px; font-size: 110%; font-family: 楷体; text-align: center;">
                $author
            </div>
CONTENT;
        $content = explode(PHP_EOL, $v['content']);
        if ($v['tiji']) {
            $html .= <<<CONTENT
                <p style="margin-top: 20px; font-size: 100%; white-space: pre-wrap; tab-size: 0; font-family: 楷体; font-style: italic; text-indent: 2em;">
                    $tiji
                </p>
                <p style="margin-top: 20px; font-size: 100%; white-space: pre-wrap; tab-size: 0; font-family: 楷体; font-style: italic; text-indent: 2em; text-align: right;">
                    ——题记
                </p>
CONTENT;
        }
        foreach ($content as $v2) {
            $v2 = ltrim(htmlspecialchars($v2));
            $css = 'font-size: 100%; white-space: pre-wrap; tab-size: 0; font-family: 仿宋; text-indent: 2em;';
            $extra_css = '';
            if (stripos($v2, '#') === 0) {
                $css = 'white-space: pre-wrap; tab-size: 0; text-indent: 0; font-family: 楷体; font-size: 125%; text-align: center;';
                $extra_css = 'background-color: #ddd;';
                $v2 = '&nbsp;&nbsp;' . str_ireplace('#', '', $v2) . '&nbsp;&nbsp;';
            }
            $html .= <<<CONTENT
                <p style="$css">
                    <span style="$extra_css">$v2</span>
                </p>
CONTENT;
        }
        if ($v['houji']) {
            $html .= <<<CONTENT
                <p style="margin-top: 20px; font-size: 100%; white-space: pre-wrap; tab-size: 0; font-family: 楷体; font-style: italic; text-indent: 2em;">
                    $houji
                </p>
                <p style="margin-top: 20px; font-size: 100%; white-space: pre-wrap; tab-size: 0; font-family: 楷体; font-style: italic; text-indent: 2em; text-align: right;">
                    ——后记
                </p>
CONTENT;
        }
        $html .= '<br/><br/>';
        if ($data && $data['nameInvisible']) {
            // 预留多一点空间给同学们签名投票
            $html .= '<br/><br/>';
        }
    }
    
    echo <<<CONTENT
        <html
        	xmlns:o="urn:schemas-microsoft-com:office:office"
        	xmlns:w="urn:schemas-microsoft-com:office:word"
        	xmlns="http://www.w3.org/TR/REC-html40">
        	<meta charset="utf-8"/>
        	$html
        </html>
CONTENT;
    exit;
?>