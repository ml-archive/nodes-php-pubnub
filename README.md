## PubNub

⚠️**This package is deprecated**⚠️

Broadcast events with [PubNub](http://pubnub.com) from your application

[![Total downloads](https://img.shields.io/packagist/dt/nodes/pubnub.svg)](https://packagist.org/packages/nodes/pubnub)
[![Monthly downloads](https://img.shields.io/packagist/dm/nodes/pubnub.svg)](https://packagist.org/packages/nodes/pubnub)
[![Latest release](https://img.shields.io/packagist/v/nodes/pubnub.svg)](https://packagist.org/packages/nodes/pubnub)
[![Open issues](https://img.shields.io/github/issues/nodes-php/pubnub.svg)](https://github.com/nodes-php/pubnub/issues)
[![License](https://img.shields.io/packagist/l/nodes/pubnub.svg)](https://packagist.org/packages/nodes/pubnub)
[![Star repository on GitHub](https://img.shields.io/github/stars/nodes-php/pubnub.svg?style=social&label=Star)](https://github.com/nodes-php/pubnub/stargazers)
[![Watch repository on GitHub](https://img.shields.io/github/watchers/nodes-php/pubnub.svg?style=social&label=Watch)](https://github.com/nodes-php/pubnub/watchers)
[![Fork repository on GitHub](https://img.shields.io/github/forks/nodes-php/pubnub.svg?style=social&label=Fork)](https://github.com/nodes-php/pubnub/network)

## 📝 Introduction

Integrates the [PubNub](http://pubnub.com) service, which makes it unbelieable easy to send broadcast events from your application.

## 📦 Installation

To install this package you will need:

* Laravel 5.1+
* PHP 5.5.9+

You must then modify your `composer.json` file and run `composer update` to include the latest version of the package in your project.

```json
"require": {
    "nodes/pubnub": "^1.0"
}
```

Or you can run the composer require command from your terminal.

```bash
composer require nodes/pubnub:^1.0
```

## 🔧 Setup

Setup service provider in `config/app.php`

```php
Nodes\Services\Pubnub\ServiceProvider::class
```

Setup alias in `config/app.php`

```php
'Pubnub' => Nodes\Services\Pubnub\Support\Facades\Pubnub::class
```

Publish config files

```bash
php artisan vendor:publish --provider="Nodes\Services\Pubnub\ServiceProvider"
```

If you want to overwrite any existing config files use the `--force` parameter

```bash
php artisan vendor:publish --provider="Nodes\Services\Pubnub\ServiceProvider" --force
```
## ⚙ Usage

Open the `config/broadcasing.php` file and the following array to the array of `connections`:

```php
'pubnub' => [
    'driver' => 'pubnub',
    'publish_key' => config('nodes.services.pubnub.credentials.publish_key'),
    'subscribe_key' => config('nodes.services.pubnub.credentials.subscribe_key')
],
```

Add your [PubNub](http://pubnub.com) application credentials to your `.env` file:

```
BROADCAST_DRIVER=pubnub

PUBNUB_PUBLISH_KEY=YOUR-PUBLISH-KEY
PUBNUB_SUBSCRIBE_KEY=YOUR-SUBSCRIBE-KEY
PUBNUB_SECRET_KEY=YOUR-SECRET-KEY
```

That's it! All your events will now be broadcasted through [PubNub](http://pubnub.com).

## 🏆 Credits

This package is developed and maintained by the PHP team at [Nodes](http://nodesagency.com)

[![Follow Nodes PHP on Twitter](https://img.shields.io/twitter/follow/nodesphp.svg?style=social)](https://twitter.com/nodesphp) [![Tweet Nodes PHP](https://img.shields.io/twitter/url/http/nodesphp.svg?style=social)](https://twitter.com/nodesphp)

## 📄 License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
