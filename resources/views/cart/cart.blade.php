@extends('layouts.app')

@section('content')
<div class="container" style="padding: 48px 24px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;">
        <h1 style="font-family: 'Orbitron', monospace; font-size: 2.5rem; background: linear-gradient(135deg, var(--accent), var(--accent3)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Mi Carrito</h1>
        <div style="font-family: 'Orbitron', monospace; color: var(--muted);">
            {{ count(session('cart', [])) }} producto{{ count(session('cart', [])) !== 1 ? 's' : '' }}
        </div>
    </div>

    @if(session('cart') && count(session('cart')) > 0)
        <div class="cart-items" style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; overflow: hidden;">
            @foreach(session('cart') as $id => $item)
                <div style="display: grid; grid-template-columns: 80px 1fr auto auto; gap: 20px; padding: 24px; border-bottom: 1px solid var(--border); align-items: center;">
                    <img src="{{ asset('storage/' . $item['image']) }}" style="width: 80px; height: 100px; object-fit: cover; border-radius: 8px;" alt="{{ $item['name'] }}">
                    
                    <div>
                        <div style="font-family: 'Orbitron', monospace; font-weight: 700; color: var(--text); margin-bottom: 8px;">{{ $item['name'] }}</div>
                        <div style="color: var(--muted); font-size: 0.9rem;">Producto digital</div>
                    </div>
                    
                    <div style="text-align: right;">
                        <div style="font-family: 'Orbitron', monospace; font-size: 1.5rem; color: var(--accent); font-weight: 900;">
                            ${{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                        </div>
                        <div style="font-size: 0.9rem; color: var(--muted);">${{ number_format($item['price'], 0, ',', '.') }} c/u</div>
                    </div>
                    
                    <div style="display: flex; gap: 8px; align-items: center;">
                        <button onclick="updateCart({{ $id }}, {{ $item['quantity'] - 1 }})" style="width: 40px; height: 40px; border: 1px solid var(--border); background: var(--surface); color: var(--text); border-radius: 6px; cursor: pointer;">−</button>
                        <span style="min-width: 30px; text-align: center; font-family: 'Orbitron', monospace;">{{ $item['quantity'] }}</span>
                        <button onclick="updateCart({{ $id }}, {{ $item['quantity'] + 1 }})" style="width: 40px; height: 40px; border: 1px solid var(--border); background: var(--surface); color: var(--text); border-radius: 6px; cursor: pointer;">+</button>
                        <button onclick="removeFromCart({{ $id }})" style="padding: 8px 16px; background: transparent; color: var(--accent2); border: 1px solid var(--accent2); border-radius: 6px; font-family: 'Orbitron', monospace; cursor: pointer;">Eliminar</button>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="margin-top: 40px; display: grid; grid-template-columns: 1fr auto; gap: 40px;">
            <div style="background: var(--surface); padding: 32px; border: 1px solid var(--border); border-radius: 12px;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                    <span style="color: var(--text);">Total:</span>
                    <span style="font-family: 'Orbitron', monospace; font-size: 2rem; color: var(--accent); font-weight: 900;">${{ number_format($total, 0, ',', '.') }}</span>
                </div>
                <button onclick="checkout()" style="width: 100%; padding: 20px; background: linear-gradient(135deg, var(--accent3), var(--accent)); color: var(--bg); border: none; border-radius: 8px; font-family: 'Orbitron', monospace; font-size: 1.1rem; font-weight: 700; cursor: pointer; transition: all 0.3s;">
                    ► FINALIZAR COMPRA
                </button>
            </div>
        </div>
    @else
        <div style="text-align: center; padding: 80px 40px; background: var(--card); border: 2px dashed var(--border); border-radius: 12px;">
            <div style="font-size: 6rem; margin-bottom: 24px;">🛒</div>
            <h2 style="font-family: 'Orbitron', monospace; color: var(--text); margin-bottom: 16px;">Tu carrito está vacío</h2>
            <p style="color: var(--muted); margin-bottom: 32px;">¡Añade algunos juegos geniales para empezar!</p>
            <a href="{{ route('product.index') }}" style="display: inline-block; padding: 16px 32px; background: linear-gradient(135deg, var(--accent3), var(--accent)); color: var(--bg); text-decoration: none; border-radius: 8px; font-family: 'Orbitron', monospace; font-weight: 700;">Explorar Tienda</a>
        </div>
    @endif
</div>

<script>
function addToCart(productId) {
    fetch('{{ route("cart.add") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ product_id: productId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.querySelector('.cart-count').textContent = data.totalItems;
            showToast('¡Producto añadido al carrito!');
        }
    });
}

function removeFromCart(productId) {
    fetch('{{ route("cart.remove") }}', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ product_id: productId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) location.reload();
    });
}

function updateCart(productId, quantity) {
    fetch('{{ route("cart.update") }}', {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ product_id: productId, quantity: quantity })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) location.reload();
    });
}

function clearCart() {
    if (confirm('¿Vaciar todo el carrito?')) {
        window.location.href = '{{ route("cart.clear") }}';
    }
}

function checkout() {
    alert('🚀 Checkout próximamente!');
}
</script>
@endsection
