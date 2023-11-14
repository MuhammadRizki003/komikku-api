<?php
header('Content-Type: application/json; charset=utf-8');
include __DIR__ . '/../../modules/chaptercontent.php';
// Example usage:
if (!isset($_GET['endpoint'])) {
    $hasil = array(
        'success' => false,
        'message' => 'Endpoint tidak di temukan',
        'result' => null
    );
    echo json_encode($hasil);
} else {
    $baseURL = "https://komiku.id/";
    $endpoint = $_GET['endpoint']; // Ganti ini dengan endpoint chapter Anda
    $result = detailChapter($baseURL, $endpoint);

    // Handle the result
    if ($result->Error) {
        // Tangani kesalahan
        $hasil = array(
            'success' => false,
            'message' => $result->Error->getMessage(),
            'result' => null
        );
        echo json_encode($hasil);
    } else {
        if ($result->Data->Title != null) {
            // Proses informasi chapter yang diambil
            $title = $result->Data->Title;
            $chapterImg = array();
            foreach ($result->Data->Image as $img) {
                $chapterImg[] = $img;
            }
            $output = array(
                'title' => $title,
                'image' => $chapterImg
            );
            $hasil = array(
                'success' => true,
                'message' => 'Get detail chapter',
                'result' => $output
            );
            echo json_encode($hasil);
            // ... (lakukan apa yang perlu Anda lakukan dengan informasi chapter)
        } else {
            $hasil = array(
                'success' => false,
                'message' => 'Terjadi kesalahan',
                'result' => null
            );
            echo json_encode($hasil);
        }
    }
}
