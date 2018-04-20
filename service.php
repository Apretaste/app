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
	 */
	public function _main(Request $request)
	{
		// get email mailbox
		$delivery = Connection::query("SELECT email FROM delivery_input WHERE environment='email' AND active=1 ORDER BY RAND() LIMIT 1");
		$mailbox = $delivery[0]->email . "+" . $request->username . "@gmail.com";

		$response = new Response();
		$response->setCache("month");
		$response->setEmailLayout("email_empty.tpl");
		$response->setResponseSubject("Descarga la App");
		$response->createFromTemplate("basic.tpl", ["mailbox"=>$mailbox]);
		return $response;
	}

	/**
	 * Download the app as an APK file
	 *
	 * @param Request
	 * @return Response
	 */
	public function _apk(Request $request)
	{
		// get path to the www folder
		$di = \Phalcon\DI\FactoryDefault::getDefault();
		$wwwroot = $di->get('path')['root'];

		// get the file to attach
		$file = "$wwwroot/public/download/apretaste.apk";

		$response = new Response();
		$response->setEmailLayout("email_empty.tpl");
		$response->setResponseSubject("Descarga la App");
		$response->createFromTemplate("apk.tpl", [], [], [$file]);
		return $response;
	}

	/**
	 * Download the app as a RAR file
	 *
	 * @param Request
	 * @return Response
	 */
	public function _rar(Request $request)
	{
		// get path to the www folder
		$di = \Phalcon\DI\FactoryDefault::getDefault();
		$wwwroot = $di->get('path')['root'];

		// get the file to attach
		$file = "$wwwroot/public/download/apretaste.rar";

		$response = new Response();
		$response->setEmailLayout("email_empty.tpl");
		$response->setResponseSubject("Descarga la App");
		$response->createFromTemplate("rar.tpl", [], [], [$file]);
		return $response;
	}
}
