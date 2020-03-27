Ares
====

[![Downloads this Month](https://img.shields.io/packagist/dm/halasz/ares.svg)](https://packagist.org/packages/halasz/ares)
[![Latest stable](https://img.shields.io/packagist/v/halasz/ares.svg)](https://packagist.org/packages/halasz/ares)
[![Coverage Status](https://coveralls.io/repos/github/halasz/ares/badge.svg?branch=master)](https://coveralls.io/github/halasz/ares?branch=master)

More information in [changelog](changelog.md).

Is required guzzle/guzzle 6.1+ and php 5.5+. If you have php < 5.5 use older version [v1.0.7] it work but does not use guzzle.

Installation to project
-----------------------
The best way to install halasz/ares is using Composer:
```sh
$ composer require halasz/ares
```


Download information about customer via his IN.

Example
-------
```php
$ares = new halasz\Ares\Ares();
try {
    $response = $ares->loadData('87744473');
    /* @var $response halasz\Ares\Data */
    var_dump($response);
} catch (halasz\Ares\IdentificationNumberNotFoundException $e) {
    // log identification number, why is bad? Or make nothing.
}
```
