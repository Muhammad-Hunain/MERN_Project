 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center mb-3 mt-3" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon sidebar_logo">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img src="{{ asset('assets/logo/logo.jpg') }}" alt="logo" >
        </div>
        {{-- <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> --}}
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $activeMenu == 'dashboard'?'active':'' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li>

    @if (Auth::user()->type == 'admin')
        
    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('Manage') }}
    </div>

    <!-- users -->
    <li class="nav-item {{ $activeMenu == 'users' || $activeMenu == 'create_user'?'active':'' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#userCollapse"
        aria-expanded="true" aria-controls="userCollapse">
        <i class="fas fa-users fa-cog"></i>
        <span>{{ __('Users') }}</span>
    </a>
    <div id="userCollapse" class="collapse {{ $activeMenu == 'users' || $activeMenu == 'create_user'?'show':'' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
            <a class="collapse-item {{ $activeMenu == 'create_user'?'active':'' }}" href="{{ route('users.create') }}">{{ __('Create') }}</a>
            <a class="collapse-item {{ $activeMenu == 'users'?'active':'' }}" href="{{ route('users.index') }}">{{ __('List') }}</a>
            </div>
        </div>
    </li>
    
    <!-- categories -->
    <li class="nav-item {{ $activeMenu == 'categories' || $activeMenu == 'create_category'?'active':'' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#catCollapse"
            aria-expanded="true" aria-controls="catCollapse">
            <i class="fas fa-list fa-cog"></i>
            <span>{{ __('Projects') }}</span>
        </a>
        <div id="catCollapse" class="collapse {{ $activeMenu == 'categories' || $activeMenu == 'create_category'?'show':'' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item {{ $activeMenu == 'create_category'?'active':'' }}" href="{{ route('project.create') }}">{{ __('Create') }}</a>
                <a class="collapse-item {{ $activeMenu == 'categories'?'active':'' }}" href="{{ route('project.index') }}">{{ __('List') }}</a>
            </div>
        </div>
    </li>
    
    @endif


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
