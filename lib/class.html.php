<?php
class HTML {
  public static function ul(array $items, array $attr) {
    $attr_string = getAttrString($attr);
    $html = '<ul' . $attr_string . '>';
    foreach ($items as $item) {
      $html .= '<li>' . $item . '</li>';
    }
    $html .= '<ul>';
    return $html;
  }

  public static function a($item, array $attr) {
    $attr_string = getAttrString($attr);
    return '<a' . $attr_string . '>' . $item . '</a>';
  }

  private static function getAttrString(array $attr) {
    $attr_string = '';
    foreach ($attr as $name => $value) {
      $name = getPlainString($name);

      switch ($name) {
        case 'src':
        case 'href':
          # TODO can also be a mail
          $value = checkUri($value);
          break;
        default:
          $value = checkString($value);
          break;
      }
      if ($name && $value) {
        $attr_string .= ' ' . $name . '="' . $value . '"';
      }
    }
    return $attr_string;
  }

  private static function checkUri($string) {
    # Extract scheme
    $arr_parts = parse_url($string);
    if (!isset($arr_parts['scheme'])) {
      return false;
    }
    $scheme = $arr_parts['scheme'];

    # Check if it is an email address
    if ('mailto' == $scheme) {
      if (false === filter_var($string, FILTER_VALIDATE_EMAIL)) {
        return false;
      }
      $string = filter_var($string, FILTER_SANITIZE_EMAIL);
    }

    # Check if it is a url
    else {
      if (false === filter_var($string, FILTER_VALIDATE_URL)) {
        return false;
      }
      $string = filter_var($string, FILTER_SANITIZE_URL);
    }
    return htmlentities($string, ENT_QUOTES);
    return false;
  }

  private static function checkString($string) {
    return filter_var($string, FILTER_SANITIZE_STRING);
  }
}