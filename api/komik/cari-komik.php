<?php
header('Content-Type: application/json; charset=utf-8');
include __DIR__ . '/../../modules/searchkomik.php';
if (!isset($_GET['search'])) {
    $hasil = array(
        'success' => false,
        'message' => 'Masukan kata kunci pencarian'
    );
    echo json_encode($hasil);
} else {
    if (!isset($_GET['page'])) {
        $page = '1';
    } else {
        $page = $_GET['page'];
    }
    $link = "https://data.komiku.id/page/$page/cari/?post_type=manga&s=%s";
    $query = $_GET['search'];
    $result = searchManga($link, $query);
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
