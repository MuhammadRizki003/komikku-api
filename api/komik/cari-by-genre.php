<?php
header('Content-Type: application/json; charset=utf-8');
include __DIR__ . '/../../modules/getbygenre.php';
$baseURL = '';
if (!isset($_GET['endpoint'])) {
    $hasil = array(
        'success' => false,
        'message' => 'Masukan link'
    );
    echo json_encode($hasil);
} else {
    $endpoint = $_GET['endpoint'];
    if (!isset($_GET['page']) or $_GET['page'] = 1) {
        $baseURL = "https://komiku.id/genre/{$endpoint}/";
    } else {
        $page = $_GET['page'];
        $baseURL = "https://komiku.id/genre/{$endpoint}/page/{$page}/";
    }
    $result = getByGenre($baseURL);
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
}
