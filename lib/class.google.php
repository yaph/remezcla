<?php
// $Id$

/**
 * A class for accessing Google Web Services
 *
 * @author Ramiro Gomez <www@ramiro.org>
 */
class Google extends AbstractWebService {
  
  private $request_uri;
  private $api_key;
  
  public function __construct($api_key) {
    $this->api_key = $api_key;
  }
  
  public function getRequestUri() {
    return $this->request_uri;
  }
}