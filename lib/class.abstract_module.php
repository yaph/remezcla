<?php
/**
 * Abstract module class
 *
 * @author Ramiro Gomez <www@ramiro.org>
 * @abstract
 */
abstract class AbstractModule {
  # force extending class to define these methods
  abstract protected function pathMapper();
}