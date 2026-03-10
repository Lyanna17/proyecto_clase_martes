@extends('layouts.app')

@section('content')

    <!-- ===== MAIN ===== -->
    <main>
        <div class="container">
            <div class="section-label">&#9632; Todos los productos</div>

            <br>
            {{ $miLista->links('pagination::simple-default') }}
            <br>

            <div class="products-grid">

                @foreach ($miLista as $product)
                    <div class="product-card">
                        <div class="card-header">
                            <img class="card-img"
                                src="{{ asset('storage/'.$product->image) }}" alt="">
                            <span class="product-number">PRD-001</span>
                            <span class="product-badge badge-ps">PlayStation</span>
                        </div>
                        <div class="card-body">
                            <div class="product-name">{{ $product->name }}</div>
                            <div class="product-brand">Sony Interactive Entertainment</div>
                            <div class="product-desc">{{ $product->desciption }}</div>
                        </div>
                        <div class="card-footer">
                            <span class="product-price">{{ $product->price }}</span>
                            <button class="btn-add">+ Agregar</button>
                            <form action="{{route('product.destroy', $product) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn-remove">- Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
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
