<?php 
// class Article
// {
// 	public static function first(){
// 		$connection=mysql_connect('localhost','root');
// 		if(!$connection){
// 			die("Could not connect:".mysql_error());
// 		}
// 		mysql_set_charset("UTF8",$connection);
// 		mysql_select_db("my_test",$connection);
// 		$result=mysql_query("select * from test1");

// 		if($row=mysql_fetch_array($result)){
// 			return $row;
// 		}
// 		mysql_close($connection);
// 	}
// }

class Article extends Illuminate\Database\Eloquent\Model{
	public $timestamps=false;
}
?>