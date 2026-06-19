# Tutorial Penggunaan QGIS untuk Pemetaan Fasilitas Sekolah

## Pendahuluan

Tutorial ini akan memandu Anda langkah demi langkah untuk membuat dan menggunakan peta SMA dan SMK Bandar Lampung di QGIS.

## Prasyarat

- QGIS 3.x sudah terinstall
- File data: schools.csv atau schools.geojson
- Koneksi internet untuk download basemap (opsional)

## Langkah 1: Membuka QGIS

1. Buka aplikasi QGIS di komputer Anda
2. Jika QGIS belum pernah digunakan sebelumnya, akan muncul dialog sambutan
3. Pilih Create New Project atau buka project yang sudah ada

## Langkah 2: Import Data CSV

1. Di menu bar, pilih: Layer > Add Layer > Add Delimited Text Layer
2. Cari dan pilih file schools.csv
3. Pastikan pengaturan:
   - Format: CSV
   - Delimiter: Comma (,)
   - X field: longitude
   - Y field: latitude
   - Geometry CRS: EPSG:4326 (WGS84)
4. Klik Add untuk import data

## Langkah 3: Menambah Basemap

1. Di panel Layers sebelah kiri, cari Browser
2. Expand XYZ Tiles
3. Pilih OpenStreetMap > Mapnik (atau provider lain)
4. Drag ke canvas atau double-click untuk menambahkan

Basemap akan menjadi layer dasar peta Bandar Lampung.

## Langkah 4: Styling Layer Sekolah

### Mengubah Warna dan Simbol

1. Di Layers panel, klik kanan pada layer schools
2. Pilih Properties atau double-click layer
3. Masuk ke tab Symbology

### Membedakan SMA dan SMK

1. Di Symbology, pilih Categorized
2. Column: jenis_sekolah
3. Classify untuk buat kategori otomatis
4. Atur warna untuk setiap kategori:
   - SMA: biru
   - SMK: merah
5. Klik Apply dan OK

## Langkah 5: Menambah Informasi Pop-up

1. Di Layers panel, klik kanan layer schools > Properties
2. Masuk tab Fields
3. Ubah Alias untuk field yang ingin ditampilkan di popup
4. Keluar dari Properties

## Langkah 6: Menambahkan Legenda

1. Di menu Insert pilih Legend
2. Atur legend untuk menampilkan layer penting
3. Posisikan legenda di area yang tidak mengganggu peta

## Langkah 7: Menambah Scale Bar

1. Di menu Insert pilih Scale Bar
2. Pilih style scale bar yang sesuai
3. Atur ukuran dan posisi

## Langkah 8: Menambahkan North Arrow

1. Di menu Insert pilih North Arrow
2. Pilih style north arrow
3. Posisikan di sudut peta

## Langkah 9: Zoom dan Navigate

Navigasi peta:

- Mouse Scroll: zoom in/out
- Click dan drag: pan (geser peta)
- Click pada fitur: tampilkan atribut

## Langkah 10: Export Peta

### Export sebagai Gambar (PNG/JPG)

1. Menu Project > Import/Export > Export as Image
2. Pilih format (PNG/JPG)
3. Tentukan lokasi penyimpanan
4. Atur resolusi (300 DPI untuk quality tinggi)
5. Klik Export

### Export sebagai PDF

1. Menu Project > Import/Export > Export as PDF
2. Tentukan lokasi penyimpanan
3. Klik Export

### Save Project

1. Menu File > Save As
2. Beri nama project (misal: school_mapping.qgs)
3. Simpan di folder qgis/

## Langkah 11: Analisis Spasial Dasar

### Menghitung Jarak Antar Sekolah

1. Pilih Tools > Vector Analysis > Distance Matrix
2. Pilih layer input
3. Atur output location
4. Klik Run untuk hitung jarak

### Buffer Zone (Jangkauan)

1. Pilih Tools > Vector Geometry > Buffer
2. Input layer: schools
3. Distance: 500 (meter) untuk radius 500m
4. Klik Run untuk buat buffer zone

## Tips dan Trik

1. Menyimpan Sering: Selalu save project setelah perubahan penting
2. Undo/Redo: Gunakan Ctrl+Z untuk undo dan Ctrl+Shift+Z untuk redo
3. Zoom to Layer: Klik kanan layer > Zoom to Layer
4. Identify Features: Aktifkan Identify tool untuk klik dan lihat detail
5. Measure Distance: Tools > Measure > Line untuk ukur jarak antar titik

## Troubleshooting

1. Data tidak muncul?
   - Periksa CRS (Coordinate Reference System) cocok
   - Pastikan kolom longitude/latitude benar

2. Basemap tidak muncul?
   - Periksa koneksi internet
   - Coba provider XYZ tiles lain

3. Export tidak jelas?
   - Naikkan resolusi DPI saat export
   - Pastikan zoom level sudah sesuai

## Referensi

- Official QGIS Documentation: https://docs.qgis.org
- QGIS Tutorials and Tips: https://www.qgistutorials.com
- QGIS Community: https://www.qgis.org/en/site/

---

Last Updated: 2026-05-20
