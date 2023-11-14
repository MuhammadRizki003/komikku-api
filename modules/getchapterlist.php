<?php
require_once __DIR__ . '/../vendor/autoload.php';

use voku\helper\HtmlDomParser;

class Chapter
{
    public $Endpoint;
    public $Name;
    public $tanggal;
}

class ChapterInfoResult
{
    public $Data;
    public $Error;
}

function scrapeChapters($baseURL, $endpoint)
{
    $url = $baseURL . $endpoint;
    $output = new ChapterInfoResult();
    $chapterList = array();
    $html = @file_get_contents($url);
    if ($html === FALSE) {
        $output->Error = new Exception("Failed to fetch chapter list from the URL");
        return $output;
    }
    $dom = HtmlDomParser::str_get_html($html);
    foreach ($dom->find('tbody._3Rsjq tr') as $element) {
        $chapter = new Chapter();
        $judulseries = $element->find('td.judulseries', 0)->plaintext;
        $tanggalseries
            = $element->find('td.tanggalseries', 0)->plaintext;
        if (!empty($judulseries)) {
            $chapter->Endpoint = $element->find('a', 0)->href;
            $chapter->Name = $judulseries;
            $chapter->tanggal = $tanggalseries;
            $chapterList[] = $chapter;
        }
    }
    $output->Data = $chapterList;
    return $output;
}
