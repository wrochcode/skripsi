<x-app-layout title="daftar">
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="text-start ms-5 mx-auto mb-5 fadeInUp" data-wow-delay="0.1s">
                    <h1 class="mb-1">Akun ku</h1>
                    <p>{{ Auth::user()->username }}, Umur: {{ $profiluser->age }} tahun, Berat saya :{{ $profiluser->weight }} Kg <br>
                    @php
                        if($profiluser->weight == 0 || $profiluser->height == 0 ||$profiluser->age == 0){
                            echo '<small class="text-danger">*ubah profil anda pada menu pengaturan</small>';
                        }
                    @endphp</p>
                </div>
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-8 text-start ms-4 slideInRight" data-wow-delay="0.1s">
                        <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary" href="{{ route('user.index') }}">Kebutuhan Anda</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary" href="{{ route('user.menu') }}">Menu Rekomendasi</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary active" href="{{ route('user.weight') }}">Record Berat Badan</a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="btn btn-outline-primary" href="{{ route('user.profile') }}">Pengaturan</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</x-app-layout>