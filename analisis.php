<?php include 'includes/header.php'; ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
/* ============================================================
   ROOT VARIABLES
   ============================================================ */
:root {
  --bg-deep:   #060b18;
  --bg-card:   #0d1527;
  --bg-card2:  #111e35;
  --bg-code:   #080f20;
  --border:    rgba(99,179,237,0.12);
  --border-hi: rgba(99,179,237,0.28);
  --accent:    #3b82f6;
  --accent-2:  #06b6d4;
  --accent-3:  #8b5cf6;
  --green:     #10b981;
  --amber:     #f59e0b;
  --rose:      #f43f5e;
  --text-hi:   #eaf2ff;
  --text-mid:  #8eaed1;
  --text-lo:   #3d5470;
  --radius:    14px;
  --trans:     0.26s cubic-bezier(.22,1,.36,1);
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
  font-family: 'Inter', -apple-system, sans-serif;
  background: var(--bg-deep);
  color: var(--text-hi);
  line-height: 1.6;
  overflow-x: hidden;
}

a { color: inherit; text-decoration: none; }

/* ============================================================
   PAGE HEADER BAND
   ============================================================ */
.page-header {
  position: relative;
  padding: 64px 0 56px;
  border-bottom: 1px solid var(--border);
  overflow: hidden;
}

.page-header::before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse at 20% 50%, rgba(59,130,246,0.07) 0%, transparent 55%),
    radial-gradient(ellipse at 80% 50%, rgba(6,182,212,0.05) 0%, transparent 55%);
  pointer-events: none;
}

/* animated grid lines */
.page-header::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image:
    linear-gradient(rgba(99,179,237,0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(99,179,237,0.04) 1px, transparent 1px);
  background-size: 48px 48px;
  pointer-events: none;
}

.ph-inner {
  position: relative;
  z-index: 1;
  max-width: 1160px;
  margin: 0 auto;
  padding: 0 32px;
}

.ph-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(139,92,246,0.12);
  border: 1px solid rgba(139,92,246,0.28);
  color: #a78bfa;
  font-size: 10.5px;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  padding: 5px 14px;
  border-radius: 20px;
  margin-bottom: 18px;
}

.ph-title {
  font-size: clamp(1.8rem, 3.5vw, 2.8rem);
  font-weight: 900;
  color: var(--text-hi);
  letter-spacing: -0.025em;
  margin-bottom: 12px;
  display: flex;
  align-items: center;
  gap: 14px;
}

