<?php

namespace App;

use App\Interfaces\CarrierInterface;
use App\Services\ContactService;
use App\Provider;


class Mobile
{

	public function makeCallByName($name = '')
	{
		if( empty($name) ) return null;

		$contact = ContactService::findByName($name);
		if( $contact ){
			if( $contact['count'] > 0 ){
				$provider = new Provider;
				$provider->dialContact( $contact );
				$resultCall = $provider->makeCall($contact['count']);
				return $resultCall;
			}
			return null;
		}
		return null;
	}

}
