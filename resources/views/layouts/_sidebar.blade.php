<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route ('dashboard.index')}}">
        <div class="">
            <img src="{{ asset('img/logo4.png') }}" alt="PUP LOGO">
        </div>
        <div class="sidebar-brand-text mx-3">Admin Files System</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
    <a class="nav-link" href="{{route ('dashboard.index')}}">
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


    
    @role(Auth::user()->role)
    <li class="nav-item">
       
      
    @if (Auth::user()->role === 'Super Admin')
            @foreach($folders as $folder)
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#{{ $folder->name_id }}"
                aria-expanded="true" aria-controls="{{ $folder->name_id }}">
                <i class="fas fa-fw fa fa-folder"></i>
                <span>{{ $folder->folder_name }}</span>
            </a> 
            <div id="{{ $folder->name_id }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @forelse($folder->subfolders as $subfolder)
                        <a class="collapse-item" href="{{ route('files.index', [$subfolder]) }}">{{ $subfolder->subfolder_name }}</a>
                    @empty
                        <p class="collapse-item text-muted">No Folders</p>
                    @endforelse
                </div>
            </div>
            @endforeach

    @else
        @foreach($folders as $folder)
            @if ($folder->role === Auth::user()->role)
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#{{ $folder->name_id }}"
                aria-expanded="true" aria-controls="{{ $folder->name_id }}">
                <i class="fas fa-fw fa fa-folder"></i>
                <span>{{ $folder->folder_name }}</span>
            </a> 


            <div id="{{ $folder->name_id }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @forelse($folder->subfolders as $subfolder)
                        <a class="collapse-item" href="{{ route('files.index', [$subfolder]) }}">{{ $subfolder->subfolder_name }}</a>
                    @empty
                        <p class="collapse-item text-muted">No Folders</p>
                    @endforelse
                </div>
            </div>
            @endif
        @endforeach
    @endif

    </li>
    @endrole

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    {{-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div> --}}

</ul>