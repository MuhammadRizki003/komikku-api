<?php

require_once __DIR__ . '/../vendor/autoload.php';

use voku\helper\HtmlDomParser;

class ChapterDetail
{
    public $Title;
    public $Image = array();
}

class ChapterContentResult
{
    public $Data;
    public $Error;
}

function detailChapter($baseURL, $endpoint)
{
    $output = new ChapterContentResult();
    $chapter = new ChapterDetail();
    $url = $baseURL . $endpoint;
    $html = file_get_contents($url);
    if ($html === FALSE) {
        $output->Error = new Exception("Failed to fetch content from the URL");
        return $output;
    }
    $dom = HtmlDomParser::str_get_html($html);
    if (!$dom) {
        $output->Error = new Exception("Failed to parse HTML content");
        return $output;
    }
    $bacaKomikSection = $dom->find('section[id=Baca_Komik]', 0);
    if ($bacaKomikSection) {
        $imageList = array();
        $imageElements = $bacaKomikSection->find('img');
        foreach ($imageElements as $imageElement) {
            $imageList[] = rtrim($imageElement->getAttribute('src'), '?resize=450,235&quality=60');
        }
        $chapter->Image = $imageList;
    }
    $judulHeader = $dom->find('header[id=Judul]', 0);
    if ($judulHeader) {
        $chapter->Title = $judulHeader->find('h1', 0)->plaintext;
    }
    $output->Data = $chapter;
    return $output;
}
