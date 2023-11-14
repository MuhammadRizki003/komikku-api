<?php
header('Content-Type: application/json; charset=utf-8');
include  __DIR__ . '/../../modules/getkomikinfo.php';
include  __DIR__ . '/../../modules/getchapterlist.php';
if (!isset($_GET['endpoint'])) {
    $hasil = array(
        'success' => false,
        'message' => 'Undefined Link'
    );
    echo json_encode($hasil);
} else {
    $baseURL = "https://komiku.id/";
    // Replace this with your base URL
    $endpoint = $_GET['endpoint'];
    // /manga/tensei-shitara-slime-datta-ken/ // Replace this with your comic endpoint
    $komikDetail = getComicInfo($baseURL, $endpoint);
    $chapterList = scrapeChapters($baseURL, $endpoint);

    // Handle the result
    if ($komikDetail->Error or $chapterList->Error) {
        $error = $komikDetail->Error->getMessage();
        $error .= ' & ' . $chapterList->Error->getMessage();
        $hasil = array(
            'success' => false,
            'message' => $error
        );
        echo json_encode($hasil);
    } else {
        // Process the scraped comic information
        $comicInfo = $komikDetail->Data;
        $chaptertDataList = array();
        foreach ($chapterList->Data as $chapter) {
            $ChapterData = array(
                'Name' => $chapter->Name,
                'Endpoint' => $chapter->Endpoint,
                'Tanggal' => $chapter->tanggal
            );
            $chaptertDataList[] = $ChapterData;
        }
        $data = array(
            'tittle' => $comicInfo->Title,
            'sinopsis' => $comicInfo->Sinopsis,
            'type' => $comicInfo->Type,
            'author' => $comicInfo->Author,
            'status' => $comicInfo->Status,
            'rating' => $comicInfo->Rating,
            'genres' => $comicInfo->Genre,
            'thumbnail' => $comicInfo->Thumbnail,
            'chapter-list' => $chaptertDataList
        );
        $hasil = array(
            'success' => true,
            'message' => 'Mendapatkan info komik',
            'result' => $data
        );
        echo json_encode($hasil);
    }
}
