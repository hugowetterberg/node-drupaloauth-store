<?php
if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
  require('settings.php');
  $con = mysqli_connect($db_host, $db_user, $db_password, $db_name);

  $result = array();

  if (!empty($_GET['oauth_token'])) {
    $key = mysqli_real_escape_string($con, $_GET['oauth_token']);
    $res = mysqli_query($con, sprintf("SELECT * FROM {$db_prefix}oauth_common_token WHERE token_key = '%s' AND provider_token = 1 AND type='access'", $key));
    if ($res && $a = mysqli_fetch_assoc($res)) {
      $a['services'] = json_decode($a['services']);
      $result['token'] = $a;
    }
  }

  if (!empty($_GET['oauth_consumer_key'])) {
    $key = mysqli_real_escape_string($con, $_GET['oauth_consumer_key']);
    $res = mysqli_query($con, sprintf("SELECT * FROM {$db_prefix}oauth_common_consumer WHERE consumer_key = '%s'", $key));
    if ($res && $a = mysqli_fetch_assoc($res)) {
      $result['consumer'] = $a;
    }
  }
  print json_encode($result);
}
else {
  header('HTTP/1.1 401 Only local requests accepted');
}