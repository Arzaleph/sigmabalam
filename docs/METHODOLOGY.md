# Metodologi - Pemetaan Fasilitas Sekolah di Bandar Lampung

## 1. Pendahuluan

Dokumen ini menjelaskan metodologi pengumpulan data, analisis, dan pembuatan peta Sistem Informasi Geografis (SIG) untuk fasilitas pendidikan menengah (SMA dan SMK) di Kota Bandar Lampung.

## 2. Tujuan Penelitian

Penelitian ini bertujuan untuk:

1. Mengidentifikasi dan memetakan lokasi SMA dan SMK di Bandar Lampung
2. Menganalisis sebaran spasial fasilitas pendidikan
3. Memberikan informasi geografis untuk perencanaan pendidikan
4. Menghasilkan visualisasi peta yang komprehensif dan informatif

## 3. Area Studi

- Lokasi: Kota Bandar Lampung, Provinsi Lampung, Indonesia
- Batas Administrasi: Seluruh area Kota Bandar Lampung
- Tingkat Detail: Kelurahan dan Kecamatan
- Koordinat Referensi: Bujur 105.15 - 105.30 BT, Lintang -5.25 - -5.45 LS

## 4. Sumber Data

### Data Primer

1. Survei Lapangan
   - Verifikasi lokasi sekolah secara langsung
   - Dokumentasi foto lokasi
   - Pengumpulan informasi kontak

2. Wawancara
   - Dinas Pendidikan Kota Bandar Lampung
   - Kepala Sekolah atau Wakil Kepala Sekolah
   - Staff Tata Usaha

### Data Sekunder

1. Data Administrasi
   - Database Dinas Pendidikan
   - Arsip sekolah
   - Dokumen perencanaan pendidikan

2. Data Geografis
   - Peta RBI (Rupa Bumi Indonesia)
   - OpenStreetMap
   - Basemap digital

3. Data Statistik
   - Badan Pusat Statistik (BPS)
   - Data jumlah siswa dan guru
   - Data sarana dan prasarana

## 5. Pengumpulan Data

### Proses Geocoding

Setiap sekolah di-geocode (ditentukan koordinatnya) melalui:

1. GPS Recording: Pengukuran langsung di lokasi sekolah
2. Address Geocoding: Konversi alamat ke koordinat menggunakan map services
3. Visual Inspection: Verifikasi lokasi di peta digital

### Format Data yang Dikumpulkan

Untuk setiap sekolah, dikumpulkan data:

```
- Nama Sekolah
- Jenis (SMA/SMK)
- Alamat Lengkap
- Kelurahan
- Kecamatan
- Latitude/Longitude (WGS84)
- Jumlah Siswa
- Nomor Telepon
- Nama Kepala Sekolah
```

### Akurasi Koordinat

- Akurasi Target: +/- 10 meter
- Metode: GPS dan cross-reference dengan peta digital
- Sistem Koordinat: WGS84 (EPSG:4326)

## 6. Cleaning dan Validasi Data

### Validasi Spasial

1. Pengecekan Range Koordinat
   - Latitude: -5.30 s/d -5.45
   - Longitude: 105.24 s/d 105.30

2. Pengecekan Duplikasi
   - Identifikasi sekolah dengan koordinat sangat dekat
   - Verifikasi apakah duplikasi atau lokasi berbeda

3. Pengecekan Outliers
   - Identifikasi titik yang jauh dari pola umum

### Validasi Atribut

1. Konsistensi Jenis Sekolah
   - Hanya nilai: SMA atau SMK

2. Integritas Data Numerik
   - Jumlah siswa: >= 0
   - Nomor telepon: format yang valid

3. Kelengkapan Data
   - Verifikasi tidak ada field kosong yang kritis
   - Cross-check dengan sumber lain jika ada data kosong

## 7. Analisis Spasial

### Analisis Sebaran

1. Density Analysis
   - Mengidentifikasi area dengan konsentrasi sekolah tinggi
   - Menggunakan Kernel Density Estimation

2. Distribution Pattern
   - Analisis apakah distribusi merata, clustered, atau random
   - Menggunakan Moran's I Index

### Analisis Jarak

1. Nearest Neighbor Analysis
   - Menentukan sekolah terdekat dari setiap titik
   - Menghitung jarak rata-rata antar sekolah

2. Distance Matrix
   - Membuat tabel jarak antar sekolah

### Buffer Analysis

