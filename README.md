# Komikku API
Simple API komik bahasa Indonesia di buat menggunakan PHP
# API Output Example

#### Get Recomended Comic
   ```
    http://localhost/komikku-api/api/recomended.php?page={optional}
   ```
### Api Example
   ```
   http://localhost/komikku-api/api/recomended.php?page=1
   ```
   ```
   {
    "success": true,
    "message": "Search komik",
    "result": [
        {
            "title": "The Duke of Death and his Black Maid",
            "tgl_update": "Update 13 jam lalu",
            "image": "https://thumbnail.komiku.id/wp-content/uploads/2020/05/Komik-The-Duke-of-Death-and-his-Black-Maid.jpg",
            "tipe": "Manga",
            "endpoint": "/manga/the-duke-of-death-and-his-black-maid/"
        },
    ]
}
   ```
#### Get Populer Comic
   ```
    http://localhost/komikku-api/api/populer?page={optional}
   ```
### Api Example
   ```
   http://localhost/komikku-api/api/populer?page=1
   ```
   ```
   {
    "success": true,
    "message": "Get komik populer",
    "result": [
        {
            "title": "Eiyuu Sagi – Deshi ga Saikyou Dakaratte Shishou Made Tsuyoi to Omouna yo!?",
            "tgl_update": "Update 22 jam lalu",
            "image": "https://thumbnail.komiku.id/wp-content/uploads/2023/08/Back-Deshi-ga-Saikyou-Dakaratte-Shishou-Made-Tsuyoi-to-Omouna-yo.jpg",
            "tipe": "Manga",
            "endpoint": "//manga/eiyuu-sagi-deshi-ga-saikyou-dakaratte-shishou-made-tsuyoi-to-omouna-yo/"
        },
    ]
}
   ```
#### Get Genre List
   ```
    http://localhost/komikku-api/api/list-genre
   ```
### Api Example
   ```
   http://localhost/komikku-api/api/list-genre
   ```
   ```
   {
    "success": true,
    "message": "Get komik populer",
    "result": [
        "Action",
        "Adventure",
        "Comedy",
        "Cooking",
        "Crime",
        "Demons",
        "Drama",
        "Ecchi",
        "Fantasy",
        "Game",
        "Ghost",
        "Harem",
        "Historical",
        "Horror",
        "Isekai",
        "Josei",
        "Martial-Arts",
        "Mecha",
        "Military",
        "Monsters",
        "Music",
        "One-Shot",
        "Parodi",
        "Police",
        "Psychological",
        "Reincarnation",
        "Revenge",
        "Romance",
        "School",
        "Sci-fi",
        "Seinen",
        "Shotacon",
        "Slice-of-life",
        "Sports",
        "Super-power",
        "Supranatural",
        "Survival",
        "Thriller",
        "Tragedy",
        "Urban",
        "Vampire"
    ]
}
   ```
#### Get Comic By Genre
   ```
    http://localhost/komikku-api/api/genre?endpoint={genre}&page={optional}
   ```
### Api Example
   ```
   http://localhost/komikku-api/api/genre?endpoint=romance&page=1
   ```
   ```
{
    "success": true,
    "message": "Search komik",
    "result": [
        {
            "title": "Nihon e Youkoso Elf-san",
            "tgl_update": "Update 11 jam lalu",
            "image": "https://thumbnail.komiku.id/wp-content/uploads/2023/11/Back-Nihon-e-Youkoso-Elf-san.jpg",
            "tipe": "Manga",
            "endpoint": "/manga/nihon-e-youkoso-elf-san/"
        },
    ]
}
   ```
## Get Comic Info
   ```
   http://localhost/komikku-api/api/komik-info/?endpoint={endpoint}
   ```

