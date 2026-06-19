# School Facilities Mapping QGIS

Sistem Informasi Geografis (SIG) untuk pemetaan fasilitas pendidikan SMA dan SMK di Kota Bandar Lampung menggunakan QGIS.

## Deskripsi Proyek

Proyek ini bertujuan untuk memetakan sebaran fasilitas pendidikan menengah atas (SMA dan SMK) di Bandar Lampung dengan analisis spasial menggunakan QGIS.

### Tujuan

- Mengidentifikasi lokasi SMA dan SMK di Bandar Lampung
- Visualisasi data spasial dalam format peta digital
- Menganalisis pola sebaran fasilitas pendidikan
- Menghasilkan output peta berkualitas tinggi untuk presentasi

## Struktur Proyek

```
library-facilities-mapping-qgis/
├── data/
│   ├── schools.csv              # Data lokasi SMA dan SMK
│   ├── schools.geojson          # Format GeoJSON
│   ├── bandar_lampung_admin.shp # Layer administrasi
│   └── reference/               # Data referensi lainnya
├── qgis/
│   ├── school_mapping.qgs       # Project file QGIS
│   ├── school_mapping.qgz       # Project backup
│   └── styles/                  # Symbol dan style files
├── output/
│   ├── maps/                    # Peta hasil export (PNG, PDF)
│   └── analysis/                # Hasil analisis spasial
├── docs/
│   ├── README.md                # Dokumentasi proyek
│   ├── TUTORIAL.md              # Panduan penggunaan QGIS
│   ├── METHODOLOGY.md           # Metodologi SIG
│   └── DATA_DICTIONARY.md       # Keterangan atribut data
└── .gitignore
```

## Data yang Digunakan

Sumber Data:
- Lokasi SMA dan SMK Bandar Lampung (Dinas Pendidikan)
- Peta administrasi Kota Bandar Lampung
- Peta dasar OpenStreetMap

Format Data:
- CSV: Tabel atribut sekolah
- GeoJSON: Format geografis untuk web
- Shapefile: Format standar GIS

Atribut Data:
- Nama sekolah
- Jenis (SMA/SMK)
- Alamat lengkap
- Koordinat (Latitude, Longitude)
- Jumlah siswa
- Kontak/Telepon

## Teknologi

- QGIS 3.x (Desktop GIS Software)
- Format Data: CSV, GeoJSON, Shapefile
- Sistem Proyeksi: WGS84 (EPSG:4326)

## Fitur Peta

- Layer SMA dan SMK dengan simbolisasi berbeda
- Layer jalan dan administrasi Bandar Lampung
- Layer landmark/reference points
- Legenda peta
- Skala dan grid koordinat
- North arrow dan informasi peta

## Cara Memulai

### Prasyarat

- QGIS 3.x terinstall di komputer
- Data yang tersedia di folder data/

### Langkah-langkah Penggunaan

1. Buka aplikasi QGIS

2. Buka project file:
   - File > Open Project
   - Pilih file: qgis/school_mapping.qgs

3. Jelajahi peta:
   - Gunakan zoom, pan untuk navigasi
   - Klik fitur untuk melihat informasi detail

4. Export/Cetak peta:
   - Project > Import/Export > Export as Image
   - Pilih format: PNG atau PDF
   - Simpan di folder output/maps/

## Dokumentasi Lengkap

- TUTORIAL.md - Panduan lengkap penggunaan QGIS untuk project ini
- METHODOLOGY.md - Penjelasan metodologi dan pendekatan GIS
- DATA_DICTIONARY.md - Keterangan detail atribut data

## Hasil dan Analisis

Analisis yang dilakukan:

1. Sebaran Spasial
   - Pola distribusi SMA dan SMK
   - Ketersediaan di setiap kelurahan/kecamatan

2. Analisis Jarak
   - Jarak antar sekolah
   - Coverage area setiap sekolah

3. Analisis Aksesibilitas
   - Akses dari pusat kota
   - Konektivitas dengan jaringan jalan

## Penulis

Nama: [Nama Anda]
Mata Kuliah: Sistem Informasi Geografis
Institusi: [Universitas/Sekolah]
Tanggal: 2026-05-20

## Lisensi

Proyek ini adalah tugas akademik untuk keperluan pendidikan dan pembelajaran.

## Status Proyek

Status: Dalam Pengembangan

Riwayat Update:
- 2026-05-20: Inisialisasi project dan setup struktur dasar
