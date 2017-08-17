<?php

/**
 * Apretaste Apks
 *
 * @author kumahacker
 * @version 1.0
 */
 
class App extends Service
{

	/**
	 * Function executed when the service is called
	 *
	 * @param Request
	 * @return Response
	 * */
	public function _main(Request $request)
	{
		$response = new Response();
		$response->setEmailLayout("email_empty.tpl"); 
		$response->setResponseSubject("Apreaste App");
		$response->createFromTemplate("basic.tpl", []);
		return $response;
	}
	
	public function _apk(Request $request)
	{
		$response = new Response();
		$response->setEmailLayout("email_empty.tpl"); 
		$response->setResponseSubject("Aqui esta la App de Apretaste!");
		
		// get path to the www folder
		$di = \Phalcon\DI\FactoryDefault::getDefault();
		$www_root = $di->get('path')['root'];
		
		$file = "$www_root/public/downloads/apretaste.apk";
		
		$response->createFromTemplate("apk.tpl", [], [], [$file]);
		return $response;
	}
	
	public function _rar(Request $request)
	{
		$response = new Response();
		$response->setEmailLayout("email_empty.tpl"); 
		$response->setResponseSubject("Aqui esta la App de Apretaste!");
		
		// get path to the www folder
		$di = \Phalcon\DI\FactoryDefault::getDefault();
		$www_root = $di->get('path')['root'];
		
		$file = "$www_root/public/downloads/apretaste.rar";
		
		$response->createFromTemplate("rar.tpl", [], [], [$file]);
		return $response;
	}
	
}
