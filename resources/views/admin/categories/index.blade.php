@extends('admin.admin')
@section('admin-content')
<div class="page-title">📂 Gestión de Categorías</div>

@if(session('success'))
<div style="background: rgba(34,197,94,0.2); border: 1px solid #22c55e; color: #22c55e; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
    {{ session('success') }}
</div>
@endif

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <h3 style="color: var(--accent);">Lista de Categorías</h3>
    <a href="{{ route('admin.categories.create') }}" style="background: var(--accent); color: var(--bg); padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 600;">
        ➕ Nueva Categoría
    </a>
</div>

<table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
    <thead>
        <tr style="background: rgba(0,0,0,0.1);">
            <th style="padding: 15px; text-align: left;">ID</th>
            <th style="padding: 15px; text-align: left;">Nombre</th>
            <th style="padding: 15px; text-align: left;">Slug</th>
            <th style="padding: 15px; text-align: left;">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $category)
        <tr style="border-bottom: 1px solid rgba(0,0,0,0.1);">
            <td style="padding: 15px; font-family: 'Orbitron', monospace;">#{{ $category->id }}</td>
            <td style="padding: 15px; font-weight: 600;">{{ $category->name }}</td>
            <td style="padding: 15px; font-family: monospace; color: var(--muted);">{{ $category->slug }}</td>
            <td style="padding: 15px;">
                <a href="{{ route('admin.categories.edit', $category) }}" style="background: var(--accent3); color: white; padding: 6px 12px; border-radius: 6px; font-size: 0.85rem; text-decoration: none; margin-right: 8px;">✏️ Editar</a>
                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" style="display: inline;" onsubmit="return confirm('¿Eliminar esta categoría?')">
                    @csrf @method('DELETE')
                    <button type="submit" style="background: #ef4444; color: white; border: none; padding: 6px 12px; border-radius: 6px; font-size: 0.85rem; cursor: pointer;">🗑️ Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" style="text-align: center; color: var(--muted); padding: 40px;">No hay categorías aún</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div style="margin-top: 30px; display: flex; justify-content: between; align-items: center; gap: 10px;">
    @if($categories->onFirstPage())
        <span style="color: var(--muted); padding: 8px 16px;">← Anterior</span>
    @else
        <a href="{{ $categories->previousPageUrl() }}" style="background: var(--accent3); color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: 500;">← Anterior</a>
    @endif

    <span style="color: var(--accent); font-weight: 600; min-width: 120px; text-align: center;">
        {{ $categories->currentPage() }} de {{ $categories->lastPage() }}
    </span>

    @if($categories->hasMorePages())
        <a href="{{ $categories->nextPageUrl() }}" style="background: var(--accent); color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: 500;">Siguiente →</a>
    @else
        <span style="color: var(--muted); padding: 8px 16px;">Siguiente →</span>
    @endif
</div>
@endsection
