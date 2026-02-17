@extends('layouts.app')

@section('content')

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Game Store — God of War: Ragnarök</title>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    /* ===================== VARIABLES & RESET ===================== */
    :root {
      --bg: #050810;
      --surface: #0d1117;
      --card: #111827;
      --border: #1f2d45;
      --accent: #00f5d4;
      --accent2: #f72585;
      --accent3: #7b2dff;
      --text: #e2e8f0;
      --muted: #64748b;
      --glow: 0 0 20px rgba(0,245,212,0.3);
      --glow-strong: 0 0 40px rgba(0,245,212,0.5);
    }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      background: var(--bg);
      font-family: 'Rajdhani', sans-serif;
      color: var(--text);
      min-height: 100vh;
      overflow-x: hidden;
      display: flex;
      flex-direction: column;
    }
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background:
        repeating-linear-gradient(0deg, transparent, transparent 60px, rgba(0,245,212,0.015) 60px, rgba(0,245,212,0.015) 61px),
        repeating-linear-gradient(90deg, transparent, transparent 60px, rgba(0,245,212,0.015) 60px, rgba(0,245,212,0.015) 61px);
      pointer-events: none;
      z-index: 0;
    }

    /* ===================== HEADER ===================== */
    header {
      position: relative;
      z-index: 10;
      background: rgba(5,8,16,0.95);
      border-bottom: 1px solid var(--border);
      backdrop-filter: blur(10px);
      text-align: center;
      padding: 40px 20px 30px;
    }
    header::after {
      content: '';
      position: absolute;
      bottom: 0; left: 0; right: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent, var(--accent), var(--accent3), var(--accent2), transparent);
    }
    .hero-badge {
      display: inline-block;
      font-family: 'Orbitron', monospace;
      font-size: 11px;
      letter-spacing: 4px;
      color: var(--accent);
      border: 1px solid var(--accent);
      padding: 6px 16px;
      margin-bottom: 20px;
      text-transform: uppercase;
      animation: blink 2s step-end infinite;
    }
    @keyframes blink {
      0%,100% { opacity: 1; }
      50% { opacity: 0.5; }
    }
    header h1 {
      font-family: 'Orbitron', monospace;
      font-size: clamp(1.8rem, 4vw, 3rem);
      font-weight: 900;
      letter-spacing: 2px;
      background: linear-gradient(135deg, var(--accent) 0%, var(--accent3) 50%, var(--accent2) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 8px;
    }
    header p { color: var(--muted); font-size: 1rem; letter-spacing: 1px; }

    /* ===================== NAVBAR ===================== */
    nav {
      position: relative;
      z-index: 10;
      background: var(--surface);
      border-bottom: 1px solid var(--border);
    }
    .nav-inner {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 24px;
      display: flex;
      align-items: center;
      gap: 4px;
    }
    .nav-link {
      font-family: 'Orbitron', monospace;
      font-size: 0.65rem;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--muted);
      text-decoration: none;
      padding: 16px 20px;
      border-bottom: 2px solid transparent;
      transition: color 0.2s, border-color 0.2s;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .nav-link:hover { color: var(--text); }
    .nav-link.active { color: var(--accent); border-bottom-color: var(--accent); }
    .nav-link .icon { font-size: 14px; }
    .nav-spacer { flex: 1; }
    .nav-stat {
      font-family: 'Orbitron', monospace;
      font-size: 0.6rem;
      letter-spacing: 1px;
      color: var(--muted);
    }
    .nav-stat span { color: var(--accent); font-weight: 700; }

    /* ===================== BREADCRUMB ===================== */
    .breadcrumb-bar {
      position: relative;
      z-index: 1;
      background: rgba(13,17,23,0.8);
      border-bottom: 1px solid var(--border);
      padding: 10px 0;
    }
    .breadcrumb-inner {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 24px;
      display: flex;
      align-items: center;
      gap: 8px;
      font-family: 'Orbitron', monospace;
      font-size: 0.6rem;
      letter-spacing: 2px;
      text-transform: uppercase;
    }
    .breadcrumb-inner a { color: var(--muted); text-decoration: none; transition: color 0.2s; }
    .breadcrumb-inner a:hover { color: var(--accent); }
    .breadcrumb-sep { color: var(--border); }
    .breadcrumb-current { color: var(--accent); }

    /* ===================== MAIN ===================== */
    main { flex: 1; position: relative; z-index: 1; }
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 48px 24px 80px;
    }

    /* ===================== PRODUCT HERO ===================== */
    .product-hero {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 0;
      border: 1px solid var(--border);
      overflow: hidden;
      margin-bottom: 40px;
      animation: slideUp 0.7s ease both;
    }
    @keyframes slideUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Image Panel */
    .product-image-panel {
      position: relative;
      background: #060b14;
      overflow: hidden;
      min-height: 520px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .product-image-panel::before {
      content: '';
      position: absolute;
      inset: 0;
      background: radial-gradient(ellipse at center, rgba(0,245,212,0.06) 0%, transparent 70%);
      z-index: 1;
    }
    .product-image-panel::after {
      content: '';
      position: absolute;
      top: 0; right: 0; bottom: 0;
      width: 1px;
      background: linear-gradient(to bottom, transparent, var(--accent), var(--accent3), transparent);
    }

    /* Cover art placeholder with illustration */
    .cover-art {
      position: relative;
      z-index: 2;
      width: 260px;
      height: 340px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-end;
      overflow: hidden;
      box-shadow: 0 20px 60px rgba(0,0,0,0.8), var(--glow-strong);
      border: 1px solid rgba(0,245,212,0.2);
    }

    /* SVG-based game cover illustration */
    .cover-svg {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
    }

    .cover-label {
      position: relative;
      z-index: 3;
      background: linear-gradient(0deg, rgba(0,0,0,0.9) 0%, transparent 100%);
      width: 100%;
      padding: 16px;
      text-align: center;
    }
    .cover-label span {
      font-family: 'Orbitron', monospace;
      font-size: 0.55rem;
      letter-spacing: 3px;
      color: var(--accent);
      text-transform: uppercase;
    }

    .platform-logo {
      position: absolute;
      top: 20px;
      left: 20px;
      z-index: 3;
      font-family: 'Orbitron', monospace;
      font-size: 0.55rem;
      letter-spacing: 2px;
      color: rgba(255,255,255,0.5);
      border: 1px solid rgba(255,255,255,0.15);
      padding: 4px 10px;
    }

    .img-scan {
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 2px;
      background: linear-gradient(90deg, transparent, var(--accent), transparent);
      z-index: 4;
      animation: scan 3s linear infinite;
    }
    @keyframes scan {
      0% { top: 0; opacity: 1; }
      90% { opacity: 1; }
      100% { top: 100%; opacity: 0; }
    }

    /* Thumbnail strip */
    .thumb-strip {
      position: absolute;
      bottom: 20px;
      left: 0; right: 0;
      display: flex;
      justify-content: center;
      gap: 8px;
      z-index: 3;
    }
    .thumb {
      width: 48px;
      height: 32px;
      border: 1px solid var(--border);
      background: var(--surface);
      cursor: pointer;
      overflow: hidden;
      transition: border-color 0.2s;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
    }
    .thumb.active { border-color: var(--accent); box-shadow: 0 0 8px rgba(0,245,212,0.4); }
    .thumb:hover { border-color: rgba(0,245,212,0.5); }

    /* Info Panel */
    .product-info-panel {
      background: var(--card);
      padding: 44px 40px;
      display: flex;
      flex-direction: column;
      position: relative;
    }
    .product-info-panel::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 2px;
      background: linear-gradient(90deg, var(--accent3), var(--accent), var(--accent2));
    }

    .product-meta-row {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 16px;
    }
    .meta-badge {
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 2px;
      text-transform: uppercase;
      padding: 4px 12px;
      border-radius: 2px;
    }
    .badge-ps { background: rgba(0,100,210,0.3); color: #4da6ff; border: 1px solid rgba(0,100,210,0.4); }
    .meta-id {
      font-family: 'Orbitron', monospace;
      font-size: 0.6rem;
      letter-spacing: 2px;
      color: var(--muted);
    }
    .meta-rating {
      margin-left: auto;
      display: flex;
      align-items: center;
      gap: 4px;
      font-family: 'Orbitron', monospace;
      font-size: 0.75rem;
      color: #fbbf24;
    }

    .product-title {
      font-family: 'Orbitron', monospace;
      font-size: clamp(1.4rem, 2.5vw, 2rem);
      font-weight: 900;
      color: #fff;
      letter-spacing: 1px;
      line-height: 1.2;
      margin-bottom: 6px;
    }
    .product-subtitle {
      font-family: 'Orbitron', monospace;
      font-size: 0.7rem;
      letter-spacing: 4px;
      color: var(--accent);
      text-transform: uppercase;
      margin-bottom: 28px;
    }

    .price-block {
      display: flex;
      align-items: baseline;
      gap: 14px;
      margin-bottom: 28px;
      padding: 20px;
      background: var(--surface);
      border: 1px solid var(--border);
      position: relative;
      overflow: hidden;
    }
    .price-block::before {
      content: '';
      position: absolute;
      left: 0; top: 0; bottom: 0;
      width: 3px;
      background: var(--accent);
      box-shadow: var(--glow);
    }
    .price-main {
      font-family: 'Orbitron', monospace;
      font-size: 2.2rem;
      font-weight: 900;
      color: var(--accent);
      text-shadow: var(--glow);
    }
    .price-original {
      font-family: 'Orbitron', monospace;
      font-size: 1rem;
      color: var(--muted);
      text-decoration: line-through;
    }
    .price-discount {
      font-size: 0.75rem;
      font-weight: 700;
      letter-spacing: 2px;
      color: var(--accent2);
      background: rgba(247,37,133,0.15);
      border: 1px solid rgba(247,37,133,0.3);
      padding: 3px 10px;
    }

    .info-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
      margin-bottom: 28px;
    }
    .info-item {
      padding: 12px 16px;
      background: var(--surface);
      border: 1px solid var(--border);
      border-left: 2px solid var(--border);
      transition: border-left-color 0.2s;
    }
    .info-item:hover { border-left-color: var(--accent3); }
    .info-label {
      font-size: 0.7rem;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--muted);
      margin-bottom: 4px;
    }
    .info-value {
      font-family: 'Orbitron', monospace;
      font-size: 0.8rem;
      font-weight: 700;
      color: var(--text);
      letter-spacing: 1px;
    }

    .stock-indicator {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 24px;
      font-size: 0.85rem;
      letter-spacing: 1px;
    }
    .stock-dot {
      width: 8px; height: 8px;
      border-radius: 50%;
      background: var(--accent);
      box-shadow: 0 0 8px var(--accent);
      animation: pulse-dot 1.5s ease infinite;
    }
    @keyframes pulse-dot {
      0%,100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.5; transform: scale(0.7); }
    }
    .stock-text { color: var(--accent); font-weight: 600; }

    .btn-group { display: flex; gap: 12px; margin-bottom: 0; }
    .btn-buy {
      flex: 1;
      background: linear-gradient(135deg, var(--accent3), var(--accent));
      border: none;
      color: var(--bg);
      font-family: 'Orbitron', monospace;
      font-size: 0.7rem;
      font-weight: 700;
      letter-spacing: 3px;
      text-transform: uppercase;
      padding: 16px 24px;
      cursor: pointer;
      transition: all 0.3s;
    }
    .btn-buy:hover { box-shadow: 0 0 30px rgba(0,245,212,0.5); transform: translateY(-2px); }
    .btn-wishlist {
      background: transparent;
      border: 1px solid var(--border);
      color: var(--muted);
      font-family: 'Orbitron', monospace;
      font-size: 0.7rem;
      font-weight: 700;
      letter-spacing: 2px;
      padding: 16px 20px;
      cursor: pointer;
      transition: all 0.2s;
    }
    .btn-wishlist:hover { border-color: var(--accent2); color: var(--accent2); }

    /* ===================== DETAIL SECTIONS ===================== */
    .detail-grid {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 24px;
      animation: slideUp 0.7s ease 0.15s both;
    }

    .detail-card {
      background: var(--card);
      border: 1px solid var(--border);
      overflow: hidden;
    }
    .detail-card-header {
      padding: 16px 24px;
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      gap: 10px;
      background: var(--surface);
    }
    .detail-card-header h3 {
      font-family: 'Orbitron', monospace;
      font-size: 0.7rem;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: var(--text);
      font-weight: 700;
    }
    .detail-card-header .dot {
      width: 6px; height: 6px;
      background: var(--accent);
      box-shadow: 0 0 6px var(--accent);
    }
    .detail-card-body { padding: 28px 24px; }

    .description-text {
      font-size: 1rem;
      line-height: 1.8;
      color: #94a3b8;
      margin-bottom: 20px;
    }

    .feature-list { display: flex; flex-direction: column; gap: 10px; }
    .feature-item {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      padding: 10px 14px;
      background: var(--surface);
      border: 1px solid var(--border);
    }
    .feature-icon {
      color: var(--accent);
      font-size: 14px;
      margin-top: 2px;
      flex-shrink: 0;
    }
    .feature-text { font-size: 0.9rem; color: var(--text); line-height: 1.5; }
    .feature-text strong { color: #fff; }

    /* Specs table */
    .specs-table { width: 100%; border-collapse: collapse; }
    .specs-table tr { border-bottom: 1px solid var(--border); }
    .specs-table tr:last-child { border-bottom: none; }
    .specs-table td {
      padding: 12px 0;
      font-size: 0.85rem;
      vertical-align: top;
    }
    .specs-table td:first-child {
      color: var(--muted);
      letter-spacing: 1px;
      text-transform: uppercase;
      font-size: 0.75rem;
      width: 45%;
      padding-right: 12px;
    }
    .specs-table td:last-child {
      color: var(--text);
      font-weight: 600;
    }

    /* Score bar */
    .score-item { margin-bottom: 16px; }
    .score-item:last-child { margin-bottom: 0; }
    .score-label-row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 6px;
    }
    .score-label { font-size: 0.8rem; letter-spacing: 1px; color: var(--muted); text-transform: uppercase; }
    .score-value {
      font-family: 'Orbitron', monospace;
      font-size: 0.75rem;
      font-weight: 700;
      color: var(--accent);
    }
    .score-bar-bg {
      height: 4px;
      background: var(--border);
      position: relative;
    }
    .score-bar-fill {
      height: 100%;
      background: linear-gradient(90deg, var(--accent3), var(--accent));
      box-shadow: 0 0 8px rgba(0,245,212,0.4);
      position: relative;
      animation: growBar 1.2s ease 0.5s both;
      transform-origin: left;
    }
    @keyframes growBar {
      from { transform: scaleX(0); }
      to { transform: scaleX(1); }
    }

    /* Gallery strip */
    .gallery-section {
      margin-top: 24px;
      animation: slideUp 0.7s ease 0.25s both;
    }
    .gallery-label {
      font-family: 'Orbitron', monospace;
      font-size: 0.65rem;
      letter-spacing: 4px;
      color: var(--muted);
      text-transform: uppercase;
      margin-bottom: 16px;
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .gallery-label::after { content: ''; flex: 1; height: 1px; background: var(--border); }
    .gallery-strip {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 12px;
    }
    .gallery-item {
      aspect-ratio: 16/9;
      background: var(--card);
      border: 1px solid var(--border);
      overflow: hidden;
      cursor: pointer;
      transition: border-color 0.2s, transform 0.2s;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 28px;
      position: relative;
    }
    .gallery-item::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(0,245,212,0.05), transparent);
      opacity: 0;
      transition: opacity 0.2s;
    }
    .gallery-item:hover { border-color: var(--accent); transform: scale(1.02); }
    .gallery-item:hover::after { opacity: 1; }

    /* ===================== TOAST ===================== */
    .toast {
      position: fixed;
      bottom: 30px; right: 30px;
      background: var(--card);
      border: 1px solid var(--accent);
      color: var(--accent);
      font-family: 'Orbitron', monospace;
      font-size: 0.7rem;
      letter-spacing: 2px;
      padding: 14px 24px;
      box-shadow: var(--glow);
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.3s;
      pointer-events: none;
      z-index: 999;
    }
    .toast.show { opacity: 1; transform: translateY(0); }

    /* ===================== FOOTER ===================== */
    footer {
      position: relative;
      z-index: 10;
      background: var(--surface);
      border-top: 1px solid var(--border);
      padding: 30px 24px;
    }
    footer::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent, var(--accent3), var(--accent), transparent);
    }
    .footer-inner {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 12px;
    }
    .footer-logo {
      font-family: 'Orbitron', monospace;
      font-size: 0.8rem;
      font-weight: 900;
      letter-spacing: 3px;
      color: var(--accent);
    }
    .footer-copy { font-size: 0.8rem; color: var(--muted); letter-spacing: 1px; }
    .footer-links { display: flex; gap: 20px; }
    .footer-links a {
      font-size: 0.75rem;
      letter-spacing: 2px;
      color: var(--muted);
      text-decoration: none;
      text-transform: uppercase;
      transition: color 0.2s;
    }
    .footer-links a:hover { color: var(--accent); }

    /* ===================== RESPONSIVE ===================== */
    @media (max-width: 900px) {
      .product-hero { grid-template-columns: 1fr; }
      .product-image-panel { min-height: 360px; }
      .detail-grid { grid-template-columns: 1fr; }
      .gallery-strip { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 640px) {
      .product-info-panel { padding: 28px 20px; }
      .info-grid { grid-template-columns: 1fr; }
      .btn-group { flex-direction: column; }
      .footer-inner { flex-direction: column; text-align: center; }
      .nav-stat { display: none; }
      .gallery-strip { grid-template-columns: repeat(2, 1fr); }
    }
  </style>
</head>
<body>



  <!-- ===== BREADCRUMB ===== -->
  <div class="breadcrumb-bar">
    <div class="breadcrumb-inner">
      <a href="index.html">Inicio</a>
      <span class="breadcrumb-sep">/</span>
      <a href="index.html">Catálogo</a>
      <span class="breadcrumb-sep">/</span>
      <span class="breadcrumb-current">God of War: Ragnarök</span>
    </div>
  </div>

  <!-- ===== MAIN ===== -->
  <main>
    <div class="container">

      <!-- PRODUCT HERO -->
      <div class="product-hero">

        <!-- Left: Image Panel -->
        <div class="product-image-panel">
          <div class="img-scan"></div>
          <div class="platform-logo">PS5 EXCLUSIVE</div>

          <!-- Game Cover Art (SVG Illustration) -->
            <div class="cover-art">
                <img 
                    src="https://juegosdigitalescolombia.com/files/images/productos/1764614734-god-of-war-ragnarok-ps4-0.webp" 
                    alt="God of War Ragnarök - Portada oficial"
                    style="width:100%; height:100%; object-fit:cover; display:block;"
                >
            </div>

          <!-- Thumbnail strip -->
          <div class="thumb-strip">
            <div class="thumb active">⚔️</div>
            <div class="thumb">🪓</div>
            <div class="thumb">🌍</div>
            <div class="thumb">👥</div>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="product-info-panel">

          <div class="product-meta-row">
            <span class="meta-badge badge-ps">PlayStation 5</span>
            <span class="meta-id">PRD-001</span>
            <div class="meta-rating">&#9733;&#9733;&#9733;&#9733;&#9733; <span style="color:var(--muted);margin-left:4px;font-size:0.65rem;">9.4</span></div>
          </div>

          <div class="product-title">God of War:<br>Ragnarök</div>
          <div class="product-subtitle">Sony Interactive Entertainment</div>

          <div class="price-block">
            <div class="price-main">$249.900</div>
            <div class="price-original">$299.900</div>
            <div class="price-discount">-17%</div>
          </div>

          <div class="info-grid">
            <div class="info-item">
              <div class="info-label">Desarrollador</div>
              <div class="info-value">Santa Monica Studio</div>
            </div>
            <div class="info-item">
              <div class="info-label">Editor</div>
              <div class="info-value">Sony Interactive</div>
            </div>
            <div class="info-item">
              <div class="info-label">Lanzamiento</div>
              <div class="info-value">Nov 9, 2022</div>
            </div>
            <div class="info-item">
              <div class="info-label">Género</div>
              <div class="info-value">Acción / RPG</div>
            </div>
            <div class="info-item">
              <div class="info-label">Clasificación</div>
              <div class="info-value">PEGI 18+</div>
            </div>
            <div class="info-item">
              <div class="info-label">Jugadores</div>
              <div class="info-value">1 Jugador</div>
            </div>
          </div>

          <div class="stock-indicator">
            <div class="stock-dot"></div>
            <span class="stock-text">En stock</span>
            <span style="color:var(--muted);font-size:0.85rem;">— Entrega inmediata digital</span>
          </div>

          <div class="btn-group">
            <button class="btn-buy" onclick="addToCart()">&#9654; Comprar Ahora</button>
            <button class="btn-wishlist">&#9825;</button>
          </div>

        </div>
      </div>

      <!-- DETAIL SECTIONS -->
      <div class="detail-grid">

        <!-- Left: Description + Features -->
        <div>
          <div class="detail-card" style="margin-bottom:24px;">
            <div class="detail-card-header">
              <div class="dot"></div>
              <h3>Descripción del Juego</h3>
            </div>
            <div class="detail-card-body">
              <p class="description-text">
                God of War: Ragnarök es la épica continuación de la saga que redefine la narrativa en los videojuegos. Kratos y su hijo Atreus deben viajar a través de los Nueve Reinos en busca de respuestas mientras las fuerzas de Asgard se preparan para la guerra.
              </p>
              <p class="description-text">
                Con un combate profundo y visceral, un diseño de mundos impresionante y actuaciones de voz de nivel cinematográfico, Ragnarök lleva la mitología nórdica a nuevas alturas. Enfréntate a dioses, gigantes y criaturas míticas en batallas que pondrán a prueba tu habilidad y estrategia.
              </p>

              <div class="feature-list">
                <div class="feature-item">
                  <span class="feature-icon">⚔️</span>
                  <div class="feature-text"><strong>Combate evolucionado:</strong> Sistema de combate renovado con nuevas runas, habilidades y el arco de Atreus totalmente integrado al gameplay cooperativo.</div>
                </div>
                <div class="feature-item">
                  <span class="feature-icon">🌍</span>
                  <div class="feature-text"><strong>9 Reinos por explorar:</strong> Visita todos los reinos de la mitología nórdica, incluyendo Asgard, Vanaheim y Svartalfheim por primera vez.</div>
                </div>
                <div class="feature-item">
                  <span class="feature-icon">📖</span>
                  <div class="feature-text"><strong>Narrativa épica:</strong> Una historia emocionalmente devastadora sobre paternidad, identidad y el peso del destino con +40 horas de contenido.</div>
                </div>
                <div class="feature-item">
                  <span class="feature-icon">🎮</span>
                  <div class="feature-text"><strong>Tecnología PS5:</strong> Retroalimentación háptica del DualSense, carga ultra rápida, ray tracing y resolución 4K a 60 FPS.</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Gallery -->
          <div class="gallery-section">
            <div class="gallery-label">&#9632; Galería del juego</div>
            <div class="gallery-strip">
              <div class="gallery-item">⚔️</div>
              <div class="gallery-item">🪓</div>
              <div class="gallery-item">🌋</div>
              <div class="gallery-item">🐺</div>
            </div>
          </div>
        </div>

        <!-- Right: Specs + Scores -->
        <div style="display:flex;flex-direction:column;gap:24px;">

          <div class="detail-card">
            <div class="detail-card-header">
              <div class="dot"></div>
              <h3>Especificaciones</h3>
            </div>
            <div class="detail-card-body">
              <table class="specs-table">
                <tr>
                  <td>Plataforma</td>
                  <td>PS4 / PS5</td>
                </tr>
                <tr>
                  <td>Resolución</td>
                  <td>Hasta 4K</td>
                </tr>
                <tr>
                  <td>Frame Rate</td>
                  <td>60 / 120 FPS</td>
                </tr>
                <tr>
                  <td>HDR</td>
                  <td>Compatible</td>
                </tr>
                <tr>
                  <td>Almacenamiento</td>
                  <td>~90 GB</td>
                </tr>
                <tr>
                  <td>Audio</td>
                  <td>Tempest 3D</td>
                </tr>
                <tr>
                  <td>Idioma</td>
                  <td>ES / EN / +10</td>
                </tr>
                <tr>
                  <td>Online</td>
                  <td>No requerido</td>
                </tr>
              </table>
            </div>
          </div>

          <div class="detail-card">
            <div class="detail-card-header">
              <div class="dot"></div>
              <h3>Puntuaciones</h3>
            </div>
            <div class="detail-card-body">
              <div class="score-item">
                <div class="score-label-row">
                  <span class="score-label">Jugabilidad</span>
                  <span class="score-value">9.5</span>
                </div>
                <div class="score-bar-bg"><div class="score-bar-fill" style="width:95%"></div></div>
              </div>
              <div class="score-item">
                <div class="score-label-row">
                  <span class="score-label">Gráficos</span>
                  <span class="score-value">9.8</span>
                </div>
                <div class="score-bar-bg"><div class="score-bar-fill" style="width:98%"></div></div>
              </div>
              <div class="score-item">
                <div class="score-label-row">
                  <span class="score-label">Historia</span>
                  <span class="score-value">9.6</span>
                </div>
                <div class="score-bar-bg"><div class="score-bar-fill" style="width:96%"></div></div>
              </div>
              <div class="score-item">
                <div class="score-label-row">
                  <span class="score-label">Sonido</span>
                  <span class="score-value">9.2</span>
                </div>
                <div class="score-bar-bg"><div class="score-bar-fill" style="width:92%"></div></div>
              </div>
              <div class="score-item">
                <div class="score-label-row">
                  <span class="score-label">Duración</span>
                  <span class="score-value">9.0</span>
                </div>
                <div class="score-bar-bg"><div class="score-bar-fill" style="width:90%"></div></div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </main>


  <!-- ===== TOAST ===== -->
  <div class="toast" id="toast">&#10003; AÑADIDO AL CARRITO</div>

  <script>
    function addToCart() {
      const toast = document.getElementById('toast');
      toast.classList.add('show');
      setTimeout(() => toast.classList.remove('show'), 2500);
    }

    // Thumbnail interaction
    document.querySelectorAll('.thumb').forEach(t => {
      t.addEventListener('click', () => {
        document.querySelectorAll('.thumb').forEach(x => x.classList.remove('active'));
        t.classList.add('active');
      });
    });
  </script>

@endsection