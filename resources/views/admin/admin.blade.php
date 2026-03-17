<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Game Store</title>
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
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            background: var(--bg); 
            font-family: 'Rajdhani', sans-serif; 
            color: var(--text); 
            overflow-x: hidden;
            display: flex; min-height: 100vh;
        }

        /* SIDEBAR */
        aside {
            width: 250px; 
            background: var(--surface);
            padding: 30px 20px;
            border-right: 1px solid var(--border);
            box-shadow: 4px 0 20px rgba(0,0,0,0.3);
        }
        .sidebar-title {
            font-family: 'Orbitron', monospace;
            font-size: 1.1rem; font-weight: 900;
            background: linear-gradient(45deg, var(--accent), var(--accent3));
            -webkit-background-clip: text; background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 40px; padding-bottom: 15px;
            border-bottom: 1px solid var(--border);
            letter-spacing: 2px;
        }
        .sidebar-nav {
            display: flex; flex-direction: column; gap: 8px;
        }
        .nav-link {
            color: var(--muted); text-decoration: none;
            padding: 14px 18px; border-radius: 8px;
            font-family: 'Orbitron', monospace;
            font-size: 0.8rem; font-weight: 600;
            letter-spacing: 1px; text-transform: uppercase;
            transition: all 0.3s; position: relative;
            border: 1px solid transparent;
        }
        .nav-link:hover, .nav-link.active {
            background: linear-gradient(135deg, var(--accent), var(--accent3));
            color: var(--bg); border-color: var(--accent);
            box-shadow: var(--glow); transform: translateX(4px);
        }
        .nav-link .icon { margin-right: 10px; font-size: 1rem; }

        /* MAIN CONTENT */
        main {
            flex: 1; padding: 40px; background: var(--bg);
        }
        .page-title {
            font-family: 'Orbitron', monospace;
            font-size: 2.2rem; font-weight: 900;
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent3) 50%, var(--accent2) 100%);
            -webkit-background-clip: text; background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 40px; letter-spacing: 1px;
        }
        .stats-grid {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px; margin-bottom: 40px;
        }
        .stat-card {
            background: var(--card); 
            padding: 30px 25px;
            border-radius: 16px; 
            border: 1px solid var(--border);
            transition: all 0.3s; 
            text-align: center;
            position: relative; overflow: hidden;
        }
        .stat-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0;
            height: 3px; background: linear-gradient(90deg, var(--accent3), var(--accent), var(--accent2));
            opacity: 0; transition: opacity 0.3s;
        }
        .stat-card:hover {
            border-color: var(--accent); 
            box-shadow: 0 20px 40px rgba(0,245,212,0.15);
            transform: translateY(-6px);
        }
        .stat-card:hover::before { opacity: 1; }
        .stat-number { 
            font-family: 'Orbitron', monospace;
            font-size: 2.8rem; font-weight: 900; 
            color: var(--accent); margin-bottom: 8px;
            text-shadow: var(--glow);
        }
        .stat-label { 
            font-size: 0.95rem; color: var(--muted); 
            font-weight: 500; letter-spacing: 1px;
            text-transform: uppercase;
        }
        .section-card {
            background: var(--card); padding: 30px;
            border-radius: 16px; border: 1px solid var(--border);
            margin-bottom: 24px;
        }
        .section-title {
            font-family: 'Orbitron', monospace; font-size: 1.2rem;
            color: var(--accent); margin-bottom: 20px;
            letter-spacing: 1px; text-transform: uppercase;
        }
        table { width: 100%; border-collapse: collapse; color: var(--text); }
        th, td { padding: 12px 16px; text-align: left; border-bottom: 1px solid var(--border); }
        th { color: var(--accent); font-weight: 600; font-size: 0.85rem; letter-spacing: 1px; text-transform: uppercase; }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <aside>
        <div class="sidebar-title">🎮 ADMIN PANEL</div>
        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"> <span class="icon">📊</span>Dashboard</a>
            <a href="{{ route('admin.orders') }}" class="nav-link {{ request()->is('admin/orders') ? 'active' : '' }}"> <span class="icon">🛒</span>Órdenes </a>
            <a href="#" class="nav-link"> <span class="icon">👤</span>Usuarios </a>
            <a href="#" class="nav-link"> <span class="icon">📂</span>Categorías </a>
            <a href="{{ route('product.index') }}" class="nav-link"> <span class="icon">🎮</span>Productos </a>
        </nav>
    </aside>

    <!-- CONTENIDO -->
    <main>
        @yield('admin-content')
    </main>

</body>
</html>
