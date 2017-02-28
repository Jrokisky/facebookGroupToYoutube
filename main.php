<?php
  require('FBCreate.php');
  require('Fetcher.php');
  $config = include('config.php');

  $fbcreate = new FBCreate($config);
  $fetcher = new Fetcher($fbcreate->getFB());
  $result = $fetcher->fetchAll('/' .$config['group_id'] .'/' .$config['request']);
  foreach($result as $k => $v) {
    if (isset($v['link'])) {
      echo $v['link'] . "\n";
    }
  }
?>
