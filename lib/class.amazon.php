<?php
/**
 * A class for accessing Amazon Web Services
 *
 * @author Ramiro Gomez <www@ramiro.org>
 */
class Amazon extends AbstractWebService {
  
  private $api_key;
  private $request_uri;
  private $cache_duration;
  
  /**
   * Constructor with initializations
   *
   * @param Void
   * @return Void
   */
  public function __construct($api_key) {
    $this->api_key = $api_key;
  }
  
  /**
   * Set the URI to request
   *
   * @param Void
   * @return Void
   */
  protected function setRequestUri() {
    $this->request_uri = '';
  }
  
  /**
   * Set the cache duration in seconds
   *
   * @param Void
   * @return Void
   */
  public function setCacheDuration() {
    # set to one day as default
    $this->cache_duration = 86400;
  }
}