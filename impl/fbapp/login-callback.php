<?php
session_start();
require_once __DIR__ . '/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '1764033723834252',
  'app_secret' => '823e8ae98dc19c6b7aee9be879939e33',
  'default_graph_version' => 'v2.5',
  'cookie' => true
]);

$helper = $fb->getJavaScriptHelper();

try {
  $accessToken = $helper->getAccessToken();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
}

if (isset($accessToken)) {
   $fb->setDefaultAccessToken($accessToken);

  try {

    $requestProfile = $fb->get("/me?fields=id,name,birthday,email,picture,link,gender");
    $profile = $requestProfile->getGraphUser();

      $_SESSION['name'] = $profile->getName();
      $_SESSION['id'] = $profile->getId();
      $_SESSION['picture'] = $profile->getPicture();
      $_SESSION['gender'] = $profile->getGender();
      $_SESSION['link'] = $profile->getLink();
      $_SESSION['birthday'] = $profile->getBirthday();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
  }
  header('location: ../');
  exit;
} else {
    echo "Unauthorized access!!!";
    exit;
}
