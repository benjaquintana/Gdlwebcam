<?php

//url aquispe
define('URL_SITIO', 'https://3000-fa6af479-158e-41b8-9d15-57c79cd4ad31.ws-us03.gitpod.io');

require 'paypal/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        '',     // ClientID
        ''      // ClientSecret
    )
);

