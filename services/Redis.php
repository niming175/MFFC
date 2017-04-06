<?php 
use Predis\Client;

class Redis
{
	//在类里面。定义常量用const,而不是用define
	const CONFIG_FILE='/config/redis.php';
	protected static $redis;
	public static function init()
	{
		self::$redis=new Client(require BASE_PATH.self::CONFIG_FILE);
	}

	public static function set($key,$value,$time=null,$unit=null)
	{
		self::init();
	    if ($time) {
		  	switch ($unit) {
		        case 'h':
					$time *= 3600;
					break;
		 		case 'm':
			 		$time *= 60;
			        break;
		        case 's':
		        case 'ms':
		      		break;
		        default:
		      		throw new InvalidArgumentException('单位只能是 h m s ms');
		      	break;
		  	}

	      	if ($unit=='ms') {
	        	self::_psetex($key,$value,$time);
	      	} 
	      	else {
	        	self::_setex($key,$value,$time);
	      	}

    	} 
    	else {
      		self::$redis->set($key,$value);
    	}

	}

	public static function get($key)
	{
		salf::init();
		return self ::$redis->get($key);
	}

	public static function delete($key)
	{
		self::init();
		return self::$redis->del($key);
	}

	private static function _setex($key,$value,$time)
	{
		//setex  Redis sete下命令用于在redis键中超时，设置键的字符串值，返回0或者null
		self::$redis->setex($key,$time,$value);
	}

	private static function _psetex($key,$value,$time)
	{
		//Redis PSETEX命令用于设置键的值，以毫秒为单位指定过期时间。
		self::$redis->psetex($key,$value,$time);
	}
}
?>