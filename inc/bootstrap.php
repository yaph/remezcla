<?php
// $Id$

define('PATH_HTDOCS', getcwd() . DIRECTORY_SEPARATOR);
define('PATH_LIB', PATH_HTDOCS . 'lib' . DIRECTORY_SEPARATOR);

// include required classes
$classes = array('abstract_web_service', 'amazon');
foreach ($classes as $class) {
  include PATH_LIB . 'class.' . $class . '.php';
}