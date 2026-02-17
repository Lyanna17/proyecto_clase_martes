@extends('layouts.app')

@section('content')

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

@endsection