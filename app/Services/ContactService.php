<?php

namespace App\Services;

use App\Contact;


class ContactService
{

	public static function findByName($name)
	{
		// queries to the db
		$contact = new Contact;
		$data_contact = $contact->getContactByName($name);
		if( $data_contact ){
			$data = json_decode($data_contact->getBody(), true);
			return $data;
		}
		return null;
	}

	public static function validateNumber(string $number): bool
	{
		if( is_numeric($number) ){
			return true;
		}
		return false;
	}
}