@extends('layouts.app')

@section('content')

    <!-- ===== MAIN ===== -->
    <main>
        <div class="container">
            <div class="section-label">&#9632; Todos los productos</div>

            <div style="display: flex; justify-content: center; gap: 20px; margin: 30px 0;">
                @if($miLista->onFirstPage())
                    <span style="background: var(--accent3); color: white; padding: 12px 24px; border-radius: 8px; font-weight: 600;">← Anterior</span>
                @else
                    <a href="{{ $miLista->previousPageUrl() }}" style="background: var(--accent3); color: white; padding: 12px 24px; border-radius: 8px; font-weight: 600; text-decoration: none;">← Anterior</a>
                @endif
    
                @if($miLista->hasMorePages())
                    <a href="{{ $miLista->nextPageUrl() }}" style="background: var(--accent); color: white; padding: 12px 24px; border-radius: 8px; font-weight: 600; text-decoration: none;">Siguiente →</a>
                @else
                    <span style="background: var(--accent3); color: white; padding: 12px 24px; border-radius: 8px; font-weight: 600;">Siguiente →</span>
                @endif
            </div>


            <div class="products-grid">

                @foreach ($miLista as $product)
                <div class="product-card-wrapper">
                    <a href="{{ url('/product/'.$product->id) }}" class="product-card-link">
                        <div class="product-card">
                            <div class="card-header">
                                <img class="card-img" src="{{ asset('img/card.png') }}" alt="">
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
                            </div>
                        </div>
                    </a>
                    <button class="btn-add-cart" onclick="addToCart({{ $product->id }})" 
                    style="width: 100%; margin: 8px 0; padding: 12px; background: var(--accent); color: var(--bg); border: none; font-weight: 700; cursor: pointer;">
                    + Agregar al carrito
                    </button>
                    <form action="{{route('product.destroy', $product) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn-remove" style="width: 100%; margin: 8px 0; padding: 12px; background: var(--accent); color: var(--bg); border: none; font-weight: 700; cursor: pointer;"> - Eliminar</button>
                    </form>
                </div>          
                @endforeach
            </div>
        </div>
    </main>


@endsection
