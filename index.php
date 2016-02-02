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

$rand = rand(1, 5);
switch($rand) {
	case 1:
		$hash = "#quote";
		break;
	case 2:
		$hash = "#justsayin";
		break;
	case 3:
		$hash = "#random";
		break;
	case 4:
		$hash = "#hashtag";
		break;
	case 5:
		$hash = "#trending";
		break;				
}
echo $rand;
echo $hash;

$status = $status + " " + $hash;

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