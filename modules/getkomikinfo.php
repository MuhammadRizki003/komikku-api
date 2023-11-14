<?php

require_once __DIR__ . '/../vendor/autoload.php';
// include 'vendor/autoload.php'; // Include the autoload.php file for voku/simple_html_dom
// include 'vendor/autoload.php';

use voku\helper\HtmlDomParser;

class ComicInfo
{
    public $Title;
    public $Sinopsis;
    public $Type;
    public $Author;
    public $Status;
    public $Rating;
    public $Genre = array();
    public $Thumbnail;
}

class KomikInfoResult
{
    public $Data;
    public $Error;
}

function getComicInfo($baseURL, $endpoint)
{
    $url = $baseURL . $endpoint;
    $output = new KomikInfoResult();
    $comicInfo = new ComicInfo();
    $html = @file_get_contents($url);
    if ($html === FALSE) {
        $output->Error = new Exception("Failed to fetch komik info from the URL");
        return $output;
    }
    $dom = HtmlDomParser::str_get_html($html);
    if (!$dom) {
        $output->Error = new Exception("Failed to parse HTML content");
        return $output;
    }
    $desc = $dom->find('p.desc', 0)->plaintext;
    $comicInfo->Sinopsis = $desc;
    $table = $dom->find('table.inftable', 0);
    if ($table) {
        $comicInfo->Title = $table->find('tr:nth-child(1) > td:nth-child(2)', 0)->plaintext;
        $comicInfo->Type = $table->find('tr:nth-child(2) > td:nth-child(2)', 0)->plaintext;
        $comicInfo->Author = $table->find('tr:nth-child(4) > td:nth-child(2)', 0)->plaintext;
        $comicInfo->Status = $table->find('tr:nth-child(5) > td:nth-child(2)', 0)->plaintext;
        $comicInfo->Rating = $table->find('tr:nth-child(6) > td:nth-child(2)', 0)->plaintext;
    }
    $genreList = $dom->find('ul.genre li.genre');
    foreach ($genreList as $genre) {
        $comicInfo->Genre[] = $genre->plaintext;
    }
    $thumbnail = $dom->find('div.ims img', 0);
    if ($thumbnail) {
        $comicInfo->Thumbnail = rtrim($thumbnail->getAttribute('src'), '?w=225&quality=60');
    }
    $output->Data = $comicInfo;
    return $output;
}