1. Service Area (Jangkauan Layanan)
   - Buffer 500m: area walking distance (jalan kaki)
   - Buffer 1km: area untuk transportasi ringan
   - Buffer 2km: area untuk transportasi motor/mobil

2. Coverage Assessment
   - Identifikasi area yang tidak terjangkau layanan sekolah

## 8. Visualisasi Peta

### Symbolisasi

1. Symbology Berdasarkan Jenis
   - SMA: Simbol biru
   - SMK: Simbol merah

2. Symbology Berdasarkan Ukuran
   - Ukuran symbol proporsional dengan jumlah siswa
   - Skala: Small (300-500), Medium (500-800), Large (>800)

### Komponen Peta

1. Map Frame dan Title
   - Judul: "Pemetaan Fasilitas Sekolah Menengah Bandar Lampung"
   - Subtitle: "SMA dan SMK"

2. Layers
   - Basemap (OpenStreetMap atau peta dasar lainnya)
   - Administrative boundaries (batas kecamatan/kelurahan)
   - School locations (titik sekolah)
   - Roads layer (jaringan jalan)

3. Legend
   - Menampilkan jenis dan kategori simbol
   - Ukuran text yang terbaca

4. Scale Bar
   - Menampilkan skala peta
   - Format: 0 - 2 - 4 km

5. North Arrow
   - Menunjukkan arah utara peta

6. Graticule/Grid
   - Grid koordinat dengan interval yang sesuai

## 9. Metode Analisis Lanjutan

### Hot Spot Analysis (Jika diperlukan)

Mengidentifikasi area dengan konsentrasi sekolah tinggi menggunakan:

- Kernel Density Estimation
- Hot Spot Analysis tool di QGIS

### Accessibility Analysis

Analisis aksesibilitas berdasarkan:

- Jarak tempuh ke pusat kota
- Konektivitas jaringan jalan
- Isochrone analysis (waktu tempuh)

### Equity Analysis

Menilai kesetaraan distribusi:

- Rasio sekolah per jumlah penduduk per kecamatan
- Identifikasi area dengan kekurangan/kelebihan fasilitas

## 10. Output dan Deliverables

### 1. Peta Digital

File Format:

- QGIS Project (.qgs, .qgz)
- PNG (300 DPI untuk cetak)
- PDF (vector format)

Konten Peta:

- Lokasi SMA dan SMK
- Administrative boundaries
- Basemap reference
- Legenda, scale, north arrow

### 2. Database Spasial

Format:

- CSV (data tabular)
- GeoJSON (format geografis)
- Shapefile (format QGIS standard)

### 3. Analisis Laporan

Konten:

- Hasil analisis sebaran
- Statistik deskriptif
- Rekomendasi untuk perencanaan
- Visualisasi grafik dan tabel

## 11. Limitasi dan Catatan

1. Akurasi Koordinat
   - Berdasarkan geocoding alamat dan verifikasi GPS
   - Akurasi +/- 10 meter
   - Beberapa lokasi mungkin tidak tepat 100% jika alamat kurang presisi

2. Data Temporal
   - Data berlaku untuk tahun ajaran 2025/2026
   - Perlu update berkala jika ada sekolah baru

3. Cakupan
   - Mencakup sekolah negeri dan swasta yang aktif
   - Tidak termasuk sekolah yang sudah tutup atau dalam pembangunan

4. Resolusi Peta
   - Tidak terlalu detail untuk analisis skala sangat kecil
   - Cocok untuk analisis kota level

## 12. Rekomendasi Penggunaan

### Cocok untuk:

1. Perencanaan pendidikan strategis
2. Analisis ketersediaan fasilitas pendidikan
3. Presentasi dan sosialisasi
4. Penelitian geografis pendidikan
5. Perencanaan transportasi pelajar

### Tidak cocok untuk:

1. Analisis presisi tinggi (gunakan survei lebih detail)
2. Real-time monitoring
3. Perkiraan akurat untuk area spesifik kecil

## 13. Referensi Metodologi

1. Goodchild, M. F. (1986). Spatial Autocorrelation. Concepts and Techniques in Modern Geography
2. Tomlinson, R. F. (1984). Geographic Information Systems and Decision Making
3. Aronoff, S. (1989). Geographic Information Systems: A Management Perspective
4. QGIS Documentation: https://docs.qgis.org

## 14. Keterangan Penulis

- Dibuat untuk: Tugas Kuliah Sistem Informasi Geografis
- Institusi: [Nama Institusi]
- Tanggal: 2026-05-20
- Status: Preliminary

---

Last Updated: 2026-05-20
