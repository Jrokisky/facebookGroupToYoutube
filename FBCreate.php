<?php
require __DIR__ . '/vendor/autoload.php';

class FBCreate {
  private $config;
  private $appsecret_proof;
  private $facebook;

  function __construct($config) {
    $this->config = $config;
  }

  function getFB() {
    if(is_null($this->facebook)) {
      $this->facebook = new \Facebook\Facebook([
        'app_id' => $this->config['app_id'],
        'app_secret' => $this->config['app_secret'],
        'default_graph_version' => $this->config['default_graph_version'],
        'default_access_token' => $this->config['app_access_token'],
        'enable_beta_mode' => $this->config['enable_beta_mode'],
        'app_secret_proof' => $this->get_appsecret_proof(),
      ]);
    }

    return $this->facebook;
  }

  private function get_appsecret_proof() {
    if(is_null($this->appsecret_proof)) {
      $this->appsecret_proof = hash_hmac('sha256', $this->config['app_access_token'], $this->config['app_secret']); 
    }

    return $this->appsecret_proof;
  }

}

?>
