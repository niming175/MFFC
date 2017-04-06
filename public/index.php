<?php  
/*
use Illuminate\Database\Capsule\Manager as Capsule;
//autoload 自动载入
require '../vendor/autoload.php';
//Eloquent ORM
$capsule=new Capsule;
$capsule->addConnection(require "../config/database.php");
$capsule->bootEloquent();
//路由配置
require '../config/routes.php';*/

//定义 PUBLIC_PATH
define('PUBLIC_PATH', __DIR__);

//启动器
require PUBLIC_PATH.'/../bootstrap.php';

//路由器配置、开始处理
require BASE_PATH.'/config/routes.php';
?>