@extends('admin.admin')

@section('admin-content')
<div class="page-title">🛒 Historial de Órdenes</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-number">32</div>
        <div class="stat-label">Total Órdenes</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">$2,500</div>
        <div class="stat-label">Total Ventas</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">28</div>
        <div class="stat-label">Pendientes</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">4</div>
        <div class="stat-label">Completadas</div>
    </div>
</div>

<div class="section-card">
    <h3 class="section-title">📋 Todas las Órdenes</h3>
    
    <div style="margin-bottom: 20px;">
        <input type="text" placeholder="🔍 Buscar por ID, cliente..." 
               style="background: var(--surface); border: 1px solid var(--border); color: var(--text); padding: 12px 16px; border-radius: 8px; width: 300px; font-size: 0.9rem;">
        <select style="background: var(--surface); border: 1px solid var(--border); color: var(--text); padding: 12px 16px; border-radius: 8px; margin-left: 10px;">
            <option>Todas</option>
            <option>Pendiente</option>
            <option>Enviada</option>
            <option>Completada</option>
        </select>
    </div>

    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Productos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="font-family: 'Orbitron', monospace; font-weight: 700;">#1001</td>
                    <td>Juan Pérez</td>
                    <td>16 Mar 2026</td>
                    <td style="color: var(--accent); font-weight: 700;">$89.99</td>
                    <td>
                        <span style="background: rgba(34,197,94,0.2); color: #22c55e; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600;">Completada</span>
                    </td>
                    <td>2 items</td>
                    <td>
                        <button style="background: var(--accent); color: var(--bg); border: none; padding: 6px 12px; border-radius: 6px; font-size: 0.75rem; cursor: pointer; margin-right: 5px;">📄 Detalle</button>
                        <button style="background: #ef4444; color: white; border: none; padding: 6px 12px; border-radius: 6px; font-size: 0.75rem; cursor: pointer;">🗑️</button>
                    </td>
                </tr>
                <tr>
                    <td style="font-family: 'Orbitron', monospace; font-weight: 700;">#1002</td>
                    <td>María Gómez</td>
                    <td>15 Mar 2026</td>
                    <td style="color: var(--accent); font-weight: 700;">$124.50</td>
                    <td>
                        <span style="background: rgba(245,101,101,0.2); color: #f56565; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600;">Pendiente</span>
                    </td>
                    <td>3 items</td>
                    <td>
                        <button style="background: var(--accent); color: var(--bg); border: none; padding: 6px 12px; border-radius: 6px; font-size: 0.75rem; cursor: pointer; margin-right: 5px;">📄 Detalle</button>
                        <button style="background: #ef4444; color: white; border: none; padding: 6px 12px; border-radius: 6px; font-size: 0.75rem; cursor: pointer;">🗑️</button>
                    </td>
                </tr>
                <tr>
                    <td style="font-family: 'Orbitron', monospace; font-weight: 700;">#1003</td>
                    <td>Carlos López</td>
                    <td>14 Mar 2026</td>
                    <td style="color: var(--accent); font-weight: 700;">$67.20</td>
                    <td>
                        <span style="background: rgba(59,130,246,0.2); color: #3b82f6; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600;">Enviada</span>
                    </td>
                    <td>1 item</td>
                    <td>
                        <button style="background: var(--accent); color: var(--bg); border: none; padding: 6px 12px; border-radius: 6px; font-size: 0.75rem; cursor: pointer; margin-right: 5px;">📄 Detalle</button>
                        <button style="background: #ef4444; color: white; border: none; padding: 6px 12px; border-radius: 6px; font-size: 0.75rem; cursor: pointer;">🗑️</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
