@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameStore Digital ⚡ | Tu Tienda de Videojuegos Digitales</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
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
            overflow-x: hidden;
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

        /* HERO SECTION */
        .hero {
            position: relative;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0 24px;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 80% 50% at 20% 30%, rgba(0,245,212,0.1) 0%, transparent 50%),
                        radial-gradient(ellipse 60% 40% at 80% 70%, rgba(123,45,255,0.1) 0%, transparent 50%);
            z-index: 1;
        }
        .hero-content { position: relative; z-index: 2; max-width: 800px; }
        .hero-badge {
            font-family: 'Orbitron', monospace;
            font-size: 12px;
            letter-spacing: 4px;
            color: var(--accent);
            border: 1px solid var(--accent);
            padding: 8px 20px;
            margin-bottom: 24px;
            text-transform: uppercase;
            animation: blink 2s step-end infinite;
            display: inline-block;
        }
        @keyframes blink {
            0%,100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        .hero-title {
            font-family: 'Orbitron', monospace;
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 900;
            letter-spacing: 4px;
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent3) 50%, var(--accent2) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 16px;
            animation: glowText 2s ease-in-out infinite alternate;
        }
        @keyframes glowText {
            from { filter: drop-shadow(0 0 20px rgba(0,245,212,0.5)); }
            to { filter: drop-shadow(0 0 30px rgba(0,245,212,0.8)); }
        }
        .hero-subtitle {
            font-size: 1.3rem;
            color: var(--muted);
            letter-spacing: 2px;
            margin-bottom: 40px;
            max-width: 600px;
        }
        .hero-buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .btn-hero {
            font-family: 'Orbitron', monospace;
            font-size: 1rem;
            font-weight: 700;
            padding: 18px 36px;
            border: none;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: all 0.3s;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--accent3), var(--accent));
            color: var(--bg);
            box-shadow: var(--glow-strong);
        }
        .btn-primary:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0,245,212,0.4);
        }
        .btn-secondary {
            background: transparent;
            color: var(--accent);
            border: 2px solid var(--accent);
        }
        .btn-secondary:hover {
            background: var(--accent);
            color: var(--bg);
            box-shadow: var(--glow-strong);
        }

        /* SECTIONS */
        .section {
            padding: 100px 24px;
            max-width: 1400px;
            margin: 0 auto;
        }
        .section-label {
            font-family: 'Orbitron', monospace;
            font-size: 0.8rem;
            letter-spacing: 4px;
            color: var(--muted);
            text-transform: uppercase;
            margin-bottom: 40px;
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

        /* FEATURED GRID */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
            margin-top: 40px;
        }
        .product-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s;
            cursor: pointer;
            position: relative;
        }
        .product-card:hover {
            transform: translateY(-8px);
            border-color: var(--accent);
            box-shadow: var(--glow-strong);
        }
        .card-header {
            position: relative;
            height: 180px;
            overflow: hidden;
        }
        .card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }
        .product-card:hover .card-img {
            transform: scale(1.05);
        }
        .product-number {
            position: absolute;
            top: 12px;
            left: 12px;
            font-family: 'Orbitron', monospace;
            font-size: 0.65rem;
            color: var(--muted);
            background: rgba(0,0,0,0.7);
            padding: 4px 8px;
            border-radius: 3px;
        }
        .product-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            font-size: 0.65rem;
            font-weight: 600;
            letter-spacing: 1px;
            padding: 6px 10px;
            border-radius: 3px;
        }
        .badge-ps {
            background: rgba(0,100,210,0.2);
            color: #4da6ff;
            border: 1px solid rgba(0,100,210,0.4);
        }
        .card-body {
            padding: 20px;
        }
        .product-name {
            font-family: 'Orbitron', monospace;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 8px;
            line-height: 1.3;
        }
        .product-desc {
            color: var(--muted);
            font-size: 0.85rem;
            line-height: 1.5;
            margin-bottom: 16px;
        }
        .card-footer {
            padding: 0 20px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .product-price {
            font-family: 'Orbitron', monospace;
            font-size: 1.3rem;
            font-weight: 900;
            color: var(--accent);
        }
        .btn-add {
            background: var(--accent);
            color: var(--bg);
            border: none;
            padding: 10px 20px;
            font-family: 'Orbitron', monospace;
            font-size: 0.8rem;
            font-weight: 700;
            cursor: pointer;
            border-radius: 4px;
            transition: all 0.2s;
        }
        .btn-add:hover {
            box-shadow: var(--glow);
            transform: scale(1.05);
        }

        /* STATS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin: 60px 0;
            text-align: center;
        }
        .stat-item h3 {
            font-family: 'Orbitron', monospace;
            font-size: 2.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--accent), var(--accent3));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
        }
        .stat-item p {
            color: var(--muted);
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        /* DEALS SECTION */
        .deals-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
            margin-top: 40px;
        }
        .deal-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: linear-gradient(135deg, var(--accent2), #ff6b9d);
            color: white;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 6px 12px;
            border-radius: 20px;
            animation: pulse 2s infinite;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .hero-buttons { flex-direction: column; align-items: center; }
            .btn-hero { min-width: 250px; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
    </style>
</head>
<body>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-badge">Tienda Digital 2026</div>
            <h1 class="hero-title">GameStore Digital</h1>
            <p class="hero-subtitle">Los mejores videojuegos digitales entregados al instante. Más de 500 títulos disponibles para PS5, Xbox, PC y Nintendo Switch.</p>
            <div class="hero-buttons">
                <a href="{{ route('product.index') }}" class="btn-hero btn-primary">Explorar Catálogo</a>
                <a href="#featured" class="btn-hero btn-secondary">Ver Ofertas</a>
            </div>
        </div>
    </section>

    <!-- FEATURED PRODUCTS -->
    <section class="section" id="featured">
        <div class="section-label">
            <span>⚡</span>
            Productos Destacados
        </div>
        <div class="products-grid">
            @forelse($featured as $product)
                <a href="{{ route('product.show', $product->id) }}" class="product-card">
                    <div class="card-header">
                        <img class="card-img" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        <span class="product-number">PRD-{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}</span>
                        <span class="product-badge badge-ps">{{ $product->category->name ?? 'Gaming' }}</span>
                    </div>
                    <div class="card-body">
                        <div class="product-name">{{ Str::limit($product->name, 40) }}</div>
                        <div class="product-desc">{{ Str::limit($product->desciption, 80) }}</div>
                    </div>
                    <div class="card-footer">
                        <span class="product-price">${{ number_format($product->price, 0, ',', '.') }}</span>
                        <button class="btn-add">+ Comprar</button>
                    </div>
                </a>
            @empty
                <div class="product-card" style="grid-column: 1/-1; text-align: center; padding: 40px;">
                    <h3>No hay productos destacados aún</h3>
                    <a href="{{ route('product.index') }}" class="btn-hero btn-primary" style="margin-top: 20px;">Ver Todos</a>
                </div>
            @endforelse
        </div>
    </section>

    <!-- STATS -->
    <section class="section">
        <div class="stats-grid">
            <div class="stat-item">
                <h3>+{{ $totalProducts }}</h3>
                <p>Títulos Disponibles</p>
            </div>
            <div class="stat-item">
                <h3>24/7</h3>
                <p>Entrega Instantánea</p>
            </div>
            <div class="stat-item">
                <h3>100%</h3>
                <p>Digital & Seguro</p>
            </div>
            <div class="stat-item">
                <h3>⭐ 4.9</h3>
                <p>Valoración Clientes</p>
            </div>
        </div>
    </section>

    <!-- DEALS -->
    <section class="section">
        <div class="section-label">
            <span>🔥</span>
            Ofertas del Día
        </div>
        @if($deals->count() > 0)
        <div class="deals-grid">
            @foreach($deals as $product)
                <a href="{{ route('product.show', $product->id) }}" class="product-card">
                    <div class="deal-badge">-25%</div>
                    <div class="card-header">
                        <img class="card-img" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        <span class="product-number">PRD-{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="card-body">
                        <div class="product-name">{{ Str::limit($product->name, 35) }}</div>
                        <div class="product-desc">{{ Str::limit($product->desciption, 70) }}</div>
                    </div>
                    <div class="card-footer">
                        <span class="product-price">${{ number_format($product->price, 0, ',', '.') }}</span>
                        <button class="btn-add">Comprar Oferta</button>
                    </div>
                </a>
            @endforeach
        </div>
        @else
            <p style="text-align: center; color: var(--muted);">No hay ofertas disponibles ahora mismo</p>
        @endif
    </section>

</body>
</html>
@endsection
