<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route("guest.index") }}">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- logo --}}
        </div>
        <div class="sidebar-brand-text mx-3">Torna al sito</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route("admin.apartments.index") }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-home"></i>
            <span>Annunci</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Azioni</h6>
                <a class="collapse-item" href="{{ route('admin.apartments.create') }}">Nuovo annuncio</a>
                <a class="collapse-item" href="{{ route('admin.apartments.index') }}">Lista annunci</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{ url('admin/message') }}" target="_self"
            aria-expanded="true">
            <i class="fas fa-envelope"></i>
            <span>Messaggi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="#"
            aria-expanded="true">
            <i class="fas fa-chart-area"></i>
            <span>Statistiche</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
