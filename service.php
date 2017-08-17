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
		$response->setResponseSubject("Descarga la App");
		$response->createFromTemplate("basic.tpl", []);
		return $response;
	}

	public function _apk(Request $request)
	{
		// get path to the www folder
		$di = \Phalcon\DI\FactoryDefault::getDefault();
		$www_root = $di->get('path')['root'];

		// get the file to attach
		$file = "$www_root/public/download/apretaste.apk";

		$response = new Response();
		$response->setEmailLayout("email_empty.tpl");
		$response->setResponseSubject("Descarga la App");
		$response->createFromTemplate("apk.tpl", [], [], [$file]);
		return $response;
	}

	public function _rar(Request $request)
	{
		// get path to the www folder
		$di = \Phalcon\DI\FactoryDefault::getDefault();
		$www_root = $di->get('path')['root'];

		// get the file to attach
		$file = "$www_root/public/download/apretaste.rar";

		$response = new Response();
		$response->setEmailLayout("email_empty.tpl");
		$response->setResponseSubject("Descarga la App");
		$response->createFromTemplate("rar.tpl", [], [], [$file]);
		return $response;
	}
}