.ph-title-icon {
  width: 52px; height: 52px;
  border-radius: 14px;
  background: linear-gradient(135deg, #1d4ed8, #0891b2);
  display: flex; align-items: center; justify-content: center;
  font-size: 22px;
  box-shadow: 0 4px 20px rgba(59,130,246,0.35);
  flex-shrink: 0;
}

.ph-desc {
  font-size: 15px;
  color: var(--text-mid);
  max-width: 600px;
  margin-top: 6px;
}

/* ============================================================
   MAIN LAYOUT
   ============================================================ */
.main-wrap {
  max-width: 1160px;
  margin: 0 auto;
  padding: 52px 32px 80px;
  display: grid;
  grid-template-columns: 1fr 320px;
  gap: 28px;
  align-items: start;
}

@media (max-width: 960px) {
  .main-wrap { grid-template-columns: 1fr; }
  .sidebar-col { order: -1; }
}

/* ============================================================
   SECTION LABEL
   ============================================================ */
.section-label {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 20px;
}

.section-label-icon {
  width: 34px; height: 34px;
  border-radius: 9px;
  display: flex; align-items: center; justify-content: center;
  font-size: 14px;
  flex-shrink: 0;
}

.section-label-icon.green  { background: rgba(16,185,129,0.14); color: #34d399; }
.section-label-icon.orange { background: rgba(245,158,11,0.14);  color: #fbbf24; }
.section-label-icon.blue   { background: rgba(59,130,246,0.14);  color: #60a5fa; }
.section-label-icon.violet { background: rgba(139,92,246,0.14);  color: #a78bfa; }
.section-label-icon.rose   { background: rgba(244,63,94,0.14);   color: #fb7185; }
.section-label-icon.teal   { background: rgba(6,182,212,0.14);   color: #22d3ee; }

.section-label-text h3 {
  font-size: 15.5px;
  font-weight: 700;
  color: var(--text-hi);
  margin-bottom: 1px;
}

.section-label-text p {
  font-size: 11px;
  color: var(--text-lo);
  font-weight: 500;
}

/* ============================================================
   CONTENT CARD (left column blocks)
   ============================================================ */
.content-card {
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  padding: 28px;
  margin-bottom: 20px;
  position: relative;
  overflow: hidden;
  transition: border-color var(--trans);
}

.content-card:hover { border-color: var(--border-hi); }

.content-card::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 2px;
  background: var(--card-accent, linear-gradient(90deg, transparent, transparent));
}

.content-card.accent-green  { --card-accent: linear-gradient(90deg, transparent, #10b981, transparent); }
.content-card.accent-amber  { --card-accent: linear-gradient(90deg, transparent, #f59e0b, transparent); }
.content-card.accent-blue   { --card-accent: linear-gradient(90deg, transparent, #3b82f6, transparent); }
.content-card.accent-violet { --card-accent: linear-gradient(90deg, transparent, #8b5cf6, transparent); }
.content-card.accent-teal   { --card-accent: linear-gradient(90deg, transparent, #06b6d4, transparent); }

.card-body-text {
  font-size: 13.5px;
  color: var(--text-mid);
  line-height: 1.8;
  margin-top: 14px;
}

.card-body-text strong { color: var(--text-hi); }
.card-body-text code {
  background: var(--bg-code);
  border: 1px solid var(--border);
  border-radius: 5px;
  padding: 1px 7px;
  font-size: 12px;
  color: var(--accent-2);
  font-family: 'JetBrains Mono', 'Fira Code', monospace;
}

/* ============================================================
   ZONE CARDS (3-col grid)
   ============================================================ */
.zone-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 12px;
  margin-top: 18px;
}

.zone-card {
  border-radius: 10px;
  padding: 16px 14px;
  border: 1px solid;
  position: relative;
  overflow: hidden;
  transition: transform var(--trans), box-shadow var(--trans);
}

.zone-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

.zone-card.g {
  background: rgba(16,185,129,0.07);
  border-color: rgba(16,185,129,0.25);
}

.zone-card.y {
  background: rgba(245,158,11,0.07);
  border-color: rgba(245,158,11,0.25);
}

.zone-card.r {
  background: rgba(244,63,94,0.07);
  border-color: rgba(244,63,94,0.25);
}

.zone-card-dot {
  width: 28px; height: 28px;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 11px;
  margin-bottom: 10px;
}

.zone-card.g .zone-card-dot { background: rgba(16,185,129,0.2); color: #34d399; box-shadow: 0 0 12px rgba(16,185,129,0.3); }
.zone-card.y .zone-card-dot { background: rgba(245,158,11,0.2);  color: #fbbf24; box-shadow: 0 0 12px rgba(245,158,11,0.3); }
.zone-card.r .zone-card-dot { background: rgba(244,63,94,0.2);   color: #fb7185; box-shadow: 0 0 12px rgba(244,63,94,0.3); }

.zone-card-title {
  font-size: 13px;
  font-weight: 700;
  margin-bottom: 4px;
}

.zone-card.g .zone-card-title { color: #34d399; }
.zone-card.y .zone-card-title { color: #fbbf24; }
.zone-card.r .zone-card-title { color: #fb7185; }

.zone-card-desc {
  font-size: 11.5px;
  color: var(--text-mid);
  line-height: 1.65;
}

/* ============================================================
   PIPELINE STEPS (numbered)
   ============================================================ */
.pipeline-steps {
  display: flex;
  flex-direction: column;
  gap: 0;
  margin-top: 16px;
}

.pipe-item {
  display: flex;
  gap: 16px;
  position: relative;
  padding-bottom: 22px;
}

.pipe-item:last-child { padding-bottom: 0; }

.pipe-item::before {
  content: '';
  position: absolute;
  left: 18px;
  top: 38px;
  bottom: 0;
  width: 1px;
  background: var(--border);
}

.pipe-item:last-child::before { display: none; }

.pipe-num-wrap {
  flex-shrink: 0;
  width: 36px; height: 36px;
  border-radius: 50%;
  border: 1px solid var(--border-hi);
  background: var(--bg-card2);
  display: flex; align-items: center; justify-content: center;
  font-size: 11px;
  font-weight: 800;
  color: var(--accent-2);
  z-index: 1;
  box-shadow: 0 0 12px rgba(6,182,212,0.12);
}

.pipe-content { padding-top: 6px; }
.pipe-title-text { font-size: 13.5px; font-weight: 700; color: var(--text-hi); margin-bottom: 4px; }
.pipe-desc-text  { font-size: 12.5px; color: var(--text-mid); line-height: 1.7; }

/* ============================================================
   PARAMETER TABLE
   ============================================================ */
.param-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 16px;
  font-size: 12.5px;
}

.param-table thead tr {
  background: rgba(59,130,246,0.08);
  border-bottom: 1px solid var(--border-hi);
}

.param-table th {
  padding: 10px 14px;
  text-align: left;
  font-size: 10.5px;
  font-weight: 700;
  color: var(--accent-2);
  letter-spacing: 0.08em;
  text-transform: uppercase;
}

.param-table td {
  padding: 10px 14px;
  color: var(--text-mid);
  border-bottom: 1px solid var(--border);
  vertical-align: top;
  line-height: 1.6;
}

.param-table tr:last-child td { border-bottom: none; }
.param-table tr:hover td { background: rgba(255,255,255,0.02); }
.param-table td:first-child { color: var(--text-hi); font-weight: 600; white-space: nowrap; }

.param-badge {
  display: inline-block;
  padding: 2px 9px;
  border-radius: 20px;
  font-size: 10.5px;
  font-weight: 700;
}

.param-badge.green  { background: rgba(16,185,129,0.15); color: #34d399; border: 1px solid rgba(16,185,129,0.25); }
.param-badge.amber  { background: rgba(245,158,11,0.15);  color: #fbbf24; border: 1px solid rgba(245,158,11,0.25); }
.param-badge.blue   { background: rgba(59,130,246,0.15);  color: #60a5fa; border: 1px solid rgba(59,130,246,0.25); }

/* ============================================================
   SIDEBAR COLUMN
   ============================================================ */
.sidebar-col { display: flex; flex-direction: column; gap: 16px; }

.side-card {
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  overflow: hidden;
  transition: border-color var(--trans);
}

.side-card:hover { border-color: var(--border-hi); }

.side-card-head {
  padding: 14px 18px 12px;
  border-bottom: 1px solid var(--border);
  display: flex;
  align-items: center;
  gap: 10px;
}

.side-card-head-icon {
  width: 28px; height: 28px;
  border-radius: 7px;
  display: flex; align-items: center; justify-content: center;
  font-size: 12px;
  flex-shrink: 0;
}

.side-card-head-icon.blue   { background: rgba(59,130,246,0.15); color: #60a5fa; }
.side-card-head-icon.green  { background: rgba(16,185,129,0.15); color: #34d399; }
.side-card-head-icon.violet { background: rgba(139,92,246,0.15); color: #a78bfa; }
.side-card-head-icon.amber  { background: rgba(245,158,11,0.15);  color: #fbbf24; }

.side-card-head-text {
  font-size: 13px;
  font-weight: 700;
  color: var(--text-hi);
}

.side-card-body { padding: 14px 18px 18px; }

/* KV rows */
.kv-row {
  display: flex;
  flex-direction: column;
  gap: 2px;
  padding: 10px 12px;
  background: var(--bg-card2);
  border: 1px solid var(--border);
  border-radius: 8px;
  margin-bottom: 8px;
  transition: border-color var(--trans);
}

.kv-row:last-child { margin-bottom: 0; }
.kv-row:hover { border-color: var(--border-hi); }

.kv-label { font-size: 10.5px; color: var(--text-lo); font-weight: 600; letter-spacing: 0.06em; text-transform: uppercase; }
.kv-value { font-size: 13.5px; font-weight: 700; color: var(--text-hi); }

/* Source list */
.source-item {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  padding: 10px 0;
  border-bottom: 1px solid var(--border);
}

.source-item:last-child { border-bottom: none; padding-bottom: 0; }

.source-dot {
  width: 8px; height: 8px;
  border-radius: 50%;
  flex-shrink: 0;
  margin-top: 5px;
}

.source-dot.blue   { background: #60a5fa; box-shadow: 0 0 6px rgba(96,165,250,0.5); }
.source-dot.green  { background: #34d399; box-shadow: 0 0 6px rgba(52,211,153,0.5); }
.source-dot.amber  { background: #fbbf24; box-shadow: 0 0 6px rgba(251,191,36,0.5); }
.source-dot.violet { background: #a78bfa; box-shadow: 0 0 6px rgba(167,139,250,0.5); }

.source-text-main { font-size: 12.5px; font-weight: 600; color: var(--text-hi); }
.source-text-sub  { font-size: 11px; color: var(--text-lo); margin-top: 1px; }

/* API Status pill */
.api-status {
  display: flex;
  align-items: center;
  gap: 8px;
  background: rgba(16,185,129,0.08);
  border: 1px solid rgba(16,185,129,0.22);
  border-radius: 8px;
  padding: 10px 12px;
  margin-top: 10px;
}

.api-dot {
  width: 8px; height: 8px;
  border-radius: 50%;
  background: #10b981;
  box-shadow: 0 0 6px rgba(16,185,129,0.7);
  animation: pulse-d 1.5s ease-in-out infinite;
  flex-shrink: 0;
}

@keyframes pulse-d {
  0%,100% { opacity:1; transform: scale(1); }
  50%      { opacity:.4; transform: scale(.7); }
}

.api-status-text { font-size: 12px; color: #34d399; font-weight: 600; }
.api-status-sub  { font-size: 10.5px; color: var(--text-lo); margin-top: 1px; }

/* ============================================================
   FORMULA BLOCK
   ============================================================ */
.formula-block {
  background: var(--bg-code);
  border: 1px solid var(--border-hi);
  border-radius: 10px;
  padding: 18px 20px;
  margin-top: 16px;
  font-family: 'JetBrains Mono', 'Fira Code', 'Courier New', monospace;
  font-size: 13px;
  color: #22d3ee;
  overflow-x: auto;
  position: relative;
}

.formula-label {
  position: absolute;
  top: 10px; right: 12px;
  font-size: 9.5px;
  font-weight: 700;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--text-lo);
  font-family: 'Inter', sans-serif;
}

.formula-comment { color: var(--text-lo); }
.formula-key     { color: #a78bfa; }
.formula-val     { color: #fbbf24; }

/* ============================================================
   FOOTER
   ============================================================ */
footer.ef {
  background: #040810;
  border-top: 1px solid var(--border);
  padding: 36px 32px;
}

.ef-inner {
  max-width: 1160px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 16px;
}

.ef-brand { display: flex; align-items: center; gap: 10px; }
.ef-brand-icon { width: 30px; height: 30px; border-radius: 8px; background: linear-gradient(135deg, #1d4ed8, #0891b2); display:flex; align-items:center; justify-content:center; }
.ef-brand-icon i { color: #fff; font-size: 12px; }
.ef-brand-name { font-size: 13px; font-weight: 700; color: var(--text-hi); }
.ef-brand-sub  { font-size: 10px; color: var(--text-lo); }

.ef-links { display: flex; gap: 22px; }
.ef-links a { font-size: 12px; color: var(--text-lo); transition: color .2s; }
.ef-links a:hover { color: var(--accent-2); }

.ef-copy { font-size: 11px; color: var(--text-lo); }

/* ============================================================
   ANIMATION
   ============================================================ */
.reveal {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.6s ease, transform 0.6s ease;
}
.reveal.visible { opacity: 1; transform: translateY(0); }
.rd1 { transition-delay: 0.08s; }
.rd2 { transition-delay: 0.16s; }
.rd3 { transition-delay: 0.24s; }

/* Scrollbar */
::-webkit-scrollbar { width: 5px; }
::-webkit-scrollbar-track { background: transparent; }
::-webkit-scrollbar-thumb { background: rgba(99,179,237,0.2); border-radius: 4px; }
</style>

<!-- ============================================================
     PAGE HEADER
     ============================================================ -->
<div class="page-header">
  <div class="ph-inner">
    <div class="ph-eyebrow"><i class="fa-solid fa-flask" style="font-size:9px;"></i> Dokumentasi Teknis</div>
    <div class="ph-title">
      <div class="ph-title-icon"><i class="fa-solid fa-chart-line" style="color:#fff;"></i></div>
      Metodologi &amp; Parameter Analisis Spasial
    </div>
    <p class="ph-desc">
      Dokumentasi teknis lengkap pengolahan Sistem Informasi Geografis fasilitas pendidikan SMA Kota Bandar Lampung — mulai dari sumber data, model jaringan jalan, hingga visualisasi isokron dinamis.
    </p>
  </div>
</div>

<!-- ============================================================
     MAIN CONTENT
     ============================================================ -->
<div class="main-wrap">

  <!-- =================== LEFT COLUMN =================== -->
  <div class="main-col">

    <!-- CARD 1: Isochrone Analysis -->
    <div class="content-card accent-green reveal">
      <div class="section-label">
        <div class="section-label-icon green"><i class="fa-solid fa-route"></i></div>
        <div class="section-label-text">
          <h3>Analisis Jangkauan Jalan — Isochrone Network Analysis</h3>
          <p>OpenRouteService API · Driving Car Profile</p>
        </div>
      </div>

      <p class="card-body-text">
        Sistem ini <strong>tidak menggunakan radius lingkaran statis</strong> ("garis lurus udara"), melainkan menerapkan pemodelan analisis jaringan jalan aktual via <strong>OpenRouteService API</strong>. Poligon isokron mencerminkan jangkauan riil kendaraan berdasarkan topologi jaringan jalan yang sebenarnya.
        Setiap sekolah menghasilkan tiga lapisan poligon dengan batasan waktu tempuh berkendara:
      </p>

      <div class="zone-grid">
        <div class="zone-card g">
          <div class="zone-card-dot"><i class="fa-solid fa-check"></i></div>
          <div class="zone-card-title">Zona 3 Menit</div>
          <div class="zone-card-desc">Aksesibilitas sangat tinggi di lingkungan permukiman terdekat sekitar sekolah.</div>
        </div>
        <div class="zone-card y">
          <div class="zone-card-dot"><i class="fa-solid fa-triangle-exclamation"></i></div>
          <div class="zone-card-title">Zona 6 Menit</div>
          <div class="zone-card-desc">Aksesibilitas sedang, menjangkau perimeter sub-kelurahan atau RT/RW terdekat.</div>
        </div>
        <div class="zone-card r">
          <div class="zone-card-dot"><i class="fa-solid fa-xmark"></i></div>
          <div class="zone-card-title">Zona 10 Menit</div>
          <div class="zone-card-desc">Batas ambang bawah aksesibilitas bagi jangkauan harian pelajar berkendara.</div>
        </div>
      </div>

      <!-- ORS Request Formula -->
      <div class="formula-block">
        <span class="formula-label">ORS API · POST body</span>
        <span class="formula-comment">// POST https://api.openrouteservice.org/v2/isochrones/driving-car</span><br>
        {<br>
        &nbsp;&nbsp;<span class="formula-key">"locations"</span>: [[<span class="formula-val">lng</span>, <span class="formula-val">lat</span>]],<br>
        &nbsp;&nbsp;<span class="formula-key">"range"</span>:     [<span class="formula-val">180</span>, <span class="formula-val">360</span>, <span class="formula-val">600</span>],  <span class="formula-comment">// detik</span><br>
        &nbsp;&nbsp;<span class="formula-key">"range_type"</span>: <span class="formula-val">"time"</span>,<br>
        &nbsp;&nbsp;<span class="formula-key">"smoothing"</span>:  <span class="formula-val">3.0</span><br>
        }
      </div>
    </div>

    <!-- CARD 2: Buffer Analysis -->
    <div class="content-card accent-amber reveal rd1">
      <div class="section-label">
        <div class="section-label-icon orange"><i class="fa-solid fa-shapes"></i></div>
        <div class="section-label-text">
          <h3>Buffer Analisis Statis</h3>
          <p>Radius Penyangga Administratif · 3.000 Meter</p>
        </div>
      </div>

      <p class="card-body-text">
        Selain isokron dinamis, sistem memuat representasi spasial berkas <code>buffer.geojson</code> dengan <strong>radius penyangga seragam 3.000 meter</strong> dari titik pusat sekolah. Layer ini berguna untuk mengevaluasi konsentrasi cakupan administratif wilayah pendidikan di mana isokron jalan tidak tersedia.
      </p>

      <div class="formula-block" style="margin-top:16px;">
        <span class="formula-label">GeoJSON · Buffer</span>
        <span class="formula-comment">// Sumber: QGIS Buffer Tool (Vector → Geoprocessing)</span><br>
        <span class="formula-key">Radius</span>    : <span class="formula-val">3000</span> meter (<span class="formula-val">3 km</span>)<br>
        <span class="formula-key">Dissolve</span>  : <span class="formula-val">false</span>  <span class="formula-comment">// per-sekolah</span><br>
        <span class="formula-key">Segments</span>  : <span class="formula-val">32</span>    <span class="formula-comment">// kehalusan poligon</span><br>
        <span class="formula-key">Output CRS</span>: <span class="formula-val">EPSG:4326</span>
      </div>
    </div>

    <!-- CARD 3: Choropleth -->
    <div class="content-card accent-violet reveal rd2">
      <div class="section-label">
        <div class="section-label-icon violet"><i class="fa-solid fa-draw-polygon"></i></div>
        <div class="section-label-text">
          <h3>Peta Tematik Choropleth Kecamatan</h3>
          <p>Indeks Pemerataan Pendidikan · 5 Kelas Warna</p>
        </div>
      </div>

      <p class="card-body-text">
        Poligon kecamatan divisualisasikan menggunakan skema <strong>choropleth</strong> berbasis nilai <code>nilai_pemerataan</code> yang dihitung dari perbandingan jumlah SMA dengan luas wilayah dan populasi usia sekolah per kecamatan. Semakin gelap warnanya, semakin tinggi nilai pemerataan.
      </p>

      <table class="param-table">
        <thead>
          <tr>
            <th>Rentang Nilai</th>
            <th>Kategori</th>
            <th>Warna Fill</th>
            <th>Interpretasi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>&gt; 80</td>
            <td><span class="param-badge green">Sangat Tinggi</span></td>
            <td><code style="color:#006837;">#006837</code></td>
            <td>Pemerataan sangat baik</td>
          </tr>
          <tr>
            <td>61 – 80</td>
            <td><span class="param-badge green">Tinggi</span></td>
            <td><code style="color:#31a354;">#31a354</code></td>
            <td>Distribusi cukup merata</td>
          </tr>
          <tr>
            <td>41 – 60</td>
            <td><span class="param-badge amber">Sedang</span></td>
            <td><code style="color:#78c679;">#78c679</code></td>
            <td>Perlu perhatian minor</td>
          </tr>
          <tr>
            <td>21 – 40</td>
            <td><span class="param-badge amber">Rendah</span></td>
            <td><code style="color:#c2e699;">#c2e699</code></td>
            <td>Perlu intervensi kebijakan</td>
          </tr>
          <tr>
            <td>≤ 20</td>
            <td><span class="param-badge blue">Sangat Rendah</span></td>
            <td><code style="color:#ffffcc;">#ffffcc</code></td>
            <td>Kekurangan fasilitas serius</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- CARD 4: Alur Metodologi -->
    <div class="content-card accent-teal reveal rd3">
      <div class="section-label">
        <div class="section-label-icon teal"><i class="fa-solid fa-diagram-project"></i></div>
        <div class="section-label-text">
          <h3>Alur Metodologi Pengolahan</h3>
          <p>End-to-end pipeline dari data mentah ke visualisasi</p>
        </div>
      </div>

      <div class="pipeline-steps">
        <div class="pipe-item">
          <div class="pipe-num-wrap">01</div>
          <div class="pipe-content">
            <div class="pipe-title-text">Pengumpulan Data Lapangan</div>
            <p class="pipe-desc-text">Koordinat GPS lokasi SMA dikumpulkan dari survei lapangan dan cross-check dengan data resmi Dinas Pendidikan Kota Bandar Lampung serta Kemendikbud.</p>
          </div>
        </div>
        <div class="pipe-item">
          <div class="pipe-num-wrap">02</div>
          <div class="pipe-content">
            <div class="pipe-title-text">Preprocessing &amp; Validasi QGIS</div>
            <p class="pipe-desc-text">Data diunggah ke QGIS untuk validasi CRS, pembersihan duplikat, dan pembuatan layer <code>kecamatan.geojson</code> dengan atribut nilai pemerataan.</p>
          </div>
        </div>
        <div class="pipe-item">
          <div class="pipe-num-wrap">03</div>
          <div class="pipe-content">
            <div class="pipe-title-text">Export &amp; Normalisasi GeoJSON</div>
            <p class="pipe-desc-text">Semua layer diekspor ke format <code>.geojson</code> ber-proyeksi <strong>WGS 84 (EPSG:4326)</strong> agar kompatibel langsung dengan Leaflet.js.</p>
          </div>
        </div>
        <div class="pipe-item">
          <div class="pipe-num-wrap">04</div>
          <div class="pipe-content">
            <div class="pipe-title-text">Integrasi ORS API (Realtime)</div>
            <p class="pipe-desc-text">Saat peta dimuat, tiap titik SMA memanggil ORS API secara paralel untuk menghasilkan poligon isokron 3/6/10 menit berkendara secara realtime.</p>
          </div>
        </div>
        <div class="pipe-item">
          <div class="pipe-num-wrap">05</div>
          <div class="pipe-content">
            <div class="pipe-title-text">Visualisasi &amp; Layer Control</div>
            <p class="pipe-desc-text">Hasil ditampilkan di atas tile OSM / Esri Satellite dengan kontrol layer sidebar: toggle zona warna, toggle marker, dan pencarian autocomplete.</p>
          </div>
        </div>
      </div>
    </div>

  </div><!-- /main-col -->

  <!-- =================== RIGHT SIDEBAR =================== -->
  <div class="sidebar-col">

    <!-- Data Integrity Card -->
    <div class="side-card reveal">
      <div class="side-card-head">
        <div class="side-card-head-icon blue"><i class="fa-solid fa-shield-halved"></i></div>
        <div class="side-card-head-text">Integritas Data Spasial</div>
      </div>
      <div class="side-card-body">
        <div class="kv-row">
          <span class="kv-label">Sistem Koordinat (CRS)</span>
          <span class="kv-value">WGS 84 / EPSG:4326</span>
        </div>
        <div class="kv-row">
          <span class="kv-label">Sampel Entitas Valid</span>
          <span class="kv-value">71 Titik Koordinat SMA</span>
        </div>
        <div class="kv-row">
          <span class="kv-label">Jumlah Kecamatan</span>
          <span class="kv-value">20 Kecamatan</span>
        </div>
        <div class="kv-row">
          <span class="kv-label">Format Vektor</span>
          <span class="kv-value">GeoJSON (RFC 7946)</span>
        </div>
        <div class="kv-row">
          <span class="kv-label">Kategori Filter</span>
          <span class="kv-value">SMA Negeri &amp; Swasta</span>
        </div>
        <div class="kv-row">
          <span class="kv-label">Tools Pengolahan</span>
          <span class="kv-value">QGIS 3.x · MySQL 8</span>
        </div>
      </div>
    </div>

    <!-- API Status Card -->
    <div class="side-card reveal rd1">
      <div class="side-card-head">
        <div class="side-card-head-icon green"><i class="fa-solid fa-plug"></i></div>
        <div class="side-card-head-text">Status API &amp; Layanan</div>
      </div>
      <div class="side-card-body">
        <div class="api-status">
          <div class="api-dot"></div>
          <div>
            <div class="api-status-text">OpenRouteService · Aktif</div>
            <div class="api-status-sub">driving-car · isochrones/v2</div>
          </div>
        </div>
        <div class="kv-row" style="margin-top:10px;">
          <span class="kv-label">Rate Limit</span>
          <span class="kv-value">500 req / hari (Free Tier)</span>
        </div>
        <div class="kv-row">
          <span class="kv-label">Smoothing Factor</span>
          <span class="kv-value">3.0 (polygon)</span>
        </div>
        <div class="kv-row">
          <span class="kv-label">Profile</span>
          <span class="kv-value">driving-car</span>
        </div>
      </div>
    </div>

    <!-- Sumber Data Card -->
    <div class="side-card reveal rd2">
      <div class="side-card-head">
        <div class="side-card-head-icon violet"><i class="fa-solid fa-database"></i></div>
        <div class="side-card-head-text">Sumber Data</div>
      </div>
      <div class="side-card-body">
        <div class="source-item">
          <div class="source-dot blue"></div>
          <div>
            <div class="source-text-main">Dinas Pendidikan Kota BL</div>
            <div class="source-text-sub">Data resmi titik koordinat SMA</div>
          </div>
        </div>
        <div class="source-item">
          <div class="source-dot green"></div>
          <div>
            <div class="source-text-main">OpenStreetMap Contributors</div>
            <div class="source-text-sub">Basemap &amp; jaringan jalan ORS</div>
          </div>
        </div>
        <div class="source-item">
          <div class="source-dot amber"></div>
          <div>
            <div class="source-text-main">BPS Kota Bandar Lampung</div>
            <div class="source-text-sub">Data batas kecamatan &amp; populasi</div>
          </div>
        </div>
        <div class="source-item">
          <div class="source-dot violet"></div>
          <div>
            <div class="source-text-main">Esri World Imagery</div>
            <div class="source-text-sub">Citra satelit basemap alternatif</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Quick Nav Card -->
    <div class="side-card reveal rd3">
      <div class="side-card-head">
        <div class="side-card-head-icon amber"><i class="fa-solid fa-arrow-pointer"></i></div>
        <div class="side-card-head-text">Navigasi Cepat</div>
      </div>
      <div class="side-card-body" style="display:flex;flex-direction:column;gap:8px;">
        <a href="peta.php" style="display:flex;align-items:center;gap:10px;padding:11px 13px;background:var(--bg-card2);border:1px solid var(--border);border-radius:9px;transition:border-color .2s,background .2s;font-size:13px;font-weight:600;color:var(--text-hi);" onmouseover="this.style.borderColor='var(--border-hi)';this.style.background='rgba(59,130,246,0.08)'" onmouseout="this.style.borderColor='var(--border)';this.style.background='var(--bg-card2)'">
          <i class="fa-solid fa-map" style="color:#60a5fa;width:16px;text-align:center;"></i>
          Buka Peta Interaktif
          <i class="fa-solid fa-arrow-right" style="margin-left:auto;color:var(--text-lo);font-size:11px;"></i>
        </a>
        <a href="data-sekolah.php" style="display:flex;align-items:center;gap:10px;padding:11px 13px;background:var(--bg-card2);border:1px solid var(--border);border-radius:9px;transition:border-color .2s,background .2s;font-size:13px;font-weight:600;color:var(--text-hi);" onmouseover="this.style.borderColor='var(--border-hi)';this.style.background='rgba(16,185,129,0.08)'" onmouseout="this.style.borderColor='var(--border)';this.style.background='var(--bg-card2)'">
          <i class="fa-solid fa-table" style="color:#34d399;width:16px;text-align:center;"></i>
          Data Tabel Sekolah
          <i class="fa-solid fa-arrow-right" style="margin-left:auto;color:var(--text-lo);font-size:11px;"></i>
        </a>
        <a href="index.php" style="display:flex;align-items:center;gap:10px;padding:11px 13px;background:var(--bg-card2);border:1px solid var(--border);border-radius:9px;transition:border-color .2s,background .2s;font-size:13px;font-weight:600;color:var(--text-hi);" onmouseover="this.style.borderColor='var(--border-hi)';this.style.background='rgba(139,92,246,0.08)'" onmouseout="this.style.borderColor='var(--border)';this.style.background='var(--bg-card2)'">
          <i class="fa-solid fa-house" style="color:#a78bfa;width:16px;text-align:center;"></i>
          Kembali ke Beranda
          <i class="fa-solid fa-arrow-right" style="margin-left:auto;color:var(--text-lo);font-size:11px;"></i>
        </a>
      </div>
    </div>

  </div><!-- /sidebar-col -->

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

<script>
/* Intersection Observer scroll reveal */
const reveals = document.querySelectorAll('.reveal');
const obs = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if (e.isIntersecting) { e.target.classList.add('visible'); obs.unobserve(e.target); }
  });
}, { threshold: 0.10 });
reveals.forEach(el => obs.observe(el));
</script>

</body>
</html>