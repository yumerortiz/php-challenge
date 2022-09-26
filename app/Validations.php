<?php

namespace App;

class Validations{

    function url_exists( $url = NULL ) {
        if( empty( $url ) ){
            return false;
        }
        stream_context_set_default(
            array(
                'http' => array(
                    'method' => 'HEAD'
                )
            )
        );
        $headers = @get_headers( $url );
        sscanf( $headers[0], 'HTTP/%*d.%*d %d', $httpcode );
        $accepted_response = array( 200, 301, 302 );
        if( in_array( $httpcode, $accepted_response ) ) {
            return true;
        } else {
            return false;
        }
    }

}