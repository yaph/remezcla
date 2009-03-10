<?php
/**
 * Abstract class for using Web Services.
 *
 * @author Ramiro Gómez <www@ramiro.org>
 * @abstract
 */
abstract class AbstractWebService {
  
  /**
   * Set the URI to request.
   *
   * TODO
   * probably better to force setting base_uri and query param array
   * and move setRequestUri functionality here.
   *
   * @param Array $request_params
   * @return Void
   */
  abstract protected function setRequestUri();
  
  /**
   * Get a list of ItemsSet the cache duration in seconds.
   *
   * @param Object or Array $data Can be a SimpleXMLElement or another object
   * @return Array
   */
  abstract protected function getItems($data);
  
  /**
   * Set the cache duration in seconds.
   *
   * @param Void
   * @return Void
   */
  abstract public function setCacheDuration();
  
  /**
   * Fetch the content of the given URI.
   *
   * @return String $response
   */
  protected function get() {
    $request_uri = self::getRequestUri();
    $cache_id = md5($request_uri);
    
    $result = '';
    if (FALSE === ($result = self::getCache($cache_id))) {
      if (FALSE !== $result = self::request($request_uri)) {
        # TODO exception handling
        $success = self::cache($cache_id, $result);
      } else {
        # TODO exception handling
        die("No results for request");
      }
      
    }
    return $result;
  }

  /**
   * Get the URI to request.
   *
   * @return String $request_uri
   */
  private function getRequestUri() {
    return $this->request_uri;
  }
  
  /**
   * Get the cache duration in seconds for the current object.
   *
   * @return Integer $request_uri
   */
  private function getCacheDuration() {
    return $this->cache_duration;
  }

  /**
   * Return a cached version of the requested content or
   * FALSE if not cached.
   *
   * @param String $cache_id
   * @return String $cached OR FALSE
   */
  private function getCache($cache_id) {
    $class_name = get_class($this);
    return FALSE;
  }
  
  /**
   * Request the given URI and return the response.
   *
   * @param String $request_uri
   * @return String $response OR FALSE
   */
  private function request($request_uri) {
    $ch = curl_init($request_uri);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
  }
  
  /**
   * Cache the response of a request.
   *
   * @param String $request_uri
   * @return String $response
   */
  private function cache($cache_id, $response) {
    #var_dump(PATH_CACHE);
    return FALSE;
  }
}