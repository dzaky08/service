<!-- Sidebar -->
<div class="sidebar" style="background-color: #3D4452;">
    <ul class="nav flex-column">
        <img src="{{ asset('img/logoservis.png') }}" alt="" class="w-100">
        <li>
            <center>
                <h4 style="color: white">SERVICE PRO</h4>
                <h5 style="color: white">1998</h5>
                <hr style="color: white">
            </center>
        </li>
        @if (Auth::user()->role == 'montir')
            <li class="nav-item">
                <a class="nav-link custom-nav-link" style="color: #FFFFFF"
                    href="{{ route('home-montir') }}">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link custom-nav-link" style="color: #FFFFFF"
                    href="{{ route('keranjang') }}">keranjang</a>
            </li>
        @elseif(Auth::user()->role == 'kasir')
            <li class="nav-item">
                <a class="nav-link custom-nav-link" style="color: #FFFFFF"
                    href="{{ route('home-kasir') }}">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link custom-nav-link" style="color: #FFFFFF"
                    href="{{ route('summary') }}">Riwayat Transaksi</a>
            </li>
        @elseif(Auth::user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link custom-nav-link" style="color: #FFFFFF"
                    href="{{ route('dash-admin') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link custom-nav-link" style="color: #FFFFFF"
                    href="{{ route('log-admin') }}">Log</a>
            </li>
            <li class="nav-item">
                <a class="nav-link custom-nav-link" style="color: #FFFFFF"
                    href="{{ route('dash-user') }}">Pengguna</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link custom-nav-link" style="color: #FFFFFF" href="{{ route('home-owner') }}">Beranda</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link custom-nav-link {{ Request::is('owner/sum-owner') ? 'active' : '' }}"
                    href="{{ route('sum-owner') }}">Report</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link custom-nav-link" 
                    href="{{ route('logowner') }}" style="color: #FFFFFF">Log</a>
            </li>
        @endif
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link custom-nav-link" style="color: #FFFFFF">Keluar</a>
        </li>
        <!-- Tambahkan link lainnya sesuai kebutuhan -->
    </ul>
    <hr>
    <div class="footer text-white mt-3">
        &copy; 2024 SERVICE PRO 1998 <br>
        jln. dilan, Sukabumi JAWA BARAT
    </div>
</div>
<!-- End Sidebar -->
