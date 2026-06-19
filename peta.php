<?php include 'includes/header.php'; ?>

<style>
/* ============================================================
   ENTERPRISE SIDEBAR MAP — VARIABLES
   ============================================================ */
:root {
  --sb-width: 270px;
  --nav-h: 64px;
  --bg-deep:    #080d1a;
  --bg-panel:   #0d1527;
  --bg-section: #111b30;
  --border:     rgba(99, 179, 237, 0.12);
  --border-hi:  rgba(99, 179, 237, 0.30);
  --accent:     #3b82f6;
  --accent-2:   #06b6d4;
  --accent-3:   #8b5cf6;
  --text-hi:    #eaf2ff;
  --text-mid:   #90aece;
  --text-lo:    #4e6a8a;
  --shadow-sm:  0 2px 12px rgba(0,0,0,0.4);
  --shadow-lg:  0 8px 36px rgba(0,0,0,0.55);
  --radius-sm:  8px;
  --radius-md:  12px;
  --radius-lg:  16px;
  --transition: 0.22s cubic-bezier(.22,1,.36,1);
}

/* ============================================================
   RESET & BODY
   ============================================================ */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
  font-family: 'Inter', -apple-system, sans-serif;
  background: var(--bg-deep);
  color: var(--text-hi);
  height: 100vh;
  overflow: hidden;
}

/* ============================================================
   PAGE LAYOUT: sidebar + map
   ============================================================ */
#page-layout {
  display: flex;
  height: calc(100vh - var(--nav-h));
  overflow: hidden;
}

/* ============================================================
   SIDEBAR
   ============================================================ */
#sidebar {
  width: var(--sb-width);
  min-width: var(--sb-width);
  background: var(--bg-panel);
  border-right: 1px solid var(--border);
  display: flex;
  flex-direction: column;
  overflow: hidden;
  box-shadow: 4px 0 24px rgba(0,0,0,0.35);
  z-index: 10;
  animation: slideInLeft 0.4s var(--transition) both;
}

/* --- Sidebar Brand Header --- */
.sb-brand {
  padding: 16px 16px 12px;
  border-bottom: 1px solid var(--border);
  display: flex;
  align-items: center;
  gap: 11px;
  flex-shrink: 0;
}

.sb-brand-icon {
  width: 38px;
  height: 38px;
  border-radius: 11px;
  background: linear-gradient(135deg, #1d4ed8 0%, #0891b2 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 3px 12px rgba(59,130,246,0.4);
  flex-shrink: 0;
}

.sb-brand-icon i { color: #fff; font-size: 15px; }

.sb-brand-info h3 {
  font-size: 13.5px;
  font-weight: 700;
  color: var(--text-hi);
  letter-spacing: 0.01em;
}

.sb-brand-info p {
  font-size: 10px;
  color: var(--text-lo);
  margin-top: 2px;
}

/* --- Sidebar Scrollable Body --- */
.sb-body {
  flex: 1;
  overflow-y: auto;
  overflow-x: hidden;
  padding: 10px 0 20px;
}

.sb-body::-webkit-scrollbar { width: 3px; }
.sb-body::-webkit-scrollbar-track { background: transparent; }
.sb-body::-webkit-scrollbar-thumb { background: rgba(99,179,237,0.2); border-radius: 4px; }

/* --- Section Label --- */
.sb-section-label {
  padding: 14px 16px 6px;
  font-size: 9.5px;
  font-weight: 700;
  color: var(--text-lo);
  letter-spacing: 0.12em;
  text-transform: uppercase;
  display: flex;
  align-items: center;
  gap: 7px;
}

.sb-section-label::after {
  content: '';
  flex: 1;
  height: 1px;
  background: var(--border);
}

/* ============================================================
   SEARCH BOX
   ============================================================ */
.sb-search-wrap {
  padding: 4px 14px 8px;
  position: relative;
}

.sb-search-box {
  display: flex;
  align-items: center;
  gap: 9px;
  background: var(--bg-section);
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  padding: 9px 12px;
  transition: border-color var(--transition), box-shadow var(--transition);
}

.sb-search-box:focus-within {
  border-color: var(--accent);
  box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
}

.sb-search-box i { color: var(--accent-2); font-size: 13px; flex-shrink: 0; }

#search-sekolah {
  background: transparent;
  border: none;
  outline: none;
  color: var(--text-hi);
  font-size: 12.5px;
  width: 100%;
  font-family: 'Inter', sans-serif;
}

#search-sekolah::placeholder { color: var(--text-lo); }

/* Search Results (drops down within sidebar, not floating) */
#search-results {
  position: absolute;
  top: calc(100% - 2px);
  left: 14px;
  right: 14px;
  background: #0e1b35;
  border: 1px solid var(--border-hi);
  border-top: none;
  border-radius: 0 0 var(--radius-md) var(--radius-md);
  max-height: 220px;
  overflow-y: auto;
  z-index: 50;
  box-shadow: var(--shadow-lg);
}

