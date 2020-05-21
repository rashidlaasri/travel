<p align="center">
<img width="70%" alt="rashidlaasri travel" src="https://user-images.githubusercontent.com/36804104/82325079-274ca780-99ca-11ea-8c3d-afd163d1bba0.png">
</p>

<p align="center">
    <img src="https://styleci.io/repos/264614816/shield?branch=master" alt="StyleCI">
    <img src="https://img.shields.io/github/license/rashidlaasri/travel" alt="License">
    <img src="https://img.shields.io/travis/rashidlaasri/travel/master" alt="Travis Ci build">
    <img src="https://img.shields.io/packagist/v/rachidlaasri/travel.svg" alt="Latest Version on Packagist">
    <img src="https://img.shields.io/packagist/dt/rachidlaasri/travel.svg" alt="Total Downloads">
</p>

Travel is a framework agnostic wrapper around [Carbon](https://github.com/briannesbitt/Carbon), it helps you travel to a certain date and travel back to today's date in a readable way.

## Installation

You can install the package via composer:

```bash
composer require rachidlaasri/travel
```

## Usage

 Travel to a certain date with:

```php
// Jump to 2009 and watch the last Michael Jackson live performance.
Travel::to('01-01-2009');
```

 Travel to a given date, excute a piece of code and reset:

```php
// Travel to the past and un-say that embarassing thing you said and come back.
Travel::to('-5 minutes', function() {
    // Do something.
});

```

Travel to multiple dates with:

```php
// Travel to random dates, talk with people from the past and come back.
Travel::each(['01-01-2009', '04-02-2009', '03-02-2006'], function() {
    // Do something.
});
```

 Reset the date to today's date
```php
Travel::back();
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
