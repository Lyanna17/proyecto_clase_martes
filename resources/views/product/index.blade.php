<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Game Store — Catálogo de Videojuegos</title>
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
        repeating-linear-gradient(0deg, transparent, transparent 60px, rgba(0,245,212,0.02) 60px, rgba(0,245,212,0.02) 61px),
        repeating-linear-gradient(90deg, transparent, transparent 60px, rgba(0,245,212,0.02) 60px, rgba(0,245,212,0.02) 61px);
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
    header p {
      color: var(--muted);
      font-size: 1rem;
      letter-spacing: 1px;
    }

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
    .nav-link.active {
      color: var(--accent);
      border-bottom-color: var(--accent);
    }
    .nav-link .icon { font-size: 14px; }
    .nav-spacer { flex: 1; }
    .nav-stat {
      font-family: 'Orbitron', monospace;
      font-size: 0.6rem;
      letter-spacing: 1px;
      color: var(--muted);
    }
    .nav-stat span { color: var(--accent); font-weight: 700; }

    /* ===================== MAIN ===================== */
    main {
      flex: 1;
      position: relative;
      z-index: 1;
    }
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 40px 24px 60px;
    }
    .section-label {
      font-family: 'Orbitron', monospace;
      font-size: 0.65rem;
      letter-spacing: 4px;
      color: var(--muted);
      text-transform: uppercase;
      margin-bottom: 24px;
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .section-label::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--border);
    }

    /* ===================== PRODUCT CARDS ===================== */
    .products-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
      gap: 24px;
    }
    .product-card {
      background: var(--card);
      border: 1px solid var(--border);
      position: relative;
      overflow: hidden;
      transition: transform 0.3s ease, border-color 0.3s ease;
      animation: fadeIn 0.6s ease both;
    }
    .product-card:nth-child(1) { animation-delay: 0.05s; }
    .product-card:nth-child(2) { animation-delay: 0.1s; }
    .product-card:nth-child(3) { animation-delay: 0.15s; }
    .product-card:nth-child(4) { animation-delay: 0.2s; }
    .product-card:nth-child(5) { animation-delay: 0.25s; }
    .product-card:nth-child(6) { animation-delay: 0.3s; }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .product-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 2px;
      background: linear-gradient(90deg, var(--accent3), var(--accent), var(--accent2));
      opacity: 0;
      transition: opacity 0.3s;
    }
    .product-card:hover { transform: translateY(-4px); border-color: rgba(0,245,212,0.3); }
    .product-card:hover::before { opacity: 1; }

    .card-header {
      padding: 20px 24px 0;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }
    .product-number {
      font-family: 'Orbitron', monospace;
      font-size: 10px;
      color: var(--muted);
      letter-spacing: 2px;
    }
    .product-badge {
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 2px;
      text-transform: uppercase;
      padding: 3px 10px;
      border-radius: 2px;
    }
    .badge-ps { background: rgba(0,100,210,0.3); color: #4da6ff; border: 1px solid rgba(0,100,210,0.4); }
    .badge-xbox { background: rgba(16,150,36,0.3); color: #5ddf75; border: 1px solid rgba(16,150,36,0.4); }
    .badge-nintendo { background: rgba(230,0,18,0.3); color: #ff6b7a; border: 1px solid rgba(230,0,18,0.4); }
    .badge-pc { background: rgba(123,45,255,0.3); color: #b07aff; border: 1px solid rgba(123,45,255,0.4); }
    .badge-multi { background: rgba(247,37,133,0.2); color: #f872b0; border: 1px solid rgba(247,37,133,0.4); }

    .card-body { padding: 16px 24px; }
    .product-name {
      font-family: 'Orbitron', monospace;
      font-size: 1rem;
      font-weight: 700;
      color: #fff;
      margin-bottom: 4px;
      letter-spacing: 1px;
    }
    .product-brand {
      font-size: 0.85rem;
      color: var(--accent);
      letter-spacing: 2px;
      text-transform: uppercase;
      margin-bottom: 12px;
    }
    .product-desc {
      font-size: 0.9rem;
      color: var(--muted);
      line-height: 1.6;
    }
    .card-footer {
      padding: 16px 24px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-top: 1px solid var(--border);
    }
    .product-price {
      font-family: 'Orbitron', monospace;
      font-size: 1.4rem;
      font-weight: 900;
      color: var(--accent);
      text-shadow: var(--glow);
    }
    .btn-add {
      background: transparent;
      border: 1px solid var(--accent);
      color: var(--accent);
      font-family: 'Rajdhani', sans-serif;
      font-weight: 600;
      font-size: 0.85rem;
      letter-spacing: 2px;
      text-transform: uppercase;
      padding: 8px 16px;
      cursor: pointer;
      transition: all 0.2s;
    }
    .btn-add:hover { background: var(--accent); color: var(--bg); box-shadow: var(--glow); }

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
      text-align: center;
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
    .footer-copy {
      font-size: 0.8rem;
      color: var(--muted);
      letter-spacing: 1px;
    }
    .footer-links {
      display: flex;
      gap: 20px;
    }
    .footer-links a {
      font-size: 0.75rem;
      letter-spacing: 2px;
      color: var(--muted);
      text-decoration: none;
      text-transform: uppercase;
      transition: color 0.2s;
    }
    .footer-links a:hover { color: var(--accent); }

    @media (max-width: 640px) {
      .products-grid { grid-template-columns: 1fr; }
      .footer-inner { flex-direction: column; text-align: center; }
      .nav-stat { display: none; }
    }
  </style>
</head>
<body>

  <!-- ===== HEADER ===== -->
  <header>
    <div class="hero-badge">&#9654; GAME STORE</div>
    <h1>CATÁLOGO<br>DE VIDEOJUEGOS</h1>
    <p>Explora los mejores títulos del universo gamer</p>
  </header>

  <!-- ===== NAVBAR ===== -->
  <nav>
    <div class="nav-inner">
      <a href="index.html" class="nav-link active">
        <span class="icon">&#9776;</span> Catálogo
      </a>
      <a href="formulario.html" class="nav-link">
        <span class="icon">&#43;</span> Registrar Producto
      </a>
      <div class="nav-spacer"></div>
      <div class="nav-stat">Productos: <span>06</span></div>
    </div>
  </nav>

  <!-- ===== MAIN ===== -->
  <main>
    <div class="container">
      <div class="section-label">&#9632; Todos los productos</div>

      <div class="products-grid">

        <div class="product-card">
          <div class="card-header">
            <span class="product-number">PRD-001</span>
            <span class="product-badge badge-ps">PlayStation</span>
          </div>
          <div class="card-body">
            <div class="product-name">God of War: Ragnarök</div>
            <div class="product-brand">Sony Interactive Entertainment</div>
            <div class="product-desc">Épica aventura de acción donde Kratos y Atreus enfrentan el apocalipsis nórdico. Combate brutal, historia emocional y mundos majestuosos.</div>
          </div>
          <div class="card-footer">
            <span class="product-price">$249.900</span>
            <button class="btn-add">+ Agregar</button>
          </div>
        </div>

        <div class="product-card">
          <div class="card-header">
            <span class="product-number">PRD-002</span>
            <span class="product-badge badge-xbox">Xbox / PC</span>
          </div>
          <div class="card-body">
            <div class="product-name">Halo Infinite</div>
            <div class="product-brand">343 Industries / Microsoft</div>
            <div class="product-desc">El Master Chief regresa en un shooter de mundo abierto con campaña épica, multijugador free-to-play y modo co-op para cuatro jugadores.</div>
          </div>
          <div class="card-footer">
            <span class="product-price">$189.900</span>
            <button class="btn-add">+ Agregar</button>
          </div>
        </div>

        <div class="product-card">
          <div class="card-header">
            <span class="product-number">PRD-003</span>
            <span class="product-badge badge-nintendo">Nintendo</span>
          </div>
          <div class="card-body">
            <div class="product-name">The Legend of Zelda: TotK</div>
            <div class="product-brand">Nintendo EPD</div>
            <div class="product-desc">Tears of the Kingdom expande el mundo de Hyrule con nuevas mecánicas de construcción, islas en el cielo y profundidades subterráneas inexploradas.</div>
          </div>
          <div class="card-footer">
            <span class="product-price">$269.900</span>
            <button class="btn-add">+ Agregar</button>
          </div>
        </div>

        <div class="product-card">
          <div class="card-header">
            <span class="product-number">PRD-004</span>
            <span class="product-badge badge-pc">PC / PS5</span>
          </div>
          <div class="card-body">
            <div class="product-name">Cyberpunk 2077</div>
            <div class="product-brand">CD Projekt RED</div>
            <div class="product-desc">RPG de acción en la distópica Night City. Personalización extrema, narrativa ramificada y una expansión Phantom Liberty que redefine el juego.</div>
          </div>
          <div class="card-footer">
            <span class="product-price">$159.900</span>
            <button class="btn-add">+ Agregar</button>
          </div>
        </div>

        <div class="product-card">
          <div class="card-header">
            <span class="product-number">PRD-005</span>
            <span class="product-badge badge-multi">Multi</span>
          </div>
          <div class="card-body">
            <div class="product-name">Elden Ring</div>
            <div class="product-brand">FromSoftware / Bandai Namco</div>
            <div class="product-desc">Soulslike de mundo abierto creado con George R.R. Martin. Exploración libre, jefes devastadores y un lore profundo en las Tierras Intermedias.</div>
          </div>
          <div class="card-footer">
            <span class="product-price">$219.900</span>
            <button class="btn-add">+ Agregar</button>
          </div>
        </div>

        <div class="product-card">
          <div class="card-header">
            <span class="product-number">PRD-006</span>
            <span class="product-badge badge-nintendo">Nintendo</span>
          </div>
          <div class="card-body">
            <div class="product-name">Super Mario Bros. Wonder</div>
            <div class="product-brand">Nintendo</div>
            <div class="product-desc">Plataformas 2D que reinventa la fórmula Mario con las semillas Wonder que transforman radicalmente cada nivel. Cooperativo para cuatro jugadores.</div>
          </div>
          <div class="card-footer">
            <span class="product-price">$229.900</span>
            <button class="btn-add">+ Agregar</button>
          </div>
        </div>

      </div>
    </div>
  </main>

  <!-- ===== FOOTER ===== -->
  <footer>
    <div class="footer-inner">
      <div class="footer-logo">&#9654; GAME STORE</div>
      <div class="footer-copy">&copy; 2024 Game Store. Todos los derechos reservados.</div>
      <div class="footer-links">
        <a href="index.html">Catálogo</a>
        <a href="formulario.html">Registrar</a>
      </div>
    </div>
  </footer>

  <!-- ===== TOAST ===== -->
  <div class="toast" id="toast">&#10003; AÑADIDO AL CARRITO</div>

  <script>
    document.querySelectorAll('.btn-add').forEach(btn => {
      btn.addEventListener('click', () => {
        const toast = document.getElementById('toast');
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 2000);
      });
    });
  </script>

</body>
</html>