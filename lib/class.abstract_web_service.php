<?php
// $Id$

/**
 * Abstract class for using Web Services
 *
 * @author Ramiro Gomez <www@ramiro.org>
 * @abstract
 */
abstract class AbstractWebService {
    // force extending class to define these methods
    abstract public function getRequestUri();

    /**
     * Fetch the content of the given URI
     *
     * @param String $request_uri
     * @return String $response
     */
    public function get($request_uri) {
        print $request_uri;
    }
}