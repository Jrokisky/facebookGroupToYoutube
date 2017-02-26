<?php

/**
 * Fetches all data using the given request from the given facebook object.
 */
class Fetcher {
  private $facebook;

  public function __construct($facebook) {
    $this->facebook = $facebook;
  }

  public function fetchAll($request) {
    $data = array();

    try {
      $response = $this->facebook->get($request);
      $feedEdge = $response->getGraphEdge();

      while(!is_null($feedEdge)) {
        foreach ($feedEdge as $post) {
          $data[] = $post->asArray();
        }

        $feedEdge = $this->facebook->next($feedEdge);
      }

    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
      $data['error'] = 'Graph returned an error: ' . $e->getMessage();
      return $data;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      $data['error'] = 'Facebook SDK returned an error: ' . $e->getMessage();
      return $data;
    }

    return $data;
  }
}

?>
