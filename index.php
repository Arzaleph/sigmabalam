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
  --border:    rgba(99,179,237,0.12);
  --border-hi: rgba(99,179,237,0.28);
  --accent:    #3b82f6;
  --accent-2:  #06b6d4;
  --accent-3:  #8b5cf6;
  --accent-4:  #f59e0b;
  --text-hi:   #eaf2ff;
  --text-mid:  #8eaed1;
  --text-lo:   #3d5470;
  --glow-blue: rgba(59,130,246,0.22);
  --glow-cyan: rgba(6,182,212,0.18);
  --radius:    14px;
  --transition: 0.28s cubic-bezier(.22,1,.36,1);
}

/* ============================================================
   RESET & BASE
   ============================================================ */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
  font-family: 'Inter', -apple-system, sans-serif;
  background: var(--bg-deep);
  color: var(--text-hi);
  line-height: 1.6;
  overflow-x: hidden;
}

a { text-decoration: none; color: inherit; }

/* ============================================================
   HERO SECTION
   ============================================================ */
.hero {
  position: relative;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  overflow: hidden;
}

/* Hero background image */
.hero-bg {
  position: absolute;
  inset: 0;
  background-image: url('assets/img/hero-school.jpg');
  background-size: cover;
  background-position: center 30%;
  background-repeat: no-repeat;
  transform: scale(1.04);
  transition: transform 8s ease-out;
  z-index: 0;
}

.hero-bg.loaded { transform: scale(1); }

/* Multi-layer dark overlay for text legibility */
.hero-overlay {
  position: absolute;
  inset: 0;
  background:
    linear-gradient(to bottom,  rgba(6,11,24,0.55) 0%, rgba(6,11,24,0.20) 40%, rgba(6,11,24,0.70) 80%, #060b18 100%),
    linear-gradient(to right,   rgba(6,11,24,0.70) 0%, transparent 60%);
  z-index: 1;
}

/* Animated noise/grain texture overlay */
.hero-grain {
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.5;
  z-index: 2;
  pointer-events: none;
}

/* Glowing orbs */
.hero-orb {
  position: absolute;
  border-radius: 50%;
  filter: blur(80px);
  pointer-events: none;
  z-index: 1;
  animation: floatOrb 8s ease-in-out infinite alternate;
}

.hero-orb.blue  { width: 500px; height: 500px; background: rgba(59,130,246,0.12); top: -100px; left: -100px; animation-delay: 0s; }
.hero-orb.cyan  { width: 350px; height: 350px; background: rgba(6,182,212,0.10);  bottom: 0;   right: 10%;  animation-delay: 2s; }
.hero-orb.violet{ width: 280px; height: 280px; background: rgba(139,92,246,0.08); top: 30%;    right: -50px; animation-delay: 4s; }

@keyframes floatOrb {
  from { transform: translate(0, 0) scale(1); }
  to   { transform: translate(20px, 15px) scale(1.06); }
}

/* Hero content */
.hero-content {
  position: relative;
  z-index: 10;
  max-width: 820px;
  padding: 0 40px;
  margin-left: 8%;
  animation: heroFadeIn 1s 0.2s both;
}

@keyframes heroFadeIn {
  from { opacity: 0; transform: translateY(28px); }
  to   { opacity: 1; transform: translateY(0); }
}

.hero-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(59,130,246,0.14);
  border: 1px solid rgba(59,130,246,0.3);
  color: #60a5fa;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  padding: 6px 14px;
  border-radius: 20px;
  margin-bottom: 22px;
}

.hero-eyebrow .dot {
  width: 6px; height: 6px; border-radius: 50%;
  background: #60a5fa;
  box-shadow: 0 0 6px rgba(96,165,250,0.8);
  animation: pulseDot 1.5s ease-in-out infinite;
}

@keyframes pulseDot {
  0%,100% { opacity: 1; transform: scale(1); }
  50%      { opacity: 0.4; transform: scale(0.7); }
}

.hero-title {
  font-size: clamp(2.2rem, 5vw, 3.8rem);
  font-weight: 900;
  line-height: 1.12;
  letter-spacing: -0.025em;
  color: #ffffff;
  margin-bottom: 20px;
}

