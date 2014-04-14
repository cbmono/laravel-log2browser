# Display Laravel logs on browser console (Chrome/Firefox)

[![Screenshot](http://cbmono.de/public/laravel-log2browser_ss1.png)]


## Getting Started

#### 1. Install browser plugin
- Chrome: http://craig.is/writing/chrome-logger
- Firefox: http://www.firephp.org/

----
#### 2. Add PHP class
- Copy `log2browser.php` into `/vendor/cbmono/laravel-log2browser/`

---
#### 3. Init class and define used browser
- Add this code into `/app/start/local/.php`

```php
require_once base_path() . '/vendor/cbmono/laravel-log2browser/log2browser.php';

$myBrowser = 'chrome';              # Or 'fire' for Firefox
Log2Browser::init( $myBrowser );
```

---
#### 4. Start logging from everywhere

```php
# Example:
$testData = array('var1' => 'Hello world!', 'var2' => array('foo' => 'bar'));

Log2Browser::error('Error', $testData);

# Or use the shortcut
LogB::log('Error', $testData);
```

**Note:** I'm using [Laravel Environment Configuration](http://laravel.com/docs/configuration#environment-configuration) and restricting this functionality only to my local machine.

---


## Options

`/vendor/cbmono/laravel-log2browser/log2browser.php` is just extending the default [Laravel Log function](http://laravel.com/docs/errors#logging). Therefor, you still have all the main functionalities including those from [Monolog](http://github.com/seldaek/monolog):

```php
# Example:
LogB::info('This is some useful information.');

LogB::warning('Something could be going wrong.');

LogB::error('Something is really going wrong.');
```