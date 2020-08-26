<?php
define('BASE_URL', 'http://php2.helgrind/');
define('DEFAULT_IMG', BASE_URL . 'public/images/default-image.jpg');
define('USER', 'AUTH_SESSION');

function dd($var)
{
    echo "<pre>";
    var_dump($var);
    die;
}

function getClientUrl($urlPath, $params = [])
{
    $url = BASE_URL . $urlPath;

    if (count($params) > 0) {
        $url .= "?";

        foreach ($params as $key => $value) {
            $url .= "$key=$value&";
        }

        $url = rtrim($url, "&");
    }

    return $url;
}

function getAssetUrl($assetUrl)
{
    return BASE_URL . "public/" . $assetUrl;
}

function uploadImage($file, $fileLocation)
{
    // Upload image
    if ($file['size'] > 0) {
        $filename = $fileLocation . '/' . uniqid() . '-' . $file['name'];

        if (move_uploaded_file($file['tmp_name'], "./" . $filename)) {
            return $filename;
        };
    }
    return null;
}

function isNull($item, $param = null)
{
    return ($item === $param) ? 'Không xác định' : $item;
}

function hasUrl($link)
{
    # code...
}

/**
 * TODO: Show errors
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
