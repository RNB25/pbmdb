<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-header">
        <h3>Superadmin Panel</h3>
    </div>
    <ul class="sidebar-menu">
        <li class="sidebar-item {{ request()->is('superadmin/dashboard') ? 'active' : '' }}">
            <a href="{{ route('superadmin.registrasi-users.index') }}" class="sidebar-link">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        {{-- <li class="sidebar-item {{ request()->is('superadmin/users*') ? 'active' : '' }}">
            <a href="{{ route('superadmin.users.index') }}" class="sidebar-link">
                <i class="fas fa-users"></i>
                <span>User Management</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->is('superadmin/registrasi*') ? 'active' : '' }}">
            <a href="{{ route('superadmin.registrasi.index') }}" class="sidebar-link">
                <i class="fas fa-user-plus"></i>
                <span>Registrasi</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->is('superadmin/settings*') ? 'active' : '' }}">
            <a href="{{ route('superadmin.settings') }}" class="sidebar-link">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
        </li> --}}
    </ul>
</div>

<style>
.sidebar {
    width: 250px;
    height: 100vh;
    background-color: #2c3e50;
    color: #fff;
    position: fixed;
    left: 0;
    top: 0;
    padding: 20px 0;
}

.sidebar-header {
    padding: 0 20px 20px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.sidebar-header h3 {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
}

.sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 20px 0 0;
}

.sidebar-item {
    margin: 5px 0;
}

.sidebar-link {
    display: flex;
    align-items: center;
    padding: 12px 20px;
    color: #fff;
    text-decoration: none;
    transition: all 0.3s ease;
}

.sidebar-link:hover {
    background-color: rgba(255,255,255,0.1);
    color: #fff;
}

.sidebar-item.active .sidebar-link {
    background-color: #3498db;
    color: #fff;
}

.sidebar-link i {
    margin-right: 10px;
    width: 20px;
    text-align: center;
}

.sidebar-link span {
    font-size: 0.9rem;
}
</style>
