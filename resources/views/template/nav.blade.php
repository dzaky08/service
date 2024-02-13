<nav class="navbar navbar-expand border-bottom" style="background-color: #2A3132;">
    <a href="" class="nav navbar-brand nav-link text-white">Bengkel Abdul Kasim</a>
        @if (auth()->user()->role == 'admin')
            <a href="{{route('dash-admin')}}" class="nav nav-link text-white">Home</a>
            {{-- <a href="{{}}" class="nav nav-link text-white">Summary</a> --}}
            <a href="{{route('log-admin')}}" class="nav nav-link text-white">Log</a>
            <a href="{{route('dash-user')}}" class="nav nav-link text-white">User</a>
        @elseif (auth()->user()->role == 'montir')
            <a href="{{ route('home-montir') }}" class="nav navbar nav-link text-white">Home</a>
            <a href="{{ route('keranjang') }}" class="nav nav-link text-white">Keranjang</a>
        @elseif (auth()->user()->role == 'kasir')
            <a href="{{ route('home-kasir') }}" class="nav nav-link text-white">Home</a>
            <a href="{{route('summary')}}" class="nav nav-link text-white">Summary</a>
        @else
            <a href="{{route('home-owner')}}" class="nav nav-link text-white">Home</a>
            <a href="{{route('logowner')}}" class="nav nav-link text-white">Log</a>
        @endif
        <form class="btn-outline d-flex" role="search" method="GET" action="{{ route('logout') }}">
            @csrf
            <button class="btn text-white" type="submit">Logout</button>
        </form>
</nav>
