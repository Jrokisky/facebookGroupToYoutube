<?php
  require('FBCreate.php');
  require('Fetcher.php');
  require('FBPost.php');
  $config = include('config.php');

  $fbcreate = new FBCreate($config);
  $fetcher = new Fetcher($fbcreate->getFB());
  $result = $fetcher->fetchAll('/' .$config['group_id'] .'/' .$config['request']);

  foreach($result as $k => $v) {
     //build our Facebook Post
     $id = $v['id'];
     $authorId = $v['from']['id'];
     $name = isset($v['name']) ? $v['name'] : '';
     $message =  isset($v['message']) ? $v['message'] : '';
     $link = isset($v['link']) ? $v['link'] : '';
     $updatedAt = $v['updated_time']->getTimeStamp();
     $fbpost = new FBPost($id, $authorId, $updatedAt, $name, $message, $link);
    echo($fbpost->getLink() . "\n");
  }


?>
