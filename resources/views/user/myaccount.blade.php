<x-app-layout title="daftar">
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Cari Cara Sehat Terbaik dengan gayamu sendiri</h1>
                <p>Login di <a href="/">{{ $namecompany->value }}</a> Sekarang</p>
            </div>
            <div class="row g-4">
                <div class="row g-0 gx-5 align-items-end">
                    {{-- <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3">Property Listing</h1>
                            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit diam justo sed rebum.</p>
                        </div>
                    </div> --}}
                    {{-- <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s"> --}}
                    <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                        <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Featured</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">For Sell</a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3">For Rent</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">

                </div>
                {{-- <div class="col-md-8 ">
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                        <form method="POST" action="{{ route('daftar') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" placeholder="Masukkan nama lengkap anda" autocomplete="off">
                                            <label for="email">Nama Lengkap</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="username" value="{{ old('username') }}" id="username" placeholder="Masukkan username anda" autocomplete="off">
                                            <label for="username">Username</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Your Name" autocomplete="off">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="address" value="{{ old('address') }}" id="address" placeholder="Masukkan alamat anda" autocomplete="off">
                                            <label for="address">Alamat</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <input type="hidden" class="form-control" name="role" value="3" id="address" placeholder="Masukkan alamat anda" autocomplete="off">

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Subject">
                                            <label for="password">Password</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-5 ms-4">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Daftar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </div>
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p>Belum punya akun? <a href="/masuk">Daftar disini</a></p>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</x-app-layout>