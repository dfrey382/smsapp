<?php

namespace App\AFT;

use App\AFT\AfricasTalkingGateway;
/**
 * 
 */
class SMS extends AfricasTalkingGateway
{
	
	protected  static $gateway;

	public static function prepare()
	{
		$apiKey = \Config::get('aft.apikey');
		$environment = \Config::get('aft.environment');
		$username = $environment=="sandbox"?'sandbox':\Config::get('aft.username');

		if($username == 'sandbox'){
			self::$gateway =  new AfricasTalkingGateway($username, $apiKey, 'sandbox');
		}else{

			self::$gateway =  new AfricasTalkingGateway($username, $apiKey);
		}
	}


	public static function sendSMS($recipients, $message){

		self::prepare();

		try 
			{ 
			  $results = self::$gateway->sendMessage($recipients, $message);
			  return $results;
			}
			catch ( AfricasTalkingGatewayException $e )
			{
			  echo "Encountered an error while sending: ".$e->getMessage();


			}

	}
}