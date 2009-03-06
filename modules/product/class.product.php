<?php
class Product extends AbstractModule {

  /**
   * Instance of Amazon class
   *
   * @var Amazon
   */
  protected $amazon;

  /**
   * Constructor of product class
   *
   * @param Object $amazon
   * @return Void
   */
  public function __construct($amazon) {
    $this->amazon = $amazon;
  }

  # TODO cache path arrays in Anstract class
  public function pathMapper() {
    return array(
      'product' => array(
        'callback' => 'item',
      	'template' => 'templateItem'
      ),
      'manufacturer' => array(
        'callback' => 'search',
      	'template' => 'templateSearch'
      )
    );
  }

  public function search() {

  }

  public function templateSearch() {

  }

  public function item() {

  }

  public function templateItem() {

  }
}