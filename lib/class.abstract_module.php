<?php
/**
 * Abstract module class.
 *
 * @author Ramiro Gomez <www@ramiro.org>
 * @abstract
 */
abstract class AbstractModule {
  
  /**
   * Returns an array of query paths function mappings.
   *
   * @param Void
   * @return Array
   */
  abstract protected function pathMap();
  
  /**
   * Defines what do on the start page.
   *
   * @param Void
   * @return Array
   */
  abstract protected function index();
  
  /**
   * Returns an array of query path function mappings.
   *
   * @param Array $modules Array of enabled modules' class names
   * @return Array $path_map Array with all path mappings
   */
  public function getPathMap(array $modules) {
    # TODO look up cached version
    $path_map = array();
    foreach ($modules as $class_name) {
      if (method_exists($class_name, 'pathMapper')) {
        $path_map[] = $class_name->pathMapper();
      }
      # This should never happen if all modules are child
      # classes of the AbstractModule class.
      else {
        die('No pathMapper method defined in class: ' . $class_name);
      }
    }
    return $path_map;
  }
}