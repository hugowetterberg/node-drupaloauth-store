<?php
require('oauth_common/lib/OAuth.php');
require('oauth_common/includes/OAuthSignatureMethod_HMAC.inc');
require('rest_client/includes/RestClient.php');
require('rest_client/includes/RestClientRequest.php');
require('rest_client/includes/RestClientOAuth.php');

$consumer = new OAuthConsumer('', '');
$token = new OAuthToken('', '');
$oauth = new RestClientOAuth($consumer, $token, new OAuthSignatureMethod_HMAC('sha1'), TRUE);
$client = new RestClient($oauth, new RestClientBaseFormatter(RestClientBaseFormatter::FORMAT_JSON));

$time = microtime(TRUE);
var_dump($client->get('http://localhost:8000/some/res', array()));
$time = (microtime(TRUE) - $time) * 1000;
print "Ay, that took {$time} milliseconds";