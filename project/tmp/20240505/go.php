<?php
    
    if ($_GET['name']) {
        function request($url) {
            $res = http(
                'https://www.tonic.to/renewcustform1.htm?' . strtoupper(text_random(8, true)) . ';;;',
                'command=sldrenewal&sld=' . $url . '&B1.x=0&B1.y=0'
            );
            preg_match('/' . preg_quote('<font color="#003366" size="4" face="Arial">', '/') . '\\s*(.+?)\\s*' . preg_quote('</font>', '/') . '/ims',  $res, $matches, PREG_OFFSET_CAPTURE);
            $note = preg_replace('/[\\s]+/', ' ', $matches[1][0]);
            $note = explode('<br>', $note);
            $note[0] = trim($note[0]);
            $note[1] = trim($note[1]);
            
            if (! ($note[0] || $note[1]))
                return false;
            else
                return date('Y/m/d', strtotime($note[1]));
        }
        
        $res = request($_GET['name'] . '.to');
        if ($res) {
            if (strtotime($res) <= time()) {
                $res = '<strong>' . $res . '</strong>';
                $strong = true;
            }
        }
        else {
            $res = '<strong>可注册！！！</strong>';
        }
        die(($strong ? '<!--*-->' : '') . '<li><strong>' . $_GET['name'] . '.to</strong>：' . ($res ? '过期时间：' . $res : '<strong>可注册！！！</strong>') . '</li>');
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    </head>
    <body>
        <div id="app">
            <center style="font-size: 150%">进度：{{ a }} / {{ b }}（{{ (a / b * 100).toFixed(0) }} %）</center>
            <center>
                <button @click="control">{{ status ? '暂停' : '开始' }}</button>
                <button @click="clear_">清空数据</button>
            </center>
            <hr/>
            <center style="margin-top: 20px">
                <div v-for="v in list" v-html="v"></div>
            </center>
        </div>
        <script>
            const { createApp } = Vue
            
            const request = async (url) => await (await fetch(url)).text()
            
            const app = createApp({
                data() {
                    return {
                        status: false,
                        a: 0,
                        b: 0,
                        aim_list: [],
                        list: []
                    }
                },
                mounted() {
                    this.restore()
                },
                methods: {
                    cookie() {
                        localStorage.setItem('20240505_list', JSON.stringify(this.list))
                    },
                    async restore() {
                        this.list = JSON.parse(localStorage.getItem('20240505_list') || '[]')
                        this.a = this.list.length
                        this.aim_list = JSON.parse(await request('list.json'))
                        this.b = this.aim_list.length
                    },
                    async go() {
                        while (this.status && this.a < this.b) {
                            let v = await request('?name=' + this.aim_list[this.a])
                            if (v.indexOf('<!--*-->') == 0)
                                this.list.splice(0, 0, v)
                            else
                                this.list.push(v)
                            this.cookie()
                            this.a ++
                        }
                    },
                    control() {
                        this.status = ! this.status
                        if (this.status)
                            this.go()
                    },
                    clear_() {
                        const time = new Date().valueOf()
                        if (prompt('若要清空数据请输入“' + time + '”以确认：') == time) {
                            localStorage.setItem('20240505_list', '')
                            this.list = []
                            alert('清空数据成功！')
                        }
                    }
                }
            })
            app.config.compilerOptions.isCustomElement = (tag) => tag == 'center'
            app.mount('#app')
        </script>
    </body>
</html>