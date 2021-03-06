# Simple Flash [![SensioLabsInsight](https://insight.sensiolabs.com/projects/64bbe2d0-055e-402a-8704-ea7dd6087b16/small.png)](https://insight.sensiolabs.com/projects/64bbe2d0-055e-402a-8704-ea7dd6087b16)

[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/tamtamchik/simple-flash.svg?style=flat-square)](https://scrutinizer-ci.com/g/tamtamchik/simple-flash/?branch=master) [![Code Climate](https://img.shields.io/codeclimate/github/tamtamchik/simple-flash.svg?style=flat-square)](https://codeclimate.com/github/tamtamchik/simple-flash) [![Build Status](https://img.shields.io/scrutinizer/build/g/tamtamchik/simple-flash.svg?style=flat-square)](https://scrutinizer-ci.com/g/tamtamchik/simple-flash/build-status/master) [![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/tamtamchik/simple-flash.svg?style=flat-square)](https://scrutinizer-ci.com/g/tamtamchik/simple-flash/?branch=master) [![StyleCI](https://styleci.io/repos/36289588/shield)](https://styleci.io/repos/36289588)  
[![License](https://img.shields.io/packagist/l/tamtamchik/simple-flash.svg?style=flat-square)](https://packagist.org/packages/tamtamchik/simple-flash) [![Latest Stable Version](https://img.shields.io/packagist/v/tamtamchik/simple-flash.svg?style=flat-square)](https://packagist.org/packages/tamtamchik/simple-flash) [![Total Downloads](https://img.shields.io/packagist/dt/tamtamchik/simple-flash.svg?style=flat-square)](https://packagist.org/packages/tamtamchik/simple-flash/stats) 

Easy, framework agnostic flash notifications. Inspired by [laracasts/flash](https://github.com/laracasts/flash) and [plasticbrain/PHP-Flash-Messages](https://github.com/plasticbrain/PHP-Flash-Messages). Creates [Bootstrap](http://getbootstrap.com) friendly alert notifications.

![simple-flash](https://dl.dropboxusercontent.com/u/1285445/pub/simple-flash.png)

## Installation

Just pull in the package through [Composer](http://getcomposer.org).

```bash
composer require tamtamchik/simple-flash
```

Inside your project make sure to start a session and load [Composer](http://getcomposer.org) autoload to make everything work.

````php
<?php
// Start a Session
if( !session_id() ) @session_start();

// Initialize Composer Autoload
require_once 'vendor/autoload.php';
````

> **Warning!** This library contains global `flash()` function, that potentially can break your function with this name. Now you are warned!

## Usage

There are 3 ways to use library:

```php
use \Tamtamchik\SimpleFlash\Flash;

// instance
$flash = new Flash();
$flash->message('Tea.');

// static
Flash::message('Earl Gray.');

// function
flash()->message('Hot!');
```

Messages added by calling `message($message, $type = 'info')` method. In case of calling a function `flash()` you can pass `$message, $type` just to function like so: `flash('resistance is futile')`.

## Chaining, Shortcuts, Arrays

Because any of creation types return `\Tamtamchik\SimpleFlash\Flash` instance, so you can always use chaining to add multiple messages. Shortcuts available for all types of base message types, also you can pass arrays as `$message`.

```php
flash()->error(['Invalid email!', 'Invalid username!'])
       ->warning('Warning message.')
       ->info('Info message.')
       ->success('Success message!');
```

## Output & Rendering

Out of the box library support 4 different types of messages: `error`, `warning`, `info`, `success`. So far output is hard coded and designed for [Bootstrap](http://getbootstrap.com).

```html
<div class="alert alert-danger" role="alert">
  <p>Invalid email!</p>
  <p>Invalid username!</p>
</div>
<div class="alert alert-warning" role="alert"><p>Warning message.</p></div>
<div class="alert alert-info" role="alert"><p>Info message.</p></div>
<div class="alert alert-success" role="alert"><p>Success message!</p></div>
```

Rendering is simple:

```php
// Rendering specific type
$output = flash()->display('error');

// Rendering all flash
$output = flash()->display();

// Also rendering possible when you just read instance of \Tamtamchik\SimpleFlash\Flash object as a string
(string) flash(); 

// or ... it's totally just for display, never do this in real life...
<?php 
// ... some code 
$flash = new Flash();  
$flash->warning('It is totally just for display, never do this in real life...');
// ... some other code 
?>
<!-- ... some html -->
<div class="flashes">
  <?= $flash; ?>
</div>
<!-- ... some other html -->
```