#search-results.hidden { display: none; }

#search-results::-webkit-scrollbar { width: 3px; }
#search-results::-webkit-scrollbar-thumb { background: rgba(99,179,237,0.2); border-radius: 4px; }

.sr-item {
  padding: 9px 13px;
  font-size: 12px;
  color: var(--text-mid);
  cursor: pointer;
  border-bottom: 1px solid rgba(99,179,237,0.06);
  display: flex;
  align-items: center;
  gap: 9px;
  transition: background 0.15s, color 0.15s;
}

.sr-item:last-child { border-bottom: none; }

.sr-item:hover {
  background: rgba(59,130,246,0.12);
  color: var(--text-hi);
}

.sr-item i { color: var(--accent-2); font-size: 11px; width: 14px; text-align: center; }

/* ============================================================
   ZONE TOGGLE SECTION
   ============================================================ */
.zone-list { padding: 4px 14px 2px; display: flex; flex-direction: column; gap: 4px; }

.zone-row {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 9px 11px;
  border-radius: var(--radius-sm);
  cursor: pointer;
  transition: background var(--transition);
  user-select: none;
}

.zone-row:hover { background: rgba(255,255,255,0.04); }

/* Custom toggle switch */
.zone-toggle {
  appearance: none;
  -webkit-appearance: none;
  width: 38px;
  height: 21px;
  border-radius: 11px;
  background: rgba(255,255,255,0.08);
  border: 1px solid rgba(255,255,255,0.14);
  cursor: pointer;
  position: relative;
  flex-shrink: 0;
  transition: background 0.28s, border-color 0.28s;
}

.zone-toggle::before {
  content: '';
  position: absolute;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  top: 2px;
  left: 2px;
  background: rgba(255,255,255,0.4);
  transition: transform 0.28s cubic-bezier(.22,1,.36,1), background 0.28s;
  box-shadow: 0 1px 4px rgba(0,0,0,0.3);
}

.zone-toggle:checked::before {
  transform: translateX(17px);
  background: #fff;
}

.zone-toggle:checked { border-color: transparent; }

/* Zone-specific colors */
#chk-hijau:checked  { background: #10b981; box-shadow: 0 0 8px rgba(16,185,129,0.4); }
#chk-kuning:checked { background: #f59e0b; box-shadow: 0 0 8px rgba(245,158,11,0.4); }
#chk-merah:checked  { background: #f43f5e; box-shadow: 0 0 8px rgba(244,63,94,0.4); }

/* Zone color dot with glow */
.zone-dot {
  width: 9px;
  height: 9px;
  border-radius: 50%;
  flex-shrink: 0;
}

