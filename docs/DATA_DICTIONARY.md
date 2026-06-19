# Data Dictionary - Pemetaan Fasilitas Sekolah Bandar Lampung

Dokumentasi lengkap untuk semua atribut dan field yang digunakan dalam dataset SMA dan SMK Bandar Lampung.

## Tabel: schools (Data Sekolah)

### Struktur Data

| No  | Field          | Tipe Data | Panjang | Keterangan                      | Contoh                      |
| --- | -------------- | --------- | ------- | ------------------------------- | --------------------------- |
| 1   | nama_sekolah   | String    | 100     | Nama lengkap sekolah            | SMA Negeri 1 Bandar Lampung |
| 2   | jenis_sekolah  | String    | 10      | Jenis sekolah: SMA atau SMK     | SMA                         |
| 3   | alamat         | String    | 150     | Alamat lengkap sekolah          | Jl. Diponegoro No. 1        |
| 4   | kelurahan      | String    | 50      | Kelurahan tempat sekolah berada | Tanjung Karang Pusat        |
| 5   | kecamatan      | String    | 50      | Kecamatan tempat sekolah berada | Tanjung Karang              |
| 6   | latitude       | Float     | -       | Koordinat lintang (Y axis)      | -5.3971                     |
| 7   | longitude      | Float     | -       | Koordinat bujur (X axis)        | 105.2671                    |
| 8   | jumlah_siswa   | Integer   | -       | Jumlah siswa aktif              | 850                         |
| 9   | kontak         | String    | 20      | Nomor telepon sekolah           | 0721-123456                 |
| 10  | kepala_sekolah | String    | 100     | Nama kepala sekolah             | Drs. Ahmad Syaiful          |

## Penjelasan Field

### nama_sekolah

- Nama resmi sekolah
- Format: PascalCase untuk singkatan (SMA, SMK, Negeri, Swasta)
- Contoh: "SMA Negeri 1 Bandar Lampung"

### jenis_sekolah

- Klasifikasi jenis sekolah
- Nilai: SMA atau SMK
- SMA = Sekolah Menengah Atas
- SMK = Sekolah Menengah Kejuruan

### alamat

- Alamat lengkap sekolah
- Format: Nama Jalan No. Nomor
- Contoh: "Jl. Diponegoro No. 1"

### kelurahan

- Pembagian administratif level terkecil di Bandar Lampung
- Setiap kelurahan memiliki pemerintahan sendiri
- Contoh: "Tanjung Karang Pusat", "Way Halim"

### kecamatan

- Pembagian administratif level menengah
- Bandar Lampung terdiri dari beberapa kecamatan utama:
  - Tanjung Karang
  - Bandar Lampung
  - Labuhan Ratu
  - Teluk Betung Barat
  - Teluk Betung Selatan
  - Teluk Betung Utara
  - Kemiling
  - Rajabasa

### latitude

- Koordinat lintang (North-South position)
- Range untuk Bandar Lampung: -5.30 hingga -5.45
- Format: Desimal dengan 4 digit belakang koma
- Negatif menunjukkan Hemisfer Selatan

### longitude

- Koordinat bujur (East-West position)
- Range untuk Bandar Lampung: 105.24 hingga 105.30
- Format: Desimal dengan 4 digit belakang koma
- Sistem: WGS84 (EPSG:4326)

### jumlah_siswa

- Jumlah siswa aktif pada tahun ajaran terkini
- Data ini dapat berubah setiap tahun
- Digunakan untuk analisis ukuran sekolah

### kontak

- Nomor telepon utama sekolah
- Format: 0XXX-XXXXXX (format Indonesia)
- Contoh: "0721-123456"

### kepala_sekolah

- Nama lengkap kepala/direktur sekolah
- Format: Gelar Akademik + Nama
- Contoh: "Drs. Ahmad Syaiful"

## Format File

### CSV (Comma Separated Values)

Struktur file schools.csv:

```
nama_sekolah,jenis_sekolah,alamat,kelurahan,kecamatan,latitude,longitude,jumlah_siswa,kontak,kepala_sekolah
SMA Negeri 1 Bandar Lampung,SMA,Jl. Diponegoro No. 1,Tanjung Karang Pusat,Tanjung Karang,-5.3971,105.2671,850,0721-123456,Drs. Ahmad Syaiful
```

### GeoJSON (Geographic JSON)

Struktur untuk format GeoJSON:

```json
{
  "type": "Feature",
  "geometry": {
    "type": "Point",
    "coordinates": [105.2671, -5.3971]
  },
  "properties": {
    "nama_sekolah": "SMA Negeri 1 Bandar Lampung",
    "jenis_sekolah": "SMA",
    ...
  }
}
```

Catatan: Koordinat GeoJSON menggunakan format [longitude, latitude]

## Sistem Koordinat

- CRS: WGS84
- EPSG Code: 4326
- Unit: Derajat Desimal
- Datum: World Geodetic System 1984

## Kualitas Data

- Source: Dinas Pendidikan Kota Bandar Lampung
- Update: Tahun ajaran 2025/2026
- Akurasi Koordinat: +/- 10 meter
- Coverage: Sekolah Negeri dan Swasta aktif

## Validasi Data

### Checking Longitude/Latitude

Koordinat valid untuk Bandar Lampung:

- Latitude: -5.30 s/d -5.45
- Longitude: 105.24 s/d 105.30

### Checking jenis_sekolah

Hanya 2 nilai valid:

- SMA
- SMK

### Checking jumlah_siswa

- Nilai: >= 0
- Tipe: Integer (bilangan bulat)
- Konteks: Sekolah menengah biasanya 200-1500 siswa

## Penggunaan untuk Analisis

### Analisis Sebaran Spasial

Gunakan field latitude/longitude untuk:

- Visualisasi lokasi di peta
- Analisis clustering sekolah
- Buffer zone analysis
- Distance calculation

### Analisis Kapasitas

Gunakan field jumlah_siswa untuk:

- Menentukan sekolah besar/kecil
- Membuat symbolisasi berdasarkan ukuran
- Perencanaan kapasitas pendidikan

### Analisis Administratif

Gunakan field kecamatan/kelurahan untuk:

- Pengelompokan per area administratif
- Distribusi per kecamatan
- Analisis ketersediaan per wilayah

## Catatan Penting

1. Data koordinat berdasarkan alamat yang di-geocode
2. Akurasi tergantung dari kelengkapan data alamat
3. Data jumlah_siswa dapat berubah setiap tahun
4. Gunakan selalu CRS yang sama: WGS84 (EPSG:4326)

## Kontak

Untuk pertanyaan data atau update:

- Dinas Pendidikan Kota Bandar Lampung
- Atau lihat dokumentasi dalam repository ini

---

Last Updated: 2026-05-20
