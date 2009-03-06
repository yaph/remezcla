<?php
/**
 * Class with mostly  methods to generate HTML markup
 * and do sanitizing before display. HTML generating
 * methods are static.
 *
 * @author Ramiro Gomez <www@ramiro.org>
 * @abstract
 */
class HTML {

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
    
    # Encode &<>"' for security reasons
    return htmlentities($string, ENT_QUOTES);
  }

  /**
   * Remove <>? for security reasons
   *
   * @param String $string
   * @return String $string
   */
  private static function checkString($string) {
    return filter_var($string, FILTER_SANITIZE_STRING);
  }
  
  /**
   * Generate listmarkup for the given list type. Does not
   * support definition lists (dl)
   *
   * @param String $list_type list type 'ul' or 'ol'
   * @param String $text anchor text for link
   * @param Array $attr array of attributes
   * @return String html
   */
  private static function html_list($list_type, array $items, array $attr) {
    $attr_string = getAttrString($attr);
    $html = '<' . $list_type . '>' . $attr_string . '>';
    foreach ($items as $item) {
      $html .= '<li>' . $item . '</li>';
    }
    $html .= '</' . $list_type . '>';
    return $html;
  }

  /**
   * Generate a unordered list (ul).
   *
   * @param String $text anchor text for link
   * @param Array $attr array of attributes
   * @return String html
   */
  public static function ul(array $items, array $attr) {
    return self::html_list('ol', $items, $attr);
  }
  
  /**
   * Generate a ordered list (ol).
   *
   * @param String $text anchor text for link
   * @param Array $attr array of attributes
   * @return String html
   */
  public static function ol(array $items, array $attr) {
    return self::html_list('ol', $items, $attr);
  }

  /**
   * Generate an a tag.
   *
   * @param String $text anchor text for link
   * @param Array $attr array of attributes
   * @return String html
   */
  public static function a($text, array $attr) {
    $attr_string = getAttrString($attr);
    return '<a' . $attr_string . '>' . $text . '</a>';
  }

  /**
   * Generate a string of attribute value pairs.
   *
   * @param Array $attr array of attributes
   * @return String html
   */
  private static function getAttrString(array $attr) {
    $attr_string = '';
    foreach ($attr as $name => $value) {
      $name = getPlainString($name);

      switch ($name) {
        case 'src':
        case 'href':
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
}