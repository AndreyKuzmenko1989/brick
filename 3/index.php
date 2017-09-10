<?php
$string = '<img src="http://www.google.com/script.php?key=value&var=num" alt="альтернативный текст"><a href="URL">...</a><script type="тип" src="URL"></script>';
echo addGet($string);
function addGet($string)
{
    $dom = new DOMDocument('1.0', 'UTF-8');
    $internalErrors = libxml_use_internal_errors(true);
    $dom->loadHTML($string);
    $images = $dom->getElementsByTagName('img');
    foreach ($images as $image) {
        if (substr_count($image->getAttribute('src'), '?') > 0) {
            $image->setAttribute('src', $image->getAttribute('src') . '&v=' . crc32($image->getAttribute('src')));
        } else {
            $image->setAttribute('src', $image->getAttribute('src') . '?v=' . crc32($image->getAttribute('src')));
        }
        echo $image->getAttribute('src') . "<br>";
    }
    $aArray = $dom->getElementsByTagName('a');
    foreach ($aArray as $a) {
        if (substr_count($a->getAttribute('href'), '?') > 0) {
            $a->setAttribute('href', $a->getAttribute('href') . '&v=' . crc32($a->getAttribute('href')));
        } else {
            $a->setAttribute('href', $a->getAttribute('href') . '?v=' . crc32($a->getAttribute('href')));
        }
        echo $a->getAttribute('href') . "<br>";
    }
    $scripts = $dom->getElementsByTagName('script');
    foreach ($scripts as $script) {
        if (substr_count($script->getAttribute('src'), '?') > 0) {
            $script->setAttribute('src', $script->getAttribute('src') . '&v=' . crc32($script->getAttribute('src')));
        } else {
            $script->setAttribute('src', $script->getAttribute('src') . '?v=' . crc32($script->getAttribute('src')));
        }
        echo $script->getAttribute('src') . "<br>";
    }
    $html = $dom->saveHTML();
    return $html;
}