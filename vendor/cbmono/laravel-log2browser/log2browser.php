<?php

/**
 * Log to Browser
 *
 * Send logs to your browser console
 * Supports Chrome and Firefox (Fire)
 *
 * @uses http://craig.is/writing/chrome-logger
 * @uses http://www.firephp.org/
 */
class Log2Browser extends Log {

  private static $browser;
  private static $suportedBrowsers = ['Chrome', 'Fire'];


  /**
   * Set browser for logging
   *
   * @throws Exception
   * @param string $browser
   * @return void
   */
  public static function init($browser) {

    self::$browser = ucfirst($browser);

    if (self::isBrowserSupported()) {
      $monolog = Log::getMonolog();
      $monolog->pushHandler(new \Monolog\Handler\ChromePHPHandler());

      return;
    }

    throw new Exception(self::getErrorMessage());
  }


  /**
   * Shortcut to core method: Log::info()
   *
   * @param string $message
   * @param mixed $context
   * @return mixed
   */
  public static function log($message, $context) {

    return self::info($message, $context);
  }


  /**
   * Check if current browser is supported
   *
   * @return boolean
   */
  private static function isBrowserSupported() {

    return in_array(self::$browser, self::$suportedBrowsers);
  }


  /**
   * Build error message in case of non-supported browsers
   *
   * @return string
   */
  private static function getErrorMessage() {

    return sprintf(
      '"%s" is not supported to do browser side logging.' . "\n" . 
      'Supported browsers are: %s',

      self::$browser,
      implode(', ', self::$suportedBrowsers)
    );
  }
}

/**
 * Shortcut for Log2Browser
 */
class LogB extends Log2Browser {}
