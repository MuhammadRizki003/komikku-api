<?php
header('Content-Type: application/json; charset=utf-8');
$genreList = array(
    'Action', 'Adventure', 'Comedy', 'Cooking', 'Crime', 'Demons', 'Drama', 'Ecchi', 'Fantasy', 'Game', 'Ghost', 'Harem', 'Historical', 'Horror', 'Isekai', 'Josei', 'Martial-Arts', 'Mecha', 'Military', 'Monsters', 'Music', 'One-Shot', 'Parodi', 'Police', 'Psychological', 'Reincarnation', 'Revenge', 'Romance', 'School', 'Sci-fi', 'Seinen', 'Shotacon', 'Slice-of-life', 'Sports', 'Super-power', 'Supranatural', 'Survival', 'Thriller', 'Tragedy', 'Urban', 'Vampire'
);
$hasil = array(
    'success' => true,
    'message' => 'Get komik populer',
    'result' => $genreList
);
echo json_encode($hasil);
