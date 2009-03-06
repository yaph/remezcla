<?php
# check that the query path param is ok
if (isset($_GET['path'])) {
  $path = $_GET['path'];
  # list of allowed chars may need to be extended
  # in first part of path only letters are allowed
  # TODO maybe better to use explode ...
  if (!preg_match("!^[A-Za-z]+?(?:/(?:[\w/-]+)?)?$!", $path)) {
    die("404");
  }
}

# path constants
define('PATH_HTDOCS', getcwd() . DIRECTORY_SEPARATOR);
define('PATH_LIB', PATH_HTDOCS . 'lib' . DIRECTORY_SEPARATOR);
define('PATH_CACHE', PATH_HTDOCS . 'cache' . DIRECTORY_SEPARATOR);

# TODO set base URL constant for HTML links and a JS variable that can be used in Templates remezcla.baseUri

# file constants
define('FILE_CONFIG', PATH_HTDOCS . 'config' . DIRECTORY_SEPARATOR . 'config.php');

# include configuration
include FILE_CONFIG;

// load configuration
$defined_vars = get_defined_vars();
if (!isset($defined_vars['CONFIG'])) {
  die("Error: configuration not set.");
}
$config = $defined_vars['CONFIG'];

# include required classes
$classes = array(
  'abstract_module',
  'abstract_web_service',
  'amazon'
);
foreach ($classes as $class) {
  include PATH_LIB . 'class.' . $class . '.php';
}