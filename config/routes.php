<?php
use NoahBuscher\Macaw\Macaw;

Macaw::get('','HomeController@home');

Macaw::get('fuck',function(){
	echo "hello word";
});

// Macaw::get('(:all)',function($fu){
// 	echo "未能匹配路由<br>".$fu;
// });
Macaw::$error_callback=function(){
	throw new Exception("路由无匹配项目 404");
	
};

Macaw::dispatch();
?>