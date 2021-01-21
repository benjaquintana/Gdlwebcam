<?php

//url aquispe
define('URL_SITIO', 'https://3000-fa6af479-158e-41b8-9d15-57c79cd4ad31.ws-us03.gitpod.io');

require 'paypal/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AXsWy0N2lr0vvEsEw68ZE0utU2JiksjwALRlC-I2R8lbdAvIkASLrjPEiI4xNKA9eaFQZJj9xGLTfcUI', // ClientID
        'EMzfdaEaHZ7sfEcjMS3_B0OR9iSyPxTuRtfUemzuXLWMYCSRhb_aqVsQOtLwjPl6zVS2gVv7XZgzmxSS'  // ClientSecret
    )
);

