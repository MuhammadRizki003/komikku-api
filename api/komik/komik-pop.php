<?php
header('Content-Type: application/json; charset=utf-8');
include __DIR__ . '/../../modules/komikpopuler.php';
if (!isset($_GET['page']) or $_GET['page'] == 1) {
    $baseURL = 'https://komiku.id/other/hot/';
} else {
    $page = $_GET['page'];
    $baseURL = "https://data.komiku.id/other/hot/page/$page/";
}
$result = getPopularManga($baseURL);
if ($result->Error) {
    $hasil = array(
        'success' => false,
        'message' => $result->Error->getMessage()
    );
    echo json_encode($hasil);
} else {
    $dataList = array();
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
            'message' => 'Terjadi Kesalahan',
            'result' => null
        );
    } else {
        $hasil = array(
            'success' => true,
            'message' => 'Get komik populer',
            'result' => $dataList
        );
    }
    echo json_encode($hasil);
}
