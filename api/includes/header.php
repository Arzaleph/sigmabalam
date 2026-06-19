<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="WebGIS interaktif pemerataan akses SMA di Bandar Lampung berbasis data spasial dan analisis isokron ORS.">
    <title>WebGIS SMA Bandar Lampung — Peta Interaktif</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php if ($current_page == 'peta.php'): ?>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
        <link rel="stylesheet" href="../style.css">
    <?php endif; ?>
    <style>
      body { font-family: 'Inter', sans-serif; }
      nav.enterprise-nav {
        background: linear-gradient(90deg, #0a0f1e 0%, #0f2044 50%, #0a0f1e 100%) !important;
        border-bottom: 1px solid rgba(99,179,237,0.14);
        box-shadow: 0 2px 32px rgba(0,0,0,0.55);
      }
      .nav-link {
        color: rgba(176,210,240,0.75);
        font-size: 13px;
        font-weight: 500;
        padding: 7px 14px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 7px;
        text-decoration: none;
        transition: background 0.18s, color 0.18s;
        letter-spacing: 0.01em;
      }
      .nav-link:hover {
        background: rgba(59,130,246,0.15);
        color: #93c5fd;
      }
      .nav-link.active {
        background: rgba(59,130,246,0.22);
        color: #60a5fa;
        font-weight: 600;
      }
      .nav-brand {
        display: flex;
        align-items: center;
        gap: 10px;
      }
      .nav-brand-icon {
        width: 36px;
        height: 36px;
        background: linear-gradient(135deg, #1e40af, #06b6d4);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 10px rgba(59,130,246,0.4);
      }
      .nav-brand-title {
        font-size: 15px;
        font-weight: 700;
        color: #f0f6ff;
        letter-spacing: 0.01em;
      }
      .nav-brand-sub {
        font-size: 10px;
        color: rgba(176,210,240,0.5);
        font-weight: 400;
      }
    </style>
</head>
<body class="text-gray-100 font-sans flex flex-col min-h-screen" style="background:#0a0f1e;">

<nav class="enterprise-nav sticky top-0 z-[5000]">
    <div style="max-width:1200px;margin:0 auto;padding:0 20px;">
        <div style="display:flex;align-items:center;justify-content:space-between;height:64px;">

            <!-- Brand -->
            <div class="nav-brand">
                <div class="nav-brand-icon">
                    <i class="fa-solid fa-map-location-dot" style="color:#fff;font-size:16px;"></i>
                </div>
                <div>
                    <div class="nav-brand-title">WebGIS SMA</div>
                    <div class="nav-brand-sub">Bandar Lampung</div>
                </div>
            </div>

            <!-- Links -->
            <div style="display:flex;align-items:center;gap:4px;">
                <a href="index.php" class="nav-link <?php echo $current_page == 'index.php' ? 'active' : '' ?>">
                    <i class="fa-solid fa-house"></i> Beranda
                </a>
                <a href="peta.php" class="nav-link <?php echo $current_page == 'peta.php' ? 'active' : '' ?>">
                    <i class="fa-solid fa-map"></i> Peta Interaktif
                </a>
                <a href="analisis.php" class="nav-link <?php echo $current_page == 'analisis.php' ? 'active' : '' ?>">
                    <i class="fa-solid fa-chart-pie"></i> Analisis Spasial
                </a>
                <a href="data-sekolah.php" class="nav-link <?php echo $current_page == 'data-sekolah.php' ? 'active' : '' ?>">
                    <i class="fa-solid fa-list"></i> Data Sekolah
                </a>
            </div>
        </div>
    </div>
</nav>