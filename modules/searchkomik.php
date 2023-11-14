<?php

require_once __DIR__ . '/../vendor/autoload.php';

use voku\helper\HtmlDomParser;

class Comic
{
    public $Title;
    public $UpdateTime;
    public $Image;
    public $Type;
    public $Endpoint;
}

class SearchResult
{
    public $Data;
    public $Error;
}

function searchManga($link, $query)
{
    $output = new SearchResult();
    $result = array();
    $url = sprintf($link, $query);
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
    $bgeDivs = $dom->find('div.bge');
    foreach ($bgeDivs as $bge) {
        $comic = new Comic();
        $bgeiDivs = $bge->find('div.bgei');
        $comic->Image = rtrim($bgeiDivs->find('img', 0)->getAttribute('data-src'), '?resize=450,235&quality=60');
        $comic->Endpoint = '/' . str_replace('https://komiku.id/', '', $bgeiDivs->find('a', 0)->getAttribute('href'));
        $comic->Type = $bgeiDivs->find('b', 0)->plaintext;
        $kanDivs = $bge->find('div.kan');
        foreach ($kanDivs as $kan) {
            $comic->Title = $kan->find('h3', 0)->plaintext;
        }
        $fullText = $bge->find('p', 0)->plaintext;
        $updateText = explode('.', $fullText);
        $comic->UpdateTime = $updateText[0];
        $result[] = $comic;
    }
    $output->Data = $result;
    return $output;
}
