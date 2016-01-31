<?php
// require codebird
require_once('codebird.php');
 
\Codebird\Codebird::setConsumerKey("Consumer_Key", "Consumer_Secret");
$cb = \Codebird\Codebird::getInstance();
$cb->setToken("Access_Token", "Access_Token_Secret");

exec('script -c "/usr/games/fortune" /tmp/tweeter.txt');
$result = file('/tmp/tweeter.txt');

//Remove useless lines for script command
array_shift($result);
array_pop($result);
array_pop($result);

$status = "";
foreach ($result as $line) {
	$status = $status . $line; 
}

$params = array(
  'status' => $status
);
if(strlen($status) <= 140) {
	$reply = $cb->statuses_update($params);
}
else {
	echo 'Above 140';
}
?>