<?php

namespace XiagTest\app\controllers;

use XiagTest\core\controllers\Controller,
    XiagTest\core\error\exceptions\NotFoundException;

/**
 * Class ShortUrlController
 * Class is responsible for manipulating with short urls.
 * Operations such as creating url, redirecting a user to a url etc.
 *
 * All public methods that are available via URL must be written with underscored format
 *
 * @property ShortUrlModel $ShortUrl
 * @package XiagTest\app\controllers
 */
class ShortUrlController extends Controller {

    /**
     * index page for the application
     */
    public function index() {
        $this->setMetaTags();
    }

    /**
     * creates a short URL
     */
    public function create_url() {
        $this->autoRender = false;
        if($this->request['method'] == 'POST') {
            $long_url = $this->request['data']['long-url'];
            if($this->ShortUrl->validateEntry($long_url)) {
                $short_url = $this->getShortUrlBasePart() . base_convert(microtime(true), 10, 36);
                $query = 'INSERT INTO short_urls(short_url, long_url) VALUES (:short_url, :long_url)';
                $params = array(
                    ':short_url' => $short_url,
                    ':long_url' => $long_url,
                );
                if($this->ShortUrl->create($query, $params)) {
                    $this->set('shortUrl', $short_url);
                } else {
                    $this->set('validationErrors', 'An internal error has occured.');
                }
            } else {
                $this->set('validationErrors', 'URL is not valid.');
            }
        } else {
            throw new NotFoundException();
        }
    }

    /**
     * redirects a user, using short URL provided by him
     *
     * @throws NotFoundException
     */
    public function r() {
        if(isset($this->request['passed'][0])) {
            $short_url = $this->getShortUrlBasePart() . $this->request['passed'][0];
            $query = 'SELECT * FROM short_urls WHERE short_url = :short_url';
            $result = $this->ShortUrl->find($query, array(':short_url' => $short_url));
            if(!empty($result[0]['long_url'])) {
                $this->redirect($result[0]['long_url']);
            }
        }
        // if we are here, something bad happened, in any other case a user had to be reditected
        throw new NotFoundException();
    }

    /**
     * gets first part of short url
     *
     * @return string
     */
    private function getShortUrlBasePart() {
        return 'http://' . $_SERVER['HTTP_HOST'] . '/r/';
    }

    /**
     * sets meta tags for view
     */
    private function setMetaTags() {
        $this->set('pageTitle', 'URL shortener');
        $this->set('metaDescription', 'Gets short URLs for your long URLs');
    }
}