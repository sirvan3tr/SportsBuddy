<?php
error_reporting(E_ALL);
session_start();
require_once __DIR__ . '/vendor/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1666203576993752',
  'app_secret' => '08bd94f8c9633e0c13d93b1db60706f5',
  'default_graph_version' => 'v2.5',
  'default_access_token' => 'APP-ID|APP-SECRET'
  ]);

$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}

$m = new MongoClient();
$response = $fb->get('/me?fields=id,name', $accessToken);
$_SESSION['fb_user_id'] = $response->getGraphUser()['id'];
$_SESSION['fb_user_name'] = $response->getGraphUser()['name'];
$m = new MongoClient();
$document = array( "id" => $response->getGraphUser()['id'], "name" => $response->getGraphUser()['name'], "events" => array());
if(NULL == $m->sports->users->findOne(array("id" => $response->getGraphUser()['id']))) {
        $m->sports->users->update(array("id" => $response->getGraphUser()['id']), $document, array("upsert" => true));
}

// Logged in
echo '<h3>Access Token</h3>';
var_dump($accessToken->getValue());
// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
echo '<h3>Metadata</h3>';
var_dump($tokenMetadata);
$_SESSION['fb_access_token'] = (string) $accessToken;
// Validation (these will throw FacebookSDKException's when they fail)
$tokenMetadata->validateAppId('1666203576993752');
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
$tokenMetadata->validateExpiration();

if (! $accessToken->isLongLived()) {
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
    exit;
  }

  echo '<h3>Long-lived</h3>';
  var_dump($accessToken->getValue());
}
$_SESSION['fb_access_token'] = (string) $accessToken;
// User is logged in with a long-lived access token.
// You can redirect them to a members-only page.
//header('Location: https://example.com/members.php');
header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/SportsBuddy/viewevents.php' ) ;
?>
