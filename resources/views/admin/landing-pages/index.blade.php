@extends('admin.admin')
@section('admin-content')
<div class="page-title">🌐 Gestión de Landing Pages</div>

@if(session('success'))
<div style="background: rgba(34,197,94,0.2); border: 1px solid #22c55e; color: #22c55e; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
    {{ session('success') }}
</div>
@endif

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <h3 style="color: var(--accent);">Lista de Landing Pages</h3>
    <a href="{{ route('admin.landing-pages.create') }}" style="background: var(--accent); color: var(--bg); padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 600;">
        ➕ Nueva Landing
    </a>
</div>

<table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
    <thead>
        <tr style="background: rgba(0,0,0,0.1);">
            <th style="padding: 15px; text-align: left;">ID</th>
            <th style="padding: 15px; text-align: left;">Título</th>
            <th style="padding: 15px; text-align: left;">Estado</th>
            <th style="padding: 15px; text-align: left;">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pages as $page)
        <tr style="border-bottom: 1px solid rgba(0,0,0,0.1);">
            <td style="padding: 15px; font-family: 'Orbitron', monospace;">#{{ $page->id }}</td>
            <td style="padding: 15px; font-weight: 600;">{{ Str::limit($page->title, 40) }}</td>
            <td style="padding: 15px;">
                <span style="background: {{ $page->is_active ? 'rgba(34,197,94,0.2)' : 'rgba(239,68,68,0.2)' }}; color: {{ $page->is_active ? '#22c55e' : '#ef4444' }}; padding: 4px 12px; border-radius: 20px; font-size: 0.8rem;">
                    {{ $page->is_active ? '🟢 Activa' : '🔴 Inactiva' }}
                </span>
            </td>
            <td style="padding: 15px;">
                <a href="{{ route('admin.landing-pages.edit', $page) }}" style="background: var(--accent3); color: white; padding: 6px 12px; border-radius: 6px; font-size: 0.85rem; text-decoration: none; margin-right: 8px;">✏️ Editar</a>
                <form method="POST" action="{{ route('admin.landing-pages.destroy', $page) }}" style="display: inline;" onsubmit="return confirm('¿Eliminar esta landing?')">
                    @csrf @method('DELETE')
                    <button type="submit" style="background: #ef4444; color: white; border: none; padding: 6px 12px; border-radius: 6px; font-size: 0.85rem; cursor: pointer;">🗑️ Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" style="text-align: center; color: var(--muted); padding: 40px;">No hay landing pages</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center; gap: 10px;">
    @if($pages->onFirstPage())
        <span style="color: var(--muted); padding: 8px 16px; border-radius: 6px; background: rgba(0,0,0,0.05);">← Anterior</span>
    @else
        <a href="{{ $pages->previousPageUrl() }}" style="background: var(--accent3); color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: 500;">← Anterior</a>
    @endif

    <div style="color: var(--accent); font-weight: 600; min-width: 120px; text-align: center;">
        Mostrando {{ $pages->firstItem() ?? 0 }} a {{ $pages->lastItem() }} 
        de {{ $pages->total() }} resultados
    </div>

    @if($pages->hasMorePages())
        <a href="{{ $pages->nextPageUrl() }}" style="background: var(--accent); color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: 500;">Siguiente →</a>
    @else
        <span style="color: var(--muted); padding: 8px 16px; border-radius: 6px; background: rgba(0,0,0,0.05);">Siguiente →</span>
    @endif
</div>
@endsection
