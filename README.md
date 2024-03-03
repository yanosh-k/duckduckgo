# Library for getting image search results from DuckDuckGo

This is a PHP version of [fastai](https://www.fast.ai/)'s Python
`search_images_ddg()` function.

It is part of the code that accompanies their [Deep Learning for Coders](https://github.com/fastai/fastbook/)
book (also available on [Amazon](https://www.amazon.com/Deep-Learning-Coders-fastai-PyTorch/dp/1492045527)),
which has a function called `search_images_ddg()`.

You can read more more about why this library exists [here](https://yanosh.net/2024/03/01/how-to-download-images-form-ddg.html).

## How to

### Installation

With composer:
```
composer require yanosh-k/duckduckgo
```

### Usage

Require the composer autoloader:
```
<?php
    require_once('vendor/autoload.php'):
    $searchResults = YanoshK\DuckDuckGo\SearchImagesDDG('brown dogs');
```

### Function parameters

This function accepts only two parameters: `$term` and `$maxImages`:
`SearchImagesDDG($term, $maxImages = 200)`.

`$term` is a string for the search query that you would like to use.

`$maxImages` is integer between 1 and 1000 and tells the function
the maximum number of results to return.


### Results

When you call `SearchImagesDDG('SEARCH_TERM')` you will get an array
of results in the format shown bellow. This is the actual data format
that DDG is using in their internal API. Most of the times you would need
the `image` parameter value, which holds the URL for the original file:
```
[
  [
    'height' => 530,
    'image' => 'https://static.semrush.com/blog/uploads/media/21/d9/21d991199d0e7392c20c38736f8fd32c/search-terms-sm.png',
    'image_token' => 'b94f617df3182bb6c99361fb2c2d85c4e72722d46c06afe022e41d6730bb26c6',
    'source' => 'Bing',
    'thumbnail' => 'https://tse4.mm.bing.net/th?id=OIP.mzBL8Sb1e60zZlBY4Pi8kAHaD4&pid=Api',
    'thumbnail_token' => '72056fe36342f76e10075153c3b62ae2814a694c5ffbdb23e1d4ad99fcd0eab9',
    'title' => 'Search Terms: Definition & How to Use Them (with Examples)',
    'url' => 'https://www.semrush.com/blog/search-terms/',
    'width' => 1010,
  ],
  [
    'height' => 1250,
    'image' => 'https://www.reliablesoft.net/wp-content/uploads/2019/06/people-also-ask-related-searches.png',
    'image_token' => '0c4d1e495ef71ac644e8806bccf54d7f8de3f39a0cddfcf39ca305ddfc660380',
    'source' => 'Bing',
    'thumbnail' => 'https://tse1.mm.bing.net/th?id=OIP.6EvNQHr1FyZavhMUl2k_vwHaHG&pid=Api',
    'thumbnail_token' => '653d830b8945e07ac649ff67ed5bdb70366662d29f690ea690211be1b21deb1f',
    'title' => 'What are Search Terms? (With Examples)',
    'url' => 'https://www.reliablesoft.net/what-are-search-terms/',
    'width' => 1304,
  ],
  [
    'height' => 201,
    'image' => 'https://static.semrush.com/blog/uploads/media/8a/09/8a09df80c31b1de73bc90c3c73e6889c/search-term.jpg',
    'image_token' => '0db046ce4e19036d264ac5c6afeb59d16425eeb504dca37c0de7f216fc69707b',
    'source' => 'Bing',
    'thumbnail' => 'https://tse1.mm.bing.net/th?id=OIP.uozMlwbujR9P3JixU9cNTAAAAA&pid=Api',
    'thumbnail_token' => '6334459b50b60891414a126835f438a88b31cf336937e0cf3003c3c1dd5c32b1',
    'title' => 'Search Terms: Definition & How to Use Them (with Examples)',
    'url' => 'https://www.semrush.com/blog/search-terms/',
    'width' => 474,
  ],
  [
    'height' => 1334,
    'image' => 'https://static.semrush.com/blog/uploads/media/02/2a/022ae1572f1ad01af34c62c93cd625b0/google-ads-search-terms-report.jpg',
    'image_token' => '0a3620d50bd6c0f3d76e100a7b59e97f8aad46ba4d859c8e463d0d963eab50a8',
    'source' => 'Bing',
    'thumbnail' => 'https://tse3.mm.bing.net/th?id=OIP.eY0jXwtADz7z7ZTDjfIv6gHaJQ&pid=Api',
    'thumbnail_token' => '9102854a16e33e9767a7690e0b5a8d7cb26e6dec8158be11a8991b407442f267',
    'title' => 'Search Terms: Definition & How to Use Them (with Examples)',
    'url' => 'https://www.semrush.com/blog/search-terms/',
    'width' => 1068,
  ]
```