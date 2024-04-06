<?php
    class c {
        public static $ROUTER = [
            'api\.jwhgzs\.com' => [
                0 => '/$'
            ]
        ];
        
        public static $MAIN_SERVER = 'https://www.jwhgzs.com';
        public static $STATIC_SERVER = 'https://static.jwhgzs.com';
        public static $JSCOOKIE_MAINDOMAIN = '.jwhgzs.com';
        public static $UPLOAD_SIZELIMIT = 1024 * 1024 * 50;
        public static $USER_EDITABLESQLKEYS = [
            'pass', 'selfIntroduce'
        ];
        public static $USER_PUBLICSQLKEYS = [
            'id', 'name', 'userGroup', 'userAuth', 'avatarVersion', 'selfIntroduce'
        ];
        // $ADMIN_UIDS格式：level => uid
        public static $ADMIN_UIDS = [
            1 => [ 3, 109, 149 ],
            100 => [ 1 ]
        ];
        public static $USERINF_LENGTH = [
            'name_min' => 3,
            'name_max' => 10,
            'pass_min' => 8,
            'pass_max' => 32
        ];
        public static $USERTOKEN_EXPTIME = 60 * 60 * 48 * 1000;
        public static $USERONLINE_INTERVALTIME = 5 * 1000;
        public static $JSTHREAD_INTERVAL = 2000;
        public static $USERLOGINDETAILS_LIMIT = 20;
        public static $URLS_TABLE = [
            'local' => [
                'www' => [
                    0 => 'https://www.jwhgzs.com'
                ],
                'api' => [
                    0 => 'https://api.jwhgzs.com'
                ],
                'user' => [
                    0 => 'https://user.jwhgzs.com'
                ],
                'admin' => [
                    0 => 'https://admin.jwhgzs.com'
                ],
                'xnzx' => [
                    0 => 'https://xnzx.jwhgzs.com'
                ],
                'forum' => [
                    0 => 'https://forum.jwhgzs.com'
                ],
                'xfcl' => [
                    0 => 'https://xfcl.jwhgzs.com'
                ]
            ],
            'shortUrl' => [
                0 => 'https://jwh.su'
            ],
            'static' => [
                0 => 'https://static.jwhgzs.com',
                'public' => [
                    0 => '/public',
                    'js' => [
                        'vaptcha' => '/vaptcha/v3.js'
                    ],
                    'img' => [
                        0 => '/img',
                        'logo_banner' => '/jwh/logo/banner_blue.svg?v=1',
                        'logo_ico' => '/jwh/logo/logo.ico?v=1',
                        'beian_icon' => '/beian_icon.png?v=1',
                        'sponsor_canva' => '/sponsors_logo/canva.svg?v=1',
                        'sponsor_tencentcloud' => '/sponsors_logo/tencent-cloud.svg?v=1',
                        'sponsor_dnspod' => '/sponsors_logo/dnspod.svg?v=1',
                        'sponsor_rainyun' => '/sponsors_logo/rainyun.png?v=2',
                        'sponsor_bt' => '/sponsors_logo/bt.svg?v=1',
                        'sponsor_vaptcha' => '/sponsors_logo/vaptcha.png?v=1',
                        'sponsor_ym163com' => '/sponsors_logo/ym163com.svg?v=5',
                        'sponsor_regery' => '/sponsors_logo/regery.svg?v=5',
                        'bkg' => '/bkg.svg?v=2',
                        'bkg2' => '/bkg2.jpg?v=1',
                        'link_xnzx' => '/links_banner/xnzx.svg?v=5',
                        'link_forum' => '/links_banner/forum.svg?v=5',
                        'link_shortUrl' => '/links_banner/shortUrl.svg?v=5',
                        'link_xnzx_weekly' => '/links_banner/xnzx/weekly.svg?v=5',
                        'link_xnzx_PA' => '/links_banner/xnzx/PA.svg?v=5',
                        'link_xfcl' => '/links_banner/xfcl.svg?v=5',
                        'link_admin' => '/links_banner/admin.svg?v=5',
                        'xfcl_logo' => '/jwh/logo/xfcl_logo.png?v=1',
                        'xfcl_banner' => '/jwh/logo/xfcl_banner.png?v=2',
                        'comp_lquot' => '/components/lquot.svg?v=1',
                        'comp_lquot_white' => '/components/lquot_white.svg?v=1',
                        'comp_rquot' => '/components/rquot.svg?v=1',
                        'comp_rquot_white' => '/components/rquot_white.svg?v=1',
                        'cuberin_logo' => '/cuberin/logo/logo.svg?v=1',
                        'PA' => [
                            0 => '/PA'
                        ]
                    ],
                    'font' => [
                        0 => '/font',
                        'bahnschrift' => '/bahnschrift.ttf'
                    ]
                ],
                'user' => [
                    0 => '/user',
                    'avatar' => '/avatar',
                    'forum' => '/forum',
                    'PA' => '/PA'
                ],
                'other' => [
                    'xnzx_ofof' => '/bin/新宁中学/2020秋11班/梗/ofof.mp4',
                    'xnzx_qgtyfj' => '/bin/新宁中学/2020秋11班/梗/全国统一放假.mp4'
                ]
            ],
            'static_user' => [
                0 => '/user'
            ],
            /*
            'beian' => [
                'icp' => 'https://beian.miit.gov.cn',
                'gong_an' => 'http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44078102440947'
            ],
            */
            'sponsors' => [
                'canva' => [
                    0 => 'https://www.canva.com'
                ],
                'bt' => [
                    0 => 'https://www.bt.cn/?invite_code=MV96amRiYWI='
                ],
                'tencent-cloud' => [
                    0 => 'https://curl.qcloud.com/Sj9zH16y'
                ],
                'dnspod' => [
                    0 => 'https://www.dnspod.cn'
                ],
                'rainyun' => [
                    0 => 'https://www.rainyun.com/?ref=16719'
                ],
                'vaptcha' => [
                    0 => 'https://www.vaptcha.com'
                ],
                'ym163com' => [
                    0 => 'https://ym.163.com'
                ],
                'regery' => [
                    0 => 'https://www.regery.com/en?pr=jjjvhib'
                ]
            ],
            'vaptcha' => [
                'api' => [
                    'sms' => [
                        0 => 'https://sms.vaptcha.com/send'
                    ]
                ]
            ],
            'node_modules' => [
                0 => '/_nuxt/node_modules',
                'quill' => [
                    'js' => '/quill-jwhgzs-edited/dist/quill.min.js?v=5',
                    'css' => '/quill-jwhgzs-edited/dist/quill.snow.css?v=5'
                ]
            ],
            'other' => [
                'whatIsSu' => 'https://www.youngpioneertours.com/su/',
                'darkmagic' => 'https://test2.jwhgzs.com/fuck'
            ]
        ];
        
        public static $INF = [
            'year_from' => '2020',
            'year_to' => '2024'
        ];
        public static $SEO_INF = [
            'desc' => '九尾狐工作室，数学、编程、魔方高手云集之地~',
            'keys' => '九尾狐,九尾狐工作室,xf,xf工作室,jwh,jwhgzs,xfgzs,台山市,新宁中学,数学,编程,魔方,2020秋届,11班',
            'urls' => [
                'local://www',
                'local://xnzx',
                'local://forum',
                'local://xfcl',
                'shortUrl://'
            ]
        ];
        public static $CONTACT_INF = [
            'qq' => '725058854',
            'email' => 'admin@jwhgzs.com'
        ];
        public static $VAPTCHA_CONFIG = [
            'status' => true,
            'vid' => '5fd36488e1874d214d49ad27',
            
            'scenes' => [
                'test' => 0,
                'login' => 1,
                'phoneLogin' => 2,
                'signup' => 3,
                'phoneVerify' => 4,
                'important' => 5,
                'blank' => 6
            ]
        ];
        public static $VAPTCHA_SMS_CONFIG = [
            'templateIds' => [
                'default' => '1'
            ],
            
            'sendLimitPerDay' => 5,
            'verifyCodeExpTime' => 60 * 10 * 1000
        ];
        public static $STATICCS_CONFIG = [
            'root' => '/www/wwwroot/static_jwhgzs_com'
        ];
        
        public static $QUILL_CONFIG = [
        ];
        public static $XNZX_WEEKLY_CONFIG = [
            'tijiMaxLength' => 100,
            'contentMaxLength' => 8000,
            'houjiMaxLength' => 100,
            'basicFormatter' => [
                ',' => '，',
                ':' => '：',
                ';' => '；',
                '?' => '？',
                '!' => '！',
                '(' => '（',
                ')' => '）',
                '\\' => '、',
                '〝' => '"',
                '〞' => '"',
                '″' => '"',
                '＂' => '"',
                '－' => '—',
                '∽' => '~',
                '<<' => '《',
                '>>' => '》'
            ],
            'terms' => ['七上', '七下', '八上', '八下', '九上', '九下']
        ];
        public static $XNZX_PA_CONFIG = [
            'classes' => [ 2020 => [ 11 ] ]
        ];
        public static $FORUM_CONFIG = [
            'classifies' => ['官方区', '首页区', '意见反馈区', '吹水区', '新宁足球冠军联赛区'],
            'defaultClassifyId' => 3,
            'adminClassifyIds' => [0, 1, 4],
            'carouselClassifyId' => 1
        ];
    }
    
    require_once __DIR__ . '/secrets.php';
?>