<?php
/**
 * 系统配文件
 * 所有系统级别的配置
 */
return array(
    /* 模块相关配置 */
    'DEFAULT_MODULE'     => 'Home',

    /* 调试配置 */
    'SHOW_PAGE_TRACE' => false,	

    /* URL配置 */
    'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'            => 3, //URL兼容模式
    'VAR_URL_PARAMS'       => '', // PATHINFO URL参数变量
    'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL分割符
    
    /* 视图配置 */
    'VIEW_PATH'				=> realpath(APP_PATH . '/../Template/') . '/',
    'TMPL_TEMPLATE_SUFFIX'	=> '.html',
    //'TMPL_ENGINE_TYPE'		=> 'Smarty',
    'TMPL_ENGINE_CONFIG'	=> array (
    	'left_delimiter'	=> '{%',
    	'right_delimiter'	=> '%}',
    	'template_dir'		=> array(
    		realpath(APP_PATH . '/../Template/') . '/',
    		realpath(APP_PATH . '/../Template/Home/') . '/',
    	),
    	//'plugins_dir'		=> [APP_PATH . '/Common/Plugin/Smarty/', THINK_PATH . '/Library/Vendor/Smarty/plugins'],
    	//'config_dir'		=> APP_PATH . '/../config/',
    	//'debugging'			=> true,
    ),

    /* 全局过滤配置 */
    'DEFAULT_FILTER' => '', //全局过滤函数

    /* 数据库配置 */
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'contest', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => '', // 数据库表前缀

    /* 文档模型配置 (文档模型核心配置，请勿更改) */
    'DOCUMENT_MODEL_TYPE' => array(2 => '主题', 1 => '目录', 3 => '段落'),
    
    /* OSS相关 */
    'OSS_ACCESS_ID' 	=> 'XxyOmFNCwtrHUAZq',	// ACCESS_ID
    'OSS_ACCESS_KEY' 	=> 'NTRNoaTwMm15aLKvZI0Os3doNXW8Ml',	// ACCESS_KEY
    'OSS_HOST' 			=> 'oss-cn-qingdao.aliyuncs.com',	// URL
    'OSS_BUCKET' 		=> 'xuejieshuo',	// BUCKET

    /* 学姐说相关参数 */
    'SEND_EMAIL_WAIT_SECONDS' => 60,	//发送验证邮箱间隔时间
    'PHOTO_PATH_MEDIUM' =>'http://www.xuejieshuo.com/Uploads/Activity/s/m_',
    'PHOTO_PATH_SMALL' =>'http://www.xuejieshuo.com/Uploads/Activity/s/s_',
    'PHOTO_PATH_WATER' =>'http://www.xuejieshuo.com/Uploads/Activity/water/',
    'PHOTO_PATH_CROPPER' =>'http://www.xuejieshuo.com/Uploads/Activity/cropper/',
    'PHOTO_PATH_PICTURE' =>'http://www.xuejieshuo.com/Uploads/Activity/picture/',
    'TRAVLE_PHOTO_PATH_MEDIUM' =>'http://www.xuejieshuo.com/Uploads/Travle/s/m_',
    'TRAVLE_PHOTO_PATH_SMALL' =>'http://www.xuejieshuo.com/Uploads/Travle/s/s_',
    'TRAVLE_PHOTO_PATH_WATER' =>'http://www.xuejieshuo.com/Uploads/Travle/water/',
    'TRAVLE_PHOTO_PATH_CROPPER' =>'http://www.xuejieshuo.com/Uploads/Travle/cropper/',
    'TRAVLE_PHOTO_PATH_PICTURE' =>'http://www.xuejieshuo.com/Uploads/Travle/picture/',
    'ACTIVITY_ADMIN_USER' => 'xuejieshuo',
    'ACTIVITY_ADMIN_PASSWORD' => 'donglichejian',
    'Travle_ADMIN_USER' => 'xuejieshuo',
    'Travle_ADMIN_PASSWORD' => 'donglichejian',
    'PICTURE_S_ZIP_RATE' => '50',//缩略图压缩比率
    
    /*数据缓存设置*/
    'DATA_CACHE_TIME'       =>  '3600',      //   数据缓存有效期
    'DATA_CACHE_COMPRESS'   =>  false,   //   数据缓存是否压缩缓存
    'DATA_CACHE_CHECK'      =>  false,   //   数据缓存是否校验缓存
    'DATA_CACHE_PREFIX'     =>  '',     //   缓存前缀
    'DATA_CACHE_TYPE'       =>  'File',  //   数据缓存类型
    'DATA_CACHE_PATH'       =>  '/../Runtime/Temp/',//   缓存路径设置
    'DATA_CACHE_SUBDIR'     =>  false,    //   使用子目录缓存 
    'DATA_PATH_LEVEL'       =>  1,        //   子目录缓存级别
    
);
