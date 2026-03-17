@extends('admin.admin')

@section('admin-content')
<div class="page-title">📊 Dashboard Administrativo</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-number">127</div>
        <div class="stat-label">Total Productos</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">54</div>
        <div class="stat-label">Usuarios Activos</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">32</div>
        <div class="stat-label">Nuevas Órdenes</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">$2,500</div>
        <div class="stat-label">Ventas Mes</div>
    </div>
</div>

<div class="section-card">
    <h3 class="section-title">👥 Últimos Usuarios</h3>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha Registro</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Admin Master</strong></td>
                <td>admin@gamestore.com</td>
                <td>15 Mar 2026</td>
                <td style="color: var(--accent);">Admin</td>
            </tr>
            <tr>
                <td>Juan Pérez</td>
                <td>juan@email.com</td>
                <td>14 Mar 2026</td>
                <td>Cliente</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
