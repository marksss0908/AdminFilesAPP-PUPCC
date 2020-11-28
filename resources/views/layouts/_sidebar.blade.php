<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Folders
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        @foreach($menus as $menu)
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#{{ $menu->name_id }}"
                aria-expanded="true" aria-controls="{{ $menu->name_id }}">
                <i class="fas fa-fw fa-cog"></i>
                <span>{{ $menu->folder_name }}</span>
            </a> 
            <div id="{{ $menu->name_id }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @foreach($menu->subfolders as $subfolder)
                        <a class="collapse-item" href="buttons.html">{{ $subfolder->subfolder_name }}</a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>