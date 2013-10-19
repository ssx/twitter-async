<?php
// Require composers autoload script
require "vendor/autoload.php";

// Test credentials file
require "TestCredentials.php";

$twitterObj = new \SSX\EpiTwitter($consumer_key, $consumer_secret, $token, $secret);
$twitterObjUnAuth = new \SSX\EpiTwitter($consumer_key, $consumer_secret);
?>

<h2>Generate an authorisation link</h2>
<?php echo $twitterObjUnAuth->getAuthenticateUrl(); ?>

<hr>

<?php $creds = $twitterObj->get('/account/verify_credentials.json'); ?>
<pre><?php print_r($creds->response); ?></pre>

<hr>

<h2>Get followers (first cursor)</h2>
<?php
  $followers = $twitterObj->get("/followers/ids.json", array(
  	"screen_name" => "ssx"
  ));
?>
<pre><?php print_r($followers->response); ?></pre>

<hr>

<h2>Post a status update</h2>
<?php
$twitterObj->post('/statuses/update.json', array(
  	"status" => "Hello from twitter-aysnc!"
));
?>

