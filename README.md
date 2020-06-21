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
composer require --dev rachidlaasri/travel
```

## Usage

 Travel to a certain date with:

```php
public function testBasicTest()
{
    Travel::to('01-01-2009');

    // Date is now 01-01-2009
    // code goes here...
}
```

 Travel to a given date, excute a piece of code and reset:

```php
public function testBasicTest()
{
    // Verify that the user cannot update a post after 10 minutes of its creation time.
    $post = factory(App\Post::class)->create();

    Travel::to('10 minutes', function() use ($post) {
        $this->postJson(route('posts.edit', $post->id), [])
            ->assertStatus(403);
    });
}
```

Travel to multiple dates with:

```php
public function testBasicTest()
{
    // Travel to multiple dates:
    Travel::each(['01-01-2009', '04-02-2009', '03-02-2006'], function() {
        // Do something.
    });
}
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

## Treeware

You're free to use this package, but if it makes it to your production environment I would highly appreciate you buying the world a tree.

It’s now common knowledge that one of the best tools to tackle the climate crisis and keep our temperatures from rising above 1.5C is to [plant trees](https://www.bbc.co.uk/news/science-environment-48870920). If you contribute to my forest you’ll be creating employment for local families and restoring wildlife habitats.

You can buy trees at [offset.earth/treeware](https://plant.treeware.earth/rashidlaasri/travel)

Read more about Treeware at https://treeware.earth
