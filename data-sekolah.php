<?php
/* ============================================================
   DATA SEKOLAH — Ambil dari PostgreSQL (PostGIS)
   Password disesuaikan dengan api_sekolah.php
   ============================================================ */
   $host   = 'db.xxsdmzahfethhlfmbvwo.supabase.co';
   $dbname = 'postgres';
   $user   = 'postgres';
   $pass   = 'sigsma123!!!'; // <-- Ganti dengan password akun Supabase Anda
   
   $sekolah   = [];
   $dbError   = null;
   $queryTime = 0;
   
   try {
       $t0  = microtime(true);
       $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass, [
           PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
           PDO::ATTR_TIMEOUT => 5,
       ]);

    $sql  = 'SELECT id,
                    name,
                    "addr:city"        AS kota,
                    "addr:street"      AS jalan,
                    "addr:subdistrict" AS kecamatan,
                    ST_Y(geom)         AS lat,
                    ST_X(geom)         AS lng
             FROM public.tabel_sekolah
             ORDER BY name ASC';

    $stmt    = $pdo->query($sql);
    $sekolah = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $queryTime = round((microtime(true) - $t0) * 1000, 1); // ms

} catch (PDOException $e) {
    $dbError = $e->getMessage();
}

/* Hitung statistik sederhana */
$totalSMA   = count($sekolah);
$jumlahNegeri = 0;
$jumlahSwasta = 0;
foreach ($sekolah as $s) {
    if (stripos($s['name'], 'SMAN') !== false || stripos($s['name'], 'SMA N ') !== false) {
        $jumlahNegeri++;
    } else {
        $jumlahSwasta++;
    }
}

include 'includes/header.php';
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

<style>
/* ============================================================
   ROOT
   ============================================================ */
:root {
  --bg:        #060b18;
  --bg-card:   #0d1527;
  --bg-card2:  #111e35;
  --bg-row:    #0a1120;
  --border:    rgba(99,179,237,0.11);
  --border-hi: rgba(99,179,237,0.28);
  --accent:    #3b82f6;
  --cyan:      #06b6d4;
  --green:     #10b981;
  --amber:     #f59e0b;
  --rose:      #f43f5e;
  --violet:    #8b5cf6;
  --text-hi:   #eaf2ff;
  --text-mid:  #8eaed1;
  --text-lo:   #3d5470;
  --radius:    12px;
  --trans:     0.22s cubic-bezier(.22,1,.36,1);
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
  font-family: 'Inter', -apple-system, sans-serif;
  background: var(--bg);
  color: var(--text-hi);
  line-height: 1.6;
  overflow-x: hidden;
}
a { color: inherit; text-decoration: none; }

/* ============================================================
   PAGE HEADER
   ============================================================ */
.page-header {
  position: relative;
  padding: 52px 0 44px;
  border-bottom: 1px solid var(--border);
  overflow: hidden;
}

.page-header::before {
  content: '';
  position: absolute; inset: 0;
  background:
    radial-gradient(ellipse at 15% 50%, rgba(59,130,246,0.07) 0%, transparent 55%),
    radial-gradient(ellipse at 85% 50%, rgba(6,182,212,0.05) 0%, transparent 55%);
  pointer-events: none;
}

.page-header::after {
  content: '';
  position: absolute; inset: 0;
  background-image:
    linear-gradient(rgba(99,179,237,0.035) 1px, transparent 1px),
    linear-gradient(90deg, rgba(99,179,237,0.035) 1px, transparent 1px);
  background-size: 44px 44px;
  pointer-events: none;
}

.ph-inner {
  position: relative; z-index: 1;
  max-width: 1200px; margin: 0 auto; padding: 0 32px;
  display: flex; align-items: flex-end; justify-content: space-between; gap: 24px;
  flex-wrap: wrap;
}

.ph-left {}

