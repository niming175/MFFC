<?php 
class BaseController
{
	protected $view;
	protected $mail;
	public function __construct()
	{
		
	}

	public function __destruct()
	{
		$view=$this->view;
		if($view instanceof View){
			extract($view->data); //extract() 从数组中将变量导入到当前的符号表
			require $view->view;
		}

		$mail=$this->mail;
		if($mail instanceof Mail){
			$mailer=new Nette\Mail\SmtpMailer($mail->config);
			$mailer->send($mail);
		}
	}
}