### API Example
   ```
   http://localhost/komikku-api/api/komik-info/?endpoint=/manga/one-piece-ace-story/
   ```
   ```
{
    "success": true,
    "message": "Mendapatkan info komik",
    "result": {
        "tittle": "One Piece: Cerita Ace",
        "sinopsis": "Spin-Off dari serial One Piece yang menceritakan awal karir Portgas D. Ace menjadi bajak laut, dari pertama kali dia memakan buah iblis Mera Mera, membentuk bajak lautnya sendiri, yaitu Bajak Laut Spade, hingga dia berhasil sampai di Dunia Baru dan bertemu dengan Shirohige.",
        "type": "Manga",
        "author": "Eiichiro Oda & Boichi",
        "status": "Ongoing",
        "rating": "15 Tahun (minimal)",
        "genres": [
            "Action",
            "Adventure",
            "Comedy",
            "Drama",
            "Fantasy",
            "Shounen"
        ],
        "thumbnail": "https://thumbnail.komiku.id/wp-content/uploads/2020/09/Manga-One-Piece-Ace-Story.png",
        "chapter-list": [
            {
                "Name": "Chapter 4",
                "Endpoint": "/ch/one-piece-ace-story-chapter-04/",
                "Tanggal": "04/12/2021"
            },
            {
                "Name": "Chapter 3",
                "Endpoint": "/ch/one-piece-ace-story-chapter-03/",
                "Tanggal": "09/09/2021"
            },
            {
                "Name": "Chapter 2",
                "Endpoint": "/ch/one-piece-ace-story-chapter-02/",
                "Tanggal": "07/02/2021"
            },
            {
                "Name": "Chapter 1",
                "Endpoint": "/ch/one-piece-ace-story-chapter-01-bahasa-indonesia/",
                "Tanggal": "17/09/2020"
            }
        ]
    }
}
   ```

## Search Comic
   ```
   http://localhost/komikku-api/api/cari?search={query}&page={optional}
   ```

### API Example
   ```
   http://localhost/komikku-api/api/cari?search=one piece&page=1
   ```
   ```
   {
    "success": true,
    "message": "Search komik",
    "result": [
        {
            "title": "One Piece: Ace Story",
            "tgl_update": "Update 2 tahun lalu",
            "image": "https://thumbnail.komiku.id/wp-content/uploads/2020/09/Komik-One-Piece-Ace-Story.png",
            "tipe": "Manga",
            "endpoint": "/manga/one-piece-ace-story/"
        },
        {
            "title": "One Piece",
            "tgl_update": "Update 5 hari lalu",
            "image": "https://thumbnail.komiku.id/wp-content/uploads/Manga-One-Piece.jpg",
            "tipe": "Manga",
            "endpoint": "/manga/one-piece-indonesia/"
        },
        {
            "title": "The 31st Piece Turns the Tables",
            "tgl_update": "Update 1 bulan lalu",
            "image": "https://thumbnail.komiku.id/wp-content/uploads/2023/07/Back-The-31st-Piece-Turns-the-Tables.jpg",
            "tipe": "Manhwa",
            "endpoint": "/manga/the-31st-piece-turns-the-tables/"
        },
        {
            "title": "I Am Picking Up Pieces In The Jedi",
            "tgl_update": "Update 3 tahun lalu",
            "image": "https://thumbnail.komiku.id/wp-content/uploads/2020/12/Komik-I-Am-Picking-Up-Pieces-In-The-Jedi.png",
            "tipe": "Manhua",
            "endpoint": "/manga/i-am-picking-up-pieces-in-the-jedi/"
        }
    ]
}
   ```

## Get Chapter Detail
   ```
   http://localhost/komikku-api/api/baca?endpoint={endpoint chapter}
   ```

### API Example
   ```
   http://localhost/komikku-api/api/baca?endpoint=/ch/one-piece-ace-story-chapter-02/
   ```
   ```
   {
    "success": true,
    "message": "Get detail chapter",
    "result": {
        "title": "One Piece: Ace Story Chapter 02",
        "image": [
            "https://img.komiku.id/wp-content/uploads/2343403-1.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-2.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-3.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-4.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-5.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-6.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-7.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-8.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-9.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-10.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-11.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-12.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-13.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-14.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-15.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-16.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-17.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-18.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-19.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-20.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-21.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-22.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-23.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-24.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-25.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-26.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-27.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-28.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-29.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-30.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-31.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-32.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-33.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-34.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-35.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-36.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-37.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-38.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-39.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-40.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-41.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-42.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-43.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-44.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-45.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-46.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-47.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-48.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-49.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-50.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-51.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-52.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-53.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-54.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-55.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-56.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-57.jpg",
            "https://img.komiku.id/wp-content/uploads/2343403-58.jpg"
        ]
    }
}
   ```