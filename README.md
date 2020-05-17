# Travel 🚀

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
Travel::to('-5 minutes', fucntion() {
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
