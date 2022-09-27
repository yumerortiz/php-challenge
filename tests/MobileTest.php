<?php

namespace Tests\MobileTest;
use App\Mobile;
use App\Contact;

use Mockery as m;
use PHPUnit\Framework\TestCase;

class MobileTest extends TestCase
{

	/** @test */
	public function it_returns_null_when_name_empty()
	{
		$mobile = new Mobile();
		$this->assertNull($mobile->makeCallByName(''));
	}

	function test_it_returns_data_from_an_existing_contact_by_name(){
		$name = 'peter';
		$mobile = new Mobile();
		$phone = $mobile->makeCallByName($name);
		$this->assertEquals(1094417, $phone);
	}

	function test_it_returns_null_when_not_existing_contact_name(){
		$name = 'peter202020';
		$mobile = new Mobile();
		$phone = $mobile->makeCallByName($name);
		$this->assertNull($phone);
	}

	function test_it_returns_null_when_the_number_of_sms_is_not_valid(){
		$number = "01MinumeroNoValido45";
		$mobile = new Mobile();
		$resultSms = $mobile->makeSendSMS($number, 'El cuerpo del mensaje');
		$this->assertNull($resultSms);
	}

	function test_it_returns_true_when_the_number_of_sms_is_valid(){
		$number = "012224";
		$mobile = new Mobile();
		$resultSms = $mobile->makeSendSMS($number, 'El cuerpo del mensaje');
		$this->assertEquals(true, $resultSms);
	}

}
