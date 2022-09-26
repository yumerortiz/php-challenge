<?php

namespace App\Interfaces;

use App\Contact;


interface CarrierInterface
{
	
	public function dialContact(Contact $contact);

	public function makeCall(): Call;
}