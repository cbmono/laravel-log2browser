<?php

  /*
  |--------------------------------------------------------------------------
  | Log 2 Browser
  |--------------------------------------------------------------------------
  |
  | Display logs on browser console
  | Support for Chrome and Firefox (Fire)
  | See: https://github.com/cbmono/laravel-log2browser
  |
  */
require_once base_path() . '/vendor/cbmono/laravel-log2browser/log2browser.php';

$myBrowser = 'chrome';
LogB::init($myBrowser);


// Usage
// -------------------------
//
// $testData = array('var1' => 'Hello world!', 'var2' => array('foo' => 'bar'));
// LogB::log('Error', $testData);