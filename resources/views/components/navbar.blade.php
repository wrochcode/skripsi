<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                {{-- <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;"> --}}
                <img class="img-fluid" src="{{URL::asset('img/icon-deal.png')}}" alt="Icon" style="width: 30px; height: 30px;">
            </div>
            <a href="/"><h1 class="m-0 text-primary">{{ $namecompany->value }}</h1></a>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                @foreach ($navbar as $item => $url)
                <li>
                    <a class="nav-item nav-link" href="{{ $url }}">{{ $item }}</a>
                </li>
                @endforeach
            {{-- </div> --}}
            @guest
                <li>
                    <a href="{{ route('daftar') }}" class="nav-item nav-link">Daftar</a>
                </li>
                <li>
                    <a href="{{ route('masuk') }}" class="nav-item nav-link">Masuk</a>
                </li>
            </div>
            @else
                <li>
                    <a href="{{ route('user.index') }}" class="nav-item nav-link">Profilku</a>
                </li>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ Auth::user()->username }}</a>
                    <div class="dropdown-menu dropdown-menu-end rounded-0 m-0">
                        <a href="{{ route('user.profile') }}" class="dropdown-item">Pengaturan Akun</a>
                        <a href="{{ route('logout') }}" class="dropdown-item">keluar</a>
                    </div>
                </div>
            </div>
            @endguest
        </div>
    </nav>
</div>
<!-- Navbar End -->