.hero-title .highlight {
  background: linear-gradient(90deg, #60a5fa 0%, #22d3ee 50%, #a78bfa 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  background-size: 200% auto;
  animation: shimmer 3s linear infinite;
}

@keyframes shimmer {
  from { background-position: 0% center; }
  to   { background-position: 200% center; }
}

.hero-desc {
  font-size: 1.05rem;
  color: rgba(234,242,255,0.72);
  max-width: 560px;
  margin-bottom: 36px;
  font-weight: 400;
  line-height: 1.75;
}

/* CTA Buttons */
.hero-cta {
  display: flex;
  gap: 14px;
  flex-wrap: wrap;
}

.btn-primary {
  display: inline-flex;
  align-items: center;
  gap: 9px;
  background: linear-gradient(135deg, #1d4ed8, #0891b2);
  color: #fff;
  font-weight: 700;
  font-size: 14px;
  padding: 13px 26px;
  border-radius: 10px;
  box-shadow: 0 4px 20px rgba(59,130,246,0.38), 0 1px 4px rgba(0,0,0,0.3);
  transition: transform var(--transition), box-shadow var(--transition), filter var(--transition);
  border: 1px solid rgba(255,255,255,0.1);
  letter-spacing: 0.01em;
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 30px rgba(59,130,246,0.5);
  filter: brightness(1.08);
}

.btn-secondary {
  display: inline-flex;
  align-items: center;
  gap: 9px;
  background: rgba(255,255,255,0.06);
  color: rgba(234,242,255,0.85);
  font-weight: 600;
  font-size: 14px;
  padding: 13px 26px;
  border-radius: 10px;
  border: 1px solid rgba(255,255,255,0.14);
  backdrop-filter: blur(8px);
  transition: background var(--transition), border-color var(--transition), transform var(--transition);
}

.btn-secondary:hover {
  background: rgba(255,255,255,0.10);
  border-color: rgba(99,179,237,0.35);
  transform: translateY(-2px);
}

/* Hero scroll indicator */
.hero-scroll {
  position: absolute;
  bottom: 36px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 10;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 6px;
  color: rgba(234,242,255,0.35);
  font-size: 10px;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  font-weight: 600;
  animation: fadeIn 1s 1.2s both;
}

.scroll-line {
  width: 1px;
  height: 36px;
  background: linear-gradient(to bottom, rgba(99,179,237,0.5), transparent);
  animation: scrollLine 2s ease-in-out infinite;
}

@keyframes scrollLine {
  0%, 100% { opacity: 0.4; transform: scaleY(1); }
  50%       { opacity: 1;   transform: scaleY(0.6); }
}

/* Hero mini stats bar */
.hero-stats-bar {
  position: relative;
  z-index: 20;
  display: flex;
  justify-content: center;
  gap: 0;
  padding: 0 40px;
  margin-top: -48px;   /* pull up to overlap hero bottom */
  margin-bottom: 0;
}

.hero-stat-pill {
  background: var(--bg-card);
  border: 1px solid var(--border-hi);
  padding: 16px 28px;
  display: flex;
  align-items: center;
  gap: 14px;
  flex: 0 0 auto;
  transition: background var(--transition), border-color var(--transition);
  position: relative;
}

.hero-stat-pill:first-child { border-radius: var(--radius) 0 0 var(--radius); }
.hero-stat-pill:last-child  { border-radius: 0 var(--radius) var(--radius) 0; }

.hero-stat-pill + .hero-stat-pill::before {
  content: '';
  position: absolute;
  left: 0;
  top: 20%;
  height: 60%;
  width: 1px;
  background: var(--border);
}

.hero-stat-pill:hover { background: var(--bg-card2); border-color: var(--border-hi); }

.hs-icon {
  width: 40px; height: 40px;
  border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  font-size: 16px;
  flex-shrink: 0;
}

.hs-icon.blue   { background: rgba(59,130,246,0.15); color: #60a5fa; }
.hs-icon.green  { background: rgba(16,185,129,0.15); color: #34d399; }
.hs-icon.amber  { background: rgba(245,158,11,0.15); color: #fbbf24; }
.hs-icon.violet { background: rgba(139,92,246,0.15); color: #a78bfa; }

.hs-text .val { font-size: 1.5rem; font-weight: 800; color: #fff; display: block; letter-spacing: -0.03em; line-height: 1.1; }
.hs-text .lbl { font-size: 10.5px; color: var(--text-mid); font-weight: 500; letter-spacing: 0.06em; text-transform: uppercase; }

/* ============================================================
   SECTION WRAPPER
   ============================================================ */
.section-wrap {
  max-width: 1160px;
  margin: 0 auto;
  padding: 0 32px;
}

/* ============================================================
   SECTION LABEL (eyebrow)
   ============================================================ */
.section-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(59,130,246,0.10);
  border: 1px solid rgba(59,130,246,0.25);
  color: #60a5fa;
  font-size: 10.5px;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  padding: 5px 13px;
  border-radius: 20px;
  margin-bottom: 14px;
}

.section-title {
  font-size: clamp(1.6rem, 3vw, 2.4rem);
  font-weight: 800;
  color: var(--text-hi);
  letter-spacing: -0.02em;
  margin-bottom: 10px;
}

.section-desc {
  font-size: 15px;
  color: var(--text-mid);
  max-width: 520px;
}

/* ============================================================
   FEATURES SECTION
   ============================================================ */
.features-section {
  padding: 140px 0 90px;
}

.features-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  margin-top: 52px;
}

.feature-card {
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  padding: 28px 24px 24px;
  position: relative;
  overflow: hidden;
  cursor: default;
  transition: border-color var(--transition), transform var(--transition), box-shadow var(--transition);
}

.feature-card::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 0% 0%, var(--card-glow, transparent) 0%, transparent 65%);
  opacity: 0;
  transition: opacity var(--transition);
}

.feature-card:hover {
  border-color: var(--border-hi);
  transform: translateY(-4px);
  box-shadow: 0 16px 48px rgba(0,0,0,0.35);
}

.feature-card:hover::before { opacity: 1; }

.feature-card.c-blue  { --card-glow: rgba(59,130,246,0.12); }
.feature-card.c-green { --card-glow: rgba(16,185,129,0.12); }
.feature-card.c-amber { --card-glow: rgba(245,158,11,0.10); }
.feature-card.c-violet{ --card-glow: rgba(139,92,246,0.12); }
.feature-card.c-cyan  { --card-glow: rgba(6,182,212,0.10);  }
.feature-card.c-rose  { --card-glow: rgba(244,63,94,0.10);  }

.feat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  font-size: 20px;
  margin-bottom: 18px;
}

.feat-icon.blue   { background: rgba(59,130,246,0.14); color: #60a5fa; box-shadow: 0 0 16px rgba(59,130,246,0.2); }
.feat-icon.green  { background: rgba(16,185,129,0.14); color: #34d399; box-shadow: 0 0 16px rgba(16,185,129,0.2); }
.feat-icon.amber  { background: rgba(245,158,11,0.14); color: #fbbf24; box-shadow: 0 0 16px rgba(245,158,11,0.2); }
.feat-icon.violet { background: rgba(139,92,246,0.14); color: #a78bfa; box-shadow: 0 0 16px rgba(139,92,246,0.2); }
.feat-icon.cyan   { background: rgba(6,182,212,0.14);  color: #22d3ee; box-shadow: 0 0 16px rgba(6,182,212,0.2);  }
.feat-icon.rose   { background: rgba(244,63,94,0.14);  color: #fb7185; box-shadow: 0 0 16px rgba(244,63,94,0.2);  }

.feat-title { font-size: 15px; font-weight: 700; color: var(--text-hi); margin-bottom: 8px; }
.feat-desc  { font-size: 13px; color: var(--text-mid); line-height: 1.7; }

.feat-arrow {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 12px;
  font-weight: 600;
  color: var(--text-lo);
  margin-top: 16px;
  transition: color var(--transition), gap var(--transition);
}

.feature-card:hover .feat-arrow {
  color: var(--accent-2);
  gap: 10px;
}

/* ============================================================
   HOW IT WORKS / PIPELINE SECTION
   ============================================================ */
.pipeline-section {
  padding: 80px 0 90px;
  border-top: 1px solid var(--border);
  position: relative;
}

.pipeline-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.04) 0%, transparent 60%);
  pointer-events: none;
}

.pipeline-row {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0;
  margin-top: 52px;
  position: relative;
}

/* connector line */
.pipeline-row::before {
  content: '';
  position: absolute;
  top: 28px;
  left: 12.5%;
  right: 12.5%;
  height: 1px;
  background: linear-gradient(to right, transparent, var(--border-hi), transparent);
  z-index: 0;
}

.pipe-step {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding: 0 16px;
  position: relative;
  z-index: 1;
  animation: fadeInUp 0.5s both;
}

.pipe-step:nth-child(1) { animation-delay: 0.0s; }
.pipe-step:nth-child(2) { animation-delay: 0.1s; }
.pipe-step:nth-child(3) { animation-delay: 0.2s; }
.pipe-step:nth-child(4) { animation-delay: 0.3s; }

@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(16px); }
  to   { opacity: 1; transform: translateY(0); }
}

.pipe-num {
  width: 56px; height: 56px;
  border-radius: 50%;
  border: 1px solid var(--border-hi);
  background: var(--bg-card);
  display: flex; align-items: center; justify-content: center;
  font-size: 11px;
  font-weight: 800;
  color: var(--accent-2);
  letter-spacing: 0.06em;
  margin-bottom: 18px;
  box-shadow: 0 0 20px rgba(6,182,212,0.1);
  transition: box-shadow var(--transition), border-color var(--transition);
}

.pipe-step:hover .pipe-num {
  border-color: var(--accent-2);
  box-shadow: 0 0 24px rgba(6,182,212,0.3);
}

.pipe-title { font-size: 14px; font-weight: 700; color: var(--text-hi); margin-bottom: 8px; }
.pipe-desc  { font-size: 12px; color: var(--text-mid); line-height: 1.7; }

/* ============================================================
   TECH STACK / BADGES
   ============================================================ */
.tech-section {
  padding: 80px 0;
  border-top: 1px solid var(--border);
}

.tech-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  margin-top: 40px;
}

.tech-badge {
  display: flex;
  align-items: center;
  gap: 10px;
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: 10px;
  padding: 10px 18px;
  font-size: 13px;
  font-weight: 600;
  color: var(--text-mid);
  transition: border-color var(--transition), color var(--transition), transform var(--transition);
  cursor: default;
}

.tech-badge:hover {
  border-color: var(--border-hi);
  color: var(--text-hi);
  transform: translateY(-2px);
}

.tech-badge i { font-size: 16px; }
.tech-badge .tb-blue   { color: #60a5fa; }
.tech-badge .tb-green  { color: #34d399; }
.tech-badge .tb-amber  { color: #fbbf24; }
.tech-badge .tb-orange { color: #fb923c; }
.tech-badge .tb-red    { color: #f87171; }
.tech-badge .tb-teal   { color: #2dd4bf; }
.tech-badge .tb-violet { color: #a78bfa; }

/* ============================================================
   CTA BANNER
   ============================================================ */
.cta-section {
  padding: 80px 0 90px;
  border-top: 1px solid var(--border);
}

.cta-banner {
  background: linear-gradient(135deg, #0f1e42 0%, #0a1630 50%, #0d1a3a 100%);
  border: 1px solid var(--border-hi);
  border-radius: 20px;
  padding: 56px 48px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 32px;
  position: relative;
  overflow: hidden;
}

.cta-banner::before {
  content: '';
  position: absolute;
  width: 500px; height: 500px;
  border-radius: 50%;
  background: rgba(59,130,246,0.07);
  filter: blur(60px);
  right: -100px; top: -150px;
  pointer-events: none;
}

.cta-banner::after {
  content: '';
  position: absolute;
  width: 300px; height: 300px;
  border-radius: 50%;
  background: rgba(6,182,212,0.06);
  filter: blur(50px);
  left: -60px; bottom: -80px;
  pointer-events: none;
}

.cta-text { position: relative; z-index: 1; }
.cta-text h2 { font-size: 1.9rem; font-weight: 800; color: #fff; margin-bottom: 10px; letter-spacing: -0.02em; }
.cta-text p  { font-size: 14.5px; color: var(--text-mid); max-width: 480px; }

.cta-actions {
  position: relative;
  z-index: 1;
  display: flex;
  gap: 12px;
  flex-shrink: 0;
}

/* ============================================================
   FOOTER
   ============================================================ */
footer.enterprise-footer {
  background: #040810;
  border-top: 1px solid var(--border);
  padding: 40px 32px;
}

.footer-inner {
  max-width: 1160px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  flex-wrap: wrap;
}

.footer-brand {
  display: flex;
  align-items: center;
  gap: 10px;
}

.footer-brand-icon {
  width: 32px; height: 32px;
  border-radius: 8px;
  background: linear-gradient(135deg, #1d4ed8, #0891b2);
  display: flex; align-items: center; justify-content: center;
}

.footer-brand-icon i { color: #fff; font-size: 13px; }

.footer-brand-name { font-size: 13px; font-weight: 700; color: var(--text-hi); }
.footer-brand-sub  { font-size: 10px; color: var(--text-lo); }

.footer-links {
  display: flex;
  gap: 24px;
}

.footer-links a {
  font-size: 12.5px;
  color: var(--text-lo);
  transition: color var(--transition);
}

.footer-links a:hover { color: var(--accent-2); }

.footer-copy { font-size: 11px; color: var(--text-lo); }

/* ============================================================
   UTILITY / ANIMATION
   ============================================================ */
@keyframes fadeIn {
  from { opacity: 0; }
  to   { opacity: 1; }
}

/* Counter number roll-up */
.count-up { display: inline-block; }

/* Intersection Observer fade-in */
.reveal {
  opacity: 0;
  transform: translateY(24px);
  transition: opacity 0.65s ease, transform 0.65s ease;
}

.reveal.visible {
  opacity: 1;
  transform: translateY(0);
}

.reveal-delay-1 { transition-delay: 0.10s; }
.reveal-delay-2 { transition-delay: 0.20s; }
.reveal-delay-3 { transition-delay: 0.30s; }
.reveal-delay-4 { transition-delay: 0.40s; }
.reveal-delay-5 { transition-delay: 0.50s; }

/* Divider line glow */
.glowing-hr {
  border: none;
  height: 1px;
  background: linear-gradient(to right, transparent, var(--border-hi), transparent);
  margin: 0;
}

/* Responsive */
@media (max-width: 900px) {
  .features-grid  { grid-template-columns: 1fr 1fr; }
  .pipeline-row   { grid-template-columns: 1fr 1fr; gap: 24px; }
  .pipeline-row::before { display: none; }
  .cta-banner     { flex-direction: column; text-align: center; }
  .cta-actions    { justify-content: center; }
  .hero-stats-bar { gap: 2px; padding: 0 16px; }
  .hero-stat-pill { padding: 14px 18px; }
}

@media (max-width: 640px) {
  .features-grid  { grid-template-columns: 1fr; }
  .pipeline-row   { grid-template-columns: 1fr; }
  .hero-content   { margin-left: 0; padding: 0 24px; }
  .section-wrap   { padding: 0 20px; }
  .hero-stats-bar { flex-direction: column; transform: none; position: static; padding: 20px; gap: 8px; }
  .hero-stat-pill { border-radius: var(--radius); width: 100%; justify-content: center; }
  .hero-stat-pill::before { display: none; }
}
</style>

<!-- ============================================================
     HERO
     ============================================================ -->
<section class="hero" id="hero">
  <div class="hero-bg" id="hero-bg"></div>
  <div class="hero-overlay"></div>
  <div class="hero-grain"></div>
  <div class="hero-orb blue"></div>
  <div class="hero-orb cyan"></div>
  <div class="hero-orb violet"></div>

  <div class="hero-content">
    <div class="hero-eyebrow">
      <span class="dot"></span>
      WebGIS · Bandar Lampung · 2026
    </div>

    <h1 class="hero-title">
      Pemetaan Aksesibilitas<br>
      <span class="highlight">SMA Kota Bandar Lampung</span>
    </h1>

    <p class="hero-desc">
      Sistem Informasi Geografis berbasis web untuk memvisualisasikan sebaran spasial, jangkauan isokron berkendara, dan indeks pemerataan SMA di seluruh wilayah Kota Bandar Lampung.
    </p>

    <div class="hero-cta">
      <a href="peta.php" class="btn-primary">
        <i class="fa-solid fa-map"></i>
        Buka Peta Interaktif
      </a>
      <a href="analisis.php" class="btn-secondary">
        <i class="fa-solid fa-flask"></i>
        Lihat Analisis Spasial
      </a>
    </div>
  </div>

  <!-- Mini scroll indicator -->
  <div class="hero-scroll">
    <div class="scroll-line"></div>
    <span>Scroll</span>
  </div>

</section>
<!-- ============================================================
     STATS BAR — outside hero so overflow:hidden does not clip it
     ============================================================ -->
<div class="hero-stats-bar">
  <div class="hero-stat-pill">
    <div class="hs-icon blue"><i class="fa-solid fa-graduation-cap"></i></div>
    <div class="hs-text">
      <span class="val count-up" data-target="71">0</span>
      <span class="lbl">SMA Terdata</span>
    </div>
  </div>
  <div class="hero-stat-pill">
    <div class="hs-icon green"><i class="fa-solid fa-map-location-dot"></i></div>
    <div class="hs-text">
      <span class="val count-up" data-target="20">0</span>
      <span class="lbl">Kecamatan</span>
    </div>
  </div>
  <div class="hero-stat-pill">
    <div class="hs-icon amber"><i class="fa-solid fa-stopwatch"></i></div>
    <div class="hs-text">
      <span class="val">3 / 6 / 10</span>
      <span class="lbl">Menit Isokron</span>
    </div>
  </div>
  <div class="hero-stat-pill">
    <div class="hs-icon violet"><i class="fa-solid fa-globe"></i></div>
    <div class="hs-text">
      <span class="val">WGS 84</span>
      <span class="lbl">Sistem Proyeksi</span>
    </div>
  </div>
</div>

<!-- ============================================================
     FEATURES SECTION
     ============================================================ -->
<section class="features-section">
  <div class="section-wrap">

    <div class="reveal">
      <div class="section-eyebrow"><i class="fa-solid fa-star" style="font-size:9px;"></i> Fitur Utama</div>
      <h2 class="section-title">Kemampuan Analisis Spasial</h2>
      <p class="section-desc">Platform WebGIS dengan stack modern untuk perencanaan & evaluasi zonasi pendidikan berbasis data nyata.</p>
    </div>

    <div class="features-grid">

      <div class="feature-card c-blue reveal reveal-delay-1">
        <div class="feat-icon blue"><i class="fa-solid fa-circle-dot"></i></div>
        <h3 class="feat-title">Sebaran 71 Titik SMA</h3>
        <p class="feat-desc">Pemetaan lokasi Sekolah Menengah Atas (Negeri & Swasta) secara presisi berdasarkan koordinat lintang dan bujur asli dari data survei lapangan.</p>
        <a href="peta.php" class="feat-arrow">Lihat peta <i class="fa-solid fa-arrow-right"></i></a>
      </div>

      <div class="feature-card c-green reveal reveal-delay-2">
        <div class="feat-icon green"><i class="fa-solid fa-network-wired"></i></div>
        <h3 class="feat-title">Isokron Dinamis (ORS)</h3>
        <p class="feat-desc">Area cakupan dihitung realtime via OpenRouteService API berdasarkan waktu tempuh berkendara riil melalui jaringan jalan sekitar sekolah.</p>
        <a href="peta.php" class="feat-arrow">Coba sekarang <i class="fa-solid fa-arrow-right"></i></a>
      </div>

      <div class="feature-card c-amber reveal reveal-delay-3">
        <div class="feat-icon amber"><i class="fa-solid fa-draw-polygon"></i></div>
        <h3 class="feat-title">Choropleth Kecamatan</h3>
        <p class="feat-desc">Peta tematik interaktif yang menggambarkan indeks pemerataan sarana pendidikan di tiap kecamatan menggunakan gradasi warna berbasis data.</p>
        <a href="analisis.php" class="feat-arrow">Lihat analisis <i class="fa-solid fa-arrow-right"></i></a>
      </div>

      <div class="feature-card c-violet reveal reveal-delay-1">
        <div class="feat-icon violet"><i class="fa-solid fa-magnifying-glass-location"></i></div>
        <h3 class="feat-title">Pencarian Autocomplete</h3>
        <p class="feat-desc">Temukan sekolah dalam hitungan detik. Sistem pencarian cerdas akan terbang langsung ke lokasi sekolah dan membuka popup informasi detail.</p>
        <a href="peta.php" class="feat-arrow">Cari sekolah <i class="fa-solid fa-arrow-right"></i></a>
      </div>

      <div class="feature-card c-cyan reveal reveal-delay-2">
        <div class="feat-icon cyan"><i class="fa-solid fa-layer-group"></i></div>
        <h3 class="feat-title">Multi-Layer Control</h3>
        <p class="feat-desc">Kendalikan visibilitas tiap zona aksesibilitas secara independen. Pilih basemap antara OpenStreetMap dan citra satelit Esri kapan saja.</p>
        <a href="peta.php" class="feat-arrow">Eksplorasi <i class="fa-solid fa-arrow-right"></i></a>
      </div>

      <div class="feature-card c-rose reveal reveal-delay-3">
        <div class="feat-icon rose"><i class="fa-solid fa-table-cells-large"></i></div>
        <h3 class="feat-title">Data Tabular Sekolah</h3>
        <p class="feat-desc">Direktori lengkap seluruh SMA dengan atribut nama, alamat, dan koordinat lokasi. Dapat disaring dan ditelusuri secara cepat.</p>
        <a href="data-sekolah.php" class="feat-arrow">Lihat data <i class="fa-solid fa-arrow-right"></i></a>
      </div>

    </div>
  </div>
</section>

<!-- ============================================================
     PIPELINE / HOW IT WORKS
     ============================================================ -->
<section class="pipeline-section">
  <div class="section-wrap">

    <div class="reveal" style="text-align:center;">
      <div class="section-eyebrow" style="display:inline-flex;"><i class="fa-solid fa-diagram-project" style="font-size:9px;"></i> Metodologi</div>
      <h2 class="section-title">Bagaimana Sistem Bekerja</h2>
      <p class="section-desc" style="max-width:100%;margin:0 auto;">Alur analisis spasial dari pengumpulan data hingga visualisasi interaktif.</p>
    </div>

    <div class="pipeline-row">
      <div class="pipe-step reveal reveal-delay-1">
        <div class="pipe-num">01</div>
        <div class="pipe-title">Data Collection</div>
        <p class="pipe-desc">Koordinat lokasi SMA dikumpulkan dari data survei lapangan dan sumber resmi Dinas Pendidikan Kota Bandar Lampung.</p>
      </div>
      <div class="pipe-step reveal reveal-delay-2">
        <div class="pipe-num">02</div>
        <div class="pipe-title">Spatial Processing</div>
        <p class="pipe-desc">Data diolah dengan QGIS dan disimpan dalam format GeoJSON dengan sistem proyeksi WGS 84 (EPSG:4326).</p>
      </div>
      <div class="pipe-step reveal reveal-delay-3">
        <div class="pipe-num">03</div>
        <div class="pipe-title">Isochrone Analysis</div>
        <p class="pipe-desc">API OpenRouteService menghitung zona jangkauan 3, 6, dan 10 menit berkendara per sekolah secara realtime.</p>
      </div>
      <div class="pipe-step reveal reveal-delay-4">
        <div class="pipe-num">04</div>
        <div class="pipe-title">Interactive Viz</div>
        <p class="pipe-desc">Hasil divisualisasikan di atas peta Leaflet.js dengan layer interaktif, pencarian, dan kontrol tampilan zona.</p>
      </div>
    </div>

  </div>
</section>

<!-- ============================================================
     TECH STACK
     ============================================================ -->
<section class="tech-section">
  <div class="section-wrap">
    <div class="reveal">
      <div class="section-eyebrow"><i class="fa-solid fa-microchip" style="font-size:9px;"></i> Teknologi</div>
      <h2 class="section-title">Stack yang Digunakan</h2>
    </div>
    <div class="tech-grid reveal reveal-delay-1">
      <div class="tech-badge"><i class="fa-solid fa-map tb-blue"></i> Leaflet.js</div>
      <div class="tech-badge"><i class="fa-brands fa-php tb-violet"></i> PHP 8</div>
      <div class="tech-badge"><i class="fa-solid fa-database tb-amber"></i> MySQL</div>
      <div class="tech-badge"><i class="fa-solid fa-route tb-green"></i> OpenRouteService</div>
      <div class="tech-badge"><i class="fa-solid fa-globe tb-teal"></i> GeoJSON</div>
      <div class="tech-badge"><i class="fa-solid fa-layer-group tb-orange"></i> QGIS</div>
      <div class="tech-badge"><i class="fa-brands fa-js tb-amber"></i> Vanilla JS</div>
      <div class="tech-badge"><i class="fa-solid fa-earth-asia tb-blue"></i> WGS 84</div>
      <div class="tech-badge"><i class="fa-brands fa-css3-alt tb-violet"></i> CSS3</div>
    </div>
  </div>
</section>

<!-- ============================================================
     CTA BANNER
     ============================================================ -->
<section class="cta-section">
  <div class="section-wrap">
    <div class="cta-banner reveal">
      <div class="cta-text">
        <h2>Siap Menjelajahi Peta?</h2>
        <p>Buka peta interaktif dan visualisasikan zona aksesibilitas SMA di seluruh Kota Bandar Lampung secara realtime.</p>
      </div>
      <div class="cta-actions">
        <a href="peta.php" class="btn-primary">
          <i class="fa-solid fa-map"></i> Buka Peta
        </a>
        <a href="data-sekolah.php" class="btn-secondary">
          <i class="fa-solid fa-list"></i> Data Sekolah
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     FOOTER
     ============================================================ -->
<footer class="enterprise-footer">
  <div class="footer-inner">
    <div class="footer-brand">
      <div class="footer-brand-icon"><i class="fa-solid fa-map-location-dot"></i></div>
      <div>
        <div class="footer-brand-name">WebGIS SMA Bandar Lampung</div>
        <div class="footer-brand-sub">Sistem Informasi Geografis · 2026</div>
      </div>
    </div>

    <nav class="footer-links">
      <a href="index.php">Beranda</a>
      <a href="peta.php">Peta</a>
      <a href="analisis.php">Analisis</a>
      <a href="data-sekolah.php">Data</a>
    </nav>

    <div class="footer-copy">&copy; 2026 All Rights Reserved.</div>
  </div>
</footer>

<!-- ============================================================
     SCRIPTS — interactivity
     ============================================================ -->
<script>
/* ---- Hero BG Ken Burns ---- */
const heroBg = document.getElementById('hero-bg');
window.addEventListener('load', () => { heroBg.classList.add('loaded'); });

/* ---- Parallax hero on scroll ---- */
window.addEventListener('scroll', () => {
  const y = window.scrollY;
  heroBg.style.transform = `scale(1) translateY(${y * 0.25}px)`;
});

/* ---- Intersection Observer: reveal on scroll ---- */
const reveals = document.querySelectorAll('.reveal');
const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      e.target.classList.add('visible');
      revealObserver.unobserve(e.target);
    }
  });
}, { threshold: 0.12 });
reveals.forEach(el => revealObserver.observe(el));

/* ---- Count-up numbers ---- */
function animateCount(el) {
  const target = parseInt(el.dataset.target, 10);
  const duration = 1600;
  const start = performance.now();
  const update = (now) => {
    const t = Math.min((now - start) / duration, 1);
    const ease = 1 - Math.pow(1 - t, 4); // easeOutQuart
    el.textContent = Math.floor(ease * target);
    if (t < 1) requestAnimationFrame(update);
    else el.textContent = target;
  };
  requestAnimationFrame(update);
}

const countEls = document.querySelectorAll('.count-up');
const countObserver = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      animateCount(e.target);
      countObserver.unobserve(e.target);
    }
  });
}, { threshold: 0.5 });
countEls.forEach(el => countObserver.observe(el));

/* ---- Feature card magnetic mouse effect ---- */
document.querySelectorAll('.feature-card').forEach(card => {
  card.addEventListener('mousemove', (e) => {
    const r = card.getBoundingClientRect();
    const x = ((e.clientX - r.left) / r.width - 0.5) * 6;
    const y = ((e.clientY - r.top) / r.height - 0.5) * 6;
    card.style.transform = `translateY(-4px) rotateX(${-y}deg) rotateY(${x}deg)`;
  });
  card.addEventListener('mouseleave', () => {
    card.style.transform = '';
    card.style.transition = 'transform 0.5s ease';
    setTimeout(() => card.style.transition = '', 500);
  });
});
</script>

</body>
</html>