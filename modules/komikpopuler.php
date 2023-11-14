<?php
require_once __DIR__ . '/../vendor/autoload.php';

use voku\helper\HtmlDomParser;

class ComicPop
{
    public $Title;
    public $UpdateTime;
    public $Image;
    public $Type;
    public $Endpoint;
}

class ComicPopResult
{
    public $Data;
    public $Error;
}

function getPopularManga($baseURL)
{
    $output = new ComicPopResult();
    $result = array();
    $html = file_get_contents($baseURL);
    if ($html === FALSE) {
        $output->Error = new Exception("Failed to fetch content from the URL");
        return $output;
    }
    $dom = HtmlDomParser::str_get_html($html);
    if (!$dom) {
        $output->Error = new Exception("Failed to parse HTML content");
        return $output;
    }
    $bgeDivs = $dom->find('div.bge');
    foreach ($bgeDivs as $bge) {
        $comic = new ComicPop();
        $fullText = $bge->find('p', 0)->plaintext;
        $updateText = explode('.', $fullText);
        $comic->UpdateTime = $updateText[0];
        $bgeiDivs = $bge->find('div.bgei');
        $comic->Image = rtrim($bgeiDivs->find('img', 0)->getAttribute('data-src'), '?resize=450,235&quality=60');
        $comic->Endpoint = '/' . str_replace('https://komiku.id/', '', $bgeiDivs->find('a', 0)->getAttribute('href'));
        $comic->Type = $bgeiDivs->find('b', 0)->plaintext;
        $kanDivs = $bge->find('div.kan');
        foreach ($kanDivs as $kan) {
            $comic->Title = $kan->find('h3', 0)->plaintext;
        }
        $result[] = $comic;
    }
    $output->Data = $result;
    return $output;
}
