<?php
/**
 * Abstract class for using Web Services
 *
 * @author Ramiro Gomez <www@ramiro.org>
 * @abstract
 */
abstract class AbstractWebService {
  # force extending class to define these methods
  abstract protected function setRequestUri();
  abstract public function setCacheDuration();

  /**
   * Fetch the content of the given URI
   *
   * @return String $response
   */
  public function get() {
    $request_uri = self::getRequestUri();
    print $request_uri;
  }
    
  /**
   * Get the URI to request
   *
   * @return String $request_uri
   */
  public function getRequestUri() {
    return $this->request_uri;
  }
}