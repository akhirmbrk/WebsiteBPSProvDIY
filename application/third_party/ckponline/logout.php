<?php

require 'vendor/autoload.php';

session_start();

$provider = new JKD\SSO\Client\Provider\Keycloak([
    'authServerUrl'             => 'https://sso.bps.go.id',
    'realm'                     => 'pegawai-bps',
    'clientId'                  => '13400-ckponline-d1y',
    'clientSecret'              => '960a62b0-a1f1-4248-87c3-9611678d2bdb',
    'redirectUri'               => 'http://localhost/ckponline/',
    'encryptionAlgorithm'       => null,
    'encryptionKey'             => null,
    'encryptionKeyPath'         => null
]);

    $url_logout = $provider->getLogoutUrl();
	//echo $url_logout;
	header('Location: '.$url_logout);

?>