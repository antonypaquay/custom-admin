
<?php
function crypt_key( $string, $action = 'e' ) {
      
        $secret_key = 'v5=@njc_M#4njv&v=K@BPmDG#cDXJ3Ukkm?#BUJm';
        $secret_iv = 'EGwpcADqT@2n@!!Gz8SQs*Y%BXBrw8mLv$9uJRF-';
        
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
        
        if( $action == 'e' ) {
            $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
        }
        else if( $action == 'd' ){
            $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
        }
        
        return $output;
    }
?>