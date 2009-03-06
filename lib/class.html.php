<?php
/**
 * Class with methods to generate HTML markup and do sanitizing
 * before display. HTML generating methods are static.
 *
 * @author Ramiro Gomez <www@ramiro.org>
 */
class HTML {

  /**
   * Validate and sanitize URIs.
   *
   * @param String $string
   * @return String $string
   */
  private static function checkUri($string) {
    # Extract scheme
    $arr_parts = parse_url($string);
    if (!isset($arr_parts['scheme'])) {
      return false;
    }
    $scheme = $arr_parts['scheme'];

    # Check if it is an email address
    if ('mailto' == $scheme) {
      $email = $arr_parts['path'];
      if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
      }
      $string = 'mailto:' . filter_var($email, FILTER_SANITIZE_EMAIL);
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
   * Remove <>? for security reasons.
   *
   * @param String $string
   * @return String $string
   */
  private static function checkString($string) {
    return filter_var($string, FILTER_SANITIZE_STRING);
  }

  /**
   * Generate a string of attribute value pairs.
   *
   * @param Array $attr Array of attributes.
   * @return String html
   */
  private static function getAttrString(array $attr = array()) {
    $attr_string = '';
    if (!empty($attr)) {
      foreach ($attr as $name => $value) {
        $name = self::checkString($name);
        switch ($name) {
          case 'src':
          case 'href':
            $value = self::checkUri($value);
            break;
          default:
            $value = self::checkString($value);
            break;
        }
        if ($name && $value) {
          $attr_string .= ' ' . $name . '="' . $value . '"';
        }
      }
    }
    return $attr_string;
  }
  
  /**
   * Generic function to generate markup for HTML elements.
   *
   * @param String $name Name of the HTML element.
   * @param Array @attr Array of attributes.
   * @param String $content Optional content of the HTML element.
   * @return String html
   */
  private static function element($name, array $attr = array(), $content = '') {
    $attr_string = self::getAttrString($attr);
    $html = '<' . $name . $attr_string;
    if (empty($content)) {
      $html .= ' />';
    }
    else {
      $html .= '>' . $content . '</' . $name . '>';
    }
    return $html;
  }

  /**
   * Generate list markup for the given list type. Does not
   * support definition lists (dl).
   *
   * @param String $list_type List type is one of 'ul' and 'ol'.
   * @param Array $items Array of list item texts.
   * @param Array $attr Array of attributes.
   * @return String html
   */
  private static function html_list($list_type, array $items, array $attr) {
    $attr_string = self::getAttrString($attr);
    $html = '<' . $list_type . '>' . $attr_string . '>';
    foreach ($items as $item) {
      $html .= '<li>' . $item . '</li>';
    }
    $html .= '</' . $list_type . '>';
    return $html;
  }

  /**
   * Generate an unordered list (ul).
   *
   * @param Array $items Array of list item texts.
   * @param Array $attr Array of attributes.
   * @return String html
   */
  public static function ul(array $items, array $attr) {
    return self::html_list('ol', $items, $attr);
  }
  
  /**
   * Generate an ordered list (ol).
   *
   * @param Array $items Array of list item texts.
   * @param Array $attr Array of attributes.
   * @return String html
   */
  public static function ol(array $items, array $attr) {
    return self::html_list('ol', $items, $attr);
  }

  /**
   * Generate an a tag.
   *
   * @param String $text Anchor text for link.
   * @param Array $attr Array of attributes.
   * @return String html
   */
  public static function a($text, array $attr) {
    return self::element('a', $attr, $text);
  }
}