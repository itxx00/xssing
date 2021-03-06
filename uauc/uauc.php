<?php
ob_start();
session_start();
//error_reporting(0);
date_default_timezone_set('PRC');
define('UAUC_DEBUG',1); // 0 运行 1 项目调试 2 核心框架调试
define('SAE',1);    // 1 在sae部署
define('RUNNING_FILE', (SAE) ? SAE_TMP_PATH."/uauc.php" : "apps/".APP_NAME."/running/uauc.php");
//define('RUNNING_FILE',"apps/".APP_NAME."/running/uauc.php");
if(UAUC_DEBUG){
    error_reporting(E_ALL ^ E_NOTICE);
    include 'uauc/core/Log.class.php'; Log::start();
}else{
    error_reporting(0);
    ini_set('display_errors', 'Off');
}
define('FRAME_PATH',dirname(__file__));
define('ROOT_PATH',substr(FRAME_PATH,0,strlen(FRAME_PATH)-5)."/");
if(!UAUC_DEBUG && is_file(RUNNING_FILE)){
    include RUNNING_FILE;
}else{
    $uauc_list=array(
            'config/config.php',
            'config/mysql.php',
            'uauc/define.php',
            'uauc/core/Mysql.class.php',
            'uauc/core/Model.class.php',
            'uauc/core/Action.class.php',
            'uauc/core/Uauc.class.php',
            'uauc/common/functions.php'
            );
    include 'uauc/common/build.php'; //编译
    if(file_exists(APP_COMM_FILE))  $uauc_list[]=APP_COMM_FILE;  //项目共同文件
    if(file_exists(APP_ACTION_FILE)) $uauc_list[]=APP_ACTION_FILE; //动作统一控制器

    $content="";
    foreach($uauc_list as $file){

        $data=file_get_contents($file);
        $data=substr(trim($data), 5);
        if ('?>' == substr($data, -2)) $data = substr($data, 0, -2);
        $content.=$data;
        include $file;
    }


    file_put_contents(RUNNING_FILE,strip_whitespace('<?php '.$content));

}

Uauc::run();  //启动项目


if(UAUC_DEBUG) {
    Log::stop();
    //	Log::show();
}
?>

