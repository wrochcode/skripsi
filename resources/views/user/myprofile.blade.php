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
                                <a class="btn btn-outline-primary" href="{{ route('user.weight') }}">Record Berat Badan</a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="btn btn-outline-primary active" href="{{ route('user.profile') }}">Pengaturan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-8 text-start ms-4 slideInRight" data-wow-delay="0.1s">
                        <form method="POST" action="{{ route('daftar') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <label class="mt-3" for="name">Nama Lengkap</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="name" value="{{ old('name', $mainuser->name) }}" id="name" placeholder="Masukkan nama lengkap anda" autocomplete="off">
                                            <label for="name">Nama Lengkap</label>
                                        </div>
                                        @error('name')
                                            <div class="span invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <label class="mt-3" for="username">Username</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="username" value="{{ old('username', $mainuser->username) }}" id="username" placeholder="Masukkan nama lengkap anda" autocomplete="off">
                                            <label for="username">Nama Lengkap</label>
                                        </div>
                                        @error('username')
                                            <div class="span invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <label class="mt-3" for="email">Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="email" value="{{ old('email', $mainuser->email) }}" id="email" placeholder="Masukkan nama lengkap anda" autocomplete="off">
                                        </div>
                                        @error('email')
                                            <div class="span invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <label class="mt-3" for="address">Alamat</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="address" value="{{ old('address', $mainuser->address) }}" id="address" placeholder="Masukkan nama lengkap anda" autocomplete="off">
                                        </div>
                                        @error('address')
                                        <div class="span invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <label class="mt-3" for="gender">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="gender" value="{{ old('gender', $profiluser->gender) }}" id="gender" placeholder="Masukkan nama lengkap anda" autocomplete="off">
                                        </div>
                                        @error('gender')
                                        <div class="span invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <label class="mt-3" for="weight">Berat badan (kg)</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="weight" value="{{ old('weight') }}" id="weight" placeholder="Masukkan nama lengkap anda" autocomplete="off">
                                        </div>
                                        @error('weight')
                                        <div class="span invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <label class="mt-3" for="weight">Tinggi badan (cm)</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="height" value="{{ old('height') }}" id="height" placeholder="Masukkan nama lengkap anda" autocomplete="off">
                                        </div>
                                        @error('height')
                                        <div class="span invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <label class="mt-3" for="weight">Tingkat aktivitas fisik</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="activity" value="{{ old('activity') }}" id="activity" placeholder="Masukkan nama lengkap anda" autocomplete="off">
                                        </div>
                                        @error('activity')
                                        <div class="span invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <label class="mt-2" for="weight">Jumlah olahraga dalam sehari</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="activity" value="{{ old('activity') }}" id="activity" placeholder="Masukkan nama lengkap anda" autocomplete="off">
                                        </div>
                                        @error('activity')
                                        <div class="span invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                {{-- hidden --}}
                                <input type="hidden" class="form-control" name="role" value="{{ old('role') }}" id="role" placeholder="Masukkan nama lengkap anda" autocomplete="off">
                                
                                <div class="col-5 ms-4">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Daftar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</x-app-layout>