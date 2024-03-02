<?php

namespace YanoshK\DuckDuckGo;

/**
 * Search for `term` with DuckDuckGo and return an array of data for about
 * `max_images` images
 * 
 * @param string $term The term to search for
 * @param int $maxImages The maximum number of image to return. No more than
 * 1000
 */
function SearchImagesDDG($term, $maxImages = 200)
{
    // Check if the $maxImages limit
    if ($maxImages > 1000) {
        throw new Exception('You can request no more than 1000 images.');
    }


    $CurlWarapper = new CurlWrapper();
    $CurlWarapper->setUserAgent('firefox');

    $url       = 'https://duckduckgo.com/';
    $res       = $CurlWarapper->get($url . '?' . http_build_query(['q' => $term], '', null, PHP_QUERY_RFC3986));
    $searchObj = [];
    preg_match('/vqd=([\d-]+)&/', $res, $searchObj);

    // Check if the vqd parameter was found
    if (empty($searchObj)) {
        throw new \Exception('Could not determine DuckDuckGo state parameter value.');
    }

    $requestUrl = $url . 'i.js';
    $params     = ['l' => 'us-en', 'o' => 'json', 'q' => $term, 'vqd' => $searchObj[1], 'f' => ',,,', 'p' => '1', 'v7exp' => 'a'];
    $urls       = [];
    $data       = ['next' => 1];
    $CurlWarapper->addHeader('referer', 'https://duckduckgo.com/');

    // Iterate trough DDG's "pagination"
    while (count($urls) < $maxImages && isset($data['next'])) {
        $res        = $CurlWarapper->get($requestUrl, $params);
        $data       = $res ? json_decode($res, JSON_OBJECT_AS_ARRAY) : [];
        $urls       = isset($data['results']) ? array_merge($urls, $data['results']) : $urls;
        $requestUrl = isset($data['next']) ? $url . $data['next'] : null;
        sleep(1);
    }

    return array_slice($urls, 0, $maxImages);
}
