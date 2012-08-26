<?php

// A quick and dirty SOAP server example

ini_set('soap.wsdl_cache_enabled',0);	// Disable caching in PHP
$PhpWsdlAutoRun=true;					// With this global variable PhpWsdl will autorun in quick mode, too
require_once('class.phpwsdl.php');		// When autorun is enabled, any line after loading PhpWsdl won't be executed!

// In quick mode you can specify the class filename(s) of your webservice 
// optional parameter, if required. The next line will only be executed when 
// not using autorun.
PhpWsdl::RunQuickMode();// -> Don't waste my time - just run!

class SoapDemo{
	/**
	 * Say hello to...
	 * 
	 * @param string $name A name
	 * @return string Response
	 */
	public function SayHello($name){
		$name=utf8_decode($name);
		if($name=='')
			$name='unknown';
		return utf8_encode('Hallo '.$name.'!');
	}
	/**
	 * Say to all hello ...
	 * 
	 * @param stringArray $receivers A name
	 * @return string Response
	 */
	public function SayHelloToAll($receivers){
		$msg="";
		foreach ($receivers as $receiver){ 
			$name=utf8_decode($receiver);
			if($name=='')
				$name='unknown';
			$msg.=utf8_encode('Hallo '.$name.'!\n');
		}
		return $msg;
	}
		/**
	 * Say to all hello ...
	 * 
	 * @param stringArray $receivers A name
	 * @return stringArray Response
	 */
	public function SayHelloToAllOnebyOne($receivers){
		$msgarr=array();
		foreach ($receivers as $receiver){ 
			$name=utf8_decode($receiver);
			if($name=='')
				$name='unknown';
			array_push($msgarr, utf8_encode('Hallo '.$name.'!\n'));
		}
		return $msg;
	}
}