.ph-eyebrow {
  display: inline-flex; align-items: center; gap: 8px;
  background: rgba(59,130,246,0.11); border: 1px solid rgba(59,130,246,0.26);
  color: #60a5fa; font-size: 10.5px; font-weight: 700;
  letter-spacing: 0.12em; text-transform: uppercase;
  padding: 5px 13px; border-radius: 20px; margin-bottom: 16px;
}

.ph-title {
  font-size: clamp(1.5rem,3vw,2.4rem); font-weight: 900;
  color: var(--text-hi); letter-spacing: -0.02em;
  display: flex; align-items: center; gap: 14px; margin-bottom: 8px;
}

.ph-title-icon {
  width: 48px; height: 48px; border-radius: 13px;
  background: linear-gradient(135deg, #1d4ed8, #0891b2);
  display: flex; align-items: center; justify-content: center;
  font-size: 20px; box-shadow: 0 4px 18px rgba(59,130,246,0.32);
  flex-shrink: 0;
}

.ph-desc { font-size: 14px; color: var(--text-mid); max-width: 560px; }

.ph-right {}

.db-status {
  display: flex; align-items: center; gap: 8px;
  background: var(--bg-card); border: 1px solid var(--border);
  border-radius: 10px; padding: 10px 16px;
}

.db-dot {
  width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0;
}
.db-dot.ok  { background: var(--green); box-shadow: 0 0 6px rgba(16,185,129,0.6); animation: pulsed 2s ease-in-out infinite; }
.db-dot.err { background: var(--rose);  box-shadow: 0 0 6px rgba(244,63,94,0.6); }

@keyframes pulsed {
  0%,100% { opacity:1; transform:scale(1); }
  50%      { opacity:.4; transform:scale(.7); }
}

.db-status-text { font-size: 12px; color: var(--text-mid); }
.db-status-text strong { color: var(--text-hi); font-weight: 600; }

/* ============================================================
   MAIN WRAP
   ============================================================ */
.main-wrap {
  max-width: 1200px; margin: 0 auto; padding: 36px 32px 80px;
}

/* ============================================================
   STATS ROW
   ============================================================ */
.stats-row {
  display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; margin-bottom: 28px;
}

.stat-card {
  background: var(--bg-card); border: 1px solid var(--border);
  border-radius: var(--radius); padding: 18px 20px;
  display: flex; align-items: center; gap: 14px;
  transition: border-color var(--trans), transform var(--trans);
}

.stat-card:hover { border-color: var(--border-hi); transform: translateY(-2px); }

.stat-icon {
  width: 42px; height: 42px; border-radius: 11px;
  display: flex; align-items: center; justify-content: center;
  font-size: 17px; flex-shrink: 0;
}
.si-blue   { background: rgba(59,130,246,0.14); color: #60a5fa; }
.si-green  { background: rgba(16,185,129,0.14); color: #34d399; }
.si-amber  { background: rgba(245,158,11,0.14);  color: #fbbf24; }
.si-violet { background: rgba(139,92,246,0.14);  color: #a78bfa; }

.stat-body {}
.stat-val { font-size: 1.7rem; font-weight: 800; color: var(--text-hi); letter-spacing: -0.03em; line-height: 1.1; }
.stat-lbl { font-size: 11px; color: var(--text-lo); font-weight: 600; letter-spacing: 0.06em; text-transform: uppercase; margin-top: 2px; }

/* ============================================================
   TOOLBAR
   ============================================================ */
.toolbar {
  display: flex; align-items: center; gap: 12px; margin-bottom: 18px; flex-wrap: wrap;
}

/* Search box */
.search-box {
  display: flex; align-items: center; gap: 9px;
  background: var(--bg-card); border: 1px solid var(--border);
  border-radius: 10px; padding: 10px 14px; flex: 1; min-width: 220px;
  transition: border-color var(--trans), box-shadow var(--trans);
}
.search-box:focus-within { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(59,130,246,0.14); }
.search-box i { color: var(--cyan); font-size: 13px; flex-shrink: 0; }
.search-box input {
  background: transparent; border: none; outline: none;
  color: var(--text-hi); font-size: 13px; width: 100%; font-family: 'Inter', sans-serif;
}
.search-box input::placeholder { color: var(--text-lo); }

/* Filter buttons */
.filter-btns { display: flex; gap: 6px; }

.filter-btn {
  background: var(--bg-card); border: 1px solid var(--border);
  color: var(--text-mid); font-size: 12px; font-weight: 600;
  padding: 9px 16px; border-radius: 9px; cursor: pointer;
  font-family: 'Inter', sans-serif; transition: all var(--trans);
  white-space: nowrap;
}
.filter-btn:hover { border-color: var(--border-hi); color: var(--text-hi); }
.filter-btn.active { background: rgba(59,130,246,0.14); border-color: rgba(59,130,246,0.35); color: #60a5fa; }
.filter-btn.active.g { background: rgba(16,185,129,0.12); border-color: rgba(16,185,129,0.3); color: #34d399; }
.filter-btn.active.a { background: rgba(245,158,11,0.12);  border-color: rgba(245,158,11,0.3);  color: #fbbf24; }

/* Row count badge */
.row-count {
  margin-left: auto;
  font-size: 11.5px; color: var(--text-lo); white-space: nowrap;
  background: var(--bg-card); border: 1px solid var(--border);
  padding: 8px 14px; border-radius: 9px; font-weight: 600;
}
.row-count span { color: var(--accent); }

/* ============================================================
   TABLE CARD
   ============================================================ */
.table-card {
  background: var(--bg-card); border: 1px solid var(--border);
  border-radius: var(--radius); overflow: hidden;
}

.table-wrap { overflow-x: auto; }
.table-wrap::-webkit-scrollbar { height: 4px; }
.table-wrap::-webkit-scrollbar-thumb { background: rgba(99,179,237,0.2); border-radius: 4px; }

table.data-table {
  width: 100%; border-collapse: collapse; font-size: 13px;
}

.data-table thead tr {
  background: rgba(59,130,246,0.06);
  border-bottom: 1px solid var(--border-hi);
}

.data-table th {
  padding: 12px 16px; text-align: left;
  font-size: 10.5px; font-weight: 700; color: var(--cyan);
  letter-spacing: 0.09em; text-transform: uppercase;
  white-space: nowrap; cursor: pointer; user-select: none;
  transition: color var(--trans);
}

.data-table th:hover { color: var(--text-hi); }

.th-inner { display: inline-flex; align-items: center; gap: 5px; }

.data-table tbody tr {
  border-bottom: 1px solid var(--border);
  transition: background var(--trans);
}

.data-table tbody tr:last-child { border-bottom: none; }
.data-table tbody tr:hover { background: rgba(59,130,246,0.05); }

.data-table td {
  padding: 12px 16px; color: var(--text-mid); vertical-align: middle;
}

/* Column specifics */
.col-no    { color: var(--text-lo); font-size: 11px; font-weight: 600; width: 44px; }
.col-name  { color: var(--text-hi); font-weight: 600; min-width: 200px; }
.col-type  { width: 90px; }
.col-kota  { min-width: 130px; }
.col-coord {
  font-family: 'JetBrains Mono', monospace;
  font-size: 11.5px; color: var(--cyan);
  white-space: nowrap;
}

/* Type badge */
.type-badge {
  display: inline-flex; align-items: center; gap: 5px;
  padding: 3px 10px; border-radius: 20px; font-size: 10.5px; font-weight: 700;
}
.type-badge.negeri { background: rgba(16,185,129,0.13); border: 1px solid rgba(16,185,129,0.28); color: #34d399; }
.type-badge.swasta { background: rgba(245,158,11,0.13);  border: 1px solid rgba(245,158,11,0.28);  color: #fbbf24; }

/* Action buttons per row */
.row-actions { display: flex; align-items: center; gap: 6px; }

.row-btn {
  width: 28px; height: 28px; border-radius: 7px; border: 1px solid var(--border);
  background: var(--bg-card2); color: var(--text-lo); font-size: 11px;
  display: flex; align-items: center; justify-content: center;
  cursor: pointer; transition: all var(--trans); position: relative;
}
.row-btn:hover { border-color: var(--border-hi); color: var(--cyan); background: rgba(6,182,212,0.08); }
.row-btn.copied { color: var(--green); border-color: rgba(16,185,129,0.3); }

/* Tooltip */
.row-btn::after {
  content: attr(data-tip);
  position: absolute; bottom: calc(100% + 6px); left: 50%;
  transform: translateX(-50%); background: rgba(8,13,26,0.92);
  border: 1px solid var(--border-hi); color: var(--text-hi);
  font-size: 10px; white-space: nowrap; padding: 3px 8px; border-radius: 5px;
  opacity: 0; pointer-events: none; transition: opacity .15s;
  font-family: 'Inter', sans-serif;
}
.row-btn:hover::after { opacity: 1; }

/* ============================================================
   PAGINATION
   ============================================================ */
.pagination {
  display: flex; align-items: center; justify-content: space-between;
  padding: 14px 18px; border-top: 1px solid var(--border); flex-wrap: wrap; gap: 10px;
}

.page-info { font-size: 12px; color: var(--text-lo); }
.page-info span { color: var(--text-mid); font-weight: 600; }

.page-btns { display: flex; gap: 4px; align-items: center; }

.page-btn {
  min-width: 32px; height: 32px; border-radius: 8px;
  border: 1px solid var(--border); background: transparent;
  color: var(--text-mid); font-size: 12px; font-weight: 600;
  cursor: pointer; display: flex; align-items: center; justify-content: center;
  font-family: 'Inter', sans-serif; padding: 0 8px;
  transition: all var(--trans);
}
.page-btn:hover:not(:disabled) { border-color: var(--border-hi); color: var(--text-hi); background: rgba(255,255,255,0.04); }
.page-btn.active  { background: rgba(59,130,246,0.18); border-color: rgba(59,130,246,0.35); color: #60a5fa; }
.page-btn:disabled { opacity: 0.3; cursor: not-allowed; }

/* ============================================================
   EMPTY / ERROR STATES
   ============================================================ */
.state-box {
  padding: 64px 32px; text-align: center;
}

.state-icon {
  width: 56px; height: 56px; border-radius: 15px;
  display: flex; align-items: center; justify-content: center;
  font-size: 22px; margin: 0 auto 18px;
}
.state-icon.err { background: rgba(244,63,94,0.13); color: #fb7185; }
.state-icon.empty { background: rgba(59,130,246,0.10); color: #60a5fa; }

.state-title { font-size: 16px; font-weight: 700; color: var(--text-hi); margin-bottom: 8px; }
.state-desc  { font-size: 13px; color: var(--text-mid); max-width: 480px; margin: 0 auto; line-height: 1.7; }
.state-code  {
  margin: 16px auto 0; max-width: 560px;
  background: var(--bg-card2); border: 1px solid var(--border);
  border-radius: 9px; padding: 12px 16px;
  font-family: 'JetBrains Mono', monospace; font-size: 11.5px;
  color: var(--rose); text-align: left; word-break: break-all;
}

/* ============================================================
   FOOTER
   ============================================================ */
footer.ef {
  background: #040810; border-top: 1px solid var(--border);
  padding: 34px 32px;
}
.ef-inner {
  max-width: 1200px; margin: 0 auto;
  display: flex; align-items: center; justify-content: space-between;
  flex-wrap: wrap; gap: 16px;
}
.ef-brand { display: flex; align-items: center; gap: 10px; }
.ef-brand-icon { width: 30px; height: 30px; border-radius: 8px; background: linear-gradient(135deg,#1d4ed8,#0891b2); display:flex;align-items:center;justify-content:center; }
.ef-brand-icon i { color:#fff; font-size:12px; }
.ef-brand-name { font-size:13px; font-weight:700; color:var(--text-hi); }
.ef-brand-sub  { font-size:10px; color:var(--text-lo); }
.ef-links { display:flex; gap:20px; }
.ef-links a { font-size:12px; color:var(--text-lo); transition:color .2s; }
.ef-links a:hover { color:var(--cyan); }
.ef-copy { font-size:11px; color:var(--text-lo); }

/* ============================================================
   ANIMATIONS
   ============================================================ */
.reveal { opacity:0; transform:translateY(18px); transition:opacity .55s ease, transform .55s ease; }
.reveal.visible { opacity:1; transform:translateY(0); }
.rd1 { transition-delay:.07s; } .rd2 { transition-delay:.14s; } .rd3 { transition-delay:.21s; }

/* Scrollbar */
::-webkit-scrollbar { width:5px; height:5px; }
::-webkit-scrollbar-track { background:transparent; }
::-webkit-scrollbar-thumb { background:rgba(99,179,237,0.2); border-radius:4px; }

@media(max-width:800px) { .stats-row{grid-template-columns:1fr 1fr;} .ph-right{width:100%;} }
@media(max-width:520px) { .stats-row{grid-template-columns:1fr;} .main-wrap{padding:24px 16px 60px;} }
</style>

<!-- ============================================================
     PAGE HEADER
     ============================================================ -->
<div class="page-header">
  <div class="ph-inner">
    <div class="ph-left">
      <div class="ph-eyebrow"><i class="fa-solid fa-table" style="font-size:9px;"></i> Direktori Data</div>
      <div class="ph-title">
        <div class="ph-title-icon"><i class="fa-solid fa-graduation-cap" style="color:#fff;"></i></div>
        Data Sekolah SMA
      </div>
      <p class="ph-desc">
        Direktori lengkap seluruh SMA di Kota Bandar Lampung beserta koordinat spasial dari basis data PostgreSQL/PostGIS.
      </p>
    </div>
    <div class="ph-right">
      <?php if ($dbError): ?>
      <div class="db-status">
        <div class="db-dot err"></div>
        <div class="db-status-text">
          <strong>Koneksi Gagal</strong><br>
          PostgreSQL · db_sig_sma
        </div>
      </div>
      <?php else: ?>
      <div class="db-status">
        <div class="db-dot ok"></div>
        <div class="db-status-text">
          <strong>Terhubung</strong><br>
          PostgreSQL · <?= $queryTime ?>ms · <?= $totalSMA ?> baris
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- ============================================================
     MAIN CONTENT
     ============================================================ -->
<div class="main-wrap">

  <!-- STATS ROW -->
  <div class="stats-row reveal">
    <div class="stat-card">
      <div class="stat-icon si-blue"><i class="fa-solid fa-school"></i></div>
      <div class="stat-body">
        <div class="stat-val"><?= $totalSMA ?></div>
        <div class="stat-lbl">Total SMA</div>
      </div>
    </div>
    <div class="stat-card">
      <div class="stat-icon si-green"><i class="fa-solid fa-landmark-flag"></i></div>
      <div class="stat-body">
        <div class="stat-val"><?= $jumlahNegeri ?></div>
        <div class="stat-lbl">SMA Negeri</div>
      </div>
    </div>
    <div class="stat-card">
      <div class="stat-icon si-amber"><i class="fa-solid fa-building-columns"></i></div>
      <div class="stat-body">
        <div class="stat-val"><?= $jumlahSwasta ?></div>
        <div class="stat-lbl">SMA Swasta</div>
      </div>
    </div>
    <div class="stat-card">
      <div class="stat-icon si-violet"><i class="fa-solid fa-database"></i></div>
      <div class="stat-body">
        <div class="stat-val"><?= $queryTime ?>ms</div>
        <div class="stat-lbl">Query Time</div>
      </div>
    </div>
  </div>

  <?php if ($dbError): ?>
  <!-- ====== DB ERROR STATE ====== -->
  <div class="table-card reveal rd1">
    <div class="state-box">
      <div class="state-icon err"><i class="fa-solid fa-triangle-exclamation"></i></div>
      <div class="state-title">Koneksi Database Gagal</div>
      <p class="state-desc">
        Tidak dapat terhubung ke server PostgreSQL. Pastikan PostgreSQL berjalan, database <strong>db_sig_sma</strong> sudah dibuat, dan kredensial sudah benar.
      </p>
      <div class="state-code"><?= htmlspecialchars($dbError) ?></div>
    </div>
  </div>

  <?php elseif (empty($sekolah)): ?>
  <!-- ====== EMPTY STATE ====== -->
  <div class="table-card reveal rd1">
    <div class="state-box">
      <div class="state-icon empty"><i class="fa-solid fa-inbox"></i></div>
      <div class="state-title">Tabel Kosong</div>
      <p class="state-desc">
        Koneksi berhasil, namun tabel <code>tabel_sekolah</code> belum memiliki data. Import data dari file <code>db_sig_sma.sql</code> terlebih dahulu.
      </p>
    </div>
  </div>

  <?php else: ?>
  <!-- ====== DATA TABLE ====== -->

  <!-- TOOLBAR -->
  <div class="toolbar reveal rd1">
    <div class="search-box">
      <i class="fa-solid fa-magnifying-glass"></i>
      <input type="text" id="search-input" placeholder="Cari nama sekolah…" autocomplete="off">
    </div>

    <div class="filter-btns">
      <button class="filter-btn active" data-filter="all">Semua</button>
      <button class="filter-btn g"   data-filter="negeri">Negeri</button>
      <button class="filter-btn a"   data-filter="swasta">Swasta</button>
    </div>

    <div class="row-count">Menampilkan <span id="visible-count"><?= $totalSMA ?></span> dari <?= $totalSMA ?> data</div>
  </div>

  <!-- TABLE -->
  <div class="table-card reveal rd2">
    <div class="table-wrap">
      <table class="data-table" id="data-table">
        <thead>
          <tr>
            <th class="col-no">#</th>
            <th data-col="name"><div class="th-inner">Nama Sekolah <i class="fa-solid fa-sort"></i></div></th>
            <th data-col="type"><div class="th-inner">Tipe</div></th>
            <th data-col="kota"><div class="th-inner">Kota <i class="fa-solid fa-sort"></i></div></th>
            <th data-col="lat"><div class="th-inner">Lintang <i class="fa-solid fa-sort"></i></div></th>
            <th data-col="lng"><div class="th-inner">Bujur <i class="fa-solid fa-sort"></i></div></th>
            <th style="width:80px;text-align:center;">Aksi</th>
          </tr>
        </thead>
        <tbody id="table-body">
          <?php foreach ($sekolah as $i => $s):
            $nama   = htmlspecialchars($s['name'] ?? 'Tanpa Nama');
            $kota   = htmlspecialchars($s['kota'] ?? 'Bandar Lampung');
            $lat    = number_format((float)$s['lat'], 6, '.', '');
            $lng    = number_format((float)$s['lng'], 6, '.', '');
            $isNegeri = (stripos($s['name'], 'SMAN') !== false || stripos($s['name'], 'SMA N ') !== false);
            $typeCls  = $isNegeri ? 'negeri' : 'swasta';
            $typeLabel = $isNegeri ? 'Negeri' : 'Swasta';
            $typeIcon  = $isNegeri ? 'fa-landmark-flag' : 'fa-building-columns';
            $mapUrl = "peta.php";
          ?>
          <tr data-name="<?= strtolower($nama) ?>" data-type="<?= $typeCls ?>">
            <td class="col-no"><?= $i + 1 ?></td>
            <td class="col-name"><?= $nama ?></td>
            <td class="col-type">
              <span class="type-badge <?= $typeCls ?>">
                <i class="fa-solid <?= $typeIcon ?>" style="font-size:9px;"></i>
                <?= $typeLabel ?>
              </span>
            </td>
            <td class="col-kota"><?= $kota ?></td>
            <td class="col-coord"><?= $lat ?></td>
            <td class="col-coord"><?= $lng ?></td>
            <td>
              <div class="row-actions" style="justify-content:center;">
                <button class="row-btn copy-coord"
                        data-coord="<?= $lat ?>, <?= $lng ?>"
                        data-tip="Salin koordinat"
                        title="Salin koordinat">
                  <i class="fa-solid fa-copy"></i>
                </button>
                <a href="peta.php" class="row-btn" data-tip="Buka peta" title="Buka peta">
                  <i class="fa-solid fa-map-location-dot"></i>
                </a>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- PAGINATION -->
    <div class="pagination" id="pagination-bar">
      <div class="page-info">
        Halaman <span id="cur-page">1</span> dari <span id="total-pages">1</span>
      </div>
      <div class="page-btns" id="page-btns"></div>
    </div>
  </div>

  <?php endif; ?>

</div><!-- /main-wrap -->

<!-- ============================================================
     FOOTER
     ============================================================ -->
<footer class="ef">
  <div class="ef-inner">
    <div class="ef-brand">
      <div class="ef-brand-icon"><i class="fa-solid fa-map-location-dot"></i></div>
      <div>
        <div class="ef-brand-name">WebGIS SMA Bandar Lampung</div>
        <div class="ef-brand-sub">Sistem Informasi Geografis · 2026</div>
      </div>
    </div>
    <nav class="ef-links">
      <a href="index.php">Beranda</a>
      <a href="peta.php">Peta</a>
      <a href="analisis.php">Analisis</a>
      <a href="data-sekolah.php">Data</a>
    </nav>
    <div class="ef-copy">&copy; 2026 All Rights Reserved.</div>
  </div>
</footer>

<!-- ============================================================
     SCRIPTS
     ============================================================ -->
<script>
/* ---------- Scroll Reveal ---------- */
const revEls = document.querySelectorAll('.reveal');
new IntersectionObserver((entries) => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); } });
}, { threshold: 0.08 }).observe
? (() => { const io = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); } });
  }, { threshold: 0.08 }); revEls.forEach(el => io.observe(el)); })()
: revEls.forEach(el => el.classList.add('visible'));

<?php if (!$dbError && !empty($sekolah)): ?>

/* ---------- Table Engine ---------- */
const ROWS_PER_PAGE = 15;
const tbody   = document.getElementById('table-body');
const allRows = Array.from(tbody.querySelectorAll('tr'));
const searchInput  = document.getElementById('search-input');
const filterBtns   = document.querySelectorAll('.filter-btn');
const visibleCount = document.getElementById('visible-count');
const curPageEl    = document.getElementById('cur-page');
const totalPagesEl = document.getElementById('total-pages');
const pageBtns     = document.getElementById('page-btns');

let currentFilter = 'all';
let currentSearch = '';
let currentPage   = 1;
let sortCol       = 'name';
let sortAsc       = true;

function getFilteredRows() {
  return allRows.filter(row => {
    const nameMatch = row.dataset.name.includes(currentSearch.toLowerCase());
    const typeMatch = currentFilter === 'all' || row.dataset.type === currentFilter;
    return nameMatch && typeMatch;
  });
}

function renderTable() {
  const filtered = getFilteredRows();
  const totalPages = Math.max(1, Math.ceil(filtered.length / ROWS_PER_PAGE));
  currentPage = Math.min(currentPage, totalPages);

  const start = (currentPage - 1) * ROWS_PER_PAGE;
  const end   = start + ROWS_PER_PAGE;

  /* Update row numbering & visibility */
  let visNo = 1;
  allRows.forEach(row => {
    const inFiltered = filtered.includes(row);
    const inPage     = inFiltered && filtered.indexOf(row) >= start && filtered.indexOf(row) < end;
    row.style.display = inPage ? '' : 'none';
    if (inPage) {
      row.querySelector('.col-no').textContent = start + visNo++;
    }
  });

  visibleCount.textContent = filtered.length;
  curPageEl.textContent    = currentPage;
  totalPagesEl.textContent = totalPages;

  renderPagination(totalPages);
}

function renderPagination(total) {
  pageBtns.innerHTML = '';

  const mkBtn = (label, page, active, disabled) => {
    const b = document.createElement('button');
    b.className = 'page-btn' + (active ? ' active' : '');
    b.textContent = label;
    b.disabled = disabled;
    if (!disabled) b.addEventListener('click', () => { currentPage = page; renderTable(); });
    return b;
  };

  pageBtns.appendChild(mkBtn('‹', currentPage - 1, false, currentPage === 1));

  /* Show max 7 page buttons */
  let pages = [];
  if (total <= 7) {
    pages = Array.from({length: total}, (_, i) => i + 1);
  } else {
    pages = [1];
    if (currentPage > 3) pages.push('…');
    for (let p = Math.max(2, currentPage - 1); p <= Math.min(total - 1, currentPage + 1); p++) pages.push(p);
    if (currentPage < total - 2) pages.push('…');
    pages.push(total);
  }

  pages.forEach(p => {
    if (p === '…') {
      const sp = document.createElement('span');
      sp.textContent = '…'; sp.style.cssText = 'color:var(--text-lo);padding:0 4px;font-size:13px;';
      pageBtns.appendChild(sp);
    } else {
      pageBtns.appendChild(mkBtn(p, p, p === currentPage, false));
    }
  });

  pageBtns.appendChild(mkBtn('›', currentPage + 1, false, currentPage === total));
}

/* Search */
searchInput.addEventListener('input', e => {
  currentSearch = e.target.value.trim();
  currentPage   = 1;
  renderTable();
});

/* Filter buttons */
filterBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    filterBtns.forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    currentFilter = btn.dataset.filter;
    currentPage   = 1;
    renderTable();
  });
});

/* Column sort */
document.querySelectorAll('.data-table th[data-col]').forEach(th => {
  th.addEventListener('click', () => {
    const col = th.dataset.col;
    if (sortCol === col) sortAsc = !sortAsc; else { sortCol = col; sortAsc = true; }

    const sorted = Array.from(allRows).sort((a, b) => {
      let va = '', vb = '';
      if (col === 'name') { va = a.querySelector('.col-name').textContent; vb = b.querySelector('.col-name').textContent; }
      if (col === 'kota') { va = a.querySelector('.col-kota').textContent; vb = b.querySelector('.col-kota').textContent; }
      if (col === 'lat' || col === 'lng') {
        const coords_a = a.querySelectorAll('.col-coord');
        const coords_b = b.querySelectorAll('.col-coord');
        va = col === 'lat' ? parseFloat(coords_a[0].textContent) : parseFloat(coords_a[1].textContent);
        vb = col === 'lat' ? parseFloat(coords_b[0].textContent) : parseFloat(coords_b[1].textContent);
        return sortAsc ? va - vb : vb - va;
      }
      return sortAsc ? va.localeCompare(vb) : vb.localeCompare(va);
    });

    sorted.forEach(row => tbody.appendChild(row));
    currentPage = 1;
    renderTable();
  });
});

/* Copy coordinates */
document.querySelectorAll('.copy-coord').forEach(btn => {
  btn.addEventListener('click', () => {
    navigator.clipboard.writeText(btn.dataset.coord).then(() => {
      btn.classList.add('copied');
      btn.querySelector('i').className = 'fa-solid fa-check';
      setTimeout(() => {
        btn.classList.remove('copied');
        btn.querySelector('i').className = 'fa-solid fa-copy';
      }, 1800);
    });
  });
});

/* Initial render */
renderTable();

<?php endif; ?>
</script>

</body>
</html>