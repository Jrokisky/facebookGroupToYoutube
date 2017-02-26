<?php
/**
 * @file
 * Models a Facebook post
 *
 */

class FBPost {
  private $authorId;
  private $updatedAt;
  private $name;
  private $message;
  private $link;
  private $id;

  function __construct($id, $authorId, $updatedAt, $name, $message, $link) {
    $this->id = $id;
    $this->authorId = $authorId;
    $this->updatedAt = $updatedAt;
    $this->name = $name;
    $this->message = $message;
    $this->link = $link;
  }

  function getId() {
    return $this->id;
  }

  function getAuthorId() {
    return $this->authorId;
  }

  function getUpdatedAt() {
    return $this->updatedAt;
  }

  function getName() {
    return $this->name;
  }

  function getMessage() {
    return $this->message;
  }

  function getLink() {
    return $this->link;
  }

  /**
   * Concats Name, Message, & Link with newlines
   */
  function getConcatMessage() {
    $result = "";
    if($this->name !== "") {
      $result = $result . $this->name . "\n";
    }
    if($this->message !== "") {
      $result = $result . $this->message . "\n";
    }
    if($this->link !== "") {
      $result = $result . $this->link;
    }
    return $result;
  }
}

