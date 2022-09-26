<?php

namespace App;
use App\Interfaces\CarrierInterface;

use App\Contact;
use App\Call;

class Provider implements CarrierInterface{

    public function dialContact($contact){
        if( $contact ){
            return true;
        }
        return false;
    }

    public function makeCall($phone_number){
        $call = new Call;
        return $call->doCall($phone_number);
    }

}