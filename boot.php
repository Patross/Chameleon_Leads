<?php

error_reporting(0);

//autoloading the packages in the vendor folder.
require "vendor/autoload.php";

//setting up braintree credentials
Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('973ztmw37rbwf78w');
Braintree_Configuration::publicKey('5d7s4qmhhwr95jb8');
Braintree_Configuration::privateKey('6b72568f8f05315d93ae61e8c2cd87fa');

//Booting Done.