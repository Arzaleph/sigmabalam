<?php
// Beri tahu browser bahwa ini adalah file JSON
header('Content-Type: application/json');

// Konfigurasi Database (SESUAIKAN PASSWORDNYA)
$host   = 'db.xxsdmzahfethhlfmbvwo.supabase.co'; 
$dbname = 'postgres';
$user   = 'postgres'; 
$pass   = 'sigsma123!!!'; // <-- Ganti dengan password akun Supabase Anda

try {
    // Driver pdo_pgsql standar (100% kompatibel dengan lokal maupun hosting)
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ambil semua data, dan ubah kolom 'geom' menjadi format GeoJSON menggunakan ST_AsGeoJSON
    // Asumsi: Saat import di QGIS, tabel diberi nama 'tabel_sekolah'
    $query = "SELECT *, ST_AsGeoJSON(geom) AS geometry FROM tabel_sekolah";
    $stmt = $pdo->query($query);

    $features = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $geometry = json_decode($row['geometry'], true);
        
        // Hapus kolom geometry dan geom dari properti agar tidak dobel
        unset($row['geometry']);
        unset($row['geom']);

        $features[] = [
            'type' => 'Feature',
            'geometry' => $geometry,
            'properties' => $row
        ];
    }

    $geojson = [
        'type' => 'FeatureCollection',
        'features' => $features
    ];

    echo json_encode($geojson);

} catch (PDOException $e) {
    // Tampilkan error jika koneksi gagal
    echo json_encode(['error' => "Koneksi gagal: " . $e->getMessage()]);
}
?>