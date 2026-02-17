<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Game Store — Registrar Producto</title>
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
      max-width: 860px;
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

    /* ===================== FORM ===================== */
    .form-section {
      background: var(--card);
      border: 1px solid var(--border);
      padding: 40px;
      position: relative;
    }
    .form-section::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 2px;
      background: linear-gradient(90deg, var(--accent2), var(--accent3), var(--accent));
    }
    .form-title {
      font-family: 'Orbitron', monospace;
      font-size: 1rem;
      font-weight: 700;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: #fff;
      margin-bottom: 8px;
    }
    .form-subtitle {
      font-size: 0.9rem;
      color: var(--muted);
      margin-bottom: 32px;
      letter-spacing: 0.5px;
    }
    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }
    .form-group {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }
    .form-group.full { grid-column: 1 / -1; }
    label {
      font-size: 0.8rem;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--muted);
      font-weight: 600;
    }
    input, select, textarea {
      background: var(--surface);
      border: 1px solid var(--border);
      color: var(--text);
      font-family: 'Rajdhani', sans-serif;
      font-size: 1rem;
      padding: 12px 16px;
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s;
      width: 100%;
    }
    input::placeholder, textarea::placeholder { color: #374151; }
    input:focus, select:focus, textarea:focus {
      border-color: var(--accent);
      box-shadow: 0 0 0 1px var(--accent), inset 0 0 20px rgba(0,245,212,0.03);
    }
    select {
      appearance: none;
      cursor: pointer;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%2364748b' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 16px center;
      padding-right: 40px;
    }
    select option { background: var(--surface); }
    textarea { resize: vertical; min-height: 110px; }
    .form-actions {
      display: flex;
      gap: 12px;
      margin-top: 28px;
    }
    .btn-submit {
      background: linear-gradient(135deg, var(--accent3), var(--accent));
      border: none;
      color: var(--bg);
      font-family: 'Orbitron', monospace;
      font-size: 0.75rem;
      font-weight: 700;
      letter-spacing: 3px;
      text-transform: uppercase;
      padding: 14px 32px;
      cursor: pointer;
      transition: all 0.3s;
    }
    .btn-submit:hover {
      box-shadow: 0 0 30px rgba(0,245,212,0.4);
      transform: translateY(-2px);
    }
    .btn-reset {
      background: transparent;
      border: 1px solid var(--border);
      color: var(--muted);
      font-family: 'Orbitron', monospace;
      font-size: 0.75rem;
      font-weight: 700;
      letter-spacing: 3px;
      text-transform: uppercase;
      padding: 14px 24px;
      cursor: pointer;
      transition: all 0.2s;
    }
    .btn-reset:hover { border-color: var(--muted); color: var(--text); }
    .btn-back {
      background: transparent;
      border: 1px solid var(--border);
      color: var(--muted);
      font-family: 'Orbitron', monospace;
      font-size: 0.75rem;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      padding: 14px 24px;
      cursor: pointer;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.2s;
      margin-left: auto;
    }
    .btn-back:hover { border-color: var(--accent); color: var(--accent); }

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
      .form-grid { grid-template-columns: 1fr; }
      .form-section { padding: 24px; }
      .footer-inner { flex-direction: column; text-align: center; }
      .nav-stat { display: none; }
      .form-actions { flex-wrap: wrap; }
      .btn-back { margin-left: 0; }
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
      <a href="index.html" class="nav-link">
        <span class="icon">&#9776;</span> Catálogo
      </a>
      <a href="formulario.html" class="nav-link active">
        <span class="icon">&#43;</span> Registrar Producto
      </a>
      <div class="nav-spacer"></div>
      <div class="nav-stat">Productos: <span>06</span></div>
    </div>
  </nav>

  <!-- ===== MAIN ===== -->
  <main>
    <div class="container">
      <div class="section-label">&#9632; Registrar nuevo producto</div>

      <div class="form-section">
        <div class="form-title">Nuevo Producto</div>
        <div class="form-subtitle">Completa los campos para agregar un videojuego al catálogo.</div>

        <form id="productForm" onsubmit="handleSubmit(event)">
          <div class="form-grid">

            <div class="form-group">
              <label for="nombre">Nombre del Producto</label>
              <input type="text" id="nombre" name="nombre" placeholder="Ej: Spider-Man 2" required>
            </div>

            <div class="form-group">
              <label for="marca">Marca / Desarrolladora</label>
              <input type="text" id="marca" name="marca" placeholder="Ej: Insomniac Games" required>
            </div>

            <div class="form-group">
              <label for="precio">Precio (COP)</label>
              <input type="number" id="precio" name="precio" placeholder="Ej: 249900" min="0" required>
            </div>

            <div class="form-group">
              <label for="plataforma">Plataforma</label>
              <select id="plataforma" name="plataforma" required>
                <option value="" disabled selected>Seleccionar plataforma</option>
                <option value="ps5">PlayStation 5</option>
                <option value="ps4">PlayStation 4</option>
                <option value="xbox-series">Xbox Series X/S</option>
                <option value="xbox-one">Xbox One</option>
                <option value="nintendo-switch">Nintendo Switch</option>
                <option value="pc">PC (Steam / Epic)</option>
                <option value="multi">Multiplataforma</option>
              </select>
            </div>

            <div class="form-group">
              <label for="genero">Género</label>
              <select id="genero" name="genero">
                <option value="" disabled selected>Seleccionar género</option>
                <option>Acción / Aventura</option>
                <option>RPG</option>
                <option>Shooter</option>
                <option>Plataformas</option>
                <option>Estrategia</option>
                <option>Deportes</option>
                <option>Terror</option>
                <option>Simulación</option>
                <option>Peleas</option>
              </select>
            </div>

            <div class="form-group">
              <label for="año">Año de Lanzamiento</label>
              <input type="number" id="año" name="año" placeholder="Ej: 2024" min="1970" max="2030">
            </div>

            <div class="form-group full">
              <label for="descripcion">Descripción Breve</label>
              <textarea id="descripcion" name="descripcion" placeholder="Describe el juego en pocas palabras..." required></textarea>
            </div>

          </div>

          <div class="form-actions">
            <button type="submit" class="btn-submit">Registrar Producto</button>
            <button type="reset" class="btn-reset">Limpiar</button>
            <a href="index.html" class="btn-back">&#8592; Volver</a>
          </div>
        </form>
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
  <div class="toast" id="toast">&#10003; PRODUCTO REGISTRADO</div>

  <script>
    function handleSubmit(e) {
      e.preventDefault();
      const toast = document.getElementById('toast');
      toast.classList.add('show');
      setTimeout(() => toast.classList.remove('show'), 3000);
      e.target.reset();
    }
  </script>

</body>
</html>