<!-- Sidebar -->
<div class="sidebar">
    <ul class="nav flex-column">
        <li>
            <img src="{{asset('img/montir1.png')}}" alt="" class="img-fluid">
        </li>
        @if (Auth::user()->role == 'montir')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('home-montir') ? 'active' : '' }}" href="{{route('home-montir')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('home-montir') ? 'active' : '' }}" href="{{route('keranjang')}}">Chart</a>
            </li>
        @elseif(Auth::user()->role == 'kasir')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('home-montir') ? 'active' : '' }}" href="{{route('home-kasir')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('home-montir') ? 'active' : '' }}" href="{{route('summary')}}">Summary</a>
            </li>
        @elseif(Auth::user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('home-montir') ? 'active' : '' }}" href="{{route('dash-admin')}}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('home-montir') ? 'active' : '' }}" href="{{route('log-admin')}}">Log</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('home-montir') ? 'active' : '' }}" href="{{route('dash-user')}}">User</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link {{ Request::is('owner/home-owner') ? 'active' : '' }}" href="{{route('home-owner')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('owner/sum-owner') ? 'active' : '' }}" href="{{route('sum-owner')}}">Report</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('owner/logowner') || Request::is('owner/log/filter') ? 'active' : '' }}" href="{{route('logowner')}}">Log</a>
            </li>
        @endif
        <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">Logout</a>
        </li>
        <!-- Tambahkan link lainnya sesuai kebutuhan -->
    </ul>
</div>
<!-- End Sidebar -->