.zone-dot.g { background: #10b981; box-shadow: 0 0 5px 1px rgba(16,185,129,0.55); }
.zone-dot.y { background: #f59e0b; box-shadow: 0 0 5px 1px rgba(245,158,11,0.55); }
.zone-dot.r { background: #f43f5e; box-shadow: 0 0 5px 1px rgba(244,63,94,0.55); }

.zone-text { flex: 1; }
.zone-text-main { font-size: 12px; font-weight: 600; color: var(--text-hi); display: block; }
.zone-text-sub  { font-size: 10px; color: var(--text-lo); display: block; }

/* ============================================================
   MARKER TOGGLE
   ============================================================ */
.marker-row {
  margin: 4px 14px 0;
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 9px 11px;
  border-radius: var(--radius-sm);
  cursor: pointer;
  transition: background var(--transition);
  user-select: none;
}

.marker-row:hover { background: rgba(255,255,255,0.04); }

/* Reuse zone-toggle style for marker toggle */
.marker-toggle {
  appearance: none;
  -webkit-appearance: none;
  width: 38px;
  height: 21px;
  border-radius: 11px;
  background: rgba(255,255,255,0.08);
  border: 1px solid rgba(255,255,255,0.14);
  cursor: pointer;
  position: relative;
  flex-shrink: 0;
  transition: background 0.28s, border-color 0.28s;
}

.marker-toggle::before {
  content: '';
  position: absolute;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  top: 2px;
  left: 2px;
  background: rgba(255,255,255,0.4);
  transition: transform 0.28s cubic-bezier(.22,1,.36,1), background 0.28s;
  box-shadow: 0 1px 4px rgba(0,0,0,0.3);
}

.marker-toggle:checked {
  background: #3b82f6;
  border-color: transparent;
  box-shadow: 0 0 8px rgba(59,130,246,0.4);
}

.marker-toggle:checked::before {
  transform: translateX(17px);
  background: #fff;
}

.marker-icon-badge {
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: #0056b3;
  border: 2px solid #fff;
  flex-shrink: 0;
  box-shadow: 0 0 6px rgba(0,86,179,0.6);
}

/* ============================================================
   BASEMAP SECTION
   ============================================================ */
.basemap-list {
  padding: 4px 14px 6px;
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.basemap-btn {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 9px 12px;
  border-radius: var(--radius-sm);
  border: 1px solid transparent;
  background: transparent;
  color: var(--text-mid);
  font-size: 12px;
  font-weight: 500;
  font-family: 'Inter', sans-serif;
  cursor: pointer;
  transition: all var(--transition);
  text-align: left;
  width: 100%;
}

.basemap-btn i { width: 16px; text-align: center; font-size: 13px; color: var(--text-lo); transition: color var(--transition); }

.basemap-btn:hover {
  background: rgba(255,255,255,0.04);
  color: var(--text-hi);
}

.basemap-btn.active {
  background: rgba(59,130,246,0.14);
  border-color: rgba(59,130,246,0.3);
  color: #60a5fa;
}

.basemap-btn.active i { color: var(--accent-2); }

.basemap-preview {
  width: 28px;
  height: 20px;
  border-radius: 4px;
  overflow: hidden;
  flex-shrink: 0;
  border: 1px solid rgba(255,255,255,0.1);
}

/* ============================================================
   STATS SECTION
   ============================================================ */
.stats-grid {
  padding: 4px 14px 6px;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 7px;
}

.stat-card {
  background: var(--bg-section);
  border: 1px solid var(--border);
  border-radius: var(--radius-sm);
  padding: 10px 10px 8px;
  display: flex;
  flex-direction: column;
  gap: 4px;
  transition: border-color var(--transition);
}

.stat-card:hover { border-color: var(--border-hi); }

.stat-card-top {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.stat-icon {
  width: 22px;
  height: 22px;
  border-radius: 6px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 10px;
  flex-shrink: 0;
}

.stat-icon.blue   { background: rgba(59,130,246,0.18); color: #60a5fa; }
.stat-icon.teal   { background: rgba(6,182,212,0.18);  color: #22d3ee; }
.stat-icon.violet { background: rgba(139,92,246,0.18); color: #a78bfa; }
.stat-icon.amber  { background: rgba(245,158,11,0.18); color: #fbbf24; }

.stat-value {
  font-size: 20px;
  font-weight: 700;
  color: var(--text-hi);
  line-height: 1;
  letter-spacing: -0.02em;
}

.stat-label {
  font-size: 9.5px;
  color: var(--text-lo);
  letter-spacing: 0.04em;
  font-weight: 500;
}

/* Loading dot for stat */
.stat-dot {
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #10b981;
  animation: pulse-dot 1.5s ease-in-out infinite;
}

@keyframes pulse-dot {
  0%, 100% { opacity: 1; transform: scale(1); }
  50%       { opacity: 0.4; transform: scale(0.7); }
}

/* ============================================================
   SIDEBAR FOOTER
   ============================================================ */
.sb-footer {
  padding: 12px 16px;
  border-top: 1px solid var(--border);
  flex-shrink: 0;
  display: flex;
  align-items: center;
  gap: 8px;
}

.sb-footer-dot {
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #10b981;
  box-shadow: 0 0 6px rgba(16,185,129,0.7);
  animation: pulse-dot 2s ease-in-out infinite;
  flex-shrink: 0;
}

.sb-footer-text { font-size: 10px; color: var(--text-lo); line-height: 1.5; }
.sb-footer-text span { color: var(--accent-2); font-weight: 600; }

/* ============================================================
   MAP AREA
   ============================================================ */
#map-area {
  flex: 1;
  position: relative;
  overflow: hidden;
  background: #0a0f1e;
}

#map {
  width: 100%;
  height: 100%;
  z-index: 1;
}

/* Subtle vignette on map edges */
#map-area::after {
  content: '';
  position: absolute;
  inset: 0;
  pointer-events: none;
  background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.06) 0%, transparent 55%);
  z-index: 900;
}

/* ============================================================
   LOADING TOAST (center-bottom of map area)
   ============================================================ */
#map-loading {
  position: absolute;
  bottom: 32px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 1200;
  background: rgba(8,13,26,0.88);
  border: 1px solid var(--border-hi);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  border-radius: 24px;
  padding: 8px 18px;
  display: flex;
  align-items: center;
  gap: 10px;
  color: var(--text-mid);
  font-size: 12px;
  box-shadow: var(--shadow-lg);
  transition: opacity 0.4s, transform 0.4s;
  white-space: nowrap;
}

#map-loading.hidden {
  opacity: 0;
  pointer-events: none;
  transform: translateX(-50%) translateY(8px);
}

.spinner {
  width: 15px;
  height: 15px;
  border: 2px solid rgba(99,179,237,0.2);
  border-top-color: var(--accent-2);
  border-radius: 50%;
  animation: spin 0.75s linear infinite;
  flex-shrink: 0;
}

/* ============================================================
   LEAFLET OVERRIDES
   ============================================================ */
.leaflet-control-zoom {
  border: none !important;
  border-radius: var(--radius-md) !important;
  overflow: hidden;
  box-shadow: var(--shadow-lg) !important;
}

.leaflet-control-zoom a {
  background: rgba(8,13,26,0.85) !important;
  backdrop-filter: blur(12px) !important;
  -webkit-backdrop-filter: blur(12px) !important;
  color: var(--text-hi) !important;
  border: 1px solid var(--border) !important;
  border-radius: 0 !important;
  width: 34px !important;
  height: 34px !important;
  line-height: 34px !important;
  font-size: 18px !important;
  transition: background 0.15s !important;
}

.leaflet-control-zoom a:hover {
  background: rgba(59,130,246,0.2) !important;
  color: var(--accent-2) !important;
}

.leaflet-control-attribution {
  background: rgba(8,13,26,0.75) !important;
  backdrop-filter: blur(8px) !important;
  color: var(--text-lo) !important;
  font-size: 9.5px !important;
  border: none !important;
  border-radius: 6px 0 0 0 !important;
}

.leaflet-control-attribution a { color: var(--accent-2) !important; }

.leaflet-popup-content-wrapper {
  background: rgba(8,13,26,0.94) !important;
  border: 1px solid var(--border-hi) !important;
  border-radius: var(--radius-md) !important;
  box-shadow: var(--shadow-lg) !important;
  color: var(--text-hi) !important;
  backdrop-filter: blur(14px) !important;
  -webkit-backdrop-filter: blur(14px) !important;
}

.leaflet-popup-content { font-size: 13px; line-height: 1.6; margin: 12px 15px; }
.leaflet-popup-content b { color: #60a5fa; font-weight: 700; display: block; margin-bottom: 3px; }
.leaflet-popup-tip { background: rgba(8,13,26,0.94) !important; }
.leaflet-popup-close-button { color: var(--text-lo) !important; top: 8px !important; right: 10px !important; font-size: 18px !important; }

/* Hide the default Leaflet layers control widget */
.leaflet-control-layers { display: none !important; }

/* ============================================================
   KEYFRAMES
   ============================================================ */
@keyframes spin {
  to { transform: rotate(360deg); }
}

@keyframes slideInLeft {
  from { opacity: 0; transform: translateX(-16px); }
  to   { opacity: 1; transform: translateX(0); }
}
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- ============================================================
     PAGE LAYOUT
     ============================================================ -->
<div id="page-layout">

  <!-- ==================== SIDEBAR ==================== -->
  <aside id="sidebar">

    <!-- Brand -->
    <div class="sb-brand">
      <div class="sb-brand-icon">
        <i class="fa-solid fa-map-location-dot"></i>
      </div>
      <div class="sb-brand-info">
        <h3>Peta Interaktif</h3>
        <p>SMA Bandar Lampung · WebGIS</p>
      </div>
    </div>

    <div class="sb-body">

      <!-- ===== SEARCH ===== -->
      <div class="sb-section-label"><i class="fa-solid fa-magnifying-glass" style="font-size:9px;"></i> Pencarian</div>
      <div class="sb-search-wrap">
        <div class="sb-search-box">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" id="search-sekolah"
                 placeholder="Cari nama SMA…"
                 autocomplete="off">
        </div>
        <!-- ⚠️ CRITICAL: id="search-results" dipakai oleh app.js — JANGAN UBAH -->
        <div id="search-results" class="hidden"></div>
      </div>

      <!-- ===== ZONA AKSESIBILITAS ===== -->
      <div class="sb-section-label"><i class="fa-solid fa-circle-nodes" style="font-size:9px;"></i> Zona Aksesibilitas</div>
      <div class="zone-list">

        <!-- ⚠️ CRITICAL: id="chk-hijau" dipakai app.js event listener — JANGAN UBAH -->
        <label class="zone-row" for="chk-hijau">
          <input type="checkbox" id="chk-hijau" class="zone-toggle" checked>
          <span class="zone-dot g"></span>
          <span class="zone-text">
            <span class="zone-text-main">Mudah</span>
            <span class="zone-text-sub">≤ 3 Menit Berkendara</span>
          </span>
        </label>

        <!-- ⚠️ CRITICAL: id="chk-kuning" dipakai app.js event listener — JANGAN UBAH -->
        <label class="zone-row" for="chk-kuning">
          <input type="checkbox" id="chk-kuning" class="zone-toggle" checked>
          <span class="zone-dot y"></span>
          <span class="zone-text">
            <span class="zone-text-main">Sedang</span>
            <span class="zone-text-sub">≤ 6 Menit Berkendara</span>
          </span>
        </label>

        <!-- ⚠️ CRITICAL: id="chk-merah" dipakai app.js event listener — JANGAN UBAH -->
        <label class="zone-row" for="chk-merah">
          <input type="checkbox" id="chk-merah" class="zone-toggle" checked>
          <span class="zone-dot r"></span>
          <span class="zone-text">
            <span class="zone-text-main">Rendah</span>
            <span class="zone-text-sub">≤ 10 Menit Berkendara</span>
          </span>
        </label>

      </div>

      <!-- ===== MARKER SMA ===== -->
      <div class="sb-section-label"><i class="fa-solid fa-location-dot" style="font-size:9px;"></i> Marker</div>
      <label class="marker-row" for="chk-marker" id="marker-row-label">
        <input type="checkbox" id="chk-marker" class="marker-toggle" checked>
        <span class="marker-icon-badge"></span>
        <span class="zone-text">
          <span class="zone-text-main">Titik SMA</span>
          <span class="zone-text-sub">Lokasi sekolah pada peta</span>
        </span>
      </label>

      <!-- ===== BASEMAP ===== -->
      <div class="sb-section-label"><i class="fa-solid fa-layer-group" style="font-size:9px;"></i> Basemap</div>
      <div class="basemap-list">
        <button class="basemap-btn active" id="btn-osm" onclick="switchBasemap('osm')">
          <i class="fa-solid fa-map"></i>
          <span>OpenStreetMap</span>
        </button>
        <button class="basemap-btn" id="btn-satellite" onclick="switchBasemap('satellite')">
          <i class="fa-solid fa-satellite"></i>
          <span>Citra Satelit</span>
        </button>
      </div>

      <!-- ===== STATISTIK CEPAT ===== -->
      <div class="sb-section-label"><i class="fa-solid fa-chart-bar" style="font-size:9px;"></i> Statistik</div>
      <div class="stats-grid">

        <div class="stat-card">
          <div class="stat-card-top">
            <div class="stat-icon blue"><i class="fa-solid fa-school"></i></div>
          </div>
          <div class="stat-value" id="stat-total-sma">—</div>
          <div class="stat-label">TOTAL SMA</div>
        </div>

        <div class="stat-card">
          <div class="stat-card-top">
            <div class="stat-icon teal"><i class="fa-solid fa-circle-check"></i></div>
            <div class="stat-dot" id="loaded-dot"></div>
          </div>
          <div class="stat-value" id="stat-loaded">—</div>
          <div class="stat-label">LOADED</div>
        </div>

        <div class="stat-card">
          <div class="stat-card-top">
            <div class="stat-icon violet"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
          </div>
          <div class="stat-value" id="stat-zoom">12</div>
          <div class="stat-label">ZOOM LEVEL</div>
        </div>

        <div class="stat-card">
          <div class="stat-card-top">
            <div class="stat-icon amber"><i class="fa-solid fa-map-pin"></i></div>
          </div>
          <div class="stat-value">20</div>
          <div class="stat-label">KECAMATAN</div>
        </div>

      </div>

    </div><!-- /sb-body -->

    <!-- Footer -->
    <div class="sb-footer">
      <div class="sb-footer-dot"></div>
      <div class="sb-footer-text">
        Data isokron via <span>OpenRouteService</span> · Realtime
      </div>
    </div>

  </aside><!-- /sidebar -->

  <!-- ==================== MAP AREA ==================== -->
  <div id="map-area">
    <!-- ⚠️ CRITICAL: id="map" dipakai oleh app.js L.map('map') — JANGAN UBAH -->
    <div id="map"></div>

    <!-- Loading toast -->
    <div id="map-loading">
      <div class="spinner"></div>
      <span>Memuat data zona aksesibilitas…</span>
    </div>
  </div>

</div><!-- /page-layout -->

<!-- ============================================================
     SCRIPTS — Leaflet + app.js (semua logika zona ada di app.js)
     ============================================================ -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="app.js"></script>

<script>
/* ============================================================
   SIDEBAR ENHANCEMENTS
   (Tidak menyentuh logika zona app.js — hanya menambah fitur baru)
   ============================================================ */

// ----- BASEMAP SWITCHER -----
function switchBasemap(type) {
  document.querySelectorAll('.basemap-btn').forEach(b => b.classList.remove('active'));
  document.getElementById('btn-' + type).classList.add('active');
  if (type === 'osm') {
    map.removeLayer(satellite);
    osm.addTo(map);
  } else {
    map.removeLayer(osm);
    satellite.addTo(map);
  }
}

// ----- MARKER TOGGLE (smaLayer) -----
document.getElementById('chk-marker').addEventListener('change', function(e) {
  if (typeof smaLayer !== 'undefined' && smaLayer) {
    if (e.target.checked) {
      smaLayer.addTo(map);
    } else {
      map.removeLayer(smaLayer);
    }
  }
});

// ----- ZOOM STAT — live update -----
map.on('zoomend', function() {
  document.getElementById('stat-zoom').textContent = map.getZoom();
});

// ----- LOADING INDICATOR -----
const loadingEl = document.getElementById('map-loading');
let pendingReqs = 0;

const _origFetch = window.fetch;
window.fetch = function(...args) {
  pendingReqs++;
  loadingEl.classList.remove('hidden');
  return _origFetch.apply(this, args).finally(() => {
    pendingReqs = Math.max(0, pendingReqs - 1);
    if (pendingReqs === 0) {
      setTimeout(() => loadingEl.classList.add('hidden'), 1000);
    }
  });
};

// ----- STATS: Total SMA & Loaded -----
// Poll until smaLayer is ready (loaded by app.js after fetch)
function updateStats() {
  if (typeof smaLayer !== 'undefined' && smaLayer) {
    let count = 0;
    smaLayer.eachLayer(() => count++);
    if (count > 0) {
      document.getElementById('stat-total-sma').textContent = count;
      document.getElementById('stat-loaded').textContent = 'Ya';
      // Change dot to solid green
      const dot = document.getElementById('loaded-dot');
      if (dot) { dot.style.background = '#10b981'; dot.style.animation = 'none'; }
      return; // done
    }
  }
  setTimeout(updateStats, 800);
}
setTimeout(updateStats, 1500);

// ----- RESTYLE SEARCH RESULTS (app.js uses plain divs) -----
const searchResultsEl = document.getElementById('search-results');
const observer = new MutationObserver(() => {
  searchResultsEl.querySelectorAll('div:not(.sr-item)').forEach(el => {
    const text = el.textContent.trim();
    el.className = 'sr-item';
    el.innerHTML = `<i class="fa-solid fa-school"></i><span>${text}</span>`;
  });
});
observer.observe(searchResultsEl, { childList: true });
</script>

</body>
</html>