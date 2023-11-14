<?php
header('Content-Type: application/json; charset=utf-8');
include __DIR__ . '/../../modules/komikrekomendasi.php';
// Example usage:
if (!isset($_GET['page']) or $_GET['page'] = 1) {
    $baseURL = "https://data.komiku.id/other/rekomendasi/";
} else {
    $page = $_GET['page'];
    $baseURL = "https://data.komiku.id/other/rekomendasi/page/{$page}/";
}
$result = getRecommendedManga($baseURL);
if ($result->Error) {
    // Handle error
    $hasil = array(
        'success' => false,
        'message' => $result->Error->getMessage()
    );
    echo json_encode($hasil);
} else {
    $dataList = array();
    // Process the scraped manga information
    foreach ($result->Data as $comic) {
        $hasilSearch = array(
            'title' => $comic->Title,
            'tgl_update' => $comic->UpdateTime,
            'image' => $comic->Image,
            'tipe' => $comic->Type,
            'endpoint' => $comic->Endpoint
        );
        $dataList[] = $hasilSearch;
    }
    if (empty($dataList)) {
        $hasil = array(
            'success' => false,
            'message' => 'No data',
            'result' => null
        );
    } else {
        $hasil = array(
            'success' => true,
            'message' => 'Search komik',
            'result' => $dataList
        );
    }

    echo json_encode($hasil);
}
