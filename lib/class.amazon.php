<?php
/**
 * A class for accessing Amazon Web Services.
 *
 * @author Ramiro Gómez <www@ramiro.org>
 */
class Amazon extends AbstractWebService {
  
  private $common_request_params;
  private $base_uri;
  protected $request_uri;
  protected $cache_duration;
  
  /**
   * Constructor with initializations
   *
   * @param Array $common_request_params common request parameters
   * @param String $locale locale identifier.
   * @return Void
   */
  public function __construct(array $common_request_params, $locale = '') {
    $this->common_request_params = $common_request_params;

    if (!$locale) {
      $locale = 'US';
    }
    
    $map_locale_tld = array(
      'CA' => 'ca',
      'DE' => 'de',
      'FR' => 'fr',
      'JP' => 'jp',
      'UK' => 'co.uk',
      'US' => 'com'
      );
    
    if (isset($map_locale_tld[$locale])) {
      $tld = $map_locale_tld[$locale];
    } else {
      # TODO exception handling
      $tld = 'com';
    }
    
    $this->base_uri = 'http://ecs.amazonaws.' . $tld . '/onca/xml';
  }
  
  /**
   * Implementation of setRequestUri.
   */
  protected function setRequestUri($request_params = array()) {
    $this->common_request_params += $request_params;
    
    $params = array();
    foreach ($this->common_request_params as $k => $v) {
      $params[] = "$k=$v";
    }
    $query = implode('&', $params);
    $this->request_uri = $this->base_uri . '?' . $query;
  }
  
  /**
   * Implementation of setCacheDuration.
   */
  public function setCacheDuration() {
    # set to one day as default
    $this->cache_duration = 86400;
  }
  
  /**
   * Amazon ItemSearch operation.
   *
   * @param Array $request_params
   * @return Void
   */
  public function ItemSearch($request_params = array()) {
    $request_params['Operation'] = __function__;
    $this->setRequestUri($request_params);
    $this->get();
  }
}