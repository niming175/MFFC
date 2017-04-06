<?php 
class HomeController extends BaseController
{
	public function home()
	{
		// $article=Article::first();
		//  require dirname(__FILE__).'/../views/home.php';

		$this->view=View::make('home')->with('article',Article::first())
		->withTitle('MFFC :-D')
		->withFuckMe('OK!');
		//phpinfo();
		//避免每次刷新都发送邮件
		// $this->mail=Mail::to('niming175@qq.com')
		// ->from('sent emial test <yu11333@sohu.com>')
		// ->title('hello world')
		// ->content('<h1>HEllo World!!</h1>');

		Redis::set('key','value',5,'h');
		echo Redis::get('key');
	}
}
?>