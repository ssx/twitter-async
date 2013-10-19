<?php
// Require composers autoload script
require "vendor/autoload.php";

// Test credentials file
require "TestCredentials.php";

$twitterObj = new SSX\EpiTwitter($consumer_key, $consumer_secret, $token, $secret);
$twitterObjUnAuth = new SSX\EpiTwitter($consumer_key, $consumer_secret);
?>

<h2>Generate the authorization link</h2>
<?php echo $twitterObjUnAuth->getAuthenticateUrl(); ?>

<hr>

<h2>Verify credentials</h2>
<?php
  $creds = $twitterObj->get('/account/verify_credentials.json');
?>
<pre>
<?php print_r($creds->response); ?>
</pre>

