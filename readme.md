Artificer Plugin: Log Reader 
===========================

Log Reader plugin for [Artificer](https://github.com/marcmascarell/artificer) based on rap2hpoutre's [plugin](https://github.com/rap2hpoutre/laravel-log-viewer).

Installation
--------------

Require this package in your composer.json and run composer update:

    "mascame/artificer-logreader-plugin": "1.*"

Add the Service Provider to `config/admin/admin.php` providers:

```php
... at the bottom ...
\Mascame\Artificer\LogReaderPluginServiceProvider::class
```

##License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
