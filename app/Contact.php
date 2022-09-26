<?php

namespace App;
use App\Validations;

class Contact
{

    protected $contact;

	function __construct($contact = null)
	{
		$this->contact = $contact;
	}

	public function checkContactByName($name){
        $url = 'https://api.genderize.io?name='.$name;
		$validationUrl = new Validations($url);
        if( $validationUrl->url_exists( $url ) ){
            return true;
        }else{
            return false;
        }
    }

    public function getContactByName($name){
        $url = 'https://api.genderize.io?name='.$name;
        if( $this->checkContactByName($name) ){
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', $url);
            return $res;
        }
        return null;
    }

}